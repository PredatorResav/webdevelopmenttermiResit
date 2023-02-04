-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Sep 25, 2022 at 12:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webAssignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(35) DEFAULT NULL,
  `categoryId` int DEFAULT NULL,
  `content` text,
  `publishDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `categoryId`, `content`, `publishDate`) VALUES
(6, 'SANDEEP LAMICHANE WINS THE MATCH', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra vitae congue eu consequat ac felis. Eleifend donec pretium vulputate sapien nec. Aliquet nec ullamcorper sit amet risus nullam eget felis eget. Posuere ac ut consequat semper viverra nam libero. Blandit cursus risus at ultrices mi tempus imperdiet. Non pulvinar neque laoreet suspendisse interdum consectetur. Consectetur a erat nam at lectus urna duis convallis convallis. Diam sit amet nisl suscipit adipiscing bibendum. Phasellus vestibulum lorem sed risus ultricies tristique. Vitae semper quis lectus nulla. Id semper risus in hendrerit gravida rutrum.', '2022-09-25 12:22:59'),
(7, ' LOCAL BUSINESS IDEA', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra vitae congue eu consequat ac felis. Eleifend donec pretium vulputate sapien nec. Aliquet nec ullamcorper sit amet risus nullam eget felis eget. Posuere ac ut consequat semper viverra nam libero. Blandit cursus risus at ultrices mi tempus imperdiet. Non pulvinar neque laoreet suspendisse interdum consectetur. Consectetur a erat nam at lectus urna duis convallis convallis. Diam sit amet nisl suscipit adipiscing bibendum. Phasellus vestibulum lorem sed risus ultricies tristique. Vitae semper quis lectus nulla. Id semper risus in hendrerit gravida rutrum.', '2022-09-25 12:23:35'),
(8, 'CONGRES COMES TO THE POWER', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra vitae congue eu consequat ac felis. Eleifend donec pretium vulputate sapien nec. Aliquet nec ullamcorper sit amet risus nullam eget felis eget. Posuere ac ut consequat semper viverra nam libero. Blandit cursus risus at ultrices mi tempus imperdiet. Non pulvinar neque laoreet suspendisse interdum consectetur. Consectetur a erat nam at lectus urna duis convallis convallis. Diam sit amet nisl suscipit adipiscing bibendum. Phasellus vestibulum lorem sed risus ultricies tristique. Vitae semper quis lectus nulla. Id semper risus in hendrerit gravida rutrum.', '2022-09-25 12:24:02'),
(9, 'NEW MOVIE RELEASING THIS YEAR', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra vitae congue eu consequat ac felis. Eleifend donec pretium vulputate sapien nec. Aliquet nec ullamcorper sit amet risus nullam eget felis eget. Posuere ac ut consequat semper viverra nam libero. Blandit cursus risus at ultrices mi tempus imperdiet. Non pulvinar neque laoreet suspendisse interdum consectetur. Consectetur a erat nam at lectus urna duis convallis convallis. Diam sit amet nisl suscipit adipiscing bibendum. Phasellus vestibulum lorem sed risus ultricies tristique. Vitae semper quis lectus nulla. Id semper risus in hendrerit gravida rutrum.', '2022-09-25 12:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'BUSINESS'),
(2, 'POLITICS'),
(3, 'ENTERTAINMENT'),
(5, 'SPORTS');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `comment` text,
  `user` int DEFAULT NULL,
  `article` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `user`, `article`) VALUES
(1, 'good article', 2, 2),
(2, 'hy', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(36) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isAdmin`) VALUES
(1, 'admin', 'admin@web.com', 'admin', 1),
(2, 'Reesav', 'reesavrokka1@gmail.com', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
