-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 01:23 PM
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
  `min_cost` int(11) DEFAULT NULL,
  `max_cost` int(11) DEFAULT NULL,
  `deliverables` varchar(200) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`listing_no`, `user_id`, `Type`, `Title`, `genre`, `starcast`, `synopsis`, `Release_date`, `min_cost`, `max_cost`, `deliverables`, `link`, `image`) VALUES
(7, 2, 'Out_Film', 'mj', 'nn', 'nn', 'nn', '2021-04-10', 0, 0, '', 'w', NULL),
(8, 2, 'In_Film', 'mj', 'nn', 'nn', 'nn', '2021-04-10', 0, 0, '', 'wuu', NULL),
(9, 2, 'In_Film', 'mj', 'nn', 'nn', 'nn', '2021-04-10', 0, 0, '', 'wuu', NULL),
(10, 2, 'Out_Film', 'mj', 'abc', 'abc', 'nac', '2021-05-08', 123, 123, '', 'www.', ''),
(11, 2, 'Out_Film', 'mj', 'abc', 'abc', 'nac', '2021-05-08', 123, 123, '', 'www.', ''),
(12, 2, 'Out_Film', 'amj', 'thriller', 'srk', 'Rom-com', '2021-05-06', 123, 123, '', 'www.abc.com', NULL),
(13, 2, 'In_Film', '', '', '', '', '0000-00-00', 0, 0, '', '', 'WIN_20201106_16_54_31_Pro.jpg'),
(14, 2, 'Out_Film', 'abcs', 'thriller', 'srk', '123', '2021-04-22', 123, 123, '', 'abc.com', 'Screenshot 2020-11-10 105722.p'),
(15, 2, 'Out_Film', 'mj', 'nn', 'srk', 'abc', '2021-04-29', 123, 123, '', 'www.abc.com', 'header-bg21132.jpg'),
(18, 2, 'In_Film', 'main hoo na', 'romance,drama', 'shahrukh khan', 'something something blah blah', '2021-04-30', 900000, 10000000, '', 'https://www.youtube.com/watch?', 'julycollage .png'),
(19, 2, 'Out_Film', 'Roohi', 'Thirller', 'Rajkumar Rao', 'blaaaaah', '2021-04-21', 334444, 555666, '', 'https://www.youtube.com/watch?v=BDBpX6P7u9E', 'beagul.jpg'),
(20, 2, 'Out_Film', 'aaaaa', 'bad', 'you', 'la la la', '2021-04-24', 1, 2, '', 'https://www.youtube.com/v/BDBpX6P7u9E', 'cat.jpg'),
(21, 2, 'In_Film', 'bbbb', 'romance,drama', 'shahrukh khan', 'bbbbbb', '2021-04-23', 3, 4, '', 'https://www.youtube.comembed//watch?v=BDBpX6P7u9E', 'img.jpg'),
(22, 2, 'In_Film', 'gggggg', 'Thirller', 'Rajkumar Rao', 'gggggg', '2021-04-23', 777, 888, '', 'https://www.youtube.com/embed/watch?v=BDBpX6P7u9E', 'image.jpg'),
(23, 2, 'Out_Film', 'Roohi 2', 'romance,drama', 'Rajkumar Rao', 'fjtrkftk', '2021-04-21', 7, 90, '', 'https://www.youtube.com/embed/watch?v=mTT_V0t89MI', 'labrador.jpg'),
(24, 2, 'Out_Film', 'ROOOHI', 'Thirller', 'Rajkumar Rao', 'BSFFAA', '2021-04-25', 444, 66666, '', '', 'image.jpg'),
(25, 2, 'In_Film', 'film', 'bad', 'you', 'fgreheawb', '2021-04-23', 7, 90, '', 'mTT_V0t89MI', 'beagul.jpg'),
(26, 2, 'Out_Film', 'Stree', 'Horror,Comedy', 'Rajkumar Rao,Kriti Sanon', 'synopsis', '2021-04-29', 88, 99, 'some deliverables', 'PkgStlsVaqw', 'pug.jpg'),
(36, 3, 'In_Film', 'birdman', 'Drama/Romance', 'Edward Norton', 'gbgfbd', '2021-04-15', 334444, 10000000, 'fgfszd', 'uJfLoE6hanc', 'img.jpg');

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
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-09 16:28:07', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-10 07:19:59', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-10 07:21:20', 'Active'),
(2, 'aditi6301@gmail.com', 'Puma', '2021-04-10 08:25:02', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-12 07:18:49', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-13 07:48:03', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-13 09:34:11', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-13 09:37:18', 'Active');

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
(2, 'Production', 'Aditi', 'Joshi', 'Puma', 'abc', 'aditi6301@gmail.com', '$2y$10$9RGIZ7BX0sx29Rf7H/NNE.F6iPmnUCz4AjCihnfp17ONafYPbWkRC', 2, 'No'),
(3, 'Brand', 'Shreya', 'k', 'Puma', 'abc', 'shreyakedia149@gmail.com', '$2y$10$Ikdejj/6W70kRxIOWYLNm.aRKb781qOZq9C7zsy3WRbF6zUmQOBji', 69, 'Yes'),
(4, 'Brand', 'Nishant', 'B', 'shalimar', 'dick', 'nishantbhavsar1503@gmail.com', NULL, 9271630705, 'Yes');

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
  MODIFY `listing_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
