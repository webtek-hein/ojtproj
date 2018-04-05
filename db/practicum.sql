-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 10:54 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appt_id` int(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(80) NOT NULL,
  `contact_person` varchar(45) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel_num` varchar(45) NOT NULL,
  `mobile_num` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `slots` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(45) NOT NULL,
  `user_name` varchar(45) NOT NULL,
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

INSERT INTO `user` (`user_id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `id_num`, `contact_num`, `course`, `year`, `user_type`) VALUES
(1, 'famae', '123', 'Famae', 'Pascua', 'famaepascua@gmail.com', 2143735, '09163320433', 'BSIT', 4, 'admin'),
(3, 'hein', '1234', 'Heinrich', 'Bangui', 'heinrichbangui@gmail.com', 2151287, '09997653851', 'BSIT', 4, 'student');

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
  MODIFY `appt_id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sched_id` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
