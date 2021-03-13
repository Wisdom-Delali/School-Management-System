-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 08:45 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `capstone`
--
CREATE DATABASE IF NOT EXISTS `capstone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `capstone`;

-- --------------------------------------------------------

--
-- Table structure for table `academic_terms`
--

CREATE TABLE IF NOT EXISTS `academic_terms` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term_name` varchar(100) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `academic_terms`
--

INSERT INTO `academic_terms` (`term_id`, `term_name`, `starting_date`, `ending_date`) VALUES
(1, 'First Term', '2000-01-01', '2021-04-30'),
(2, 'Second Term', '2021-05-01', '2021-08-31'),
(3, 'Third Term', '2021-09-01', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`activity_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `date`, `teacher_id`) VALUES
(1, '2021-02-01', 1),
(2, '2021-02-23', 1),
(3, '2021-02-23', 1),
(4, '2021-02-25', 1),
(5, '2021-02-22', 0),
(6, '2021-02-23', 0),
(7, '2021-02-24', 0),
(8, '2021-02-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_data`
--

CREATE TABLE IF NOT EXISTS `attendance_data` (
  `attendance_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `attendance_status` int(11) NOT NULL,
  PRIMARY KEY (`attendance_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=265 ;

--
-- Dumping data for table `attendance_data`
--

INSERT INTO `attendance_data` (`attendance_data_id`, `attendance_id`, `student_id`, `attendance_status`) VALUES
(1, 2, 19, 1),
(2, 2, 18, 1),
(3, 2, 17, 1),
(4, 2, 24, 1),
(5, 3, 23, 0),
(6, 3, 22, 0),
(7, 3, 21, 0),
(8, 3, 20, 0),
(9, 4, 19, 1),
(10, 4, 18, 1),
(11, 4, 17, 1),
(12, 4, 24, 1),
(13, 4, 23, 1),
(14, 4, 22, 1),
(15, 4, 21, 1),
(16, 4, 20, 1),
(17, 5, 50, 1),
(18, 5, 51, 1),
(19, 5, 52, 1),
(20, 5, 53, 1),
(21, 5, 19, 1),
(22, 5, 44, 1),
(23, 5, 45, 1),
(24, 5, 46, 1),
(25, 5, 48, 1),
(26, 5, 49, 1),
(27, 5, 3, 1),
(28, 5, 33, 1),
(29, 5, 4, 1),
(30, 5, 5, 1),
(31, 5, 6, 1),
(32, 5, 60, 1),
(33, 5, 8, 1),
(34, 5, 9, 1),
(35, 5, 12, 1),
(36, 5, 11, 1),
(37, 5, 10, 1),
(38, 5, 13, 1),
(39, 5, 47, 1),
(40, 5, 14, 1),
(41, 5, 15, 1),
(42, 5, 16, 1),
(43, 5, 18, 1),
(44, 5, 17, 1),
(45, 5, 2, 1),
(46, 5, 1, 1),
(47, 5, 37, 1),
(48, 5, 36, 1),
(49, 5, 35, 1),
(50, 5, 34, 1),
(51, 5, 32, 1),
(52, 5, 7, 1),
(53, 5, 31, 1),
(54, 5, 30, 1),
(55, 5, 29, 1),
(56, 5, 28, 1),
(57, 5, 27, 1),
(58, 5, 26, 1),
(59, 5, 25, 1),
(60, 5, 24, 1),
(61, 5, 23, 1),
(62, 5, 22, 1),
(63, 5, 21, 1),
(64, 5, 20, 1),
(65, 5, 38, 1),
(66, 5, 40, 1),
(67, 5, 39, 1),
(68, 5, 43, 1),
(69, 5, 42, 1),
(70, 5, 41, 1),
(71, 5, 54, 1),
(72, 5, 55, 1),
(73, 5, 56, 1),
(74, 5, 57, 1),
(75, 5, 58, 1),
(76, 5, 59, 1),
(77, 5, 62, 1),
(78, 5, 63, 1),
(79, 6, 50, 1),
(80, 6, 51, 1),
(81, 6, 52, 1),
(82, 6, 53, 1),
(83, 6, 19, 1),
(84, 6, 44, 1),
(85, 6, 45, 1),
(86, 6, 46, 1),
(87, 6, 48, 1),
(88, 6, 49, 1),
(89, 6, 3, 1),
(90, 6, 33, 1),
(91, 6, 4, 1),
(92, 6, 5, 1),
(93, 6, 6, 1),
(94, 6, 60, 1),
(95, 6, 8, 1),
(96, 6, 9, 1),
(97, 6, 12, 1),
(98, 6, 11, 1),
(99, 6, 10, 1),
(100, 6, 13, 1),
(101, 6, 47, 1),
(102, 6, 14, 1),
(103, 6, 15, 1),
(104, 6, 16, 1),
(105, 6, 18, 1),
(106, 6, 17, 1),
(107, 6, 2, 1),
(108, 6, 1, 1),
(109, 6, 37, 1),
(110, 6, 36, 1),
(111, 6, 35, 1),
(112, 6, 34, 1),
(113, 6, 32, 1),
(114, 6, 7, 1),
(115, 6, 31, 1),
(116, 6, 30, 1),
(117, 6, 29, 1),
(118, 6, 28, 1),
(119, 6, 27, 1),
(120, 6, 26, 1),
(121, 6, 25, 1),
(122, 6, 24, 1),
(123, 6, 23, 1),
(124, 6, 22, 1),
(125, 6, 21, 1),
(126, 6, 20, 1),
(127, 6, 38, 1),
(128, 6, 40, 1),
(129, 6, 39, 1),
(130, 6, 43, 1),
(131, 6, 42, 1),
(132, 6, 41, 1),
(133, 6, 54, 1),
(134, 6, 55, 1),
(135, 6, 56, 1),
(136, 6, 57, 1),
(137, 6, 58, 1),
(138, 6, 59, 1),
(139, 6, 62, 1),
(140, 6, 63, 1),
(141, 7, 50, 1),
(142, 7, 51, 1),
(143, 7, 52, 1),
(144, 7, 53, 1),
(145, 7, 19, 1),
(146, 7, 44, 1),
(147, 7, 45, 1),
(148, 7, 46, 1),
(149, 7, 48, 1),
(150, 7, 49, 1),
(151, 7, 3, 1),
(152, 7, 33, 1),
(153, 7, 4, 1),
(154, 7, 5, 1),
(155, 7, 6, 1),
(156, 7, 60, 1),
(157, 7, 8, 1),
(158, 7, 9, 1),
(159, 7, 12, 1),
(160, 7, 11, 1),
(161, 7, 10, 1),
(162, 7, 13, 1),
(163, 7, 47, 1),
(164, 7, 14, 1),
(165, 7, 15, 1),
(166, 7, 16, 1),
(167, 7, 18, 1),
(168, 7, 17, 1),
(169, 7, 2, 1),
(170, 7, 1, 1),
(171, 7, 37, 1),
(172, 7, 36, 1),
(173, 7, 35, 1),
(174, 7, 34, 1),
(175, 7, 32, 1),
(176, 7, 7, 1),
(177, 7, 31, 1),
(178, 7, 30, 1),
(179, 7, 29, 1),
(180, 7, 28, 1),
(181, 7, 27, 1),
(182, 7, 26, 1),
(183, 7, 25, 1),
(184, 7, 24, 1),
(185, 7, 23, 1),
(186, 7, 22, 1),
(187, 7, 21, 1),
(188, 7, 20, 1),
(189, 7, 38, 1),
(190, 7, 40, 1),
(191, 7, 39, 1),
(192, 7, 43, 1),
(193, 7, 42, 1),
(194, 7, 41, 1),
(195, 7, 54, 1),
(196, 7, 55, 1),
(197, 7, 56, 1),
(198, 7, 57, 1),
(199, 7, 58, 1),
(200, 7, 59, 1),
(201, 7, 62, 1),
(202, 7, 63, 1),
(203, 8, 50, 1),
(204, 8, 51, 1),
(205, 8, 52, 1),
(206, 8, 53, 1),
(207, 8, 19, 1),
(208, 8, 44, 1),
(209, 8, 45, 1),
(210, 8, 46, 1),
(211, 8, 48, 1),
(212, 8, 49, 1),
(213, 8, 3, 1),
(214, 8, 33, 1),
(215, 8, 4, 1),
(216, 8, 5, 1),
(217, 8, 6, 1),
(218, 8, 60, 1),
(219, 8, 8, 1),
(220, 8, 9, 1),
(221, 8, 12, 1),
(222, 8, 11, 1),
(223, 8, 10, 1),
(224, 8, 13, 1),
(225, 8, 47, 1),
(226, 8, 14, 1),
(227, 8, 15, 1),
(228, 8, 16, 1),
(229, 8, 18, 1),
(230, 8, 17, 1),
(231, 8, 2, 1),
(232, 8, 1, 1),
(233, 8, 37, 1),
(234, 8, 36, 1),
(235, 8, 35, 1),
(236, 8, 34, 1),
(237, 8, 32, 1),
(238, 8, 7, 1),
(239, 8, 31, 1),
(240, 8, 30, 1),
(241, 8, 29, 1),
(242, 8, 28, 1),
(243, 8, 27, 1),
(244, 8, 26, 1),
(245, 8, 25, 1),
(246, 8, 24, 1),
(247, 8, 23, 1),
(248, 8, 22, 1),
(249, 8, 21, 1),
(250, 8, 20, 1),
(251, 8, 38, 1),
(252, 8, 40, 1),
(253, 8, 39, 1),
(254, 8, 43, 1),
(255, 8, 42, 1),
(256, 8, 41, 1),
(257, 8, 54, 1),
(258, 8, 55, 1),
(259, 8, 56, 1),
(260, 8, 57, 1),
(261, 8, 58, 1),
(262, 8, 59, 1),
(263, 8, 62, 1),
(264, 8, 63, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `teacher_id`) VALUES
(1, 'Roses', 0),
(2, 'Lilies', 0),
(3, 'Tulip', 0),
(4, 'Daisy', 0),
(5, 'Eagles', 0),
(6, 'Year One', 0),
(7, 'Year Two', 0),
(8, 'Year Three', 0),
(9, 'Year Four', 0),
(10, 'Year Five', 1),
(11, 'Year Six', 1),
(12, 'J.H.S One', 0),
(13, 'J.H.S Two', 1),
(14, 'J.H.S Three', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE IF NOT EXISTS `class_quiz` (
  `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`class_quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE IF NOT EXISTS `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL,
  PRIMARY KEY (`class_subject_overview_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `class_subject_overview`
--

INSERT INTO `class_subject_overview` (`class_subject_overview_id`, `teacher_class_id`, `content`) VALUES
(1, 13, '<p>ytuiyu87ryt utru rye uryu ryu ryu e hj</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `correction`
--

CREATE TABLE IF NOT EXISTS `correction` (
  `correction_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`correction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `correction`
--

INSERT INTO `correction` (`correction_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `student_id`, `fname`) VALUES
(1, '../admin/uploads/corrections/6909_File_banner.jpg', '2020-08-30 07:07:32', 'Computing', 1, 7, 'Worksheet 5'),
(2, '../admin/uploads/corrections/6386_File_banner.jpg', '2020-08-30 07:44:09', 'Computing2', 1, 7, 'Worksheet 5'),
(3, '../admin/uploads/corrections/4880_File_banner.jpg', '2020-08-30 07:48:35', 'Computing1', 1, 7, 'Worksheet 39');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `teacher_class_id`, `date_start`, `date_end`) VALUES
(1, 'test', 0, '02/25/2021', '02/22/2021');

-- --------------------------------------------------------

--
-- Table structure for table `fee_payment`
--

CREATE TABLE IF NOT EXISTS `fee_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `particulars` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `fee_payment`
--

INSERT INTO `fee_payment` (`id`, `student_id`, `amount`, `date`, `particulars`) VALUES
(1, 34, 5000, '2021-02-02', 'This is the first test for payments.'),
(3, 43, 520, '2021-02-18', 'This is the second test for payments.'),
(5, 3, 543, '2021-02-02', 'This is the first test for payments.'),
(6, 28, 234, '2021-02-11', 'This is the second test for payments.'),
(8, 36, 345, '2021-02-12', 'This is the first test for payments.adf'),
(9, 42, 4650, '2021-02-15', 'This is the first test for payments.adf'),
(10, 9, 780, '2021-02-11', 'This is the first test for payments.'),
(11, 46, 5, '2021-02-11', 'gsgfs g'),
(12, 35, 234, '2021-02-03', 'gd sg dg g '),
(13, 35, 345, '2021-02-03', 'sgdfg '),
(14, 13, 10, '2021-02-03', 'vbxvbx  '),
(15, 13, 500, '2021-02-03', 'gd sg dg g '),
(17, 37, 500, '2021-02-05', 'test'),
(18, 38, 9000, '2021-01-06', 'vbxvbx  '),
(19, 22, 200, '2021-02-04', 'ad'),
(20, 10, 500, '2021-03-10', 'Fee payment');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE IF NOT EXISTS `fee_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `termly_fee` int(11) NOT NULL,
  `textbooks` int(11) NOT NULL,
  `exercisebooks` int(11) NOT NULL,
  `stationary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `class_id`, `termly_fee`, `textbooks`, `exercisebooks`, `stationary`) VALUES
(1, 1, 1000, 0, 0, 0),
(2, 2, 850, 0, 0, 50),
(3, 3, 850, 0, 0, 50),
(4, 4, 850, 0, 50, 0),
(5, 5, 1000, 0, 150, 134),
(6, 6, 1200, 650, 500, 120),
(7, 7, 1000, 0, 123, 1000),
(8, 8, 1000, 678, 876, 467),
(9, 9, 958, 758, 578, 58),
(10, 10, 485, 585, 3376, 37),
(11, 11, 3653, 1508, 376, 267),
(12, 12, 456, 35, 774, 266),
(13, 13, 5858, 468, 488, 376),
(14, 14, 6796, 6895, 955, 588);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(500) NOT NULL,
  `fdatein` date NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`, `admin_id`) VALUES
(3, 'uploads/files/5115_File_EUCYn5mX0AY3amE.jpg', '2021-02-27', 'adfdf ', 0, 0, 'Worksheet dfb', '', 1);

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
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE IF NOT EXISTS `message_sent` (
  `message_sent_id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  PRIMARY KEY (`message_sent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `notification_status` varchar(11) NOT NULL,
  `correction_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `notification_status`, `correction_desc`) VALUES
(1, 7, 'You have a correction in <b>Worksheet 5</b>', '2020-08-30 07:07:32', 'correction_student.php', '', 'Computing'),
(2, 0, 'Add Downloadable Materials file name <b>Worksheet 7</b>', '2020-08-30 07:25:10', 'downloadable_student.php', '', ''),
(3, 7, 'You have a correction in <b>Worksheet 5</b>', '2020-08-30 07:44:09', 'correction_student.php', '', 'Computing2'),
(4, 7, 'You have a correction in <b>Worksheet 39</b>', '2020-08-30 07:48:35', 'correction_student.php', '', 'Computing1');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE IF NOT EXISTS `notification_read` (
  `notification_read_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE IF NOT EXISTS `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_read_teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number` int(15) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE IF NOT EXISTS `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL,
  PRIMARY KEY (`question_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE IF NOT EXISTS `quiz_question` (
  `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(100) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`quiz_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE IF NOT EXISTS `school_year` (
  `school_year_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year` varchar(100) NOT NULL,
  PRIMARY KEY (`school_year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(2, '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  `stu_status` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `username`, `password`, `location`, `status`, `balance`, `stu_status`, `dob`, `gender`) VALUES
(50, 'Fabian', 'Ahianyo', 2, 'Gen01', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 4560, 1, '0000-00-00', ''),
(51, 'Aseda', 'Kwarteng', 2, 'Gen02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(52, 'Janelle', 'Apau-Twum', 2, 'Gen03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(53, 'Roshrinah', 'Debrah', 5, 'Num05', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(19, 'Roshpinah Joycelyn', 'Debrah', 10, 'Rut03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(44, 'Eyram', 'Adjei', 4, 'Num04', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(45, 'Dyllix ', 'Hay-Zor', 3, 'Ex01', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(46, 'Maya', 'Wincott', 3, 'Ex02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', -5, 1, '0000-00-00', ''),
(48, 'Jerrell', 'Narh', 3, 'Ex04', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(49, 'Joseph ', 'Apau-Twum', 3, 'Ex05', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(3, 'Kaelah', 'Odei', 7, 'Kin103', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(33, 'Mikayla', 'Achira', 6, 'Deu04', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '2021-03-02', 'Female'),
(4, 'Millicent', 'Asamoah', 7, 'Kin104', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(5, 'Noel', 'Jacobs', 7, 'Kin105', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(6, 'Staniel', 'Hay-Zor', 7, 'Kin106', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(60, 'Elyon', 'Acheampong', 1, 'Num06', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '2021-03-01', 'Male'),
(8, 'Aniela', 'Ahianyo', 8, 'Sam202', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(9, 'Miriam', 'Nartey Kweki', 8, 'Sam203', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(12, 'Jeffrey ', 'Ashong', 8, 'Sam206', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(11, 'Nana Akua', 'Assah', 8, 'Sam205', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(10, 'Albert', 'Dadson Junior', 8, 'Sam204', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 400, 1, '0000-00-00', ''),
(13, 'Emmanuel', 'Tiher Junorh', 9, 'Sam101', 'sungnorh', 'uploads/loading2.jpg', 'Unregistered', -500, 1, '0000-00-00', ''),
(47, 'Manuel', 'Achira', 3, 'Ex03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(14, 'Gabriella', 'Lartey Naa Anorkor', 9, 'Sam102', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(15, 'Nina', 'Nyakpo Seyram', 9, 'Sam103', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(16, 'Akua Ofei', 'Ansah Awima Ayeyi', 9, 'Sam104', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(18, 'Charles', 'Sarsah John', 10, 'Rut02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(17, 'Abraham Mawunyo', 'Seddoh Mikhai', 10, 'Rut01', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(2, 'Victoria ', 'Nyadanu', 7, 'Kin102', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(1, 'Victoria ', 'Mensah', 7, 'Kin101', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(37, 'Elix', 'Hay-Zor', 5, 'Num01', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 400, 1, '0000-00-00', ''),
(36, 'Aziel', 'Ahianyo', 6, 'Deu07', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(35, 'Jason', 'Wincott', 6, 'Deu06', 'thebannerschool', 'uploads/1589910902291479994456.jpg', 'Unregistered', -345, 1, '0000-00-00', ''),
(34, 'Hephzibah E', 'Wilson Jacobs', 6, 'Deu05', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 90, 1, '0000-00-00', ''),
(32, 'Lorna', 'Nyakpo', 6, 'Deu03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(7, 'Kantu', 'Achira', 8, 'Sam201', 'thebannerschool', 'uploads/265913C6-ECA4-41E5-9F1F-BE5BC6F5D8EC.jpeg', 'Registered', 900, 1, '0000-00-00', ''),
(31, 'Julia', 'Ashong', 6, 'Deu02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(30, 'Brynna ', 'Tetteh', 6, 'Deu01', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(29, 'Abena ofei', 'Ansah Ampah Adom', 12, 'Jos05', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(28, 'Chelsea', 'Quarshie', 12, 'Jos04', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(27, 'Mawuena', 'Akoto', 12, 'Jos03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(26, 'Jason Yayra', 'Seddoh Viadimir', 12, 'Jos02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(25, 'Darryl Kweku', 'A. Ayim kwarteng', 12, 'Jos01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered', 900, 1, '0000-00-00', ''),
(24, 'Sheryl', 'Asare', 11, 'Jud04', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(23, 'Kimberly Naa', 'Lartey Larteley', 11, 'Jud03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(22, 'Wingsley Isung', 'Tiher', 11, 'Jud02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 200, 1, '0000-00-00', ''),
(21, 'Damien Nhyira', 'A. Ayim kwarteng', 11, 'Jud01', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(20, 'Anna', 'Ahianyo', 10, 'Rut04', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(38, 'Jesse - Alex', 'Wincott', 5, 'Num02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 2, 1, '0000-00-00', ''),
(40, 'Kendrah', 'Odei', 4, 'Lev01', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(39, 'Jessie', 'Ashong', 5, 'Num03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(43, 'King', 'Quarshie', 4, 'Lev04', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '2021-03-01', 'Male'),
(42, 'Ebenezer', 'Mensah', 4, 'Lev03', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(41, 'Karen', 'Kwarteng', 4, 'Lev02', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(54, 'Bezalel', 'Debrah', 7, 'Kin08', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(55, 'Queen', 'Quarshie', 6, 'Deu08', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(56, 'Angela Eyram', 'Ametepe', 8, 'Sam207', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(57, 'Briana Enam', 'Ametepe', 8, 'Sam208', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(58, 'Mary Naa Dromo', 'Bonney', 3, 'Ex07', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(59, 'Alswell Yayra', 'Ametepe', 3, 'Ex06', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(62, 'Maame Ntesaa', 'Baffour Awuah', 9, 'Sam105', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', ''),
(63, 'Nana Asantewaa', 'Baffour Awuah', 7, 'Kin107', 'thebannerschool', 'uploads/loading2.jpg', 'Unregistered', 900, 1, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE IF NOT EXISTS `student_assignment` (
  `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(100) NOT NULL,
  PRIMARY KEY (`student_assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_backpack`
--

CREATE TABLE IF NOT EXISTS `student_backpack` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE IF NOT EXISTS `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  PRIMARY KEY (`student_class_quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(1, 'Mathematics', 'Mathematics', '', '', 3, '', '3rd'),
(2, 'Integrated Science', 'Integrated Science', '', '', 3, '', '3rd'),
(3, 'Creative Arts', 'Creative Arts', '', '', 3, '', '3rd'),
(4, 'Computing', 'Computing', '', '', 3, '', '3rd'),
(5, 'History of Ghana', 'History of Ghana', '', '', 3, '', '3rd'),
(6, 'Social Studies', 'Social Studies', '', '', 3, '', '3rd'),
(7, 'English Language', 'English Language', '', '', 3, '', '3rd'),
(8, 'I.C.T', 'Information and Communication Technology', '', '', 3, '', '3rd'),
(9, 'R.M.E', 'Religious and Moral Education', '', '', 3, '', '3rd'),
(10, 'Discovery', 'Discovery', '', '', 3, '', '3rd'),
(12, 'Numeracy', 'Numeracy', '', '', 3, '', '3rd'),
(11, 'Science and Nature', 'Science and Nature', '', '', 3, '', '3rd');

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
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `first_name`, `last_name`, `department_id`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(6, 'social', '46454', 'Miss Esther', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(5, 'crarts', '52572', 'Mr. George', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(4, 'integrated', '1234', 'Mr. Jerry', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(3, 'mathematics', '35985', 'Mr. Saviour', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(2, 'english', '55539', 'Mr. Jonathan', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(1, 'computing', '67595', 'Mr. Wisdom', ' ', 11, 'uploads/loading2.jpg', 'banner', 'teacher', 'banner'),
(7, 'ict', '53695', 'Miss Jane', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(9, 'history', '58426', 'Miss Pat', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(11, 'preschool', '89426', 'Miss Racheal', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner'),
(12, 'rme', '44566', 'Mr. Jamin', '', 11, 'uploads/loading2.jpg', 'banner', 'banner', 'banner');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backpack`
--

CREATE TABLE IF NOT EXISTS `teacher_backpack` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE IF NOT EXISTS `teacher_class` (
  `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  PRIMARY KEY (`teacher_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(9, 1, 12, 8, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(10, 1, 11, 8, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(11, 1, 10, 4, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(12, 1, 9, 4, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(13, 1, 8, 4, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(14, 1, 7, 4, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(15, 1, 6, 4, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(16, 2, 12, 7, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(17, 2, 11, 7, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(18, 2, 10, 7, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(19, 2, 9, 7, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(20, 2, 8, 7, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(21, 2, 7, 7, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(22, 2, 6, 7, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(23, 3, 12, 1, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(24, 3, 11, 1, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(25, 3, 10, 1, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(26, 3, 9, 1, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(27, 3, 8, 1, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(28, 3, 7, 1, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(29, 3, 6, 1, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(30, 4, 12, 2, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(31, 4, 11, 2, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(32, 4, 10, 2, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(33, 4, 9, 2, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(34, 4, 8, 2, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(35, 4, 7, 2, '../admin/uploads/thumbnails.jpg', '2020-2021'),
(36, 4, 6, 2, '../admin/uploads/thumbnails.jpg', '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE IF NOT EXISTS `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_class_announcements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE IF NOT EXISTS `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_class_student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(6, 9, 29, 1),
(7, 9, 28, 1),
(8, 9, 27, 1),
(9, 9, 26, 1),
(10, 9, 25, 1),
(11, 10, 24, 1),
(12, 10, 23, 1),
(13, 10, 22, 1),
(14, 10, 21, 1),
(15, 11, 19, 1),
(16, 11, 18, 1),
(17, 11, 17, 1),
(18, 11, 20, 1),
(19, 12, 13, 1),
(20, 12, 14, 1),
(21, 12, 15, 1),
(22, 12, 16, 1),
(23, 12, 62, 1),
(24, 13, 8, 1),
(25, 13, 9, 1),
(26, 13, 12, 1),
(27, 13, 11, 1),
(28, 13, 10, 1),
(29, 13, 7, 1),
(30, 13, 56, 1),
(31, 13, 57, 1),
(32, 13, 61, 1),
(33, 14, 3, 1),
(34, 14, 4, 1),
(35, 14, 5, 1),
(36, 14, 6, 1),
(37, 14, 2, 1),
(38, 14, 1, 1),
(39, 14, 54, 1),
(40, 14, 63, 1),
(41, 15, 33, 1),
(42, 15, 36, 1),
(43, 15, 35, 1),
(44, 15, 34, 1),
(45, 15, 32, 1),
(46, 15, 31, 1),
(47, 15, 30, 1),
(48, 15, 55, 1),
(49, 16, 29, 2),
(50, 16, 28, 2),
(51, 16, 27, 2),
(52, 16, 26, 2),
(53, 16, 25, 2),
(54, 17, 24, 2),
(55, 17, 23, 2),
(56, 17, 22, 2),
(57, 17, 21, 2),
(58, 18, 19, 2),
(59, 18, 18, 2),
(60, 18, 17, 2),
(61, 18, 20, 2),
(62, 19, 13, 2),
(63, 19, 14, 2),
(64, 19, 15, 2),
(65, 19, 16, 2),
(66, 19, 62, 2),
(67, 20, 8, 2),
(68, 20, 9, 2),
(69, 20, 12, 2),
(70, 20, 11, 2),
(71, 20, 10, 2),
(72, 20, 7, 2),
(73, 20, 56, 2),
(74, 20, 57, 2),
(75, 20, 61, 2),
(76, 21, 3, 2),
(77, 21, 4, 2),
(78, 21, 5, 2),
(79, 21, 6, 2),
(80, 21, 2, 2),
(81, 21, 1, 2),
(82, 21, 54, 2),
(83, 21, 63, 2),
(84, 22, 33, 2),
(85, 22, 36, 2),
(86, 22, 35, 2),
(87, 22, 34, 2),
(88, 22, 32, 2),
(89, 22, 31, 2),
(90, 22, 30, 2),
(91, 22, 55, 2),
(92, 23, 29, 3),
(93, 23, 28, 3),
(94, 23, 27, 3),
(95, 23, 26, 3),
(96, 23, 25, 3),
(97, 24, 24, 3),
(98, 24, 23, 3),
(99, 24, 22, 3),
(100, 24, 21, 3),
(101, 25, 19, 3),
(102, 25, 18, 3),
(103, 25, 17, 3),
(104, 25, 20, 3),
(105, 26, 13, 3),
(106, 26, 14, 3),
(107, 26, 15, 3),
(108, 26, 16, 3),
(109, 26, 62, 3),
(110, 27, 8, 3),
(111, 27, 9, 3),
(112, 27, 12, 3),
(113, 27, 11, 3),
(114, 27, 10, 3),
(115, 27, 7, 3),
(116, 27, 56, 3),
(117, 27, 57, 3),
(118, 27, 61, 3),
(119, 28, 3, 3),
(120, 28, 4, 3),
(121, 28, 5, 3),
(122, 28, 6, 3),
(123, 28, 2, 3),
(124, 28, 1, 3),
(125, 28, 54, 3),
(126, 28, 63, 3),
(127, 29, 33, 3),
(128, 29, 36, 3),
(129, 29, 35, 3),
(130, 29, 34, 3),
(131, 29, 32, 3),
(132, 29, 31, 3),
(133, 29, 30, 3),
(134, 29, 55, 3),
(135, 30, 29, 4),
(136, 30, 28, 4),
(137, 30, 27, 4),
(138, 30, 26, 4),
(139, 30, 25, 4),
(140, 31, 24, 4),
(141, 31, 23, 4),
(142, 31, 22, 4),
(143, 31, 21, 4),
(144, 32, 19, 4),
(145, 32, 18, 4),
(146, 32, 17, 4),
(147, 32, 20, 4),
(148, 33, 13, 4),
(149, 33, 14, 4),
(150, 33, 15, 4),
(151, 33, 16, 4),
(152, 33, 62, 4),
(153, 34, 8, 4),
(154, 34, 9, 4),
(155, 34, 12, 4),
(156, 34, 11, 4),
(157, 34, 10, 4),
(158, 34, 7, 4),
(159, 34, 56, 4),
(160, 34, 57, 4),
(161, 34, 61, 4),
(162, 35, 3, 4),
(163, 35, 4, 4),
(164, 35, 5, 4),
(165, 35, 6, 4),
(166, 35, 2, 4),
(167, 35, 1, 4),
(168, 35, 54, 4),
(169, 35, 63, 4),
(170, 36, 33, 4),
(171, 36, 36, 4),
(172, 36, 35, 4),
(173, 36, 34, 4),
(174, 36, 32, 4),
(175, 36, 31, 4),
(176, 36, 30, 4),
(177, 36, 55, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE IF NOT EXISTS `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE IF NOT EXISTS `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  PRIMARY KEY (`teacher_shared_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teacher_shared`
--

INSERT INTO `teacher_shared` (`teacher_shared_id`, `teacher_id`, `floc`, `fdatein`, `fdesc`, `fname`) VALUES
(2, 1, '../admin/uploads/teacher_files/9628_File_Year 2.docx', '2020-09-17 16:58:00', 'sfsdf', 'Worksheet 2'),
(3, 1, '../admin/uploads/teacher_files/9378_File_Year 2.docx', '2020-09-17 16:58:30', 'safdasdf', 'Time Table'),
(4, 1, '../admin/uploads/teacher_files/4910_File_Anna.pdf', '2020-09-17 16:59:04', 'safdasdf', 'Time Table'),
(5, 1, '../admin/uploads/teacher_files/9814_File_Creative arts.docx', '2020-09-17 17:01:07', 'dsadfsdfa', 'Homework 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'Gen01', '2020-08-29 11:20:14', '2020-08-29 11:22:12', 50),
(2, 'Gen01', '2020-08-29 11:22:04', '2020-08-29 11:22:12', 50),
(3, 'Sam201', '2020-08-29 11:22:40', '2020-08-30 09:11:39', 7),
(4, 'admin', '2020-08-29 11:25:42', '2021-02-22 18:18:18', 1),
(5, 'Sam201', '2020-08-30 06:22:11', '2020-08-30 09:11:39', 7),
(6, 'Sam201', '2020-08-30 06:25:49', '2020-08-30 09:11:39', 7),
(7, 'Sam201', '2020-08-30 06:27:11', '2020-08-30 09:11:39', 7),
(8, 'Sam201', '2020-08-30 06:28:04', '2020-08-30 09:11:39', 7),
(9, 'Sam201', '2020-08-30 06:28:39', '2020-08-30 09:11:39', 7),
(10, 'Sam201', '2020-08-30 06:35:56', '2020-08-30 09:11:39', 7),
(11, 'Sam201', '2020-08-30 06:36:53', '2020-08-30 09:11:39', 7),
(12, 'Sam201', '2020-08-30 06:37:49', '2020-08-30 09:11:39', 7),
(13, 'Sam201', '2020-08-30 06:38:34', '2020-08-30 09:11:39', 7),
(14, 'Sam201', '2020-08-30 06:39:37', '2020-08-30 09:11:39', 7),
(15, 'Sam201', '2020-08-30 06:44:47', '2020-08-30 09:11:39', 7),
(16, 'Sam201', '2020-08-30 06:46:09', '2020-08-30 09:11:39', 7),
(17, 'Sam201', '2020-08-30 06:47:28', '2020-08-30 09:11:39', 7),
(18, 'Sam201', '2020-08-30 06:48:36', '2020-08-30 09:11:39', 7),
(19, 'Sam201', '2020-08-30 06:50:06', '2020-08-30 09:11:39', 7),
(20, 'Sam201', '2020-08-30 06:50:53', '2020-08-30 09:11:39', 7),
(21, 'Sam201', '2020-08-30 06:52:12', '2020-08-30 09:11:39', 7),
(22, 'Sam201', '2020-08-30 06:54:09', '2020-08-30 09:11:39', 7),
(23, 'Sam201', '2020-08-30 06:55:50', '2020-08-30 09:11:39', 7),
(24, 'Sam201', '2020-08-30 06:57:15', '2020-08-30 09:11:39', 7),
(25, 'Sam201', '2020-08-30 06:58:12', '2020-08-30 09:11:39', 7),
(26, 'Sam201', '2020-08-30 07:00:24', '2020-08-30 09:11:39', 7),
(27, 'Sam201', '2020-09-01 15:48:18', '', 7),
(28, 'admin', '2021-02-22 15:14:31', '2021-02-22 18:18:18', 1),
(29, 'Jos01', '2021-02-22 18:20:41', '2021-02-22 18:21:06', 25),
(30, 'Jos01', '2021-02-22 18:20:41', '2021-02-22 18:21:06', 25),
(31, 'admin', '2021-02-23 20:32:40', '', 1),
(32, 'admin', '2021-02-23 20:32:41', '', 1),
(33, 'admin', '2021-02-27 12:35:39', '', 1),
(34, 'admin', '2021-02-27 13:04:55', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
