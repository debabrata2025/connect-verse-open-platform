-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 10:13 PM
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
-- Database: `connectverse`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aid` int(255) NOT NULL,
  `qid` varchar(255) NOT NULL,
  `ans` mediumtext NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `posttime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`aid`, `qid`, `ans`, `user_img`, `u_name`, `posttime`) VALUES
(68, '65', '5 steps to learn DSA from scratch<br />\r\nLearn at least one Programming Language<br />\r\nLearn about Complexities<br />\r\nLearn Data Structure and Algorithms<br />\r\n1) Array<br />\r\n2) String<br />\r\n3) Linked List<br />\r\n4) Searching Algorithm<br />\r\n5) Sorting Algorithm<br />\r\n6) Divide and Conquer Algorithm<br />\r\n7) Stack<br />\r\n8) Queue<br />\r\n9) Tree Data Structure<br />\r\n10) Graph Data Structure<br />\r\n11) Greedy Methodology<br />\r\n12) Recursion<br />\r\n13) Backtracking Algorithm<br />\r\n14) Dynamic Programming<br />\r\nPractice, practice and practice more<br />\r\nCompete and become a pro', 'pimg/1000060164.png', 'radhe debu', '1711546656256'),
(69, '66', 'Self-improvement Tips to Try<br />\r\n1. Evaluate what isn\'t working and change it. We all have habits that don\'t serve us. ...<br />\r\n2. Set realistic goals. ...<br />\r\nMake a list of small changes you can make in your daily routine. ...<br />\r\n3. Invest in your health. ...<br />\r\nSurround yourself with people who want to see you do well. ...<br />\r\n4. Be patient with yourself.', 'pimg/Screenshot 2024-02-21 184215.png', 'Debabrata santra', '1711546707462'),
(70, '67', 'ping me📌', 'pimg/Screenshot 2024-02-21 184215.png', 'Debabrata santra', '1712087300069');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `p_u_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_name`, `user_img`, `comment`, `u_email`, `p_u_email`) VALUES
(54, 63, 'radhe debu', 'pimg/1000060164.png', 'radhe radhe', 'd@gmail.com', 'ds2357196@gmail.com'),
(55, 63, 'sbag', 'pimg/20240419_013013.jpg', 'radhe radhe', 's@gmail.com', 'ds2357196@gmail.com'),
(57, 63, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'radhe krishna', 'ds2357196@gmail.com', 'ds2357196@gmail.com'),
(59, 65, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'fbdfgdg', 'ds2357196@gmail.com', 'ds2357196@gmail.com'),
(60, 65, 'connect verse', 'pimg/logo2_prev_ui.png', 'dfdsfsdf', 'cv@gmail.com', 'ds2357196@gmail.com'),
(62, 67, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'thank you team @connectverse', 'ds2357196@gmail.com', 'cv@gmail.com');

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
(54, 'radhedebu_321', 'ds2357196@gmail.com', '07319256047', '$2y$10$Rp9Gx3qfJneGnFFkf6aFSOu9uHx62KBUEwyQ1Sc1klPR.PEvnOeDi', '$2y$10$cFT2SL3kEl8c06Zw8uMiPuXpF5X9helBaLq10/67onBB7s7TDh20q', 'pimg/Screenshot 2024-02-21 184215.png', '', ''),
(55, 'radhe debu', 'd@gmail.com', '123654', '$2y$10$1KrRAt5HKUqHmt6PDVcnW.ioCxxFDUdYeyxEK8CEY4IOJVfMHgjQW', '$2y$10$IPt.OPe7pGWxCnFEk4eu5OzwHMuxmahXzB9P504Y5Q5xoz3Cl3Oy2', 'pimg/1000060164.png', '', ''),
(56, 'sbag', 's@gmail.com', '78854', '$2y$10$9kC526Mb5z4e0eipila8/.QyzUxHlIjbHRrhqdbFT5zvd41pbSXMG', '$2y$10$jNJ1z7CU25KOGPPlulKjTeAA.6lkHDXFcN8l5jBa7/ZhaccN88DPO', 'pimg/20240419_013013.jpg', '', ''),
(57, 'connect verse', 'cv@gmail.com', '123', '$2y$10$PAHvCgh3YlKMzOixhD7JcOQykUDu18yDAoLHofeORbm2.v2HeRirW', '$2y$10$T/ebozmXDKE6ZU8Ngr5zA.EPPjoEDrWDYbxcS6twFPRVbGJJcr2gO', 'pimg/logo2_prev_ui.png', '', ''),
(58, 'radhe cc', 'cc@gmail.com', '4544554', '$2y$10$8yhNjFTXwYq8OtwOdvUY.ebQM3qLWLQpqyPeiqI0eHYulzNFWkWvm', '$2y$10$G2DYEhMlf.r4wCDfN73uoeZnXetosM.b6aezxMeM3QsLUL5X6vOgO', 'pimg/debunew.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `friend_req`
--

CREATE TABLE `friend_req` (
  `id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `req_status` varchar(255) NOT NULL,
  `notification_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend_req`
--

INSERT INTO `friend_req` (`id`, `sender_id`, `receiver_id`, `req_status`, `notification_status`) VALUES
(83, 58, 54, 'friend', 'no'),
(84, 55, 54, 'friend', 'no'),
(85, 56, 54, 'friend', 'no'),
(86, 57, 54, 'friend', 'no'),
(87, 55, 57, 'friend', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `active_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `active_status`) VALUES
(19, 63, 54, 1),
(20, 62, 54, 1),
(21, 49, 55, 1),
(22, 63, 55, 1),
(23, 49, 54, 0),
(24, 61, 54, 0),
(25, 64, 54, 1),
(26, 65, 54, 1),
(27, 65, 57, 0),
(28, 67, 57, 1),
(29, 67, 54, 1);

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
(73, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'good night', 'ds2357196@gmail.com', '09-03-24'),
(74, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'swwet dream\r\n', 'ds2357196@gmail.com', '09-03-24'),
(81, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'hi', 'ds2357196@gmail.com', '26-03-24'),
(83, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'hello', 'ds2357196@gmail.com', '26-03-24'),
(87, 'radhe debu', 'pimg/1000060164.png', 'fdsffsd', 'd@gmail.com', '21-05-24');

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
(49, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/Screenshot 2024-01-12 191819.png', '', 'ds2357196@gmail.com'),
(50, 'radhe debu', 'pimg/1000060164.png', 'mainmedia/PXL_20240313_143312693.MP.jpg', '', 'd@gmail.com'),
(52, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/PXL_20240314_132229187.jpg', '', 'ds2357196@gmail.com'),
(54, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/PXL_20240315_140218587.MP (1).jpg', '', 'ds2357196@gmail.com'),
(55, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/1000060164.png', '', 'ds2357196@gmail.com'),
(56, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/PXL_20240314_131634943.jpg', 'Radhe Radhe ❤️', 'ds2357196@gmail.com'),
(57, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/PXL_20240314_132053466.jpg', 'Life is not about waiting for the storm to pass, but learning to dance in the rain.❤️❤️❤️', 'ds2357196@gmail.com'),
(61, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/community forum.png', '', 'ds2357196@gmail.com'),
(62, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/20240204_192800.jpg', 'Radhe Radhe ❤️ Hare Krishna ?', 'ds2357196@gmail.com'),
(63, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/peakpx.jpg', '', 'ds2357196@gmail.com'),
(64, 'sbag', 'pimg/20240419_013013.jpg', 'mainmedia/v2.mp4', 'In my own universe ❤️ #connectverse', 's@gmail.com'),
(65, 'radhedebu_321', 'pimg/Screenshot 2024-02-21 184215.png', 'mainmedia/v1.mp4', '', 'ds2357196@gmail.com'),
(67, 'connect verse', 'pimg/logo2_prev_ui.png', 'mainmedia/PXL_20240313_045708035.jpg', 'In my own universe ❤️ #connectverse', 'cv@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(255) NOT NULL,
  `ques` longtext NOT NULL,
  `u_nam` varchar(255) NOT NULL,
  `u_im` varchar(255) NOT NULL,
  `post_a_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `ques`, `u_nam`, `u_im`, `post_a_time`) VALUES
(65, 'tell me road map of dsa?<br />\r\n', 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', '1711546508493'),
(66, 'how to make yourself perfect?<br />\r\n', 'radhe debu', 'pimg/1000060164.png', '1711546662402'),
(67, 'Hi, community!!!', 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', '1712087286238'),
(68, 'hi', 'Debabrata santra', 'pimg/Screenshot 2024-02-21 184215.png', '1712133007943');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demodata`
--
ALTER TABLE `demodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_req`
--
ALTER TABLE `friend_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `demodata`
--
ALTER TABLE `demodata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `friend_req`
--
ALTER TABLE `friend_req`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mailtable`
--
ALTER TABLE `mailtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `main_content`
--
ALTER TABLE `main_content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
