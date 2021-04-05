-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 12:17 PM
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
(3, 'shreyakedia149@gmail.com', '', '2021-04-05 09:46:45', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 09:48:36', 'Active'),
(3, 'shreyakedia149@gmail.com', '', '2021-04-05 09:51:12', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 09:52:11', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 09:54:57', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 09:59:55', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 10:06:08', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 10:07:10', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 10:08:16', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 10:08:47', 'Active'),
(3, 'shreyakedia149@gmail.com', 'Puma', '2021-04-05 10:09:05', 'Active');

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
(2, 'Brand', 'Aditi', 'Joshi', 'Puma', 'abc', 'aditi6301@gmail.com', NULL, 2, 'No'),
(3, 'Brand', 'Shreya', 'k', 'Puma', 'abc', 'shreyakedia149@gmail.com', '$2y$10$Qj9rvt4DRsTlunlJkme/r.bmtlNiXfH01iv7etW84FJcR58xroOAK', 69, 'Yes');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
