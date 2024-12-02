<?php
session_start();
include '../connection/koneksi.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $result = mysqli_query($koneksi, "SELECT nama, nomer, email, profile_picture, saldo_user, alamat FROM user WHERE id = $userId");
    if ($result) {
        $userData = mysqli_fetch_assoc($result);
        $username = $userData['nama'];
        $nomer = $userData['nomer'];
        $email = $userData['email'];
        $profile = $userData['profile_picture'];
        $saldo = $userData['saldo_user'] ?? 0;
        $alamat = $userData['alamat']; 
        
        $_SESSION['balance'] = $saldo;
    } else {
        echo "Error fetching user data.";
        exit;
    }
} else {
    echo "User not authenticated.";
    exit;
}
?>
