<?php
 // Koneksi >>
 include '../connection/koneksi.php'; 
session_start(); // Start Sesi Admin

$admin_name = "Guest"; 



if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
   
    // Ambill
    $adminQuery = "SELECT nama FROM admin WHERE id_admin = '$admin_id'";
    $adminResult = mysqli_query($koneksi, $adminQuery);

    if ($adminResult && mysqli_num_rows($adminResult) > 0) {
        $adminRow = mysqli_fetch_assoc($adminResult);
        $admin_name = $adminRow['nama']; // Sesi ambil nama dari tabel admin
    }
} else {
    // Menuju...
    header("Location: ../database/login-admin.php");
    exit;
}

// proses  
if (isset($_POST['submit'])) {
    
    $id_produk = $_POST['id_produk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $jumlah = $_POST['jumlah'];
    $tujuan_keluar = $_POST['tujuan_keluar'];


    // proses insert 
    $insert_query = "INSERT INTO barang_keluar (id_produk, tanggal_keluar, jumlah, tujuan_keluar) 
                     VALUES ('$id_produk', '$tanggal_keluar', '$jumlah', '$tujuan_keluar')";
    $insert_result = mysqli_query($koneksi, $insert_query);



    // proses update //
    if ($insert_result) {
        $update_query = "UPDATE penjualan SET jumlah = jumlah - $jumlah WHERE id = '$id_produk'";
        $update_result = mysqli_query($koneksi, $update_query);

        if ($update_result) {
            $_SESSION['alert_type'] = 'success';
            $_SESSION['alert_message'] = 'Data berhasil ditambah dan stok diperbarui.';
        } else {
            $_SESSION['alert_type'] = 'error';
            $_SESSION['alert_message'] = 'Gagal memperbarui stok di penjualan.';
        }
    } else {
        $_SESSION['alert_type'] = 'error';
        $_SESSION['alert_message'] = 'Gagal menambah data barang keluar.';
    }


    // redirec
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Query ambil Nama Produk dan Id
$query_produk = "SELECT id, nama_produk FROM penjualan";
$result_produk = mysqli_query($koneksi, $query_produk);

$produk_options = ""; // Buat Variabel isi kosong



// proses loop id dan nama //
if ($result_produk) {
    while ($row = mysqli_fetch_assoc($result_produk)) {
        $produk_options .= "<option value='" . $row['id'] . "'>" . $row['nama_produk'] . "</option>";
    }
} else {
    echo "Error fetching product data: " . mysqli_error($koneksi);
}
?>
