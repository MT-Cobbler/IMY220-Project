-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 09:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `picname` varchar(50) NOT NULL,
  `imagename` varchar(150) NOT NULL,
  `hashtag` varchar(100) NOT NULL,
  `i_description` char(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userimages`
--

INSERT INTO `userimages` (`image_id`, `email`, `date`, `picname`, `imagename`, `hashtag`, `i_description`, `album`, `username`) VALUES
(1, 'matsch@gmail.com', '2020-09-09 14:45:33', 'img_parallax.jpg', '', '#cool', 'Caught this on my trip', '', 'MTSchoeman'),
(2, 'matsch@gmail.com', '2020-09-09 14:49:16', 'img_parallax2.jpg', '', '#lucky', 'Accidentally stumbled here', '', 'MTSchoeman'),
(4, 'shoffen@gmail.com', '2020-09-09 16:55:35', 'ht1.jfif', '', '#Vakansie', 'Hartenbos, hier kom ek', '', 'SHoffen'),
(5, 'shoffen@gmail.com', '2020-09-09 16:55:35', 'hartenboz.jfif', '', '#Strand', 'Lekker sonskuin', '', 'SHoffen');

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
