-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 10:58 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eproposal2`
--

-- --------------------------------------------------------

--
-- Table structure for table `hibah_2022`
--

CREATE TABLE `hibah_2022` (
  `id` varchar(20) NOT NULL,
  `tahun_pengajuan` int(4) DEFAULT NULL,
  `jenis_pengajuan` varchar(20) DEFAULT NULL,
  `peruntukan` varchar(20) DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `pimpinan` varchar(100) DEFAULT NULL,
  `bhi` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `desa` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `nominal` varchar(100) DEFAULT NULL,
  `uraian_keg_satuan` varchar(2000) DEFAULT NULL,
  `opd_rekomendasi` varchar(20) DEFAULT NULL,
  `opd_pelaksana` varchar(20) DEFAULT NULL,
  `program` varchar(20) DEFAULT NULL,
  `kegiatan` varchar(20) DEFAULT NULL,
  `sub_kegiatan` varchar(20) DEFAULT NULL,
  `tahun_terakhir_menerima` int(4) DEFAULT NULL,
  `tanggal_permohonan` date DEFAULT NULL,
  `nomor_permohonan` varchar(100) DEFAULT NULL,
  `nomor_penerbitan_rekomendasi` varchar(100) DEFAULT NULL,
  `pejabat_penerbitan_rekomendasi` varchar(200) DEFAULT NULL,
  `tanggal_penerbitan_rekomendasi` date DEFAULT NULL,
  `tanggal_disposisi_bupati` date DEFAULT NULL,
  `tanggal_pertimbangan_ketua_tapd` date DEFAULT NULL,
  `isi_disposisi_ketua_tapd` varchar(2000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hibah_2022`
--

