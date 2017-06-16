-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 12:06 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demoihb_toiapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

CREATE TABLE IF NOT EXISTS `tbl_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` int(2) NOT NULL,
  `salt` varchar(100) CHARACTER SET utf8 NOT NULL,
  `key_active` varchar(50) CHARACTER SET utf8 NOT NULL,
  `introimage_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `other` varchar(1200) CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`id`, `email`, `password`, `status`, `salt`, `key_active`, `introimage_id`, `file_id`, `other`, `created_by`, `created_time`) VALUES
(1, 'bnonline1003@gmail.com', '8ba19923c98f4ea52be8f81b6982b00e', 1, '52cb68b94b2565.99029448', 'YsWQhUtjry4', 0, 0, '{"firstname":"Ken","lastname":"Bn","address":"BN","phone":"0987654321","bank_account":"asasa","website":"sasasas","cpi":"1000"}', 0, 1389062329),
(31, 'hotro.vgame@gmail.com', '8fb9d78c0c942b75d471488d8e8fd5e2', 1, '52ccb0817b7173.33916524', 'FuZyZubkuFF', 0, 54, '{"firstname":"Ho\\u00e0ng","lastname":"Bi\\u00ean","address":"H\\u00e0 N\\u1ed9i, Vi\\u1ec7t Nam","phone":"0979951610","cpi":""}', 0, 1389146241),
(32, 'testmailbn1990@gmail.com', 'fa04293cd6801f4716efefd2a2388319', 1, '52ccd00de6eac1.73704133', 'cuQASGuvHwa', 0, 56, '{"firstname":"\\u0110\\u1ea1t","lastname":"Nguy\\u1ec5n Ti\\u1ebfn","address":"bn","phone":"0987654321","cpi":""}', 0, 1389154317),
(33, 'fggfgfgf@gmail.com', '19373efe2858817025aea963901ad32a', 1, '535b319999c8b2.20237483', '', 0, 0, '{"firstname":"dklfjd;l","lastname":"d;lkdl;","address":"l;k\\u0111l;fks","phone":"0987654321","app_name":"ld;fkd;"}', 0, 1398485401);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
