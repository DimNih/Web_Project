<?php
include '../php/user/saldo.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>PENGISIAN SALDO</title>
    <link rel="stylesheet" href="../style/user/saldo.css?v=3">
</head>
<body class="badan">

<header class="header-judul">
    <h1 class="judul-paraf">PENGISIAN SALDO</h1>
</header>

<div class="container-saldo">
    <div class="saldo-amount">
        <p>Saldo Saat Ini:</p> Rp <?php echo number_format($_SESSION['balance'], 2, ',', '.'); ?>
    </div>

    <?php if (isset($message)) { ?>
        <div class="message-error"><?php echo $message; ?></div>
    <?php } ?>

    <form class="form-menu" method="POST" action="">
        <label class="label-judul" for="nomer_telp">Nomer Telepon:</label>
        <input type="number" name="nomer_telp" class="input-field" placeholder="Masukkan nomer telepon" required>

        <label class="label-judul" for="sandi">Sandi:</label>
        <input type="text" name="sandi" class="input-field" placeholder="Masukkan sandi" required>

        <label class="label-judul" for="newBalance">Isi Saldo:</label>
        <select name="newBalance" class="input-field" required>
            <option value="">Pilih Saldo</option>
            <option value="10000">Rp 10.000</option>
            <option value="50000">Rp 50.000</option>
            <option value="100000">Rp 100.000</option>
            <option value="500000">Rp 500.000</option>
            <option value="1000000">Rp 1.000.000</option>
            <option value="10000000">Rp 10.000.000</option>
        </select>

        <button type="submit" name="updateBalance" class="submit-button">ISI</button>
    </form>

</body>
</html>
