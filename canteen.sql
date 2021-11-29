-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2021 at 04:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `item_name` varchar(30) DEFAULT NULL,
  `price` int(100) NOT NULL,
  `Include` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`item_name`, `price`, `Include`) VALUES
('Parota', 10, 1),
('Pongal', 25, 0),
('icecream', 15, 1),
('juice', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `username` varchar(20) NOT NULL,
  `item_name` varchar(10) NOT NULL,
  `item_qty` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`username`, `item_name`, `item_qty`, `timestamp`, `Status`, `Order_id`) VALUES
('sanjay', 'Pongal', 5, '2021-08-18 16:20:23', 1, 36),
('sanjay', 'Poori', 1, '2021-08-18 17:55:41', 1, 38),
('sanjaykumar_s', 'Parota', 3, '2021-08-19 04:59:42', 0, 41),
('sanjay', 'Parota', 2, '2021-08-19 08:13:44', 1, 42),
('sanjay', 'Parota', 1, '2021-08-19 08:44:18', 1, 43),
('sanjay', 'icecream', 1, '2021-08-19 08:44:18', 1, 44),
('sanjay', 'Parota', 1, '2021-08-19 09:34:38', 1, 45),
('sanjay', 'Poori', 2, '2021-08-19 09:34:38', 0, 46),
('sanjay', 'Parota', 1, '2021-08-26 16:06:28', 1, 47),
('sanjay', 'juice', 10, '2021-08-26 16:06:28', 1, 48),
('sanjay', 'Parota', 10, '2021-08-26 16:10:54', 1, 49),
('sanjay', 'Parota', 10, '2021-08-26 16:15:13', 1, 50),
('sanjay', 'Parota', 10, '2021-08-26 16:16:23', 1, 51),
('sanjay', 'Parota', 1, '2021-08-26 16:17:28', 0, 52),
('sanjay', 'Parota', 10, '2021-08-26 16:22:41', 1, 53),
('sanjay', 'Poori', 5, '2021-08-26 16:22:41', 1, 54),
('sanjay', 'icecream', 60, '2021-08-26 16:22:41', 1, 55),
('sanjay', 'juice', 12, '2021-08-26 16:22:41', 1, 56),
('sanjay', 'Parota', 10, '2021-08-26 16:27:26', 1, 57),
('sanjay', 'Parota', 2, '2021-08-27 08:17:00', 1, 58),
('sanjay', 'Parota', 2, '2021-08-27 08:24:52', 1, 59),
('sanjay', 'Parota', 3, '2021-08-27 09:35:15', 0, 60),
('sanjay', 'Parota', 10, '2021-09-07 02:31:25', 1, 61),
('sanjay', 'juice', 5, '2021-09-07 02:31:25', 1, 62),
('sanjay', 'icecream', 15, '2021-09-07 16:59:06', 1, 63);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `credit_amount` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `type`, `credit_amount`) VALUES
('admin', 'admin', 1, 0),
('sanjay', 'sanjay', 0, 1062),
('sanjaykumar_s', 'admin', 0, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
