-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 02:31 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_semarang_tengah`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katholik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Khonghucu'),
(7, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran_kelurahan`
--

CREATE TABLE `anggaran_kelurahan` (
  `id_anggaran_kelurahan` int(11) NOT NULL,
  `id_anggaran` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nominal` varchar(15) NOT NULL DEFAULT '0',
  `pengguna` varchar(255) DEFAULT NULL,
  `bendahara` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL COMMENT '1=hapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='anggaran kelurahan';

--
-- Dumping data for table `anggaran_kelurahan`
--

INSERT INTO `anggaran_kelurahan` (`id_anggaran_kelurahan`, `id_anggaran`, `id_kelurahan`, `nominal`, `pengguna`, `bendahara`, `flag`) VALUES
(1, 1, 3, '1000000', NULL, NULL, 1),
(2, 1, 5, '2000000', NULL, NULL, 1),
(3, 1, 6, '3000000', NULL, NULL, 1),
(4, 5, 12, '20000000', NULL, NULL, 0),
(5, 5, 5, '20000000', NULL, NULL, 0),
(6, 5, 9, '20000000', NULL, NULL, 0),
(7, 5, 8, '20000000', NULL, NULL, 0),
(8, 5, 6, '20000000', NULL, NULL, 0),
(9, 5, 11, '20000000', NULL, NULL, 0),
(10, 5, 3, '20000000', NULL, NULL, 0),
(11, 5, 10, '20000000', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `camat`
--

CREATE TABLE `camat` (
  `id_camat` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camat`
--

INSERT INTO `camat` (`id_camat`, `nip`, `nama`, `pangkat`) VALUES
(1, '19730328 199203 1 001', 'BAMBANG PRAMUSINTO, S.H., S.I.P., M.Si', 'Pembina Tk. I');

-- --------------------------------------------------------

--
-- Table structure for table `data_anggaran`
--

CREATE TABLE `data_anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `nominal` varchar(15) NOT NULL DEFAULT '0',
  `pengguna` varchar(255) DEFAULT NULL,
  `bendahara` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '1=hapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='anggaran kecamatan';

--
-- Dumping data for table `data_anggaran`
--

INSERT INTO `data_anggaran` (`id_anggaran`, `tahun`, `id_rekening`, `nominal`, `pengguna`, `bendahara`, `flag`) VALUES
(1, '2018', 1, '6462611400', NULL, NULL, 1),
(5, '2018', 1, '160000000', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_hansip_limas`
--

CREATE TABLE `data_hansip_limas` (
  `id_hansip_limas` int(11) NOT NULL,
  `periode` varchar(8) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `anggota_l` int(11) NOT NULL DEFAULT '0',
  `anggota_p` int(11) NOT NULL DEFAULT '0',
  `anggota_pribumi` int(11) NOT NULL DEFAULT '0',
  `anggota_keturunan` int(11) NOT NULL DEFAULT '0',
  `pendidikan_sd` int(11) NOT NULL DEFAULT '0',
  `pendidikan_smp` int(11) NOT NULL DEFAULT '0',
  `pendidikan_sma` int(11) NOT NULL DEFAULT '0',
  `pendidikan_pt` int(11) NOT NULL DEFAULT '0',
  `pekerjaan_pns` int(11) NOT NULL DEFAULT '0',
  `pekerjaan_swasta` int(11) NOT NULL DEFAULT '0',
  `pekerjaan_lain` int(11) NOT NULL DEFAULT '0',
  `latsar` int(11) NOT NULL DEFAULT '0',
  `suskalak_a` int(11) NOT NULL DEFAULT '0',
  `suskalak_b` int(11) NOT NULL DEFAULT '0',
  `suskapin` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Tidak Berkategori'),
(2, 'XYZ'),
(3, 'Tidak Berkategoric'),
(4, 'xcxcx');

-- --------------------------------------------------------

--
-- Table structure for table `data_kecamatan`
--

CREATE TABLE `data_kecamatan` (
  `id_kec` int(11) NOT NULL,
  `kode_kec` varchar(50) DEFAULT NULL,
  `nama_kec` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kecamatan`
--

INSERT INTO `data_kecamatan` (`id_kec`, `kode_kec`, `nama_kec`) VALUES
(1, '3374040', 'Gajahmungkur');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelurahan`
--

CREATE TABLE `data_kelurahan` (
  `id_kel` int(11) NOT NULL,
  `kode_kel` varchar(50) DEFAULT NULL,
  `nama_kel` varchar(50) DEFAULT NULL,
  `lurah` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `flag` int(2) DEFAULT '0' COMMENT '0=normal; 1=Delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelurahan`
--

INSERT INTO `data_kelurahan` (`id_kel`, `kode_kel`, `nama_kel`, `lurah`, `jabatan`, `nip`, `flag`) VALUES
(1, '343434', 'Bendanduwurx', '', '', '', 1),
(2, '222222', 'Bendanngisorx', '', '', '', 1),
(3, '3374040007', 'Bendungan', '', '', '', 0),
(5, '3374040002', 'Bendan Duwur', '', '', '', 0),
(6, '3374040005', 'Bendan Ngisor', '', '', '', 0),
(7, '111111', 'Bendunganx', '', '', '', 1),
(8, '3374040004', 'Gajahmungkur', '', '', '', 0),
(9, '3374040003', 'Karangrejo', '', '', '', 0),
(10, '3374040008', 'Lempongsari', '', '', '', 0),
(11, '3374040006', 'Petompon', '', '', '', 0),
(12, '3374040001', 'Sampangan', 'Lurah Sampangan', 'Pembina', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_laporan`
--

CREATE TABLE `data_laporan` (
  `id_laporan` int(11) NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_laporan`
--

INSERT INTO `data_laporan` (`id_laporan`, `laporan`, `id_kategori`) VALUES
(10, 'Data Penduduk Lahir', 1),
(11, 'Data Penduduk Meninggal', 3),
(17, 'Data Penduduk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_mutasi_tanah_sengketa`
--

CREATE TABLE `data_mutasi_tanah_sengketa` (
  `id_mutasi` int(11) NOT NULL,
  `periode` varchar(8) DEFAULT NULL COMMENT '2018-12',
  `tgl_mutasi` datetime DEFAULT NULL,
  `jenis_sengketa` text,
  `langkah_hasil` text,
  `keterangan` date DEFAULT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggaran`
--

CREATE TABLE `data_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `periode` varchar(8) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `tgl_pelanggaran` date DEFAULT NULL,
  `jenis_pelanggaran` text,
  `lokasi` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tindakan_usaha` text,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengisi`
--

CREATE TABLE `data_pengisi` (
  `id_pengisi` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengisi`
--

INSERT INTO `data_pengisi` (`id_pengisi`, `id_kelurahan`, `id_laporan`, `tanggal`, `tgl_input`) VALUES
(1, 3, 2, '2018-06-25', '2018-06-25 05:37:19'),
(3, 3, 2, '2018-06-26', '2018-06-24 19:38:43'),
(4, 10, 9, '2018-07-04', '2018-07-03 19:11:58'),
(5, 10, 10, '2018-07-17', '2018-07-16 18:56:35'),
(6, 6, 10, '2018-07-17', '2018-07-16 21:03:08'),
(7, 12, 10, '2018-07-19', '2018-07-19 05:53:42'),
(8, 5, 10, '2018-07-19', '2018-07-19 05:53:58'),
(9, 6, 10, '2018-07-19', '2018-07-19 05:54:07'),
(10, 3, 10, '2018-07-19', '2018-07-19 05:54:19'),
(11, 8, 10, '2018-07-19', '2018-07-19 05:54:30'),
(12, 9, 10, '2018-07-19', '2018-07-19 05:54:42'),
(13, 10, 10, '2018-07-19', '2018-07-19 05:54:52'),
(14, 11, 10, '2018-07-19', '2018-07-19 05:55:02'),
(15, 12, 10, '2018-07-19', '2018-07-19 05:55:14'),
(16, 5, 2, '2018-07-19', '2018-07-19 05:55:31'),
(17, 6, 2, '2018-07-19', '2018-07-19 05:55:39'),
(18, 3, 2, '2018-07-19', '2018-07-19 05:55:50'),
(19, 8, 2, '2018-07-19', '2018-07-19 05:56:01'),
(20, 9, 2, '2018-07-19', '2018-07-19 05:56:25'),
(21, 10, 2, '2018-07-19', '2018-07-19 05:56:39'),
(22, 12, 2, '2018-07-19', '2018-07-19 05:56:50'),
(23, 5, 11, '2018-07-19', '2018-07-18 22:10:09'),
(24, 12, 11, '2018-07-24', '2018-07-18 22:17:33'),
(25, 5, 2, '2018-07-22', '2018-07-22 02:29:31'),
(26, 6, 2, '2018-07-22', '2018-07-22 02:31:31'),
(27, 3, 2, '2018-07-22', '2018-07-22 02:32:10'),
(28, 8, 2, '2018-07-22', '2018-07-22 02:32:50'),
(29, 9, 2, '2018-07-22', '2018-07-22 02:33:20'),
(30, 10, 2, '2018-07-22', '2018-07-22 02:33:53'),
(31, 11, 2, '2018-07-22', '2018-07-22 02:34:24'),
(32, 12, 2, '2018-07-22', '2018-07-22 02:35:54'),
(33, 5, 13, '2018-07-22', '2018-07-22 02:39:37'),
(34, 6, 13, '2018-07-22', '2018-07-22 02:40:11'),
(35, 3, 13, '2018-07-22', '2018-07-22 02:40:51'),
(36, 8, 13, '2018-07-22', '2018-07-22 02:41:40'),
(37, 9, 13, '2018-07-22', '2018-07-22 02:42:09'),
(38, 10, 13, '2018-07-22', '2018-07-22 02:42:38'),
(39, 11, 13, '2018-07-22', '2018-07-22 02:43:00'),
(40, 12, 13, '2018-07-22', '2018-07-22 02:43:23'),
(41, 5, 12, '2018-07-22', '2018-07-22 02:48:07'),
(42, 6, 12, '2018-07-22', '2018-07-22 02:48:40'),
(43, 3, 12, '2018-07-22', '2018-07-22 02:49:06'),
(44, 8, 12, '2018-07-22', '2018-07-22 02:49:30'),
(45, 9, 12, '2018-07-22', '2018-07-22 02:49:51'),
(46, 10, 12, '2018-07-22', '2018-07-22 02:50:17'),
(47, 11, 12, '2018-07-22', '2018-07-22 02:50:43'),
(48, 12, 12, '2018-07-22', '2018-07-22 02:51:01'),
(49, 5, 10, '2018-07-22', '2018-07-22 02:55:53'),
(50, 6, 10, '2018-07-22', '2018-07-22 02:56:15'),
(51, 3, 10, '2018-07-22', '2018-07-22 02:56:37'),
(52, 8, 10, '2018-07-22', '2018-07-22 02:56:56'),
(53, 9, 10, '2018-07-22', '2018-07-22 02:57:29'),
(54, 10, 10, '2018-07-22', '2018-07-22 02:59:55'),
(55, 11, 10, '2018-07-22', '2018-07-22 03:00:38'),
(56, 12, 10, '2018-07-22', '2018-07-22 03:01:28'),
(57, 5, 11, '2018-07-22', '2018-07-22 03:04:33'),
(58, 6, 11, '2018-07-22', '2018-07-22 03:04:50'),
(59, 3, 11, '2018-07-22', '2018-07-22 03:05:14'),
(60, 8, 11, '2018-07-22', '2018-07-22 03:05:40'),
(61, 9, 11, '2018-07-22', '2018-07-22 03:06:00'),
(62, 10, 11, '2018-07-22', '2018-07-22 03:06:29'),
(63, 12, 14, '2018-07-22', '2018-07-22 03:09:34'),
(64, 5, 14, '2018-07-22', '2018-07-22 03:10:06'),
(65, 9, 14, '2018-07-22', '2018-07-22 03:10:27'),
(66, 8, 14, '2018-07-22', '2018-07-22 03:10:41'),
(67, 6, 14, '2018-07-22', '2018-07-22 03:10:56'),
(68, 11, 14, '2018-07-22', '2018-07-22 03:11:13'),
(69, 3, 14, '2018-07-22', '2018-07-22 03:11:27'),
(70, 10, 14, '2018-07-22', '2018-07-22 03:11:41'),
(71, 12, 2, '2018-07-22', '2018-07-22 03:21:45'),
(72, 5, 15, '2018-07-22', '2018-07-22 03:28:50'),
(73, 6, 15, '2018-07-22', '2018-07-22 03:29:14'),
(74, 3, 15, '2018-07-22', '2018-07-22 03:29:46'),
(75, 8, 15, '2018-07-22', '2018-07-22 03:30:11'),
(76, 9, 15, '2018-07-22', '2018-07-22 03:30:32'),
(77, 10, 15, '2018-07-22', '2018-07-22 03:30:59'),
(78, 11, 15, '2018-07-22', '2018-07-22 03:31:43'),
(79, 12, 15, '2018-07-22', '2018-07-22 03:32:02'),
(80, 5, 16, '2018-07-22', '2018-07-22 03:37:46'),
(81, 6, 16, '2018-07-22', '2018-07-22 03:38:04'),
(82, 3, 16, '2018-07-22', '2018-07-22 03:38:16'),
(83, 8, 16, '2018-07-22', '2018-07-22 03:38:26'),
(84, 9, 16, '2018-07-22', '2018-07-22 03:38:39'),
(85, 10, 16, '2018-07-22', '2018-07-22 03:38:52'),
(86, 11, 16, '2018-07-22', '2018-07-22 03:39:00'),
(87, 12, 16, '2018-07-22', '2018-07-22 03:39:09'),
(89, 5, 17, '2018-07-22', '2018-07-22 03:41:43'),
(90, 9, 17, '2018-07-22', '2018-07-22 03:41:57'),
(91, 8, 17, '2018-07-22', '2018-07-22 03:42:07'),
(92, 6, 17, '2018-07-22', '2018-07-22 03:42:18'),
(93, 11, 17, '2018-07-22', '2018-07-22 03:42:31'),
(94, 3, 17, '2018-07-22', '2018-07-22 03:42:43'),
(95, 10, 17, '2018-07-22', '2018-07-22 03:42:53'),
(96, 12, 18, '2018-07-22', '2018-07-22 03:46:39'),
(97, 5, 18, '2018-07-22', '2018-07-22 03:47:23'),
(98, 9, 18, '2018-07-22', '2018-07-22 03:47:34'),
(99, 8, 18, '2018-07-22', '2018-07-22 03:47:44'),
(100, 6, 18, '2018-07-22', '2018-07-22 03:47:58'),
(101, 11, 18, '2018-07-22', '2018-07-22 03:48:11'),
(102, 3, 18, '2018-07-22', '2018-07-22 03:48:21'),
(103, 10, 18, '2018-07-22', '2018-07-22 03:48:34'),
(104, 12, 17, '2018-07-15', '2018-07-22 03:54:11'),
(105, 5, 17, '2018-07-15', '2018-07-22 03:54:45'),
(106, 9, 17, '2018-07-15', '2018-07-22 03:55:04'),
(107, 5, 18, '2018-07-22', '2018-07-22 04:25:43'),
(108, 9, 18, '2018-07-22', '2018-07-22 04:26:35'),
(109, 12, 18, '2018-07-22', '2018-07-22 04:27:22'),
(110, 12, 17, '2018-07-22', '2018-07-22 04:28:28'),
(111, 5, 17, '2018-07-22', '2018-07-22 04:29:13'),
(112, 9, 17, '2018-07-22', '2018-07-22 04:30:04'),
(113, 8, 17, '2018-07-22', '2018-07-22 04:31:07'),
(114, 6, 17, '2018-07-22', '2018-07-22 04:31:40'),
(115, 3, 17, '2018-07-22', '2018-07-22 04:33:29'),
(116, 10, 17, '2018-07-22', '2018-07-22 04:34:05'),
(117, 11, 17, '2018-07-22', '2018-07-22 04:36:46'),
(118, 12, 19, '2018-07-22', '2018-07-22 04:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengisian`
--

CREATE TABLE `data_pengisian` (
  `id_pengisian` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL COMMENT 'kolom',
  `id_variabel2` int(11) NOT NULL DEFAULT '0' COMMENT 'baris',
  `nilai` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_pengisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengisian`
--

INSERT INTO `data_pengisian` (`id_pengisian`, `id_laporan`, `id_variabel`, `id_variabel2`, `nilai`, `id_kelurahan`, `id_pengisi`) VALUES
(1, 2, 1, 0, 2, 3, 1),
(2, 2, 2, 0, 1, 3, 1),
(3, 2, 3, 0, 5, 3, 1),
(4, 2, 1, 0, 2, 3, 3),
(5, 2, 2, 0, 0, 3, 3),
(6, 2, 3, 0, 3, 3, 3),
(7, 9, 6, 0, 100, 10, 4),
(8, 9, 5, 0, 20, 10, 4),
(9, 9, 4, 0, 50, 10, 4),
(10, 10, 7, 0, 17, 10, 5),
(11, 10, 8, 0, 4, 10, 5),
(12, 10, 7, 0, 100, 6, 6),
(13, 10, 8, 0, 200, 6, 6),
(14, 10, 7, 0, 20, 12, 7),
(15, 10, 8, 0, 10, 12, 7),
(16, 10, 7, 0, 5, 5, 8),
(17, 10, 8, 0, 1, 5, 8),
(18, 10, 7, 0, 8, 6, 9),
(19, 10, 8, 0, 6, 6, 9),
(20, 10, 7, 0, 4, 3, 10),
(21, 10, 8, 0, 1, 3, 10),
(22, 10, 7, 0, 14, 8, 11),
(23, 10, 8, 0, 5, 8, 11),
(24, 10, 7, 0, 4, 9, 12),
(25, 10, 8, 0, 7, 9, 12),
(26, 10, 7, 0, 7, 10, 13),
(27, 10, 8, 0, 8, 10, 13),
(28, 10, 7, 0, 2, 11, 14),
(29, 10, 8, 0, 3, 11, 14),
(30, 10, 7, 0, 3, 12, 15),
(31, 10, 8, 0, 7, 12, 15),
(32, 2, 1, 0, 30, 5, 16),
(33, 2, 2, 0, 41, 5, 16),
(34, 2, 3, 0, 14, 5, 16),
(35, 2, 1, 0, 4, 6, 17),
(36, 2, 2, 0, 7, 6, 17),
(37, 2, 3, 0, 6, 6, 17),
(38, 2, 1, 0, 50, 3, 18),
(39, 2, 2, 0, 60, 3, 18),
(40, 2, 3, 0, 20, 3, 18),
(41, 2, 1, 0, 4, 8, 19),
(42, 2, 2, 0, 2, 8, 19),
(43, 2, 3, 0, 7, 8, 19),
(44, 2, 1, 0, 8, 9, 20),
(45, 2, 2, 0, 5, 9, 20),
(46, 2, 3, 0, 1, 9, 20),
(47, 2, 1, 0, 2, 10, 21),
(48, 2, 2, 0, 12, 10, 21),
(49, 2, 3, 0, 8, 10, 21),
(50, 2, 1, 0, 2, 12, 22),
(51, 2, 2, 0, 0, 12, 22),
(52, 2, 3, 0, 2, 12, 22),
(53, 11, 10, 0, 10, 5, 23),
(54, 11, 9, 0, 20, 5, 23),
(55, 11, 10, 0, 12, 12, 24),
(56, 11, 9, 0, 3, 12, 24),
(57, 2, 1, 0, 38, 5, 25),
(58, 2, 2, 0, 28, 5, 25),
(59, 2, 3, 0, 7, 5, 25),
(60, 2, 1, 0, 84, 6, 26),
(61, 2, 2, 0, 30, 6, 26),
(62, 2, 3, 0, 5, 6, 26),
(63, 2, 1, 0, 105, 3, 27),
(64, 2, 2, 0, 29, 3, 27),
(65, 2, 3, 0, 5, 3, 27),
(66, 2, 1, 0, 233, 8, 28),
(67, 2, 2, 0, 89, 8, 28),
(68, 2, 3, 0, 9, 8, 28),
(69, 2, 1, 0, 68, 9, 29),
(70, 2, 2, 0, 34, 9, 29),
(71, 2, 3, 0, 5, 9, 29),
(72, 2, 1, 0, 118, 10, 30),
(73, 2, 2, 0, 38, 10, 30),
(74, 2, 3, 0, 8, 10, 30),
(75, 2, 1, 0, 49, 11, 31),
(76, 2, 2, 0, 39, 11, 31),
(77, 2, 3, 0, 5, 11, 31),
(78, 2, 1, 0, 70, 12, 32),
(79, 2, 2, 0, 57, 12, 32),
(80, 2, 3, 0, 7, 12, 32),
(81, 13, 12, 0, 1845, 5, 33),
(82, 13, 13, 0, 1787, 5, 33),
(83, 13, 12, 0, 3738, 6, 34),
(84, 13, 13, 0, 3889, 6, 34),
(85, 13, 12, 0, 2447, 3, 35),
(86, 13, 13, 0, 2345, 3, 35),
(87, 13, 12, 0, 7622, 8, 36),
(88, 13, 13, 0, 7442, 8, 36),
(89, 13, 12, 0, 3860, 9, 37),
(90, 13, 13, 0, 3872, 9, 37),
(91, 13, 12, 0, 3585, 10, 38),
(92, 13, 13, 0, 3422, 10, 38),
(93, 13, 12, 0, 3874, 11, 39),
(94, 13, 13, 0, 3875, 11, 39),
(95, 13, 12, 0, 4909, 12, 40),
(96, 13, 13, 0, 5254, 12, 40),
(97, 12, 11, 0, 1945, 5, 41),
(98, 12, 14, 0, 1976, 5, 41),
(99, 12, 11, 0, 1495, 6, 42),
(100, 12, 14, 0, 320, 6, 42),
(101, 12, 11, 0, 1037, 3, 43),
(102, 12, 14, 0, 427, 3, 43),
(103, 12, 11, 0, 2854, 8, 44),
(104, 12, 14, 0, 565, 8, 44),
(105, 12, 11, 0, 1390, 9, 45),
(106, 12, 14, 0, 511, 9, 45),
(107, 12, 11, 0, 1476, 10, 46),
(108, 12, 14, 0, 155, 10, 46),
(109, 12, 11, 0, 1276, 11, 47),
(110, 12, 14, 0, 427, 11, 47),
(111, 12, 11, 0, 1776, 12, 48),
(112, 12, 14, 0, 573, 12, 48),
(113, 10, 7, 0, 27, 5, 49),
(114, 10, 8, 0, 30, 5, 49),
(115, 10, 7, 0, 41, 6, 50),
(116, 10, 8, 0, 37, 6, 50),
(117, 10, 7, 0, 19, 3, 51),
(118, 10, 8, 0, 19, 3, 51),
(119, 10, 7, 0, 102, 8, 52),
(120, 10, 8, 0, 71, 8, 52),
(121, 10, 7, 0, 53, 9, 53),
(122, 10, 8, 0, 50, 9, 53),
(123, 10, 7, 0, 33, 10, 54),
(124, 10, 8, 0, 32, 10, 54),
(125, 10, 7, 0, 49, 11, 55),
(126, 10, 8, 0, 46, 11, 55),
(127, 10, 7, 0, 72, 12, 56),
(128, 10, 8, 0, 66, 12, 56),
(129, 11, 9, 0, 11, 5, 57),
(130, 11, 10, 0, 8, 5, 57),
(131, 11, 9, 0, 27, 6, 58),
(132, 11, 10, 0, 17, 6, 58),
(133, 11, 9, 0, 20, 3, 59),
(134, 11, 10, 0, 15, 3, 59),
(135, 11, 9, 0, 55, 8, 60),
(136, 11, 10, 0, 40, 8, 60),
(137, 11, 9, 0, 74, 9, 61),
(138, 11, 10, 0, 56, 9, 61),
(139, 11, 9, 0, 14, 10, 62),
(140, 11, 10, 0, 25, 10, 62),
(141, 14, 15, 0, 3505, 12, 63),
(142, 14, 16, 0, 3965, 12, 63),
(143, 14, 15, 0, 131, 5, 64),
(144, 14, 16, 0, 138, 5, 64),
(145, 14, 15, 0, 3474, 9, 65),
(146, 14, 16, 0, 7012, 9, 65),
(147, 14, 15, 0, 5886, 8, 66),
(148, 14, 16, 0, 5678, 8, 66),
(149, 14, 15, 0, 2279, 6, 67),
(150, 14, 16, 0, 2450, 6, 67),
(151, 14, 15, 0, 2738, 11, 68),
(152, 14, 16, 0, 3025, 11, 68),
(153, 14, 15, 0, 2016, 3, 69),
(154, 14, 16, 0, 1761, 3, 69),
(155, 14, 15, 0, 2712, 10, 70),
(156, 14, 16, 0, 2594, 10, 70),
(157, 2, 1, 0, 121, 12, 71),
(158, 2, 2, 0, 70, 12, 71),
(159, 2, 3, 0, 80, 12, 71),
(160, 15, 17, 0, 3756, 5, 72),
(161, 15, 18, 0, 28, 5, 72),
(162, 15, 19, 0, 7, 5, 72),
(163, 15, 17, 0, 8365, 6, 73),
(164, 15, 18, 0, 30, 6, 73),
(165, 15, 19, 0, 5, 6, 73),
(166, 15, 17, 0, 10470, 3, 74),
(167, 15, 18, 0, 29, 3, 74),
(168, 15, 19, 0, 5, 3, 74),
(169, 15, 17, 0, 23344, 8, 75),
(170, 15, 18, 0, 89, 8, 75),
(171, 15, 19, 0, 9, 8, 75),
(172, 15, 17, 0, 6845, 9, 76),
(173, 15, 18, 0, 34, 9, 76),
(174, 15, 19, 0, 5, 9, 76),
(175, 15, 17, 0, 11817, 10, 77),
(176, 15, 18, 0, 38, 10, 77),
(177, 15, 19, 0, 8, 10, 77),
(178, 15, 17, 0, 4901, 11, 78),
(179, 15, 18, 0, 39, 11, 78),
(180, 15, 19, 0, 5, 11, 78),
(181, 15, 17, 0, 6999, 12, 79),
(182, 15, 18, 0, 57, 12, 79),
(183, 15, 19, 0, 7, 12, 79),
(184, 16, 21, 0, 28, 5, 80),
(185, 16, 20, 0, 7, 5, 80),
(186, 16, 21, 0, 30, 6, 81),
(187, 16, 20, 0, 5, 6, 81),
(188, 16, 21, 0, 29, 3, 82),
(189, 16, 20, 0, 5, 3, 82),
(190, 16, 21, 0, 89, 8, 83),
(191, 16, 20, 0, 9, 8, 83),
(192, 16, 21, 0, 34, 9, 84),
(193, 16, 20, 0, 5, 9, 84),
(194, 16, 21, 0, 38, 10, 85),
(195, 16, 20, 0, 8, 10, 85),
(196, 16, 21, 0, 39, 11, 86),
(197, 16, 20, 0, 5, 11, 86),
(198, 16, 21, 0, 57, 12, 87),
(199, 16, 20, 0, 7, 12, 87),
(202, 17, 22, 0, 1945, 5, 89),
(203, 17, 23, 0, 1976, 5, 89),
(204, 17, 22, 0, 1390, 9, 90),
(205, 17, 23, 0, 511, 9, 90),
(206, 17, 22, 0, 2854, 8, 91),
(207, 17, 23, 0, 565, 8, 91),
(208, 17, 22, 0, 1495, 6, 92),
(209, 17, 23, 0, 320, 6, 92),
(210, 17, 22, 0, 1276, 11, 93),
(211, 17, 23, 0, 427, 11, 93),
(212, 17, 22, 0, 1037, 3, 94),
(213, 17, 23, 0, 427, 3, 94),
(214, 17, 22, 0, 1476, 10, 95),
(215, 17, 23, 0, 155, 10, 95),
(216, 18, 25, 0, 57, 12, 96),
(217, 18, 24, 0, 7, 12, 96),
(218, 18, 25, 0, 28, 5, 97),
(219, 18, 24, 0, 7, 5, 97),
(220, 18, 25, 0, 34, 9, 98),
(221, 18, 24, 0, 5, 9, 98),
(222, 18, 25, 0, 89, 8, 99),
(223, 18, 24, 0, 9, 8, 99),
(224, 18, 25, 0, 30, 6, 100),
(225, 18, 24, 0, 5, 6, 100),
(226, 18, 25, 0, 39, 11, 101),
(227, 18, 24, 0, 5, 11, 101),
(228, 18, 25, 0, 29, 3, 102),
(229, 18, 24, 0, 5, 3, 102),
(230, 18, 25, 0, 38, 10, 103),
(231, 18, 24, 0, 8, 10, 103),
(232, 17, 22, 0, 1776, 12, 104),
(233, 17, 23, 0, 573, 12, 104),
(234, 17, 22, 0, 1945, 5, 105),
(235, 17, 23, 0, 1976, 5, 105),
(236, 17, 22, 0, 1390, 9, 106),
(237, 17, 23, 0, 320, 9, 106),
(238, 18, 25, 0, 28, 5, 107),
(239, 18, 24, 0, 7, 5, 107),
(240, 18, 25, 0, 36, 9, 108),
(241, 18, 24, 0, 5, 9, 108),
(242, 18, 25, 0, 57, 12, 109),
(243, 18, 24, 0, 7, 12, 109),
(244, 17, 22, 0, 4909, 12, 110),
(245, 17, 23, 0, 5254, 12, 110),
(246, 17, 22, 0, 3738, 5, 111),
(247, 17, 23, 0, 3889, 5, 111),
(248, 17, 22, 0, 3860, 9, 112),
(249, 17, 23, 0, 3872, 9, 112),
(250, 17, 22, 0, 7622, 8, 113),
(251, 17, 23, 0, 7442, 8, 113),
(252, 17, 22, 0, 3738, 6, 114),
(253, 17, 23, 0, 3889, 6, 114),
(254, 17, 22, 0, 2447, 3, 115),
(255, 17, 23, 0, 2345, 3, 115),
(256, 17, 22, 0, 3585, 10, 116),
(257, 17, 23, 0, 3422, 10, 116),
(258, 17, 22, 0, 3874, 11, 117),
(259, 17, 23, 0, 3875, 11, 117),
(260, 19, 26, 0, 12, 12, 118),
(261, 19, 27, 0, 13, 12, 118);

-- --------------------------------------------------------

--
-- Table structure for table `data_variabel`
--

CREATE TABLE `data_variabel` (
  `id_variabel` int(11) NOT NULL,
  `variabel` varchar(255) NOT NULL,
  `cell` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=kolom; 2=baris',
  `id_laporan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_variabel`
--

INSERT INTO `data_variabel` (`id_variabel`, `variabel`, `cell`, `id_laporan`) VALUES
(7, 'Laki-Laki', 1, 10),
(8, 'Perempuan', 1, 10),
(9, 'Laki-Laki', 1, 11),
(10, 'Perempuan', 1, 11),
(22, 'Laki-Laki', 1, 17),
(23, 'Perempuan', 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `ds_fasilitas_perkreditan`
--

CREATE TABLE `ds_fasilitas_perkreditan` (
  `id_fasilitas` int(11) NOT NULL,
  `periode` varchar(8) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `ued_sp` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'unit|orang',
  `bkm` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'unit|orang',
  `kmkp` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'unit|orang',
  `pnpm` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'unit|orang',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_keterangan_umum`
--

CREATE TABLE `ds_keterangan_umum` (
  `id_keterangan_umum` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `tinggi` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tinggi Pusat Pemerintah Wilayah Kecamatan dari permukaan Laut',
  `suhu` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'max|min',
  `jarak_a` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'km|menit; Kecamatan yang terjauh',
  `jarak_b` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'km|menit; Kabupaten/Kota',
  `jarak_c` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'km|menit; Ibu Kota Propinsi',
  `curah_hujan_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jumlah Hari dengan curah hujan yang Terbanyak',
  `curah_hujan_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Banyaknya Curah Hujan',
  `bentuk_wilayah` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Datar Sampai berombak',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_luas_daerah`
--

CREATE TABLE `ds_luas_daerah` (
  `id_luas` int(11) NOT NULL,
  `periode` varchar(8) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `tanah_sawah` varchar(11) NOT NULL DEFAULT '0',
  `tanah_sawah_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Irigasi Tehnis',
  `tanah_sawah_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Irigasi Setengah Tehnis',
  `tanah_sawah_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Irigasi Sederhana',
  `tanah_sawah_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tanah Hujan/Sawah rendengan',
  `tanah_kering` varchar(11) NOT NULL DEFAULT '0',
  `tanah_kering_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Pekarangan/Bangunan/Emplasement',
  `tanah_kering_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tegal/Kebun',
  `tanah_kering_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Ladang/Tanah Huma',
  `tanah_kering_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Ladang Pengembalaan/Pangonan',
  `tanah_basah` varchar(11) NOT NULL DEFAULT '0',
  `tanah_basah_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tambak',
  `tanah_basah_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Rawa/Pasang Surut',
  `tanah_basah_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Balong/Empang/Kolam',
  `tanah_basah_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tanah Gambut',
  `tanah_hutan` varchar(11) NOT NULL DEFAULT '0',
  `tanah_hutan_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Hutan Lebat',
  `tanah_hutan_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Hutan Belukar',
  `tanah_hutan_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Hutan Sejenis',
  `tanah_hutan_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Hutan Rawa',
  `tanah_perkebunan` varchar(11) NOT NULL DEFAULT '0',
  `tanah_perkebunan_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Perkebunan Negara',
  `tanah_perkebunan_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Perkebunan Swasta',
  `tanah_fasilitas_umum` varchar(11) NOT NULL DEFAULT '0',
  `tanah_fasilitas_umum_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Lapangan Olah Raga',
  `tanah_fasilitas_umum_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Taman Rekreasi',
  `tanah_fasilitas_umum_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalur Hijau',
  `tanah_fasilitas_umum_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Kuburan',
  `tanah_lain` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Lain – lain (tanah tandus, tanah pasir)',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_panjang_jalan_jembatan`
--

CREATE TABLE `ds_panjang_jalan_jembatan` (
  `id_panjang` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `jenis_jalan_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Negara',
  `jenis_jalan_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Negara',
  `jenis_jalan_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Kota ',
  `jenis_jalan_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Desa',
  `kelas_jalan_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Kelas I ',
  `kelas_jalan_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Kelas II',
  `kelas_jalan_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Kelas III',
  `kelas_jalan_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Kelas IIIa',
  `kelas_jalan_e` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Kelas IV',
  `kelas_jalan_f` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Jalan Kelurahan',
  `jembatan_a` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'buah|meter; Jembatan Beton/Batu/Bata',
  `jembatan_b` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'buah|meter; Jembatan Besi',
  `jembatan_c` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'buah|meter; Jembatan Kayu/besi',
  `jembatan_d` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'buah|meter; Jembatan lain-lain',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_pemerintah_kecamatan`
--

CREATE TABLE `ds_pemerintah_kecamatan` (
  `id_pemerintah_kecamatan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL COMMENT '2018-12',
  `id_kelurahan` int(11) NOT NULL,
  `kantor_status_kepemilikan` int(11) NOT NULL DEFAULT '1' COMMENT '1=milik_pemth; 2=sewa; 3=numpang',
  `kantor_luas_tanah` varchar(11) NOT NULL DEFAULT '0',
  `kantor_luas_bangunan` varchar(11) DEFAULT '0',
  `kantor_tahun_dibangun` varchar(11) NOT NULL DEFAULT '0',
  `kantor_dana_apbn` varchar(11) NOT NULL DEFAULT '0',
  `kantor_inpres` varchar(11) NOT NULL DEFAULT '0',
  `kantor_dana_apbd1` varchar(11) NOT NULL DEFAULT '0',
  `kantor_dana_apbd2` varchar(11) NOT NULL DEFAULT '0',
  `kantor_dana_lain` varchar(11) NOT NULL DEFAULT '0',
  `kantor_bangunan_bertingkat` varchar(11) NOT NULL DEFAULT '0' COMMENT '1=ya; 0=tidak',
  `rumah_status_kepemilikan` int(11) NOT NULL DEFAULT '1' COMMENT '1=milik_pemth; 2=sewa; 3=numpang',
  `rumah_luas_bangunan` varchar(11) NOT NULL DEFAULT '0',
  `rumah_tahun_dibangun` varchar(11) NOT NULL DEFAULT '0',
  `rumah_dana_apbn` varchar(11) NOT NULL DEFAULT '0',
  `rumah_dana_inpres` varchar(11) NOT NULL DEFAULT '0',
  `rumah_dana_apbd1` varchar(11) NOT NULL DEFAULT '0',
  `rumah_dana_apbd2` varchar(11) NOT NULL DEFAULT '0',
  `rumah_dana_lain` varchar(11) NOT NULL DEFAULT '0',
  `rumah_kondisi` int(11) NOT NULL DEFAULT '1' COMMENT '1=baik; 2=sedang; rusak=3',
  `instansi_vertkal` varchar(255) NOT NULL DEFAULT '0|0|0|0' COMMENT 'KORAMIL|POLSEK|KUA|STATISTIK',
  `instansi_otonom` varchar(255) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'UPTDPendidikan|Puskesmas Poncol|Puskesmas Miroto|UPTB Bapermasper|RPL Pertanian',
  `instansi_bumn_bumd` varchar(255) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'PERTAMINA|TELKOM|KAI|PLN|POS|BPD',
  `jenis_pegawai` varchar(255) NOT NULL DEFAULT '0|0|0|0' COMMENT 'pusat Dpb|Pusat Dpk|Daerah|TPLH',
  `eseloniring` varchar(255) NOT NULL DEFAULT '0|0|0|0' COMMENT '(III/a)|(III/b)|(IV/a)|(IV/b)',
  `tipe_kecamatan` varchar(11) NOT NULL COMMENT 'A/B/C/D/E',
  `lomba` varchar(255) NOT NULL,
  `kejuaraan` varchar(255) NOT NULL DEFAULT '0|0|0' COMMENT 'juara 1|juara 2|juara 3',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_pemerintah_kelurahan`
--

CREATE TABLE `ds_pemerintah_kelurahan` (
  `id_pemerintah_kelurahan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL DEFAULT '0',
  `lingkungan` int(11) NOT NULL DEFAULT '0',
  `rw` int(11) NOT NULL DEFAULT '0',
  `rt` int(11) NOT NULL DEFAULT '0',
  `kejuaraan` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kecamatan` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kecamatan_1` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kecamatan_2` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kecamatan_3` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kota` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kota_1` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kota_2` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_kota_3` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_provinsi` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_provinsi_1` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_provinsi_2` int(11) NOT NULL DEFAULT '0',
  `kejuaraan_tk_provinsi_3` int(11) NOT NULL DEFAULT '0',
  `lkmd_1` int(11) NOT NULL DEFAULT '0',
  `lkmd_2` int(11) NOT NULL DEFAULT '0',
  `lkmd_3` int(11) NOT NULL DEFAULT '0',
  `kpd_a` int(11) NOT NULL DEFAULT '0' COMMENT 'Jumlah KPD se Kecamatan',
  `kpd_b` int(11) NOT NULL DEFAULT '0' COMMENT 'KPD yang aktif',
  `kpp_c` int(11) NOT NULL DEFAULT '0' COMMENT 'KPD yang tidak aktif',
  `kpd_d` int(11) NOT NULL DEFAULT '0' COMMENT 'Pembina Teknis KPD Tk. Kecamatan',
  `kpd_d1` int(11) NOT NULL DEFAULT '0' COMMENT 'Berasal dari Kantor Kecamatan',
  `kpd_d2` int(11) NOT NULL DEFAULT '0' COMMENT 'Berasal dari Instansi Otonom',
  `kpd_d3` int(11) NOT NULL DEFAULT '0' COMMENT 'Berasal dari Instansi Vertikal',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_pengangkutan_komunikasi`
--

CREATE TABLE `ds_pengangkutan_komunikasi` (
  `id_pengangkutan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `lalulintas_darat` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Lalu lintas melalui darat Kecamatan',
  `lalulintas_air` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Lalu lintas melalui Air / Laut / Sungai',
  `jalan_aspal` varchar(11) NOT NULL DEFAULT '0',
  `jalan_diperkeras` varchar(11) NOT NULL DEFAULT '0',
  `jalan_tanah` varchar(11) NOT NULL DEFAULT '0',
  `jalan_utama_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Beberapa panjang jalan utama yang tidak dapat dilalui kendaraan roda 4 sepanjang tahun',
  `jalan_utama_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Beberapa panjang jalan utama yang dapat dilalui kendaraan roda 4 sepanjang tahun',
  `sarana_umum_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Motor air',
  `sarana_umum_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Sepeda/Ojek',
  `sarana_umum_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Delman',
  `saranan_umum_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Dan Lain-lain',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_perusahaan_usaha`
--

CREATE TABLE `ds_perusahaan_usaha` (
  `id_perusahaan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `industri_a` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'Besar  dan Sedang; buah|orang ',
  `industri_b` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'Kecil; buah|orang ',
  `industri_c` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'Rumah Tangga; buah|orang ',
  `perhotelan` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'Perhotelan / Losmen / Penginapan; buah|orang ',
  `rumah_makan` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'Rumah Makan/ Warung Makan; buah|orang ',
  `perdagangan` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'buah|orang ',
  `angkutan` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'buah|orang ',
  `lain_lain` varchar(11) NOT NULL DEFAULT '0|0' COMMENT 'buah|orang ',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_prasarana_pemerintah`
--

CREATE TABLE `ds_prasarana_pemerintah` (
  `id_prasaranan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `balai_kelurahan` int(11) NOT NULL DEFAULT '0',
  `kantor_kelurahan` int(11) NOT NULL DEFAULT '0',
  `tanah_eks_bengkok_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tanah Sawah',
  `tanah_eks_bengkok_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tanah kering',
  `tanah_eks_bengkok_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tambak / kolam',
  `tanah_eks_bengkok_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Lain – lain',
  `tanah_pemkot_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tanah Sawah',
  `tanah_pemkot_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tanah kering',
  `tanah_pemkot_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Tambak / kolam',
  `tanah_pemkot_d` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Rawa – rawa',
  `tanah_pemkot_e` varchar(11) NOT NULL DEFAULT '0' COMMENT 'Lain – lain',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_prasarana_pengairan`
--

CREATE TABLE `ds_prasarana_pengairan` (
  `id_pengairan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `waduk_a` varchar(11) NOT NULL DEFAULT '0' COMMENT 'baik',
  `waduk_b` varchar(11) NOT NULL DEFAULT '0' COMMENT 'rusak dapat dipakai',
  `waduk_c` varchar(11) NOT NULL DEFAULT '0' COMMENT 'rusak sama sekali',
  `dam` int(11) NOT NULL DEFAULT '0',
  `kincir_air` int(11) NOT NULL DEFAULT '0',
  `pompa_air` int(11) NOT NULL DEFAULT '0',
  `air_terjun` int(11) NOT NULL DEFAULT '0' COMMENT 'Min Lebar 2m tinggi 10 m ',
  `sungai` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sarana_kapal_perahu`
--

CREATE TABLE `ds_sarana_kapal_perahu` (
  `id_kapal_perahu` int(11) NOT NULL,
  `periode` varchar(8) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `kapal` int(11) NOT NULL DEFAULT '0',
  `perahu_motor` int(11) NOT NULL DEFAULT '0',
  `perahu` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sarana_perekonomian`
--

CREATE TABLE `ds_sarana_perekonomian` (
  `id_perekonomian` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `koperasi_a` int(11) NOT NULL DEFAULT '0' COMMENT 'Koperasi Simpan Pinjam',
  `koperasi_b` int(11) NOT NULL DEFAULT '0' COMMENT 'Koperasi Unit Desa',
  `koperasi_c` int(11) NOT NULL DEFAULT '0' COMMENT 'B K K',
  `koperasi_d` int(11) NOT NULL DEFAULT '0' COMMENT 'BPKD',
  `koperasi_e` int(11) NOT NULL DEFAULT '0' COMMENT 'Badan-Badan Kredit',
  `koperasi_f` int(11) NOT NULL DEFAULT '0' COMMENT 'Koperasi Produksi',
  `koperasi_g` int(11) NOT NULL DEFAULT '0' COMMENT 'Koperasi Konsumsi',
  `koperasi_h` int(11) NOT NULL DEFAULT '0' COMMENT 'Koperasi Lainnya',
  `pasar_a` int(11) NOT NULL DEFAULT '0' COMMENT 'umum',
  `pasar_b` int(11) NOT NULL DEFAULT '0' COMMENT 'ikan',
  `pasar_c` int(11) NOT NULL DEFAULT '0' COMMENT 'hewan',
  `pasar_permanen` int(11) DEFAULT '0' COMMENT 'Pasar Bangunan Permanen /Semi Permanen',
  `pasar_tanpa_bangunan` int(11) NOT NULL DEFAULT '0' COMMENT 'Pasar tanpa Bangunan Semi Per-manen',
  `toko_warung` int(11) NOT NULL DEFAULT '0',
  `bank` int(11) NOT NULL DEFAULT '0',
  `lumbung_desa` int(11) NOT NULL DEFAULT '0',
  `stasiun_a` int(11) NOT NULL DEFAULT '0' COMMENT 'Kapal Udara',
  `stasiun_b` int(11) NOT NULL DEFAULT '0' COMMENT 'Kapal laut ',
  `stasiun_c` int(11) NOT NULL DEFAULT '0' COMMENT 'Kapal  api',
  `stasiun_d` int(11) NOT NULL DEFAULT '0' COMMENT 'Bis',
  `stasiun_e` int(11) NOT NULL DEFAULT '0' COMMENT 'oplet',
  `telpon_umum` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sb_kb_cacat`
--

CREATE TABLE `ds_sb_kb_cacat` (
  `id_sb_kb_cacat` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `jml_pos` int(11) NOT NULL DEFAULT '0',
  `jml_pus` int(11) NOT NULL DEFAULT '0',
  `jml_masuk_kb` int(11) NOT NULL DEFAULT '0',
  `jml_posyandu` int(11) NOT NULL DEFAULT '0',
  `jml_akseptor_pil` int(11) NOT NULL DEFAULT '0',
  `jml_akseptor_iud` int(11) NOT NULL DEFAULT '0',
  `jml_akseptor_kondom` int(11) NOT NULL DEFAULT '0',
  `jml_akseptor_suntik` int(11) NOT NULL DEFAULT '0',
  `jml_akseptor_mop` int(11) NOT NULL DEFAULT '0',
  `jml_akseptor_mandiri` int(11) NOT NULL DEFAULT '0',
  `jml_akseptor_implant` int(11) NOT NULL DEFAULT '0',
  `cacat_fisik` int(11) NOT NULL DEFAULT '0',
  `cacat_mental` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sb_kesehatan`
--

CREATE TABLE `ds_sb_kesehatan` (
  `id_sb_kesehatan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `rsu_pemerintah` varchar(11) NOT NULL DEFAULT '0|0|0' COMMENT 'pengunjung|jan-jun|jul-des',
  `rsu_swasta` varchar(11) NOT NULL DEFAULT '0|0|0' COMMENT 'pengunjung|jan-jun|jul-des',
  `rsk` varchar(11) NOT NULL DEFAULT '0|0|0' COMMENT 'pengunjung|jan-jun|jul-des',
  `rsk_swasta` varchar(11) NOT NULL DEFAULT '0|0|0' COMMENT 'pengunjung|jan-jun|jul-des',
  `rsb` varchar(11) NOT NULL DEFAULT '0|0|0' COMMENT 'pengunjung|jan-jun|jul-des',
  `poliklinik` varchar(11) NOT NULL DEFAULT '0|0|0' COMMENT 'pengunjung|jan-jun|jul-des',
  `puskesmas` varchar(11) NOT NULL DEFAULT '0|0|0' COMMENT 'pengunjung|jan-jun|jul-des',
  `dokter` int(11) NOT NULL DEFAULT '0',
  `perawat` int(11) NOT NULL DEFAULT '0',
  `bidan` int(11) DEFAULT '0',
  `praktek_dokter` int(11) NOT NULL DEFAULT '0',
  `praktek_dokter_umum` int(11) NOT NULL DEFAULT '0',
  `praktek_dokter_anak` int(11) NOT NULL DEFAULT '0',
  `praktek_dokter_kandungan` int(11) NOT NULL DEFAULT '0',
  `praktek_dokter_kulit` int(11) NOT NULL DEFAULT '0',
  `praktek_dokter_ahli` int(11) NOT NULL DEFAULT '0',
  `dukun_khitan` int(11) NOT NULL DEFAULT '0',
  `dukun_bayi` int(11) NOT NULL DEFAULT '0',
  `sanatorium` int(11) NOT NULL DEFAULT '0',
  `apotik` int(11) NOT NULL DEFAULT '0',
  `panti_pijat` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sb_pariwisata`
--

CREATE TABLE `ds_sb_pariwisata` (
  `id_sb_pariwisata` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `taman` int(11) NOT NULL DEFAULT '0',
  `pantai` int(11) NOT NULL DEFAULT '0',
  `pemandian` int(11) NOT NULL DEFAULT '0',
  `hutan_lindung_goa` int(11) NOT NULL DEFAULT '0',
  `tempat_pertunjukan` int(11) NOT NULL DEFAULT '0',
  `kesenian_tradisional` int(11) NOT NULL DEFAULT '0',
  `tempat_rekreasi_lain` int(11) NOT NULL DEFAULT '0',
  `toko_souvenir` int(11) NOT NULL DEFAULT '0',
  `jml_perkumpulan` int(11) NOT NULL DEFAULT '0',
  `jml_budayawan` int(11) NOT NULL DEFAULT '0',
  `jml_seniman` int(11) NOT NULL DEFAULT '0',
  `bioskop` int(11) NOT NULL DEFAULT '0',
  `penginapan` int(11) NOT NULL DEFAULT '0',
  `restoran` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sb_pembangunan`
--

CREATE TABLE `ds_sb_pembangunan` (
  `id_sb_pembangunan` int(11) NOT NULL,
  `periode` varchar(8) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `jml_proyek` int(11) NOT NULL DEFAULT '0',
  `sektor_a` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Pertanian dan Pengairan ',
  `sektor_b` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Industri',
  `sektor_c` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Pertambangan dan Energi',
  `sektor_d` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Perdagangan dan Koperasi',
  `sektor_e` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Perdagangan dan Koperasi',
  `sektor_f` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Tenaga Kerja dan transmigrasi',
  `sektor_g` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Pembangunan Desa, dan Kelurahan',
  `sektor_h` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Agama',
  `sektor_i` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Pendidikan Generasi Muda, Kebudayaan dan Kepercayaan terhadap Tuhan Yang Maha Esa',
  `sektor_j` int(11) DEFAULT '0' COMMENT 'Sektor Kesehatan/Kesejahteraan, So-sial, Peranan Wanita, Kependudukan dan Keluarga Berencana',
  `sektor_k` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Perumahan Rakyat dan Pemukiman',
  `sektor_l` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Hukum',
  `sektor_m` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Perumahan Rakyat dan Pemukiman',
  `sektor_n` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Penerangan, Pers dan Komu-kasi Sosial',
  `sektor_o` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Ilmu Pengetahuan, Tehnologi dan Penelitan',
  `sektor_p` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Aparatur Pemerintahan',
  `sektor_q` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Pengembangan Dunia Usaha',
  `sektor_r` int(11) NOT NULL DEFAULT '0' COMMENT 'Sektor Sumber Alam dan Lingkungan',
  `biaya_pusat` varchar(11) NOT NULL DEFAULT '0',
  `biaya_dati1` varchar(11) NOT NULL DEFAULT '0',
  `biaya_dati2` varchar(11) NOT NULL DEFAULT '0',
  `biaya_swadaya` varchar(11) NOT NULL DEFAULT '0',
  `biaya_ln` varchar(11) NOT NULL DEFAULT '0',
  `biaya_lain` varchar(11) NOT NULL DEFAULT '0',
  `wajib_pbb` varchar(11) NOT NULL DEFAULT '0',
  `target_pbb` varchar(11) NOT NULL DEFAULT '0',
  `jml_ketetapan_pbb` varchar(11) NOT NULL DEFAULT '0',
  `tunggakan_pbb` varchar(11) NOT NULL DEFAULT '0',
  `realisasi_pbb` varchar(11) NOT NULL DEFAULT '0',
  `bidang_energi` int(11) NOT NULL DEFAULT '0',
  `bidang_pangan` int(11) NOT NULL DEFAULT '0',
  `bidang_pertanian` int(11) NOT NULL DEFAULT '0',
  `bidang_konstruksi` int(11) NOT NULL DEFAULT '0',
  `bidang_material` int(11) NOT NULL DEFAULT '0',
  `bidang_industri` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sb_pendidikan`
--

CREATE TABLE `ds_sb_pendidikan` (
  `id_sb_pendidikan` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `tk` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_negeri` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_inpres` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_madrasah` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_swasta_umum` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_swasta_islam` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_swasta_katolik` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_swasta_protestan` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_swasta_budha` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_swasta_hindu` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sd_lb` varchar(11) NOT NULL DEFAULT '0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|perpus(1=ada;0=tidak)',
  `sltp_negeri` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_madrasah` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_swasta_umum` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_swasta_islam` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_swasta_katolik` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_swasta_protestan` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_swasta_hindu` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_swasta_budha` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_kejuruan_negeri` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `sltp_kejuruan_swasta` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_negeri` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_madrasah` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_swasta_umum` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_swasta_islam` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_swasta_katolik` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_swasta_protestan` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_swasta_hindu` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_swasta_budha` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_kejuruan_negeri` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `slta_kejuruan_swasta` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_guru|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `akademi_negeri` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_dosen|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `akademi_swasta` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_dosen|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `pt_negeri` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_dosen|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `pt_swasta` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_dosen|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `kursus` varchar(11) NOT NULL DEFAULT '0|0|0|0|0|0' COMMENT 'jml_sekolah|jml_murid|jml_dosen|prasarana_fisik|lab|perpus(1=ada;0=tidak)',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sb_rumah_penduduk`
--

CREATE TABLE `ds_sb_rumah_penduduk` (
  `id_rumah_penduduk` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `rumah_a1` int(11) NOT NULL DEFAULT '0' COMMENT 'Dinding terbuat dari Batu / gedung permanen',
  `rumah_a2` int(11) NOT NULL DEFAULT '0' COMMENT 'Dinding terbuat dari sebagian Batu / gedung ',
  `rumah_a3` int(11) NOT NULL DEFAULT '0' COMMENT 'Dinding terbuat dari kayu / papan',
  `rumah_a4` int(11) NOT NULL DEFAULT '0' COMMENT 'Dinding terbuat dari bamboo / lainnya',
  `rumah_b1` int(11) NOT NULL DEFAULT '0' COMMENT 'Tipe A',
  `rumah_b2` int(11) NOT NULL DEFAULT '0' COMMENT 'Tipe B',
  `rumah_b3` int(11) NOT NULL DEFAULT '0' COMMENT 'Tipe C',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ds_sb_tempat_ibadah`
--

CREATE TABLE `ds_sb_tempat_ibadah` (
  `id_sb_tempat_ibadah` int(11) NOT NULL,
  `periode` varchar(11) NOT NULL COMMENT '2018-II',
  `id_kelurahan` int(11) NOT NULL,
  `masjid` int(11) NOT NULL DEFAULT '0',
  `musholla` int(11) NOT NULL DEFAULT '0',
  `gereja` int(11) NOT NULL DEFAULT '0',
  `kuil_pura` int(11) NOT NULL DEFAULT '0',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_pindah`
--

CREATE TABLE `keterangan_pindah` (
  `id_keterangan` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan_pindah`
--

INSERT INTO `keterangan_pindah` (`id_keterangan`, `keterangan`) VALUES
(1, 'Antar Kelurahan'),
(2, 'Antar Kecamatan'),
(3, 'Antar Kab/Kota'),
(4, 'Antar Provinsi'),
(5, 'Antar Negara');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `level` int(2) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`level`, `keterangan`) VALUES
(1, 'Kecamatan'),
(2, 'Kelurahan');

-- --------------------------------------------------------

--
-- Table structure for table `master_rekening`
--

CREATE TABLE `master_rekening` (
  `id_rekening` int(11) NOT NULL,
  `kode_rekening` text NOT NULL,
  `uraian` text NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '1=hapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_rekening`
--

INSERT INTO `master_rekening` (`id_rekening`, `kode_rekening`, `uraian`, `flag`) VALUES
(1, '3.1.06 3.1.06.05 00000 5 1 1 01 01', 'Gaji Pokok PNS/Uang Representasi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_anggaran`
--

CREATE TABLE `realisasi_anggaran` (
  `id_realisasi` int(11) NOT NULL,
  `id_anggaran_kelurahan` int(11) NOT NULL,
  `periode` varchar(8) NOT NULL COMMENT '2018-12',
  `jenis_spj` tinyint(1) NOT NULL COMMENT '1=LS Gaji; 2=LS Barang - Jasa; 3=UP / GU / TU',
  `tgl_realisasi` date NOT NULL,
  `nominal_realisasi` varchar(15) NOT NULL DEFAULT '0',
  `jenis_pajak` tinyint(1) NOT NULL COMMENT '1=PPN; 2=PPh4; 3=PPh21; 4=PPh22; 5=PPh23',
  `nominal_pajak` varchar(15) NOT NULL DEFAULT '0',
  `nominal_sp2d` varchar(15) NOT NULL DEFAULT '0',
  `nominal_lain` varchar(15) NOT NULL DEFAULT '0',
  `verified` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=yes; 2=no',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `kode_kecamatan` varchar(50) NOT NULL,
  `kode_kelurahan` varchar(50) NOT NULL,
  `status` int(2) DEFAULT NULL COMMENT '1=aktif; 2=tidak aktif',
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `username`, `password`, `level`, `kode_kecamatan`, `kode_kelurahan`, `status`, `date_create`) VALUES
(3, 'Admin Kecamatan', 'camat', 'd93a5def7511da3d0f2d171d9c344e91', 1, '232323', '', 1, '2018-07-22 16:08:21'),
(5, 'bendanduwur', 'bendanduwur', 'd93a5def7511da3d0f2d171d9c344e91', 2, '', '3374040002', 1, '2018-07-22 16:02:31'),
(6, 'lempongsari', 'lempongsari', 'd93a5def7511da3d0f2d171d9c344e91', 2, '', '3374040008', 1, '2018-07-22 16:02:21'),
(7, 'sampangan', 'sampangan', '131c68d784c0a3514edfb78f2233f530', 2, '', '3374040001', 1, '2018-07-23 15:16:53'),
(8, 'gajahmungkur', 'gajahmungkur', 'd93a5def7511da3d0f2d171d9c344e91', 2, '', '3374040004', 1, '2018-07-22 16:01:35'),
(9, 'bendanngisor', 'bendanngisor', 'd93a5def7511da3d0f2d171d9c344e91', 2, '', '3374040005', 1, '2018-07-22 16:03:15'),
(10, 'karangrejo', 'karangrejo', 'd93a5def7511da3d0f2d171d9c344e91', 2, '', '3374040003', 1, '2018-07-22 16:03:42'),
(11, 'petompon', 'petompon', 'd93a5def7511da3d0f2d171d9c344e91', 2, '', '3374040006', 1, '2018-07-22 16:04:26'),
(12, 'bendungan', 'bendungan', 'd93a5def7511da3d0f2d171d9c344e91', 2, '', '3374040007', 1, '2018-07-22 16:05:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `anggaran_kelurahan`
--
ALTER TABLE `anggaran_kelurahan`
  ADD PRIMARY KEY (`id_anggaran_kelurahan`);

--
-- Indexes for table `camat`
--
ALTER TABLE `camat`
  ADD PRIMARY KEY (`id_camat`);

--
-- Indexes for table `data_anggaran`
--
ALTER TABLE `data_anggaran`
  ADD PRIMARY KEY (`id_anggaran`);

--
-- Indexes for table `data_hansip_limas`
--
ALTER TABLE `data_hansip_limas`
  ADD PRIMARY KEY (`id_hansip_limas`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `data_kelurahan`
--
ALTER TABLE `data_kelurahan`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `data_laporan`
--
ALTER TABLE `data_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `data_mutasi_tanah_sengketa`
--
ALTER TABLE `data_mutasi_tanah_sengketa`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `data_pengisi`
--
ALTER TABLE `data_pengisi`
  ADD PRIMARY KEY (`id_pengisi`);

--
-- Indexes for table `data_pengisian`
--
ALTER TABLE `data_pengisian`
  ADD PRIMARY KEY (`id_pengisian`);

--
-- Indexes for table `data_variabel`
--
ALTER TABLE `data_variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- Indexes for table `ds_fasilitas_perkreditan`
--
ALTER TABLE `ds_fasilitas_perkreditan`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `ds_keterangan_umum`
--
ALTER TABLE `ds_keterangan_umum`
  ADD PRIMARY KEY (`id_keterangan_umum`);

--
-- Indexes for table `ds_luas_daerah`
--
ALTER TABLE `ds_luas_daerah`
  ADD PRIMARY KEY (`id_luas`);

--
-- Indexes for table `ds_panjang_jalan_jembatan`
--
ALTER TABLE `ds_panjang_jalan_jembatan`
  ADD PRIMARY KEY (`id_panjang`);

--
-- Indexes for table `ds_pemerintah_kecamatan`
--
ALTER TABLE `ds_pemerintah_kecamatan`
  ADD PRIMARY KEY (`id_pemerintah_kecamatan`);

--
-- Indexes for table `ds_pemerintah_kelurahan`
--
ALTER TABLE `ds_pemerintah_kelurahan`
  ADD PRIMARY KEY (`id_pemerintah_kelurahan`);

--
-- Indexes for table `ds_pengangkutan_komunikasi`
--
ALTER TABLE `ds_pengangkutan_komunikasi`
  ADD PRIMARY KEY (`id_pengangkutan`);

--
-- Indexes for table `ds_perusahaan_usaha`
--
ALTER TABLE `ds_perusahaan_usaha`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `ds_prasarana_pemerintah`
--
ALTER TABLE `ds_prasarana_pemerintah`
  ADD PRIMARY KEY (`id_prasaranan`);

--
-- Indexes for table `ds_prasarana_pengairan`
--
ALTER TABLE `ds_prasarana_pengairan`
  ADD PRIMARY KEY (`id_pengairan`);

--
-- Indexes for table `ds_sarana_kapal_perahu`
--
ALTER TABLE `ds_sarana_kapal_perahu`
  ADD PRIMARY KEY (`id_kapal_perahu`);

--
-- Indexes for table `ds_sarana_perekonomian`
--
ALTER TABLE `ds_sarana_perekonomian`
  ADD PRIMARY KEY (`id_perekonomian`);

--
-- Indexes for table `ds_sb_kb_cacat`
--
ALTER TABLE `ds_sb_kb_cacat`
  ADD PRIMARY KEY (`id_sb_kb_cacat`);

--
-- Indexes for table `ds_sb_kesehatan`
--
ALTER TABLE `ds_sb_kesehatan`
  ADD PRIMARY KEY (`id_sb_kesehatan`);

--
-- Indexes for table `ds_sb_pariwisata`
--
ALTER TABLE `ds_sb_pariwisata`
  ADD PRIMARY KEY (`id_sb_pariwisata`);

--
-- Indexes for table `ds_sb_pembangunan`
--
ALTER TABLE `ds_sb_pembangunan`
  ADD PRIMARY KEY (`id_sb_pembangunan`);

--
-- Indexes for table `ds_sb_pendidikan`
--
ALTER TABLE `ds_sb_pendidikan`
  ADD PRIMARY KEY (`id_sb_pendidikan`);

--
-- Indexes for table `ds_sb_rumah_penduduk`
--
ALTER TABLE `ds_sb_rumah_penduduk`
  ADD PRIMARY KEY (`id_rumah_penduduk`);

--
-- Indexes for table `ds_sb_tempat_ibadah`
--
ALTER TABLE `ds_sb_tempat_ibadah`
  ADD PRIMARY KEY (`id_sb_tempat_ibadah`);

--
-- Indexes for table `keterangan_pindah`
--
ALTER TABLE `keterangan_pindah`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`level`);

--
-- Indexes for table `master_rekening`
--
ALTER TABLE `master_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `realisasi_anggaran`
--
ALTER TABLE `realisasi_anggaran`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `anggaran_kelurahan`
--
ALTER TABLE `anggaran_kelurahan`
  MODIFY `id_anggaran_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `camat`
--
ALTER TABLE `camat`
  MODIFY `id_camat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_anggaran`
--
ALTER TABLE `data_anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `data_hansip_limas`
--
ALTER TABLE `data_hansip_limas`
  MODIFY `id_hansip_limas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_kecamatan`
--
ALTER TABLE `data_kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_kelurahan`
--
ALTER TABLE `data_kelurahan`
  MODIFY `id_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `data_laporan`
--
ALTER TABLE `data_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `data_mutasi_tanah_sengketa`
--
ALTER TABLE `data_mutasi_tanah_sengketa`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_pengisi`
--
ALTER TABLE `data_pengisi`
  MODIFY `id_pengisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `data_pengisian`
--
ALTER TABLE `data_pengisian`
  MODIFY `id_pengisian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT for table `data_variabel`
--
ALTER TABLE `data_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `ds_fasilitas_perkreditan`
--
ALTER TABLE `ds_fasilitas_perkreditan`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_keterangan_umum`
--
ALTER TABLE `ds_keterangan_umum`
  MODIFY `id_keterangan_umum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_luas_daerah`
--
ALTER TABLE `ds_luas_daerah`
  MODIFY `id_luas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_panjang_jalan_jembatan`
--
ALTER TABLE `ds_panjang_jalan_jembatan`
  MODIFY `id_panjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_pemerintah_kecamatan`
--
ALTER TABLE `ds_pemerintah_kecamatan`
  MODIFY `id_pemerintah_kecamatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_pemerintah_kelurahan`
--
ALTER TABLE `ds_pemerintah_kelurahan`
  MODIFY `id_pemerintah_kelurahan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_pengangkutan_komunikasi`
--
ALTER TABLE `ds_pengangkutan_komunikasi`
  MODIFY `id_pengangkutan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_perusahaan_usaha`
--
ALTER TABLE `ds_perusahaan_usaha`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_prasarana_pemerintah`
--
ALTER TABLE `ds_prasarana_pemerintah`
  MODIFY `id_prasaranan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_prasarana_pengairan`
--
ALTER TABLE `ds_prasarana_pengairan`
  MODIFY `id_pengairan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sarana_kapal_perahu`
--
ALTER TABLE `ds_sarana_kapal_perahu`
  MODIFY `id_kapal_perahu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sarana_perekonomian`
--
ALTER TABLE `ds_sarana_perekonomian`
  MODIFY `id_perekonomian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sb_kb_cacat`
--
ALTER TABLE `ds_sb_kb_cacat`
  MODIFY `id_sb_kb_cacat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sb_kesehatan`
--
ALTER TABLE `ds_sb_kesehatan`
  MODIFY `id_sb_kesehatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sb_pariwisata`
--
ALTER TABLE `ds_sb_pariwisata`
  MODIFY `id_sb_pariwisata` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sb_pembangunan`
--
ALTER TABLE `ds_sb_pembangunan`
  MODIFY `id_sb_pembangunan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sb_pendidikan`
--
ALTER TABLE `ds_sb_pendidikan`
  MODIFY `id_sb_pendidikan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sb_rumah_penduduk`
--
ALTER TABLE `ds_sb_rumah_penduduk`
  MODIFY `id_rumah_penduduk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ds_sb_tempat_ibadah`
--
ALTER TABLE `ds_sb_tempat_ibadah`
  MODIFY `id_sb_tempat_ibadah` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keterangan_pindah`
--
ALTER TABLE `keterangan_pindah`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_rekening`
--
ALTER TABLE `master_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `realisasi_anggaran`
--
ALTER TABLE `realisasi_anggaran`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
