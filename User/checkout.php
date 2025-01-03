<?php
include '../php/user/beli.php';

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>

    <link rel="icon" type="image/x-icon" href="../Assets/logo/Logo-web/ambashop.png" sizes="16x16">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../style/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/style.css?v=4" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">



    
</head>

<body>


<?php if (!empty($responseMessage)): ?>
        <script>
            Swal.fire({
                title: "Informasi",
                text: "<?php echo $responseMessage; ?>",
                icon: "<?php echo strpos($responseMessage, 'berhasil') !== false ? 'success' : 'error'; ?>",
                confirmButtonText: "OK"
            });
        </script>
    <?php endif; ?>



    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="login.php">Sign in</a>
                
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Terima Kasih Sudah Berkunjung.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->



    <div class="header__logo">
                    </div>

    <!-- Header Section Begin -->
    <header class="header">
        


        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-3">
                
                <div class="logo">
    <a href="./home.php"><img src="../Assets/logo/produk.png" alt="Logo"></a>
</div>


                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>

                        <li>
        <a href="./home.php">
            <img src="../Assets/logo/home.png" alt="home" style="width: 40px; height: 40px;">
            HOME
        </a>
    </li>
    <li  >
        <a href="./shop.php">
            <img src="../Assets/logo/shop.png" alt="shop" style="width: 40px; height: 40px;">
            SHOP
        </a>
    </li>
    <li>
        <a href="./contact.php">
            <img src="../Assets/logo/kontak.png" alt="kontak/about" style="width: 40px; height: 40px;">
            ABOUT
        </a>
    </li>
                        
    <li class="active" >
        <a href="./keranjang.php">
            <img src="../Assets/logo/keranjang.png" alt="keranjang" style="left: 25px; width: 40px; height: 40px;">
KERANJANG
        </a>
    </li>
              
    <li >
        <a href="./service.php">
            <img src="../Assets/logo/service.png" alt="Service" style="left: 25px; width: 40px; height: 40px;">
SERVICE
        </a>
    </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <button popovertarget="saldo" ><img src="../Assets/logo/saldo.png" alt="saldo-isi" style="width:30px;"> </button>
                        <br>
                        <div class="price">Rp:<?php echo isset($rowSaldo['saldo_user']) ? number_format($rowSaldo['saldo_user'], 2, ',', '.') : '0,00'; ?></div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <!--  End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Silahkan Beli</h4>
                        <div class="breadcrumb__links">
                            <a href="./home.php">Home</a>
                            <span>Pembelian</span>
                        </div>
                    </div>
              
    </section>

    <section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form method="post" action="checkout.php?id=<?php echo $id; ?>">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="product__item__pic" style="background-image: url('../Assets/img_data/<?php echo $gambarProduk; ?>');">

                            <br>
                        </div>
                        <br>
                    </div>

                    <!-- Product Details Section -->
                    <div class="col-lg-4 col-md-6">
                        <h6 class="checkout__title">Detail Pembelian</h6>
                        <div class="checkout__input">
                            <p>Jenis: <span><?php echo $productDetails['jenis'] ?? ''; ?></span></p>
                        </div>
                        <div class="checkout__input">
                            <p>Nama Produk: <span><?php echo $productDetails['nama_produk'] ?? ''; ?></span></p>
                        </div>
                        <div class="checkout__input">
                            <p>Jumlah di Keranjang: <span><?php echo $keranjangJumlah; ?></span></p>  <!-- Menampilkan jumlah dari keranjang -->
                        </div>
                        <div class="checkout__input">
                            <p>Harga: <span>Rp <?php echo number_format($productDetails['harga'], 2, ',', '.'); ?></span></p>
                        </div>
                        <div class="checkout__input">
                            <p>Total Harga: <span>Rp <?php echo number_format($productDetails['harga'] * $keranjangJumlah, 2, ',', '.'); ?></span></p>  <!-- Menghitung total harga berdasarkan jumlah di keranjang -->
                        </div>
                    </div>

                    <!-- Input for Quantity to Buy -->
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__input">
                            <p>Jumlah yang ingin dibeli: <span>*</span></p>
                            <input type="number" name="beli" required min="1" max="<?php echo $keranjangJumlah; ?>" value="<?php echo $keranjangJumlah; ?>" placeholder="Jumlah di keranjang: <?php echo $keranjangJumlah; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- User Info Input Section -->
                    <div class="col-lg-12">
                        <div class="checkout__input">
                            <p>Nomor Telepon: <span>*</span></p>
                            <input type="text" name="nomer" required placeholder="Masukkan nomor telepon">
                        </div>
                        <div class="checkout__input">
                            <p>Otp: <span>*</span></p>
                            <input type="number" name="otp" required placeholder="Masukan OTP yang diterima melalui WhatsApp">
                        </div>
                        <div class="checkout__input">
                            <p>Alamat: <span>*</span></p>
                            <input type="text" name="alamat" required placeholder="Masukkan alamat lengkap">
                        </div>
                    </div>
                </div>



                <!-- Submit Button -->
                <div class="checkout__submit">
                    <button type="submit" name="submit" class="site-btn">Proses Pembelian</button>
                </div>
            </form>
        </div>
<br>

<form method="POST" action="../php/user/send-otp.php">
    <button type="submit">Send OTP</button>
</form>




    </div>
</section>



<footer class="footer bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 mb-4">
                <div class="footer__about">
                    <div class="footer__logo mb-3">
                    </div>
                    <p>Lakukan yang terbaik di setiap kesempatan. Anda tidak pernah tahu pintu mana yang akan terbuka untuk Anda.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="footer__widget">
                    <h5 class="mb-3">Hubungi Saya</h5>
                    <p>Silakan tinggalkan pesan:</p>
                    <form action="../php/user/email.php" method="post" class="mb-3">
                        <div class="input-group">
                            <input name="message" type="text" class="form-control" placeholder="Ketik Pesan Kamu" required>
                            <button type="submit" class="btn btn-outline-light"><i class="icon_mail_alt"></i> Kirim</button>
                        </div>
                    </form>
                    <div class="hero__social">

                    <a href="https://www.facebook.com/kontollodon.kontollodon.3194?mibextid=ZbWKwL" target="_blank" class="text-white me-2"><i class="fa fa-facebook"></i></a>
                        <a href="https://youtube.com/@dimaserlan7395?si=aaToXVsZ7Z-S4amh" target="_blank"class="text-white me-2"><i class="fa fa-youtube"></i></a>
                        <a href="https://www.instagram.com/dimrozok?igsh=anFzYWp1Zm5ybDdl" target="_blank"class="text-white me-2"><i class="fa fa-instagram"></i></a>
                        <a href="https://github.com/DimNih" target="_blank"class="text-white"><i class="fa fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <p class="mb-0">&copy; 
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    Shop Kantin by Dimas.E
                </p>
            </div>
        </div>
    </div>
</footer>


    <!-- Js Plugins -->
    <script src="../js/user//jquery-3.3.1.min.js"></script>
    <script src="../js/user/bootstrap.min.js"></script>
    <script src="../js/user/jquery.nice-select.min.js"></script>
    <script src="../js/user/jquery.nicescroll.min.js"></script>
    <script src="../js/user/jquery.magnific-popup.min.js"></script>
    <script src="../js/user/jquery.countdown.min.js"></script>
    <script src="../js/user/jquery.slicknav.js"></script>
    <script src="../js/user/mixitup.min.js"></script>
    <script src="../js/user/owl.carousel.min.js"></script>
    <script src="../js/user/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>


    </div>
      <div id="saldo" popover>
        <?php include 'saldo.php'; ?>
      </div>



</body>

</html>