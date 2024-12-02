<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=penjualan_db", "root", "DimasPenjualan123");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
