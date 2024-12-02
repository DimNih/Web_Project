<?php
session_start();
include '../connection/koneksi.php';

$riwayatData = [];

// Query untuk mengambil data barang masuk
$queryBarangMasuk = "
SELECT p.nama_produk, bm.jumlah, bm.tanggal_masuk, bm.id_produk
FROM barang_masuk bm
JOIN penjualan p ON bm.id_produk = p.id
";

// Query untuk mengambil data barang keluar
$queryBarangKeluar = "
SELECT p.nama_produk, bk.jumlah, bk.tanggal_keluar, bk.id_keluar
FROM barang_keluar bk
JOIN penjualan p ON bk.id_keluar = p.id
";

// Menampilkan data admin dan saldo jika admin sudah login
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Ambil saldo user berdasarkan id_admin
    $querySaldo = "SELECT saldo_user FROM user WHERE id = '$admin_id'";  
    $saldoResult = mysqli_query($koneksi, $querySaldo);
    
    if ($saldoResult && mysqli_num_rows($saldoResult) > 0) {
        $saldoRow = mysqli_fetch_assoc($saldoResult);
        $saldo_dapat = $saldoRow['saldo_user']; 
    } else {
        $saldo_dapat = 0.00; 
    }

    // Ambil informasi admin
    $queryAdmin = "SELECT nama, profile_picture FROM admin WHERE id_admin = '$admin_id'";
    $adminResult = mysqli_query($koneksi, $queryAdmin);
    
    if ($adminResult && mysqli_num_rows($adminResult) > 0) {
        $adminRow = mysqli_fetch_assoc($adminResult);
        $admin_name = $adminRow['nama']; 
        $admin_picture = $adminRow['profile_picture']; 
    } else {
        $admin_name = "Admin";  
        $admin_picture = "default.png";  
    }
} else {
    $admin_name = "Guest";  
    $admin_picture = "default.png"; 
    $saldo_dapat = 0.00; 
}

// Ambil data dari tabel barang_masuk
$resultBarangMasuk = mysqli_query($koneksi, $queryBarangMasuk);
if ($resultBarangMasuk && mysqli_num_rows($resultBarangMasuk) > 0) {
    while ($row = mysqli_fetch_assoc($resultBarangMasuk)) {
        $riwayatData[] = [
            'barang' => $row['nama_produk'], 
            'jumlah' => $row['jumlah'],
            'tanggal' => $row['tanggal_masuk'],
            'status' => 'Masuk',
            'id' => $row['id_produk']
        ];
    }
}

// Ambil data dari tabel barang_keluar
$resultBarangKeluar = mysqli_query($koneksi, $queryBarangKeluar);
if ($resultBarangKeluar && mysqli_num_rows($resultBarangKeluar) > 0) {
    while ($row = mysqli_fetch_assoc($resultBarangKeluar)) {
        $riwayatData[] = [
            'barang' => $row['nama_produk'], 
            'jumlah' => $row['jumlah'],
            'tanggal' => $row['tanggal_keluar'],
            'status' => 'Keluar',
            'id' => $row['id_keluar']
        ];
    }
}

// Urutkan data berdasarkan tanggal
usort($riwayatData, function($a, $b) {
    return strtotime($b['tanggal']) - strtotime($a['tanggal']);
});

// Proses penghapusan data terpilih
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_ids'])) {
    $selected_ids = $_POST['selected_ids'];  // Ambil data ID yang dipilih

    // Menghapus data dari barang_masuk dan barang_keluar
    foreach ($selected_ids as $id) {
        // Hapus data dari barang_masuk
        $deleteBarangMasuk = "DELETE FROM barang_masuk WHERE id_produk = '$id'";
        mysqli_query($koneksi, $deleteBarangMasuk);

        // Hapus data dari barang_keluar
        $deleteBarangKeluar = "DELETE FROM barang_keluar WHERE id_keluar = '$id'";
        mysqli_query($koneksi, $deleteBarangKeluar);
    }

    // Setelah penghapusan, reload halaman untuk melihat perubahan
    header("Location: riwayat.php");
    exit;
}
?>
