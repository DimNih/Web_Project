<?php
include '../../connection/koneksi.php';
session_start();

// Cek user login
if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "Anda harus login terlebih dahulu";
    $_SESSION['icon'] = "warning";
    header("Location: ../User/login.php");
    exit;
}

if (isset($_GET['delete_id'])) {
    $id_keranjang = $_GET['delete_id'];
    $user_id = $_SESSION['user_id'];

    $delete_query = "DELETE FROM keranjang WHERE user_id = ? AND id = ?";
    $delete_stmt = mysqli_prepare($koneksi, $delete_query);
    mysqli_stmt_bind_param($delete_stmt, "ii", $user_id, $id_keranjang);

    if (mysqli_stmt_execute($delete_stmt)) {
        $_SESSION['message'] = "Produk berhasil dihapus dari keranjang";
        $_SESSION['icon'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menghapus produk";
        $_SESSION['icon'] = "error";
    }
    header("Location: ../../User/keranjang.php");
    exit;
}

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $user_id = $_SESSION['user_id']; 

    $query = "SELECT * FROM penjualan WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_produk);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        $stok_tersedia = $product['jumlah']; 
        
        $check_cart_query = "SELECT * FROM keranjang WHERE user_id = ? AND produk_id = ? AND status = 'in_cart'";
        $check_stmt = mysqli_prepare($koneksi, $check_cart_query);
        mysqli_stmt_bind_param($check_stmt, "ii", $user_id, $id_produk);
        mysqli_stmt_execute($check_stmt);
        $check_result = mysqli_stmt_get_result($check_stmt);

        if (mysqli_num_rows($check_result) > 0) {
            $cart_item = mysqli_fetch_assoc($check_result);
            $jumlah_di_keranjang = $cart_item['jumlah'];

            // Validasi lebih stok
            if ($jumlah_di_keranjang + 1 > $stok_tersedia) {
                $_SESSION['message'] = "Jumlah produk di keranjang melebihi stok yang tersedia";
                $_SESSION['icon'] = "warning";
                header("Location: ../../User/keranjang.php");
                exit;
            }

            $update_cart = "UPDATE keranjang SET jumlah = jumlah + 1, total_harga = jumlah * harga WHERE user_id = ? AND produk_id = ? AND status = 'in_cart'";
            $update_stmt = mysqli_prepare($koneksi, $update_cart);
            mysqli_stmt_bind_param($update_stmt, "ii", $user_id, $id_produk);
            mysqli_stmt_execute($update_stmt);
        } else {
            // Validasi stok kosong
            if ($stok_tersedia < 1) {
                $_SESSION['message'] = "Stok produk habis";
                $_SESSION['icon'] = "error";
                header("Location: ../../User/keranjang.php");
                exit;
            }

            $insert_cart = "INSERT INTO keranjang (user_id, produk_id, nama_produk, jenis_produk, harga, jumlah, total_harga) 
                            VALUES (?, ?, ?, ?, ?, 1, ?)";
            $total_harga = $product['harga'];  
            $insert_stmt = mysqli_prepare($koneksi, $insert_cart);
            mysqli_stmt_bind_param($insert_stmt, "iissdi", $user_id, $id_produk, $product['nama_produk'], $product['jenis'], $product['harga'], $total_harga);
            mysqli_stmt_execute($insert_stmt);
        }

        $_SESSION['message'] = "Produk berhasil ditambahkan ke keranjang";
        $_SESSION['icon'] = "success";
    } else {
        $_SESSION['message'] = "Produk tidak ditemukan";
        $_SESSION['icon'] = "error";
    }
    header("Location: ../../User/keranjang.php");
    exit;
}

$_SESSION['message'] = "ID Produk tidak ditemukan";
$_SESSION['icon'] = "error";
header("Location: ../../User/keranjang.php");
exit;
?>
