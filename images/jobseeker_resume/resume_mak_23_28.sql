-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2017 at 07:42 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `quotation_master`
--

CREATE TABLE `quotation_master` (
  `quotation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sub_quotations` text NOT NULL,
  `dated` date NOT NULL,
  `time_at` time NOT NULL,
  `current_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_master`
--

INSERT INTO `quotation_master` (`quotation_id`, `customer_id`, `sub_quotations`, `dated`, `time_at`, `current_status`) VALUES
(1, 1, '[{"sub_quotation":"1","status":true}]', '2017-11-11', '20:27:52', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotation_master`
--
ALTER TABLE `quotation_master`
  ADD PRIMARY KEY (`quotation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotation_master`
--
ALTER TABLE `quotation_master`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
