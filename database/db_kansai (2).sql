-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2023 at 02:30 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trucks`
--

INSERT INTO `tbl_trucks` (`id`, `truck_code`, `truck_name`, `date_purchase`, `chassis_num`, `engine_num`, `serial_num`, `engine_model`, `plate_num`, `truck_color`, `year_model`, `locationid`, `statid`, `typeid`, `solddt`, `soldby`, `createddt`, `createdby`, `updatedt`, `updatedby`, `datestamp`) VALUES
(1, 'DT-0016(593)', 'ISUZU', '2023-04-25 00:00:00', 'CXZ81K1 3001899', '10PE1-164166', 'XXXX-XXXX-XXXX', 'XXXX-XXXX-XXXX', 'NIH-9340', 'BLACK', '2021', '1', '1', 7, NULL, NULL, '2023-04-25 00:00:00', '1', '2023-04-25', '1', '2023-04-25 06:54:15'),
(2, 'HE-0047(421)', 'KOMATSU', '2023-04-26 00:00:00', 'WA430-5 60093', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'WA430-5', 'XXXX-XXXX-XXXX', 'YELLOW', 'XXX-XXX', '2', '1', 29, NULL, NULL, '2023-04-25 00:00:00', '1', '2023-04-25', '1', '2023-04-25 06:59:19'),
(3, 'CV-0004(99)', 'ISUZU', '2023-04-27 00:00:00', 'FRRT4KJ4-7001470', '6HK1-417433', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'NAP-1758', 'WHITE', '2017', '2', '1', 30, NULL, NULL, '2023-04-26 00:00:00', '1', '2023-04-26', '1', '2023-04-26 05:25:25'),
(4, 'CRANE-0001(242)', 'KATO', '2023-04-27 00:00:00', 'KR-25H-V5 5410182', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'DARK GRAY', '2002', '2', '1', 5, NULL, NULL, '2023-04-26 00:00:00', '1', '2023-04-26', '1', '2023-04-26 05:46:45'),
(5, 'ELF-MD-0008(584)', 'ISUZU', '2023-04-26 00:00:00', 'XXX-XXX-XXX', '4HF-1-249038', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'CBR-668844', 'WHITE', '2021', '1', '1', 7, NULL, NULL, '2023-04-26 00:00:00', '1', NULL, NULL, '2023-04-26 06:13:11'),
(6, 'FD-0004(599)', 'ISUZU', '2023-04-26 00:00:00', 'FRR32D1-3000877', '6HE1', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'BLUE/WHITE', 'XXXX', '1', '1', 8, NULL, NULL, '2023-04-26 00:00:00', '1', '2023-04-26', '1', '2023-04-26 06:17:03'),
(7, 'RV-0005(590)', 'ISUZU', '2023-04-26 00:00:00', 'NPR85-7008876', '4JJ1-117727', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'NIH-9347', 'BLUE', '2021', '1', '1', 32, NULL, NULL, '2023-04-26 00:00:00', '1', NULL, NULL, '2023-04-26 06:20:39'),
(8, 'SL-0004(467)', 'MIT', '2023-04-26 00:00:00', 'FS50MRY-520027', '8M21-030867', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'NEP-8192', 'WHITE', '2020', '1', '1', 33, NULL, NULL, '2023-04-26 00:00:00', '1', NULL, NULL, '2023-04-26 06:24:14'),
(9, 'TH-0049(601)', 'FUSO', '2023-04-26 00:00:00', 'FP50MD-502369', '8M21-032798', 'XXX-XXX-XXX', 'XXX-XXX-XXX', 'ACN-8587', 'BLUE', '2004', '1', '1', 34, NULL, NULL, '2023-04-26 00:00:00', '1', '2023-04-26', '1', '2023-04-26 06:30:24'),
(10, 'WV-0008(373)', 'ISUZU', '2023-04-26 00:00:00', 'CYL51V3W3000950', '6WF1103956', 'XXX-XXX-XXX', 'XXX-XXX-XX', 'NHB5962', 'PINK', '2021', '1', '1', 26, NULL, NULL, '2023-04-26 00:00:00', '1', NULL, NULL, '2023-04-26 06:33:14');

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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_details`
--

