-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelatihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` int(11) NOT NULL,
  `nama_gelombang` varchar(15) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama_gelombang`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'Gelombang 1', 1, '2024-06-19 02:25:33', '2024-06-19 02:25:33'),
(2, 'Gelombang 2', 0, '2024-06-19 02:25:33', '2024-06-19 02:25:33'),
(5, 'Gelombang 3', 0, '2024-06-19 04:07:26', '2024-06-19 04:07:26'),
(6, 'Gelombang 4', 1, '2024-06-19 04:07:43', '2024-06-19 04:43:39'),
(8, 'Gelombang 5', 0, '2024-06-19 04:17:05', '2024-06-19 04:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `update_at`) VALUES
(5, 'Web Programming', '2024-05-14 05:16:18', '2024-05-14 05:16:18'),
(6, 'Jaringan Komputer', '2024-05-14 05:17:07', '2024-05-14 05:17:07'),
(7, 'Video Editor', '2024-05-14 05:17:18', '2024-05-14 05:17:18'),
(10, 'Teknik Komputer', '2024-05-14 05:18:52', '2024-05-14 05:18:52'),
(11, 'Operator Komputer', '2024-05-14 05:19:44', '2024-05-14 05:19:44'),
(12, 'Content Creator', '2024-05-16 02:06:30', '2024-05-16 02:06:30'),
(13, 'Tata Boga', '2024-05-16 02:06:38', '2024-05-16 02:06:38'),
(14, 'Tata Graha', '2024-05-16 02:06:49', '2024-05-16 02:06:49'),
(15, 'Tata Busana', '2024-05-16 02:06:58', '2024-05-16 02:06:58'),
(16, 'Teknik Pendingin', '2024-05-16 02:07:28', '2024-05-16 02:07:28'),
(17, 'Bahasa Inggris', '2024-05-16 02:07:42', '2024-05-16 02:07:42'),
(18, 'Desain Grafis', '2024-05-16 02:07:53', '2024-05-16 02:07:53'),
(19, 'Teknik Sepeda Motor', '2024-05-16 02:08:13', '2024-05-16 02:08:13'),
(20, 'Make Up Artist', '2024-05-16 02:08:32', '2024-05-16 02:08:32'),
(21, 'Bahasa Korea', '2024-05-16 02:08:39', '2024-05-16 02:08:39'),
(22, 'Barista', '2024-05-16 02:08:52', '2024-05-16 02:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `update_at`) VALUES
(1, 'Administrator', '2024-05-15 04:20:23', '2024-05-15 04:20:23'),
(2, 'Kepala', '2024-05-15 04:20:23', '2024-05-15 04:20:23'),
(3, 'Kastpel', '2024-05-15 04:41:22', '2024-05-15 04:41:22'),
(4, 'Kajur', '2024-05-15 04:41:28', '2024-05-15 04:42:06'),
(5, 'Instruktur', '2024-05-15 04:42:17', '2024-05-15 06:03:11'),
(8, 'Admin', '2024-06-19 02:31:27', '2024-06-19 02:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_gelombang` int(11) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `gelombang` int(5) NOT NULL,
  `tahun_pendaftaran` varchar(5) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_jurusan`, `id_gelombang`, `nik`, `nama`, `email`, `hp`, `gender`, `alamat`, `pendidikan`, `gelombang`, `tahun_pendaftaran`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '2342435353536', 'Admin', 'admin@gmail.com', '081997979373', 'Perempuan', 'Jakarta', 'S1', 1, '2024', 0, 0, '2024-05-14 08:12:16', '2024-05-16 07:55:51'),
(2, 0, 0, '2342435353536', 'Admin', 'admin@gmail.com', '081678261862', 'Perempuan', 'Jakarta Selatan', 'S1', 1, '2024', 0, 0, '2024-05-14 08:12:44', '2024-05-16 07:55:44'),
(3, 0, 0, '2342435353536', 'Admin', 'admin@gmail.com', '019797682', 'Perempuan', 'Jakarta', 'S1', 1, '2024', NULL, 0, '2024-05-14 08:13:45', '2024-05-17 02:15:39'),
(5, 0, 0, '2342435353536', 'Admin', 'admin@gmail.com', '08129786485', 'Perempuan', 'Jakarta', 'S1', 1, '2024', 0, 0, '2024-05-15 01:52:46', '2024-05-16 07:55:32'),
(6, 0, 0, '2342435353536', 'Admin', 'admin@gmail.com', '08129786485', 'Perempuan', 'Jakarta', 'S1', 1, '2024', NULL, 0, '2024-05-15 01:52:49', '2024-05-17 02:34:10'),
(7, 6, 0, '2342435353536', 'Admin12', 'admin@gmail.com', '08178378173', 'Perempuan', 'Pusat', 'S1', 1, '2024', 2, 0, '2024-05-15 02:13:27', '2024-05-20 03:45:26'),
(8, 10, 0, '2342435353536', 'Admin123', 'admin@gmail.com', '0819187277323', 'Laki-laki', 'Bangka', 'SMA', 1, '2024', 0, 0, '2024-05-15 02:32:05', '2024-05-16 07:55:13'),
(11, 11, 0, '2342435353536', 'Admin', 'admin@gmail.com', '081971979774', 'Laki-laki', 'Jambi', 'SMA', 1, '2024', 0, 0, '2024-05-15 02:34:48', '2024-05-16 07:55:04'),
(13, 5, 0, '6643178683616', 'Patria', 'patria@gmail.com', '081286836869', 'Perempuan', 'Griya', 'SMK', 1, '2024', 0, 0, '2024-05-16 03:22:33', '2024-05-16 07:54:59'),
(14, 5, 0, '6643178683616', 'Patria', 'patria@gmail.com', '081286836869', 'Perempuan', 'Griya', 'S1', 1, '2024', 0, 1, '2024-05-16 03:23:31', '2024-05-20 03:44:52'),
(15, 5, 0, '6643178683616', 'Patria', 'patria@gmail.com', '081728728634', 'Perempuan', 'griya', 'SMA', 1, '2024', 0, 0, '2024-05-16 03:24:35', '2024-05-16 07:54:50'),
(16, 6, 0, '6756237857853', 'Yunus', 'yunus@gmail.com', '081686782786', 'Laki-laki', 'Lampung', 'S1', 1, '2024', 0, 0, '2024-05-16 03:25:08', '2024-05-16 07:54:45'),
(17, 6, 0, '638619863986', 'Lidya', 'lidya@gmail.com', '081867816783', 'Perempuan', 'Jalan Mohammad Hatta', 'SMA', 1, '2024', 0, 0, '2024-05-16 03:26:00', '2024-05-16 07:54:39'),
(18, 6, 0, '2342435353536', 'Tajma', 'tajma@gmail.com', '08971871757', 'Perempuan', 'Harapan', 'SMK', 1, '2024', 3, 0, '2024-05-16 03:26:37', '2024-05-17 02:56:42'),
(19, 10, 0, '6643178683616', 'Mimin', 'mimin@gmail.com', '08917866686', 'Laki-laki', 'babakan', 'SMA', 1, '2024', 0, 0, '2024-05-16 03:41:19', '2024-05-20 04:03:56'),
(20, 10, 0, '6756237857853', 'Akulah', 'akulah@gmail.com', '081786717678', 'Perempuan', 'Langit Ke Tujuh', 'SMA', 1, '2024', 1, 0, '2024-05-16 03:42:02', '2024-05-17 02:56:31'),
(21, 11, 0, '2342435353536', 'Siapa Kamu', 'siapakamu@gmail.com', '086767855738', 'Laki-laki', 'Hujan', 'S1', 1, '2024', 0, 0, '2024-05-16 03:42:48', '2024-05-20 04:03:24'),
(22, 10, 6, '2342435353536', 'Zakaria', 'zakaria@gmail.com', '081353586898', 'Laki-laki', 'Bandung', 'SMA', 0, '2024', NULL, 0, '2024-06-19 06:53:37', '2024-06-19 06:53:37'),
(43, 13, 6, '6756237857853', 'Namanya Siapa', 'siapa@gmail.com', '081253868769', 'Perempuan', 'Semarang', 'SMA', 0, '2024', NULL, 0, '2024-06-19 07:28:24', '2024-06-19 07:28:24'),
(46, 7, 6, '2342435353536', 'Admin', 'admin@gmail.com', '002', 'Perempuan', 'lmk', 'lkjhg', 0, '2024', NULL, 0, '2024-06-19 08:07:02', '2024-06-19 08:07:02'),
(47, 7, 6, '2342435353536', 'Database', 'admin@gmail.com', '055571676565', 'Perempuan', 'hjhjh', 'SMA', 0, '2024', NULL, 0, '2024-06-20 07:07:32', '2024-06-20 07:07:32'),
(48, 14, 6, '57754848486448', 'Olala', 'ola@gmail.com', '087484615481', 'Perempuan', 'Ogan', 'S1', 0, '2024', NULL, 0, '2024-06-20 07:14:19', '2024-06-20 07:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_wawancara`
--

CREATE TABLE `pertanyaan_wawancara` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_pertanyaan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan_wawancara`
--

INSERT INTO `pertanyaan_wawancara` (`id`, `id_jurusan`, `nama_pertanyaan`, `created_at`, `update_at`) VALUES
(8, 6, 'Apakah fungsi jaringan?', '2024-05-17 07:05:24', '2024-05-17 07:05:24'),
(9, 13, 'Apakah yang dimaksud dengan Table Manner?', '2024-05-17 07:44:23', '2024-05-17 07:44:23'),
(10, 13, 'Apakah fungsi garpu?', '2024-05-17 08:09:49', '2024-05-17 08:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `stock_barang` int(15) NOT NULL,
  `gbr_barang` varchar(30) NOT NULL,
  `tgl_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga_barang`, `stock_barang`, `gbr_barang`, `tgl_publish`) VALUES
(1, 'Alat Tulis', 31500, 85, 'brg-1716864218.png', '2024-05-08'),
(2, 'Buku', 15000, 5, 'bouquet4.jpg', '2024-05-01'),
(4, 'Gelas', 67200, 63, 'brg-1716863607.jpg', '2024-05-28'),
(5, 'Penggaris', 57800, 50, 'brg-1716863734.jpg', '2024-05-28'),
(6, 'Rautan', 6000, 63, 'brg-1716864330.jpg', '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_level`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admin123', 'admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2024-05-13 02:06:40', '2024-05-14 05:02:22'),
(13, 1, 'Admin', 'admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2024-05-15 06:04:20', '2024-05-15 06:04:20'),
(14, 2, 'Database', 'admin@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2024-05-15 06:13:37', '2024-05-15 06:13:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan_wawancara`
--
ALTER TABLE `pertanyaan_wawancara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pertanyaan_wawancara`
--
ALTER TABLE `pertanyaan_wawancara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
