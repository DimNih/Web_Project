<?php
include '../php/data/index.php';
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dasboard</title>
        <link href="../style/database/database.css?v=3" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4 slide-in-left">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
            
                        
                                            <!-- Chart Section -->
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i>
                                    Area Diagram
                                </div>
                                <div class="card-body">
                                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                   Data Diagram
                                </div>
                                <div class="card-body">
                                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>



           
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Data Table 
                            </div>
                            <div class="card-body">
                

                            <div class="table-responsive">
    <form  method="post" action="../php/data/delete.php"  >
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
            <thead>
                <tr>
                    
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM penjualan";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama_produk'] . "</td>";
                    echo "<td>" . $row['jumlah'] . "</td>";
                    echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                    echo "<td>" . $row['tanggal'] . "</td>";
                    echo "<td>Rp " . number_format($row['jumlah'] * $row['harga'], 0, ',', '.') . "</td>";
                    echo "<td>
                    <div style='display: flex; justify-content: center; gap: 10px; align-items: center;'>
                    <a href='detail-barang.php?id=" . $row['id'] . "' class='btn btn-link btn-sm' '>
                            <img src='../Assets/logo/detail.png' alt='detail' style='width: 30px;'>
                        </a>    
                    </td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


   
    
    </tbody>
    </table>
</div>



             </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Data Kantin 2024</div>
                            <div>
                                <a href="#">Privasi Web</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/data/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../js/data/datatables-demo.js"></script>
        <script src="../js/data/notif.js"></script>

<script>
    var labels = <?php echo json_encode($labels); ?>;
    var earningsData = <?php echo json_encode($earningsData); ?>;
    var quantityData = <?php echo json_encode($quantityData); ?>;
</script>




<script src="../js/data/index.js"></script>
<script src="../js/data/chartData.js"></script>

    </body>
</html>
