<?php
require_once '../../vendor/autoload.php';  

$client = new Google_Client();
$client->setClientId('1011386793633-qnkpnerlk6mdfuo26i3guv2phgv1jdgs.apps.googleusercontent.com');  
$client->setClientSecret('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');  
$client->setRedirectUri('http://penjualan.ddns.net/WebMain/php/user/google-callback.php');  
$client->addScope('email');
$client->addScope('profile');
