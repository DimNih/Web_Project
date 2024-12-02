<?php

unset($_SESSION['token']);

include_once 'login/gpconfig.php';

$authUrl = $client->createAuthUrl();

header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
exit();
