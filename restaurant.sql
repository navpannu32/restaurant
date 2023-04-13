-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 03:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 'good', 1, 2, '2023-04-09 00:43:54', '0000-00-00 00:00:00'),
(3, 'great', 2, 2, '2023-04-09 00:44:34', '0000-00-00 00:00:00'),
(5, 'great', 1, 1, '2023-04-09 00:45:58', '0000-00-00 00:00:00'),
(6, 'good', 1, 1, '2023-04-09 03:20:10', '0000-00-00 00:00:00'),
(7, 'great', 1, 1, '2023-04-12 04:04:51', '0000-00-00 00:00:00'),
(11, 'a', 1, 50, '2023-04-12 18:06:42', '0000-00-00 00:00:00'),
(12, 'a', 1, 50, '2023-04-12 18:06:45', '0000-00-00 00:00:00'),
(13, 'a', 1, 50, '2023-04-12 18:06:46', '0000-00-00 00:00:00'),
(14, 'a', 1, 50, '2023-04-12 18:06:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'pancakes', 'pancakes', '2.00', '', '2023-04-07 22:47:02', '0000-00-00 00:00:00'),
(2, 'chicken wings ', 'chicken wings', '10.00', '', '2023-04-07 10:24:08', '0000-00-00 00:00:00'),
(5, 'item 3', 'description of item 3', '9.00', '', '2023-04-07 11:32:26', '0000-00-00 00:00:00'),
(6, 'item 4', 'description of item 4', '9.00', '', '2023-04-07 11:32:26', '0000-00-00 00:00:00'),
(7, 'item 5', 'description of item 5', '9.00', '', '2023-04-07 11:32:26', '0000-00-00 00:00:00'),
(8, 'item 6', 'description of item 6', '9.00', '', '2023-04-07 11:32:26', '0000-00-00 00:00:00'),
(9, 'item 7', 'description of item 7', '9.00', '', '2023-04-07 11:32:26', '0000-00-00 00:00:00'),
(10, 'item 8', 'description of item 8', '9.00', '', '2023-04-07 11:32:26', '0000-00-00 00:00:00'),
(11, 'item 9', 'description of item 9', '9.00', '', '2023-04-07 11:32:26', '0000-00-00 00:00:00'),
(50, 'a', 'the quick brown fox jumps over the lazy dog. the quick brown fox jumps over the lazy dog. the quick brown fox jumps over the lazy dog. the quick brown fox jumps over the lazy dog.', '1.00', '64360461834749.41000981.jpeg', '2023-04-12 05:46:02', '0000-00-00 00:00:00'),
(51, 'aa', 'a', '1.00', '6437345f981409.13705107.jpeg', '2023-04-12 22:44:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Jagrajveer Singh', 'jagrajveer9@gmail.com', 'Jagraj!@#123', 'admin', '2023-04-07 10:24:21'),
(2, 'Jagrajveer', 'abc@xyz.com', 'jagraj', 'user', '2023-04-08 00:23:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`item_id`),
  ADD KEY `comments_ibfk_2` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;