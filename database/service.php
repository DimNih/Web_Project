<?php
include 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>


        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link href="../style/database/database.css?v=2" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-database.js"></script>


<script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="sb-nav-fixed">



        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">DATA TABEL KANTIN</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <a style="color:white;" >Saldo Anda: <?php echo number_format($saldo_dapat, 2); ?> </a> 
           
        </div>
                </div>
                </form>
                <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item">
        <?php if (!empty($_SESSION['admin_gambar'])): ?>
            <img src="../Assets/about/profil/<?php echo htmlspecialchars($_SESSION['admin_gambar']); ?>" alt="Admin Image" class="profile-img">
        <?php else: ?>
            <img src="../Assets/about/profil/default.jpg" alt="Default Admin Image" class="profile-img">
        <?php endif; ?>
    </li>
</ul>
</nav>


        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">HOME</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu</div>

                            <a class="nav-link collapsed" href="tabel.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tabel
                                </a>

                            <a class="nav-link collapsed" href="barang-masuk.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Barang Masuk
                                </a>

                                <a class="nav-link collapsed" href="barang-keluar.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Barang Keluar
                                </a>

                                <a class="nav-link collapsed" href="Pembeli.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pembelian 
                                </a>
                           
                           
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="riwayat.php" >
                                        Riwayat Barang
                                        </a>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login-admin.php">Login</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                            <a class="nav-link" href="service.php">Service Customer</a>
                                        </nav>
                                </nav>
                                </div>
                                

                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo htmlspecialchars($admin_name); ?>
                    </div>
                </nav>
            </div>
        
        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <!-- Chat Container -->
                <div class="container py-5">
                    <div class="card shadow mx-auto" style="max-width: 750px;">
                        <div class="card-header bg-success text-white text-center">
                            <h4 class="mb-0">Chat dengan User</h4>
                        </div>

                        <div class="card-body">
                            <div id="chat-container" class="chat-container border rounded p-3 mb-3" style="height: 400px; overflow-y: auto; background-color: #f9f9f9;">
                            
                            </div>

                            <div class="d-flex align-items-center gap-3 mx-auto" style="max-width: 700px;">

  <button class="btn btn-light border" id="attach-file" title="Unggah File" style="width: 40px; height: 40px;">
    <i class="bi bi-paperclip" style="font-size: 20px;"></i>
</button>

<input type="file" id="file-input" style="display: none;" />



                                <textarea id="message" class="form-control" rows="2" placeholder="Ketik pesan..." style="resize: none; font-size: 16px; width: 75%;"></textarea>

                                <button id="send-message" class="btn btn-success" style="width: 50px; height: 50px;">
                                    <i class="bi bi-send" style="font-size: 24px;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        

    <!-- Footer -->
    <footer class="py-4 bg-light mt-4">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Data Kantin 2024</div>
                <div>
                    <a href="#">Privasi Web</a> &middot; <a href="#">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer>


    <script>
    $('#attach-file').click(function() {
        $('#file-input').click(); 
    });

    $('#file-input').change(function() {
        var fileName = $(this).val().split('\\').pop(); 
        console.log('File selected:', fileName); 
    });
</script>





        <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/data/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../js/data/datatables-demo.js"></script>
        <script src="../js/data/notif.js"></script>
        <script src="../js/data/chatAdmin.js"></script>


    </body>
</html>
