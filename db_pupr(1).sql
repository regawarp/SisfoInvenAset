-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jun 2019 pada 09.46
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pupr`
--
CREATE DATABASE IF NOT EXISTS `db_pupr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_pupr`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

DROP TABLE IF EXISTS `aset`;
CREATE TABLE `aset` (
  `ID_ASET` char(10) NOT NULL,
  `NAMA_ASET` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`ID_ASET`, `NAMA_ASET`) VALUES
('AS01', 'Irigasi'),
('AS02', 'DAS'),
('AS03', 'Drainase'),
('AS04', 'Danau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bi`
--

DROP TABLE IF EXISTS `bi`;
CREATE TABLE `bi` (
  `ID_BI` char(10) NOT NULL,
  `NOMOR_KODE_BARANG` char(25) DEFAULT NULL,
  `NOMOR_REGISTER` char(25) DEFAULT NULL,
  `NAMA_BARANG` varchar(255) DEFAULT NULL,
  `MERK_TIPE_BARANG` varchar(50) DEFAULT NULL,
  `NOMOR_KETERANGAN_BARANG` varchar(255) DEFAULT NULL,
  `BAHAN` varchar(50) DEFAULT NULL,
  `ASAL_USUL` varchar(30) DEFAULT NULL,
  `TAHUN_PEROLEHAN` date DEFAULT NULL,
  `KONSTRUKSI` varchar(30) DEFAULT NULL,
  `KONDISI` varchar(5) DEFAULT NULL,
  `JUMLAH_BARANG` float DEFAULT NULL,
  `JUMLAH_HARGA` bigint(20) DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dak`
--

DROP TABLE IF EXISTS `dak`;
CREATE TABLE `dak` (
  `ID_DAK` char(10) NOT NULL,
  `ID_LOKASI` char(10) DEFAULT NULL,
  `NAMA_DAK` varchar(50) DEFAULT NULL,
  `LUAS` float DEFAULT NULL,
  `PANJANG` float DEFAULT NULL,
  `LEBAR` float DEFAULT NULL,
  `PANJANG_BAIK_M` float DEFAULT NULL,
  `PANJANG_BAIK_PERS` float DEFAULT NULL,
  `PANJANG_SEDANG_M` float DEFAULT NULL,
  `PANJANG_SEDANG_PERS` float DEFAULT NULL,
  `PANJANG_RUSAKRINGAN_M` float DEFAULT NULL,
  `PANJANG_RUSAKRINGAN_PERS` float DEFAULT NULL,
  `PANJANG_RUSAKBERAT_M` float DEFAULT NULL,
  `PANJANG_RUSAKBERAT_PERS` float DEFAULT NULL,
  `RENCANA_PENANGANAN` varchar(50) DEFAULT NULL,
  `KEBUTUHAN_ANGGARAN` float(8,2) DEFAULT NULL,
  `KEMAMPUAN_RUPIAH` float DEFAULT NULL,
  `KEMAMPUAN_M` float DEFAULT NULL,
  `USULAN_TAMBAHAN_RUPIAH` float DEFAULT NULL,
  `USULAN_TAMBAHAN_M` float DEFAULT NULL,
  `USULAN_TAMBAHAN_SUMBER_DANA` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dak`
--

INSERT INTO `dak` (`ID_DAK`, `ID_LOKASI`, `NAMA_DAK`, `LUAS`, `PANJANG`, `LEBAR`, `PANJANG_BAIK_M`, `PANJANG_BAIK_PERS`, `PANJANG_SEDANG_M`, `PANJANG_SEDANG_PERS`, `PANJANG_RUSAKRINGAN_M`, `PANJANG_RUSAKRINGAN_PERS`, `PANJANG_RUSAKBERAT_M`, `PANJANG_RUSAKBERAT_PERS`, `RENCANA_PENANGANAN`, `KEBUTUHAN_ANGGARAN`, `KEMAMPUAN_RUPIAH`, `KEMAMPUAN_M`, `USULAN_TAMBAHAN_RUPIAH`, `USULAN_TAMBAHAN_M`, `USULAN_TAMBAHAN_SUMBER_DANA`) VALUES
('501', '52046', 'Irigasi Cipeujeuh', 437, 7190, 4, 3055.75, 42.5, 1676.71, 23.32, 1833.45, 25.5, 624.092, 8.68, 'Rehabilitasi/Peningkatan', 3.08, 0, 0, 3.08163, 2457.54, 'APBN'),
('502', '52047', 'Irigasi Cimaragas', 809, 10500, 5, 4777.5, 45.5, 2073.75, 19.75, 2625, 25, 1023.75, 9.75, 'Rehabilitasi/Peningkatan', 4.67, 0, 0, 4.6725, 3648.75, 'APBN'),
('503', '52048', 'Irigasi Cisangkan', 118, 3000, 3, 1239.9, 41.33, 674.7, 22.49, 613.5, 20.45, 471.9, 15.73, 'Rehabilitasi/Peningkatan', 1.56, 0, 0, 1.5573, 1085.4, 'APBN'),
('504', '52049', 'Irigasi Badama', 556, 7505, 5, 3044.03, 40.56, 1925.78, 25.66, 1407.19, 18.75, 1128, 15.03, 'Rehabilitasi/Peningkatan', 3.66, 0.5, 346.036, 3.16319, 2189.15, 'APBN'),
('505', '52050', 'Irigasi Cikamiri II', 354, 2500, 2.5, 1001.25, 40.05, 594.25, 23.77, 495, 19.8, 409.5, 16.38, 'Rehabilitasi/Peningkatan', 1.31, 0, 0, 1.314, 904.5, 'APBN'),
('506', '52007', 'Irigasi Cibuyutan', 322, 2680, 2.5, 1056.19, 39.41, 654.188, 24.41, 481.06, 17.95, 488.564, 18.23, 'Rehabilitasi/Peningkatan', 1.46, 0, 0, 1.45819, 969.624, 'APBN'),
('507', '52007', 'Irigasi Ciojar', 303, 4300, 5, 1522.63, 35.41, 1221.63, 28.41, 793.35, 18.45, 762.39, 17.73, 'Rehabilitasi/Peningkatan', 2.32, 0, 0, 2.31813, 1555.74, 'APBN'),
('508', '52050', 'Irigasi Parigi', 408, 2680, 3, 1129.35, 42.14, 581.024, 21.68, 481.06, 17.95, 488.564, 18.23, 'Rehabilitasi/Peningkatan', 1.46, 0, 0, 1.45819, 969.624, 'APBN'),
('509', '52050', 'Irigasi Beulahnangka', 459, 4000, 3, 1624.4, 40.61, 928.4, 23.21, 805.6, 20.14, 641.6, 16.04, 'Rehabilitasi/Peningkatan', 2.09, 0.5, 346.419, 1.5888, 1100.78, 'APBN'),
('510', '52050', 'Irigasi Ciroyom', 762, 3400, 3.5, 1339.94, 39.41, 829.94, 24.41, 637.16, 18.74, 592.96, 17.44, 'Rehabilitasi/Peningkatan', 1.82, 0, 0, 1.82308, 1230.12, 'APBN'),
('511', '52051', 'Irigasi Cikamiri', 765, 4077, 3, 1723.35, 42.27, 878.594, 21.55, 691.052, 16.95, 784.007, 19.23, 'Rehabilitasi/Peningkatan', 2.26, 0, 0, 2.25907, 1475.06, 'APBN'),
('512', '52052', 'Irigasi Cibuyutan Utara', 463, 7000, 4.5, 2808.4, 40.12, 1659, 23.7, 1232.7, 17.61, 1299.9, 18.57, 'Rehabilitasi/Peningkatan', 3.83, 0, 0, 3.8325, 2532.6, 'APBN'),
('513', '52015', 'Irigasi Citikey', 375, 7800, 4, 3021.72, 38.74, 1956.24, 25.08, 1652.04, 21.18, 1170, 15, 'Rehabilitasi/Peningkatan', 3.99, 0.5, 353.458, 3.49204, 2468.58, 'APBN'),
('514', '52052', 'Irigasi Cicapar', 277, 2400, 3, 947.28, 39.47, 584.4, 24.35, 482.4, 20.1, 385.92, 16.08, 'Rehabilitasi/Peningkatan', 1.25, 0, 0, 1.25424, 868.32, 'APBN'),
('515', '52053', 'Irigasi Cipancar', 520, 10810, 3.5, 4307.79, 39.85, 3101.39, 28.69, 2124.17, 19.65, 1276.66, 11.81, 'Rehabilitasi/Peningkatan', 4.68, 0, 0, 4.67749, 3400.83, 'APBN'),
('516', '52053', 'Irigasi Cimarijawa', 437, 2500, 3, 928.75, 37.15, 666.75, 26.67, 456.75, 18.27, 447.75, 17.91, 'Rehabilitasi/Peningkatan', 1.35, 0.5, 334.443, 0.85225, 570.057, 'APBN'),
('517', '52053', 'Irigasi Cisalak', 61, 4000, 2.5, 1592.4, 39.81, 960.4, 24.01, 750.4, 18.76, 696.8, 17.42, 'Rehabilitasi/Peningkatan', 2.14, 0, 0, 2.144, 1447.2, 'APBN'),
('518', '52054', 'Irigasi Citameng I', 507, 7600, 3, 2843.16, 37.41, 2007.16, 26.41, 1470.6, 19.35, 1279.08, 16.83, 'Rehabilitasi/Peningkatan', 4.03, 0.5, 341.256, 3.52876, 2408.42, 'APBN'),
('519', '52055', 'Irigasi Citameng II', 341, 5250, 3, 2166.68, 41.27, 1183.88, 22.55, 919.8, 17.52, 979.65, 18.66, 'Rehabilitasi/Peningkatan', 2.88, 0, 0, 2.8791, 1899.45, 'APBN'),
('520', '52055', 'Irigasi Citameng III', 151, 4942, 3, 1996.57, 40.4, 1157.42, 23.42, 910.316, 18.42, 877.699, 17.76, 'Rehabilitasi/Peningkatan', 2.67, 0, 0, 2.66571, 1788.02, 'APBN'),
('521', '52055', 'Irigasi Citameng IV', 484, 8056, 3, 2957.36, 36.71, 2183.98, 27.11, 1619.26, 20.1, 1295.4, 16.08, 'Rehabilitasi/Peningkatan', 4.21, 0, 0, 4.21007, 2914.66, 'APBN'),
('522', '52056', 'Irigasi Cipacing', 270, 3040, 3, 1138.78, 37.46, 972.192, 31.98, 555.712, 18.28, 373.312, 12.28, 'Rehabilitasi/Peningkatan', 1.30, 0, 0, 1.30234, 929.024, 'APBN'),
('523', '52057', 'Irigasi Cianten', 586, 5348, 3, 1898.01, 35.49, 1657.88, 31, 1036.44, 19.38, 755.672, 14.13, 'Rehabilitasi/Peningkatan', 2.55, 0, 0, 2.54779, 1792.11, 'APBN'),
('524', '52057', 'Irigasi Cibedug', 517, 5132, 3, 1889.09, 36.81, 1386.15, 27.01, 1089.01, 21.22, 767.747, 14.96, 'Rehabilitasi/Peningkatan', 2.62, 0, 0, 2.6245, 1856.76, 'APBN'),
('525', '52057', 'Irigasi Leuwibolang', 154, 7000, 2.5, 2503.2, 35.76, 1964.2, 28.06, 1384.6, 19.78, 1148, 16.4, 'Rehabilitasi/Peningkatan', 3.68, 0, 0, 3.6806, 2532.6, 'APBN'),
('526', '52058', 'Irigasi Baranangsiang', 882, 17000, 5, 6726.9, 39.57, 4122.5, 24.25, 3466.3, 20.39, 2684.3, 15.79, 'Rehabilitasi/Peningkatan', 8.83, 0.5, 348.085, 8.3349, 5802.51, 'APBN'),
('527', '52058', 'Irigasi Cadasgantung', 321, 5593, 5, 2107.44, 37.68, 1462.01, 26.14, 1165.58, 20.84, 857.966, 15.34, 'Rehabilitasi/Peningkatan', 2.88, 0, 0, 2.88151, 2023.55, 'APBN'),
('528', '52059', 'Irigasi Cimanuk', 874, 16850, 5, 7196.63, 42.71, 4128.25, 24.5, 3814.84, 22.64, 1710.28, 10.15, 'Rehabilitasi/Peningkatan', 7.24, 0.5, 381.812, 6.73539, 5143.3, 'APBN'),
('529', '52058', 'Irigasi Cikuray', 75, 7000, 3, 2843.4, 40.62, 1624, 23.2, 1522.5, 21.75, 1010.1, 14.43, 'Rehabilitasi/Peningkatan', 3.54, 0, 0, 3.5427, 2532.6, 'APBN'),
('530', '52060', 'Irigasi Simpangsari', 236, 2500, 2, 992.75, 39.71, 602.75, 24.11, 508.5, 20.34, 396, 15.84, 'Rehabilitasi/Peningkatan', 1.30, 0, 0, 1.3005, 904.5, 'APBN'),
('531', '52061', 'Irigasi Sindujaya', 560, 16655, 3, 5935.84, 35.64, 4693.38, 28.18, 3827.32, 22.98, 2198.46, 13.2, 'Rehabilitasi/Peningkatan', 8.22, 0.5, 366.343, 7.72424, 5659.44, 'APBN'),
('532', '52062', 'Irigasi Leuwibitung', 327, 7256, 2.5, 2723.9, 37.54, 1906.88, 26.28, 1538.27, 21.2, 1086.95, 14.98, 'Rehabilitasi/Peningkatan', 3.71, 0, 0, 3.71217, 2625.22, 'APBN'),
('533', '52063', 'Irigasi Ciawi', 344, 2000, 2.5, 753.6, 37.68, 522.8, 26.14, 462.8, 23.14, 260.8, 13.04, 'Rehabilitasi/Peningkatan', 0.98, 0.5, 367.534, 0.4844, 356.066, 'APBN'),
('534', '52064', 'Irigasi Curug Ngebul', 136, 3000, 2.5, 1108.5, 36.95, 806.1, 26.87, 635.7, 21.19, 449.7, 14.99, 'Rehabilitasi/Peningkatan', 1.54, 0, 0, 1.5351, 1085.4, 'APBN'),
('535', '52065', 'Irigasi Cirompang', 847, 12874, 2.5, 4965.5, 38.57, 3250.69, 25.25, 2639.17, 20.5, 2018.64, 15.68, 'Rehabilitasi/Peningkatan', 6.68, 0.5, 348.824, 6.17646, 4308.99, 'APBN'),
('536', '52065', 'Irigasi Cipandan', 250, 2500, 2, 938.5, 37.54, 657, 26.28, 516.75, 20.67, 387.75, 15.51, 'Rehabilitasi/Peningkatan', 1.29, 0, 0, 1.29225, 904.5, 'APBN'),
('537', '52066', 'Irigasi Cijayana', 286, 4000, 2, 1430, 35.75, 1122.8, 28.07, 774.8, 19.37, 672.4, 16.81, 'Rehabilitasi/Peningkatan', 2.12, 0, 0, 2.1196, 1447.2, 'APBN'),
('538', '52067', 'Irigasi Cipancong', 355, 7658, 2, 1956.62, 25.55, 1169.38, 15.27, 1483.35, 19.37, 3048.65, 39.81, 'Rehabilitasi/Peningkatan', 7.58, 0, 0, 7.58065, 4532, 'APBN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataspa`
--

DROP TABLE IF EXISTS `dataspa`;
CREATE TABLE `dataspa` (
  `ID_DATASPA` char(10) NOT NULL,
  `NAMA_DATASPA` varchar(50) DEFAULT NULL,
  `LINK_GIS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dataspa`
--

INSERT INTO `dataspa` (`ID_DATASPA`, `NAMA_DATASPA`, `LINK_GIS`) VALUES
('60', 'Garut', 'www.arcgis.com/apps/Embed/index.html?webmap=ef284696a7a8437e8aac540dd4e680e3&extent=107.54,-7.4457,107.5849,-7.4224&home=true&zoom=true&previewImage=false&scale=true&search=true&searchextent=true&details=true&legendlayers=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=light'),
('61', 'Testing', 'www.arcgis.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ded`
--

DROP TABLE IF EXISTS `ded`;
CREATE TABLE `ded` (
  `ID_DED` char(10) NOT NULL,
  `PATH_FILE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ded`
--

INSERT INTO `ded` (`ID_DED`, `PATH_FILE`) VALUES
('', ''),
('1', 'Revisi KIB A.xls'),
('17001', 'C:xampphtdocsSisfoInvenAsetfile170519_DED.xlsx'),
('3', 'TAMPILAN HOME web.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dedlokasi`
--

DROP TABLE IF EXISTS `dedlokasi`;
CREATE TABLE `dedlokasi` (
  `ID_LOKASI` char(10) NOT NULL,
  `ID_DED` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dedlokasi`
--

INSERT INTO `dedlokasi` (`ID_LOKASI`, `ID_DED`) VALUES
('52075', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemeliharaan`
--

DROP TABLE IF EXISTS `detail_pemeliharaan`;
CREATE TABLE `detail_pemeliharaan` (
  `ID_DETAIL_PEMELIHARAAN` char(10) NOT NULL,
  `ID_PEMELIHARAAN` char(10) NOT NULL,
  `JENIS_PEMELIHARAAN` varchar(50) DEFAULT NULL,
  `BIAYA` bigint(20) DEFAULT NULL,
  `VOLUME` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pegawai`
--

DROP TABLE IF EXISTS `jenis_pegawai`;
CREATE TABLE `jenis_pegawai` (
  `ID_JENIS` char(10) NOT NULL,
  `NAMA_JENIS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pegawai`
--

INSERT INTO `jenis_pegawai` (`ID_JENIS`, `NAMA_JENIS`) VALUES
('11', 'SDA'),
('22', 'Sub. Bag. Keuangan dan Aset'),
('33', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kiba`
--

DROP TABLE IF EXISTS `kiba`;
CREATE TABLE `kiba` (
  `ID_KIBA` char(10) NOT NULL,
  `ID_LOKASI` char(10) NOT NULL,
  `ID_DATASPA` char(10) NOT NULL,
  `NAMA_BARANG` varchar(255) DEFAULT NULL,
  `NOMOR_KODE_BARANG` char(25) DEFAULT NULL,
  `NOMOR_REGISTER` char(25) DEFAULT NULL,
  `LUAS` float DEFAULT NULL,
  `TAHUN_PENGADAAN` date DEFAULT NULL,
  `HAK` varchar(25) DEFAULT NULL,
  `TANGGAL_SERTIFIKAT` date DEFAULT NULL,
  `NOMOR_SERTIFIKAT` varchar(25) DEFAULT NULL,
  `PENGGUNAAN` varchar(30) DEFAULT NULL,
  `HARGA` bigint(20) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `FILE` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `ASAL_USUL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kiba`
--

INSERT INTO `kiba` (`ID_KIBA`, `ID_LOKASI`, `ID_DATASPA`, `NAMA_BARANG`, `NOMOR_KODE_BARANG`, `NOMOR_REGISTER`, `LUAS`, `TAHUN_PENGADAAN`, `HAK`, `TANGGAL_SERTIFIKAT`, `NOMOR_SERTIFIKAT`, `PENGGUNAAN`, `HARGA`, `FOTO`, `FILE`, `KETERANGAN`, `ASAL_USUL`) VALUES
('3304', '52003', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '4', 5441, '0000-00-00', 'Pakai', '0000-00-00', '', 'Rumah tinggal', 544130000, '', '', '', 'Pembelian'),
('3305', '52015', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0005', 7333, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 513310000, '', '', '', 'Pembelian'),
('3307', '52016', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0007', 788, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 22500000, '', '', '', 'Pembelian'),
('3308', '52016', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0008', 3400, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 102000000, '', '', '', 'Pembelian'),
('3309', '52017', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0009', 900, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 27000000, '', '', '', 'Pembelian'),
('3310', '52018', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0010', 848, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 25440000, '', '', '', 'Pembelian'),
('3311', '52018', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0011', 1200, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 36000000, '', '', '', 'Pembelian'),
('3312', '52019', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0012', 1112, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 33360000, '', '', '', 'Pembelian'),
('3313', '52020', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0013', 500, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 15000000, '', '', '', 'Pembelian'),
('3314', '52021', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0014', 348, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 10440000, '', '', '', 'Pembelian'),
('3315', '52022', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0015', 1116, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 33480000, '', '', '', 'Pembelian'),
('3316', '52023', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0016', 452, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 13560000, '', '', '', 'Pembelian'),
('3317', '52024', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0017', 800, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 24000000, '', '', '', 'Pembelian'),
('3318', '52025', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0018', 39300, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 1965000000, '', '', '', 'Pembelian'),
('3319', '52026', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0019', 5430, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 271500000, '', '', '', 'Pembelian'),
('3320', '52026', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0020', 50000, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 2500000000, '', '', '', 'Pembelian'),
('3321', '52027', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0021', 4576, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 228800000, '', '', '', 'Pembelian'),
('3322', '52028', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0022', 5158, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 257900000, '', '', '', 'Pembelian'),
('3323', '52029', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0023', 56, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 2800000, '', '', '', 'Pembelian'),
('3324', '52030', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0024', 2858, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 142900000, '', '', '', 'Pembelian'),
('3325', '52031', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0025', 61350, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 3067500000, '', '', '', 'Pembelian'),
('3326', '52032', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0026', 910, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 45500000, '', '', '', 'Pembelian'),
('3327', '52032', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0027', 50725, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 2536250000, '', '', '', 'Pembelian'),
('3328', '52033', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0028', 36, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 50000, '', '', '', 'Pembelian'),
('3329', '52034', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0029', 620, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 31000000, '', '', '', 'Pembelian'),
('3330', '52035', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '30', 15800, '0000-00-00', 'Pakai', '0000-00-00', '', 'Rumah tinggal', 790000000, '', '', '', 'Pembelian'),
('3331', '52036', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '31', 35384, '0000-00-00', 'Pakai', '0000-00-00', '', 'Rumah tinggal', 1769200000, '', '', '', 'Pembelian'),
('3332', '52031', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0032', 45833, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 2291650000, '', '', '', 'Pembelian'),
('3333', '52037', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0033', 6814, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 340700000, '', '', '', 'Pembelian'),
('3334', '52038', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0034', 78, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 3900000, '', '', '', 'Pembelian'),
('3335', '52036', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '35', 46980, '0000-00-00', 'Pakai', '0000-00-00', '', 'Rumah tinggal', 2349000000, '', '', '', 'Pembelian'),
('3336', '52039', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0036', 71440, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 3572000000, '', '', '', 'Pembelian'),
('3337', '52040', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0037', 31890, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 1594500000, '', '', '', 'Pembelian'),
('3338', '52040', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0038', 24720, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 1236000000, '', '', '', 'Pembelian'),
('3339', '52041', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0039', 5567, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 278350000, '', '', '', 'Pembelian'),
('3340', '52042', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0040', 1400, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 70000000, '', '', '', 'Pembelian'),
('3341', '52043', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0041', 1260, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 63000000, '', '', '', 'Pembelian'),
('3342', '52025', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0042', 19120, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 956000000, '', '', '', 'Pembelian'),
('3343', '52044', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0043', 89875, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 4493750000, '', '', '', 'Pembelian'),
('3344', '52045', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0044', 49508, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 2475400000, '', '', '', 'Pembelian'),
('3345', '52045', '60', 'Tanah untuk Bangunan Irigasi', '01.01.13.08.001', '0045', 4172, '0000-00-00', 'Pakai', NULL, '', 'Rumah tinggal', 208600000, '', '', '', 'Pembelian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kibd`
--

DROP TABLE IF EXISTS `kibd`;
CREATE TABLE `kibd` (
  `ID_KIBD` char(10) NOT NULL,
  `ID_LOKASI` char(10) NOT NULL,
  `ID_DATASPA` char(10) NOT NULL,
  `ID_ASET` char(10) NOT NULL,
  `NAMA_BARANG` varchar(255) DEFAULT NULL,
  `NOMOR_KODE_BARANG` char(25) DEFAULT NULL,
  `NOMOR_REGISTER` char(25) DEFAULT NULL,
  `KONSTRUKSI` varchar(30) DEFAULT NULL,
  `PANJANG` float DEFAULT NULL,
  `LEBAR` float DEFAULT NULL,
  `LUAS` float DEFAULT NULL,
  `TANGGAL_DOKUMEN` date DEFAULT NULL,
  `NOMOR_DOKUMEN` varchar(50) DEFAULT NULL,
  `STATUS_TANAH` varchar(15) DEFAULT NULL,
  `NOMOR_KODE` varchar(15) DEFAULT NULL,
  `ASAL_USUL` varchar(30) DEFAULT NULL,
  `HARGA` bigint(20) DEFAULT NULL,
  `KONDISI` varchar(5) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `FILE` varchar(255) DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kibd`
--

INSERT INTO `kibd` (`ID_KIBD`, `ID_LOKASI`, `ID_DATASPA`, `ID_ASET`, `NAMA_BARANG`, `NOMOR_KODE_BARANG`, `NOMOR_REGISTER`, `KONSTRUKSI`, `PANJANG`, `LEBAR`, `LUAS`, `TANGGAL_DOKUMEN`, `NOMOR_DOKUMEN`, `STATUS_TANAH`, `NOMOR_KODE`, `ASAL_USUL`, `HARGA`, `KONDISI`, `FOTO`, `FILE`, `KETERANGAN`) VALUES
('4001', '52046', '60', 'AS01', 'Irigasi Cipeujeuh', '04.03.01.01.01', '0001', 'Permanen', 7190, 4, 437, NULL, '-', 'Pemda', '-', 'APBD', 69417000, 'KB', '', '', ''),
('4002', '52047', '60', 'AS01', 'Irigasi Cimaragas', '04.03.01.01.01', '0002', 'Permanen', 10500, 5, 809, NULL, '-', 'Pemda', '-', 'APBD', 1180410000, 'KB', '', '', ''),
('4003', '52068', '60', 'AS01', 'Irigasi Cisangkan', '04.03.01.01.01', '0003', 'Permanen', 3000, 3, 118, NULL, '-', 'Pemda', '-', 'APBD', 30758000, 'KB', '', '', ''),
('4004', '52049', '60', 'AS01', 'Irigasi Badama', '04.03.01.01.01', '0004', 'Permanen', 7505, 5, 556, NULL, '-', 'Pemda', '-', 'APBD', 496607000, 'B', '', '', ''),
('4005', '52049', '60', 'AS01', 'Irigasi Cikamiri II', '04.03.01.01.01', '0005', 'Permanen', 2500, 2.5, 354, NULL, '-', 'Pemda', '-', 'APBD', 474777000, 'B', '', '', ''),
('4006', '52007', '60', 'AS01', 'Irigasi Cibuyutan Selatan', '04.03.01.01.01', '0006', 'Permanen', 2680, 2.5, 322, NULL, '-', 'Pemda', '-', 'APBD', 347893000, 'B', '', '', ''),
('4007', '52047', '60', 'AS01', 'Irigasi Ciojar', '04.03.01.01.01', '0007', 'Permanen', 4300, 5, 303, NULL, '-', 'Pemda', '-', 'APBD', 404744000, 'B', '', '', ''),
('4008', '52007', '60', 'AS01', 'Irigasi Parigi', '04.03.01.01.01', '0008', 'Permanen', 2680, 3, 408, NULL, '-', 'Pemda', '-', 'APBD', 10160000, 'KB', '', '', ''),
('4009', '52050', '60', 'AS01', 'Irigasi Beulahnangka', '04.03.01.01.01', '0009', 'Permanen', 4000, 3, 459, NULL, '-', 'Pemda', '-', 'APBD', 614612000, 'B', '', '', ''),
('4010', '52050', '60', 'AS01', 'Irigasi Ciroyom', '04.03.01.01.01', '0010', 'Permanen', 3400, 3.5, 762, NULL, '-', 'Pemda', '-', 'APBD', 272079000, 'KB', '', '', ''),
('4011', '52051', '60', 'AS01', 'Irigasi Cikamiri', '04.03.01.01.01', '0011', 'Permanen', 4077, 3, 765, NULL, '-', 'Pemda', '-', 'APBD', 156084000, 'KB', '', '', ''),
('4012', '52015', '60', 'AS01', 'Irigasi Cibuyutan Utara', '04.03.01.01.01', '0012', 'Permanen', 7000, 4.5, 463, NULL, '-', 'Pemda', '-', 'APBD', 18412000, 'KB', '', '', ''),
('4013', '52069', '60', 'AS01', 'Irigasi Citikey', '04.03.01.01.01', '0013', 'Permanen', 7800, 4, 375, NULL, '-', 'Pemda', '-', 'APBD', 1445000, 'KB', '', '', ''),
('4014', '52052', '60', 'AS01', 'Irigasi Cicapar', '04.03.01.01.01', '0014', 'Permanen', 2400, 3, 277, NULL, '-', 'Pemda', '-', 'APBD', 24494450, 'KB', '', '', ''),
('4015', '52053', '60', 'AS01', 'Irigasi Cipancar', '04.03.01.01.01', '0015', 'Permanen', 10810, 3.5, 520, NULL, '-', 'Pemda', '-', 'APBD', 69651000, 'KB', '', '', ''),
('4016', '52015', '60', 'AS01', 'Irigasi Cimarijawa', '04.03.01.01.01', '0016', 'Permanen', 2500, 3, 437, NULL, '-', 'Pemda', '-', 'APBD', 141773000, 'KB', '', '', ''),
('4017', '52053', '60', 'AS01', 'Irigasi Cisalak', '04.03.01.01.01', '0017', 'Permanen', 4000, 2.5, 61, NULL, '-', 'Pemda', '-', 'APBD', 255446000, 'B', '', '', ''),
('4018', '52054', '60', 'AS01', 'Irigasi Citameng I', '04.03.01.01.01', '0018', 'Permanen', 7600, 3, 507, NULL, '-', 'Pemda', '-', 'APBD', 142645000, 'KB', '', '', ''),
('4019', '52055', '60', 'AS01', 'Irigasi Citameng II', '04.03.01.01.01', '0019', 'Permanen', 5250, 3, 341, NULL, '-', 'Pemda', '-', 'APBD', 22801000, 'KB', '', '', ''),
('4020', '52055', '60', 'AS01', 'Irigasi Citameng III', '04.03.01.01.01', '0020', 'Permanen', 4942, 3, 151, NULL, '-', 'Pemda', '-', 'APBD', 29305000, 'KB', '', '', ''),
('4021', '52055', '60', 'AS01', 'Irigasi Citameng IV', '04.03.01.01.01', '0021', 'Permanen', 8056, 3, 484, NULL, '-', 'Pemda', '-', 'APBD', 7313000, 'KB', '', '', ''),
('4022', '52056', '60', 'AS01', 'Irigasi Cipacing', '04.03.01.01.01', '0022', 'Permanen', 3040, 3, 270, NULL, '-', 'Pemda', '-', 'APBD', 154532000, 'KB', '', '', ''),
('4023', '52071', '60', 'AS01', 'Irigasi Cianten', '04.03.01.01.01', '0023', 'Permanen', 5348, 3, 586, NULL, '-', 'Pemda', '-', 'APBD', 23624000, 'KB', '', '', ''),
('4024', '52057', '60', 'AS01', 'Irigasi Cibedug', '04.03.01.01.01', '0024', 'Permanen', 5132, 3, 517, NULL, '-', 'Pemda', '-', 'APBD', 274804000, 'KB', '', '', ''),
('4025', '52057', '60', 'AS01', 'Irigasi Leuwibolang', '04.03.01.01.01', '0025', 'Permanen', 7000, 2.5, 154, NULL, '-', 'Pemda', '-', 'APBD', 245331000, 'KB', '', '', ''),
('4026', '52058', '60', 'AS01', 'Irigasi Baranangsiang', '04.03.01.01.01', '0026', 'Permanen', 17000, 5, 882, NULL, '-', 'Pemda', '-', 'APBD', 160570000, 'KB', '', '', ''),
('4027', '52059', '60', 'AS01', 'Irigasi Cadasgantung', '04.03.01.01.01', '0027', 'Permanen', 5593, 5, 321, NULL, '-', 'Pemda', '-', 'APBD', 684952000, 'B', '', '', ''),
('4028', '52059', '60', 'AS01', 'Irigasi Cimanuk', '04.03.01.01.01', '0028', 'Permanen', 16850, 5, 874, NULL, '-', 'Pemda', '-', 'APBD', 1069645000, 'KB', '', '', ''),
('4029', '52058', '60', 'AS01', 'Irigasi Cikuray', '04.03.01.01.01', '0029', 'Permanen', 7000, 3, 75, NULL, '-', 'Pemda', '-', 'APBD', 239626000, 'KB', '', '', ''),
('4030', '52060', '60', 'AS01', 'Irigasi Simpangsari', '04.03.01.01.01', '0030', 'Permanen', 2500, 2, 236, NULL, '-', 'Pemda', '-', 'APBD', 138501000, 'KB', '', '', ''),
('4031', '52061', '60', 'AS01', 'Irigasi Sindujaya', '04.03.01.01.01', '0031', 'Permanen', 16655, 3, 560, NULL, '-', 'Pemda', '-', 'APBD', 148457450, 'KB', '', '', ''),
('4032', '52062', '60', 'AS01', 'Irigasi Leuwibitung', '04.03.01.01.01', '0032', 'Permanen', 7256, 2.5, 327, NULL, '-', 'Pemda', '-', 'APBD', 344471000, 'B', '', '', ''),
('4033', '52072', '60', 'AS01', 'Irigasi Ciawi', '04.03.01.01.01', '0033', 'Permanen', 2000, 2.5, 344, NULL, '-', 'Pemda', '-', 'APBD', 369319000, 'KB', '', '', ''),
('4034', '52064', '60', 'AS01', 'Irigasi Curug Ngebul', '04.03.01.01.01', '0034', 'Permanen', 3000, 2.5, 136, NULL, '-', 'Pemda', '-', 'APBD', 241573000, 'KB', '', '', ''),
('4035', '52065', '60', 'AS01', 'Irigasi Cirompang', '04.03.01.01.01', '0035', 'Permanen', 12874, 2.5, 847, NULL, '-', 'Pemda', '-', 'APBD', 180066200, 'KB', '', '', ''),
('4036', '52065', '60', 'AS01', 'Irigasi Cipandan', '04.03.01.01.01', '0036', 'Permanen', 2500, 2, 250, NULL, '-', 'Pemda', '-', 'APBD', 65945400, 'KB', '', '', ''),
('4037', '52066', '60', 'AS01', 'Irigasi Cijayana', '04.03.01.01.01', '0037', 'Permanen', 4000, 2, 286, NULL, '-', 'Pemda', '-', 'APBD', 132668666, 'KB', '', '', ''),
('4038', '52067', '60', 'AS01', 'Irigasi Cipancong', '04.03.01.01.01', '0038', 'Permanen', 7658, 2, 355, NULL, '-', 'Pemda', '-', 'APBD', 712066000, 'B', '', '', ''),
('4039', '52001', '60', 'AS04', 'Cibuyut', '04.03.05.01.01', '0001', 'Permanen', 0, 0, 2, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4040', '52002', '60', 'AS04', 'Bagendit', '04.03.05.01.01', '0002', 'Permanen', 0, 0, 84.2, NULL, '-', 'Pemda', '-', 'APBD', 0, 'RB', '', '', ''),
('4041', '52003', '60', 'AS04', 'Cangkuang', '04.03.05.01.01', '0003', 'Permanen', 0, 0, 20.5, NULL, '-', 'Pemda', '-', 'APBD', 0, 'RB', '', '', ''),
('4042', '52004', '60', 'AS04', 'Cijaruji', '04.03.05.01.01', '0004', 'Permanen', 0, 0, 0.75, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4043', '52005', '60', 'AS04', 'Sukarame', '04.03.05.01.01', '0005', 'Permanen', 0, 0, 5, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'RB', '', '', ''),
('4044', '52006', '60', 'AS04', 'Cibitung', '04.03.05.01.01', '0006', 'Permanen', 0, 0, 3, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4045', '52007', '60', 'AS04', 'Rancakukuk', '04.03.05.01.01', '0007', 'Permanen', 0, 0, 50, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4046', '52008', '60', 'AS04', 'Calingcing', '04.03.05.01.01', '0008', 'Permanen', 0, 0, 1.65, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4047', '52009', '60', 'AS04', 'Cirukem', '04.03.05.01.01', '0009', 'Permanen', 0, 0, 0.06, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'B', '', '', ''),
('4048', '52010', '60', 'AS04', 'Cirompang', '04.03.05.01.01', '0010', 'Permanen', 0, 0, 1.5, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4049', '52011', '60', 'AS04', 'Ciburiang', '04.03.05.01.01', '0011', 'Permanen', 0, 0, 1.5, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'RB', '', '', ''),
('4050', '52012', '60', 'AS04', 'Hamirang', '04.03.05.01.01', '0012', 'Permanen', 0, 0, 0.01, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'RB', '', '', ''),
('4051', '52013', '60', 'AS04', 'Cipanas', '04.03.05.01.01', '0013', 'Permanen', 0, 0, 1, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4052', '52014', '60', 'AS04', 'Cireang', '04.03.05.01.01', '0014', 'Permanen', 0, 0, 1.5, NULL, '-', 'Milik Desa', '-', 'APBD', 0, 'KB', '', '', ''),
('4053', '52073', '60', 'AS02', 'DAS Cimanuk ', '04.03.03.06.010', '0001', 'Permanen', 92, 0, 0, NULL, '-', 'Pemda', '-', 'BUMD', 0, 'KB', '', '', ''),
('4054', '52074', '60', 'AS02', 'DAS Cikandang', '04.03.03.06.010', '0002', 'Permanen', 37.98, 0, 0, NULL, '-', 'Pemda', '-', 'BUMD', 0, 'KB', '', '', ''),
('4055', '52061', '60', 'AS02', 'DAS Cikaengan', '04.03.03.06.010', '0003', 'Permanen', 48.3, 0, 0, NULL, '-', 'Pemda', '-', 'BUMD', 0, 'KB', '', '', ''),
('4056', '52075', '60', 'AS02', 'DAS Cilaki', '04.03.03.06.010', '0004', 'Permanen', 82, 0, 0, NULL, '-', 'Pemda', '-', 'BUMD', 0, 'KB', '', '', ''),
('4057', '52062', '60', 'AS02', 'DAS Ciwulan', '04.03.03.06.010', '0005', 'Permanen', 55, 0, 0, NULL, '-', 'Pemda', '-', 'BUMD', 0, 'KB', '', '', ''),
('4058', '52049', '60', 'AS03', 'Pengendalian Banjir Perkotaan Sistem Badama (Jl. Subyadinata - Proklamasi - Nusa Indah) Kec. Tarogong Kidul', '04.03.03.06.010', '0001', 'Permanen', 576.85, 0, 0, NULL, '-', 'Pemda', '-', 'BUMD', 1162145000, 'KB', '', '', ''),
('8', '52007', '60', 'AS01', 'Irigasiku', '1', '1', '1', 1, 2, 2, '2019-05-03', '2', '2', '2', '2', 2, '2', '2', '534px-Logo_Politeknik_Negeri_Bandung.svg.png', '534px-Logo_Politeknik_Negeri_Bandung.svg.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kibf`
--

DROP TABLE IF EXISTS `kibf`;
CREATE TABLE `kibf` (
  `ID_KIBF` char(10) NOT NULL,
  `ID_DATASPA` char(10) NOT NULL,
  `ID_LOKASI` char(10) NOT NULL,
  `ID_ASET` char(10) NOT NULL,
  `NAMA_BARANG` varchar(255) DEFAULT NULL,
  `BANGUNAN` varchar(15) DEFAULT NULL,
  `BERTINGKAT` varchar(15) DEFAULT NULL,
  `BETON` varchar(15) DEFAULT NULL,
  `PANJANG` float DEFAULT NULL,
  `TANGGAL_DOKUMEN` date DEFAULT NULL,
  `NOMOR_DOKUMEN` varchar(50) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `STATUS_TANAH` varchar(15) DEFAULT NULL,
  `NOMO_KODE_TANAH` varchar(25) DEFAULT NULL,
  `NILAI_KONTRAK` bigint(20) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `FILE` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `ASAL_USUL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kibf`
--

INSERT INTO `kibf` (`ID_KIBF`, `ID_DATASPA`, `ID_LOKASI`, `ID_ASET`, `NAMA_BARANG`, `BANGUNAN`, `BERTINGKAT`, `BETON`, `PANJANG`, `TANGGAL_DOKUMEN`, `NOMOR_DOKUMEN`, `TANGGAL_MULAI`, `STATUS_TANAH`, `NOMO_KODE_TANAH`, `NILAI_KONTRAK`, `FOTO`, `FILE`, `KETERANGAN`, `ASAL_USUL`) VALUES
('', '60', '52010', 'AS01', '2', '2', '2', '2', 2, '2019-04-30', '2', '2019-05-11', '2', '', 2, '', '', 'Selesai', '2'),
('1', '60', '52049', 'AS01', '1', '1', '1', '1', 1, '2019-05-01', '1', '2019-05-01', '1', '1', 0, '534px-Logo_Politeknik_Negeri_Bandung.svg.png', '534px-Logo_Politeknik_Negeri_Bandung.svg.png', '1', '1'),
('1701', '60', '52049', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi DI. Badama', 'Permanen', '-', 'Beton', 527.2, '0000-00-00', '602.1/009/KTR/PPK/RPJI.DAK/PUPR/III/2018', '0000-00-00', '-', '-', 492550000, '', '', '', 'APBD'),
('1702', '60', '52007', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi DI. Ciojar', 'Permanen', '-', 'Beton', 632.3, '0000-00-00', '602.1/005/KTR/PPK/RPJI.DAK/PUPR/I/2018', '0000-00-00', '-', '-', 400687000, '', '', '', 'APBD'),
('1703', '60', '52067', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi DI. Cipancong ', 'Permanen', '-', 'Beton', 291.5, '0000-00-00', '602.1/007/KTR/PPK/RPJI.DAK/PUPR/I/2018', '0000-00-00', '-', '-', 708007000, '', '', '', 'APBD'),
('1704', '60', '52049', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi DI. Cikamiri II ', 'Permanen', '-', 'Beton', 623, '0000-00-00', '602.1/001/KTR/PPK/RPJI.DAK/PUPR/I/2018', '0000-00-00', '-', '-', 470720000, '', '', '', 'APBD'),
('1705', '60', '52050', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi  DI. Beulah Nangka ', 'Permanen', '-', 'Beton', 636, '0000-00-00', '602.1/006/KTR/PPK/RPJI.DAK/PUPR/I/2018', '0000-00-00', '-', '-', 610555000, '', '', '', 'APBD'),
('1706', '60', '52058', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi DI. Cadasgantung ', 'Permanen', '-', 'Beton', 639.25, '0000-00-00', '602.1/002/KTR/PPK/RPJI.DAK/PUPR/I/2018', '0000-00-00', '-', '-', 680895000, '', '', '', 'APBD'),
('1707', '60', '52015', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi  DI. Cibuyutan Selatan ', 'Permanen', '-', 'Beton', 292, '0000-00-00', '602.1/003/KTR/PPK/RPJI.DAK/PUPR/I/2018', '0000-00-00', '-', '-', 343836000, '', '', '', 'APBD'),
('1708', '60', '52053', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi  DI. Cisalak ', 'Permanen', '-', 'Beton', 272.5, '0000-00-00', '602.1/008/KTR/PPK/RPJI.DAK/PUPR/III/2018', '0000-00-00', '-', '-', 251389000, '', '', '', 'APBD'),
('1709', '60', '52062', 'AS01', 'Rehabilitasi/Peningkatan Jaringan Irigasi DI. Leuwibitung ', 'Permanen', '-', 'Beton', 297.5, '0000-00-00', '602.1/004/KTR/PPK/RPJI.DAK/PUPR/I/2018', '0000-00-00', '-', '-', 340414000, '', '', '', 'APBD'),
('1710', '60', '52049', 'AS03', 'Pengendalian Banjir Perkotaan Sistem Badama ', 'Permanen', '', 'Beton', 576.85, '0000-00-00', '602.1/001/KTR/PPK/PBP/PUPR/VII/2018', '0000-00-00', '-', '-', 1162145000, '', '', '', 'APBD'),
('2', '60', '52007', 'AS01', '5', '5', '5', '5', 5, '2019-05-01', '5', '2019-05-04', '5', '5', 5, '534px-Logo_Politeknik_Negeri_Bandung.svg.png', '534px-Logo_Politeknik_Negeri_Bandung.svg.png', '5', '5'),
('3', '60', '52013', 'AS04', '2', '2', '2', '2', 2, '2019-05-02', '2', '2019-05-14', '2', '', 2, '', '', '2', '2'),
('4', '60', '52001', 'AS01', '', '', '', '', 0, '0000-00-00', '', '0000-00-00', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi` (
  `ID_LOKASI` char(10) NOT NULL,
  `NAMA_LOKASI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`ID_LOKASI`, `NAMA_LOKASI`) VALUES
('52001', 'Lewo Baru'),
('52002', 'Sukaratu'),
('52003', 'Cangkuang'),
('52004', 'Sukaluyu'),
('52005', 'Sukarame'),
('52006', 'Sukakarya'),
('52007', 'Banyuresmi'),
('52008', 'Cimurah'),
('52009', 'Pamulihan'),
('52010', 'Mekarbakti'),
('52011', 'Bojong'),
('52012', 'Cidatar'),
('52013', 'Simpang'),
('52014', 'Depok'),
('52015', 'Leuwigoong'),
('52016', 'DAS Cimaragas'),
('52017', 'DAS Parigi'),
('52018', 'DAS Badama'),
('52019', 'DAS Cikendi'),
('52020', 'DAS Ciojar '),
('52021', 'DAS Ciwalen'),
('52022', 'DAS Cimanuk'),
('52023', 'DAS Cikatel'),
('52024', 'DAS Cigarut'),
('52025', 'Cilauteraun'),
('52026', 'Maroko'),
('52027', 'Cipaleubuh'),
('52028', 'Citameng IV'),
('52029', 'Cianteun'),
('52030', 'Cioajar'),
('52031', 'Cimaragas'),
('52032', 'Citameng III'),
('52033', 'Kp. Sipon Ds. Bayongbong'),
('52034', 'Cadasgantung'),
('52035', 'Baranangsiang'),
('52036', 'Cimanuk'),
('52037', 'Ciroyom'),
('52038', 'Cipacing'),
('52039', 'DI Citameng I Kec. Karangtengah'),
('52040', 'Cipejeuh'),
('52041', 'DI. Ciojar Kec. Banyuresmi'),
('52042', 'Cikurai'),
('52043', 'Cibuluh'),
('52044', 'DI. Citameng IV Kec. Sukawening'),
('52045', 'Citameng I'),
('52046', ' Cilawu'),
('52047', 'Garut'),
('52048', 'Sucinaraja'),
('52049', 'Tarogong Kidul'),
('52050', 'Samarang'),
('52051', 'Pasirwangi'),
('52052', 'Leles'),
('52053', 'Kadungora'),
('52054', 'Karangtengah'),
('52055', 'Sukawening'),
('52056', 'Cibatu'),
('52057', 'Limbangan'),
('52058', 'Cigedug'),
('52059', 'Bayongbong'),
('52060', 'Cisurupan'),
('52061', 'Singajaya'),
('52062', 'Banjarwangi'),
('52063', 'Cibolang'),
('52064', 'Cisompet'),
('52065', 'Bungbulang'),
('52066', 'Mekarmukti'),
('52067', 'Caringin'),
('52068', 'Wanaraja'),
('52069', 'Cibiuk'),
('52070', 'Karang Tengah'),
('52071', 'Selaawi'),
('52072', 'Cibalong'),
('52073', 'Cikajang'),
('52074', 'Pakenjeng'),
('52075', 'Talegong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `NOMOR_INDUK_PEGAWAI` char(20) NOT NULL,
  `ID_JENIS` char(10) NOT NULL,
  `NAMA_PEGAWAI` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`NOMOR_INDUK_PEGAWAI`, `ID_JENIS`, `NAMA_PEGAWAI`, `PASSWORD`) VALUES
('1', '11', 'saya', '1'),
('1990070720000808', '11', 'amin a.m.', '121212'),
('1998030320010202', '22', 'farhan r.a.', '909090'),
('1998060620020303', '22', 'dirga h.y.', '545454'),
('1999040420020303', '11', 'mina m.a.', '212121'),
('2', '33', 'User', '2'),
('2000060620200404', '22', 'mumuh k.m.', '676767');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

DROP TABLE IF EXISTS `pemeliharaan`;
CREATE TABLE `pemeliharaan` (
  `ID_PEMELIHARAAN` char(10) NOT NULL,
  `ID_DAK` char(10) DEFAULT NULL,
  `TOTAL_BIAYA` bigint(20) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`ID_PEMELIHARAAN`, `ID_DAK`, `TOTAL_BIAYA`, `TANGGAL_MULAI`, `TANGGAL_AKHIR`) VALUES
('2', '508', 5000000, '2019-05-27', '2019-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbi`
--

DROP TABLE IF EXISTS `rbi`;
CREATE TABLE `rbi` (
  `ID_RBI` char(10) DEFAULT NULL,
  `GOLONGAN` varchar(50) DEFAULT NULL,
  `KODE_BIDANG_BARANG` varchar(5) DEFAULT NULL,
  `JUMLAH_BARANG` float DEFAULT NULL,
  `JUMLAH_HARGA` bigint(20) DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`ID_ASET`);

--
-- Indexes for table `bi`
--
ALTER TABLE `bi`
  ADD PRIMARY KEY (`ID_BI`);

--
-- Indexes for table `dak`
--
ALTER TABLE `dak`
  ADD PRIMARY KEY (`ID_DAK`),
  ADD KEY `FK_DAK_LOKASIDAK_LOKASI` (`ID_LOKASI`);

--
-- Indexes for table `dataspa`
--
ALTER TABLE `dataspa`
  ADD PRIMARY KEY (`ID_DATASPA`);

--
-- Indexes for table `ded`
--
ALTER TABLE `ded`
  ADD PRIMARY KEY (`ID_DED`);

--
-- Indexes for table `dedlokasi`
--
ALTER TABLE `dedlokasi`
  ADD PRIMARY KEY (`ID_LOKASI`,`ID_DED`),
  ADD KEY `FK_DEDLOKAS_DEDLOKASI_DED` (`ID_DED`);

--
-- Indexes for table `detail_pemeliharaan`
--
ALTER TABLE `detail_pemeliharaan`
  ADD PRIMARY KEY (`ID_DETAIL_PEMELIHARAAN`),
  ADD KEY `FK_DETAIL_P_PEMELIHAR_PEMELIHA` (`ID_PEMELIHARAAN`);

--
-- Indexes for table `jenis_pegawai`
--
ALTER TABLE `jenis_pegawai`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `kiba`
--
ALTER TABLE `kiba`
  ADD PRIMARY KEY (`ID_KIBA`),
  ADD KEY `FK_KIBA_LOKASIKIB_LOKASI` (`ID_LOKASI`),
  ADD KEY `FK_KIBA_SPATIALKI_DATASPA` (`ID_DATASPA`);

--
-- Indexes for table `kibd`
--
ALTER TABLE `kibd`
  ADD PRIMARY KEY (`ID_KIBD`),
  ADD KEY `FK_KIBD_ASETKIBD_ASET` (`ID_ASET`),
  ADD KEY `FK_KIBD_LOKASIKIB_LOKASI` (`ID_LOKASI`),
  ADD KEY `FK_KIBD_SPATIALKI_DATASPA` (`ID_DATASPA`);

--
-- Indexes for table `kibf`
--
ALTER TABLE `kibf`
  ADD PRIMARY KEY (`ID_KIBF`),
  ADD KEY `FK_KIBF_ASETKIBF_ASET` (`ID_ASET`),
  ADD KEY `FK_KIBF_LOKASIKIB_LOKASI` (`ID_LOKASI`),
  ADD KEY `FK_KIBF_SPATIALKI_DATASPA` (`ID_DATASPA`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`ID_LOKASI`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NOMOR_INDUK_PEGAWAI`),
  ADD KEY `FK_PEGAWAI_JENISPEGA_JENIS_PE` (`ID_JENIS`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`ID_PEMELIHARAAN`),
  ADD KEY `FK_PEMELIHA_RELATIONS_DAK` (`ID_DAK`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dak`
--
ALTER TABLE `dak`
  ADD CONSTRAINT `FK_DAK_LOKASIDAK_LOKASI` FOREIGN KEY (`ID_LOKASI`) REFERENCES `lokasi` (`ID_LOKASI`);

--
-- Ketidakleluasaan untuk tabel `dedlokasi`
--
ALTER TABLE `dedlokasi`
  ADD CONSTRAINT `FK_DEDLOKAS_DEDLOKASI_DED` FOREIGN KEY (`ID_DED`) REFERENCES `ded` (`ID_DED`),
  ADD CONSTRAINT `FK_DEDLOKAS_DEDLOKASI_LOKASI` FOREIGN KEY (`ID_LOKASI`) REFERENCES `lokasi` (`ID_LOKASI`);

--
-- Ketidakleluasaan untuk tabel `detail_pemeliharaan`
--
ALTER TABLE `detail_pemeliharaan`
  ADD CONSTRAINT `FK_DETAIL_P_PEMELIHAR_PEMELIHA` FOREIGN KEY (`ID_PEMELIHARAAN`) REFERENCES `pemeliharaan` (`ID_PEMELIHARAAN`);

--
-- Ketidakleluasaan untuk tabel `kiba`
--
ALTER TABLE `kiba`
  ADD CONSTRAINT `FK_KIBA_LOKASIKIB_LOKASI` FOREIGN KEY (`ID_LOKASI`) REFERENCES `lokasi` (`ID_LOKASI`),
  ADD CONSTRAINT `FK_KIBA_SPATIALKI_DATASPA` FOREIGN KEY (`ID_DATASPA`) REFERENCES `dataspa` (`ID_DATASPA`);

--
-- Ketidakleluasaan untuk tabel `kibd`
--
ALTER TABLE `kibd`
  ADD CONSTRAINT `FK_KIBD_ASETKIBD_ASET` FOREIGN KEY (`ID_ASET`) REFERENCES `aset` (`ID_ASET`),
  ADD CONSTRAINT `FK_KIBD_LOKASIKIB_LOKASI` FOREIGN KEY (`ID_LOKASI`) REFERENCES `lokasi` (`ID_LOKASI`),
  ADD CONSTRAINT `FK_KIBD_SPATIALKI_DATASPA` FOREIGN KEY (`ID_DATASPA`) REFERENCES `dataspa` (`ID_DATASPA`);

--
-- Ketidakleluasaan untuk tabel `kibf`
--
ALTER TABLE `kibf`
  ADD CONSTRAINT `FK_KIBF_ASETKIBF_ASET` FOREIGN KEY (`ID_ASET`) REFERENCES `aset` (`ID_ASET`),
  ADD CONSTRAINT `FK_KIBF_LOKASIKIB_LOKASI` FOREIGN KEY (`ID_LOKASI`) REFERENCES `lokasi` (`ID_LOKASI`),
  ADD CONSTRAINT `FK_KIBF_SPATIALKI_DATASPA` FOREIGN KEY (`ID_DATASPA`) REFERENCES `dataspa` (`ID_DATASPA`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_PEGAWAI_JENISPEGA_JENIS_PE` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_pegawai` (`ID_JENIS`);

--
-- Ketidakleluasaan untuk tabel `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `FK_PEMELIHA_RELATIONS_DAK` FOREIGN KEY (`ID_DAK`) REFERENCES `dak` (`ID_DAK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
