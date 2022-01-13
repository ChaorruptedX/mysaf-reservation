-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2021 at 03:26 PM
-- Server version: 8.0.23
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysaf_reservation`
--
CREATE DATABASE IF NOT EXISTS `mysaf_reservation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mysaf_reservation`;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_role`
--
-- Creation: Dec 03, 2021 at 06:26 AM
--

CREATE TABLE IF NOT EXISTS `lookup_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL DEFAULT '0' COMMENT 'Unix Timestamp',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk-lookup_role-code` (`code`,`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='List of Role';

--
-- RELATIONSHIPS FOR TABLE `lookup_role`:
--

--
-- Dumping data for table `lookup_role`
--

INSERT INTO `lookup_role` (`id`, `code`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SA001', 'System Administrator', '2021-12-03 05:18:31', '2021-12-03 05:18:31', 0),
(2, 'MC001', 'Mosque Committee', '2021-12-03 05:18:49', '2021-12-03 05:18:49', 0),
(3, 'U001', 'User', '2021-12-03 05:19:28', '2021-12-03 05:19:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mosque`
--
-- Creation: Dec 03, 2021 at 06:38 AM
--

CREATE TABLE IF NOT EXISTS `mosque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel_no` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL DEFAULT '0' COMMENT 'Unix Timestamp',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Mosque Detail';

--
-- RELATIONSHIPS FOR TABLE `mosque`:
--

--
-- Dumping data for table `mosque`
--

INSERT INTO `mosque` (`id`, `name`, `address`, `tel_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Masjid Sayyidina Abu Bakar', 'Pusat Islam, Universiti Teknikal Malaysia Melaka, Jalan Hang Tuah Jaya, 76100 Durian Tunggal, Melaka', '06-555 6304', '2021-12-03 06:50:28', '2021-12-03 06:50:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_detail`
--
-- Creation: Dec 03, 2021 at 06:27 AM
--

CREATE TABLE IF NOT EXISTS `personal_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel_no` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL DEFAULT '0' COMMENT 'Unix Timestamp',
  PRIMARY KEY (`id`),
  KEY `fk-personal_detail-id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='User Personal Detail';

--
-- RELATIONSHIPS FOR TABLE `personal_detail`:
--   `id_user`
--       `user` -> `id`
--

--
-- Dumping data for table `user`
--

INSERT INTO `personal_detail` (`id_user`, `name`, `tel_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '0123456789', '2021-12-03 06:49:00', '2021-12-03 06:49:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--
-- Creation: Dec 03, 2021 at 06:43 AM
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_personal_detail` int NOT NULL COMMENT 'System Administrator or Mosque Committee',
  `id_mosque` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `open_time` datetime NOT NULL,
  `close_time` datetime NOT NULL,
  `maximum_capacity` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL DEFAULT '0' COMMENT 'Unix Timestamp',
  PRIMARY KEY (`id`),
  KEY `fk-reservation-id_personal_detail` (`id_personal_detail`),
  KEY `fk-reservation-id_mosque` (`id_mosque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Event Created by System Administrator or Mosque Committe for User Reservation';

--
-- RELATIONSHIPS FOR TABLE `reservation`:
--   `id_mosque`
--       `mosque` -> `id`
--   `id_personal_detail`
--       `personal_detail` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Dec 03, 2021 at 06:27 AM
-- Last update: Dec 03, 2021 at 06:48 AM
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_role` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'bcrypt Hashing',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL DEFAULT '0' COMMENT 'Unix Timestamp',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk-user-email` (`email`,`deleted_at`),
  KEY `fk-user-id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='User Authentication';

--
-- RELATIONSHIPS FOR TABLE `user`:
--   `id_role`
--       `lookup_role` -> `id`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_role`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'admin@gmail.com', '$2y$10$k.9tW9VAs4PcMUaYp3NKYeOibBaNZSkk5FzCgMa6.5auwp.ISki4C', '2021-12-03 06:48:00', '2021-12-03 06:48:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_reservation`
--
-- Creation: Dec 03, 2021 at 06:28 AM
--

CREATE TABLE IF NOT EXISTS `user_reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_personal_detail` int NOT NULL COMMENT 'User',
  `id_reservation` int NOT NULL,
  `status` int NOT NULL COMMENT '1 = Reserved, 0 = Cancelled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk-user_reservation-id_personal_detail` (`id_personal_detail`),
  KEY `fk-user_reservation-id_reservation` (`id_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Reservation Made by the User';

--
-- RELATIONSHIPS FOR TABLE `user_reservation`:
--   `id_personal_detail`
--       `personal_detail` -> `id`
--   `id_reservation`
--       `reservation` -> `id`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personal_detail`
--
ALTER TABLE `personal_detail`
  ADD CONSTRAINT `fk-personal_detail-id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk-reservation-id_mosque` FOREIGN KEY (`id_mosque`) REFERENCES `mosque` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk-reservation-id_personal_detail` FOREIGN KEY (`id_personal_detail`) REFERENCES `personal_detail` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk-user-id_role` FOREIGN KEY (`id_role`) REFERENCES `lookup_role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_reservation`
--
ALTER TABLE `user_reservation`
  ADD CONSTRAINT `fk-user_reservation-id_personal_detail` FOREIGN KEY (`id_personal_detail`) REFERENCES `personal_detail` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk-user_reservation-id_reservation` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table lookup_role
--

--
-- Metadata for table mosque
--

--
-- Metadata for table personal_detail
--

--
-- Metadata for table reservation
--

--
-- Metadata for table user
--

--
-- Metadata for table user_reservation
--

--
-- Metadata for database mysaf_reservation
--

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_descr`) VALUES
('mysaf_reservation', 'MySaf Reservation');

SET @LAST_PAGE = LAST_INSERT_ID();

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('mysaf_reservation', 'lookup_role', @LAST_PAGE, 50, 40),
('mysaf_reservation', 'mosque', @LAST_PAGE, 690, 50),
('mysaf_reservation', 'personal_detail', @LAST_PAGE, 360, 100),
('mysaf_reservation', 'reservation', @LAST_PAGE, 690, 370),
('mysaf_reservation', 'user', @LAST_PAGE, 90, 330),
('mysaf_reservation', 'user_reservation', @LAST_PAGE, 360, 430);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
