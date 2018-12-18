-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 01:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advocates_diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `allcases`
--

CREATE TABLE `allcases` (
  `case_id` int(100) NOT NULL,
  `case_number` varchar(100) NOT NULL,
  `case_type` varchar(100) NOT NULL,
  `complainant_name` varchar(100) NOT NULL,
  `complainant_phone` int(100) NOT NULL,
  `complainant_address` varchar(200) NOT NULL,
  `opponent_name` varchar(100) NOT NULL,
  `opponent_phone` int(100) NOT NULL,
  `opponent_address` varchar(200) NOT NULL,
  `previous_date` varchar(1000) NOT NULL,
  `next_date` date NOT NULL,
  `court_name` varchar(100) NOT NULL,
  `court_type` varchar(100) NOT NULL,
  `court_genre` varchar(100) NOT NULL,
  `refered_by` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `case_created` date NOT NULL,
  `case_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allcases`
--

INSERT INTO `allcases` (`case_id`, `case_number`, `case_type`, `complainant_name`, `complainant_phone`, `complainant_address`, `opponent_name`, `opponent_phone`, `opponent_address`, `previous_date`, `next_date`, `court_name`, `court_type`, `court_genre`, `refered_by`, `comment`, `user_id`, `case_created`, `case_updated`) VALUES
(11, '709', 'CR', 'shonzon', 1568732900, 'kushtia', 'soro', 1766669908, 'chapai', '2018-06-04', '2018-06-04', 'SR', 'DJ', '8', 'zahin', 'mothertut', 23, '2018-04-04', '2018-04-04'),
(15, 'hatom', 'MISC', 'bnsnznms', 2147483647, 'nsnsnsn.xj', 'znzbnsnnd', 2147483647, 'man zmsjs', '2018-11-02,2018-11-02,2018-12-02,2019-01-02', '2019-01-02', 'CJK', 'DJ', 'nznxnnd', 'jsnnd.xn', 'msbnsmsnx', 25, '2018-05-26', '2018-06-02'),
(18, '334354534534', 'SESSION', 'fsdfsdxzv', 2147483647, 'xvxcvdvxcvxcv', 'adssafsa', 1234567890, 'dtrdtcghchg', '2018-11-02,2019-01-22,2019-02-24,2019-02-24,2019-02-24,2019-02-26,2019-02-27,2019-02-27,2019-02-27,2019-02-27,2019-02-27,2019-02-27,2019-02-28,2019-03-04', '2019-03-04', 'SR', 'DJ', 'XBVXDGBVX', 'XVXZVX', 'cfhcfhcfh', 25, '2018-05-28', '2018-06-02'),
(19, '09876543', 'SESSION', 'fsdfsdxzv', 1737080407, '42,Mollapara Lane,Udibari,Post:Jagati', 'adssafsa', 1737080407, '111/6,mollabari, niketon bazar', '2018-11-23,2018-12-23,2019-01-23,2019-01-23,2019-02-28', '2019-02-28', 'SR', 'DJ', 'dfhdfchfhc', 'XVXZVX', 'cfhcfhcfh', 25, '2018-05-28', '2018-06-02'),
(20, '07867565', 'FS', 'q4fgdfgxfg', 1737080407, '42,Mollapara Lane,Udibari,Post:Jagati', 'sfsdgdfxgxfgc', 1737080407, '111/6,mollabari, niketon bazar', '2018-06-15,2018-06-16', '2018-06-16', 'JM 2', 'APPEAL', 'dfhdfchfhc', 'XVXZVX', 'cfhcfhcfh', 25, '2018-06-01', '2018-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `allsubusers`
--

CREATE TABLE `allsubusers` (
  `sub_user_id` int(100) NOT NULL,
  `sub_user_name` varchar(100) NOT NULL,
  `sub_user_email` varchar(100) NOT NULL,
  `sub_user_phone` int(100) NOT NULL,
  `sub_user_password` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `sub_date_updated` date NOT NULL,
  `sub_date_created` date NOT NULL,
  `forgetpass` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allsubusers`
--

INSERT INTO `allsubusers` (`sub_user_id`, `sub_user_name`, `sub_user_email`, `sub_user_phone`, `sub_user_password`, `user_id`, `sub_date_updated`, `sub_date_created`, `forgetpass`) VALUES
(7, 'arefin', 'arefin@gmail.com', 2147483647, '25f9e794323b453885f5181f1b624d0b', 22, '2018-04-02', '2018-04-02', NULL),
(8, 'imrul kayes', 'imrul@gmail.com', 1236598752, 'fcea920f7412b5da7be0cf42b8c93759', 22, '2018-04-02', '2018-04-02', NULL),
(9, 'molla', 'molla@gmail.com', 1674999469, '547d12532bd2907a5b90e69b8419cf8f', 23, '2018-04-04', '2018-04-04', NULL),
(10, 'turzo', 'turjo@gmail.com', 1254678963, '25f9e794323b453885f5181f1b624d0b', 0, '2018-04-04', '2018-04-04', NULL),
(11, 'Rafiq', 'khanshonzon@hotmail.com', 2147483647, 'e807f1fcf82d132f9bb018ca6738a19f', 25, '2018-05-23', '2018-05-23', 297726);

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE `allusers` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` int(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` int(100) NOT NULL,
  `user_updated` date NOT NULL,
  `date_created` date NOT NULL,
  `forgetpass` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_type`, `user_updated`, `date_created`, `forgetpass`) VALUES
(23, 'zahin', 'fake@gmail.com', 1634512036, 'e890b73df5c87c2a8c41376ebd792ffd', 0, '2018-04-04', '2018-04-04', NULL),
(25, 'shanzan', 'shanzan001@hotmail.com', 1737080407, 'e807f1fcf82d132f9bb018ca6738a19f', 0, '2018-05-21', '2018-05-21', 317117),
(26, 'hasan', 'hasan@gmail.com', 2147483647, '25f9e794323b453885f5181f1b624d0b', 0, '2018-05-22', '2018-05-22', NULL),
(27, 'Rahim', 'rahim@gmail.com', 2147483647, 'e807f1fcf82d132f9bb018ca6738a19f', 0, '2018-05-30', '2018-05-30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allcases`
--
ALTER TABLE `allcases`
  ADD PRIMARY KEY (`case_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `allsubusers`
--
ALTER TABLE `allsubusers`
  ADD PRIMARY KEY (`sub_user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `allusers`
--
ALTER TABLE `allusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allcases`
--
ALTER TABLE `allcases`
  MODIFY `case_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `allsubusers`
--
ALTER TABLE `allsubusers`
  MODIFY `sub_user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `allusers`
--
ALTER TABLE `allusers`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
