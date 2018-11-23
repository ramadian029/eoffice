-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 04:26 AM
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
(11, 5, 10, '20000000', NULL, NULL, 0),
(12, 6, 12, '1000000', NULL, NULL, 0),
(13, 6, 5, '1000000', NULL, NULL, 0),
(14, 6, 9, '1000000', NULL, NULL, 0),
(15, 6, 8, '1000000', NULL, NULL, 0),
(16, 6, 6, '2000000', NULL, NULL, 0),
(17, 6, 11, '2000000', NULL, NULL, 0),
(18, 6, 3, '2000000', NULL, NULL, 0),
(19, 6, 10, '2000000', NULL, NULL, 0),
(20, 7, 12, '10000000', NULL, NULL, 0),
(21, 7, 5, '50000000', NULL, NULL, 0),
(22, 7, 9, '10000000', NULL, NULL, 0),
(23, 7, 8, '10000000', NULL, NULL, 0),
(24, 7, 6, '10000000', NULL, NULL, 0),
(25, 7, 11, '10000000', NULL, NULL, 0),
(26, 7, 3, '10000000', NULL, NULL, 0),
(27, 7, 10, '10000000', NULL, NULL, 0),
(28, 5, 0, '0', NULL, NULL, 0),
(29, 6, 0, '0', NULL, NULL, 0),
(30, 7, 0, '0', NULL, NULL, 0);

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
(5, '2018', 1, '160000000.00', NULL, NULL, 0),
(6, '2018', 2, '12000000.00', NULL, NULL, 0),
(7, '2018', 3, '200000000.00', NULL, NULL, 0);

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
(0, '111111', 'Kecamatan Semarang Tengah', '', '', '', 0),
(1, '343434', 'Bendanduwurx', '', '', '', 1),
(2, '222222', 'Bendanngisorx', '', '', '', 1),
(3, '3374040007', 'Bendungan', '', '', '', 0),
(5, '3374040002', 'Bendan Duwur', '', '', '', 0),
(6, '3374040005', 'Bendan Ngisor', '', '', '', 0),
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
  `id_kategori` int(11) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '1=hapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_laporan`
--