INSERT INTO `hibah_2022` (`id`, `tahun_pengajuan`, `jenis_pengajuan`, `peruntukan`, `penerima`, `pimpinan`, `bhi`, `kecamatan`, `desa`, `alamat`, `nominal`, `uraian_keg_satuan`, `opd_rekomendasi`, `opd_pelaksana`, `program`, `kegiatan`, `sub_kegiatan`, `tahun_terakhir_menerima`, `tanggal_permohonan`, `nomor_permohonan`, `nomor_penerbitan_rekomendasi`, `pejabat_penerbitan_rekomendasi`, `tanggal_penerbitan_rekomendasi`, `tanggal_disposisi_bupati`, `tanggal_pertimbangan_ketua_tapd`, `isi_disposisi_ketua_tapd`, `created_at`, `created_by`) VALUES
('20220418116', 0, NULL, 'jasa', 'makan bakpau', '20000', 'sdnakjny8934', '352304', '3523042007', '2022-05-22', '4353', '2010', '5.01.5.05.0.00.02.00', '5.01.5.05.0.00.02.00', 'program', '3.31.04.2.01', '', 0, '0000-00-00', '2022-07-22', '2022-02-22', '', '1970-01-01', '0000-00-00', '1970-01-01', '', '2022-04-18 22:56:19', 'admin'),
('20220418117', 2011, 'hibah', 'barang', 'harim', 'harim', 'dknoqh', '352306', '3523062007', 'ewnhwher209', '3453643', 'nskcjnjdhiuweorho', '7.01.0.00.0.00.20.00', '7.01.0.00.0.00.20.00', '3.31.01', '3.31.01.2.06', '3.31.01.2.06.01', 2015, '2022-04-02', 'ern234', 'wrq24213', 'gert', '2022-04-30', '2022-05-07', '2022-06-30', 'sudah', '2022-04-18 23:24:05', 'admin'),
('202204191111', 2010, NULL, 'jasa', '6587686', '76897jhbjhi87', 'cgctf76', '352303', '3523032004', '6587686', '4535', 'cgctf76', '5.01.5.05.0.00.02.00', '5.01.5.05.0.00.02.00', 'program', '3.31.01.2.05', '3.31.01.2.05.02', 2016, '2022-05-22', 'dmaokm', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', 'fbkjabsiu726', '2022-04-19 00:08:26', 'admin'),
('202204191112', 2010, NULL, 'jasa', '6587687', '76897jhbjhi88', 'sda8342', '352303', '3523032004', '6587687', '54353', 'sda8342', '5.01.5.05.0.00.02.00', '5.01.5.05.0.00.02.00', 'program', '3.31.01.2.05', '3.31.01.2.05.02', 2017, '2022-05-23', 'dmaokm', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', 'fbkjabsiu727', '2022-04-19 00:08:26', 'admin'),
('202204191113', 2013, 'hibah', 'uang', 'yuma', 'huhu', 'cgctf76', '352303', '3523032008', '6587686', '35435', '2016', '7.01.0.00.0.00.13.00', '7.01.0.00.0.00.13.00', '3.31.01', '3.31.01.2.06', '3.31.01.2.06.04', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', '1970-01-01', '', '2022-04-19 00:38:36', 'admin'),
('202204191114', 2013, 'Hibah', 'uang', 'ida', 'tata', 'sda8342', '352303', '3523032008', '6587687', '69878909', '2017', '7.01.0.00.0.00.13.00', '7.01.0.00.0.00.13.00', '3.31.01', '3.31.01.2.06', '3.31.01.2.06.04', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', '1970-01-01', '', '2022-04-19 00:38:36', 'admin'),
('202204191115', 2011, 'hibah', 'jasa', 'yuma', 'huhu', 'cgctf76', '352305', '3523052011', '6587686', '5', '2016', '7.01.0.00.0.00.04.00', '7.01.0.00.0.00.04.00', '3.31.01', '3.31.01.2.05', '3.31.01.2.05.11', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', '1970-01-01', '', '2022-04-19 00:39:17', 'admin'),
('202204191116', 2011, 'Hibah', 'jasa', 'ida', 'tata', 'sda8342', '352305', '3523052011', '6587687', '68769', '2017', '7.01.0.00.0.00.04.00', '7.01.0.00.0.00.04.00', '3.31.01', '3.31.01.2.05', '3.31.01.2.05.11', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', '1970-01-01', '', '2022-04-19 00:39:17', 'admin'),
('202204191117', 2012, 'hibah', 'uang', 'dami', 'huhu', 'cgctf76', '352319', '3523192009', '6587686', '6', '2016', '7.01.0.00.0.00.10.00', '7.01.0.00.0.00.10.00', '3.31.01', '3.31.01.2.06', '3.31.01.2.06.01', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', '1970-01-01', '', '2022-04-19 00:48:30', 'admin'),
('202204191118', 2012, 'Hibah', 'uang', 'yuda', 'tata', 'sda8342', '352319', '3523192009', '6587687', '64', '2017', '7.01.0.00.0.00.10.00', '7.01.0.00.0.00.10.00', '3.31.01', '3.31.01.2.06', '3.31.01.2.06.01', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-20', '2022-08-10', '1970-01-01', '', '2022-04-19 00:48:30', 'admin'),
('202204191119', 0, 'hibah', 'uang', 'yessy', 'alis', 'cgctf768979ho', '352303', '3523032011', '69870805211', '453', '2016', '4.02.0.00.0.00.01.00', '4.02.0.00.0.00.01.00', '3.31.01', '3.31.01.2.06', '3.31.01.2.06.01', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-30', '2022-08-30', '1970-01-01', '', '2022-04-19 06:53:21', 'admin'),
('202204191120', 0, 'Hibah', 'uang', 'amar', 'kuning', 'cgctf768979ho', '352303', '3523032011', '69870805211', '687687', '2017', '4.02.0.00.0.00.01.00', '4.02.0.00.0.00.01.00', '3.31.01', '3.31.01.2.06', '3.31.01.2.06.01', 2022, '1970-01-01', '32874nkd/sn', 'sk', '2022-04-22', '2022-04-20', '2022-08-10', '1970-01-01', '', '2022-04-19 06:53:21', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hibah_2022`
--
ALTER TABLE `hibah_2022`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
