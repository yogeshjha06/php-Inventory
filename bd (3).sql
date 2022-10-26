-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 05:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `address`, `number`, `status`) VALUES
(31, 'Adani', 'mumbai', 1234567896, 1),
(32, 'Ambani', 'new york', 1234567412, 1),
(33, 'Mukesh Ambani', 'new york', 2228524123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(20) NOT NULL,
  `item` varchar(50) NOT NULL,
  `amt` float NOT NULL,
  `qun` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item`, `amt`, `qun`, `status`) VALUES
(93, 'car', 50, 3, 1),
(94, 'ball', 30, 1, 1),
(95, 'apple', 60, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p1`
--

CREATE TABLE `p1` (
  `id` int(20) NOT NULL,
  `rno` int(30) NOT NULL,
  `rdate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p1`
--

INSERT INTO `p1` (`id`, `rno`, `rdate`, `name`, `amt`) VALUES
(124, 1, '2022-10-19', 'Adani', 420),
(125, 2, '2022-10-19', 'Mukesh Ambani', 280);

-- --------------------------------------------------------

--
-- Table structure for table `p2`
--

CREATE TABLE `p2` (
  `id` int(10) NOT NULL,
  `pid` int(20) NOT NULL,
  `item` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `qun` int(10) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p2`
--

INSERT INTO `p2` (`id`, `pid`, `item`, `price`, `qun`, `amt`) VALUES
(258, 1, 'car', 50, 3, 150),
(259, 1, 'ball', 30, 5, 150),
(260, 1, 'apple', 60, 2, 120),
(261, 2, 'car', 50, 2, 100),
(262, 2, 'apple', 60, 3, 180);

-- --------------------------------------------------------

--
-- Table structure for table `s1`
--

CREATE TABLE `s1` (
  `id` int(30) NOT NULL,
  `rno` int(50) NOT NULL,
  `rdate` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `ph` int(10) NOT NULL,
  `add` varchar(50) NOT NULL,
  `amt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s1`
--

INSERT INTO `s1` (`id`, `rno`, `rdate`, `name`, `ph`, `add`, `amt`) VALUES
(53, 1, '2022-10-19', 'ram', 1236547891, 'mumbai', 400),
(54, 3, '2022-10-19', 'arun', 1236547891, 'ranchi', 3200);

-- --------------------------------------------------------

--
-- Table structure for table `s2`
--

CREATE TABLE `s2` (
  `id` int(50) NOT NULL,
  `sid` int(30) NOT NULL,
  `item` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `qun` int(50) NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s2`
--

INSERT INTO `s2` (`id`, `sid`, `item`, `price`, `qun`, `amt`) VALUES
(78, 1, 'car', 200, 2, 400),
(79, 3, 'ball', 800, 4, 3200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`number`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item` (`item`);

--
-- Indexes for table `p1`
--
ALTER TABLE `p1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p2`
--
ALTER TABLE `p2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s1`
--
ALTER TABLE `s1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s2`
--
ALTER TABLE `s2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `p1`
--
ALTER TABLE `p1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `p2`
--
ALTER TABLE `p2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `s1`
--
ALTER TABLE `s1`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `s2`
--
ALTER TABLE `s2`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
