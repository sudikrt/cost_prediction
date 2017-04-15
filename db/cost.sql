-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 02:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cost`
--

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `compCode` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `latitude` decimal(12,9) NOT NULL,
  `longitude` decimal(12,9) NOT NULL,
  `address` varchar(150) NOT NULL,
  `yearOfExistance` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`compCode`, `companyName`, `latitude`, `longitude`, `address`, `yearOfExistance`) VALUES
(1, 'GeekSynergy', '13.036301100', '77.574976500', 'Research and development company', 2015),
(2, 'Ibridge', '12.520714820', '76.162467930', 'Management Company', 2015),
(3, 'Infosys', '12.715992790', '77.686569210', 'Mangalore', 12),
(4, 'Capgemini', '12.992739600', '77.703611250', 'Bengalore', 12),
(5, 'Dell India', '13.020969460', '77.629083400', 'Gurjon', 2012),
(6, 'CodeCraft', '12.871917700', '74.842472100', 'Soft', 2011);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `expLevel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `expLevel`) VALUES
(1, 'Fresher'),
(2, 'Junior'),
(3, 'Senior'),
(4, 'Expert'),
(5, 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `locationdata`
--

CREATE TABLE `locationdata` (
  `locationCode` varchar(10) NOT NULL,
  `latitude` double(10,2) NOT NULL,
  `longitude` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginattempts`
--

INSERT INTO `loginattempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
('::1', 2, '2017-04-13 19:29:44', 'sudkrt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '1',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `verified`, `mod_timestamp`) VALUES
('101858efb5e6902e3', 'sudkrt', '$2y$10$70E/lq8FrZp/Ombyohvasu/hYFAs.Hn4QNDsguAgk86wdp44rD.pi', 'sudarshankaranth18@gmail.com', 1, '2017-04-13 17:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `prof_detail`
--

CREATE TABLE `prof_detail` (
  `profCode` int(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof_detail`
--

INSERT INTO `prof_detail` (`profCode`, `description`) VALUES
(101, 'Grapic Designer'),
(102, 'Tester'),
(103, 'Plumber'),
(104, 'Electrician'),
(105, 'Associate');

-- --------------------------------------------------------

--
-- Table structure for table `stasticaldata`
--

CREATE TABLE `stasticaldata` (
  `profCode` int(10) NOT NULL,
  `compCode` int(10) NOT NULL,
  `startDate` bigint(15) NOT NULL,
  `endDate` bigint(15) NOT NULL,
  `expLevel` varchar(30) NOT NULL,
  `locationCode` varchar(10) DEFAULT NULL,
  `pricePerhour` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `stasticaldata`
--

INSERT INTO `stasticaldata` (`profCode`, `compCode`, `startDate`, `endDate`, `expLevel`, `locationCode`, `pricePerhour`) VALUES
(105, 6, 1491170400, 1492898400, 'Senior', '', '45.00'),
(104, 6, 1492293600, 1492466400, 'Junior', '', '34.00'),
(103, 6, 1492466400, 1492293600, 'Expert', '', '50.00'),
(105, 5, 1492293600, 1492984800, 'Fresher', '', '33.00'),
(104, 5, 1492380000, 1492898400, 'Senior', '', '54.00'),
(103, 3, 1492380000, 1492898400, 'Master', '', '32.00'),
(102, 5, 1492293600, 1492898400, 'Senior', '', '22.00'),
(102, 6, 1492984800, 1493416800, 'Master', '', '66.00'),
(102, 3, 1493071200, 1493157600, 'Expert', '', '54.00'),
(104, 3, 1492293600, 1493157600, 'Senior', '', '76.00'),
(105, 3, 1492380000, 1492984800, 'Junior', '', '45.00'),
(101, 2, 1492898400, 1492898400, 'Senior', '', '23.00'),
(102, 2, 1492984800, 1493157600, 'Master', '', '55.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`compCode`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prof_detail`
--
ALTER TABLE `prof_detail`
  ADD PRIMARY KEY (`profCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companydetails`
--
ALTER TABLE `companydetails`
  MODIFY `compCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
