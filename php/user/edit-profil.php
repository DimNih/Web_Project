<?php
include '../connection/koneksi.php';
session_start();

$notification = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../User/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil data pengguna berdasarkan session
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (isset($_POST['UPDATE'])) {
    $sandi = mysqli_real_escape_string($koneksi, $_POST['sandi'] ?? '');
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nomer = mysqli_real_escape_string($koneksi, $_POST['nomer']);
    $alamatBaru = mysqli_real_escape_string($koneksi, $_POST['alamat'] ?? '');
    $fileName = $user['profile_picture']; 

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $nama_Folder = "../Assets/about/profil/";
        $target_file = $nama_Folder . basename($_FILES["profile_picture"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $fileName = basename($_FILES["profile_picture"]["name"]);
            } else {
                $notification = "Gagal mengunggah gambar profil.";
            }
        } else {
            $notification = "Hanya file gambar yang diperbolehkan.";
        }
    }

    if (!empty($email) && !empty($nomer)) {
        $sqlUpdate = "UPDATE user SET nama = ?,sandi = ?, email = ?, nomer = ?, alamat = ?, profile_picture = ? WHERE id = ?";
        $stmtUpdate = mysqli_prepare($koneksi, $sqlUpdate);
        mysqli_stmt_bind_param($stmtUpdate, 'ssssssi', $nama, $sandi, $email, $nomer, $alamatBaru, $fileName, $user_id);


        if (mysqli_stmt_execute($stmtUpdate)) {
            $_SESSION['notification'] = "Profil berhasil diperbarui.";
            header("Location: ../User/contact.php"); 
            exit();
        } else {
            $notification = "Gagal memperbarui profil.";
        }

        mysqli_stmt_close($stmtUpdate);
    } else {
        $notification = "Nama, email, dan nomor harus diisi.";
    }
}
