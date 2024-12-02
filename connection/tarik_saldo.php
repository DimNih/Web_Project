<?php

$saldo_dapat = $_POST['saldo_dapat'];

$querySaldo = mysqli_query($koneksi, "SELECT saldo_dapat FROM admin");
$saldoData = mysqli_fetch_assoc($querySaldo);
$saldoSekarang = $saldoData['saldo_dapat'];

$saldoBaru = $saldoSekarang + $saldo_dapat;

$queryUpdateSaldo = "UPDATE admin SET saldo_dapat = $saldoBaru";
$resultUpdate = mysqli_query($koneksi, $queryUpdateSaldo);

$queryResetPendapatan = "UPDATE penjualan SET pendapatan = 0"; 
mysqli_query($koneksi, $queryResetPendapatan);

if ($resultUpdate) {
    header("Location: ../database/index.php");}
?>
