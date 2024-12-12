<?php

require '../vendor/autoload.php'; 

$hostname = "localhost";
$username = "root";
$password = "DimasPenjualan123";
$database = "penjualan_db";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$options = array(
    'cluster' => 'ap1',
    'useTLS' => true
);

$pusher = new Pusher\Pusher(
    '154d5828de884b85e38a', 
    'c699dfe5240aada5f5fb', 
    '1908195', 
    $options
);

$message = isset($_POST['message']) ? $_POST['message'] : '';
$sender = isset($_POST['sender']) ? $_POST['sender'] : '';
$channel = isset($_POST['channel']) ? $_POST['channel'] : '';
$filePath = '';

if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    
    $targetDir = "../Assets/img_data/";
    $fileName = basename($_FILES['file']['name']);
    $filePath = $fileName; 
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetDir . $fileName)) {
    }
}

$query = "INSERT INTO chat_messages (message, sender, channel, file_path) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 'ssss', $message, $sender, $channel, $filePath);
mysqli_stmt_execute($stmt);

$messageData = array(
    'message' => $message,
    'sender' => $sender,
    'file' => $filePath
);

$pusher->trigger($channel, 'new-message', $messageData);

echo json_encode(array('status' => 'success', 'message' => $message, 'file' => $filePath));

mysqli_close($koneksi);

?>
