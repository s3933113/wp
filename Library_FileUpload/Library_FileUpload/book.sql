-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2024 at 07:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `published` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `title`, `author`, `genre`, `published`, `description`) VALUES
(1, 'Cather in the Rye', 'Salinger', 'Novel', '1952', 'The Catcher in the Rye is a novel by American author J. D. Salinger that was partially published in serial form in 1945–46 before being novelized in 1951. Originally intended for adults, it is often read by adolescents for its themes of angst and alienation, and as a critique of superficiality in society.'),
(2, 'Harry Potter and the Philosopher Stone', 'Jowlings', 'Fantasy', '2001', 'Harry Potter, an eleven-year-old orphan, discovers that he is a wizard and is invited to study at Hogwarts. Even as he escapes a dreary life and enters a world of magic, he finds trouble awaiting him.'),
(3, 'Good Omens', 'Terry Pratchett', 'Fantasy', '1990', 'Good Omens: The Nice and Accurate Prophecies of Agnes Nutter, Witch is a 1990 novel written as a collaboration between the English authors Terry Pratchett and Neil Gaiman, who in turn were dubbed \"Double Trouble\" by the British press.'),
(4, 'The Colour of Magic', 'Terry Pratchett', 'Fantasy', '1983', 'The Colour of Magic is a 1983 fantasy comedy novel by Terry Pratchett, and is the first book of the Discworld series. The first printing of the British edition consisted of only 506 copies. Pratchett has described it as \"an attempt to do for the classical fantasy universe what Blazing Saddles did for Westerns.\"');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
