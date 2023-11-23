-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 01:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp_secret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `otp_secret`) VALUES
(1, 'admin', '$2y$10$p7YwxVul8K//0wFSh.ITsOkuwFuT7yeiZxvNBS2tamBFsrMiMX6zS', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `guests` varchar(255) NOT NULL,
  `available` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `roomname`, `guests`, `available`) VALUES
(1, 'Single Bedroom', '1', 'YES'),
(2, 'Double Bedroom', '2', 'YES'),
(3, 'Deluxe Bedroom	', '5 - 7', 'YES'),
(4, 'Family Bedroom', '6', 'YES'),
(8, 'Random', '2', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `roomnum` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomnum`, `price`, `category_id`) VALUES
(1, 'Room 101', '200', '2'),
(2, 'Room 202', '255', '2'),
(3, 'Room 301', '550', '2'),
(4, 'Room 221', '320', '4'),
(5, 'Room 313', '420', '3'),
(8, 'Room 305', '400', '3'),
(11, 'Room 320', '200', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tel`) VALUES
(17, 'example', 'example@mail.com', '$2y$10$o5taFvUQvwuMGG8xiQQojey/YlIX6kixiRjL.51sh4MS36hNn.ImO', '123456789'),
(19, 'ZhiShan', 'zhishan@mail.com', '$2y$10$epKOgUeM.GZ0nZKmQiwuRunigE69sWPyFwlYp9gg3eaTDaWtIi/Le', '01234567');

-- --------------------------------------------------------

--
-- Table structure for table `user_booking`
--

CREATE TABLE `user_booking` (
  `id` int(100) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `roomid` varchar(255) NOT NULL,
  `roomnum` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_booking`
--

INSERT INTO `user_booking` (`id`, `userid`, `username`, `useremail`, `phone`, `roomid`, `roomnum`, `price`, `checkin`, `checkout`) VALUES
(3, '8', 'Alwyn Chua', 'alwynchuaz@gmail.com', '0143580322', '1', 'Room 101', '199', '2022-12-01', '2022-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `id` int(100) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `context` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`id`, `userid`, `username`, `useremail`, `phone`, `subject`, `context`) VALUES
(1, '8', 'Alwyn Chua', 'alwynchuaz@gmail.com', '0143580322', 'Good service', 'The staff were nice and friendly'),
(2, '13', 'Jack', 'jack@gmail.com', '014-3321221', 'Project', 'I love PHP'),
(3, '14', 'Lee MIng', 'lee@gmail.com', '019-4232233', 'Aaaaaaa', 'the service very good ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_booking`
--
ALTER TABLE `user_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_booking`
--
ALTER TABLE `user_booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
