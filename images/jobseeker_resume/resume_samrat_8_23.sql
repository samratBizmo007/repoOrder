-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 11:10 AM
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
-- Table structure for table `jm_userprofile_tab`
--

CREATE TABLE `jm_userprofile_tab` (
  `user_profileId` int(11) NOT NULL,
  `jm_user_id` int(11) NOT NULL,
  `jm_userDesignation` varchar(255) NOT NULL,
  `jm_userCity` varchar(255) NOT NULL,
  `jm_userState` varchar(255) NOT NULL,
  `jm_userCountry` varchar(255) NOT NULL,
  `jm_profile_type` int(11) NOT NULL,
  `jm_userDescription` text NOT NULL,
  `jm_ratePerHr` int(11) NOT NULL,
  `jm_education` text NOT NULL,
  `jm_experience` text NOT NULL,
  `jm_userBookmark` text NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_userprofile_tab`
--

INSERT INTO `jm_userprofile_tab` (`user_profileId`, `jm_user_id`, `jm_userDesignation`, `jm_userCity`, `jm_userState`, `jm_userCountry`, `jm_profile_type`, `jm_userDescription`, `jm_ratePerHr`, `jm_education`, `jm_experience`, `jm_userBookmark`, `last_updated`) VALUES
(1, 1, 'PHP Developer', 'kolhapur', 'Maharashtra', 'India', 1, 'User description as follows here...User description as follows here...User description as follows here...User description as follows here...User description as follows here...User description as follows here...User description as follows here...User description as follows here...User description as follows here...User description as follows here...', 7, '', '', '["2"]', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jm_userprofile_tab`
--
ALTER TABLE `jm_userprofile_tab`
  ADD PRIMARY KEY (`user_profileId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jm_userprofile_tab`
--
ALTER TABLE `jm_userprofile_tab`
  MODIFY `user_profileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
