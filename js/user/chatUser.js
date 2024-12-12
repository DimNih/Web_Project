$(document).ready(function () {
    const pusher = new Pusher('154d5828de884b85e38a', {
        cluster: 'ap1',
        forceTLS: true,
    });

    const userChannel = pusher.subscribe('user-to-admin');

    function isScrolledToBottom() {
        const container = $('#chat-container')[0];
        return container.scrollTop + container.clientHeight >= container.scrollHeight - 10;
    }

    function scrollToBottom() {
        const container = $('#chat-container')[0];
        container.scrollTop = container.scrollHeight;
    }

    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${hours}:${minutes}`;
    }

    function appendMessage(message) {
        const messageClass = message.sender === 'admin' ? 'admin-message' : 'user-message';
        let content = '';

        if (message.file) {
            if (message.file.endsWith('.mp4')) {
                content += `
                    <video controls style="max-width: 100%; margin-top: 10px;">
                        <source src="http://localhost/WebMain/Assets/img_data/${message.file}?v=${new Date().getTime()}" type="video/mp4">
                    </video>`;
            } else if (message.file.match(/\.(jpg|jpeg|png|gif)$/)) {
                content += `
                    <img src="http://localhost/WebMain/Assets/img_data/${message.file}?v=${new Date().getTime()}" 
                         style="max-width: 90%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 10px 0;">`;
            }
        }

        if (message.message) {
            content += `<p>${message.message}</p>`;
        }

        const timestamp = formatTimestamp(message.timestamp || Date.now());
        content += `<div class="timestamp" style="font-size: 0.8em; color: #888; text-align: right; margin-top: 5px;">${timestamp}</div>`;

        $('#chat-container').append(`
            <div class="message ${messageClass}">
                ${content}
            </div>
        `);
    }

    userChannel.bind('new-message', function (data) {
        const wasAtBottom = isScrolledToBottom();
        appendMessage(data);

        if (wasAtBottom) {
            scrollToBottom();
        }
    });

    function pollForNewMessages() {
        $.ajax({
            url: '../chat/get_messages.php',
            method: 'GET',
            success: function (data) {
                const messages = JSON.parse(data);
                $('#chat-container').empty();

                messages.forEach(function (message) {
                    appendMessage(message);
                });

                if (isScrolledToBottom()) {
                    scrollToBottom();
                }
            },
            error: function (xhr, status, error) {
                console.error('Failed to load messages:', error);
            },
        });
    }

    $('#send-message').click(function () {
        const message = $('#message').val().trim();
        const fileInput = $('#file-input')[0]?.files[0];

        if (!message && !fileInput) {
            alert('Please enter a message or upload a file first.');
            return;
        }

        const formData = new FormData();
        formData.append('message', message || ''); 
        formData.append('sender', 'user');
        formData.append('channel', 'user-to-admin');

        if (fileInput) {
            formData.append('file', fileInput);
        }

        $.ajax({
            url: '../chat/send_message.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function () {
                $('#message').val(''); 
                $('#file-input').val(''); 
            },
            error: function (xhr, status, error) {
                alert('Failed to send message. Please try again.');
                console.error('Error:', error);
            },
        });
    });

    pollForNewMessages();
    setInterval(pollForNewMessages, 10000);
});