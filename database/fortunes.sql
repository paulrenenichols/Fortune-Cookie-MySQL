-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2013 at 10:24 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fortunes`
--
CREATE DATABASE `fortunes` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE `fortunes`;

-- --------------------------------------------------------

--
-- Table structure for table `fortunes`
--

CREATE TABLE `fortunes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `random_id` float unsigned NOT NULL,
  `body` varchar(300) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  KEY `random_id` (`random_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fortunes`
--

INSERT INTO `fortunes` (`id`, `created_at`, `random_id`, `body`) VALUES
(1, '2013-02-09 16:26:42', 0.599658, 'a fortune'),
(2, '2013-02-10 15:09:50', 0.496271, 'another fortune'),
(3, '2013-02-10 15:09:57', 0.708736, 'a third fortune'),
(4, '2013-02-10 15:10:03', 0.891024, 'a fourth fortune'),
(5, '2013-02-10 15:10:11', 0.878583, 'a fifth fortune');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
