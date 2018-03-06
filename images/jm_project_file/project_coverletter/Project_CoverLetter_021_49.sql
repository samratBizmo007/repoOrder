-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 01:51 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ijarline`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `extra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`cat_id`, `cat_name`, `extra`) VALUES
(2, 'Games', 0),
(9, 'Bikes', 0),
(10, 'Party', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jm_user_tab`
--

CREATE TABLE `jm_user_tab` (
  `jm_user_id` int(11) NOT NULL,
  `jm_username` varchar(255) NOT NULL,
  `jm_email_id` varchar(255) NOT NULL,
  `jm_password` varchar(255) NOT NULL,
  `jm_profile_type` int(11) NOT NULL,
  `jm_user_descr` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `jm_sessionToken` varchar(255) NOT NULL,
  `jm_loginTime` time NOT NULL,
  `jm_logoutTime` time NOT NULL,
  `jm_current_status` int(11) NOT NULL,
  `jm_avg_rating` decimal(15,1) NOT NULL,
  `jm_membership_rating` decimal(15,1) NOT NULL,
  `jm_project_cost` decimal(15,1) NOT NULL,
  `jm_project_completed` decimal(15,1) NOT NULL,
  `jm_rank` decimal(15,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jm_user_tab`
--

INSERT INTO `jm_user_tab` (`jm_user_id`, `jm_username`, `jm_email_id`, `jm_password`, `jm_profile_type`, `jm_user_descr`, `verification_code`, `email_verified`, `jm_sessionToken`, `jm_loginTime`, `jm_logoutTime`, `jm_current_status`, `jm_avg_rating`, `jm_membership_rating`, `jm_project_cost`, `jm_project_completed`, `jm_rank`) VALUES
(1, 'samrat', 'sam@gmail.com', 'samrat', 1, 'abcdddddddd', '', 0, '', '00:00:00', '00:00:00', 0, '3.0', '1.0', '1.0', '3.0', '0.0'),
(2, 'samrat', 'mundesamrat@gmail.com', 'samrat', 3, '', 'bXVuZGVzYW1yYXRAZ21haWwuY29t', 0, '', '00:00:00', '00:00:00', 0, '0.0', '0.0', '0.0', '0.0', '0.0'),
(3, 'sam', 'mundesamrat@gmail.com', 'samrat', 2, '', 'bXVuZGVzYW1yYXRAZ21haWwuY29t', 0, '', '00:00:00', '00:00:00', 0, '0.0', '0.0', '0.0', '0.0', '0.0'),
(5, 'swapnil ', 'swapnil.bizmotech@gmail.com', 'swapnil', 3, '', 'c3dhcG5pbC5iaXptb3RlY2hAZ21haWwuY29t', 0, '', '00:00:00', '00:00:00', 0, '0.0', '0.0', '0.0', '0.0', '0.0'),
(6, 'ranjeet', 'ranjeet.wagh@bizmo-tech.com', 'ranjeet', 3, '', 'cmFuamVldC53YWdoQGJpem1vLXRlY2guY29t', 0, '', '00:00:00', '00:00:00', 0, '0.0', '0.0', '0.0', '0.0', '0.0'),
(7, 'demo_user', 'samratbizmotech@gmail.com', 'samrat', 2, '', 'c2FtcmF0Yml6bW90ZWNoQGdtYWlsLmNvbQ==', 0, '', '00:00:00', '00:00:00', 0, '0.0', '0.0', '0.0', '0.0', '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_items`
--

CREATE TABLE `list_items` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `item_city` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` text NOT NULL,
  `item_pictures` text NOT NULL,
  `daily_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `weekly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `weekend_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `monthly_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `bond_rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `extra_option` text NOT NULL,
  `membership_package` varchar(255) NOT NULL,
  `posted_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `delivery` tinyint(1) NOT NULL,
  `total_views` bigint(20) NOT NULL,
  `isLive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`item_id`, `user_id`, `user_name`, `region`, `country`, `item_city`, `cat_name`, `item_name`, `item_description`, `item_pictures`, `daily_rate`, `weekly_rate`, `weekend_rate`, `monthly_rate`, `bond_rate`, `extra_option`, `membership_package`, `posted_date`, `closing_date`, `delivery`, `total_views`, `isLive`) VALUES
(2, 26, 'sam', 'deccan', 'ind', '', 'Bikes', 'qwd', 'qwd', '["http://192.168.1.11/ijarline/uploads/qwd_9_filter5.jpg"]', '1.00', '0.00', '0.00', '3.00', '0.00', '', 'PRO_1Y', '2017-09-28', '2018-09-28', 0, 1, 1),
(3, 25, 'Samrat', 'Deccan', 'Saudi Arabia', '', 'Games', 'new demo', 'newest demo to chk changes newest demo to chk changes newest demo to chk changes newest demo to chk changes newest demo to chk changes newest demo to chk changes ', '["http://localhost/ijarline/uploads/new_demo_2_2064466095-44166062-3d-realistic-saudi-arab-man-cartoon-character-with-different-pose-holding-briefcase-wearing-thobe-is-stock-vector.jpg","http://localhost/ijarline/uploads/new_demo_2_background.jpg"]', '10.00', '0.00', '20.00', '600.00', '0.00', '', 'BASIC_3M', '2017-10-09', '2018-01-09', 0, 2, 0),
(4, 32, 'sa', 'deccan', 'Saudi Arabia', '', 'Games', 'sa 1', 'sa1 description sa1 description sa1 description sa1 description sa1 description sa1 description ', '["http://localhost/ijarline/uploads/sa_1_2_2064466095-44166062-3d-realistic-saudi-arab-man-cartoon-character-with-different-pose-holding-briefcase-wearing-thobe-is-stock-vector.jpg","http://localhost/ijarline/uploads/sa_1_2_2064466095-44166062-3d-realistic-saudi-arab-man-cartoon-character-with-different-pose-holding-briefcase-wearing-thobe-is-stock-vector.jpg"]', '5.00', '10.00', '0.00', '100.00', '0.00', '', '', '2017-10-11', '0000-00-00', 0, 1, 0),
(5, 26, 'sam', 'samrat', 'Saudi Arabia', 'Mecca', 'Bikes', 'Yamaha rz', 'Bike with a high speed to rent. Bike with a high speed to rent. Bike with a high speed to rent. Bike with a high speed to rent. Bike with a high speed to rent. Bike with a high speed to rent. ', '["http://localhost/ijarline/uploads/Yamaha_rz_9_pos-screen.jpg","http://localhost/ijarline/uploads/Yamaha_rz_9_hotel-4_1.jpg"]', '150.00', '500.00', '0.00', '3000.00', '5.00', 'driving license', '', '2017-10-14', '0000-00-00', 0, 1, 1),
(6, 26, 'sam', 'dsk', 'Saudi Arabia', 'Dawadmi', 'Party', 'new item', 'newset itemnewset itemnewset itemnewset itemnewset itemnewset itemnewset itemnewset item', '["http://localhost/ijarline/uploads/new_item_10_1e9761_55159679b172447ea062c1f83f5249b7.jpg"]', '23.00', '0.00', '0.00', '45.00', '0.00', '', '', '2017-10-14', '0000-00-00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail_account`
--

CREATE TABLE `mail_account` (
  `acct_id` int(11) NOT NULL,
  `mail_email` varchar(255) NOT NULL,
  `mail_password` varchar(255) NOT NULL,
  `extra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_account`
--

INSERT INTO `mail_account` (`acct_id`, `mail_email`, `mail_password`, `extra`) VALUES
(1, 'samratbizmotech@gmail.com', '8446524095', 0);

-- --------------------------------------------------------

--
-- Table structure for table `managesettings`
--

CREATE TABLE `managesettings` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_action` varchar(255) NOT NULL,
  `extra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managesettings`
--

INSERT INTO `managesettings` (`setting_id`, `setting_name`, `setting_action`, `extra`) VALUES
(1, 'wanted_asapPeriod', '1 month', 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_pack`
--

CREATE TABLE `membership_pack` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(255) NOT NULL,
  `pack_code` varchar(255) NOT NULL,
  `pack_details` text NOT NULL,
  `pack_cost` decimal(10,0) NOT NULL,
  `pack_validity` int(11) NOT NULL,
  `pack_period` varchar(10) NOT NULL,
  `activation_status` tinyint(1) NOT NULL,
  `extra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_pack`
--

INSERT INTO `membership_pack` (`pack_id`, `pack_name`, `pack_code`, `pack_details`, `pack_cost`, `pack_validity`, `pack_period`, `activation_status`, `extra`) VALUES
(3, 'Pro', 'PRO_1Y', '["Yearly support","First Preferences","Dhamaka Offer","Wish list"]', '60', 1, 'Y', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `view_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `visitor_ip` varchar(255) NOT NULL,
  `extra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`view_id`, `item_id`, `visitor_ip`, `extra`) VALUES
(1, 3, 'user_ip', 0),
(2, 3, '::1', 0),
(4, 2, '::1', 0),
(5, 4, '::1', 0),
(6, 5, '::1', 0),
(7, 6, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `privmsgs`
--

CREATE TABLE `privmsgs` (
  `privmsg_id` bigint(20) NOT NULL,
  `privmsg_author` int(20) NOT NULL,
  `privmsg_date` varchar(20) NOT NULL,
  `privmsg_subject` varchar(1024) NOT NULL,
  `privmsg_body` varchar(60000) NOT NULL,
  `privmsg_notify` tinyint(1) DEFAULT NULL,
  `privmsg_deleted` tinyint(1) DEFAULT NULL,
  `privmsg_ddate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privmsgs`
--

INSERT INTO `privmsgs` (`privmsg_id`, `privmsg_author`, `privmsg_date`, `privmsg_subject`, `privmsg_body`, `privmsg_notify`, `privmsg_deleted`, `privmsg_ddate`) VALUES
(10, 25, '2017-10-06 18:12:14', 'demo ', 'chhfh chhfh chhfh chhfh chhfh ', 1, 1, '2017-10-06 18:38:27'),
(11, 26, '2017-10-06 18:29:26', 'RE:demo', 'reply reply replyyyyyyy\r\n', 1, NULL, NULL),
(12, 25, '2017-10-06 18:38:44', 'RE:demo', 'heloo reply heloo reply heloo reply heloo reply heloo reply heloo reply ', 1, NULL, NULL),
(13, 26, '2017-10-06 18:40:02', 'RE:demo', 'reply reply reply reply reply reply reply reply ', 1, NULL, NULL),
(14, 25, '2017-10-06 19:39:55', 'RE:RE:demo', 'wefwfe', 1, NULL, NULL),
(15, 25, '2017-10-07 10:34:04', 'from find msg', 'chk from find message', 1, NULL, NULL),
(16, 26, '2017-10-09 16:58:36', 'Regarding  New Demo', 'I liked your new demo item with some newest features. Contact me on mob.9874563210', 1, NULL, NULL),
(17, 25, '2017-10-09 17:26:37', 'Reply ', 'Got ur message of like.. ty ', 1, NULL, NULL),
(18, 25, '2017-10-11 18:14:51', 'new demo msg', 'ascccacccscc', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privmsgs_to`
--

CREATE TABLE `privmsgs_to` (
  `pmto_id` bigint(20) NOT NULL,
  `pmto_message` bigint(20) NOT NULL,
  `pmto_recipient` int(20) NOT NULL,
  `pmto_read` tinyint(1) DEFAULT NULL,
  `pmto_rdate` varchar(20) DEFAULT NULL,
  `pmto_deleted` tinyint(1) DEFAULT NULL,
  `pmto_ddate` varchar(20) DEFAULT NULL,
  `pmto_allownotify` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privmsgs_to`
--

INSERT INTO `privmsgs_to` (`pmto_id`, `pmto_message`, `pmto_recipient`, `pmto_read`, `pmto_rdate`, `pmto_deleted`, `pmto_ddate`, `pmto_allownotify`) VALUES
(9, 10, 26, 1, '2017-10-06 18:39:50', NULL, '2017-10-06 18:39:41', 1),
(10, 11, 25, 1, '2017-10-06 19:00:43', 1, '2017-10-06 18:43:30', 1),
(11, 13, 25, 1, '2017-10-09 10:26:20', NULL, NULL, 1),
(12, 15, 26, 1, '2017-10-07 12:46:55', NULL, NULL, 1),
(13, 16, 25, 1, '2018-01-20 18:48:31', NULL, NULL, 1),
(14, 17, 26, 1, '2017-10-09 17:35:58', NULL, NULL, 1),
(15, 18, 32, 1, '2017-10-11 18:17:41', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `rule_id` int(11) NOT NULL,
  `rule_title` varchar(255) NOT NULL,
  `rule_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rule_id`, `rule_title`, `rule_content`) VALUES
(1, 'Items', 'All items you list or want to rent must subject to the rules in Saudi Arabia. So, any prevented or not allowed items will cause blocking your account and your details. Will be sent to any government office they ask.'),
(2, 'Fees Structure', 'No fees are required to use your membership.');

-- --------------------------------------------------------

--
-- Table structure for table `saudi_cities`
--

CREATE TABLE `saudi_cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  `extra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`) VALUES
(1, 'FooBar'),
(2, 'FooFoo');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `session_bool` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `joining_date` date NOT NULL,
  `membership` varchar(255) NOT NULL,
  `stay_touched` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`user_id`, `email`, `password`, `unique_id`, `session_bool`, `name`, `surname`, `region`, `city`, `postcode`, `state`, `country`, `phone`, `joining_date`, `membership`, `stay_touched`) VALUES
(25, 'mundesamrat@gmail.com', 'c2FtcmF0', 'bXVuZGVzYW1yYXRAZ21haWwuY29t', 1, 'Samrat', 'Munde', 'Deccan', 'Al-Kharj', 411004, 'mah', 'Saudi Arabia', 7020235149, '0000-00-00', '', 0),
(26, 'sam@gmail.com', 'c2Ft', 'c2FtQGdtYWlsLmNvbQ==', 0, 'sam', 'munde', 'samrat', 'Bareg', 411001, 'mah', 'Saudi Arabia', 24235223323, '0000-00-00', '', 0),
(28, 'vishwa@gmail.com', 'dmlzaA==', 'dmlzaHdhQGdtYWlsLmNvbQ==', 1, 'Vishwajeet', 'hush', 'sjchg', 'sjsbkf', 68446, 'mah', 'ind', 48533353356, '0000-00-00', '', 0),
(32, 'sa@gmail.com', 'c2Ft', 'c2FAZ21haWwuY29t', 0, 'sa', '', 'deccan', 'Diriyah', 0, '', 'Saudi Arabia', 123456987, '2017-09-26', '', 1),
(33, 'ranjeet.wagh@gmail.com', 'cmFuamVldA==', '', 0, '', '', '', '', 0, '', '', 0, '2017-11-08', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wanted_list`
--

CREATE TABLE `wanted_list` (
  `wanted_id` int(11) NOT NULL,
  `wanted_item` varchar(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `can_pay` varchar(30) NOT NULL,
  `can_travel` varchar(30) NOT NULL,
  `posted_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `has_item` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wanted_list`
--

INSERT INTO `wanted_list` (`wanted_id`, `wanted_item`, `cat_name`, `user_id`, `user_name`, `region`, `can_pay`, `can_travel`, `posted_date`, `expiry_date`, `has_item`) VALUES
(1, 'Demo1', 'all', 26, 'sam munde', 'aundh', '10 per day', 'within 10km', '2017-10-05', '2018-04-05', ''),
(3, 'wanted 2', 'Bikes', 25, 'Samrat Munde', 'Deccan', '20 per week', 'within 10km', '2017-10-09', '2017-11-09', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `jm_user_tab`
--
ALTER TABLE `jm_user_tab`
  ADD PRIMARY KEY (`jm_user_id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_items`
--
ALTER TABLE `list_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `region` (`region`),
  ADD KEY `country` (`country`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `mail_account`
--
ALTER TABLE `mail_account`
  ADD PRIMARY KEY (`acct_id`);

--
-- Indexes for table `managesettings`
--
ALTER TABLE `managesettings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `membership_pack`
--
ALTER TABLE `membership_pack`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `privmsgs`
--
ALTER TABLE `privmsgs`
  ADD UNIQUE KEY `privmsg_id` (`privmsg_id`),
  ADD KEY `privmsg_author` (`privmsg_author`);

--
-- Indexes for table `privmsgs_to`
--
ALTER TABLE `privmsgs_to`
  ADD UNIQUE KEY `pmto_id` (`pmto_id`),
  ADD KEY `pmto_message` (`pmto_message`),
  ADD KEY `pmto_recipient` (`pmto_recipient`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `saudi_cities`
--
ALTER TABLE `saudi_cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `name` (`name`),
  ADD KEY `region` (`region`),
  ADD KEY `country` (`country`);

--
-- Indexes for table `wanted_list`
--
ALTER TABLE `wanted_list`
  ADD PRIMARY KEY (`wanted_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jm_user_tab`
--
ALTER TABLE `jm_user_tab`
  MODIFY `jm_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `list_items`
--
ALTER TABLE `list_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mail_account`
--
ALTER TABLE `mail_account`
  MODIFY `acct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `managesettings`
--
ALTER TABLE `managesettings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membership_pack`
--
ALTER TABLE `membership_pack`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `privmsgs`
--
ALTER TABLE `privmsgs`
  MODIFY `privmsg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `privmsgs_to`
--
ALTER TABLE `privmsgs_to`
  MODIFY `pmto_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `saudi_cities`
--
ALTER TABLE `saudi_cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `wanted_list`
--
ALTER TABLE `wanted_list`
  MODIFY `wanted_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_items`
--
ALTER TABLE `list_items`
  ADD CONSTRAINT `list_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_items_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `user_reg` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_items_ibfk_3` FOREIGN KEY (`country`) REFERENCES `user_reg` (`country`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_views`
--
ALTER TABLE `page_views`
  ADD CONSTRAINT `page_views_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `list_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privmsgs`
--
ALTER TABLE `privmsgs`
  ADD CONSTRAINT `privmsgs_ibfk_1` FOREIGN KEY (`privmsg_author`) REFERENCES `user_reg` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privmsgs_to`
--
ALTER TABLE `privmsgs_to`
  ADD CONSTRAINT `privmsgs_to_ibfk_1` FOREIGN KEY (`pmto_message`) REFERENCES `privmsgs` (`privmsg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `privmsgs_to_ibfk_2` FOREIGN KEY (`pmto_recipient`) REFERENCES `user_reg` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wanted_list`
--
ALTER TABLE `wanted_list`
  ADD CONSTRAINT `wanted_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
