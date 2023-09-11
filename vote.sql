-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 05:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_osis`
--

CREATE TABLE `calon_osis` (
  `id_calon` int(11) NOT NULL,
  `nama_calon` varchar(100) DEFAULT NULL,
  `jumlah_suara` int(11) DEFAULT 0,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `calon_osis`
--

INSERT INTO `calon_osis` (`id_calon`, `nama_calon`, `jumlah_suara`, `image_url`) VALUES
(1, 'paslon 1', 257, '../data/img/c1.png'),
(2, 'paslon 2', 76, '../data/img/c2.png'),
(3, 'paslon 3', 380, '../data/img/c3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_osis`
--
ALTER TABLE `calon_osis`
  ADD PRIMARY KEY (`id_calon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_osis`
--
ALTER TABLE `calon_osis`
  MODIFY `id_calon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
