-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2015 at 01:53 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbhtpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbkomunikasi`
--

CREATE TABLE IF NOT EXISTS `tbkomunikasi` (
  `id_komunikasi` int(10) NOT NULL,
  `tipe` int(1) NOT NULL COMMENT '0=reply, 1=tsforum, 2=komentarmateri',
  `id_komentar` int(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `judul` varchar(75) NOT NULL,
  `waktu` int(11) NOT NULL,
  `isi` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 terbuka 1 tertutup 2 dihapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbkomunikasi`
--
ALTER TABLE `tbkomunikasi`
  ADD PRIMARY KEY (`id_komunikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbkomunikasi`
--
ALTER TABLE `tbkomunikasi`
  MODIFY `id_komunikasi` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
