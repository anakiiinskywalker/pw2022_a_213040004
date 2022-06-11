-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 11:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_pw2022_a_213040004`
--

-- --------------------------------------------------------

--
-- Table structure for table `musik`
--

CREATE TABLE `musik` (
  `id` int(11) NOT NULL,
  `judul_musik` varchar(50) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `tahun_rilis` int(25) NOT NULL,
  `penyanyi` varchar(50) NOT NULL,
  `album` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musik`
--

INSERT INTO `musik` (`id`, `judul_musik`, `genre`, `tahun_rilis`, `penyanyi`, `album`) VALUES
(1, 'John Mayer - Gravity', 'Blues', 2005, 'John Mayer', '62a0ac2981419.jpg'),
(2, 'Artic Monkeys - Arabella', 'Rock Indie', 2013, 'Artic Monkeys', '629ff5de10485.jpg'),
(3, 'The Beatles - Let It Be', 'Rock', 1970, 'The Beatles', 'letitbe.jpg'),
(4, 'The Beatles - Yesterday', 'Rock', 1976, 'The Beatles', 'yesterday.jpg'),
(5, 'Oasis - Stand By Me', 'Pop Rock', 1997, 'Oasis', 'standbyme.jpg'),
(6, 'Oh Wonder - Landslide', 'Pop Indie', 2015, 'Oh Wonder', 'landslide.jpg'),
(8, 'Tame Impala - \'Cause i\'m a Man', 'Pop Indie', 2015, 'Tame Impala', 'causeimaman.jpg'),
(9, 'Gorillaz - Dare', 'Pop', 2015, 'Gorillaz', 'dare.jpg'),
(10, 'Eagles - Hotel California', 'Pop Rock', 1976, 'Eagles', 'hotelcalifornia.jpg'),
(46, 'L.O.V.E', 'Jazz', 1964, 'Michael Bubble', 'love.jpg'),
(48, 'BB - KING `', 'Blues', 1968, 'BB KING', '62a1c83d61fb5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$iDquUzYMjRm2e.usKe/lY.kY1kmFKLXbxblQr1KOIpMRuE2I72kU2'),
(2, 'skywalker', '$2y$10$/rjKSBgHNzDR6FC/cf8mBeemz7awfHbDqw6PWbloKzoyPwnnZOM9u'),
(3, 'azka', '$2y$10$K/rLar9ZV3d0NXh.5OXoze0Js2Cfprb5oeSbfKMbmUokG.39HIfDC'),
(4, 'abay', '$2y$10$F3v/XkfemLJe0uwvJEbUlOTHEVwgzXex10q8E95Yflw25JAKJmSlS'),
(5, 'afandi', '$2y$10$gwGoZ5Ciw3ah0yT0.kFbBedIO/96hGQJ/8EFC0VmkoGb2kAdo6Bk6'),
(6, 'nizar', '$2y$10$GA9uv8vceO5pbO.BPnhTCeHiQAaXM7AjfIZYhv8KgcNRdQyUlGC1e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `musik`
--
ALTER TABLE `musik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musik`
--
ALTER TABLE `musik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
