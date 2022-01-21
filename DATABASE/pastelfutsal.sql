-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 01:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pastelfutsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar_transfer`
--

CREATE TABLE `bayar_transfer` (
  `id_bayar` int(11) NOT NULL,
  `id_book` varchar(10) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `rek_kirim` varchar(30) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `rek_tujuan` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar_transfer`
--

INSERT INTO `bayar_transfer` (`id_bayar`, `id_book`, `total_bayar`, `rek_kirim`, `atas_nama`, `rek_tujuan`, `status`, `bukti_bayar`, `tanggal`) VALUES
(1, 'KB00000002', 120000, '0023092', 'kevin', 'bca', 'Selesai', 'aji.JPG', '2021-06-19'),
(2, 'KB00000004', 120000, '3432', 'kevin', 'bca', 'Selesai', 'aji.JPG', '2021-06-20'),
(3, 'KB00000005', 120000, '0023092', 'kevin', 'bca', 'Selesai', 'contoh.JPG', '2021-06-24'),
(4, 'KB00000006', 240000, '0023092', 'kevin', 'bca', 'Selesai', 'aji.JPG', '2021-06-24'),
(5, 'KB00000007', 120000, '3432', 'kevin', 'bca', 'Booking', 'aji.JPG', '2021-06-30'),
(6, 'KB00000008', 240000, '3432', 'kevin', 'bca', 'Menunggu Konfirmasi admin', 'aji.JPG', '2021-06-30'),
(7, 'KB00000009', 240000, '3432', 'kevin', 'bca', 'Menunggu Konfirmasi admin', 'dik.JPG', '2021-06-30'),
(8, 'KB00000010', 120000, '0023092', 'kevin', 'bca', 'Booking', 'aji.JPG', '2021-07-01'),
(9, 'KB00000011', 120000, '0023092', 'kevin', 'bca', 'Selesai', 'aji.JPG', '2021-07-02'),
(10, 'KB00000012', 120000, '3432', 'kevin', 'bca', 'Booking', 'bukti-pembayaran-STAIM0002.jpg', '2021-07-02'),
(11, 'KB00000013', 240000, '3432', 'kevin', 'bca', 'Booking', 'bukti-pembayaran-STAIM0002.jpg', '2021-07-02'),
(12, 'KB00000015', 360000, '0023092', 'kevin', 'bca', 'Menunggu Konfirmasi admin', 'bukti-pembayaran-STAIM0002.jpg', '2021-07-06'),
(13, 'KB00000016', 240000, '0023092', 'kevin', 'bca', 'Menunggu Konfirmasi admin', 'bukti-pembayaran-STAIM0002.jpg', '2021-07-07'),
(14, 'KB00000017', 1320000, '0023092', 'kevin', 'bca', 'Booking', 'Capture.JPG', '2021-07-27'),
(15, 'KB00000018', 360000, '342342', 'kevin', 'bca', 'Menunggu Konfirmasi admin', 'bnvn.JPG', '2021-12-29'),
(16, 'KB00000019', 240000, '342342', 'kevin', 'bca', 'Booking', '454.JPG', '2022-01-12'),
(17, 'KB00000020', 120000, '342342', 'kevin', 'bca', 'Booking', 'bnvn.JPG', '2022-01-12'),
(18, 'KB00000022', 105000, '324234', 'musil', 'bca', 'Booking', 'dik.JPG', '2022-01-18'),
(19, 'KB00000025', 70000, '324234', 'musil', 'bca', 'Selesai', 'dik.JPG', '2022-01-18'),
(20, 'KB00000026', 70000, '00885658', 'musil', 'bca', 'Booking', 'dik.JPG', '2022-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lapangan`
--

CREATE TABLE `tbl_lapangan` (
  `id_lapangan` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga_lapangan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lapangan`
--

INSERT INTO `tbl_lapangan` (`id_lapangan`, `judul`, `detail`, `gambar`, `harga_lapangan`) VALUES
(5, 'Lapangan 1', 'Lebar Lapangan 13,40x6,10 m', 'lapp1.jpg', 35000),
(6, 'Lapangan 2', 'Lebar Lapangan 13,40x6,10 m', 'lapp1.jpg', 35000),
(7, 'Lapangan 3', 'Lebar Lapangan 13,40x6,10 m', 'lapp1.jpg', 35000),
(8, 'Lapangan 4', 'Lebar Lapangan 13,40x6,10 m', 'lapp1.jpg', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `nama_usr` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` int(13) NOT NULL,
  `passwordd` varchar(15) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `nama_usr`, `email`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_tlp`, `passwordd`, `level`) VALUES
(5, 'admin', 'adminnnn', 'adminn@gmail.com', 'bandungg', '2021-04-08', 'bekasi', 966977766, 'admin', 'admin'),
(28, 'kevin', 'kevin Pratamaa', 'keviiin@gmail.com', 'bekasi', '2021-05-26', 'bekasiii', 872343543, 'kevin06', 'user'),
(38, 'admin2', 'admin2', 'admin2@gmail.com', 'bandung', '2021-05-05', 'bekasi', 0, 'admin2', ''),
(39, 'syifa', 'syifa', 'syifa@gmail.com', 'banjar', '2021-05-01', 'bekasi', 0, 'syifa', ''),
(40, 'admin3', 'admin4', 'admin3@gmail.com', 'surabaya', '2021-05-05', 'surabaya', 456654345, 'admin3', 'admin'),
(42, 'musil', 'musil', 'musil@gmail.com', 'bandung', '2021-05-13', 'bekasi', 43534533, 'musil', 'user'),
(49, 'lia', 'liaaa', 'lia@gmail.com', 'bekasiii', '2021-05-06', 'bekasiii', 872343543, 'lia', 'user'),
(51, 'beni', 'beni', 'beni@gmail.com', 'bekasi', '1997-09-15', 'bekasii', 2147483647, 'beni', 'user'),
(52, 'andika', 'andika febryanto', 'andika@gmail.com', 'bekasi', '1996-02-02', 'bekasii', 353453455, 'andika3', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_book` varchar(10) NOT NULL,
  `id_user` int(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `id_lapangan` varchar(5) NOT NULL,
  `tgl_book` datetime NOT NULL,
  `batas_bayar` date NOT NULL,
  `tgl_main` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `jenis_bayar` varchar(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_book`, `id_user`, `username`, `atas_nama`, `id_lapangan`, `tgl_book`, `batas_bayar`, `tgl_main`, `jam_mulai`, `jam_berakhir`, `jenis_bayar`, `total_harga`, `status`) VALUES
('KB00000001', 0, 'lia', 'kevin', '1', '2021-05-23 15:31:02', '2021-05-23', '2021-05-23', '00:00:00', '01:00:00', 'cod', 120000, 'Selesai'),
('KB00000002', 0, 'lia', 'kevin', '1', '2021-06-19 20:25:18', '2021-06-20', '2021-06-20', '08:00:00', '09:00:00', 'transfer', 120000, 'Selesai'),
('KB00000003', 0, 'lia', 'kevin', '1', '2021-06-20 18:49:15', '2021-06-20', '2021-06-20', '22:00:00', '23:00:00', 'cod', 120000, 'Dibatalkan'),
('KB00000004', 0, 'lia', 'kevin', '1', '2021-06-20 20:38:35', '2021-06-21', '2021-06-21', '09:00:00', '10:00:00', 'transfer', 120000, 'Selesai'),
('KB00000005', 0, 'lia', 'kevin', '1', '2021-06-24 16:22:03', '2021-06-24', '2021-06-24', '19:00:00', '20:00:00', 'transfer', 120000, 'Selesai'),
('KB00000006', 0, 'lia', 'kevin', '1', '2021-06-24 20:37:35', '2021-06-25', '2021-06-25', '10:00:00', '12:00:00', 'transfer', 240000, 'Selesai'),
('KB00000007', 0, 'lia', 'kevin', '1', '2021-06-30 03:22:36', '2021-06-30', '2021-06-30', '08:00:00', '09:00:00', 'transfer', 120000, 'Booking'),
('KB00000008', 0, 'lia', 'kevin', '1', '2021-06-30 14:50:39', '2021-06-30', '2021-06-30', '17:00:00', '19:00:00', 'transfer', 240000, 'Menunggu Konfirmasi admin'),
('KB00000009', 0, 'lia', 'kevin', '2', '2021-06-30 15:03:32', '2021-06-30', '2021-06-30', '21:00:00', '23:00:00', 'transfer', 240000, 'Menunggu Konfirmasi admin'),
('KB00000010', 0, 'lia', 'kevin', '1', '2021-07-01 09:45:50', '2021-07-01', '2021-07-01', '11:00:00', '12:00:00', 'transfer', 120000, 'Booking'),
('KB00000011', 0, 'lia', 'kevin', '1', '2021-07-02 05:15:49', '2021-07-02', '2021-07-02', '08:00:00', '09:00:00', 'transfer', 120000, 'Selesai'),
('KB00000012', 0, 'beni', 'kevin', '2', '2021-07-02 11:07:49', '2021-07-02', '2021-07-02', '16:00:00', '17:00:00', 'transfer', 120000, 'Booking'),
('KB00000013', 0, 'andika', 'kevin', '1', '2021-07-02 11:20:03', '2021-07-03', '2021-07-03', '11:00:00', '13:00:00', 'transfer', 240000, 'Booking'),
('KB00000014', 51, 'beni', 'kevin', '2', '2021-07-03 17:54:12', '2021-07-03', '2021-07-03', '21:00:00', '23:00:00', 'transfer', 240000, 'Menunggu Transfer'),
('KB00000015', 51, 'beni', 'kevin', '1', '2021-07-06 17:01:43', '2021-07-06', '2021-07-06', '12:00:00', '15:00:00', 'transfer', 360000, 'Menunggu Konfirmasi admin'),
('KB00000016', 51, 'beni', 'kevin', '1', '2021-07-07 14:35:40', '2021-07-07', '2021-07-07', '17:00:00', '19:00:00', 'transfer', 240000, 'Menunggu Konfirmasi admin'),
('KB00000017', 49, 'lia', 'kevin', '1', '2021-07-27 22:50:38', '2021-07-27', '2021-07-27', '22:00:00', '33:00:00', 'transfer', 1320000, 'Booking'),
('KB00000018', 28, 'kevin', 'kevin', '1', '2021-12-29 22:47:03', '2021-12-30', '2021-12-30', '08:00:00', '11:00:00', 'transfer', 360000, 'Menunggu Konfirmasi admin'),
('KB00000019', 28, 'kevin', 'kevin', '1', '2022-01-12 08:27:47', '2022-01-12', '2022-01-12', '08:00:00', '10:00:00', 'transfer', 240000, 'Booking'),
('KB00000020', 28, 'kevin', 'kevin', '2', '2022-01-12 08:28:38', '2022-01-12', '2022-01-12', '08:00:00', '09:00:00', 'transfer', 120000, 'Booking'),
('KB00000021', 28, 'kevin', 'kevin', '1', '2022-01-12 08:29:28', '2022-01-13', '2022-01-13', '08:00:00', '15:00:00', 'transfer', 840000, 'Dibatalkan'),
('KB00000022', 42, 'musil', 'musil', '8', '2022-01-18 06:36:53', '2022-01-18', '2022-01-18', '10:00:00', '13:00:00', 'transfer', 105000, 'Booking'),
('KB00000023', 42, 'musil', 'musil', '5', '2022-01-18 14:54:41', '2022-01-18', '2022-01-18', '08:00:00', '11:00:00', 'transfer', 105000, 'Menunggu Transfer'),
('KB00000024', 42, 'musil', 'musil', '5', '2022-01-18 14:55:31', '2022-01-18', '2022-01-18', '19:00:00', '22:00:00', 'transfer', 105000, 'Menunggu Transfer'),
('KB00000025', 42, 'musil', 'musil', '6', '2022-01-18 14:57:10', '2022-01-18', '2022-01-18', '19:00:00', '21:00:00', 'transfer', 70000, 'Selesai'),
('KB00000026', 42, 'musil', 'musil', '5', '2022-01-18 17:57:55', '2022-01-20', '2022-01-20', '13:00:00', '15:00:00', 'transfer', 70000, 'Booking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar_transfer`
--
ALTER TABLE `bayar_transfer`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_book`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar_transfer`
--
ALTER TABLE `bayar_transfer`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  MODIFY `id_lapangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
