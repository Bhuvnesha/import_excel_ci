-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2020 at 02:08 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `import_excel_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `full_name`, `dob`, `address`, `gender`) VALUES
(1, 'sanjay', '0000-00-00', 'mysore', 'male'),
(2, 'bhavya', '0000-00-00', 'bangalore ', 'female'),
(3, 'manju', '0000-00-00', 'bangalore ', 'male'),
(4, 'bhuvnesh', '0000-00-00', 'bangalore ', 'male'),
(5, 'ilyaz', '0000-00-00', 'bangalore ', 'male'),
(6, 'sameer', '0000-00-00', 'shimoga', 'male'),
(7, 'sanjay', '0000-00-00', 'mysore', 'male'),
(8, 'bhavya', '0000-00-00', 'bangalore ', 'female'),
(9, 'manju', '0000-00-00', 'bangalore ', 'male'),
(10, 'bhuvnesh', '0000-00-00', 'bangalore ', 'male'),
(11, 'ilyaz', '0000-00-00', 'bangalore ', 'male'),
(12, 'sameer', '0000-00-00', 'shimoga', 'male'),
(13, 'sanjay', '0000-00-00', 'mysore', 'male'),
(14, 'bhavya', '0000-00-00', 'bangalore ', 'female'),
(15, 'manju', '0000-00-00', 'bangalore ', 'male'),
(16, 'bhuvnesh', '0000-00-00', 'bangalore ', 'male'),
(17, 'ilyaz', '0000-00-00', 'bangalore ', 'male'),
(18, 'sameer', '0000-00-00', 'shimoga', 'male'),
(19, 'sanjay', '1970-01-01', 'mysore', 'male'),
(20, 'bhavya', '1970-01-01', 'bangalore ', 'female'),
(21, 'manju', '1970-01-01', 'bangalore ', 'male'),
(22, 'bhuvnesh', '1970-01-01', 'bangalore ', 'male'),
(23, 'ilyaz', '1970-01-01', 'bangalore ', 'male'),
(24, 'sameer', '1970-01-01', 'shimoga', 'male');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
