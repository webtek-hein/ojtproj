-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 02:55 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `appointment_date` date NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appt_id`, `user_id`, `sched_id`, `appointment_date`, `status`) VALUES
(10, 1, 2, '2018-04-13', 'ongoing'),
(11, 1, 3, '2018-04-13', 'ongoing'),
(12, 1, 1, '2018-04-13', 'ongoing'),
(13, 1, 4, '2018-04-13', 'ongoing');

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
  `alt_number` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'registered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `contact_person`, `address`, `company_name`, `suffix`, `email`, `tel_num`, `mobile_num`, `alt_number`, `status`) VALUES
(1, 'Bangui Paragas Heinrich', '#2,Ortigas Avenue Manila,Pasig City', 'Trend Micro', 'Mr', 'hb@gmail.com', '112-122-313', '+632 995 6200', '+63 917 805 8104', 'registered'),
(2, 'Bacani test Bench', '#1,Marikina Manila,Pasay', 'Accenture', 'Mr', 'bench@gmail.com', '1231298', '901238120938', '2109832190', 'registered');

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
(1, 1, 'Exam', 'Internship', '2018-04-08', '01:00', '13:00', 'test', 'test', 399, 0),
(2, 1, 'Exam', 'Employment', '2018-04-08', '01:00', '13:00', 'test', '12312', 2, 0),
(3, 1, 'Exam', 'Employment', '2018-04-13', '08:00', '17:00', 'Bakakeng, SLU', 'D423', 197, 0),
(4, 1, 'Exam', 'Employment', '2018-05-04', '17:00', '20:00', 'SLU, Main Campus', 'Prince Bernhard Gym', 399, 400);

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
  `course` varchar(45) NOT NULL,
  `year` int(11) NOT NULL,
  `user_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `first_name`, `last_name`, `email`, `id_num`, `contact_num`, `course`, `year`, `user_type`) VALUES
(1, '1234', 'Famae', 'Pascua', 'famaepascua@gmail.com', 2151287, '09099299181', 'BSIT', 4, 'student'),
(2, '1234', 'Ian', 'Alinso', 'alinsothegreat@gmail.com', 2146624, '05845488', 'BSIT', 4, 'admin');

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
  MODIFY `appt_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
