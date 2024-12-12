<?php
// Mengaktifkan tampilan error untuk membantu debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mendapatkan pesan dari POST
if (isset($_POST['message'])) {
    $message = $_POST['message'];
} else {
    echo json_encode(['error' => 'Pesan tidak diterima.']);
    exit();
}

// Menghubungkan ke Database (MySQL)
$servername = "localhost";
$username = "root";
$password = "DimasPenjualan123";
$dbname = "penjualan_db"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk mencari nama produk yang cocok
function findProduct($message) {
    // Ubah pesan ke huruf kecil untuk pencocokan yang lebih fleksibel
    $message = strtolower($message);

    // Daftar produk yang dikenal (bisa diambil dari database atau lebih fleksibel)
    $knownProducts = ['ayam goreng', 'kebab', 'kentang goreng', 'sosis', 'tempe goreng', 'tahu goreng', 'piattos', 'garry', 'es teh', 'es cendol', 'es buah'];

    // Pencocokan produk yang disebutkan dalam pesan
    foreach ($knownProducts as $product) {
        if (strpos($message, $product) !== false) {
            return $product;
        }
    }

    return null; // Jika tidak ada produk yang cocok
}

// Mencari produk yang disebutkan dalam pesan
$product = findProduct($message);

if ($product) {
    // Gunakan real_escape_string untuk mencegah SQL injection
    $product = $conn->real_escape_string($product);

    // Query untuk mencari jumlah produk berdasarkan nama
    $sql = "SELECT jumlah FROM penjualan WHERE LOWER(nama_produk) = '$product'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Jika produk ditemukan, ambil jumlah produk
        $row = $result->fetch_assoc();
        $jumlahProduk = $row['jumlah'];

        // Jika jumlah produk ditemukan
        if ($jumlahProduk > 0) {
            echo json_encode([
                'product' => $product,
                'jumlah' => $jumlahProduk,
                'message' => "Jumlah $product yang tersedia: $jumlahProduk"
            ]);
        } else {
            // Jika jumlah produk 0 atau tidak ada
            echo json_encode([
                'product' => $product,
                'jumlah' => 0,
                'message' => "Stok $product tidak tersedia."
            ]);
        }
    } else {
        // Jika produk tidak ditemukan dalam database
        echo json_encode([
            'error' => "Produk '$product' tidak ditemukan di database."
        ]);
    }
} else {
    // Jika tidak ada produk yang disebutkan atau ditemukan
    echo json_encode([
        'error' => 'Produk tidak disebutkan atau tidak tersedia.'
    ]);
}

// Menutup koneksi ke database
$conn->close();
?>
