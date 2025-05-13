-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2023 at 06:58 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kansai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trucks`
--

DROP TABLE IF EXISTS `tbl_trucks`;
CREATE TABLE IF NOT EXISTS `tbl_trucks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `truck_code` varchar(100) NOT NULL,
  `truck_name` varchar(100) NOT NULL,
  `date_purchase` datetime NOT NULL,
  `chassis_num` varchar(100) NOT NULL,
  `engine_num` varchar(100) NOT NULL,
  `serial_num` varchar(100) NOT NULL,
  `engine_model` varchar(100) NOT NULL,
  `plate_num` varchar(100) NOT NULL,
  `truck_color` varchar(100) NOT NULL,
  `year_model` varchar(100) NOT NULL,
  `locationid` varchar(10) NOT NULL,
  `statid` varchar(10) NOT NULL,
  `typeid` int(10) NOT NULL,
  `solddt` varchar(100) DEFAULT NULL,
  `soldby` varchar(10) DEFAULT NULL,
  `createddt` datetime NOT NULL,
  `createdby` varchar(10) NOT NULL,
  `updatedt` varchar(100) DEFAULT NULL,
  `updatedby` varchar(10) DEFAULT NULL,
  `datestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_details`
--

DROP TABLE IF EXISTS `tbl_truck_details`;
CREATE TABLE IF NOT EXISTS `tbl_truck_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `truckid` int(10) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_location`
--

DROP TABLE IF EXISTS `tbl_truck_location`;
CREATE TABLE IF NOT EXISTS `tbl_truck_location` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_location`
--

INSERT INTO `tbl_truck_location` (`id`, `location`) VALUES
(1, 'SALITRAN'),
(2, 'TRECE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_pictures`
--

DROP TABLE IF EXISTS `tbl_truck_pictures`;
CREATE TABLE IF NOT EXISTS `tbl_truck_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pictures` text NOT NULL,
  `truckid` int(10) NOT NULL,
  `createdby` int(10) NOT NULL,
  `createdt` varchar(20) NOT NULL,
  `deleteby` varchar(10) NOT NULL,
  `deletedt` varchar(20) NOT NULL,
  `statid` int(10) NOT NULL,
  `datestampt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_status`
--

DROP TABLE IF EXISTS `tbl_truck_status`;
CREATE TABLE IF NOT EXISTS `tbl_truck_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_status`
--

INSERT INTO `tbl_truck_status` (`id`, `status`) VALUES
(1, 'AVAILABLE'),
(2, 'NOT AVAILABLE'),
(3, 'SOLD'),
(4, 'CANCEL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_type`
--

DROP TABLE IF EXISTS `tbl_truck_type`;
CREATE TABLE IF NOT EXISTS `tbl_truck_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `truck_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_type`
--

INSERT INTO `tbl_truck_type` (`id`, `truck_type`) VALUES
(1, 'BOOM TRUCK'),
(2, '6 WHEELER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlvl`
--

DROP TABLE IF EXISTS `tbl_userlvl`;
CREATE TABLE IF NOT EXISTS `tbl_userlvl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_lvl` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userlvl`
--

INSERT INTO `tbl_userlvl` (`id`, `user_lvl`) VALUES
(1, 'ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `passwordstr` varchar(150) NOT NULL,
  `roleid` int(10) NOT NULL,
  `active` int(10) NOT NULL,
  `createdby` int(10) NOT NULL,
  `createddt` datetime NOT NULL,
  `updatedby` int(10) NOT NULL,
  `updatedt` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `lastname`, `firstname`, `middlename`, `passwordstr`, `roleid`, `active`, `createdby`, `createddt`, `updatedby`, `updatedt`, `last_login`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, '2023-04-11 15:09:43', 1, '2023-04-11 15:09:43', '2023-04-11 15:09:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
