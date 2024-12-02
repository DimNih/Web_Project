<?php
session_start();

$admin_name = "Guest";

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    include '../connection/koneksi.php'; 

    $adminQuery = "SELECT nama FROM admin WHERE id_admin = '$admin_id'";
    $adminResult = mysqli_query($koneksi, $adminQuery);

    if ($adminResult && mysqli_num_rows($adminResult) > 0) {
        $adminRow = mysqli_fetch_assoc($adminResult);
        $admin_name = $adminRow['nama'];
    }
} else {
    header("Location: ../database/login-admin.php");
    exit;
}

$produk_options = "";
$query = mysqli_query($koneksi, "SELECT id, nama_produk FROM penjualan");
while ($row = mysqli_fetch_assoc($query)) {
    $produk_options .= "<option value='{$row['id']}'>{$row['nama_produk']} (ID: {$row['id']})</option>";
}

if (isset($_POST['submit'])) {
    $id_produk = $_POST['id_produk'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jumlah = $_POST['jumlah'];

    $cek_produk = mysqli_query($koneksi, "SELECT id FROM penjualan WHERE id = '$id_produk'");
    if (mysqli_num_rows($cek_produk) == 0) {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Produk dengan ID tersebut tidak ditemukan. Silakan periksa kembali ID produk.';
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO barang_masuk (id_produk, tanggal_masuk, jumlah) VALUES ('$id_produk', '$tanggal_masuk', '$jumlah')");

        if ($insert) {
            $update_stok = mysqli_query($koneksi, "UPDATE penjualan SET jumlah = jumlah + $jumlah WHERE id = '$id_produk'");
            
            if ($update_stok) {
                $_SESSION['alert_type'] = 'success';
                $_SESSION['alert_message'] = 'Barang berhasil ditambah dan stok diperbarui.';

                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $_SESSION['alert_type'] = 'error';
                $_SESSION['alert_message'] = 'Gagal memperbarui stok.';
            }
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Barang gagal ditambah.';
        }
    }
}

if (isset($_GET['go']) && $_GET['go'] == 'delete' && isset($_GET['id_masuk'])) {
    $id_masuk = $_GET['id_masuk'];
    $delete = mysqli_query($koneksi, "DELETE FROM barang_masuk WHERE id_masuk='$id_masuk'");

    if ($delete) {
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_message'] = 'Data berhasil dihapus.';
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Data gagal dihapus.';
    }
}
?>

