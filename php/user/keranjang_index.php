<?php
session_start();
include '../connection/koneksi.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id = $userId");
    if ($result) {
        $userData = mysqli_fetch_assoc($result);
        $username = $userData['nama'];
        $email = $userData['email'];
        $saldo = $userData['saldo_user'] ?? 0;  
        $_SESSION['balance'] = $saldo;  
    } else {
        echo "Error fetching user data.";
        exit;
    }

    $cart_query = "SELECT k.*, p.gambar, p.nama_produk, p.harga 
    FROM keranjang k
    JOIN penjualan p ON k.produk_id = p.id 
    WHERE k.user_id = ? AND k.status = 'in_cart'";

    $stmt = mysqli_prepare($koneksi, $cart_query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $cart_result = mysqli_stmt_get_result($stmt);
    
    if ($cart_result && mysqli_num_rows($cart_result) > 0) {
    } else {
        echo "Your cart is empty.";
    }
} else {
    echo "Please log in.";
}
?>
