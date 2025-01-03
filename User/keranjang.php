<?php

include '../php/user/keranjang_index.php';
include '../php/user/beli.php';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $icon = $_SESSION['icon']; // success, error, warning, info
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'top-end',
                icon: '{$icon}',
                title: '{$message}',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
    ";
    unset($_SESSION['message']);
    unset($_SESSION['icon']);
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang</title>

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
    <link rel="stylesheet" href="../style/user/css/style.css?v=3" type="text/css">

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
    <li>
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
                        
    <li class="active">
        <a href="./keranjang.php">
            <img src="../Assets/logo/keranjang.png" alt="keranjang" style="left: 30px; width: 40px; height: 40px;">
KERANJANG
        </a>
    </li>
                   
    <li >
        <a href="./service.php">
            <img src="../Assets/logo/service.png" alt="Service" style="left: 20px; width: 40px; height: 40px;">
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
                        <div class="price">Rp:<?php echo isset($userData['saldo_user']) ? number_format($userData['saldo_user'], 2, ',', '.') : '0,00'; ?></div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Keranjang</h4>
                        <div class="breadcrumb__links">
                            <a href="./home.php">Home</a>
                            <span>Keranjang</span>
                        </div>
                    </div>
              
    </section>
      

<div class="container mt-5">
    <div class="row">
        <?php 
        if (isset($cart_result) && $cart_result !== 'empty' && $cart_result !== 'not_logged_in') {
        ?>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($cart_result)): ?>
                                <tr>
                                    <td>
                                        <img src="../Assets/img_data/<?php echo $row['gambar']; ?>" alt="Gambar Produk" class="img-fluid" style="max-width: 50px; height: auto;">
                                    </td>
                                    <td><?php echo $row['nama_produk']; ?></td>
                                    <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                    <td><?php echo $row['jumlah']; ?></td>
                                    <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                    <td>
                                        <a href="../php/user/keranjang_proses.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        <a href="javascript:void(0);" class="btn btn-success btn-sm beli-btn" data-id="<?php echo $row['id']; ?>">Beli</a>


                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php 
        } else {
            if ($cart_result === 'empty') {
                echo '<h2 class="text-center text-danger py-4">Keranjang Anda Kosong</h2>';
            } elseif ($cart_result === 'not_logged_in') {
                echo '<h2 class="text-center text-danger py-4">Silakan login terlebih dahulu</h2>';
            }
        }
        ?>
    </div>
</div>


<script>

document.querySelectorAll('.beli-btn').forEach(function(button) {
  button.addEventListener('click', function(event) {
      var userPhone = '<?php echo $userPhone; ?>'; 

      if (!userPhone) {
          Swal.fire({
              icon: 'warning',
              title: 'Nomor Telepon Belum Diisi',
              text: 'Silakan isi nomor telepon terlebih dahulu.',
              confirmButtonText: 'OK'
          });
      } else {
          window.location.href = 'checkout.php?id=' + this.getAttribute('data-id'); // Redirect to checkout page
      }
  });
});
</script>

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
    <script src="../js/user/maps.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    </div>
      <div id="saldo" popover>
        <?php include 'saldo.php'; ?>
      </div>



</body>

</html>