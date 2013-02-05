-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2013 at 10:13 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php-examples`
--

-- --------------------------------------------------------

--
-- Table structure for table `simple_table`
--
-- Creation: Feb 05, 2013 at 08:56 PM
--

CREATE TABLE `simple_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `name` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL DEFAULT 'bob',
  `text` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL DEFAULT 'some text',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `simple_table`
--

INSERT INTO `simple_table` (`id`, `date`, `name`, `text`) VALUES
(1, '2013-02-05 00:00:00', 'john', 'a message'),
(2, '2013-02-05 00:00:00', 'john', 'a message'),
(3, '2013-02-05 15:02:11', 'bob', 'some text'),
(5, '2013-02-05 15:02:50', 'bobby', 'not a mess');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
