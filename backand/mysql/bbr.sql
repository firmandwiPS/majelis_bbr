-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 09:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(9, 'admin', 'admin', 'admin@gmail.com', '$2y$10$jfqspjEncsIXbeq0ssExvu8tTmhojEwQZX1J.5l7VDezfpA2RbdZe', '1'),
(17, 'anggota1', 'anggota1', 'anggota@gmail.com', '$2y$10$D68KDa6oQTLMzQpCXGsU9uWB.s/ULtU349zLgNKNxnWRJ.HT7Tiyy', '2'),
(18, 'anggota2', 'anggota2', 'anggota2@gmail.com', '$2y$10$C/yZ2nFtU8gPzKoqseEdZuTYC3dpyv3kHXhaD1gseyVRRISfXZtq.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi_kegiatan`
--

CREATE TABLE `dokumentasi_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumentasi_kegiatan`
--

INSERT INTO `dokumentasi_kegiatan` (`id`, `nama_kegiatan`, `foto`, `uploaded_at`) VALUES
(18, 'foto logo', 'uploads/6808935e4c52c_A logo of a crow.jpeg', '2025-04-23 14:14:38'),
(19, 'foto logo', 'uploads/6808935e4ce92_fancy-cushion.png', '2025-04-23 14:14:38'),
(20, 'foto logo', 'uploads/6808935e4d5e3_RAVEN.png', '2025-04-23 14:14:38'),
(21, 'foto logo', 'uploads/6808935e4de2c_Raven-NoBG.png', '2025-04-23 14:14:38'),
(22, 'foto logo', 'uploads/6808935e4e305_Raven-NoBGW.png', '2025-04-23 14:14:38'),
(23, 'foto logo', 'uploads/6808935e4e8bb_Ravens.png', '2025-04-23 14:14:38'),
(24, 'foto logo', 'uploads/6808935e4ef38_Screenshot 2025-02-06 100813.png', '2025-04-23 14:14:38'),
(25, 'foto logo', 'uploads/6808935e4f574_TEFA.jpg', '2025-04-23 14:14:38'),
(26, 'foto logo', 'uploads/6808935e4fb16_Tefa.png', '2025-04-23 14:14:38'),
(27, 'foto logo', 'uploads/6808935e50043_TEFAh.jpg', '2025-04-23 14:14:38'),
(28, 'foto logo', 'uploads/6808935e50528_TEFAh-removebg-preview.png', '2025-04-23 14:14:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `dokumentasi_kegiatan`
--
ALTER TABLE `dokumentasi_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dokumentasi_kegiatan`
--
ALTER TABLE `dokumentasi_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
