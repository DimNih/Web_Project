<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service</title>

    <link rel="icon" type="image/x-icon" href="../Assets/logo/Logo-web/ambashop.png" sizes="16x16">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../style/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/style.css?v=1" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    


    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="login.php">Sign in</a>
                
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Terima Kasih Sudah Berkunjung.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->


    <div class="header__logo">
                    </div>
    <header class="header">
        
        </div>
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-3">
                <div class="logo">
    <a href="./home.php"><img src="../Assets/logo/produk.png" alt="Logo"></a>
</div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>

                        <li  >
        <a href="./home.php">
            <img src="../Assets/logo/home.png" alt="home" style="width: 40px; height: 40px;">
            HOME
        </a>
    </li>
    <li>
        <a href="./shop.php">
            <img src="../Assets/logo/shop.png" alt="shop" style="width: 40px; height: 40px;">
            SHOP
        </a>
    </li>
    <li>
        <a href="./contact.php">
            <img src="../Assets/logo/kontak.png" alt="kontak/about" style="width: 40px; height: 40px;">
            ABOUT
        </a>
    </li>
                        
    <li>
        <a href="./keranjang.php">
            <img src="../Assets/logo/keranjang.png" alt="keranjang" style="left: 25px; width: 40px; height: 40px;">
KERANJANG
        </a>
    </li>
              
    <li class="active" >
        <a href="./service.php">
            <img src="../Assets/logo/service.png" alt="Service" style="left: 15px; width: 40px; height: 40px;">
SERVICE
        </a>
    </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>


    <div id="layoutSidenav_content">
    <main>
        <div class="container py-5">
            <div class="card shadow mx-auto" style="max-width: 750px;">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">PESAN</h4>
                </div>

                <div class="card-body">
                    <div id="chat-container" class="chat-container border rounded p-3 mb-3" style="height: 400px; overflow-y: auto; background-color: #f9f9f9;">
                        <!-- Messages will be dynamically added here -->
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-light border rounded-circle d-flex justify-content-center align-items-center" id="attach-file" title="Unggah File" style="width: 50px; height: 50px;">
                            <i class="bi bi-paperclip" style="font-size: 20px;"></i>
                        </button>
                        <input type="file" id="file-input" class="d-none" />

                        <textarea id="message" class="form-control" rows="2" placeholder="Ketik pesan..." style="resize: none; font-size: 16px;"></textarea>

                        <button id="send-message" class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="bi bi-send" style="font-size: 24px;"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="card shadow mx-auto" style="max-width: 750px;">
                    <div class="card-header bg-secondary text-white text-center">
                        <h5 class="mb-0">AI Checker</h5>
                    </div>
                    <div class="card-body">
                        <div id="ai-messages" class="border rounded p-3 mb-3" style="height: 300px; overflow-y: auto; background-color: #f9f9f9;">
                            <!-- AI messages will be dynamically added here -->
                        </div>

                        <div class="d-flex">
                            <input type="text" id="userMessage" class="form-control me-3" placeholder="Tanyakan produk...">
                            <button class="btn btn-secondary" onclick="sendMessage()">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
   function appendMessage(message, isUser) {
        const messagesDiv = document.getElementById("ai-messages");

        const wrapperDiv = document.createElement("div");
        wrapperDiv.classList.add("d-flex", "mb-3");
        if (isUser) {
            wrapperDiv.classList.add("justify-content-end");
        } else {
            wrapperDiv.classList.add("justify-content-start");
        }

        const messageDiv = document.createElement("div");
        messageDiv.classList.add("p-2", "rounded", "text-white");
        if (isUser) {
            messageDiv.classList.add("bg-primary", "text-end");
            messageDiv.style.maxWidth = "70%";
        } else {
            messageDiv.classList.add("bg-secondary", "text-start");
            messageDiv.style.maxWidth = "70%";
        }

        messageDiv.textContent = message;
        wrapperDiv.appendChild(messageDiv);
        messagesDiv.appendChild(wrapperDiv);
        messagesDiv.scrollTop = messagesDiv.scrollHeight; // Scroll to bottom when a new message is added
    }

    function sendMessage() {
        const userMessage = document.getElementById("userMessage").value;
        if (userMessage.trim() === "") return;

        appendMessage(userMessage, true);

        document.getElementById("userMessage").value = "";

        fetch("../chat/chat_AI.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "message=" + encodeURIComponent(userMessage),
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                appendMessage(data.error, false); // Display error if exists
            } else if (data.message) {
                appendMessage(data.message, false); // Display AI message
            } else {
                appendMessage("Maaf, saya tidak mengerti pertanyaan Anda.", false);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            appendMessage("Terjadi kesalahan saat mengirim pesan.", false);
        });
    }
</script>




            </div>
        </div>
    </main>

    <script>
        $('#attach-file').click(function() {
            $('#file-input').click(); 
        });

        $('#file-input').change(function() {
            var fileName = $(this).val().split('\\').pop(); 
            console.log('File selected:', fileName); 
        });
    </script>

    <script>
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
                const messageClass = message.sender === 'user' ? 'admin-message' : 'user-message';
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
    </script>

    


<footer class="footer bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 mb-4">
                <div class="footer__about">
                    <div class="footer__logo mb-3">
                    </div>
                    <p>Lakukan yang terbaik di setiap kesempatan. Anda tidak pernah tahu pintu mana yang akan terbuka untuk Anda.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="footer__widget">
                    <h5 class="mb-3">Hubungi Saya</h5>
                    <p>Silakan tinggalkan pesan:</p>
                    <form action="../php/user/email.php" method="post" class="mb-3">
                        <div class="input-group">
                            <input name="message" type="text" class="form-control" placeholder="Ketik Pesan Kamu" required>
                            <button type="submit" class="btn btn-outline-light"><i class="icon_mail_alt"></i> Kirim</button>
                        </div>
                    </form>
                    <div class="hero__social">

                    <a href="https://www.facebook.com/kontollodon.kontollodon.3194?mibextid=ZbWKwL" target="_blank" class="text-white me-2"><i class="fa fa-facebook"></i></a>
                        <a href="https://youtube.com/@dimaserlan7395?si=aaToXVsZ7Z-S4amh" target="_blank"class="text-white me-2"><i class="fa fa-youtube"></i></a>
                        <a href="https://www.instagram.com/dimrozok?igsh=anFzYWp1Zm5ybDdl" target="_blank"class="text-white me-2"><i class="fa fa-instagram"></i></a>
                        <a href="https://github.com/DimNih" target="_blank"class="text-white"><i class="fa fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <p class="mb-0">&copy; 
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    Shop Kantin by Dimas.E
                </p>
            </div>
        </div>
    </div>
</footer>



<script scr="../js/user/chatUser.js"></script>

    <script src="../js/user/jquery.slicknav.js"></script>
    <script src="../js/user/mixitup.min.js"></script>
    <script src="../js/user/owl.carousel.min.js"></script>
    <script src="../js/user/main.js"></script>

</body>

</html>