INSERT INTO `data_laporan` (`id_laporan`, `laporan`, `id_kategori`, `flag`) VALUES
(1, 'RINCIAN JUMLAH PENDUDUK', NULL, 0),
(2, 'MUTASI PINDAH/DATANG', NULL, 0),
(3, 'KEPALA KELUARGA', NULL, 0),
(4, 'JUMLAH PENDUDUK MENURUT KELOMPOK UMUR', NULL, 0),
(5, 'MUTASI PENDUDUK', NULL, 0),
(6, 'JML PENDUDUK MENURUT PENDIDIKAN (Umur 5 Tahun Ke Atas)', NULL, 0),
(7, 'JML PENDUDUK MENURUT PEKERJAAN (Umur 5 Tahun Ke Atas)', NULL, 0),
(8, 'BANYAKNYA PEMELUK AGAMA', NULL, 0),
(9, 'NCTR', NULL, 0),
(10, 'JUMLAH HEWAN BESAR DAN KECIL', NULL, 0),
(11, 'WNI KETURUNAN ASING', NULL, 0),
(12, 'PENDUDUK WNA', NULL, 0),
(13, 'JUMLAH BEBERAPA FASILITAS', NULL, 0);

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
  `periode` varchar(11) DEFAULT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengisi`
--

INSERT INTO `data_pengisi` (`id_pengisi`, `id_kelurahan`, `id_laporan`, `periode`, `tgl_input`) VALUES
(1, 10, 1, '10/2018', '2018-11-14 01:49:25');

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
(1, 1, 1, 3, 20, 10, 1),
(2, 1, 2, 3, 0, 10, 1),
(3, 1, 7, 3, 0, 10, 1),
(4, 1, 8, 3, 0, 10, 1),
(5, 1, 1, 4, 0, 10, 1),
(6, 1, 2, 4, 10, 10, 1),
(7, 1, 7, 4, 0, 10, 1),
(8, 1, 8, 4, 40, 10, 1),
(9, 1, 1, 6, 0, 10, 1),
(10, 1, 2, 6, 0, 10, 1),
(11, 1, 7, 6, 30, 10, 1),
(12, 1, 8, 6, 0, 10, 1),
(13, 1, 1, 9, 60, 10, 1),
(14, 1, 2, 9, 0, 10, 1),
(15, 1, 7, 9, 10, 10, 1),
(16, 1, 8, 9, 0, 10, 1),
(17, 1, 1, 10, 0, 10, 1),
(18, 1, 2, 10, 0, 10, 1),
(19, 1, 7, 10, 30, 10, 1),
(20, 1, 8, 10, 0, 10, 1),
(21, 1, 1, 11, 60, 10, 1),
(22, 1, 2, 11, 0, 10, 1),
(23, 1, 7, 11, 0, 10, 1),
(24, 1, 8, 11, 40, 10, 1);

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
(1, 'WNI LAKI-LAKI', 1, 1),
(2, 'WNI PEREMPUAN', 1, 1),
(3, ' PENDUDUK AWAL BULAN ', 2, 1),
(4, ' KELAHIRAN BULAN INI', 2, 1),
(6, ' KEMATIAN BULAN IN', 2, 1),
(7, 'WNA LAKI-LAKI', 1, 1),
(8, 'WNA PEREMPUAN', 1, 1),
(9, ' PENDATANG BULAN INI', 2, 1),
(10, ' PINDAH BULAN INI', 2, 1),
(11, ' PENDUDUK AKHIR BULAN', 2, 1),
(12, 'Datang - WNI L', 1, 2),
(13, 'Datang - WNI P', 1, 2),
(14, 'Datang - WNA L', 1, 2),
(15, 'Datang - WNA P', 1, 2),
(16, 'Pindah - WNI L', 1, 2),
(17, 'Pindah - WNI P', 1, 2),
(18, 'Pindah - WNA L', 1, 2),
(19, 'Pindah - WNA P', 1, 2),
(20, 'Antar Kelurahan', 2, 2),
(21, 'Antar Kecamatan', 2, 2),
(22, 'Antar Dati II', 2, 2),
(23, 'Antar Dati I', 2, 2),
(24, 'Ke/Dari LN', 2, 2),
(25, 'KK WNI L', 1, 3),
(26, 'KK WNI P', 1, 3),
(27, 'KK WNA L', 1, 3),
(28, 'KK WNA P', 1, 3),
(29, 'Jumlah', 2, 3),
(30, 'WNI L', 1, 4),
(31, 'WNI P', 1, 4),
(32, 'WNA L', 1, 4),
(33, 'WNA P', 1, 4),
(34, '0 - 4', 2, 4),
(35, '5 - 9', 2, 4),
(36, '10 - 14', 2, 4),
(37, '15 - 19', 2, 4),
(38, '20 - 24', 2, 4),
(39, '25 - 29', 2, 4),
(40, '30 - 34', 2, 4),
(41, '35 - 39', 2, 4),
(42, '40 - 44', 2, 4),
(43, '45 - 49', 2, 4),
(44, '50 - 54', 2, 4),
(45, '55 - 59', 2, 4),
(46, '60 - 64', 2, 4),
(47, '65 - ke atas', 2, 4),
(48, 'WNI L', 1, 5),
(49, 'WNI P', 1, 5),
(50, 'WNA L', 1, 5),
(51, 'WNA P', 1, 5),
(52, 'Pindah', 2, 5),
(53, 'Datang', 2, 5),
(54, 'Lahir', 2, 5),
(55, 'Mati', 2, 5),
(56, 'JUMLAH', 1, 6),
(57, 'Perguruan Tinggi', 2, 6),
(58, 'Akademi', 2, 6),
(59, 'SLTA', 2, 6),
(60, 'SLTP', 2, 6),
(61, 'SD', 2, 6),
(62, 'Tidak Tamat SD', 2, 6),
(63, 'Belum Tamat SD', 2, 6),
(64, 'Tidak Sekolah', 2, 6),
(65, 'JUMLAH', 1, 7),
(66, 'Petani Sendiri', 2, 7),
(67, 'Buruh Tani', 2, 7),
(68, 'Nelayan', 2, 7),
(69, 'Pengusaha', 2, 7),
(70, 'Buruh Industri', 2, 7),
(71, 'Buruh Bangunan', 2, 7),
(72, 'Pedagang', 2, 7),
(73, 'Pengangkutan', 2, 7),
(74, 'Pegawai Negeri + ABRI', 2, 7),
(75, 'Pensiunan', 2, 7),
(76, 'Lain-Lain (Jasa)', 2, 7),
(77, 'JUMLAH', 1, 8),
(78, 'Islam', 2, 8),
(79, 'Kristen Protestan', 2, 8),
(80, 'Kristen Katholik', 2, 8),
(81, 'Budha', 2, 8),
(82, 'Hindu', 2, 8),
(83, 'Lainnya', 2, 8),
(84, 'JUMLAH', 1, 9),
(85, 'Nikah', 2, 9),
(86, 'Talak/Cerai', 2, 9),
(87, 'Rujuk', 2, 9),
(88, 'JUMLAH', 1, 10),
(89, 'DIPOTONG', 1, 10),
(90, 'Sapi Perah', 2, 10),
(91, 'Sapi Biasa', 2, 10),
(92, 'Kerbau', 2, 10),
(93, 'Kambing', 2, 10),
(94, 'Domba', 2, 10),
(95, 'Kuda', 2, 10),
(96, 'Babi', 2, 10),
(97, 'Ayam Kampung', 2, 10),
(98, 'Ayam Ras', 2, 10),
(99, 'Itik', 2, 10),
(100, 'Itik Manila', 2, 10),
(101, 'Angsa', 2, 10),
(102, 'Lain-Lain', 2, 10),
(103, 'DEWASA L', 1, 11),
(104, 'DEWASA P', 1, 11),
(105, 'ANAK-ANAK L', 1, 11),
(106, 'ANAK-ANAK P', 1, 11),
(107, 'Cina RRC', 2, 11),
(108, 'Cina Taiwan', 2, 11),
(109, 'Cina Stateles', 2, 11),
(110, 'Arab', 2, 11),
(111, 'Belanda', 2, 11),
(112, 'India', 2, 11),
(113, 'Jepang', 2, 11),
(114, 'Pakistan', 2, 11),
(115, 'Lain-Lain', 2, 11),
(116, 'DEWASA L', 1, 12),
(117, 'DEWASA P', 1, 12),
(118, 'ANAK-ANAK L', 1, 12),
(119, 'ANAK-ANAK P', 1, 12),
(120, 'Cina RRC', 2, 12),
(121, 'Cina Taiwan', 2, 12),
(122, 'Cina Stateles', 2, 12),
(123, 'Arab', 2, 12),
(124, 'Belanda', 2, 12),
(125, 'India', 2, 12),
(126, 'Jepang', 2, 12),
(127, 'Pakistan', 2, 12),
(128, 'Lain-Lain', 2, 12),
(129, 'JUMLAH', 1, 13),
(130, 'Radio', 2, 13),
(131, 'Televisi', 2, 13),
(132, 'Sepeda', 2, 13),
(133, 'Songkro', 2, 13),
(134, 'Dokar', 2, 13),
(135, 'Gerobag', 2, 13),
(136, 'Becak', 2, 13),
(137, 'Sepeda Motor', 2, 13),
(138, 'Mobil Dinas', 2, 13),
(139, 'Mobil Pribadi', 2, 13),
(140, 'Taxi', 2, 13),
(141, 'Bus', 2, 13),
(142, 'Colt', 2, 13),
(143, 'Angkota', 2, 13),
(144, 'Telepon', 2, 13),
(145, 'Pemancar RRI', 2, 13),
(146, 'Pemancar Non RRI', 2, 13),
(147, 'Bus Kota', 2, 13),
(148, 'Truk', 2, 13);

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
(1, '3.1.06 3.1.06.05 00000 5 1 1 01 01', 'Gaji Pokok PNS/Uang Representasi', 0),
(2, '3.1.06 3.1.06.05 00000 5 1 1 01 02', 'Tunjangan Keluarga', 0),
(3, '3.1.06 3.1.06.05 24 001 5 2 2 11 06', 'Belanja Makanan dan Minuman Peserta Kegiatan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_anggaran`
--

