-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2024 at 02:37 AM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `saldo_dapat` int DEFAULT NULL,
  `sandi` text NOT NULL,
  `profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `saldo_dapat`, `sandi`, `profile_picture`) VALUES
(1, 'dimas', 'dimas@gmail.com', 1270100, '987', ''),
(4, 'admin', 'admin@gmail.com', 1710110, 'kintol', 'Xiomi_14.png');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int NOT NULL,
  `id_produk` int NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah` int NOT NULL,
  `tujuan_keluar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int NOT NULL,
  `id_produk` int NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `produk_id` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('in_cart','purchased') DEFAULT 'in_cart',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `user_id`, `produk_id`, `nama_produk`, `jenis_produk`, `harga`, `jumlah`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(19, 29, 2, 'Kebab', 'Makanan', 6000.00, 0, 6000.00, 'in_cart', '2024-11-29 16:15:15', '2024-11-30 15:54:14'),
(20, 29, 4, 'Sosis', 'Makanan', 2000.00, 1, 2000.00, 'in_cart', '2024-11-29 16:42:33', '2024-11-29 16:42:33'),
(21, 29, 10, 'Es Cendol', 'Minuman', 5000.00, 1, 5000.00, 'in_cart', '2024-11-29 17:29:18', '2024-11-29 17:29:18'),
(22, 34, 1, 'AyamGoreng', 'Makanan', 5000.00, 1, 5000.00, 'in_cart', '2024-11-29 22:23:31', '2024-11-29 22:23:31'),
(24, 35, 2, 'Kebab', 'Makanan', 6000.00, 1, 6000.00, 'in_cart', '2024-12-02 02:17:07', '2024-12-02 02:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int NOT NULL,
  `jenis` text COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `total` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `beli` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `jenis`, `nama_produk`, `jumlah`, `harga`, `total`, `tanggal`, `gambar`, `beli`) VALUES
(1, 'Makanan', 'AyamGoreng', 93, 5000.00, 50000, '2024-11-12', 'AyamGoreng.jpeg', NULL),
(2, 'Makanan', 'Kebab', 3, 6000.00, 60000, '2024-11-07', 'Kebab.jpg', NULL),
(3, 'Makanan', 'Kentang Goreng', 10, 3000.00, 30000, '2024-11-13', 'kentangGoreng.jpeg', NULL),
(4, 'Makanan', 'Sosis', 20, 2000.00, 40000, '2024-11-13', 'Sosis.jpeg', NULL),
(5, 'Makanan', 'Tempe Goreng', 50, 1000.00, 50000, '2024-11-20', 'TempeGoreng.jpeg', NULL),
(6, 'Makanan', 'Tahu Goreng', 50, 1000.00, 50000, '2024-11-14', 'TahuGoreng.jpeg', NULL),
(7, 'Makanan', 'Piattos', 20, 5000.00, 100000, '2024-11-29', 'Piattos.jpg', NULL),
(8, 'Makanan', 'Garry', 20, 4000.00, 80000, '2024-11-13', 'garry.jpeg', NULL),
(9, 'Minuman', 'Es Teh', 50, 3000.00, 150000, '2024-11-17', 'EsTeh.png', NULL),
(10, 'Minuman', 'Es Cendol', 50, 5000.00, 250000, '2024-11-20', 'EsCendol.jpeg', NULL),
(11, 'Minuman', 'Es Buah', 50, 10000.00, 500000, '2024-11-06', 'EsBuah.jpeg', NULL),
(12, 'Alat Tulis', 'Pulpen', 100, 3000.00, 300000, '2024-11-12', 'Pulpen.jpeg', NULL),
(13, 'Alat Tulis', 'Kertas', 500, 500.00, 250000, '2024-11-19', 'Kertas.jpeg', NULL),
(14, 'Alat Tulis', 'Buku Tulis', 100, 2000.00, 200000, '2024-11-14', 'BukuTulis.jpeg', NULL),
(15, 'Alat Tulis', 'Pensil Warna', 100, 10000.00, 1000000, '2024-11-21', 'PensilWarna.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Proses_beli`
--

CREATE TABLE `Proses_beli` (
  `id_beli` int NOT NULL,
  `Nama_Pembeli` varchar(255) NOT NULL,
  `Saldo_Dapat` int NOT NULL,
  `Jumlah_Beli` int NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Proses_beli`
--

INSERT INTO `Proses_beli` (`id_beli`, `Nama_Pembeli`, `Saldo_Dapat`, `Jumlah_Beli`, `tanggal`) VALUES
(1, 'dimas', 46667, 16, '2024-11-27 09:10:32'),
(2, 'dimas', 63667, 17, '2024-11-26 12:57:30'),
(3, 'dimas', 41667, 12, '2024-11-26 12:14:50'),
(17, 'dimas', 3000, 1, '2024-11-29 16:12:15'),
(18, 'dimas', 5000, 1, '2024-11-29 16:15:12'),
(19, 'dimas', 36000, 6, '2024-11-29 16:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` int NOT NULL,
  `jumlah_saldo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `jumlah_saldo`) VALUES
(1, 11193000.99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sandi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `saldo_user` int NOT NULL DEFAULT '0',
  `profile_picture` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomer` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `sandi`, `alamat`, `saldo_user`, `profile_picture`, `nomer`) VALUES
(29, 'DimasNih', 'admin@gmail.com', 'kintol', 'Pesona Gading 1', 4310000, 'Cuplikan layar dari 2024-11-30 18-46-32.png', '81585261728'),
(34, 'DIMAS samsudin24', 'dimaserlansyah5@gmail.com', NULL, NULL, 0, 'ACg8ocJPulYsEeBZ88PtrbkLdNXreTZLtYXzC9vHRFWIchp_Kdzwksji=s96-c', '0'),
(35, 'DIMAS Erlansyah', 'dd0613987@gmail.com', NULL, 'Cibitung', 0, 'ACg8ocJKTacdk-atqlcJWA_BnU4hcDPe6PzmIgCMV62PubnAuPa_Uc44=s96-c', '81585261728');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `barang_masuk_ibfk_1` (`id_produk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Proses_beli`
--
ALTER TABLE `Proses_beli`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Proses_beli`
--
ALTER TABLE `Proses_beli`
  MODIFY `id_beli` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `penjualan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
