-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 03:46 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practicum`
--
CREATE DATABASE IF NOT EXISTS `practicum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `practicum`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appt_id` int(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appt_id`, `user_id`, `sched_id`, `appointment_date`) VALUES
(1, 2, 1, '2018-06-08'),
(2, 2, 3, '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(45) NOT NULL,
  `contact_person` varchar(45) NOT NULL,
  `address` varchar(80) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel_num` varchar(45) NOT NULL,
  `mobile_num` varchar(45) NOT NULL,
  `alt_number` varchar(250) DEFAULT NULL,
  `about` text,
  `status` varchar(250) NOT NULL DEFAULT 'registered',
  `image_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `contact_person`, `address`, `company_name`, `suffix`, `email`, `tel_num`, `mobile_num`, `alt_number`, `about`, `status`, `image_url`) VALUES
(1, '  ', '#1200,The Rockwell Business Center, Ortigas Ave. Metro Manila,Pasig City', 'Trend Micro Inc.', 'Mr', 'trendmicro@trend.com.ph', '(02) 995 6200', '2345678', '', 'It is our company\'s mission to protect the world from cyber attacks and digital threats. We can fully equip you to do the same. We build up engineers and cyber security experts who dare to learn, innovate, and lead.', 'registered', 'trend1.png'),
(2, 'Nokia Conper Sample', '#8767,Paseo De Roxas Metro Manila,Makati CIty', 'Nokia', 'Mrs', 'nokiaph@nokia.com.ph', ' (02) 729 6450', '+63 2 944 7676', '', 'Nokia is a Finnish multinational telecommunications, information technology, and consumer electronics company, founded in 1865. Nokia\'s headquarters are in Espoo, in the greater Helsinki metropolitan area.', 'registered', 'nokia1.png'),
(3, 'Sample S Sample', '#1770,Unit 505 5F ATC BPO 1 Madrigal Avenue Alabang Town Center Metro Manila,Mun', 'Advance World Systems/Solutions', 'Mr', 'info@awsys-i.com', '(02) 807 5521', '(02) 889 5070', '', 'Established in 1993 as an Offshore Research and Development arm of a joint venture between IBM Japan and Toshiba TEC, we later on became an independent company, establishing our head office in Japan. ', 'registered', 'aws.png'),
(4, '  ', '#8,Eastwood Avenue Eastwood City Cyberpark E. Rodriguez, Jr. Avenue 1110 Libis M', 'IBM ', 'Mr', 'direct@ph.ibm.com', '1800-1888-1426', '(632) 995-2426', '', 'Since establishing its presence in the Philippines in 1937, IBM has evolved to become the leader in information technology, providing hardware, software and IT-enabled services to domestic and global clients. It is known for the quality of its products and services in a long-standing tradition of excellence, customer satisfaction, and commitment to business ethics and integrity.', 'registered', 'ibm.png');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logsID` int(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity` text NOT NULL,
  `user_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logsID`, `timestamp`, `activity`, `user_id`) VALUES
(1, '2018-06-06 01:52:50', 'Accepted user with id number 2143735.', 1),
(2, '2018-06-07 20:56:50', 'Added Trend Micro Inc. as new company.', 1),
(3, '2018-06-07 20:57:49', 'Added exam schedule for Internship under Trend Micro Inc..', 1),
(4, '2018-06-07 21:00:31', 'Added exam schedule for Internship under Trend Micro Inc..', 1),
(5, '2018-06-07 21:07:44', 'Added exam schedule for Seminar under Trend Micro Inc..', 1),
(6, '2018-06-14 01:17:18', 'Added Nokia as new company.', 1),
(7, '2018-06-17 23:04:05', 'Added exam schedule for Seminar under Nokia.', 1),
(8, '2018-06-18 01:18:43', 'Added exam schedule for Internship under Trend Micro Inc..', 1),
(9, '2018-06-18 01:20:44', 'Added exam schedule for Internship under Trend Micro Inc..', 1),
(10, '2018-06-25 05:00:20', 'Rejected user with id number2144592.', 1),
(11, '2018-06-25 05:00:33', 'Accepted user with id number 2151764.', 1),
(12, '2018-06-25 05:00:35', 'Accepted user with id number 2150226.', 1),
(13, '2018-06-25 05:00:36', 'Accepted user with id number 2146790.', 1),
(14, '2018-06-25 05:38:11', 'Added Advance World Systems/Solutions as new company.', 1),
(15, '2018-06-25 05:45:16', 'Added IBM  as new company.', 1),
(16, '2018-06-25 05:47:41', 'Added exam schedule for Internship under Advance World Systems/Solutions.', 1),
(17, '2018-06-25 05:48:18', 'Added exam schedule for Internship under Advance World Systems/Solutions.', 1),
(18, '2018-06-25 05:57:19', 'Added exam schedule for Employment under Trend Micro Inc..', 1),
(19, '2018-06-25 05:58:07', 'Added exam schedule for Employment under Trend Micro Inc..', 1),
(20, '2018-06-25 05:58:07', 'Added exam schedule for Employment under Trend Micro Inc..', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msgID` int(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `userID` int(15) NOT NULL,
  `senderID` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msgID`, `timestamp`, `message`, `userID`, `senderID`) VALUES
