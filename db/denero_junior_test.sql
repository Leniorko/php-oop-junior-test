-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2021 at 08:25 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denero_junior_test`
--
CREATE DATABASE IF NOT EXISTS `denero_junior_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `denero_junior_test`;

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
CREATE TABLE IF NOT EXISTS `objects` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `name`, `status`) VALUES
(1, 'Kids', 3),
(2, 'Shoes', 2),
(3, 'Industrial', 3),
(4, 'Computers', 1),
(5, 'Jewelry', 1),
(6, 'Games', 3),
(7, 'Clothing', 1),
(8, 'Home', 1),
(9, 'Baby', 3),
(10, 'Toys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `object_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id_FK` (`object_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `object_id`) VALUES
(1, 'amound0', 'sCN3CtV0R', 1),
(2, 'cvila1', 'EoEtB7LK0uEX', 9),
(3, 'hbetje2', 'EasfRwPDP3o', NULL),
(4, 'emansbridge3', '2uIZjSQbmJ', NULL),
(5, 'ddrewet4', 'X3m5Mp5FY3O4', 1),
(6, 'ckennicott5', 'aQ2YXn', 4),
(7, 'aneilus6', 'jfgpVCzPh0', 7),
(8, 'nhorley7', 'IgkaT0XuP', 9),
(9, 'dcullrford8', 'F9bFy7z', NULL),
(10, 'rpadfield9', '6NgaXoW', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `object_id_FK` FOREIGN KEY (`object_id`) REFERENCES `objects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
