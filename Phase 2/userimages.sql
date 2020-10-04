-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2020 at 02:06 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userimages`
--
ALTER TABLE `userimages`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userimages`
--
ALTER TABLE `userimages`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
