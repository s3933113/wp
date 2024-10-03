-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 12:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petsvictoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petid` int(11) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `caption` varchar(255) NOT NULL,
  `age` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`petid`, `petname`, `description`, `caption`, `age`, `type`, `location`, `image`) VALUES
(1, 'Milo', 'Brown car with Carmo pattern. Fast run, Sharp bite', 'Milo', 24, 'cat', 'Sunshine', 'cat1.jpeg'),
(2, 'Baxter', 'Strong army dog, your home will be safe with him.', 'Baxter', 20, 'dog', 'Doncaster', 'dog1.jpeg'),
(3, 'Luna', 'Brown cat, Love hug, Love salmon.', 'Luna', 3, 'cat', 'Box hill', 'cat2.jpeg'),
(4, 'Willow', 'Love sleep, run 100m per day.', 'Willow', 23, 'dog', 'South Yarra', 'dog2.jpeg'),
(5, 'Oliver', 'Shy cat, love to sleep on the ground don\'t need to buy bed for him.', 'Oliver', 12, 'cat', 'Melbourne CBD', 'cat4.jpeg'),
(6, 'Bella', 'Run all day, sleep 30 minutes per day.', 'Bella', 16, 'dog', 'Epping', 'dog3.jpeg'),
(22, 'Euro', 'Orange cat. sleep 23.5 hours per day ', 'Euro', 36, 'cat', 'Thailand', 'Euro.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
