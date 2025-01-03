<?php
include '../php/user/shop.php';

?>


<!DOCTYPE html>
<html lang="id">

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

    <style>


    </style>


    
</head>

<body>

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
                    <ul class="menu">
                        <li>
                            <a href="./home.php">
                                <img src="../Assets/logo/home.png" alt="home" style="width: 40px; height: 40px;">
                                HOME
                            </a>
                        </li>
                        <li class="active">
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
                        <li>
                            <a href="./keranjang.php">
                                <img src="../Assets/logo/keranjang.png" alt="keranjang" style="left: 27px; width: 40px; height: 40px;">
                                KERANJANG
                            </a>
                        </li>
                        <li>
                            <a href="./service.php">
                                <img src="../Assets/logo/service.png" alt="Service" style="left: 20px;width: 40px; height: 40px;">
                                SERVICE
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__nav__option">
                    <button popovertarget="saldo">
                        <img src="../Assets/logo/saldo.png" alt="saldo-isi" style="width:40px;">
                    </button>
                    <br>
                    <div class="price">Rp:<?php echo isset($row['saldo_user']) ? number_format($row['saldo_user'], 2, ',', '.') : '0,00'; ?></div>
                    <div class="canvas__open"><i class="fa fa-bars"></i></div>
                </div>
          
</header>
<!-- End Header Section -->


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./home.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
              
    </section>
    <!-- Breadcrumb Section End -->
<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <!-- Sidebar Section -->
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <!-- Search Bar -->
                    <div class="shop__sidebar__search">
                        <form action="" method="POST">
                            <input type="text" name="search" placeholder="Search by jenis or nama...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    
                    <!-- Categories Accordion -->
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div>
                                <a data-toggle="collapse" data-target="#collapseOne">Kategori</a>
                                <br>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="shop__sidebar__categories">
                                        <ul class="nice-scroll">
                                            <li><a href="?kategori=">Semua</a></li>
                                            <li><a href="?kategori=Makanan">Makanan</a></li>
                                            <li><a href="?kategori=Minuman">Minuman</a></li>
                                            <li><a href="?kategori=Alat Tulis">Alat Tulis</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Categories Accordion -->
                </div>
            </div>
            <!-- End of Sidebar Section -->
            
            <!-- Products Section -->
            <div class="col-lg-9">
                <div class="row">
                    <?php if ($hasil && mysqli_num_rows($hasil) > 0): ?>
                        <?php while ($baris = mysqli_fetch_assoc($hasil)): ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                <div class="product__item__pic" 
    style="background-image: url('../Assets/img_data/<?php echo $baris['gambar']; ?>');"
    data-aos="fade"
    data-aos-duration="600" 
    data-aos-easing="ease-in-out"
    data-aos-offset="200" 
    data-aos-once="true"
    data-aos-anchor-placement="top-bottom">
</div>


                                    <div class="product__item__text">
                                        <h6><?php echo $baris['jenis']; ?>: <?php echo $baris['nama_produk'] ?? 'Data tidak tersedia'; ?></h6>
                                        <p>Jumlah: <?php echo $baris['jumlah']; ?></p>
                                        <h5>Rp <?php echo number_format($baris['harga'], 0, ',', '.'); ?></h5>
                                        <div class="product__actions">

                                        <a href="../php/user/keranjang_proses.php?id=<?php echo $baris['id']; ?>" class="add-cart tombol-bindo">
    <img src="../Assets/logo/cart.png" alt="Keranjang" style="width: 20px; height: 20px; vertical-align: middle;">
</a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <h2 style="color: red; padding: 20px;" align="center">Tidak Ada Data</h2>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End of Products Section -->
        </div>
    </div>
</section>
<!-- Shop Section End -->
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


<script>
        AOS.init({
            offset: 200, 
            delay: 0, 
            once: true, 
        });
    </script>


    </div>
      <div id="saldo" popover>
        <?php include 'saldo.php'; ?>
      </div>



</body>

</html>