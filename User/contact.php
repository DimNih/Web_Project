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
    <link href="https://fonts.googleapis.7com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../style/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../style/user/css/style.css?v=3" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="icon" type="image/x-icon" href="../Assets/logo/Logo-web/ambashop.png" sizes="16x16">


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
                                  
    <li >
        <a href="./service.php">
            <img src="../Assets/logo/service.png" alt="Service" style="left: 16px; width: 40px; height: 40px;">
SERVICE
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
