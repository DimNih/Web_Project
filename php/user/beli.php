<?php
session_start();
include '../connection/koneksi.php';

$popupMessage = "";
$balance = 0;
$userPhone = "";

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $querySaldo = "SELECT saldo_user, nama, nomer FROM user WHERE id='$userId'";
    $resultSaldo = mysqli_query($koneksi, $querySaldo);
    if ($resultSaldo && mysqli_num_rows($resultSaldo) > 0) {
        $rowSaldo = mysqli_fetch_assoc($resultSaldo);
        $balance = $rowSaldo['saldo_user'];
        $namaAkun = $rowSaldo['nama'];
        $userPhone = $rowSaldo['nomer'];
    } else {
        echo "Gagal mengambil saldo dari database.";
        exit;
    }
} else {
    echo "Pengguna tidak terautentikasi.";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $queryKeranjang = "SELECT k.jumlah AS jumlah_keranjang, p.nama_produk, p.jenis, p.harga, p.jumlah AS stok_produk, k.produk_id, p.gambar
                       FROM keranjang k
                       JOIN penjualan p ON k.produk_id = p.id
                       WHERE k.user_id = '$userId' AND k.id = '$id'";
    $resultKeranjang = mysqli_query($koneksi, $queryKeranjang);

    if ($resultKeranjang && mysqli_num_rows($resultKeranjang) > 0) {
        $productDetails = mysqli_fetch_assoc($resultKeranjang);
        $keranjangJumlah = $productDetails['jumlah_keranjang'];
        $stokProduk = $productDetails['stok_produk'];
        $hargaProduk = $productDetails['harga'];
        $namaProduk = $productDetails['nama_produk'];
        $jenisProduk = $productDetails['jenis'];
        $produkId = $productDetails['produk_id'];
        $gambarProduk = $productDetails['gambar'];
    } else {
        echo "Produk tidak ditemukan dalam keranjang!";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi OTP
        $userInputOtp = isset($_POST['otp']) ? $_POST['otp'] : '';
        $sessionOtp = isset($_SESSION['otp']) ? $_SESSION['otp'] : null;

        if ($sessionOtp && $userInputOtp == $sessionOtp) {
            unset($_SESSION['otp']); // Hapus OTP dari sesi setelah diverifikasi
            $_SESSION['otp_verified'] = true;

            $nomer = $_POST['nomer'] ?? '';
            $alamat = $_POST['alamat'] ?? '';
            $beli = isset($_POST['beli']) ? (int)$_POST['beli'] : 0;

            if (empty($nomer)) {
                $_SESSION['message'] = 'Harap isi nomor telepon Anda terlebih dahulu!';
                $_SESSION['icon'] = 'warning';
                header("Location: your_redirect_page.php");
                exit;
            }

            $queryAlamat = "SELECT * FROM user WHERE alamat='$alamat' AND nomer='$nomer'";
            $resultAlamat = mysqli_query($koneksi, $queryAlamat);

            if ($resultAlamat && mysqli_num_rows($resultAlamat) > 0) {
                $totalHarga = $hargaProduk * $beli;

                if ($beli > 0 && $keranjangJumlah >= $beli && $stokProduk >= $beli) {
                    if ($balance >= $totalHarga) {
                        $newStokProduk = $stokProduk - $beli;
                        $newJumlahKeranjang = $keranjangJumlah - $beli;
                        $newBalance = $balance - $totalHarga;

                        $updateProdukQuery = "UPDATE penjualan SET jumlah = jumlah - '$beli' WHERE id = '$produkId'";
                        $updateKeranjangQuery = "UPDATE keranjang SET jumlah = jumlah - '$beli' WHERE id = '$id' AND user_id = '$userId'";
                        $updateSaldoQuery = "UPDATE user SET saldo_user = '$newBalance' WHERE id = '$userId'";

                        if (mysqli_query($koneksi, $updateProdukQuery) && mysqli_query($koneksi, $updateKeranjangQuery) && mysqli_query($koneksi, $updateSaldoQuery)) {
                            $queryProsesBeli = "SELECT * FROM Proses_beli WHERE id_beli='$id'";
                            $resultProsesBeli = mysqli_query($koneksi, $queryProsesBeli);

                            if (mysqli_num_rows($resultProsesBeli) > 0) {
                                $updateProsesBeliQuery = "UPDATE Proses_beli 
                                                          SET Nama_Pembeli = '$namaAkun', 
                                                              Saldo_Dapat = Saldo_Dapat + '$totalHarga', 
                                                              Jumlah_Beli = Jumlah_Beli + '$beli' 
                                                          WHERE id_beli = '$id'";
                                mysqli_query($koneksi, $updateProsesBeliQuery);
                            } else {
                                $insertProsesBeliQuery = "INSERT INTO Proses_beli (id_beli, Nama_Pembeli, Saldo_Dapat, Jumlah_Beli, Tanggal) 
                                                          VALUES ('$id', '$namaAkun', '$totalHarga', '$beli', CURRENT_TIMESTAMP)";
                                mysqli_query($koneksi, $insertProsesBeliQuery);
                            }

                            $_SESSION['balance'] = $newBalance;
                            header("Location: ../User/shop.php");
                            exit;
                        } else {
                            $popupMessage = "Gagal memperbarui data pembelian!";
                        }
                    } else {
                        $popupMessage = "Saldo tidak mencukupi!";
                    }
                } else {
                    $popupMessage = "Jumlah beli tidak valid atau stok tidak mencukupi!";
                }
            } else {
                $popupMessage = "Informasi pengguna tidak valid!";
            }
        } else {
            echo '<script>
                    Swal.fire({
                        title: "Gagal",
                        text: "OTP yang Anda masukkan salah. Silakan coba lagi.",
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.history.back();
                    });
                  </script>';
        }
    }
}
?>
