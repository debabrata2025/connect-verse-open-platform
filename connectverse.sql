-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 04:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `demodata`
--

CREATE TABLE `demodata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demodata`
--

INSERT INTO `demodata` (`id`, `name`, `email`, `phone`, `password`, `cpassword`, `image`, `token`, `status`) VALUES
(54, 'Debabrata santra', 'ds2357196@gmail.com', '07319256047', '$2y$10$Rp9Gx3qfJneGnFFkf6aFSOu9uHx62KBUEwyQ1Sc1klPR.PEvnOeDi', '$2y$10$cFT2SL3kEl8c06Zw8uMiPuXpF5X9helBaLq10/67onBB7s7TDh20q', 'pimg/Screenshot 2024-02-21 184215.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mailtable`
--

CREATE TABLE `mailtable` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msgdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mailtable`
--

INSERT INTO `mailtable` (`id`, `name`, `image`, `msg`, `email`, `msgdate`) VALUES
(73, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'good night', 'ds2357196@gmail.com', '09-03-24'),
(74, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24'),
(75, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24'),
(76, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24'),
(77, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24'),
(78, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24'),
(79, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24'),
(80, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `main_content`
--

CREATE TABLE `main_content` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profileimg` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `desp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main_content`
--

INSERT INTO `main_content` (`id`, `username`, `profileimg`, `video`, `desp`, `email`) VALUES
(48, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/Screenshot 2024-01-12 201643.png', '', 'ds2357196@gmail.com'),
(49, 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/Screenshot 2024-01-12 191819.png', '', 'ds2357196@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demodata`
--
ALTER TABLE `demodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailtable`
--
ALTER TABLE `mailtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_content`
--
ALTER TABLE `main_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demodata`
--
ALTER TABLE `demodata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `mailtable`
--
ALTER TABLE `mailtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `main_content`
--
ALTER TABLE `main_content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
