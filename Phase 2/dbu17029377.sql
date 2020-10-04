-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2020 at 02:08 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbu17029377`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_comments`
--

CREATE TABLE `image_comments` (
  `username` varchar(100) NOT NULL,
  `picname` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_comments`
--

INSERT INTO `image_comments` (`username`, `picname`, `comment`, `id`, `time`) VALUES
('MTSchoeman', 'img_parallax.jpg', '', 33, '2020-10-03 13:17:58'),
('MTSchoeman', 'img_parallax2.jpg', 'Must have been cold', 34, '2020-10-03 13:23:42'),
('MTSchoeman', 'img_parallax3.jpg', 'That looks unreal O_O', 35, '2020-10-04 14:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `userimages`
--

CREATE TABLE `userimages` (
  `image_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picname` varchar(50) NOT NULL,
  `hashtag` varchar(100) NOT NULL,
  `i_description` char(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userimages`
--

INSERT INTO `userimages` (`image_id`, `email`, `date`, `picname`, `hashtag`, `i_description`, `username`) VALUES
(4, 'shoffen@gmail.com', '2020-09-09 16:55:35', 'ht1.jfif', '#Vakansie', 'Hartenbos, hier kom ek', 'SHoffen'),
(5, 'shoffen@gmail.com', '2020-09-09 16:55:35', 'hartenboz.jfif', '#Strand', 'Lekker sonskuin', 'SHoffen'),
(170, 'matsch@gmail.com', '2020-10-04 13:17:00', 'road.jpg', '#driving', 'Long drive home :(', 'MTSchoeman'),
(171, 'matsch@gmail.com', '2020-10-04 13:59:11', 'img_parallax4.jpg', '#FarmLife', 'Going for a morning walk', 'MTSchoeman'),
(172, 'matsch@gmail.com', '2020-10-04 14:01:55', 'img_parallax3.jpg', '#3D', 'My new render', 'MTSchoeman');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `fname` char(100) NOT NULL,
  `lname` char(100) NOT NULL,
  `pword` char(100) NOT NULL,
  `email` char(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profilepic` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`fname`, `lname`, `pword`, `email`, `username`, `user_id`, `profilepic`) VALUES
('Matthew', 'Schoeman', 'Pancakes#1', 'matsch@gmail.com', 'MTSchoeman', 1, 'logo6.png'),
('Stephan', 'Hoffen', 'Hartenbos', 'shoffen@gmail.com', 'SHoffen', 2, 'game_icon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_comments`
--
ALTER TABLE `image_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userimages`
--
ALTER TABLE `userimages`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_comments`
--
ALTER TABLE `image_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `userimages`
--
ALTER TABLE `userimages`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
