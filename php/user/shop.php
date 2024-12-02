<?php
include '../connection/koneksi.php';

session_start(); 

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $result = mysqli_query($koneksi, "SELECT saldo_user FROM user WHERE id = $userId");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $saldo = $row['saldo_user'] ?? 0; 
        $_SESSION['balance'] = $saldo;
    } else {
        echo "Error fetching saldo from database.";
        exit;
    }
} else {
    $_SESSION['balance'] = 0; 
}

$searchKeyword = isset($_POST['search']) ? mysqli_real_escape_string($koneksi, $_POST['search']) : '';
$kategori = isset($_GET['kategori']) ? mysqli_real_escape_string($koneksi, $_GET['kategori']) : '';

$produkQuery = "SELECT * FROM penjualan WHERE 1=1";

if ($searchKeyword) {
    $produkQuery .= " AND (jenis LIKE '%$searchKeyword%' OR nama_produk LIKE '%$searchKeyword%')";
}

if ($kategori) {
    $produkQuery .= " AND jenis = '$kategori'";
}

$produkQuery .= " ORDER BY id ASC";

$hasil = mysqli_query($koneksi, $produkQuery);
?>
