-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 06:00 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `registration_date`) VALUES
(1, 'ABDUL ABDUL', 'abdul@gmail.com', '1234567', '2021-03-27 07:21:19'),
(3, 'martha', 'martha@gmail.com', 'martha', '2021-03-27 06:58:29'),
(4, 'Ihssan', 'Ihssan@gmail.com', 'ihssan123', '2021-03-30 08:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `healthcare_title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('Active Now','Offline Now') NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `firstname`, `lastname`, `gender`, `healthcare_title`, `description`, `email`, `phone_num`, `password`, `image`, `status`, `verified`, `token`, `creation_date`) VALUES
(2, 'Martha', 'Asamoah Yeboah', 'Female', 'Nurse', 'Handling issues ', 'math@gmail.com', '12785486125', 'martha123', '', '', 0, '', '2021-03-28 07:32:06'),
(3, 'Ihssan', 'Idris', 'Female', 'Senior Nurse', 'Heading all nurses ', 'ihssan.i@gmail.com', '05466722342', 'ihssan12', '1618636749-ABDUL.jpg', 'Offline Now', 0, '', '2021-04-17 05:19:09'),
(4, 'Hassan', 'Idris', 'Male', 'Physiotheraphy', ' ', 'idris@justha.com', '0987654321', '123456', '', '', 0, '', '2021-04-02 08:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `incoming_msg_id` int(100) NOT NULL,
  `outgoing_msg_id` int(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(44, 18, 3, 'hi'),
(45, 18, 3, 'how are you'),
(46, 18, 3, 'martha');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pat_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenum` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `token` varchar(250) NOT NULL,
  `status` enum('Offline now','Active now') NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pat_id`, `firstname`, `lastname`, `email`, `phonenum`, `gender`, `birthday`, `image`, `password`, `verified`, `token`, `status`, `registration_date`) VALUES
(14, 'Abdul', 'abdul ', 'abdul@gmail.com', '1234567890', 'Male', '2021-03-26', '', '12345678', 0, '', 'Active now', '2021-03-29 15:21:44'),
(15, 'Ihssan', 'Ihssan ', 'ihssan@gmail.com', '02416782933', 'Female', '1998-02-28', '', 'ihssan12', 0, '', 'Offline now', '2021-03-29 03:16:29'),
(16, 'Eric', 'wang ', 'eric@qq.com', '18765323833', 'Male', '2014-06-02', '', 'eric12345', 0, '', 'Offline now', '2021-04-02 07:53:57'),
(17, 'Liting', 'liting ', 'liting@qq.com', '02416782933', 'Female', '2021-04-02', '', 'sfsbsgsafd', 0, '', 'Offline now', '2021-04-02 07:58:46'),
(18, 'Abdul', 'Yakubu', 'abdul.handstech@yahoo.com', '17858992627', 'Female', '2021-04-16', '1618123591-ABDUL.jpg', 'abdul123', 1, '72fa7de6f588d66522799b8ac87e06eb6b1798914002da1425a760e16b157d3c3dd48b4ae7a0654429c6f8d2de77a67d7773', 'Offline now', '2021-04-11 06:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `request_status` enum('Pending','Confirm','Reject') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `pat_id`, `doc_id`, `request_status`, `date`) VALUES
(46, 18, 3, 'Confirm', '2021-04-17 05:20:06'),
(47, 18, 2, 'Confirm', '2021-04-17 05:21:18'),
(48, 16, 2, 'Confirm', '2021-04-17 05:23:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`pat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`doc_id`) REFERENCES `doctor` (`doc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
