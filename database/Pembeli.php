<?php
include '../php/data/pembeli.php';

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
        <link href="../style/database/database.css?v=1" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>

    </head>
    <body class="sb-nav-fixed">



        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">DATA TABEL KANTIN</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
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
            <h1 class="mt-4">DETAIL PRODUK TERJUAL</h1>

            <div class="card mb-4">
                <div class="card-header">
                    Detail Produk
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    Total Produk Terjual: <strong><?php echo number_format($total_produk_terjual); ?></strong>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    Pendapatan: <strong>Rp<?php echo number_format($total_pendapatan, 2, ',', '.'); ?></strong>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                                                <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Rate Penjualan
                                </div>
                                <div class="card-body">
                                    <canvas id="myLineChart" style="width:100%;max-width:700px"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>

                    <form method="post" action="Pembeli.php">
                        <label for="saldo_dapat">Enter Saldo to Add:</label>
                        <input type="number" name="saldo_dapat" id="saldo_dapat" placeholder="Enter amount" required>
                        <button type="submit">Add Saldo</button>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../js/data/datatables-demo.js"></script>
        <script src="../js/data/notif.js?v=2"></script>
        <script src="../js/data/chartData.js"></script>

        <script src="../js/data/index.js"></script>
<script src="../js/data/chartData.js"></script>


<?php
$months = json_encode($months); 
$totals = json_encode($totals); 
?>

<script>
var months = <?php echo $months; ?>;
var totals = <?php echo $totals; ?>;

var ctxL = document.getElementById('myLineChart').getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line', 
    data: {
        labels: months.map(function(month) {
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            return monthNames[month - 1];  
        }),
        datasets: [{
            label: 'Sales (Beli)',
            data: totals,  
            backgroundColor: 'rgba(75, 192, 192, 0.2)', 
            borderColor: 'rgba(75, 192, 192, 1)', 
            borderWidth: 2,
            pointBackgroundColor: 'rgba(75, 192, 192, 1)', 
            pointRadius: 5,
            fill: true 
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 10, 
                },
            },
            x: {
                title: {
                    display: true,
                    text: 'Months',
                    font: {
                        weight: 'bold'
                    }
                }
            }
        },
        plugins: {
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.7)',
                titleColor: 'white',
                bodyColor: 'white',
                callbacks: {
                    label: function(tooltipItem) {
                        return 'Sales: ' + tooltipItem.raw + ' units';
                    }
                }
            }
        },
        interaction: {
            mode: 'index',
            intersect: false
        },
        elements: {
            line: {
                tension: 0.4 
            }
        }
    }
});

</script>

    </body>
</html>
