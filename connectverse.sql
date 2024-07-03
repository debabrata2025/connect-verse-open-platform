-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 09:28 AM
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
(65, 77, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'fantastic video ', 'a@gmail.com', 'f@gmail.com'),
(66, 76, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'that\'s right...', 'a@gmail.com', 'h@gmail.com'),
(67, 75, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'osm view', 'a@gmail.com', 's@gmail.com'),
(68, 74, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'good shot 😍😌', 'a@gmail.com', 'annable@gmail.com'),
(69, 71, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'VR is most exiting tech.', 'a@gmail.com', 'ser@gmail.com'),
(70, 70, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'great', 'a@gmail.com', 'james@gmail.com'),
(71, 68, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'welcome here 💕', 'a@gmail.com', 'ram@gmail.com'),
(72, 77, 'James', 'pimg/2.png', 'good video', 'james@gmail.com', 'f@gmail.com'),
(73, 76, 'James', 'pimg/2.png', '❤️❤️❤️', 'james@gmail.com', 'h@gmail.com'),
(74, 75, 'James', 'pimg/2.png', '😍', 'james@gmail.com', 's@gmail.com'),
(75, 74, 'James', 'pimg/2.png', 'nice view ❤️', 'james@gmail.com', 'annable@gmail.com'),
(76, 73, 'James', 'pimg/2.png', 'my fav ❤️', 'james@gmail.com', 'a@gmail.com'),
(77, 72, 'James', 'pimg/2.png', 'adventourous ✌️✌️', 'james@gmail.com', 'ram@gmail.com'),
(78, 71, 'James', 'pimg/2.png', 'good tech', 'james@gmail.com', 'ser@gmail.com'),
(79, 69, 'James', 'pimg/2.png', 'wow !!!', 'james@gmail.com', 's@gmail.com'),
(80, 68, 'James', 'pimg/2.png', 'thx and welcome here 👍', 'james@gmail.com', 'ram@gmail.com'),
(81, 77, 'Harry', 'pimg/5.png', 'pleasent view 😌😌😌', 'h@gmail.com', 'f@gmail.com'),
(82, 75, 'Harry', 'pimg/5.png', 'love it ❤️', 'h@gmail.com', 's@gmail.com'),
(83, 73, 'Harry', 'pimg/5.png', 'both are professional 📌', 'h@gmail.com', 'a@gmail.com'),
(84, 71, 'Harry', 'pimg/5.png', 'I hav one .', 'h@gmail.com', 'ser@gmail.com'),
(85, 69, 'Mr. Ram', 'pimg/4.png', 'Good picture 💓', 'ram@gmail.com', 's@gmail.com'),
(86, 70, 'Mr. Ram', 'pimg/4.png', 'Fabulous 👍', 'ram@gmail.com', 'james@gmail.com'),
(87, 72, 'Mr. Ram', 'pimg/4.png', 'Great job 👍', 'ram@gmail.com', 'ram@gmail.com'),
(88, 73, 'Mr. Ram', 'pimg/4.png', 'Yes 😊', 'ram@gmail.com', 'a@gmail.com'),
(89, 75, 'Mr. Ram', 'pimg/4.png', 'I wish to sleep in a filed seeing the night sky ✨✨✨', 'ram@gmail.com', 's@gmail.com'),
(90, 78, 'Harry', 'pimg/5.png', '💕💕💕', 'h@gmail.com', 'ram@gmail.com'),
(91, 78, 'seriyan', 'pimg/10.png', '❤️', 'ser@gmail.com', 'ram@gmail.com'),
(92, 77, 'seriyan', 'pimg/10.png', 'sea my place of peace 😌', 'ser@gmail.com', 'f@gmail.com'),
(93, 76, 'seriyan', 'pimg/10.png', '@follow my account ...', 'ser@gmail.com', 'h@gmail.com'),
(94, 74, 'seriyan', 'pimg/10.png', 'that turtule is very lucky', 'ser@gmail.com', 'annable@gmail.com'),
(95, 78, 'annable', 'pimg/9.png', '@connect verse 📌', 'annable@gmail.com', 'ram@gmail.com'),
(96, 77, 'annable', 'pimg/9.png', 'that returns evey thing in a big term 💕', 'annable@gmail.com', 'f@gmail.com'),
(97, 75, 'annable', 'pimg/9.png', 'i love too..', 'annable@gmail.com', 's@gmail.com'),
(98, 74, 'annable', 'pimg/9.png', 'how was the post guys!!!', 'annable@gmail.com', 'annable@gmail.com'),
(99, 71, 'annable', 'pimg/9.png', 'good but has more side effects', 'annable@gmail.com', 'ser@gmail.com'),
(100, 71, 'Sophia', 'pimg/8.png', 'guys floow me ...', 'sophia@gmail.com', 'ser@gmail.com'),
(101, 80, 'Sophia', 'pimg/8.png', 'Congratulations 🎉🎉🎉', 'sophia@gmail.com', 'ram@gmail.com'),
(102, 79, 'Mr. Ram', 'pimg/4.png', 'congrats !!!', 'ram@gmail.com', 'sophia@gmail.com'),
(103, 80, 'syam', 'pimg/6.png', 'congrats ..✌️✌️✌️', 's@gmail.com', 'ram@gmail.com'),
(104, 79, 'syam', 'pimg/6.png', 'congrats ..✌️✌️✌️', 's@gmail.com', 'sophia@gmail.com'),
(105, 80, 'foxypro', 'pimg/fox.jpg', 'congrats ❤️👍', 'f@gmail.com', 'ram@gmail.com'),
(106, 79, 'foxypro', 'pimg/fox.jpg', 'congrats .', 'f@gmail.com', 'sophia@gmail.com'),
(107, 78, 'Mr. Ram', 'pimg/4.png', 'bba', 'ram@gmail.com', 'ram@gmail.com');

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
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `q_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demodata`
--

