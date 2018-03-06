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
-- Database: `job_mandi`
--

-- --------------------------------------------------------

--
-- Table structure for table `privmsgs`
--

CREATE TABLE `privmsgs` (
  `privmsg_id` bigint(20) NOT NULL,
  `privmsg_author` bigint(20) NOT NULL,
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
(6, 21, '2015-03-19 12:36:28', 'flowers', 'A flower, sometimes known as a bloom or blossom, is the reproductive structure found in flowering plants (plants of the division Magnoliophyta, also called angiosperms). The biological function of a flower is to effect reproduction, usually by providing a mechanism for the union of sperm with eggs. Flowers may facilitate outcrossing (fusion of sperm and eggs from different individuals in a population) or allow selfing (fusion of sperm and egg from the same flower). Some flowers produce diaspores without fertilization (parthenocarpy). Flowers contain sporangia and are the site where gametophytes develop. Flowers give rise to fruit and seeds. Many flowers have evolved to be attractive to animals, so as to cause them to be vectors for the transfer of pollen.', 1, NULL, '2018-02-01 17:54:27'),
(7, 1, '2015-03-19 12:38:17', 'Fungi', 'A fungus is any member of a large group of eukaryotic organisms that includes microorganisms such as yeasts and molds (British English: moulds), as well as the more familiar mushrooms. These organisms are classified as a kingdom, Fungi, which is separate from plants, animals, protists, and bacteria. One major difference is that fungal cells have cell walls that contain chitin, unlike the cell walls of plants and some protists, which contain cellulose, and unlike the cell walls of bacteria. These and other differences show that the fungi form a single group of related organisms, named the Eumycota (true fungi or Eumycetes), that share a common ancestor (is a monophyletic group). This fungal group is distinct from the structurally similar myxomycetes (slime molds) and oomycetes (water molds). The discipline of biology devoted to the study of fungi is known as mycology (from the Greek ?????, muk?s, meaning "fungus"). Mycology has often been regarded as a branch of botany, even though it is a separate kingdom in biological taxonomy. Genetic studies have shown that fungi are more closely related to animals than to plants.', 1, NULL, NULL),
(8, 21, '2015-03-19 12:39:05', 'Bacteria', 'Bacteria constitute a large domain of prokaryotic microorganisms. Typically a few micrometres in length, bacteria have a number of shapes, ranging from spheres to rods and spirals. Bacteria were among the first life forms to appear on Earth, and are present in most of its habitats. Bacteria inhabit soil, water, acidic hot springs, radioactive waste,[4] and the deep portions of Earth&#039;s crust. Bacteria also live in symbiotic and parasitic relationships with plants and animals. They are also known to have flourished in manned spacecraft.[5]', 1, 1, '2018-02-01 17:54:38'),
(9, 1, '2018-02-01 15:30:52', 'RE:Bacteria', 'scscc', 1, NULL, NULL),
(10, 1, '2018-02-01 16:20:01', 'RE:Bacteria', 'ascasc', 1, NULL, NULL),
(11, 1, '2018-02-01 16:20:18', 'RE:flowers', 'dxad', 1, NULL, NULL),
(12, 21, '2018-02-01 17:55:20', 'RE:Bacteria', 'sfcvvvdv', 1, NULL, NULL),
(13, 20, '2018-02-01 18:04:07', 'demo reply', 'sugdff neuegf nweje nefjbq nfcc', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `privmsgs`
--
ALTER TABLE `privmsgs`
  ADD UNIQUE KEY `privmsg_id` (`privmsg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `privmsgs`
--
ALTER TABLE `privmsgs`
  MODIFY `privmsg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
