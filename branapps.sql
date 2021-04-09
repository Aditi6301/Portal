-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 06:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `branapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `listing_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `starcast` varchar(30) DEFAULT NULL,
  `synopsis` varchar(200) DEFAULT NULL,
  `Release_date` date DEFAULT NULL,
  `min_cost` varchar(30) DEFAULT NULL,
  `max_cost` varchar(30) DEFAULT NULL,
  `link` varchar(30) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`listing_no`, `user_id`, `Type`, `Title`, `genre`, `starcast`, `synopsis`, `Release_date`, `min_cost`, `max_cost`, `link`, `image`) VALUES
(7, 2, 'Out_Film', 'mj', 'nn', 'nn', 'nn', '2021-04-10', 'n', 'nn', 'w', NULL),
(8, 2, 'In_Film', 'mj', 'nn', 'nn', 'nn', '2021-04-10', 'n', 'nn', 'wuu', NULL),
(9, 2, 'In_Film', 'mj', 'nn', 'nn', 'nn', '2021-04-10', 'n', 'nn', 'wuu', NULL),
(10, 2, 'Out_Film', 'mj', 'abc', 'abc', 'nac', '2021-05-08', '123', '123', 'www.', ''),
(11, 2, 'Out_Film', 'mj', 'abc', 'abc', 'nac', '2021-05-08', '123', '123', 'www.', ''),
(12, 2, 'Out_Film', 'amj', 'thriller', 'srk', 'Rom-com', '2021-05-06', '123', '123', 'www.abc.com', NULL),
(13, 2, 'In_Film', '', '', '', '', '0000-00-00', '', '', '', 'WIN_20201106_16_54_31_Pro.jpg'),
(14, 2, 'Out_Film', 'abcs', 'thriller', 'srk', '123', '2021-04-22', '123', '123', 'abc.com', 'Screenshot 2020-11-10 105722.p'),
(15, 2, 'Out_Film', 'mj', 'nn', 'srk', 'abc', '2021-04-29', '123', '123', 'www.abc.com', 'header-bg21132.jpg'),
(16, 3, 'Out_Film', 'friends', 'comedy', 'jennifer aniston', 'abcd', '2021-04-16', '123', '455', 'abc.com', 'Blue-Background-With-Hand-Draw'),
(17, 3, 'Out_Film', 'amj', 'thriller', 'jennifer aniston', '123', '2021-04-24', '123', '123', 'www.', 'Blue-Background-With-Hand-Draw');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` enum('Active','Unactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `Email`, `CompanyName`, `login_time`, `user_status`) VALUES
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-08 14:52:18', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-08 16:44:01', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-09 05:49:09', 'Active'),
(2, 'aditi6301@gmail.com', 'Puma', '2021-04-09 06:37:17', 'Active'),
(2, 'aditi6301@gmail.com', 'Puma', '2021-04-09 07:08:13', 'Active'),
(2, 'aditi6301@gmail.com', 'Puma', '2021-04-09 07:24:06', 'Active'),
(2, 'aditi6301@gmail.com', 'Puma', '2021-04-09 15:08:54', 'Active'),
(2, 'aditi6301@gmail.com', 'Puma', '2021-04-09 16:08:57', 'Active'),
(2, 'aditi6301@gmail.com', 'Puma', '2021-04-09 16:20:52', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-09 16:23:31', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-09 16:28:07', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Type` enum('Brand','Production','Admin') NOT NULL,
  `First name` varchar(20) NOT NULL,
  `Last name` varchar(20) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Phone` bigint(20) NOT NULL,
  `Verified` varchar(5) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Type`, `First name`, `Last name`, `CompanyName`, `Designation`, `Email`, `password`, `Phone`, `Verified`) VALUES
(1, 'Brand', 'Nidhi', 'Abhyankar', 'Puma', 'abc', 'nidhiabhyankar@gmail.com', NULL, 123344, 'Yes'),
(2, 'Brand', 'Aditi', 'Joshi', 'Puma', 'abc', 'aditi6301@gmail.com', '$2y$10$9RGIZ7BX0sx29Rf7H/NNE.F6iPmnUCz4AjCihnfp17ONafYPbWkRC', 2, 'No'),
(3, 'Brand', 'Shreya', 'k', 'Puma', 'abc', 'shreyakedia149@gmail.com', '$2y$10$Ikdejj/6W70kRxIOWYLNm.aRKb781qOZq9C7zsy3WRbF6zUmQOBji', 69, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`listing_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `listing_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listing`
--
ALTER TABLE `listing`
  ADD CONSTRAINT `listing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
