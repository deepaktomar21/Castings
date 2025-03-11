-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2025 at 07:50 AM
-- Server version: 8.0.37
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textcode_doctor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int NOT NULL,
  `country_id` int NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Delhi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Haryana', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Punjab', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Chandigarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'Himachal Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Jammu & Kashmir', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'Uttar Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'Uttaranchal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'Rajasthan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Gujarat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 'Daman & Diu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'Dadra & Nagar Haveli', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'Maharashtra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 'Goa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 'Madhya Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 'Chhattisgarh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 'Bihar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'Andhra Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 'Pondicherry', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 'Karnataka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 'Tamil Nadu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 'Kerala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 'Lakshdweep', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 'West Bengal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 'Sikkim', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 1, 'Andaman Nicobar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1, 'Orissa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, 'Assam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1, 'Arunachal Pradesh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 1, 'Meghalaya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 1, 'Manipur', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 1, 'Mizoram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 1, 'Nagaland', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 1, 'Tripura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 1, 'Jharkhand', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
