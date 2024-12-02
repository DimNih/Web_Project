<?php
include '../connection/koneksi.php'; 
session_start();


if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $adminQuery = "SELECT nama,saldo_dapat FROM admin WHERE id_admin = '$admin_id'";
    $adminResult = mysqli_query($koneksi, $adminQuery);

    if ($adminResult && mysqli_num_rows($adminResult) > 0) {
        $adminRow = mysqli_fetch_assoc($adminResult);
        $admin_name = $adminRow['nama'];
        $saldo_dapat = $adminRow['saldo_dapat'];
    } else {
        $admin_name = "Admin"; // Default
    }
} else {
    $admin_name = "Guest";
}

// Ambil data 
$salesQuery = "SELECT * FROM penjualan";
$salesResult = mysqli_query($koneksi, $salesQuery);

$labels = [];
$earningsData = [];
$quantityData = [];

if ($salesResult) {
    while ($row = mysqli_fetch_assoc($salesResult)) {
        $labels[] = $row['tanggal']; 
        $earningsData[] = $row['jumlah'] * $row['harga']; 
        $quantityData[] = $row['jumlah'];
    }
} else {
    echo "Error fetching data: " . mysqli_error($koneksi);
}
?>