-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2022 at 07:35 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kader`
--

CREATE TABLE `kader` (
  `id_kader` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_komisariat` int(11) NOT NULL,
  `tahun` date NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` int(50) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kader`
--

INSERT INTO `kader` (`id_kader`, `nim`, `nama`, `nomor`, `alamat`, `tempat`, `tanggal`, `id_komisariat`, `tahun`, `jabatan`, `posisi`, `foto`, `created_at`, `updated_at`) VALUES
('220001', '17777777', 'Wahyu Lazzuardy', '082330321572', 'Doudo Panceng Gresik', 'Gresik', '1999-12-13', 14, '2022-05-31', 'ketum', 14, '1653972695741-1.jpg', '2022-05-30 21:51:35', '2022-05-30 21:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `komisariat`
--

CREATE TABLE `komisariat` (
  `id_komisariat` int(11) NOT NULL,
  `nama_komisariat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakultas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `univ` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komisariat`
--

INSERT INTO `komisariat` (`id_komisariat`, `nama_komisariat`, `fakultas`, `univ`, `logo`, `created_at`, `updated_at`) VALUES
(14, 'Komisariat Ekonomi', 'Ekonomi dan Bisnis', 'Universitas Muhammadiyah Gresik', '1653964509403-2.jpg', '2022-05-30 19:20:52', '2022-05-30 19:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2022_03_28_133424_surat_masuk', 1),
(15, '2022_03_31_150857_pengguna', 1),
(16, '2022_04_01_084538_komisariat', 1),
(17, '2022_04_02_042117_kader', 1),
(18, '2022_04_02_044832_perkaderan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) UNSIGNED NOT NULL,
  `nim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nim`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(5, '170602056', 'Wahyu Lazzuardy', 'admin', '$2y$10$9.A35jTanax55EFuNb6DJOP20JiwCnVbHCgAV4wv30UOSrU/aqBGq', 'admin', '2022-04-25 17:26:46', '2022-06-03 22:33:46'),
(6, '1111', 'Dimas Pratama', '170602054', '$2y$10$oTMCsVT7BPufsYAE46bzc./16t/Lh40RbXeNm46Xo3IIwjC1KP8mK', 'bidor', '2022-04-25 18:59:45', '2022-04-25 18:59:45'),
(7, '170602057', 'Sholahuddin', '170602057', '$2y$10$PKgYT9q.PIWFkqhrTMeziugmc67D1EsjXXmkMM814J9e56LNgzHYW', 'sekret', '2022-05-22 21:41:11', '2022-06-03 21:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `perkaderan`
--

CREATE TABLE `perkaderan` (
  `id_perkaderan` int(10) UNSIGNED NOT NULL,
  `id_kader` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perkaderan` int(11) NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perkaderan`
--

INSERT INTO `perkaderan` (`id_perkaderan`, `id_kader`, `nama_perkaderan`, `kategori`, `created_at`, `updated_at`) VALUES
(130, '220001', 1, 'utama', '2022-05-30 21:51:35', '2022-05-30 21:51:35'),
(131, '220001', 2, 'utama', '2022-05-30 21:51:35', '2022-05-30 21:51:35'),
(132, '220001', 4, 'khusus', '2022-05-30 21:51:35', '2022-05-30 21:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(50) NOT NULL,
  `nama_organisasi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_organisasi`, `alamat`, `telp`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Ikatan Mahasiswa Muhammadiyah', 'Jl. Sumatra No.101 GKB Gresik', '082330321572', '1649556120408-logo-IMM.png', '2022-05-04 03:42:01', '2022-05-03 20:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(10) UNSIGNED NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` int(11) NOT NULL,
  `tujuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `no_surat`, `tgl_surat`, `perihal`, `lampiran`, `tujuan`, `file`, `created_at`, `updated_at`) VALUES
(7, '888/00M/KELBARU/XII/2021', '2022-06-04', 'QURBAN', 1, 'RS Muhammadyah Gresik', '1654318581376-cover-real.jpg', '2022-06-03 21:56:21', '2022-06-03 21:56:21'),
(8, '888/00M/IMM/XII/2021', '2022-06-03', 'COBA TEMBUSAN', 1, 'RS IBNU SINA GRESIK', '1654318612557-ID-FITRI-IMM.jpg', '2022-06-03 21:56:52', '2022-06-03 21:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(10) UNSIGNED NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `perihal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_lampiran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat`, `tgl_surat`, `tgl_diterima`, `perihal`, `jenis`, `jml_lampiran`, `pengirim`, `file`, `created_at`, `updated_at`) VALUES
(57, '888/00M/IMM/XII/2021', '2022-05-23', '2022-05-23', 'COBA TEMBUSAN', 'permohonan', '8', 'IMM Cabang Surabaya', '1653288133615-sertif.jpg', '2022-05-22 23:42:13', '2022-05-22 23:42:13'),
(58, '01/PAN/I/2022', '2022-01-06', '2022-01-08', 'COBA TEMBUSAN', 'undangan', '1', 'IMMGresik', '1653351956406-REGIS.jpg', '2022-05-23 17:25:56', '2022-05-23 17:25:56'),
(59, '888/00M/IMM/XII/2021', '2022-01-14', '2022-01-14', 'AAAA', 'undangan', '2', 'AAA', '1653352052876-line4.jpg', '2022-05-23 17:27:32', '2022-05-23 17:27:32'),
(61, '888/00M/IMM/XII/2021', '2022-06-03', '2022-06-04', 'PEMILIHAN DIREKTUR', 'undangan', '2', 'IMM Cabang Surabaya', '1654318291149-cover-real.jpg', '2022-06-03 21:51:31', '2022-06-03 21:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perkaderan`
--

CREATE TABLE `tb_perkaderan` (
  `id_per` int(11) NOT NULL,
  `nama_perka` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perkaderan`
--

INSERT INTO `tb_perkaderan` (`id_per`, `nama_perka`, `kategori`) VALUES
(1, 'Darul Arqom Dasar', 'utama'),
(2, 'Darul Arqom Madya', 'utama'),
(3, 'Darul Arqom Paripurna', 'utama'),
(4, 'Latihan Instruktur Dasar', 'khusus'),
(5, 'Latihan Instruktur Madya', 'khusus'),
(6, 'Latihan Instruktur Paripurna', 'khusus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kader`
--
ALTER TABLE `kader`
  ADD PRIMARY KEY (`id_kader`),
  ADD KEY `fk_komisariat_kader` (`id_komisariat`);

--
-- Indexes for table `komisariat`
--
ALTER TABLE `komisariat`
  ADD PRIMARY KEY (`id_komisariat`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `perkaderan`
--
ALTER TABLE `perkaderan`
  ADD PRIMARY KEY (`id_perkaderan`),
  ADD KEY `fk_perkaderan_kader` (`id_kader`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `tb_perkaderan`
--
ALTER TABLE `tb_perkaderan`
  ADD PRIMARY KEY (`id_per`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komisariat`
--
ALTER TABLE `komisariat`
  MODIFY `id_komisariat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perkaderan`
--
ALTER TABLE `perkaderan`
  MODIFY `id_perkaderan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tb_perkaderan`
--
ALTER TABLE `tb_perkaderan`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kader`
--
ALTER TABLE `kader`
  ADD CONSTRAINT `fk_komisariat_kader` FOREIGN KEY (`id_komisariat`) REFERENCES `komisariat` (`id_komisariat`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `perkaderan`
--
ALTER TABLE `perkaderan`
  ADD CONSTRAINT `fk_perkaderan_kader` FOREIGN KEY (`id_kader`) REFERENCES `kader` (`id_kader`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
