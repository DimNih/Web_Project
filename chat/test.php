<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        .chat-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .messages {
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .messages .message {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            background-color: #f1f1f1;
        }

        .messages .user-message {
            background-color: #d0f0c0;
            text-align: right;
        }

        .messages .bot-message {
            background-color: #e0e0e0;
            text-align: left;
        }

        .input-container {
            display: flex;
        }

        .input-container input {
            flex-grow: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .input-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="chat-container">
        <h2>Produk Checker</h2>
        <div class="messages" id="messages">
            <!-- Pesan akan ditampilkan di sini -->
        </div>

        <div class="input-container">
            <input type="text" id="userMessage" placeholder="Tanyakan produk...">
            <button onclick="sendMessage()">Kirim</button>
        </div>
    </div>

    <script>
        function appendMessage(message, isUser) {
            const messagesDiv = document.getElementById("messages");

            const messageDiv = document.createElement("div");
            messageDiv.classList.add("message");
            if (isUser) {
                messageDiv.classList.add("user-message");
            } else {
                messageDiv.classList.add("bot-message");
            }

            messageDiv.textContent = message;
            messagesDiv.appendChild(messageDiv);
            messagesDiv.scrollTop = messagesDiv.scrollHeight; // Scroll ke bawah saat ada pesan baru
        }

        function sendMessage() {
            const userMessage = document.getElementById("userMessage").value;
            if (userMessage.trim() === "") return;

            appendMessage(userMessage, true);

            document.getElementById("userMessage").value = "";

            fetch("chat_AI.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "message=" + encodeURIComponent(userMessage),
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    appendMessage(data.error, false); // Tampilkan error jika ada
                } else if (data.message) {
                    appendMessage(data.message, false); // Tampilkan pesan jumlah produk
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

</body>
</html>
