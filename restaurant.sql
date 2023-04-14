-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2023 at 03:32 PM
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
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(67, 'Glazed', 'A classic donut with a sweet glaze.', '1.99', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(68, 'Chocolate Frosted', 'A chocolate donut with chocolate frosting.', '2.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(69, 'Powdered Sugar', 'A donut covered in powdered sugar.', '1.99', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(70, 'Maple Bar', 'A bar-shaped donut with maple frosting.', '2.99', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(71, 'Jelly Filled', 'A donut filled with raspberry jelly.', '2.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(72, 'Cinnamon Roll', 'A donut shaped like a cinnamon roll.', '3.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(73, 'Blueberry Cake', 'A cake donut with blueberry flavor.', '2.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(74, 'Old Fashioned', 'A classic donut with a slightly crispy exterior.', '1.99', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(75, 'Apple Fritter', 'A fritter-style donut with chunks of apple.', '3.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(76, 'Bear Claw', 'A pastry-shaped donut with almond filling.', '3.99', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(77, 'Lemon Filled', 'A donut filled with lemon cream.', '2.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(78, 'Chocolate Glazed', 'A chocolate donut with a sweet glaze.', '2.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(79, 'Boston Cream', 'A donut filled with vanilla cream and topped with chocolate.', '2.99', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(80, 'Strawberry Frosted', 'A donut with strawberry frosting and sprinkles.', '2.49', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00'),
(81, 'Double Chocolate', 'A chocolate donut with chocolate chips and chocolate glaze.', '2.99', NULL, '2023-04-14 03:27:01', '0000-00-00 00:00:00');

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
(3, 'Jagrajveer Singh', 'jagrajveer9@gmail.com', '$2y$10$D4MbkwnpNClFiXnYPq7szevAXfV9NvQzwkylAYvxSVoA4GagX1eX2', 'admin', '2023-04-14 10:47:48');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
