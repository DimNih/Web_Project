<?php
include '../php/data/edit.php';
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
        <link href="../style/database/database.css?v=3" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">









        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">DATA TABEL KANTIN</a>
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
                        <h1 class="mt-4">Edit Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Produk List</li>
                        </ol>
            

                        <div class="container mt-5">
    <h2 class="text-center mb-4">Edit Penjualan</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $baris['id']; ?>"> <!-- Hidden input for id -->
    <div class="form-group">
        <label for="jenis">Jenis Produk</label>
        <select class="form-control" id="jenis" name="jenis" required>
            <option value="Makanan" <?php echo ($baris['jenis'] == 'Makanan') ? 'selected' : ''; ?>>Makanan</option>
            <option value="Minuman" <?php echo ($baris['jenis'] == 'Minuman') ? 'selected' : ''; ?>>Minuman</option>
            <option value="Alat Tulis" <?php echo ($baris['jenis'] == 'Alat Tulis') ? 'selected' : ''; ?>>Alat Tulis</option>
        </select>
    </div>
    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $baris['nama_produk']; ?>" required>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="text" class="form-control" id="nama_produk" name="jumlah" value="<?php echo $baris['jumlah']; ?>" required>
    </div>
   
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $baris['harga']; ?>" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $baris['tanggal']; ?>" required>
    </div>
    <div class="form-group">
        <label for="gambar">Upload Gambar</label>
        <input type="file" class="form-control-file" id="gambar" name="gambar">
        <?php if (!empty($baris['gambar'])): ?>
            <img src="../Assets/img_data/<?php echo $baris['gambar']; ?>" alt="Current Image" class="img-thumbnail mt-2" width="150">
        <?php endif; ?>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
</form>


   
    
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

<script  >
    var labels = <?php echo json_encode($labels); ?>;
    var earningsData = <?php echo json_encode($earningsData); ?>;
    var quantityData = <?php echo json_encode($quantityData); ?>;
</script>

        <script src="../js/data/chart-data.js"></script>

    </body>
</html>
