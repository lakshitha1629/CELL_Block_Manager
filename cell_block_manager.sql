-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2019 at 06:15 AM
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
  `controller` varchar(30) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=234 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbm_cell_block`
--

INSERT INTO `cbm_cell_block` (`id`, `date`, `cell`, `site_name`, `controller`, `requestor`, `reason`, `block`, `block_by`, `block_time`, `block_remarks`, `deblock`, `deblock_by`, `deblock_time`, `deblock_remarks`, `active`) VALUES
(231, '2019-09-12 09:50:20', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', 'lakshitha1629', '10:15:25', 'sasa', 'Deblock', 'lakshitha1629', '2019-09-12 10:15:52', '', 1),
(230, '2019-09-11 23:40:21', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', '', 'pending..', '', NULL, '', 'pending..', '', NULL, '', 1),
(232, '2019-09-12 09:50:20', 'MTMED1A', 'Meddewatta', 'BSC31', 'lakshitha', '', 'pending..', '', NULL, '', '', '', NULL, '', 1),
(225, '2019-09-11 22:58:24', 'QCCSS1G', 'QCCSS1-Small Cell', 'LTE', 'lakshitha', 'Quality Issue', 'Block', '', NULL, '', 'Deblock', 'lakshitha1629', '2019-09-12 10:23:20', '', 1);

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
