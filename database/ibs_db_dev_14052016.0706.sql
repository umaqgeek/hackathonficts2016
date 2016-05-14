-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2016 at 01:05 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ibs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `arrival_status`
--

CREATE TABLE IF NOT EXISTS `arrival_status` (
  `as_id` int(11) NOT NULL,
  `as_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arrival_status`
--

INSERT INTO `arrival_status` (`as_id`, `as_desc`) VALUES
(1, 'On the way'),
(2, 'Arrived'),
(3, 'Not moving');

-- --------------------------------------------------------

--
-- Table structure for table `driver_destination`
--

CREATE TABLE IF NOT EXISTS `driver_destination` (
  `dd_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `lo_id_from` int(11) NOT NULL,
  `lo_id_to` int(11) NOT NULL,
  `dd_status` int(11) NOT NULL DEFAULT '1',
  `as_id` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_destination`
--

INSERT INTO `driver_destination` (`dd_id`, `u_id`, `lo_id_from`, `lo_id_to`, `dd_status`, `as_id`) VALUES
(1, 2, 1, 2, 1, 1),
(2, 2, 2, 1, 2, 1),
(3, 2, 2, 3, 1, 1),
(4, 3, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver_location`
--

CREATE TABLE IF NOT EXISTS `driver_location` (
  `dl_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `dl_lat_lon` varchar(200) NOT NULL,
  `dl_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_location`
--

INSERT INTO `driver_location` (`dl_id`, `u_id`, `dl_lat_lon`, `dl_status`) VALUES
(1, 2, '2.308935, 102.3203138', 1),
(2, 3, '2.3089501, 102.32031320000002', 1),
(3, 1, '2.3088236, 102.31034299999999', 1),
(4, 4, '2.3099136, 102.31034399999999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `lo_id` int(11) NOT NULL,
  `lo_name` varchar(200) NOT NULL,
  `lo_lat_lon` varchar(200) NOT NULL,
  `lo_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`lo_id`, `lo_name`, `lo_lat_lon`, `lo_status`) VALUES
(1, 'Kolej Kediaman Seri Utama', '2.2692199, 102.2770457', 1),
(2, 'Kampus Induk (PPP)', '2.310025, 102.318427', 1),
(3, 'Kolej Kediaman Al-Jazari', '2.321679, 102.327845', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `u_id` int(11) NOT NULL,
  `u_fullname` varchar(200) NOT NULL,
  `u_user_no` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `ut_id` int(11) NOT NULL,
  `u_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`u_id`, `u_fullname`, `u_user_no`, `u_password`, `ut_id`, `u_status`) VALUES
(1, 'UMAR MUKHTAR BIN HAMBARAN', 'M031210009', '123', 1, 2),
(2, 'PAK KENSHIN', '00717', 'abc', 2, 1),
(3, 'PAK LEMAN', '00212', 'abc123', 2, 1),
(4, 'AIZEN SOUSUKE', 'B031210001', 'qwe', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_type`
--

CREATE TABLE IF NOT EXISTS `users_type` (
  `ut_id` int(11) NOT NULL,
  `ut_desc` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_type`
--

INSERT INTO `users_type` (`ut_id`, `ut_desc`) VALUES
(1, 'Student'),
(2, 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arrival_status`
--
ALTER TABLE `arrival_status`
  ADD PRIMARY KEY (`as_id`);

--
-- Indexes for table `driver_destination`
--
ALTER TABLE `driver_destination`
  ADD PRIMARY KEY (`dd_id`);

--
-- Indexes for table `driver_location`
--
ALTER TABLE `driver_location`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_type`
--
ALTER TABLE `users_type`
  ADD PRIMARY KEY (`ut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrival_status`
--
ALTER TABLE `arrival_status`
  MODIFY `as_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `driver_destination`
--
ALTER TABLE `driver_destination`
  MODIFY `dd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `driver_location`
--
ALTER TABLE `driver_location`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_type`
--
ALTER TABLE `users_type`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
