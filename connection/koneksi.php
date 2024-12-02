<?php
$hostname="localhost";
$username="root";
$password="DimasPenjualan123";
$database="penjualan_db";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if($koneksi){
    echo "";
}else{
    echo "Koneksi gagal";
}

?>
