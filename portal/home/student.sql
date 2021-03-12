-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: custsql-dom08.eigbox.net
-- Generation Time: Apr 20, 2020 at 11:21 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `username`, `password`, `location`, `status`) VALUES
(19, 'Roshpinah Joycelyn', 'Debrah', 27, 'Rut03', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(17, 'Abraham Mawunyo', 'Seddoh Mikhai', 27, 'Rut01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(18, 'Charles', 'Sarsah John', 27, 'Rut02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(16, 'Akua Ofei', 'Ansah Awima Ayeyi', 26, 'Sam104', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(15, 'Nina', 'Nyakpo Seyram', 26, 'Sam103', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(14, 'Gabriella', 'Lartey Naa Anorkor', 26, 'Sam102', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(13, 'Emmanuel', 'Tiher junorh', 26, 'Sam101', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(10, 'Albert', 'Dadson Junior', 25, 'Sam204', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(11, 'Nana Akua', 'Assah', 25, 'Sam205', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(12, 'Jeffrey ', 'Ashong', 25, 'Sam206', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(9, 'Miriam', 'Nartey Kweki', 25, 'Sam203', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(8, 'Aniela', 'Ahianyo', 25, 'Sam202', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(6, 'Staniel', 'Hay-Zor', 24, 'Kin106', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(5, 'Noel', 'Jacobs', 24, 'Kin105', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(4, 'Millicent', 'Asamoah', 24, 'Kin104', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(3, 'Kaela', 'Odei', 24, 'Kin103', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(2, 'Victoria ', 'Nyadanu', 24, 'Kin102', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(1, 'Victoria ', 'Mensah', 24, 'Kin101', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(20, 'Annah', 'Ahianyo', 27, 'Rut04', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(21, 'Damien Nhyira', 'A. Ayim kwarteng', 28, 'Jud01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(22, 'Wingsley Isung', 'Tiher', 28, 'Jud02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(23, 'Kimberly Naa', 'Lartey Larteley', 28, 'Jud03', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(24, 'Sheryl', 'Asare', 28, 'Jud04', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(25, 'Darryl Kweku', 'A. Ayim kwarteng', 29, 'Jos01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(26, 'Jason Yayra', 'Seddoh Viadimir', 29, 'Jos02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(27, 'Mawuena', 'Akoto', 29, 'Jos03', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(28, 'Chelsea', 'Quarshie', 29, 'Jos04', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(29, 'Abena ofei', 'Ansah Ampah Adom', 29, 'Jos05', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(30, 'Brynna ', 'Tetteh', 30, 'Deu01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(31, 'Julia', 'Ashong', 30, 'Deu02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(32, 'lorna', 'Nyakpo', 30, 'Deu03', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(34, 'Hephzibah E', 'Wilson Jacobs', 30, 'Deu05', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(35, 'Jason', 'Wincott', 30, 'Deu06', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(36, 'Aziel', 'Ahianyo', 30, 'Deu07', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(37, 'Elix', 'Hay-Zor', 31, 'Num01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(38, 'Jesse - Alex', 'Wincott', 31, 'Num02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(39, 'Jessie', 'Ashong', 31, 'Num03', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(40, 'Kendrah', 'Odei', 32, 'Lev01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(41, 'Karen', 'Kwarteng', 32, 'Lev02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(42, 'Ebenezer', 'Mensah', 32, 'Lev03', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(43, 'King', 'Quarshie', 32, 'Lev04', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(44, 'Eyram', 'Adjei', 35, 'Num04', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(45, 'Dyllix ', 'Hay-Zor', 33, 'Ex01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(46, 'Maya', 'Wincott', 33, 'Ex02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(48, 'Jerrell', 'Narh', 33, 'Ex04', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(49, 'Joseph ', 'Apau Twum', 33, 'Ex05', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(50, 'Fabian', 'Ahianyo', 34, 'Gen01', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(51, 'Aseda', 'Kwarteng', 34, 'Gen02', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(52, 'Jannelle', 'Apau Twum', 34, 'Gen03', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(53, 'Roshrinah', 'Debrah', 32, 'Lev06', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(54, 'Bezalel', 'Debrah', 24, 'Kin08', 'thebannerschool', 'uploads/loading2.jpg', 'Registered'),
(55, 'Queen', 'Quarshie', 32, 'Lev6', 'thebannerschool', 'uploads/loading2.jpg', 'registered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
