-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2019 at 05:55 AM
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
  `block` varchar(10) DEFAULT NULL,
  `block_by` varchar(50) DEFAULT '',
  `block_time` time DEFAULT NULL,
  `block_remarks` varchar(200) DEFAULT '',
  `deblock` varchar(50) DEFAULT '',
  `deblock_by` varchar(50) DEFAULT '',
  `deblock_time` datetime DEFAULT NULL,
  `deblock_remarks` varchar(255) DEFAULT '',
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbm_cell_block`
--

INSERT INTO `cbm_cell_block` (`id`, `date`, `cell`, `site_name`, `technology`, `requestor`, `reason`, `block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_by`, `deblock_time`, `deblock_remarks`, `active`) VALUES
(272, '2019-09-13 00:16:59', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'lakshitha', '11:09:02', '', 'Pending..', '', NULL, '', 1),
(271, '2019-09-13 00:16:59', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha1629', '00:29:47', '', 'Pending..', '', NULL, '', 1),
(270, '2019-09-12 22:59:30', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'admin', '23:09:05', '', 'Deblock', 'lakshitha1629', '2019-09-13 18:18:57', 'dd', 1),
(269, '2019-09-12 22:59:30', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'admin', '23:09:05', '', 'Pending..', '', NULL, '', 1),
(268, '2019-09-12 22:59:25', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'admin', '23:08:09', '', 'Deblock', 'admin', '2019-09-13 00:14:37', 'mkjhh', 1),
(267, '2019-09-12 22:59:25', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'admin', '23:08:09', '', 'Deblock', 'lakshitha1629', '2019-09-16 11:08:03', '', 1),
(264, '2019-09-12 21:43:00', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'lakshitha', '22:07:17', 'm', 'Deblock', 'lakshitha', '2019-09-12 22:08:40', 'mm', 1),
(265, '2019-09-12 21:43:04', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha', '22:07:17', 'm', 'Deblock', 'lakshitha', '2019-09-12 22:08:40', 'mm', 1),
(266, '2019-09-12 21:43:04', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'lakshitha', '22:01:03', 'hg', 'Deblock', 'lakshitha', '2019-09-12 22:08:40', 'mm', 1),
(262, '2019-09-12 21:42:50', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'lakshitha', '22:12:59', 'nn', 'Deblock', 'admin', '2019-09-12 22:23:05', 'mm', 1),
(263, '2019-09-12 21:43:00', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha', '22:09:18', 'mm', 'Deblock', 'lakshitha', '2019-09-12 22:17:27', 'muytrsd', 1),
(261, '2019-09-12 21:42:50', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'admin', '22:22:54', 'lll', 'Deblock', 'lakshitha1629', '2019-09-12 23:12:11', 'll', 1),
(273, '2019-09-13 00:17:05', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha1629', '00:17:34', 'kjhgf', 'Pending..', '', NULL, '', 1),
(274, '2019-09-13 00:17:05', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'lakshitha1629', '00:17:54', 'mm,', '', '', NULL, '', 1),
(275, '2019-09-13 17:18:20', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha1629', '17:57:50', 'WWFDGSFDF', '', '', NULL, '', 1),
(276, '2019-09-13 17:18:20', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'lakshitha1629', '11:07:06', '', '', '', NULL, '', 1),
(277, '2019-09-14 17:18:25', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha1629', '11:07:06', '', '', '', NULL, '', 1),
(280, '2019-09-14 01:08:04', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha1629', '11:07:06', '', '', '', NULL, '', 1),
(279, '2019-09-14 17:21:39', 'ASDFGHN', 'nugegoda', '2G', 'lakshitha', 'issue', 'Block', 'lakshitha1629', '18:18:49', 'sdfg', '', '', NULL, '', 1),
(281, '2019-09-09 01:08:04', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', '', NULL, '', '', '', NULL, '', 1),
(282, '2019-09-14 10:43:58', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'admin', '10:32:46', 'aa', '', '', NULL, '', 1),
(283, '2019-09-14 10:43:58', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', 'Power Issue', 'Block', 'admin', '10:27:36', 'ax', 'Pending..', '', NULL, '', 1),
(284, '2019-09-15 15:01:51', 'ASCS', 'nugegoda', '2G', 'lakshitha', 'asdf', 'Block', 'admin', '10:23:37', 'sss', 'Pending..', '', NULL, '', 1),
(286, '2019-09-16 11:12:55', 'ASDFC', 'nugegoda', '4G', 'lakshitha', '', 'Block', 'lakshitha', '11:13:09', '', 'Pending..', '', NULL, '', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbm_user_account`
--

INSERT INTO `cbm_user_account` (`user_id`, `user_name`, `user_type`, `password`, `activated`) VALUES
(1, 'admin', 1, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'lakshitha', 2, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'lakshitha1629', 3, '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'perera', 2, '81dc9bdb52d04dc20036dbd8313ed055', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
