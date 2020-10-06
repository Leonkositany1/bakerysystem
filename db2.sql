-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table eatery.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table eatery.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `uname`, `email`, `password`) VALUES
	(1, 'admin', 'admin@sys.com', 'e727d1464ae12436e899a726da5b2f11d8381b26');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table eatery.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `phone` int(15) NOT NULL,
  `location` text NOT NULL,
  `checkout_time` varchar(50) NOT NULL DEFAULT 'current_timestamp(6)',
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table eatery.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table eatery.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `cart_id` int(20) DEFAULT NULL,
  `product_id` int(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(20) NOT NULL DEFAULT 1,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table eatery.order_items: ~19 rows (approximately)
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` (`id`, `user_email`, `cart_id`, `product_id`, `product_name`, `price`, `qty`, `is_paid`) VALUES
	(4, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 3, 0),
	(5, 'raphael2@gmail.com', NULL, 2, 'cake', 200, 1, 0),
	(6, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(7, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(8, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(9, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(10, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(11, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(12, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(13, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(14, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(15, 'raphael2@gmail.com', NULL, 3, 'kkk', 200, 1, 0),
	(16, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 1, 0),
	(17, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 1, 0),
	(18, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 1, 0),
	(19, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 1, 0),
	(20, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 1, 0),
	(21, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 1, 0),
	(22, 'raphael2@gmail.com', NULL, 1, 'cake', 200, 1, 0);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;

-- Dumping structure for table eatery.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `img` varchar(67) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table eatery.products: ~2 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `img`, `created_at`) VALUES
	(1, 'cake', 200, '', '0000-00-00 00:00:00.000000'),
	(2, 'cake', 200, '', '2020-09-25 12:10:26.000000'),
	(3, 'kkk', 200, '87d0842d2b8449cebcca7120124471f0.jpg', '2020-09-30 14:16:15.382106');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table eatery.queries
CREATE TABLE IF NOT EXISTS `queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table eatery.queries: ~0 rows (approximately)
/*!40000 ALTER TABLE `queries` DISABLE KEYS */;
/*!40000 ALTER TABLE `queries` ENABLE KEYS */;

-- Dumping structure for table eatery.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `password` varchar(200) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table eatery.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `time`) VALUES
	(1, 'matthew1@gmail.com', '323f4882b29512ffe2eba7802c5fecefb076977c', '2020-09-25 11:10:50.338043'),
	(2, 'ceasar1@gmail.com', '323f4882b29512ffe2eba7802c5fecefb076977c', '2020-09-25 12:04:28.819723'),
	(3, 'raphael2@gmail.com', '323f4882b29512ffe2eba7802c5fecefb076977c', '2020-09-29 11:06:16.497130'),
	(4, 'fugice@mailinator.com', '', '2020-10-02 09:49:30.657285'),
	(5, 'vyxalaf@mailinator.com', '', '2020-10-02 09:49:53.006542'),
	(6, 'boby@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '2020-10-02 09:53:43.553295');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
