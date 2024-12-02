<?php

include '../php/user/profil.php';



?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontak AmbaShop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../style/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/style.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />



</head>

<body>
    


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


    <!-- Offcanvas Menu End -->
    <header class="header">
        
        </div>
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

                        <li >
                            <a href="./home.php">
                                <img src="../Assets/logo/home.png" alt="home" style="width: 40px; height: 40px;">
                                HOME
                            </a>
                        </li>
                        <li>
                            <a href="./shop.php">
                                <img src="../Assets/logo/shop.png" alt="shop" style="width: 40px; height: 40px;">
                                SHOP
                            </a>
                        </li>
                        <li class="active" >
                            <a href="./contact.php">
                                <img src="../Assets/logo/kontak.png" alt="kontak/about" style="width: 40px; height: 40px;">
                                ABOUT
                            </a>
                        </li>
                                            
                        <li>
                            <a href="./keranjang.php">
                                <img src="../Assets/logo/keranjang.png" alt="keranjang" style="left: 25px; width: 40px; height: 40px;">
                    KERANJANG
                            </a>
                        </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <!-- Profile Section -->
                <div class="profile-card">
                    <div class="row">
                        <div class="col-md-4 text-center profile-avatar">
                            <?php
                            // Display default profile picture if not set
                            if ($profile) {
                                echo '<img src="../Assets/about/profil/' . $profile . '" alt="User Avatar">';
                            } else {
                                echo '<img src="../Assets/user_avatar.png" alt="User Avatar">';
                            }
                            ?>
                        </div>
                        <div class="col-md-8">
                            <div class="profile-header">
                                <h2><?php echo $username; ?></h2>
                                <p><strong>Email:</strong> <?php echo $email; ?></p>
                                <p><strong>Nomer Phone:</strong> <?php echo $nomer; ?></p>
                                <p><strong>Saldo Anda:</strong> Rp <?php echo number_format($saldo, 0, ',', '.'); ?></p>
                                <p><strong>Alamat Anda:</strong><?php echo htmlspecialchars($alamat); ?> </p>
                            </div>
                            <div class="profile-info">
                                <a href="./edit_profile.php" class="btn-edit">Edit Profile</a>
                                <a href="../php/user/login/logout.php" class="btn-edit">LOGOUT</a>
                                
                            </div>
                        </div>
                    </div>
                </div>




    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
                <div id="map" data-alamat="<?php echo addslashes($alamat); ?>"></div>


                <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                <script src="../js/user/maps.js"></script>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>




<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="img/footer-logo.png" alt=""></a>
                    </div>
                    <p>Lakukan yang terbaik di setiap kesempatan. Anda tidak pernah tahu pintu mana yang akan terbuka untuk Anda.</p>
                    <a href="#"><img src="img/payment.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>Hubungi Saya</h6>
                    <div class="footer__newslatter">
                        <p>Jangan Spam Kontol!</p>
                        <form action="../php/user/email.php" method="post">
                            <input name="message" placeholder="Ketik Pesan Kamu" required>
                            <button type="submit"><span class="icon_mail_alt"></span> Send</button>
                        </form>
                        <div class="hero__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright__text">
                    <p>
                        &copy; Copyright
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Shop Kantin by Dimas.E
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->



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


</body>

</html>