INSERT INTO `tbl_truck_details` (`id`, `truckid`, `details`) VALUES
(1, 1, '10 WHEELER'),
(2, 2, 'RUN HOURS: 22,137.5'),
(3, 2, 'STANDARD TIRE: 23.5-25 16PRL5'),
(4, 2, 'WEIGHT: 18.257T'),
(5, 2, 'BUCKET WIDTH: 3.05M'),
(6, 2, 'BUCKET CAPACITY: '),
(7, 2, 'ENGINE: KOM SAA6D12SE-3'),
(8, 2, 'TRANSPORT WIDTH: 3.05M'),
(9, 2, 'MAX DISCHARGE HEIGHT: 4.250M'),
(10, 3, 'LEAF SPRING: SUSPENSION'),
(11, 3, 'SINGLE DIFFERENTIAL'),
(12, 3, '6 WHEELER'),
(13, 3, 'TIRE SIZE: 225/80R17.5'),
(14, 3, 'LENGTH: 19FT'),
(15, 3, 'WIDTH: 8FT'),
(16, 3, 'GROSS: WT.:8T'),
(17, 3, 'NET WT.: 4T'),
(18, 3, 'NET CAPACITY: 4T'),
(19, 4, 'WEIGHT: 26.495T'),
(20, 4, 'TONS: 25'),
(21, 4, 'BOOM LENGTH: 9.5M-30.5'),
(22, 4, 'BOOM-CAP: (9.5M):25.0T X 3.5M'),
(23, 4, 'JIB CAPACITY: (7.9M):3.0T X 72Â°'),
(24, 4, 'LIFTING HEIGHT: (BOOM):31.2M'),
(25, 4, 'BOOM CAPACITY: (13.5M):7T X 8.0M'),
(26, 4, 'JIB CAPACITY: (13.0M): 2.0T X 76Â°'),
(27, 4, 'TRANSPORT LENGHT: 11.210M'),
(28, 4, 'STANDARD TIRE: 385/95R25170E ROAD'),
(29, 4, 'ENGINE: MIT.6D16-TLE2B'),
(30, 4, 'JIB LENGTH: 7.9M-13.0M'),
(31, 4, 'TRANSPORT WIDTH: 2.620M'),
(32, 4, 'TRANSPORT HEIGHT: 3.450M'),
(33, 5, 'HIGH ROOF WITH VENTILATION'),
(34, 5, 'CAMEL TYPE'),
(35, 5, 'INLINE'),
(36, 6, 'INLINE INJECTION PUMP'),
(37, 6, 'CABLE TYPE'),
(38, 6, 'HIGH SIDING'),
(39, 6, '6 WHEELER'),
(40, 4, 'FULLY HYDROLIC ROUGH TERRAIN CRANE'),
(41, 7, '6 SPEED'),
(42, 7, 'MANUAL TRANSMISSION'),
(43, 7, 'TOPRE COOLING SYSTEM'),
(44, 7, '14FT LONG'),
(45, 8, 'LEAF SPRING SUSPENSION'),
(46, 8, '12 WHEELER'),
(47, 8, '4 STAGE BOOM'),
(48, 8, 'TRUCK LOAD CAPACITY: 7MT'),
(49, 8, 'LIFTING CAPACITY OF BOOM: 5TONS'),
(50, 8, 'HIGH JACK'),
(51, 8, 'WINCH REMOTE CONTROL'),
(52, 9, 'LEAF SPRING SUSPENSION'),
(53, 9, 'SINGLE DIFFERENTIAL'),
(54, 9, '6 WHEELER'),
(55, 10, 'SINGLE DIFFERENTIAL'),
(56, 10, 'LEAF SPRING SUSPENSION'),
(57, 10, 'TIRE SIZE: 275-80R22.5'),
(58, 10, '10 WHEELER'),
(59, 10, 'INLINEQ'),
(60, 10, 'NEW PAINT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_location`
--

DROP TABLE IF EXISTS `tbl_truck_location`;
CREATE TABLE IF NOT EXISTS `tbl_truck_location` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_location`
--

INSERT INTO `tbl_truck_location` (`id`, `location`) VALUES
(1, 'SALITRAN'),
(2, 'TRECE'),
(3, 'SUBIC'),
(4, 'HOLIDAY');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_pictures`
--

INSERT INTO `tbl_truck_pictures` (`id`, `pictures`, `truckid`, `createdby`, `createdt`, `deleteby`, `deletedt`, `statid`, `datestampt`) VALUES
(6, 'img/upload/Untitled_design__1_-removebg-preview-removebg-preview (1).png', 7, 1, '2023-04-26', '', '', 1, '2023-04-26 08:14:48'),
(5, 'img/upload/Untitled_design__1_-removebg-preview.png', 2, 1, '2023-04-26', '', '', 1, '2023-04-26 08:13:19'),
(4, 'img/upload/Untitled_design-removebg-preview.png', 1, 1, '2023-04-26', '', '', 1, '2023-04-26 07:21:06'),
(7, 'img/upload/Untitled_design__2_-removebg-preview.png', 6, 1, '2023-04-26', '', '', 1, '2023-04-26 08:15:51'),
(8, 'img/upload/cargo_truck.jpg', 1, 1, '2023-05-04', '', '', 1, '2023-05-04 02:00:48');

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_type`
--

INSERT INTO `tbl_truck_type` (`id`, `truck_type`) VALUES
(1, 'BOOM-TRUCK'),
(2, 'BULK-AND-TANKER-TRUCK'),
(3, 'CARGO-TRUCKS'),
(4, 'CLOSED-VAN'),
(5, 'CRANE-TRUCKS'),
(6, 'DOUBLE-CAB'),
(7, 'DUMP-TRUCKS'),
(8, 'FORWARD-DUMP-TRUCKS'),
(9, 'FIGHTER-DUMP-TRUCKS'),
(10, 'ELF-MINI-DUMP-TRUCKS'),
(11, 'ELF-CARGO-DROPSIDE'),
(12, 'FIGHTER-WATER-TANK'),
(13, 'FIRE-TRUCK'),
(14, 'GARBAGE-TRUCK'),
(15, 'GENSET-TRUCK'),
(16, 'GOLF-CART'),
(17, 'HEAVY-EQUIPMENT'),
(18, 'LIFTER'),
(19, 'MANLIFT-TRUCK'),
(20, 'PUMPCRETE-TRUCKS'),
(21, 'REFRIGERATED-VAN'),
(22, 'SELF-LOADER-TRUCKS'),
(23, 'TRACTOR-TRUCK'),
(24, 'TRAILER-TRUCKS'),
(25, 'VACUUM-TRUCKS'),
(26, 'WINGVAN'),
(27, 'FIGHTER-WINGVAN'),
(28, 'FORWARD-WINGVAN'),
(29, 'WHEEL-LOADER'),
(30, 'FORWARD-ALUMINUM-VAN'),
(31, 'FULLY-HYDRAULIC-ROUGH-TERRAIN-CRANE'),
(32, 'ELF-REF-VAN'),
(33, 'SGREAT-SELFLOADER-W/-BOOM'),
(34, 'SGREAT-TRACTOR-HEAD');

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
