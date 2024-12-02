<?php
include '../connection/koneksi.php';
session_start();

$notification = "";


if (isset($_POST['MASUK'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $sandi = mysqli_real_escape_string($koneksi, $_POST['sandi']);

    $sql = "SELECT id FROM user WHERE email='$email' AND sandi='$sandi'";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $user = mysqli_fetch_assoc($hasil);
        $_SESSION['user_id'] = $user['id'];

        header("Location: ../User/loading/loading.html");
        exit();
    } else {
        $notification = "Email atau password salah.";
    }
}

if (isset($_POST['REGISTER'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $sandi = mysqli_real_escape_string($koneksi, $_POST['sandi']);
    $nomer = mysqli_real_escape_string($koneksi, $_POST['nomer']);
    $alamatBaru = mysqli_real_escape_string($koneksi, $_POST['alamat'] ?? '');

    $fileName = null;

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

    if (!empty($email) && !empty($sandi)) {
        $sqlCheckEmail = "SELECT id FROM user WHERE email = ?";
        $stmtCheckEmail = mysqli_prepare($koneksi, $sqlCheckEmail);
        mysqli_stmt_bind_param($stmtCheckEmail, 's', $email);
        mysqli_stmt_execute($stmtCheckEmail);
        mysqli_stmt_store_result($stmtCheckEmail);

        if (mysqli_stmt_num_rows($stmtCheckEmail) > 0) {
            $notification = "Email sudah terdaftar.";
        } else {
            $sql = "INSERT INTO user (nama, email, sandi, nomer, alamat, profile_picture) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($koneksi, $sql);
            mysqli_stmt_bind_param($stmt, 'ssssss', $nama, $email, $sandi, $nomer, $alamatBaru, $fileName);

            if (mysqli_stmt_execute($stmt)) {
                $notification = "Registrasi berhasil. Silakan login.";
            } else {
                $notification = "Registrasi gagal.";
            }
        }

        mysqli_stmt_close($stmtCheckEmail);
    } else {
        $notification = "Email dan password wajib diisi.";
    }
}
?>
