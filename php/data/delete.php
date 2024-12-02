<?php
include '../../connection/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_barang_masuk_query = "DELETE FROM barang_masuk WHERE id = $id";
    mysqli_query($koneksi, $delete_barang_masuk_query);

    $delete_query = "DELETE FROM penjualan WHERE id = $id";
    mysqli_query($koneksi, $delete_query);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['selected_ids'])) {

    $selected_ids = $_POST['selected_ids'];
    $id_list = implode(",", $selected_ids);

    $delete_barang_masuk_query = "DELETE FROM barang_masuk WHERE id IN ($id_list)";
    mysqli_query($koneksi, $delete_barang_masuk_query);

    $delete_query = "DELETE FROM penjualan WHERE id IN ($id_list)";
    mysqli_query($koneksi, $delete_query);
}

$set = "SET @id = 0";
mysqli_query($koneksi, $set);
$update_id = "UPDATE penjualan SET id = (@id := @id + 1)";
mysqli_query($koneksi, $update_id);
mysqli_query($koneksi, "ALTER TABLE penjualan AUTO_INCREMENT = 1");

header("Location: ../../database/index.php");
exit();
?>
