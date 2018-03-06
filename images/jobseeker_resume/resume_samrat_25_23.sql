-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 04:29 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_quotation_specialist`
--

CREATE TABLE IF NOT EXISTS `sub_quotation_specialist` (
  `sub_quot_specialist_id` int(11) NOT NULL,
  `wo_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `original_material_name` varchar(255) NOT NULL,
  `changed_material_name` varchar(255) NOT NULL,
  `material_id` int(11) NOT NULL,
  `material_od` int(11) NOT NULL,
  `original_material_length` int(11) NOT NULL,
  `changed_material_length` int(11) NOT NULL,
  `reason_changed_length_material` text NOT NULL,
  `approved` varchar(255) NOT NULL,
  `rejected` varchar(255) NOT NULL,
  `reason_for_rejected` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `submitted_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `current_status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_quotation_specialist`
--
ALTER TABLE `sub_quotation_specialist`
  ADD PRIMARY KEY (`sub_quot_specialist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_quotation_specialist`
--
ALTER TABLE `sub_quotation_specialist`
  MODIFY `sub_quot_specialist_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
