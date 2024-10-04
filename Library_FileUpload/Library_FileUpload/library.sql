CREATE DATABASE library;

USE library;

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `published` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;