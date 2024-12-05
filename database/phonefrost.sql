-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 06:14 AM
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
-- Database: `phonefrost`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'dipesh');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Smartphone'),
(2, 'Earpod'),
(3, 'Headphone');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `product_id`, `quantity`, `order_date`) VALUES
(1, 'Dipesh mahato', 4, 1, '2024-10-06 15:59:11'),
(2, 'Dipesh mahato', 10, 1, '2024-10-06 15:59:11'),
(3, 'Dipesh mahato', 10, 1, '2024-10-15 10:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `storage` text NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `storage`, `category_id`, `image`, `created_at`) VALUES
(4, 'iPhone 13', 'Latest Apple iPhone with A15 Bionic chip', 95000.00, '', 1, NULL, '2024-08-26 17:19:21'),
(5, 'Samsung Galaxy S21', 'Flagship smartphone with Exynos 2100', 70000.00, '8/128gb', 1, NULL, '2024-08-26 17:19:21'),
(6, 'OnePlus 9', 'High-performance smartphone with Snapdragon 888', 54000.00, '8/128 gb', 1, NULL, '2024-08-26 17:19:21'),
(7, 'Sony WH-1000XM4', 'Industry-leading noise-canceling headphones', 349.99, '', 3, NULL, '2024-08-26 17:19:21'),
(8, 'Bose QuietComfort 35 II', 'High-quality noise-canceling headphones', 299.99, '', 3, NULL, '2024-08-26 17:19:21'),
(10, 'Apple AirPods Pro', 'Active noise-canceling wireless earbuds', 249.99, '', 2, NULL, '2024-08-26 17:19:21'),
(11, 'Samsung Galaxy Buds Pro', 'Premium wireless earbuds with noise-canceling', 199.99, '', 2, NULL, '2024-08-26 17:19:21'),
(12, 'Sony WF-1000XM4', 'High-quality wireless earbuds with noise-canceling', 279.99, '', 2, NULL, '2024-08-26 17:19:21'),
(14, 'MI 11 Lite NE 5G', 'Display: 6.55-inch AMOLED\r\nProcessor: Snapdragon 732G\r\nCamera: 64MP triple-camera setup\r\nBattery: 4,250mAh with 33W fast charging.', 45999.00, '8/128 gb', 1, NULL, '2024-08-30 03:03:45'),
(16, 'Nothing Phone (2)', 'The Nothing Phone (2) upgrades the Glyph Interface, features a 6.7\" OLED display, Snapdragon 8+ Gen 1, improved cameras, 4700mAh battery, and faster 45W charging.', 75699.00, '12 / 256', 1, '16.jpg', '2024-09-04 16:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Dipesh mahato', 'dipeshmahatto@gmail.com', '13a5866f3dc0c1429c92b06941de5132');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
