-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 07:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `namaGudang` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `namaGudang`, `id_user`) VALUES
(1, 'PapiKost', 1),
(2, 'MamiKost', 1),
(4, 'Coba Gudang', 2),
(5, 'gudang garam', 3),
(6, 'mmm', 4),
(7, 'gudang', 5),
(9, 'kamadino', 6),
(10, 'xxx', 7),
(11, 'aaa', 7),
(12, 'konveksi', 8),
(13, 'konveksi2', 8),
(15, 'COBAGUDANG', 9),
(16, 'HAHA', 9),
(17, 'Jamet', 10),
(18, 'COBAAN', 10),
(20, 'Arez', 11),
(21, 'JuanKost', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga_beli` int(64) DEFAULT NULL,
  `harga_jual` int(64) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `jumlah` int(64) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama`, `harga_beli`, `harga_jual`, `tipe`, `merk`, `jumlah`, `photo`, `id_gudang`) VALUES
(9, 'Tolak Angin', 1000, 2000, 'Kesehatan', 'Sido Muncul', 90, '1671256576-1-1670499161-tolak_angin.jpeg', 1),
(10, 'coba1', 300, 400, 'Film & Musik', 'coba', 12, '1671275089-home 1-01 1.png', 4),
(11, 'Tolak Angin', 2000, 3000, 'Kesehatan', 'cap badak', 2, '1671602202-dodo.jpg', 5),
(13, 'Tolak Angin', -999, -9999, 'Clothing Brand', 'portugal', -10004, '1671606966-dodo.jpg', 11),
(14, 'bebasgcfv', 200, 100, 'Buku', 'abc', -888, '1671607326-dodo.jpg', 13),
(15, 'khjb900', 900, 45467, 'Komputer dan Laptop', 'toshiba', 11345, '1671607399-Group 67.png', 13),
(18, 'Tolak Angin', 11, 12, 'Buku', 'coba', 4, '1672970131-WhatsApp Image 2022-12-26 at 12.36.55.jpeg', 15),
(20, 'Reiky', 1, 2, 'Buku', 'portugal', 12, '1672970629-dodo.jpg', 18),
(26, 'Susu Beruang', 7000, 8200, 'Kesehatan', 'Nestle', 210, '1674208622-susu beruang.jpg', 1),
(27, 'OBH Combi', 16000, 21000, 'Kesehatan', 'Combiphar', 20, '1674208860-OBH.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `jenisStok` varchar(255) NOT NULL,
  `jumlah` int(64) NOT NULL,
  `tanggal` date NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `jenisStok`, `jumlah`, `tanggal`, `id_product`, `id_gudang`) VALUES
(18, 'Stok Keluar', 2, '2022-12-21', 11, 5),
(19, 'Stok Masuk', 23, '2022-12-21', 9, 1),
(20, 'Stok Keluar', 12, '2022-12-21', 9, 1),
(21, 'Stok Masuk', 10, '2022-12-21', 9, 1),
(25, 'Stok Keluar', 9999, '1222-12-12', 13, 11),
(26, 'Stok Masuk', 12, '2022-12-07', 14, 13),
(27, 'Stok Keluar', 1000, '2022-12-30', 14, 13),
(28, 'Stok Keluar', 1000, '2022-12-06', 15, 13),
(30, 'Stok Masuk', 2, '2023-01-07', 9, 1),
(34, 'Stok Masuk', 5, '2023-01-06', 18, 15),
(35, 'Stok Keluar', 3, '2023-01-06', 18, 15),
(36, 'Stok Keluar', 3, '2023-01-06', 18, 15),
(37, 'Stok Masuk', 5, '2023-01-06', 18, 15),
(38, 'Stok Keluar', 2, '2023-01-06', 18, 15),
(41, 'Stok Masuk', 5, '2023-01-06', 9, 1),
(42, 'Stok Keluar', 39, '2023-01-06', 9, 1),
(101, 'Stok Masuk', 10, '2023-01-20', 9, 1),
(102, 'Stok Masuk', 79, '2023-01-20', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'juan@gmail.com', 'juan'),
(2, 'abc@gmail.com', 'abc'),
(3, 'abcd@gmail.com', 'abcd'),
(4, 'mmm@mm.com', '1234'),
(5, 'bela@gmail.com', '123'),
(6, 'rizal@gmail.com', '123'),
(7, 'naela@gmail.com', '111111'),
(8, 'adiv@gmail.com', '1234'),
(9, 'admin@gmail.com', '123'),
(10, 'Coba2@gmail.com', 'coba2'),
(11, 'parez@gmail.com', '123'),
(12, '123@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_gudang` (`id_gudang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
