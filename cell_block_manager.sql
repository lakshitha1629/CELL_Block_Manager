-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2019 at 03:21 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cell_block_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbm_cell_block`
--

DROP TABLE IF EXISTS `cbm_cell_block`;
CREATE TABLE IF NOT EXISTS `cbm_cell_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `cell` varchar(30) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `technology` varchar(30) NOT NULL,
  `requestor` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `block` varchar(50) DEFAULT NULL,
  `block_by` varchar(50) DEFAULT '',
  `block_time` datetime DEFAULT NULL,
  `block_remarks` varchar(200) DEFAULT '',
  `deblock` varchar(50) DEFAULT '',
  `deblock_by` varchar(50) DEFAULT '',
  `deblock_time` datetime DEFAULT NULL,
  `deblock_remarks` varchar(255) DEFAULT '',
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=354 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbm_cell_block`
--

INSERT INTO `cbm_cell_block` (`id`, `date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_by`, `deblock_time`, `deblock_remarks`, `active`) VALUES
(347, '2019-09-23 09:16:52', 'MTMED1A', 'Mahargama', '4G', 'Vendor01 (approved by lakshitha)', 'Quality Issue', 'Block', '', NULL, '', 'Deblock', 'lakshitha1629', '2019-09-23 09:27:53', 'done', 1),
(352, '2019-09-23 09:19:55', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'admin', '2019-09-23 10:07:41', 'done', '', '', NULL, '', 1),
(353, '2019-09-23 09:22:50', 'qw3ertyu', 'Maharagama', 'BSC', 'lakshitha', 'error', 'Block', 'admin', '2019-09-23 10:07:41', 'done', '', '', NULL, '', 1),
(351, '2019-09-23 09:19:55', 'MTMED1A', 'Mahargama', '4G', 'lakshitha', 'Quality Issue', 'Block', '', NULL, '', 'Deblock', 'lakshitha1629', '2019-09-23 09:27:53', 'done', 1),
(349, '2019-09-23 09:17:21', 'QWEEaxd', 'nugegoda', 'LTE', 'Vendor01 (approved by lakshitha)', 'Power Issue', 'Block', 'lakshitha1629', '2019-09-23 09:27:19', 'done', 'Pending..', '', NULL, '', 1),
(350, '2019-09-23 09:18:27', 'ASDFGHJKL', 'Colombo', '2G', 'Vendor01', 'Quality Issue', 'Block', '', NULL, '', 'Pending..', '', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbm_user_account`
--

DROP TABLE IF EXISTS `cbm_user_account`;
CREATE TABLE IF NOT EXISTS `cbm_user_account` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activated` int(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbm_user_account`
--

INSERT INTO `cbm_user_account` (`user_id`, `user_name`, `user_type`, `password`, `activated`) VALUES
(1, 'admin', 1, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'lakshitha', 2, '202cb962ac59075b964b07152d234b70', 1),
(3, 'lakshitha1629', 3, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'perera', 2, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(5, 'Vendor01', 4, '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_request`
--

DROP TABLE IF EXISTS `vendor_request`;
CREATE TABLE IF NOT EXISTS `vendor_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `cell` varchar(45) NOT NULL,
  `site_name` varchar(40) NOT NULL,
  `technology` varchar(50) NOT NULL,
  `requestor` varchar(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `block` varchar(10) DEFAULT '',
  `deblock` varchar(10) DEFAULT '',
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_request`
--

INSERT INTO `vendor_request` (`id`, `date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `block`, `deblock`, `active`) VALUES
(20, '2019-09-20 11:41:33', 's', 's', 's', 'Vendor01', 'Quality Issue', 'Pending..', '', 1),
(19, '2019-09-20 11:38:13', 'qq', 'nugegoda', '2G', 'Vendor01', 'dd', 'Pending..', '', 1),
(18, '2019-09-20 11:34:55', 'wwww', 'nugegoda', '2G', 'Vendor01', 'is', 'Pending..', '', 1),
(17, '2019-09-20 11:30:24', 'qwertyujhgfd', 'nugegoda', '2G', 'Vendor01', 'Power Issue', 'Pending..', '', 1),
(16, '2019-09-20 11:10:54', 'MTMED1A', 'Meddewatta', 'BSC31', 'Vendor01', 'Power Issue', 'Pending..', '', 1),
(15, '2019-09-20 11:10:54', 'MTMED1A', 'Mahargama', '4G', 'Vendor01', 'Quality Issue', 'Block', 'Pending..', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
