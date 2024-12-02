<?php
include '../connection/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    die("Anda harus login terlebih dahulu.");
}

$userId = $_SESSION['user_id']; 

$result = mysqli_query($koneksi, "SELECT saldo_user FROM user WHERE id='$userId'");
$row = mysqli_fetch_assoc($result);
$_SESSION['balance'] = $row['saldo_user'] ?? 10000; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBalance'])) {
    $newBalance = $_POST['newBalance'];
    $nomer = $_POST['nomer_telp'];
    $sandi = $_POST['sandi'];

    $checkQuery = "SELECT * FROM user WHERE id='$userId' AND nomer='$nomer' AND sandi='$sandi'";
    $result = mysqli_query($koneksi, $checkQuery);
    
    if (mysqli_num_rows($result) > 0) {
        if (is_numeric($newBalance) && $newBalance >= 0) {
            $newBalance = (float)$newBalance;
            $_SESSION['balance'] += $newBalance;

            $updateQuery = "UPDATE user SET saldo_user='" . $_SESSION['balance'] . "' WHERE id='$userId'";
            if (mysqli_query($koneksi, $updateQuery)) {
                $message = "Saldo berhasil diperbarui dan ditambahkan ke akun Anda!";
            } else {
                $message = "Terjadi kesalahan saat menambah saldo.";
            }
        } else {
            $message = "Silakan masukkan jumlah saldo yang valid.";
        }
    } else {
        $message = "Nomer telepon atau sandi salah.";
    }
}
?>
