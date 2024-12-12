<?php
$hostname = "localhost";
$username = "root";
$password = "DimasPenjualan123";
$database = "penjualan_db";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM chat_messages ORDER BY timestamp ASC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'sender' => $row['sender'],
        'message' => $row['message'],
        'timestamp' => $row['timestamp'],
        'file' => $row['file_path'] 
    ];
}

echo json_encode($messages);
mysqli_close($koneksi);
?>
