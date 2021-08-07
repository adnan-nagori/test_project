-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 03:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_testproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_subscribers`
--

CREATE TABLE `test_subscribers` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `isVerify` tinyint(11) NOT NULL DEFAULT 0,
  `createdDate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_subscribers`
--

INSERT INTO `test_subscribers` (`id`, `user_email`, `isVerify`, `createdDate`) VALUES
(1, 'arpit@gmail.com', 0, 1628250603),
(3, 'adi@kjjit.eu', 0, 1628250703);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_subscribers`
--
ALTER TABLE `test_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_subscribers`
--
ALTER TABLE `test_subscribers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
