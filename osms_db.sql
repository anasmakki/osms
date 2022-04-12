-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 10:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `p_dop` date NOT NULL,
  `p_available` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `p_originalcost` int(11) NOT NULL,
  `p_sellingcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`p_id`, `p_name`, `p_dop`, `p_available`, `p_total`, `p_originalcost`, `p_sellingcost`) VALUES
(2, 'Keyboard', '2022-03-07', 8, 10, 250, 240),
(3, 'Mouse', '2022-03-01', 13, 15, 1000, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(1, 3, 'Tv not working', 'Tv make noise when every time even that if it is switched off by remote (if not by tv power button). Moreover, Picture is not clear.', 'Sufyan Salfi', 'Dhanola Baipass', 'Millat Road', 'Faisalabad', 'Punjab', 34500, 'anas@gmail.com', 3077176603, 'Umar', '2022-03-30'),
(3, 4, 'Laptop Not Working', 'Keyboard making problem', 'Sana Ali', 'Green Town', 'Millat Road', 'Faisalabad', 'Punjab', 4342, 'sana@gmail.com', 3020006566, 'Ayoub Khadim', '2022-03-07'),
(4, 5, 'Tv Problem', 'My Tv makes noise too much every time.', 'Sufyan Salfi', 'Tariq COlony', 'Mamunkanjan', 'Faisalabad', 'Punjab', 43232, 'sana@gmail.com', 40203003, 'Boota Singh', '2022-03-07'),
(5, 3, 'Tv not working', 'Tv make noise when every time even that if it is switched off by remote (if not by tv power button). Moreover, Picture is not clear.', 'Sufyan Salfi', 'Dhanola Baipass', 'Millat Road', 'Faisalabad', 'Punjab', 34500, 'anasmakki255@gmail.com', 3077176603, 'Boota Singh', '2022-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cust_add` varchar(60) COLLATE utf8_bin NOT NULL,
  `cp_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `cp_quantity` int(11) NOT NULL,
  `cp_each` int(11) NOT NULL,
  `cp_total` int(11) NOT NULL,
  `cp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`cust_id`, `cust_name`, `cust_add`, `cp_name`, `cp_quantity`, `cp_each`, `cp_total`, `cp_date`) VALUES
(1, 'Usama', 'Chakwal', 'Keyboard 2-PCS', 2, 240, 480, '2022-03-09'),
(2, 'Sarfraz', 'Chinyot', 'Mouse', 2, 1500, 3000, '2022-03-09'),
(3, 'Umar Gul', 'Lahore', 'Keyboard', 1, 240, 240, '2022-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(10, '  User', 'user@gmail.com', 'user'),
(12, 'Anas Makki', 'anas@gmail.com', 'password'),
(13, 'Sana Ali', 'sana@gmail.com', 'password'),
(14, 'Sharjeel Ahmad', 'sharjeel@gmail.com', 'password'),
(15, 'Sameer Sajjid', 'sameer@gmail.com', 'password'),
(16, 'Hanzla Ur Rahman', 'hanzla@gmail.com', 'password'),
(17, 'Raheel Baig', 'raheel@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(255) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(255) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(2, 'ksalfjl', 'lkfajsl', 'kflasjklaf', 'klfajlk', 'falksjd', 'fajskdlj', 'afklsj', 0, 'anas@gmail.com', 0, '2022-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `emp_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `emp_mobile` bigint(20) NOT NULL,
  `emp_email` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`emp_id`, `emp_name`, `emp_city`, `emp_mobile`, `emp_email`) VALUES
(2, 'Ayoub Khadim', 'Lahore', 3028477338, 'ayoub@gmail.com'),
(3, 'Umar', 'Multan', 42991992, 'umar@gmail.com'),
(4, 'Boota Singh', 'Faisalabad', 3040058588, 'boota@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
