-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 04:19 PM
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
-- Table structure for table `jm_project_list`
--

CREATE TABLE `jm_project_list` (
  `jm_project_id` int(11) NOT NULL,
  `jm_posted_user_id` int(11) NOT NULL,
  `jm_posted_profile_id` int(11) NOT NULL,
  `jm_freelancer_user_id` int(11) NOT NULL,
  `jm_project_title` varchar(1000) NOT NULL,
  `jm_project_description` varchar(1000) NOT NULL,
  `jm_job_type` varchar(1000) NOT NULL,
  `jm_posting_date` date NOT NULL,
  `jm_project_bid` decimal(10,0) NOT NULL,
  `jm_project_price` decimal(10,0) NOT NULL,
  `jm_posted_time` datetime NOT NULL,
  `jm_time_estimation` datetime NOT NULL,
  `jm_project_skill` varchar(1000) NOT NULL,
  `freelancer_rating` int(11) NOT NULL,
  `employer_rating` int(11) NOT NULL,
  `freelancer_comment` text NOT NULL,
  `employer_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_project_list`
--

INSERT INTO `jm_project_list` (`jm_project_id`, `jm_posted_user_id`, `jm_posted_profile_id`, `jm_freelancer_user_id`, `jm_project_title`, `jm_project_description`, `jm_job_type`, `jm_posting_date`, `jm_project_bid`, `jm_project_price`, `jm_posted_time`, `jm_time_estimation`, `jm_project_skill`, `freelancer_rating`, `employer_rating`, `freelancer_comment`, `employer_comment`) VALUES
(1, 2, 4, 1, 'Social Network Analysis Utilizing Big Data Technology', 'Innovations in technology and greater affordability of digital devices have presided over today’s Age of Big Data, an umbrella term for the explosion in the quantity and diversity of high frequency digital data. These data hold the potential as yet largely untapped to allow decision makers to track', 'Fixed Price', '2018-01-01', '25000', '25000', '2018-01-01 04:20:00', '2018-01-17 03:00:00', '["3","2","1"]', 3, 4, '', ''),
(2, 2, 4, 1, 'Android Map Application', 'Nowadays people use maps everyday in many situations. Maps are available and free. What was expensive and required the user to get a paper copy in a shop is now available on any Smartphone', 'Hourly', '2018-01-02', '35000', '35000', '2018-01-02 03:18:00', '2018-01-17 01:00:00', 'c,cpp,java,Android', 2, 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jm_skills_tab`
--

CREATE TABLE `jm_skills_tab` (
  `jm_skill_id` int(11) NOT NULL,
  `jm_skill_name` varchar(255) NOT NULL,
  `extra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_skills_tab`
--

INSERT INTO `jm_skills_tab` (`jm_skill_id`, `jm_skill_name`, `extra`) VALUES
(1, 'CSS', 0),
(2, 'HTML', 0),
(3, 'java', 0),
(4, 'Spring', 0);

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
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jm_userSkills_tab`
--

CREATE TABLE `jm_userSkills_tab` (
  `jm_userSkill_id` int(11) NOT NULL,
  `jm_user_id` int(11) NOT NULL,
  `jm_profile_type` int(11) NOT NULL,
  `jm_skills` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_userSkills_tab`
--

INSERT INTO `jm_userSkills_tab` (`jm_userSkill_id`, `jm_user_id`, `jm_profile_type`, `jm_skills`, `status`) VALUES
(2, 1, 1, '["1","2"]', 0),
(3, 1, 2, '["3","4"]', 0),
(4, 2, 3, '[]', 0),
(5, 2, 1, '["1","2"]', 0),
(6, 2, 2, '["2","1"]', 0),
(7, 8, 2, '["2","1","4"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jm_usertransaction_tab`
--

CREATE TABLE `jm_usertransaction_tab` (
  `transaction_id` int(11) NOT NULL,
  `jm_user_id` int(11) NOT NULL,
  `paid_thisMonth` decimal(15,2) NOT NULL,
  `paid_toDate` decimal(15,2) NOT NULL,
  `earn_thisMonth` decimal(15,2) NOT NULL,
  `earn_toDate` decimal(15,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_usertransaction_tab`
--

INSERT INTO `jm_usertransaction_tab` (`transaction_id`, `jm_user_id`, `paid_thisMonth`, `paid_toDate`, `earn_thisMonth`, `earn_toDate`, `status`) VALUES
(1, 1, '0.00', '0.00', '0.00', '0.00', 0),
(2, 2, '0.00', '0.00', '0.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jm_user_tab`
--

CREATE TABLE `jm_user_tab` (
  `jm_user_id` int(11) NOT NULL,
  `jm_username` varchar(255) NOT NULL,
  `jm_email_id` varchar(255) NOT NULL,
  `jm_contactNo` bigint(20) NOT NULL,
  `jm_password` varchar(255) NOT NULL,
  `jm_profile_type` int(11) NOT NULL,
  `membership_package` varchar(255) NOT NULL DEFAULT 'FREE',
  `avail_bids` int(11) NOT NULL,
  `total_bids` int(11) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `profile_completed` tinyint(1) NOT NULL,
  `payment_verified` tinyint(1) NOT NULL,
  `phone_verified` tinyint(1) NOT NULL,
  `jm_sessionToken` varchar(255) NOT NULL,
  `jm_loginTime` time NOT NULL,
  `jm_logoutTime` time NOT NULL,
  `jm_current_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_user_tab`
--

INSERT INTO `jm_user_tab` (`jm_user_id`, `jm_username`, `jm_email_id`, `jm_contactNo`, `jm_password`, `jm_profile_type`, `membership_package`, `avail_bids`, `total_bids`, `verification_code`, `email_verified`, `profile_completed`, `payment_verified`, `phone_verified`, `jm_sessionToken`, `jm_loginTime`, `jm_logoutTime`, `jm_current_status`) VALUES
(1, 'samrat', 'mundesamrat@gmail.com', 0, 'samrat', 1, 'FREE', 35, 35, 'bXVuZGVzYW1yYXRAZ21haWwuY29t', 1, 0, 0, 0, '', '00:00:00', '00:00:00', 1),
(2, 'samrat', 'mundesamrat@gmail.com', 0, 'samrat', 4, 'FREE', 0, 0, 'bXVuZGVzYW1yYXRAZ21haWwuY29t', 0, 0, 0, 0, '', '00:00:00', '00:00:00', 0),
(3, 'sam', 'mundesamrat@gmail.com', 0, 'samrat', 2, 'FREE', 0, 0, 'bXVuZGVzYW1yYXRAZ21haWwuY29t', 0, 0, 0, 0, '', '00:00:00', '00:00:00', 0),
(6, 'ranjeet', 'ranjeet.wagh@bizmo-tech.com', 0, 'ranjeet', 3, '', 0, 0, 'cmFuamVldC53YWdoQGJpem1vLXRlY2guY29t', 0, 0, 0, 0, '', '00:00:00', '00:00:00', 0),
(7, 'demo_user', 'samratbizmotech@gmail.com', 0, 'samrat', 2, '', 0, 0, 'c2FtcmF0Yml6bW90ZWNoQGdtYWlsLmNvbQ==', 14, 0, 0, 0, '', '00:00:00', '00:00:00', 0),
(9, 'swapnil ', 'swapnil.bizmotech@gmail.com', 0, 'swap', 4, 'FREE', 0, 0, 'c3dhcG5pbC5iaXptb3RlY2hAZ21haWwuY29t', 2, 0, 0, 0, '', '00:00:00', '00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jm_project_list`
--
ALTER TABLE `jm_project_list`
  ADD PRIMARY KEY (`jm_project_id`);

--
-- Indexes for table `jm_skills_tab`
--
ALTER TABLE `jm_skills_tab`
  ADD PRIMARY KEY (`jm_skill_id`);

--
-- Indexes for table `jm_userprofile_tab`
--
ALTER TABLE `jm_userprofile_tab`
  ADD PRIMARY KEY (`user_profileId`);

--
-- Indexes for table `jm_userSkills_tab`
--
ALTER TABLE `jm_userSkills_tab`
  ADD PRIMARY KEY (`jm_userSkill_id`);

--
-- Indexes for table `jm_usertransaction_tab`
--
ALTER TABLE `jm_usertransaction_tab`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `jm_user_tab`
--
ALTER TABLE `jm_user_tab`
  ADD PRIMARY KEY (`jm_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jm_project_list`
--
ALTER TABLE `jm_project_list`
  MODIFY `jm_project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jm_skills_tab`
--
ALTER TABLE `jm_skills_tab`
  MODIFY `jm_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jm_userprofile_tab`
--
ALTER TABLE `jm_userprofile_tab`
  MODIFY `user_profileId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jm_userSkills_tab`
--
ALTER TABLE `jm_userSkills_tab`
  MODIFY `jm_userSkill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jm_usertransaction_tab`
--
ALTER TABLE `jm_usertransaction_tab`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jm_user_tab`
--
ALTER TABLE `jm_user_tab`
  MODIFY `jm_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
