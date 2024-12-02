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

        // Format nomor telepon
        $formattedPhone = '+62' . ltrim($userPhone, '0');
        $otp = rand(100000, 999999);

        $client = new Client($sid, $token);

        try {
            // Mengirim OTP melalui WhatsApp
            $message = $client->messages->create(
                'whatsapp:' . $formattedPhone, 
                [
                    'from' => $twilioNumber, 
                    'body' => 'OTP Anda untuk menyelesaikan pembelian adalah: ' . $otp
                ]
            );

            // Menyimpremote: error: GH013: Repository rule violations found for refs/heads/main.
remote: 
remote: - GITHUB PUSH PROTECTION
remote:   —————————————————————————————————————————
remote:     Resolve the following violations before pushing again
remote: 
remote:     - Push cannot contain secrets
remote: 
remote:     
remote:      (?) Learn how to resolve a blocked push
remote:      https://docs.github.com/code-security/secret-scanning/working-with-secret-scanning-and-push-protection/working-with-push-protection-from-the-command-line#resolving-a-blocked-push
remote:     
remote:     
remote:       —— Twilio Account String Identifier ——————————————————
remote:        locations:
remote:          - blob id: 1124fac723e837add6ce0cac744365fcc157b0c3
remote:     
remote:        (?) To push, remove secret from commit(s) or follow this URL to allow the secret.
remote:        https://github.com/DimNih/Web_Project/security/secret-scanning/unblock-secret/2pdo1gWixA8IW4EAEIGfkPL6Fc4
remote:     
remote:     
remote:     ——[ WARNING ]—————————————————————————————————————————
remote:      Scan incomplete: This push was large and we didn't finish on time.
remote:      It can still contain undetected secrets.
remote:     
remote:      (?) Use the following command to find the path of the detected secret(s):
remote:          git rev-list --objects --all | grep blobid
remote:     ——————————————————————————————————————————————————————
remote: 
remote: 
To https://github.com/DimNih/Web_Project.git
 ! [remote rejected]   main -> main (push declined due to repository rule violations)
error: gagal dorong beberapa referensi ke 'https://github.com/DimNih/Web_Project.git'
an OTP ke session
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_time'] = time();

            // Menampilkan notifikasi sukses
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
