-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 09:47 PM
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

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `appt_id` int(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CREATE TABLE `company` (
  `company_id` int(45) NOT NULL,
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
  `image_url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `contact_person`, `address`, `company_name`, `suffix`, `email`, `tel_num`, `mobile_num`, `alt_number`, `about`, `status`, `image_url`) VALUES
(1, 'test test test', '#1,ortigas  Manila,Pasig City', 'Trend Micro', 'Mr', 'test@gmail.com', '06545646846', '06453468', '09847689', 'Trend Micro Inc. is a Japanese multinational cyber security & defense company founded in Los Angeles, California with global headquarters in Tokyo, Japan, a R&D center in Taipei, Taiwan, and regional headquarters in Asia, Europe and the Americas.', 'registered', 'Trend-Micro-Logo.png'),
(2, '  ', '#1200,MSE Building, Ayala Ave. Metro Manila,Makati', 'Accenture', 'Mr', '', '(02) 841 0111', '', '', 'Accenture solves our clients\' toughest challenges by providing unmatched services in strategy, consulting, digital, technology and operations. We partner with more than three-quarters of the Fortune Global 500, driving innovation to improve the way the world works and lives.', 'registered', 'accenture.png'),
(3, '  ', '#,Nokia-Manila Technology Center? Building I UP Ayala Land Technohub? Commonweal', 'Nokia', 'Mr', 'nokia@gmail.com', '', '+63 28-577-000?', '', 'Nokia is a global leader in innovations such as mobile networks, digital health and phones. See how we create technology to connect.', 'registered', 'nokia.png');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
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
(1, 2, 'Exam', 'Internship', '2018-06-02', '09:00', '11:00', 'Saint Louis University Maryheights Campus', 'D524', 49, 50),
(2, 1, 'Exam', 'Employment', '2018-06-04', '08:00', '09:30', 'Saint Louis University Maryheaights Campus', 'D424', 45, 45),
(3, 3, 'Exam', 'Seminar', '2018-06-08', '13:00', '16:00', 'Prince Bernhard Gym, Saint Louis University', '', 300, 300),
(4, 1, 'Exam', 'Seminar', '2018-06-28', '08:00', '13:00', 'SLU Maryheights', 'AVR', 200, 200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
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
(1, '1234', 'Famae', 'Pascua', 'famaepascua@gmail.com', 2143735, '09099299181', 'BSIT', 4, 'student', 'registered'),
(2, '1234', 'Admin', 'Admin', 'admin@gmail.com', 123456, '05845488', '', 0, 'admin', 'registered'),
(3, '1234', 'Denyse', 'Cayadi', 'denyse@gmail.com', 2146790, '', 'BSIT', 4, 'student', 'registered');

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
  MODIFY `appt_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
