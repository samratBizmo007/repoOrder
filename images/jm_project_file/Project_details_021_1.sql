-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2018 at 09:58 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_mandi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jm_portfolio_data`
--

CREATE TABLE `jm_portfolio_data` (
  `jm_portfolio_id` int(11) NOT NULL,
  `jm_user_id` int(11) NOT NULL,
  `jm_profile_type` int(11) NOT NULL,
  `jm_portfolio_file` varchar(255) NOT NULL,
  `jm_portfolio_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_portfolio_data`
--

INSERT INTO `jm_portfolio_data` (`jm_portfolio_id`, `jm_user_id`, `jm_profile_type`, `jm_portfolio_file`, `jm_portfolio_details`) VALUES
(4, 1, 1, 'images/profile/portfolio_image/Portfolio_details_01_1_1.jpg', 'cccc'),
(8, 1, 1, 'images/profile/portfolio_image/Portfolio_details_01_1_5.jpg', '<div style="text-align: center;"><span style="font-weight: bold; text-decoration-line: underline;">Heading 1</span></div><div style="text-align: justify;">Portflio content for test purpose <span style="font-weight: bold;">Portflio content for test purpose</span> Portflio content for test purpose Portflio content for test purpose&nbsp;</div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jm_portfolio_data`
--
ALTER TABLE `jm_portfolio_data`
  ADD PRIMARY KEY (`jm_portfolio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jm_portfolio_data`
--
ALTER TABLE `jm_portfolio_data`
  MODIFY `jm_portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
