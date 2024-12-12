<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "Anda harus login terlebih dahulu";
    $_SESSION['icon'] = "warning";
    header("Location: ../User/login.php");
    exit;
}

$userId = $_SESSION['user_id'];

include('../../connection/koneksi.php');

$query = "SELECT email FROM user WHERE id='$userId'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email']; 
} else {
    $_SESSION['message'] = "Data pengguna tidak ditemukan.";
    $_SESSION['icon'] = "error";
    header("Location: login.php");
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $_SESSION['email']; 

    if (empty($userEmail)) {
        echo "Email tidak ditemukan.";
        exit;
    }

    $otp = rand(100000, 999999);

    $_SESSION['otp'] = $otp;
    $_SESSION['otp_time'] = time();

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dd0613987@gmail.com'; 
        $mail->Password = 'tcfu zsii xzry djxw'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('dd0613987@gmail.com', 'Penjualan.net');
        $mail->addAddress($userEmail);  
        $mail->Subject = 'OTP Verifikasi Pembelian';
        $mail->Body    = "OTP Anda untuk verifikasi pembelian adalah: $otp";

        if ($mail->send()) {
            echo "OTP berhasil dikirim ke email Anda.";
            header('Location: .php');
            exit;
        } else {
            echo "Gagal mengirim OTP. Silakan coba lagi.";
        }
        
    } catch (Exception $e) {
        echo "Gagal mengirim email. Error: {$mail->ErrorInfo}";
    }
}
?>
