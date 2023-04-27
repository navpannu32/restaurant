-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 06:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

CREATE DATABASE IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `restaurant`;

IF NOT EXISTS (SELECT * FROM mysql.user WHERE user = 'nav') THEN
    CREATE USER 'nav'@'localhost' IDENTIFIED BY 'nav!1';
    GRANT ALL PRIVILEGES ON restaurant.* TO 'nav'@'localhost';
END IF;


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

DROP TABLE `categories`;
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

DROP TABLE `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `item_id`, `comment`, `created_at`, `updated_at`, `is_approved`) VALUES
(1, NULL, 82, 'good', '2023-04-22 17:17:26', '2023-04-22 17:17:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE `items`;
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
(82, 'Glazed Donut', 'A classic donut with a sweet glaze', '1.99', '64435e6857e764.33459677.jpeg', '2023-04-22 04:11:20', '0000-00-00 00:00:00', 1),
(83, 'Chocolate Donut', 'A chocolatey donut with chocolate frosting', '2.49', '64435e7863cfe1.69383501.jpeg', '2023-04-22 04:11:36', '0000-00-00 00:00:00', 1),
(84, 'Sprinkled Donut', 'A vanilla donut covered in rainbow sprinkles', '1.99', '64435e8bca78c0.80906417.jpeg', '2023-04-22 04:11:55', '0000-00-00 00:00:00', 1),
(85, 'Jelly Donut', 'A soft, fluffy donut filled with jelly', '2.99', '64435e9a898d41.66136503.jpeg', '2023-04-22 04:12:10', '0000-00-00 00:00:00', 1),
(86, 'Maple Bacon Donut', 'A savory-sweet donut topped with maple glaze and crispy bacon bits', '3.49', '64435ea6ba31b1.22075058.jpeg', '2023-04-22 04:12:22', '0000-00-00 00:00:00', 2),
(87, 'Blueberry Donut', 'A fruity donut bursting with blueberry flavor', '2.49', '64435eb3536d36.58918362.jpeg', '2023-04-22 04:12:35', '0000-00-00 00:00:00', 1),
(88, 'Lemon Donut', 'A tangy-sweet donut with lemon frosting', '2.49', '64435ebf13c2d8.33837107.jpeg', '2023-04-22 04:12:47', '0000-00-00 00:00:00', 1),
(89, 'Cinnamon Sugar Donut', 'A spiced donut coated in cinnamon sugar', '1.99', '64435ecb9fb054.65055124.jpeg', '2023-04-22 04:12:59', '0000-00-00 00:00:00', 1),
(90, 'Boston Cream Donut', 'A creamy donut filled with custard and topped with chocolate glaze', '2.99', '64435edb913a22.64247073.jpeg', '2023-04-22 04:13:15', '0000-00-00 00:00:00', 2),
(91, 'Pumpkin Donut', 'A seasonal donut with pumpkin spice and a maple glaze', '2.99', '64435eec991f72.57862999.jpeg', '2023-04-22 04:13:32', '0000-00-00 00:00:00', 1),
(92, 'Coconut Donut', 'A tropical donut with coconut flakes and coconut frosting', '2.49', '64435f0771dc38.00415563.jpeg', '2023-04-22 04:13:59', '0000-00-00 00:00:00', 1),
(93, 'Red Velvet Donut', 'A decadent donut with a rich red velvet flavor and cream cheese frosting', '2.99', '64435f1368fcb9.02523970.jpeg', '2023-04-22 04:14:11', '0000-00-00 00:00:00', 1),
(94, 'Apple Fritter', 'A sweet donut with chunks of apple and cinnamon', '3.49', '64435f1faac9d3.90701296.jpeg', '2023-04-22 04:14:23', '0000-00-00 00:00:00', 3),
(95, 'Raspberry Donut', 'A fruity donut with raspberry filling and raspberry glaze', '2.49', '64435f2bb58ff8.34885570.jpeg', '2023-04-22 04:14:35', '0000-00-00 00:00:00', 1),
(96, 'Salted Caramel Donut', 'A salty-sweet donut with caramel frosting and a sprinkle of sea salt', '3.49', '64435f37d9f107.06824994.jpeg', '2023-04-22 04:14:47', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE `users`;
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
(4, 'a', 'a@a.a', '$2y$10$axJBE.CrnSqpkByO7h31VeWCRkSq9Q73edEj40PsHED7.KM9YQpzq', 'admin', '2023-04-16 00:51:30'),
(5, 'c', 'c@c.c', '$2y$10$Mi/TlRjeVivLr5FoEIULv.jAsGCAmMs.67jgvVq/8NsHpMAPzEZSK', 'user', '2023-04-22 03:11:51');

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
