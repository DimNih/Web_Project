<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $userMessage = $_POST['message'];

    if (empty($userMessage)) {
        echo "Message cannot be empty.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dd0613987@gmail.com';  
        $mail->Password = 'tcfu zsii xzry djxw';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('dd0613987@gmail.com', 'Dimas'); 
        $mail->addAddress('dimaserlansyah5@gmail.com');  
        $mail->Subject = 'Message from Contact Form';
        $mail->Body    = $userMessage;  

        $mail->send();
        header('Location: ../../User/shop.php');
        exit;

    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}
?>
