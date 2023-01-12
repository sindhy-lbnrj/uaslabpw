-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2022 at 04:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `password`, `fakultas`, `foto`) VALUES
('196203171991031001', 'Dr. Poltak Sihombing, M.Kom.', 'admin', 'FASILKOM-TI', 'Dosen-Poltak.png'),
('196711101996021001', 'Dr. Syahril Efendi, S.Si, M.IT', 'admin', 'FASILKOM-TI', 'Dosen_Syahril.png'),
('197401272002122001', 'Dr. Maya Silvi Lydia, B.Sc., M.Sc.', 'admin', 'FASILKOM-TI', 'Dekan-Maya.png'),
('197510082008011011', 'Dr. Mohammad Andri Budiman, S.T., M.Comp.Sc., M.E.M.', 'admin', 'FASILKOM-TI', 'WD1-Andri.png'),
('197812212014042001', 'Dr. Amalia, ST., M.T.', 'admin', 'FASILKOM-TI', 'Dosen-Amel.png'),
('198302262010122003', 'Sarah Purnamawati, S.T., M.Sc.\r\n', 'admin', 'FASILKOM-TI', 'Dosen-Sarah.png'),
('198603032010121004', 'Romi Fadillah Rahmat, B.Comp.Sc., M.Sc.', 'admin', 'FASILKOM-TI', 'Dosen-Romi.png'),
('198710152019032010', 'Fuzy Yustika Manik S.Kom.,M.Kom', 'admin', 'FASILKOM-TI', 'Dosen-Fuzy.png'),
('198805012015042006', 'Sri Melvani Hardi, S.Kom., M.Kom.\r\n', 'admin', 'FASILKOM-TI', 'Dosen-Vani.png'),
('199005042019032023', 'Dewi Sartika Br Ginting, S.Kom, M.Kom', 'admin', 'FASILKOM-TI', 'Dosen-Dewi.png');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `password` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `password`, `fakultas`, `foto`) VALUES
('211401005', 'Bima', 'L', 'admin', 'FASILKOM-TI', '211401005.jpg'),
('211401008', 'Putri Andriyani', 'P', 'admin', 'FASILKOM-TI', '211401008.jpg'),
('211401024', 'Iki Maul', 'L', 'admin', 'FASILKOM-TI', '211401024.jpg'),
('211401039', 'Gilberdi Axel Nathaniel Sinaga', 'L', 'admin', 'FASILKOM-TI', '211401039.jpg'),
('211401048', 'Eunike Leoni Sinaga', 'P', 'admin', 'FASILKOM-TI', '211401048.jpg'),
('211401052', 'Elisa Lolita', 'P', 'admin', 'FASILKOM-TI', ''),
('211401078', 'Erwin Prasetyo', 'L', 'admin', 'FASILKOM-TI', '211401078.jpg'),
('211401098', 'Billy Messi', 'L', 'admin', 'FASILKOM-TI', '211401098.jpg'),
('211401104', 'Haikal Rahman', 'L', 'admin', 'FASILKOM-TI', '211401104.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
