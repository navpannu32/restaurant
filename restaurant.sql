-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2023 at 08:41 AM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Glazed', 'Donuts with a sweet glaze on top'),
(2, 'Chocolate', 'Donuts with a chocolate coating or filling'),
(3, 'Fruity', 'Donuts with fruit-flavored filling or toppings');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(82, 'Glazed Donut', 'A classic donut with a sweet glaze', '1.99', 'https://example.com/glazed.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(83, 'Chocolate Donut', 'A chocolatey donut with chocolate frosting', '2.49', 'https://example.com/chocolate.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(84, 'Sprinkled Donut', 'A vanilla donut covered in rainbow sprinkles', '1.99', 'https://example.com/sprinkled.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(85, 'Jelly Donut', 'A soft, fluffy donut filled with jelly', '2.99', 'https://example.com/jelly.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(86, 'Maple Bacon Donut', 'A savory-sweet donut topped with maple glaze and crispy bacon bits', '3.49', 'https://example.com/maplebacon.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 2),
(87, 'Blueberry Donut', 'A fruity donut bursting with blueberry flavor', '2.49', 'https://example.com/blueberry.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(88, 'Lemon Donut', 'A tangy-sweet donut with lemon frosting', '2.49', 'https://example.com/lemon.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(89, 'Cinnamon Sugar Donut', 'A spiced donut coated in cinnamon sugar', '1.99', 'https://example.com/cinnamon.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(90, 'Boston Cream Donut', 'A creamy donut filled with custard and topped with chocolate glaze', '2.99', 'https://example.com/bostoncream.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 2),
(91, 'Pumpkin Donut', 'A seasonal donut with pumpkin spice and a maple glaze', '2.99', 'https://example.com/pumpkin.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(92, 'Coconut Donut', 'A tropical donut with coconut flakes and coconut frosting', '2.49', 'https://example.com/coconut.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(93, 'Red Velvet Donut', 'A decadent donut with a rich red velvet flavor and cream cheese frosting', '2.99', 'https://example.com/redvelvet.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(94, 'Apple Fritter', 'A sweet donut with chunks of apple and cinnamon', '3.49', 'https://example.com/apple.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 3),
(95, 'Raspberry Donut', 'A fruity donut with raspberry filling and raspberry glaze', '2.49', 'https://example.com/raspberry.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 1),
(96, 'Salted Caramel Donut', 'A salty-sweet donut with caramel frosting and a sprinkle of sea salt', '3.49', 'https://example.com/saltedcaramel.jpg', '2023-04-16 02:33:29', '0000-00-00 00:00:00', 2),
(97, 'a', 'a', '1.00', '643cda00f292b8.20769052.jpeg', '2023-04-17 05:32:48', '0000-00-00 00:00:00', 1);

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
(4, 'a', 'a@a.a', '$2y$10$axJBE.CrnSqpkByO7h31VeWCRkSq9Q73edEj40PsHED7.KM9YQpzq', 'admin', '2023-04-16 00:51:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
