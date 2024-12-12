<?php
session_start();

$client_id = "Ov23liXqZ98bdLe08UfR";
$client_secret = "eef31eb343180082da7091a7cb56c36c5eb6257c";
$redirect_uri = "http://penjualan.ddns.net/WebMain/php/user/github-back.php";

include '../../connection/koneksi.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php'; 

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
        $mail->Subject = 'Notifikasi Login Berhasil';
        $mail->Body = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
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
                    text-align: center;
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
                    <p>Anda telah berhasil login menggunakan akun GitHub Anda.</p>
                    <p>Selamat menjelajahi fitur kami.</p>
                </div>
                <div class='email-footer'>
                    <p>Terima kasih,</p>
                    <p><strong>Tim AmbaShop</strong></p>
                </div>
            </div>
        </body>
        </html>";
        $mail->AltBody = "Halo $name,\n\nAnda telah berhasil login menggunakan akun GitHub.\n\nTerima kasih,\nTim AmbaShop";

        $mail->send();
    } catch (Exception $e) {
        error_log('Email tidak dapat dikirim. Error: ' . $mail->ErrorInfo);
    }
}

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $url = "https://github.com/login/oauth/access_token";
    $data = [
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "code" => $code,
        "redirect_uri" => $redirect_uri
    ];

    $options = [
        "http" => [
            "header"  => "Content-type: application/x-www-form-urlencoded\r\nAccept: application/json\r\n",
            "method"  => "POST",
            "content" => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response, true);

    if (isset($result['access_token'])) {
        $access_token = $result['access_token'];

        $api_url = "https://api.github.com/user";
        $headers = [
            "Authorization: token $access_token",
            "User-Agent: PHP App"
        ];

        $context = stream_context_create([
            "http" => [
                "header" => implode("\r\n", $headers),
                "method" => "GET"
            ]
        ]);

        $user_data = file_get_contents($api_url, false, $context);
        $user = json_decode($user_data, true);

        $name = $user['name'] ?? 'Tidak tersedia';
        $username = $user['login'];
        $email = $user['email'] ?? 'Tidak tersedia';
        $avatar_url = $user['avatar_url'];
        $targetDir = '../../Assets/about/profil/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $headers = get_headers($avatar_url, 1);
        $contentType = $headers["Content-Type"] ?? null;
        $extension = ($contentType === "image/png") ? '.png' : (($contentType === "image/jpeg") ? '.jpg' : '');
        $imageName = uniqid() . $extension;
        $imagePath = $targetDir . $imageName;

        $local_avatar_url = null;
        $imageData = @file_get_contents($avatar_url);
        if ($imageData !== false && file_put_contents($imagePath, $imageData)) {
            $local_avatar_url = $imageName; // Hanya nama file yang disimpan di database
        }

        // Menyimpan data pengguna ke database
        $stmt = $koneksi->prepare("INSERT INTO user (email, nama, profile_picture) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $name, $local_avatar_url);

        if ($stmt->execute()) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['profile_picture'] = $local_avatar_url;
            $_SESSION['user_id'] = $koneksi->insert_id;

            // Kirim email notifikasi
            sendEmail($email, $name);

            header('Location: ../../User/loading/loading.html');
            exit();
        } else {
            echo "Gagal menyimpan data ke database: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Gagal mendapatkan access token.";
    }
} else {
    echo "Kode otorisasi tidak tersedia.";
}

$koneksi->close();
?>
