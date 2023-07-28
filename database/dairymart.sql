-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 07:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairymart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$oLKvJ/4slyEOIwyrYeOXdOS0ia4k2BZpotRL1x1vIcx29TJWe5WSi');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_logo`) VALUES
(1, 'aavin', 'aavin.png'),
(2, 'amul', 'Amul.png'),
(3, 'mother dairy', 'mother_dairy.jpg'),
(4, 'nestle', 'nestle.png'),
(5, 'schreiber', 'schreiber.png');

-- --------------------------------------------------------

--
-- Table structure for table `card_deatails`
--

CREATE TABLE `card_deatails` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_image`) VALUES
(1, 'milk', 'milk.jpg'),
(2, 'butter', 'butter.jpg'),
(3, 'chesse', 'chesse.jpg'),
(4, 'custerd', 'custerd.jpg'),
(5, 'ghee', 'ghee.jpg'),
(6, 'ice-cream', 'ice-cream.jpg'),
(7, 'yogurt', 'yogurt.jpg'),
(8, 'milk-powder', 'milk-powder.jpg'),
(9, 'paneer', 'paneer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1633754457, 1, 1, 'pending'),
(2, 1, 282728930, 8, 1, 'pending'),
(3, 1, 1609425136, 7, 1, 'pending'),
(4, 1, 97134730, 4, 1, 'pending'),
(5, 1, 52249703, 4, 1, 'pending'),
(6, 1, 1191507432, 7, 1, 'pending'),
(7, 1, 71603916, 7, 1, 'pending'),
(8, 1, 1090744088, 9, 1, 'pending'),
(9, 1, 832905926, 9, 1, 'pending'),
(10, 1, 643072337, 6, 1, 'pending'),
(11, 1, 964136650, 9, 3, 'pending'),
(12, 1, 1125088185, 1, 1, 'pending'),
(13, 1, 767418352, 5, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `Product_price` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image`, `Product_price`, `Date`, `Status`) VALUES
(1, 'Fresh Milk', 'Milk is a white liquid food produced by the mammary glands of mammals. ', 'milk, MILK, Milk', 1, 1, 'milk.jpg', '50', '2023-07-27 14:44:33', 'True'),
(2, 'Yogurt', 'yogurt, also spelled yoghurt, yourt, or yoghourt, semifluid fermented milk food having a smooth texture and mildly sour flavour because of its lactic acid content.', 'yogurt, Yogurt, YOGURT', 7, 2, 'yogurt.jpg', '200', '2023-07-27 14:25:42', 'True'),
(3, 'Chesse', 'Cheese is a dairy product produced in wide ranges of flavors, textures, and forms by coagulation of the milk protein casein.', 'Chesse, chesse, CHESSE', 3, 4, 'chesse.jpg', '100', '2023-07-27 14:29:14', 'True'),
(4, 'Ice Cream', 'Ice cream is a frozen dairy dessert obtained by freezing the ice cream mix with continuous agitation.', 'ice, cream, Ice Cream, ice cream, ICE CREAM', 6, 1, 'ice-cream.jpg', '40', '2023-07-27 14:31:19', 'True'),
(5, 'Ghee', 'Ghee is clarified butterfat and contains about 99% of milk fat. Ghee from buffalo milk has no color, unlike ghee from cattle.', 'ghee, Ghee, GHEE', 5, 2, 'ghee.jpg', '200', '2023-07-27 14:45:01', 'True'),
(6, 'Custerd', 'a cooked mixture made of eggs and milk or cream and usually having a thick, creamy consistency.', 'custerd, Custerd, CUSTERD', 4, 3, 'custerd.jpg', '150', '2023-07-27 14:33:02', 'True'),
(7, 'Paneer', 'Paneer also known as ponir (pronounced [po̯ni̯r]), is a fresh acid-set cheese common in the Indian subcontinent made from full-fat buffalo milk or cow milk.', 'paneer, Paneer, PANEER', 9, 3, 'paneer.jpg', '130', '2023-07-27 14:34:23', 'True'),
(8, 'Milk Powder', 'Powdered milk, also called milk powder, dried milk, or dry milk, is a manufactured dairy product made by evaporating milk to dryness.', 'milk, powder, milk powder, Milk Powder, MILK POWDER', 8, 4, 'milk-powder.jpg', '100', '2023-07-27 14:35:41', 'True'),
(9, 'Fresh Cream', 'Cream is a dairy product composed of the higher-fat layer skimmed from the top of milk before homogenization. ', 'Cream, cream', 6, 5, 'cream.jpg', '180', '2023-07-27 14:36:49', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 180, 832905926, 1, '2023-07-28 04:44:40', 'InComplete'),
(2, 2, 150, 643072337, 1, '2023-07-28 05:28:49', 'Complete'),
(3, 3, 540, 964136650, 1, '2023-07-28 05:29:02', 'Complete'),
(4, 1, 50, 1125088185, 1, '2023-07-28 05:30:13', 'pending'),
(5, 1, 0, 511547885, 0, '2023-07-28 05:32:51', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payments_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payments_mode`, `date`) VALUES
(1, 2, 643072337, 150, 'Gpay/Phonepay', '2023-07-28 04:46:03'),
(2, 3, 964136650, 540, 'Cash On Delivery', '2023-07-28 05:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_image` varchar(225) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$KkvIuzw9sfYwkGlER8Xbtu7vDQ5XFo0vDKGJoqJ7nVvPNVAF9HrQy', 'cute.ico', '::1', 'dubai', 123456789),
(2, 'Test', 'test@gmail.com', '$2y$10$F159dCRPJE76dHhsC9VoB.1c6Vxv/1m/o4oW6snYt6vHe8LkxPdTO', 'download.png', '::1', 'mumbai', 987654321),
(3, 'final', 'final@gmail.com', '$2y$10$mfgId0REnMTRjQ2MBSBUVeDkevXI3J4Vs4lnSbWyRsuzGJ4c8F12G', 'upi.png', '::1', 'tamil', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `card_deatails`
--
ALTER TABLE `card_deatails`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `card_deatails`
--
ALTER TABLE `card_deatails`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
