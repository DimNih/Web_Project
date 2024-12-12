<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 
include_once 'login/gpconfig.php';
include_once '../../connection/koneksi.php';  

if (isset($_GET['code'])) {
    try {
        $client->authenticate($_GET['code']);
        $_SESSION['token'] = $client->getAccessToken();
        header('Location: google-callback.php');
        exit();
    } catch (Exception $e) {
        die('Error during authentication: ' . $e->getMessage());
    }
}

if (isset($_SESSION['token'])) {
    $client->setAccessToken($_SESSION['token']);
} else {
    header('Location: google.php');
    exit();
}

if ($client->getAccessToken()) {
    try {
        $google_oauth = new Google_Service_Oauth2($client);
        $userData = $google_oauth->userinfo->get();

        $_SESSION['email'] = $userData['email'];
        $_SESSION['name'] = $userData['name'];
        $_SESSION['profile_picture'] = $userData['picture'];

        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $profile_picture = $_SESSION['profile_picture'];

        $targetDir = '../../Assets/about/profil/';
        $imageName = basename($profile_picture);
        $imagePath = $targetDir . $imageName;

        $imageData = file_get_contents($profile_picture);
        file_put_contents($imagePath, $imageData);

        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 0) {
            $insertQuery = "INSERT INTO user (email, nama, profile_picture) VALUES ('$email', '$name', '$imageName')";
            mysqli_query($koneksi, $insertQuery);

            $userId = mysqli_insert_id($koneksi);
            $_SESSION['user_id'] = $userId;

            sendEmail($email, $name);
        } else {
            $updateQuery = "UPDATE user SET nama = '$name', profile_picture = '$imageName' WHERE email = '$email'";
            mysqli_query($koneksi, $updateQuery);

            $userData = mysqli_fetch_assoc($result);
            $userId = $userData['id'];

            $_SESSION['user_id'] = $userId;

            sendEmail($email, $name);
        }

        header('Location: ../../User/loading/loading.html');
        exit();
    } catch (Exception $e) {
        die('Error retrieving user info: ' . $e->getMessage());
    }
} else {
    header('Location: google.php');
    exit();
}

function sendEmail($email, $name) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'dd0613987@gmail.com'; 
        $mail->Password = 'tcfu zsii xzry djxw'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('dimaserlansyah5@gmail.com', 'AmbaShop Notif');
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Notifikasi Login';
        $mail->Body = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }
                .email-container {
                    max-width: 600px;
                    margin: 20px auto;
                    background: #ffffff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
                .email-header {
                    text-align: center;
                    padding-bottom: 20px;
                }
                .email-header img {
                    max-width: 150px;
                    border-radius: 50%;
                }
                .email-content {
                    padding: 20px;
                    text-align: center;
                }
                .email-content h1 {
                    color: #333;
                    font-size: 24px;
                    margin-bottom: 20px;
                }
                .email-content p {
                    font-size: 16px;
                    margin-bottom: 20px;
                }
                .email-footer {
                    text-align: center;
                    margin-top: 20px;
                    font-size: 14px;
                    color: #777;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGwcviXzMrdIkZGn2D4vA8xlXuEUYAVsKxWQ&s' alt='Logo Perusahaan'>
                </div>
                <div class='email-content'>
                    <h1>Halo, $name!</h1>
                    <p>Selamat! Anda telah berhasil login menggunakan akun Google Anda.</p>
                    <p>Silakan lanjutkan untuk menjelajahi fitur-fitur kami.</p>
                </div>
                <div class='email-footer'>
                    <p>Terima kasih,</p>
                    <p><strong>Tim Kami</strong></p>
                </div>
            </div>
        </body>
        </html>";        
        $mail->AltBody = "Halo $name,\n\nAnda telah berhasil login menggunakan akun Google.\n\nTerima kasih,\nTim Kami";

        $mail->send();
    } catch (Exception $e) {
        error_log('Email tidak dapat dikirim. Error: ' . $mail->ErrorInfo);
    }
}
?>