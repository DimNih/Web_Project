<?php
require '../../vendor/autoload.php';
use Twilio\Rest\Client;

session_start();
include '../../connection/koneksi.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$sid = $_ENV['TWILIO_ACCOUNT_SID'];
$token = $_ENV['TWILIO_AUTH_TOKEN'];
$twilioNumber = $_ENV['TWILIO_PHONE_NUMBER'];

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $queryUser = "SELECT nomer FROM user WHERE id='$userId'";
    $resultUser = mysqli_query($koneksi, $queryUser);
    if ($resultUser && mysqli_num_rows($resultUser) > 0) {
        $rowUser = mysqli_fetch_assoc($resultUser);
        $userPhone = $rowUser['nomer'];

        $formattedPhone = '+62' . ltrim($userPhone, '0');
        $otp = rand(100000, 999999);

        $client = new Client($sid, $token);

        try {
            $message = $client->messages->create(
                'whatsapp:' . $formattedPhone, 
                [
                    'from' => $twilioNumber, 
                    'body' => 'OTP Anda untuk menyelesaikan pembelian adalah: ' . $otp
                ]
            );

            $_SESSION['otp'] = $otp;
            $_SESSION['otp_time'] = time();

            echo '<script>
                    Swal.fire({
                        title: "OTP Terkirim",
                        text: "OTP telah dikirim ke WhatsApp Anda. Silakan cek pesan Anda.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "../User/checkout.php";
                        }
                    });
                  </script>';
        } catch (Exception $e) {
            echo 'Error mengirim OTP melalui WhatsApp: ' . $e->getMessage();
        }
    }
}
?>