(1, '2018-06-07 21:10:13', 'Sample inquire.', 1, 2),
(2, '2018-06-28 01:06:50', 'I would like to inquire about some incoming seminars.', 1, 2),
(3, '2018-06-28 01:19:50', 'Sample message', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sched_id` int(45) NOT NULL,
  `company_id` int(11) NOT NULL,
  `sched_type` varchar(45) NOT NULL,
  `event_type` varchar(45) NOT NULL,
  `sched_date` varchar(45) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `room` varchar(45) NOT NULL,
  `slots` int(6) NOT NULL,
  `defaultSlot` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_id`, `company_id`, `sched_type`, `event_type`, `sched_date`, `start_time`, `end_time`, `location`, `room`, `slots`, `defaultSlot`) VALUES
(1, 1, 'Exam', 'Internship', '2018-06-20', '09:00', '11:00', 'SLU Maryheights', 'D524', 44, 45),
(2, 1, 'Exam', 'Internship', '2018-06-20', '09:00', '11:00', 'SLU Maryheights', 'D522', 45, 45),
(3, 1, 'Exam', 'Seminar', '2018-06-22', '09:00', '17:00', 'Saint Louis University', 'CCA', 199, 200),
(4, 2, 'Exam', 'Seminar', '2018-06-26', '09:00', '16:00', 'SLU Maryheights', 'AVR', 150, 150),
(5, 1, 'Exam', 'Internship', '2018-06-20', '13:00', '15:00', 'SLU Maryheights', 'D524', 45, 45),
(6, 1, 'Exam', 'Internship', '2018-06-20', '13:00', '15:00', 'SLU Maryheights', 'D522', 45, 45),
(7, 3, 'Exam', 'Internship', '2018-07-05', '09:00', '10:00', 'SLU Maryheights', 'D524', 30, 30),
(8, 3, 'Exam', 'Internship', '2018-07-05', '10:00', '11:00', 'SLU Maryheights', 'D524', 30, 30),
(9, 1, 'Exam', 'Employment', '2018-07-05', '10:00', '11:30', 'SLU Maryheights', 'D522', 10, 10),
(10, 1, 'Exam', 'Employment', '2018-07-06', '09:00', '10:30', 'SLU Maryheights', 'D522', 10, 10),
(11, 1, 'Exam', 'Employment', '2018-07-06', '09:00', '10:30', 'SLU Maryheights', 'D522', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `id_num` int(45) NOT NULL,
  `contact_num` varchar(45) NOT NULL,
  `course` varchar(45) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `user_type` varchar(45) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'registered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `first_name`, `last_name`, `email`, `id_num`, `contact_num`, `course`, `year`, `user_type`, `status`) VALUES
(1, 'admin1234', 'Admin', 'Admin', 'superadmin@gmail.com', 1000123, '09123456789', NULL, NULL, 'admin', 'registered'),
(2, 'user1', 'Fatima Mae', 'Pascua', 'famaepascua@gmail.com', 2143735, '', 'BSIT', 4, 'student', 'registered'),
(3, 'gab123', 'Gabriella', 'Uy', 'gabrielauy@gmail.com', 2151764, '', 'BSIT', 3, 'student', 'registered'),
(4, 'cj1234', 'Crissa Mae Joi', 'Oredina', 'ceejayoredinapanda@gmail.com', 2150226, '', 'BSIT', 3, 'student', 'registered'),
(5, 'den1234', 'Denyse Rae', 'Cayadi', 'draejigz.eartharae@gmail.com', 2146790, '', 'BSIT', 3, 'student', 'registered'),
(6, 'glo1234', 'Gloridhel', 'Goyo', 'gloridhelgoyo@gmail.com', 2144592, '', '', 0, 'alumni', 'rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appt_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logsID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appt_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logsID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msgID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
