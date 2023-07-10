-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 04:54 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projectpresensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `last_login`) VALUES
(1, 'sa', '123', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftarhadir`
--

CREATE TABLE `tbl_daftarhadir` (
  `id` int(11) NOT NULL,
  `id_Rapat` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `namaLengkap` varchar(512) NOT NULL,
  `jabatan` varchar(512) NOT NULL,
  `unit` varchar(512) NOT NULL,
  `intansi` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `attendance` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daftarhadir`
--

INSERT INTO `tbl_daftarhadir` (`id`, `id_Rapat`, `nip`, `namaLengkap`, `jabatan`, `unit`, `intansi`, `email`, `attendance`) VALUES
(1, 1, 212303002, 'Salma Sayyidah', 'Direktur', '1', 'PT Salema Jaya', 'ssayyidah@gmail.com', '0000-00-00 00:00:00'),
(2, 2, 212303001, 'dindun', 'HRD', '2', 'PT Salema Jaya', 'dindunputri@gmail.com', '2023-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftarrapat`
--

CREATE TABLE `tbl_daftarrapat` (
  `id` int(11) NOT NULL,
  `judulRapat` varchar(512) NOT NULL,
  `tempat` varchar(512) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` int(11) NOT NULL,
  `idZoom` varchar(512) NOT NULL,
  `link` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daftarrapat`
--

INSERT INTO `tbl_daftarrapat` (`id`, `judulRapat`, `tempat`, `tanggal`, `waktu`, `status`, `idZoom`, `link`) VALUES
(1, 'Rapat pembahasan pembangunan IKN tahun 2024', 'zoom', '2023-06-26', '02:00:00', 1, '1', 'https:zoom.com'),
(2, 'Rapat Pembahasan Project Tender Kementerian Luar Nagreg', 'Zoom', '2023-06-01', '13:00:00', 1, '8990023445', 's.id/shdkahsldhladasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_daftarhadir`
--
ALTER TABLE `tbl_daftarhadir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_daftarrapat`
--
ALTER TABLE `tbl_daftarrapat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_daftarhadir`
--
ALTER TABLE `tbl_daftarhadir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_daftarrapat`
--
ALTER TABLE `tbl_daftarrapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
