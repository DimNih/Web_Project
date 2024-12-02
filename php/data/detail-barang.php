<?php
session_start();  

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirec Untuk No login
    header("Location: ../database/login-admin.php");
    exit;  
}

// Cek login
$admin_id = $_SESSION['admin_id'];
$admin_name = "Guest";  

$adminQuery = "SELECT nama FROM admin WHERE id_admin = '$admin_id'";
$adminResult = mysqli_query($koneksi, $adminQuery);

if ($adminResult && mysqli_num_rows($adminResult) > 0) {
    $adminRow = mysqli_fetch_assoc($adminResult);
    $admin_name = $adminRow['nama']; 
}

$id = $_GET['id'];
$hasil = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id = '$id'");
$baris = mysqli_fetch_assoc($hasil);

// Next
$next_result = mysqli_query($koneksi, "SELECT id FROM penjualan WHERE id > '$id' ORDER BY id ASC LIMIT 1");
$next_product = mysqli_fetch_assoc($next_result);
$next_id = $next_product ? $next_product['id'] : null;

// Kembali
$prev_result = mysqli_query($koneksi, "SELECT id FROM penjualan WHERE id < '$id' ORDER BY id DESC LIMIT 1");
$prev_product = mysqli_fetch_assoc($prev_result);
$prev_id = $prev_product ? $prev_product['id'] : null;

?>
