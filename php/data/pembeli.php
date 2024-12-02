<?php
include '../connection/koneksi.php';
session_start();

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $adminQuery = "SELECT nama FROM admin WHERE id_admin = '$admin_id'";
    $adminResult = mysqli_query($koneksi, $adminQuery);

    if ($adminResult && mysqli_num_rows($adminResult) > 0) {
        $adminRow = mysqli_fetch_assoc($adminResult);
        $admin_name = $adminRow['nama'];
    } else {
        $admin_name = "Admin";
    }
} else {
    $admin_name = "Guest";
}

$sql_produk_terjual = "SELECT SUM(Jumlah_Beli) AS total_terjual FROM Proses_beli";
$result_produk_terjual = $koneksi->query($sql_produk_terjual);
$row_produk_terjual = $result_produk_terjual->fetch_assoc();
$total_produk_terjual = $row_produk_terjual['total_terjual'];

$sql_pendapatan = "SELECT SUM(Saldo_Dapat) AS total_pendapatan FROM Proses_beli";
$result_pendapatan = $koneksi->query($sql_pendapatan);
$row_pendapatan = $result_pendapatan->fetch_assoc();
$total_pendapatan = $row_pendapatan['total_pendapatan'];

$queryPurchases = "SELECT tanggal, SUM(Jumlah_Beli) AS total_beli FROM Proses_beli GROUP BY tanggal ORDER BY tanggal";
$resultPurchases = mysqli_query($koneksi, $queryPurchases);

$dates = [];
$purchases = [];

while ($row = mysqli_fetch_assoc($resultPurchases)) {
    $dates[] = $row['tanggal'];
    $purchases[] = $row['total_beli'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['saldo_dapat']) && is_numeric($_POST['saldo_dapat'])) {
        $saldo_dapat = $_POST['saldo_dapat'];
        $querySaldo = mysqli_query($koneksi, "SELECT saldo_dapat FROM admin WHERE id_admin = '$admin_id'");

        if ($querySaldo && mysqli_num_rows($querySaldo) > 0) {
            $saldoData = mysqli_fetch_assoc($querySaldo);
            $saldoSekarang = $saldoData['saldo_dapat'];
            $saldoBaru = $saldoSekarang + $saldo_dapat;

            $queryCount = "SELECT COUNT(*) AS total_penjualan FROM Proses_beli";
            $resultCount = mysqli_query($koneksi, $queryCount);

            if ($resultCount && mysqli_num_rows($resultCount) > 0) {
                $rowCount = mysqli_fetch_assoc($resultCount);
                $totalPenjualan = $rowCount['total_penjualan'];

                if ($totalPenjualan > 0) {
                    $subtraction_value = $saldo_dapat / $totalPenjualan;
                } else {
                    $subtraction_value = 0;
                }
            } else {
                $totalPenjualan = 0;
            }

            $queryUpdateSaldo = "UPDATE admin SET saldo_dapat = $saldoBaru WHERE id_admin = '$admin_id'";
            $resultUpdate = mysqli_query($koneksi, $queryUpdateSaldo);

            $queryUpdatePendapatan = "UPDATE Proses_beli SET Saldo_Dapat = Saldo_Dapat - $subtraction_value";
            mysqli_query($koneksi, $queryUpdatePendapatan);

            if ($resultUpdate) {
                header("Location: ../database/index.php");
                exit();
            } else {
                echo "Error updating saldo.";
            }
        } else {
            echo "Admin saldo not found.";
        }
    } else {
        echo "Invalid saldo input.";
    }
}

$query = "SELECT MONTH(tanggal) AS bulan, SUM(Jumlah_Beli) AS total_beli FROM Proses_beli GROUP BY MONTH(tanggal)";
$result = mysqli_query($koneksi, $query);

$months = [];
$totals = [];

while ($row = mysqli_fetch_assoc($result)) {
    $months[] = $row['bulan'];
    $totals[] = $row['total_beli'];
}
?>
