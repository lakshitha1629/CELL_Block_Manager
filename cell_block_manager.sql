-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2020 at 05:28 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `block` varchar(50) DEFAULT '',
  `block_by` varchar(50) DEFAULT '',
  `block_time` datetime DEFAULT NULL,
  `block_remarks` varchar(200) DEFAULT '',
  `deblock` varchar(50) DEFAULT '',
  `deblock_by` varchar(50) DEFAULT '',
  `deblock_time` datetime DEFAULT NULL,
  `deblock_remarks` varchar(255) DEFAULT '',
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=415 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbm_cell_block`
--

INSERT INTO `cbm_cell_block` (`id`, `date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_by`, `deblock_time`, `deblock_remarks`, `active`) VALUES
(411, '2019-12-09 11:37:11', 'EEEEEEEE', 'Nugegoda', '2G', 'RNO_001', 'Nn', 'Block', 'INOC_001', '2020-01-30 14:21:29', '', 'Pending..', '', NULL, '', 1),
(412, '2019-12-09 11:37:33', 'CCCCCC', 'Nugegoda', '2G', 'RNO_001', 'Done', '', '', NULL, '', 'Deblock', 'INOC_001', '2019-12-09 11:48:30', '', 1),
(409, '2019-12-07 13:41:02', 'WWWWW', 'Maharagama', '2G', 'ZTE_001', 'Power issue', '', 'INOC_001', '2019-12-07 14:00:48', 'done', 'Approval_Pending..', '', NULL, '', 1),
(410, '2019-12-08 21:08:04', 'SSSSSSSSS', 'Nugegoda', 'LTE', 'ZTE_001 (approved by RNO_001)', 'Test', 'Block', 'INOC_001', '2019-12-09 11:36:21', '', 'Deblock', 'INOC_001', '2019-12-08 21:28:40', '', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbm_user_account`
--

INSERT INTO `cbm_user_account` (`user_id`, `user_name`, `user_type`, `password`, `activated`) VALUES
(1, 'admin', 1, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'RNO_001', 2, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'INOC_001', 3, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'RNO_002', 2, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(5, 'ZTE_001', 4, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(6, 'Hu_001', 5, '81dc9bdb52d04dc20036dbd8313ed055', 1);

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
