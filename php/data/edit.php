<?php
session_start();
$admin_name = "Guest"; 


// Chek login
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
    // Redirec No login
    header("Location: ../database/login-admin.php"); 
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hasil = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id = $id");

    if ($hasil) {
        $baris = mysqli_fetch_assoc($hasil);
    } else {
        echo "Error fetching data for ID: $id";
        exit;
    }

    if (isset($_POST['submit'])) {
        $jenis = $_POST['jenis'];
        $nama_produk = $_POST['nama_produk'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];
    
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $namaFile = $_FILES['gambar']['name'];
            $tmpFile = $_FILES['gambar']['tmp_name'];
            $Asal = "../Assets/img_data/";
            $targetFile = $Asal . basename($namaFile);
    
            move_uploaded_file($tmpFile, $targetFile);
    
            if (!empty($baris['gambar']) && file_exists($Asal . $baris['gambar'])) {
                unlink($Asal . $baris['gambar']);
            }
    
            $sql = "UPDATE penjualan SET jenis='$jenis', nama_produk='$nama_produk', jumlah='$jumlah', harga='$harga', tanggal='$tanggal', gambar='$namaFile' WHERE id=$id";
        } else {
            $sql = "UPDATE penjualan SET jenis='$jenis', nama_produk='$nama_produk', jumlah='$jumlah', harga='$harga', tanggal='$tanggal' WHERE id=$id";
        }
    
        if (mysqli_query($koneksi, $sql)) {
            header("Location: ../database/index.php"); // Redirek sukse update
            exit; //stop
        } else {
            // Display error
            echo "Error updating data: " . mysqli_error($koneksi);
        }
    }
}    
?>
