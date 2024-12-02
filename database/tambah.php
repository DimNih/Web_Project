<?php
include '../php/data/tambah.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Animasi Muncul */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1.5s forwards;
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-100%);
            animation: slideInLeft 1.5s forwards;
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(100%);
            animation: slideInRight 1.5s forwards;
        }

        .zoom-in {
            opacity: 0;
            transform: scale(0.5);
            animation: zoomIn 1.5s forwards;
        }

        .rotate-in {
            opacity: 0;
            transform: rotate(-180deg);
            animation: rotateIn 1.5s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes zoomIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes rotateIn {
            to {
                opacity: 1;
                transform: rotate(0);
            }
        }
    </style>
</head>
<body>
<div class="container mt-5 fade-in">
    <h2 class="text-center mb-4">Tambah Penjualan</h2>
    <form action="tambah.php" method="post" enctype="multipart/form-data">
        
        <div class="form-group slide-in-left">
            <label for="jenis">Jenis Produk</label>
            <select class="form-control" id="jenis" name="jenis" required>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Alat Tulis">Alat Tulis</option>
            </select>
        </div>

        <div class="form-group zoom-in">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        
        <div class="form-group slide-in-right">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>

        <div class="form-group rotate-in">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <div class="form-group fade-in">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="form-group zoom-in">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block fade-in">Tambah Penjualan</button>
    </form>
</div>

<script src="../js/data/notif.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
