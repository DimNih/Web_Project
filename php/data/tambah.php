<?php
include '../connection/koneksi.php';

if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];
    $nama_produk = $_POST['nama_produk'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];
    $total = $jumlah * $harga;


    $nama_Folder = "../Assets/img_data/";
    $target_file = $nama_Folder . basename($_FILES["gambar"]["name"]);
    
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $fileName = basename($_FILES["gambar"]["name"]); 
    }

    $sql = "INSERT INTO penjualan (jenis, nama_produk, jumlah, harga, tanggal,total, gambar) 
            VALUES ('$jenis','$nama_produk', '$jumlah', '$harga', '$tanggal','$total', '$fileName')";
    mysqli_query($koneksi, $sql);
    header("Location: index.php"); 
}
?>
