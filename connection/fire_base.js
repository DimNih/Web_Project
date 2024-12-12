
const firebaseConfig = {
    apiKey: "your-api-key",
    authDomain: "your-project-id.firebaseapp.com",
    databaseURL: "https://your-database-name.firebaseio.com",
    projectId: "your-project-id",
    storageBucket: "your-project-id.appspot.com",
    messagingSenderId: "your-sender-id",
    appId: "your-app-id"
};

const app = firebase.initializeApp(firebaseConfig);
const db = firebase.database(app);

// Fungsi untuk mengirim pesan
function sendMessage() {
    var message = document.getElementById('chat-input').value;
    var messageRef = db.ref('messages').push();
    messageRef.set({
        sender: 'Admin', 
        text: message
    });
    document.getElementById('chat-input').value = ''; 



    // konek
}

db.ref('messages').on('child_added', function(snapshot) {
    var message = snapshot.val();
    var chatBox = document.getElementById('chat-box');
    chatBox.innerHTML += '<div>' + message.sender + ': ' + message.text + '</div>';
});
