-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 08:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `splash`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `verified` int(1) NOT NULL,
  `vkey` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id`, `username`, `password`, `firstName`, `lastName`, `email`, `phone`, `dob`, `gender`, `verified`, `vkey`) VALUES
(1, 'annuraggg', '$2y$10$ugSGKK5YyOUO7nBFtXVghOyNfa84LPGQ6bvg6M42rGt.4pR8O943S', 'Anurag', 'Sawant', 'annuraggggg@gmail.com', '9324083638', '2004-01-17', 'Male', 1, 'c852c3f92031a4e28fbdba50f1ff7912f9ce515af53e0a08cd2663493216b279');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `userid` int(10) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `useragent` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `sessid` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `userid`, `ip`, `useragent`, `location`, `date`, `time`, `sessid`, `status`) VALUES
(1, 1, '104.28.200.96', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '01/08/2022', '16:07:36', '0t8nmkkjke4b9qulmh70i8e2dd', 'expired'),
(2, 1, '104.28.200.96', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '01/08/2022', '16:08:17', '94639nrcfculv783n0890gd9e8', 'expired'),
(3, 1, '104.28.232.96', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '01/08/2022', '16:11:47', '9bljc16ql9nqpsr2letvh2rk5g', 'expired'),
(4, 1, '104.28.232.96', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '01/08/2022', '16:12:38', 'd62sf30o3fl5iat36iiihi13sv', 'expired'),
(5, 1, '104.28.232.96', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '01/08/2022', '16:13:29', 'kr1i5lvkc7b5kq832jtes4g89j', 'expired'),
(6, 1, '104.28.232.97', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '01/08/2022', '16:14:33', 'dga9p8albvuank8h1n5d9jb08r', 'expired'),
(7, 1, '104.28.232.97', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '02/08/2022', '00:15:19', 'j6c8a02ajfro8voaoi7ebsd9h9', 'loggedOut'),
(8, 1, '104.28.232.97', ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.', 'Thane, Maharashtra, India', '02/08/2022', '00:16:33', 'mibhjloq4eo7dk31vhl3v80ba9', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