CREATE TABLE `realisasi_anggaran` (
  `id_realisasi` int(11) NOT NULL,
  `id_anggaran_kelurahan` int(11) NOT NULL,
  `periode` varchar(8) DEFAULT NULL COMMENT '2018-12',
  `jenis_spj` tinyint(1) NOT NULL COMMENT '1=LS Gaji; 2=LS Barang - Jasa; 3=UP / GU / TU',
  `tgl_realisasi` date NOT NULL,
  `nominal_realisasi` varchar(15) NOT NULL DEFAULT '0',
  `jenis_pajak` tinyint(1) NOT NULL COMMENT '1=PPN; 2=PPh4; 3=PPh21; 4=PPh22; 5=PPh23',
  `nominal_pajak` varchar(15) NOT NULL DEFAULT '0',
  `nominal_ppn` varchar(11) NOT NULL DEFAULT '0',
  `nominal_pph4` varchar(11) NOT NULL DEFAULT '0',
  `nominal_pph21` varchar(11) NOT NULL DEFAULT '0',
  `nominal_pph22` varchar(11) NOT NULL DEFAULT '0',
  `nominal_pph23` varchar(11) NOT NULL DEFAULT '0',
  `nominal_sp2d` varchar(15) NOT NULL DEFAULT '0',
  `nominal_lain` varchar(15) NOT NULL DEFAULT '0',
  `verified` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=yes; 2=no',
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi_anggaran`
--

INSERT INTO `realisasi_anggaran` (`id_realisasi`, `id_anggaran_kelurahan`, `periode`, `jenis_spj`, `tgl_realisasi`, `nominal_realisasi`, `jenis_pajak`, `nominal_pajak`, `nominal_ppn`, `nominal_pph4`, `nominal_pph21`, `nominal_pph22`, `nominal_pph23`, `nominal_sp2d`, `nominal_lain`, `verified`, `tgl_input`) VALUES
(1, 11, NULL, 1, '2018-11-05', '12000000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:24:51'),
(2, 19, NULL, 3, '2018-11-06', '100000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:24:51'),
(3, 4, NULL, 1, '2018-11-07', '12000000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:24:51'),
(4, 12, NULL, 3, '2018-11-08', '100000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:24:51'),
(5, 7, NULL, 1, '2018-10-07', '12000000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:05:21'),
(6, 15, NULL, 3, '2018-10-08', '100000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:05:21'),
(9, 19, NULL, 3, '2018-11-18', '200000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:24:51'),
(10, 27, NULL, 2, '2018-11-06', '5000000', 0, '0', '0', '0', '0', '0', '0', '0', '0', 1, '2018-11-13 03:24:51'),
(11, 27, NULL, 2, '2018-11-06', '4000000.00', 0, '0', '400000.00', '0.00', '0.00', '0.00', '0.00', '0', '0', 1, '2018-11-13 03:24:51');

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
  MODIFY `id_anggaran_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `camat`
--
ALTER TABLE `camat`
  MODIFY `id_camat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_anggaran`
--
ALTER TABLE `data_anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id_pengisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_pengisian`
--
ALTER TABLE `data_pengisian`
  MODIFY `id_pengisian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `data_variabel`
--
ALTER TABLE `data_variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
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
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `realisasi_anggaran`
--
ALTER TABLE `realisasi_anggaran`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