INSERT INTO `demodata` (`id`, `name`, `email`, `phone`, `password`, `cpassword`, `image`, `description`, `status`, `q_status`) VALUES
(62, 'Mr. Ram', 'ram@gmail.com', '123654', '$2y$10$nST1/reIgR7Gn9z5E0soy.NvWuNk9g.2WSOoo3JWu3/fKvAsr8dSa', '$2y$10$duV4ENGp1g5Lo0fr0g1dredxR7VfK6dHyXQWT.b3Avq0AFuk3.QVy', 'pimg/4.png', 'Believe you can and you\'re halfway there.', 'public', 1),
(63, 'James', 'james@gmail.com', '123', '$2y$10$fXKfWb982dQxjvkgZMiUBeronbQVQ2s5oJtLpQiz0flIicjPkLtjq', '$2y$10$WboOm8b4rTXh4XD4Lcp2ru9o2jmf74TJhALJW0IthokoZkUh8Ye7m', 'pimg/2.png', 'Beauty begins the moment you decide to be yourself.', 'public', 1),
(64, 'Alexander', 'a@gmail.com', '123', '$2y$10$qKuevqWh/YCOCh8JIM9DTudGHnw9AP7UVNo19oOTM.kyldwGz6Ot2', '$2y$10$ciojpr.XTiaWWtNffFY.2ub3Y0aoyVsD.67GNxCdjTdRdtajbBTmq', 'pimg/Screenshot 2024-06-18 143314.png', 'To travel is to live.', 'public', 1),
(65, 'Harry', 'h@gmail.com', '123', '$2y$10$yP4JFux9Il3ktJfKP931iOxR2lFbsR3SWn43k/0exbjjlk0mZwEhy', '$2y$10$bvBbTuYJZ.mchPBPxwJAM.ord.Hnx50vTWySjPai3ftkEue.tR3jO', 'pimg/5.png', '', 'public', 1),
(66, 'syam', 's@gmail.com', '123', '$2y$10$w6Er7SHlpZg3SLbia8Jq3.1XeGNca2cBYynoOmfXmqRSuPLAsXWhu', '$2y$10$TAJw8yZrAL0RWAxeMPAEpukD8AV0hYw2L/vKYGipecxUyAcEin2Ya', 'pimg/6.png', '', 'public', 1),
(67, 'seriyan', 'ser@gmail.com', '123', '$2y$10$Nkamv8mqW.EmdUP98Iti8usU8vv6cUHJwPshFimknNxmntxoXIJaS', '$2y$10$dUGi0gnVDhiI.F92SP7xLOWQziG1.PmdpJh0RO7T/b30lSDhsTIDW', 'pimg/10.png', 'Who needs a gym when you have a jungle to prowl?', 'public', 1),
(68, 'foxypro', 'f@gmail.com', '123', '$2y$10$0aaFiudmulM.TTzE3wcwiOLJaGOKRHs5.muMKKB3TJxbABhU06xMu', '$2y$10$xu4MLACaL/zgY02/rZvzsOASIWc.F3IsBOJNVwMQlj.qM84fR95Rq', 'pimg/fox.jpg', 'If you think I\'m sneaky, wait until you see my dance moves!', 'public', 1),
(69, 'annable', 'annable@gmail.com', '123654', '$2y$10$q0ACcTRjU7/nEFZ6v47buONPDIZG7g1BiW4Zh9Kh/wtPkFn6dcR4K', '$2y$10$SnOAibq3T0OleWsdCM/Gk.h9eNNzJ.KnD86NX9NSBH3Tcdv1HBLTC', 'pimg/9.png', 'To love and be loved is to feel the sun from both sides.', 'public', 1),
(70, 'Sophia', 'sophia@gmail.com', '123', '$2y$10$QSmrC8/sPtBnmFDNKuMnXe9In3SLZeBDCccFy3jrhTEJr2juVr5Q.', '$2y$10$kWZTe2k6KIyFFFDhwygV2.m1g7BS9qwN4IVpedBUJgNMXyYHF5nRu', 'pimg/8.png', '', 'public', 1),
(71, 'Connect Verse', 'cv@gmail.com', '123321', '$2y$10$2Nu9bjqwiz2ntBEXe1hynutaoap15joQQYU/2Tu1LyG7EYftdOLWC', '$2y$10$G3wWViq4X9eB/kNqJq.Llepj0ariOd308/fbpuiwHzf0oPG.m/UE6', 'pimg/logo2_prev_ui.png', '', 'public', 0);

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
(132, 68, 62, 'friend', 'no'),
(133, 64, 62, 'friend', 'no'),
(134, 63, 62, 'friend', 'no'),
(135, 65, 62, 'friend', 'no'),
(136, 67, 62, 'friend', 'no'),
(137, 70, 62, 'friend', 'no'),
(138, 64, 70, 'friend', 'no'),
(139, 63, 70, 'friend', 'no'),
(140, 63, 68, 'friend', 'yes'),
(141, 63, 65, 'friend', 'yes'),
(142, 63, 66, 'friend', 'yes'),
(143, 65, 70, 'friend', 'yes'),
(144, 65, 68, 'friend', 'yes'),
(145, 65, 66, 'friend', 'yes'),
(146, 65, 69, 'friend', 'no'),
(147, 65, 67, 'friend', 'yes'),
(148, 69, 70, 'friend', 'no'),
(149, 69, 68, 'friend', 'no'),
(150, 68, 70, 'friend', 'no');

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
(30, 73, 69, 1),
(31, 72, 69, 1),
(32, 71, 69, 1),
(33, 70, 69, 1),
(34, 69, 69, 1),
(35, 68, 69, 1),
(36, 75, 65, 1),
(37, 74, 65, 1),
(38, 73, 65, 1),
(39, 72, 65, 1),
(40, 71, 65, 1),
(41, 70, 65, 1),
(42, 69, 65, 1),
(43, 68, 65, 1),
(44, 77, 63, 1),
(45, 76, 63, 1),
(46, 75, 63, 1),
(47, 74, 63, 1),
(48, 73, 63, 1),
(49, 72, 63, 1),
(50, 71, 63, 1),
(51, 70, 63, 1),
(52, 69, 63, 1),
(53, 68, 63, 1),
(54, 77, 65, 1),
(55, 76, 65, 1),
(56, 74, 62, 1),
(57, 75, 62, 1),
(58, 76, 62, 1),
(59, 77, 62, 1),
(60, 73, 62, 1),
(61, 72, 62, 1),
(62, 71, 62, 1),
(63, 70, 62, 1),
(64, 69, 62, 1),
(65, 68, 62, 1),
(66, 78, 65, 1),
(67, 78, 67, 1),
(68, 73, 67, 1),
(69, 72, 67, 1),
(70, 71, 67, 1),
(71, 70, 67, 1),
(72, 69, 67, 1),
(73, 68, 67, 1),
(74, 77, 69, 1),
(75, 78, 69, 1),
(76, 76, 69, 1),
(77, 75, 69, 1),
(78, 78, 70, 1),
(79, 77, 70, 1),
(80, 76, 70, 1),
(81, 75, 70, 1),
(82, 74, 70, 1),
(83, 73, 70, 1),
(84, 72, 70, 1),
(85, 71, 70, 1),
(86, 70, 70, 1),
(87, 69, 70, 1),
(88, 68, 70, 1),
(89, 79, 62, 1),
(90, 79, 64, 1),
(91, 78, 64, 1),
(92, 77, 64, 1),
(93, 76, 64, 1),
(94, 75, 64, 1),
(95, 74, 64, 1),
(96, 73, 64, 1),
(97, 72, 64, 1),
(98, 71, 64, 1),
(99, 70, 64, 1),
(100, 69, 64, 1),
(101, 68, 64, 1),
(102, 79, 63, 1),
(103, 78, 63, 1),
(104, 80, 62, 1),
(105, 80, 70, 1),
(106, 81, 62, 0);

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
(88, 'Sophia', 'pimg/8.png', 'Hello, people what\'s up...', 'sophia@gmail.com', '18-06-24'),
(89, 'Mr. Ram', 'pimg/4.png', 'Hi, sophia welcome here...', 'ram@gmail.com', '18-06-24');

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
(68, 'Mr. Ram', 'pimg/4.png', 'mainmedia/1.jpg', 'Welcome Guys !!! ', 'ram@gmail.com'),
(69, 'syam', 'pimg/6.png', 'mainmedia/aarn-giri-IBhsB71R97k-unsplash.jpg', 'Change the world by being yourself.??', 's@gmail.com'),
(70, 'James', 'pimg/2.png', 'mainmedia/leo_visions-dTJISDQZ1y4-unsplash.jpg', 'Hope is being able to see that there is light despite all of the darkness.?❤️', 'james@gmail.com'),
(71, 'seriyan', 'pimg/10.png', 'mainmedia/Screenshot 2024-06-18 162421.png', 'With VR, you’re creating a world where anything is possible. ❤️', 'ser@gmail.com'),
(72, 'Mr. Ram', 'pimg/4.png', 'mainmedia/jordan-sanchez-sLraJyotfeY-unsplash.jpg', 'Live your life by a compass not a clock.❤️', 'ram@gmail.com'),
(73, 'Alexander', 'pimg/Screenshot 2024-06-18 143314.png', 'mainmedia/marjan-taghipour-jrqqBsvPYV0-unsplash.jpg', 'Black and white creates a strange dreamscape that color never can.', 'a@gmail.com'),
(74, 'annable', 'pimg/9.png', 'mainmedia/35427-407130886_small.mp4', 'that view ?', 'annable@gmail.com'),
(75, 'syam', 'pimg/6.png', 'mainmedia/beautiful-2297208_1280.jpg', 'I often think that the night is more alive and more richly colored than the day.  ❤️?', 's@gmail.com'),
(76, 'Harry', 'pimg/5.png', 'mainmedia/xr-7499160_1280.jpg', 'The most powerful area ever ...', 'h@gmail.com'),
(77, 'foxypro', 'pimg/fox.jpg', 'mainmedia/198488-907576442_small.mp4', 'Individually, we are one drop. Together, we are an ocean.', 'f@gmail.com'),
(78, 'Mr. Ram', 'pimg/4.png', 'mainmedia/IMG_20231120_143924_156.jpg', 'maa durga ❤️?', 'ram@gmail.com'),
(79, 'Sophia', 'pimg/8.png', 'mainmedia/IMG_20240524_132911_007.jpg', 'New swags from gcloud study jam?', 'sophia@gmail.com'),
(80, 'Mr. Ram', 'pimg/4.png', 'mainmedia/1708516948419.jpeg', 'Finally, I received my Google Cloud Study Jam swags! ❤️? ', 'ram@gmail.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  `story_p` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `username`, `email`, `userimg`, `story_p`, `created_at`) VALUES
(40, 'Mr. Ram', 'ram@gmail.com', 'pimg/4.png', 'story/debunew.jpg', 1719941094),
(41, 'syam', 's@gmail.com', 'pimg/6.png', 'story/1000060164.png', 1719941573),
(42, 'Mr. Ram', 'ram@gmail.com', 'pimg/4.png', 'story/PXL_20231226_131155644.jpg', 1719943858),
(43, 'Mr. Ram', 'ram@gmail.com', 'pimg/4.png', 'story/PXL_20231227_042457414.jpg', 1719944034),
(44, 'syam', 's@gmail.com', 'pimg/6.png', 'story/PXL_20240314_125135097.jpg', 1719946117),
(45, 'Mr. Ram', 'ram@gmail.com', 'pimg/4.png', 'story/PXL_20231227_053208164.jpg', 1719946192),
(46, 'syam', 's@gmail.com', 'pimg/6.png', 'story/PXL_20240314_135003671.jpg', 1719946224),
(47, 'Mr. Ram', 'ram@gmail.com', 'pimg/4.png', 'story/PXL_20231227_034335645.jpg', 1719946321);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `device_info` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `log_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `session_id`, `device_info`, `location`, `log_time`) VALUES
(96, 70, '4d2bbaf1694d09fc7cfd9e28d7f31cc9', 'Android', '', '6/18/2024, 5:23:56 PM'),
(105, 68, 'af8cd328dc700e8c90124f21a7836d22', 'Windows', '', '6/18/2024, 5:42:28 PM'),
(106, 62, 'cd9d0e0c6432f223b5642904ee95fcbc', 'Windows', 'Dum Dum', '6/21/2024, 1:29:48 PM'),
(107, 64, 'd979fb685979215cb93b900174048959', 'Windows', 'Dum Dum', '6/21/2024, 1:33:47 PM'),
(108, 62, '67cc6ac77fbcf8a9d6f9deab961a57ce', 'Windows', 'Nalhāti', '6/27/2024, 11:10:23 PM'),
(110, 64, 'e1614d1ceb8de36a5512d7a50f59519c', 'Windows', 'Nalhāti', '6/29/2024, 10:12:31 PM'),
(111, 66, '135f95d6ee4f6b2075397cf4996026a0', 'Windows', 'West Bengal', '7/2/2024, 11:01:33 PM');

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
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `demodata`
--
ALTER TABLE `demodata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `friend_req`
--
ALTER TABLE `friend_req`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `mailtable`
--
ALTER TABLE `mailtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `main_content`
--
ALTER TABLE `main_content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
