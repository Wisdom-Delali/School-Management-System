-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 06:55 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fullnesscentre`
--
CREATE DATABASE IF NOT EXISTS `fullnesscentre` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fullnesscentre`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `date`, `total`, `male`, `female`, `children`) VALUES
(1, '2020-12-08', 150, 510, 551, 121),
(2, '2020-10-25', 150, 100, 50, 35),
(3, '2020-01-08', 5212, 245, 745, 454);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `receipient` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`ID`, `receipient`, `subject`, `message`) VALUES
(1, 'hdhfp@gamio.com', 'Test', 'This is a test'),
(2, 'hdhfp@gamio.com', 'Test', 'KJLUILugli puih;h ;uh h'),
(3, 'doijoijo@sjoj', 'Test', 'kjbob'),
(4, '', 'Test', 'er656'),
(5, '', 'Test', 'jdj eh;woirh ie ');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `trn_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `trn_type` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL,
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`ID`, `trn_date`, `amount`, `trn_type`, `status`, `remark`) VALUES
(1, '2020-10-14', 4512, 'Other', 'Income', 'Seed sdlkfn;ksjdlnfo'),
(2, '2020-11-14', 4552, 'Tithe', 'Income', 'Offering dklnfk;djnf''okdsnfk''dsnfknds'),
(3, '2020-10-14', 3421, 'Offering', 'Income', 'For income'),
(4, '2020-12-06', 2000, 'Pledge', 'Income', 'lp'),
(5, '2020-12-06', 2000, 'Projects', 'Expense', 'lp'),
(6, '2020-12-06', 2000, 'Projects', 'Expense', 'lp');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `member_role` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `last_name`, `first_name`, `department`, `age`, `join_date`, `dob`, `gender`, `member_role`, `status`, `location`, `email_address`, `image`) VALUES
(1, 'Johnson', 'Sam', 'Choirister', 20, '8151-08-04', '2020-09-28', 'Male', 'No role', 0, '', 'nskdf;@jdijf.com', 'uploads/image.jpg'),
(2, 'Mike', 'Smith', 'Children', 0, '0000-00-00', '0000-00-00', '', '', 1, '', 'sdkf@msg', 'uploads/image.jpg'),
(3, 'Adogo', 'John', 'Usher', 25, '2020-10-01', '2020-06-17', 'Male', 'Head Pastor', 0, '', 'hdhfp@gamio.com', 'uploads/image.jpg'),
(4, 'Adam', 'Janet', 'Choirister', 26, '2020-10-02', '2020-02-06', 'Female', 'No role', 0, '', 'jdnobiobo@ndoho', 'uploads/image.jpg'),
(5, 'Test', 'Test', 'Instrumentalist', 2147483647, '2020-12-03', '2020-12-23', 'Male', 'None', 0, '', 'doijoijo@sjoj', 'uploads/image.jpg'),
(6, 'Pastoe', 'Mike', 'None', 54487954, '2020-12-08', '2020-11-03', 'Male', 'Pastor', 0, '', 'oastor@mansi.com', 'uploads/image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `start`, `end`, `note`) VALUES
(1, 'Testing', '2020-12-07', '2020-12-08', 'Thgis is a new thing'),
(11, 'New time', '2020-12-08', '2020-12-09', 'Session'),
(12, 'New time', '2020-12-08', '2020-12-09', 'Thgis is a new thing'),
(13, 'ertyty', '2020-12-09', '2020-12-16', 'Thgis is a new thing'),
(14, 'dryt45jh', '2020-12-06', '2020-12-06', 'Thgis is a new thing'),
(15, 'New time', '2020-12-01', '2020-12-02', 'Thgis is a new thing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `full_name`) VALUES
(1, 'admin', 'admin', 'Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
