<?php
$client_id = "Ov23liXqZ98bdLe08UfR"; 
$redirect_uri = "http://penjualan.ddns.net/WebMain/php/user/github-back.php"; 

$auth_url = "https://github.com/login/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_uri&scope=user";

header("Location: $auth_url");
exit;

?>
