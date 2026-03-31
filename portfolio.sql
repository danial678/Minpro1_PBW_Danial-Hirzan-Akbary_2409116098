-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2026 at 03:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_hobby` varchar(50) NOT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `jenis`, `nama_hobby`, `urutan`) VALUES
(1, 'olahraga', 'Olaraga kadang', 1),
(2, 'seni', 'Berseni', 2),
(3, 'game', 'Main Game', 3),
(4, 'sosial', 'Bersosialisasi', 4),
(5, 'travel', 'Jalan-jalan', 5),
(6, 'makan', 'Suka Makan', 6),
(7, 'tidur', 'Suka Tidur', 7),
(8, 'ngopi', 'Ngopi Chill and Cigaro', 8);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tahun_copyright` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama_lengkap`, `role`, `deskripsi`, `tahun_copyright`) VALUES
(1, 'Danial Hirzan Akbary', 'Mahasiswa Sistem Informasi', 'Saya adalah mahasiswa Sistem Informasi yang 80% ngoding, 100% tidur di mana pun, dan 95% jago kerja tim 😌.\n\nKalau tidak sedang berhadapan dengan bug, biasanya saya sedang main game, jalan-jalan, atau ngopi sambil mencari inspirasi hidup. Saya percaya bahwa hidup itu seperti coding — kadang error, kadang berhasil, tapi yang penting jangan lupa di-save.', 2026);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `jenis`, `judul`, `penerbit`, `tahun`, `urutan`) VALUES
(1, 'organisasi', 'Anggota Perkap INsevent', 'INFORSA', '2025', 1),
(2, 'organisasi', 'Staff Biro 2024-2025', 'INFORSA', '2024-2025', 2),
(3, 'organisasi', 'Anggota Perkap Aplikasi', 'INFORSA', '2025', 3);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_skill` varchar(50) NOT NULL,
  `persentase` int NOT NULL,
  `urutan` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `jenis`, `nama_skill`, `persentase`, `urutan`) VALUES
(1, 'tidur', 'Tidur Dimana Pun', 100, 1),
(2, 'ngoding', 'Ngoding', 80, 2),
(3, 'travel', 'Berkelana', 75, 3),
(4, 'ngomong', 'Ngomong Bauk', 70, 4),
(5, 'speak', 'Public Speaking', 50, 5),
(6, 'team', 'Teamwork', 95, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
