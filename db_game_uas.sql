-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 12:20 PM
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
-- Database: `db_game_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `developer` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `judul`, `genre`, `platform`, `developer`, `deskripsi`, `rating`, `gambar`) VALUES
(1, 'The Witcher 3', 'RPG', 'PC, PS5', 'CD Projekt Red', 'Petualangan Geralt of Rivia mencari Ciri.', 9.8, 'default.jpg'),
(2, 'Valorant', 'FPS', 'PC', 'Riot Games', 'Game tembak-menembak taktis 5v5.', 8.5, 'default.jpg'),
(3, 'Genshin Impact', 'Action RPG', 'PC, Mobile', 'HoYoverse', 'Menjelajahi dunia Teyvat.', 8.9, 'default.jpg'),
(7, 'Mobile Legends: Bang Bang', 'MOBA', '', NULL, NULL, 8.2, 'default.jpg'),
(11, 'Arena of Valor', 'MOBA', '', NULL, NULL, 7.5, 'default.jpg'),
(12, 'DOTA 2', 'MOBA', '', NULL, NULL, 8.5, 'default.jpg'),
(13, 'Free Fire', 'Battle Royale', '', NULL, NULL, 7.5, 'default.jpg'),
(14, 'PUBG Mobile', 'Battle Royale', '', NULL, NULL, 8.5, 'default.jpg'),
(15, 'Call of Duty: Mobile', 'Battle Royale', '', NULL, NULL, 8.2, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin_uas', '$2y$10$iXi275Cz5kXoJTPkZBsJPuz/IOmzErveXBP0F3sy38o7w76VZTiWe', 'admin'),
(2, 'user_biasa', '$2y$10$BB.Yn8Bkf.02KX.0tsOjFuapOJHXus1sIzMo9cVtl8VM9gsw34wZm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
