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
-- Table structure for table `tbanggota`
--

CREATE TABLE IF NOT EXISTS `tbanggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` enum('Admin','User') NOT NULL,
  `foto` varchar(250) NOT NULL DEFAULT 'default_foto.jpg',
  `kota` varchar(30) NOT NULL DEFAULT 'Belum diatur',
  `jenis_kelamin` enum('Belum diatur','Pria','Wanita') NOT NULL DEFAULT 'Belum diatur',
  `no_kontak` varchar(15) NOT NULL DEFAULT 'Belum diatur',
  `alamat` varchar(150) NOT NULL DEFAULT 'Belum diatur',
  `ttl` varchar(75) NOT NULL DEFAULT 'Belum diatur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`id_anggota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
