-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2017 at 01:49 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mul_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculations`
--

CREATE TABLE IF NOT EXISTS `calculations` (
  `id` int(3) NOT NULL,
  `op` varchar(3) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calculations`
--

INSERT INTO `calculations` (`id`, `op`, `a`, `b`, `result`) VALUES
(17, 'Add', 5, 7, 12),
(18, 'Sub', 5, 7, -2),
(19, 'Mul', 5, 7, 35),
(20, 'Div', 5, 7, 0.71),
(21, 'Add', 5, 7, 12),
(22, 'Add', 4, -5, -1),
(23, 'Add', 5, 6, 11),
(24, 'Add', 34, 56, 90),
(25, 'Mul', 4, 10, 40),
(26, 'Sub', 4, 10, -6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculations`
--
ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calculations`
--
ALTER TABLE `calculations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
