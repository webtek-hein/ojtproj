-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2018 at 05:50 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

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

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appt_id` int(45) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'ongoing',
  PRIMARY KEY (`appt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appt_id`, `user_id`, `sched_id`, `appointment_date`, `status`) VALUES
(1, 1, 1, '2018-05-16', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(45) NOT NULL AUTO_INCREMENT,
  `contact_person` varchar(45) NOT NULL,
  `address` varchar(80) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel_num` varchar(45) NOT NULL,
  `mobile_num` varchar(45) NOT NULL,
  `alt_number` varchar(250) NOT NULL,
  `about` text,
  `status` varchar(250) NOT NULL DEFAULT 'registered',
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `contact_person`, `address`, `company_name`, `suffix`, `email`, `tel_num`, `mobile_num`, `alt_number`, `about`, `status`, `image_url`) VALUES
(1, 'test test test', '#1,ortigas  Manila,Pasig City', 'Heinrich Micro ', 'Mr', 'test@gmail.com', '06545646846', '06453468', '09847689', 'Trend Micro Inc. is a Japanese multinational cyber security & defense company founded in Los Angeles, California with global headquarters in Tokyo, Japan, a R&D center in Taipei, Taiwan, and regional headquarters in Asia, Europe and the Americas.', 'registered', 'Trend-Micro-Logo.png'),
(2, '  ', '#1200,MSE Building, Ayala Ave. Metro Manila,Makati', 'Accenture', 'Mr', '', '(02) 841 0111', '', '', 'Accenture solves our clients\' toughest challenges by providing unmatched services in strategy, consulting, digital, technology and operations. We partner with more than three-quarters of the Fortune Global 500, driving innovation to improve the way the world works and lives.', 'registered', 'accenture.png'),
(3, '  ', '#,Nokia-Manila Technology Center? Building I UP Ayala Land Technohub? Commonweal', 'Nokia', 'Mr', 'nokia@gmail.com', '', '+63 28-577-000?', '', 'Nokia is a global leader in innovations such as mobile networks, digital health and phones. See how we create technology to connect.', 'registered', 'nokia.png'),
(4, 'Heinrich 1 ba', '#1,f test,ag', 'Legit', 'Mr', 'heinrichbangui@gmail.com', '41121', '421421', '231241', 'dsc', 'registered', '17274043_1357756327581124_1455685824_o.jpg'),
(5, 'Heinrich 1 ba', '#1,f test,ag', 't1', 'Mrs', 'heinrichbangui@gmail.com', '41121', '09997653851', '231241', 'des', 'registered', '17274043_1357756327581124_1455685824_o1.jpg'),
(6, 'Hein 11 heiehi', '#1,213 test,test', 'Mycom', 'Mr', 'dummy@gmail.com', '41121', '421421', '231241', 'desc', 'registered', '17274043_1357756327581124_1455685824_o2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `logsID` int(15) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity` text NOT NULL,
  `user_id` int(15) NOT NULL,
  PRIMARY KEY (`logsID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logsID`, `timestamp`, `activity`, `user_id`) VALUES
(1, '2018-06-02 03:41:14', 'something', 1),
(2, '2018-06-02 04:02:02', 'Text here', 2),
(3, '2018-06-02 05:24:58', 'Accepted user 2151287', 2),
(4, '2018-06-02 05:25:02', 'Rejected user 2114464', 2),
(5, '2018-06-02 05:26:39', 'Archived user 1.', 2),
(6, '2018-06-02 05:29:33', 'Archived user Denyse Cayadi.', 2),
(7, '2018-06-02 05:31:10', 'Updated information of Bangui Heinrich.', 2),
(8, '2018-06-02 05:32:13', 'Mycom as new company.', 2),
(9, '2018-06-02 05:33:10', 'Archived user .', 2),
(10, '2018-06-02 05:34:52', 'Archived user .', 2),
(11, '2018-06-02 05:39:30', 'Trend Micro has been archived.', 2),
(12, '2018-06-02 05:39:40', 'Archived user Bangui Heinrich.', 2),
(13, '2018-06-02 05:40:48', 'Mycom has been reverted.', 2),
(14, '2018-06-02 05:40:52', 't1 has been reverted.', 2),
(15, '2018-06-02 05:40:54', 't has been reverted.', 2),
(16, '2018-06-02 05:43:06', 'Updated information of t', 2),
(17, '2018-06-02 05:44:03', 'Added exam schedule for Internshipunder Trend Micro', 2),
(18, '2018-06-02 05:44:52', 'Updated information of Trend Micro', 2),
(19, '2018-06-02 05:49:33', 'Updated exam schedule for Internship under Heinrich Micro .', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `sched_id` int(45) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `sched_type` varchar(45) NOT NULL,
  `event_type` varchar(45) NOT NULL,
  `sched_date` varchar(45) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `room` varchar(45) NOT NULL,
  `slots` int(6) NOT NULL,
  `defaultSlot` int(15) NOT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_id`, `company_id`, `sched_type`, `event_type`, `sched_date`, `start_time`, `end_time`, `location`, `room`, `slots`, `defaultSlot`) VALUES
(1, 2, 'Exam', 'Internship', '2018-06-02', '09:00', '11:00', 'Saint Louis University Maryheights Campus', 'D524', 49, 50),
(2, 1, 'Exam', 'Employment', '2018-06-04', '08:00', '09:30', 'Saint Louis University Maryheaights Campus', 'D424', 45, 45),
(3, 3, 'Exam', 'Seminar', '2018-06-08', '13:00', '16:00', 'Prince Bernhard Gym, Saint Louis University', '', 300, 300),
(4, 1, 'Exam', 'Seminar', '2018-06-28', '08:00', '13:00', 'SLU Maryheights', 'AVR', 200, 200),
(5, 5, 'Exam', 'Internship', '2018-06-02', '01:00', '01:01', 'tsett', '1', 1, 1),
(6, 1, 'Exam', 'Internship', '2018-06-02', '15:02', '04:01', 'tsett', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(45) NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `id_num` int(45) NOT NULL,
  `contact_num` varchar(45) NOT NULL,
  `course` varchar(45) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `user_type` varchar(45) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'registered',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `first_name`, `last_name`, `email`, `id_num`, `contact_num`, `course`, `year`, `user_type`, `status`) VALUES
(1, '1234', 'Famae', 'Pascua', 'famaepascua@gmail.com', 2143735, '09099299181', 'BSIT', 4, 'student', 'archived'),
(2, '1234', 'Admin', 'Admin', 'admin@gmail.com', 123456, '05845488', '', 0, 'admin', 'registered'),
(3, '1234', 'Denyse', 'Cayadi', 'denyse@gmail.com', 2146790, '', 'BSIT', 4, 'student', 'archived'),
(4, '1234', 'Bangui', 'Heinrich', 'heinrichbangui@gmail.com', 2151287, '09994467878', 'BSIT', 10, 'student', 'archived'),
(5, '1234', 'dummy', 'Dummy', 'dummy@gmail.com', 2114464, '0977754454', 'BSIT', 4, 'student', 'rejected');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
