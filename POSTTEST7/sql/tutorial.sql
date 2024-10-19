-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2024 at 08:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('available','sold') DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `price`, `status`, `created_at`) VALUES
(1, 'Toyota', 'Camry', 2022, '30000.00', 'available', '2024-10-19 20:08:34'),
(2, 'Honda', 'Civic', 2021, '25000.00', 'sold', '2024-10-19 20:08:34'),
(3, 'Tesla', 'Model 3', 2023, '50000.00', 'available', '2024-10-19 20:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `foto` varchar(255) DEFAULT 'path/to/default/photo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`, `foto`) VALUES
(1, 'hari', 'hari@gmail.com', 30, '123', '2024-10-19 20.05.51.jpg'),
(2, 'budi', 'budi12@gmail.com', 30, '123654', ''),
(3, 'rizki', 'rizki@gmail.com', 69, '654', ''),
(4, 'mamat', 'mamat@gmail.com', 60, '369', ''),
(5, 'P Diddy', 'diddy@gmail.com', 59, 'babyoil', ''),
(6, 'Asep', 'asep22@gmail.com', 23, '123', ''),
(7, 'Rizky', 'rizky', 23, '456', ''),
(8, 'rafi', 'rafi@gmail.com', 30, 'mobil', 'path/to/default/photo.jpg'),
(9, 'gita', 'gita@gmail.com', 30, '$2y$10$uoEjK7ATiThE.kA7mrCQfufeLrLi6qAHj0IUSHVi8sAogsacvLKI6', 'path/to/default/photo.jpg'),
(10, 'heru', 'heru@gmail.com', 20, '$2y$10$0VB1vQ642S7MRvgd3htceeXA/kA5TaatG4FqeWArC8SCClghO9p4K', 'path/to/default/photo.jpg'),
(11, 'hari', 'hari@gmail.com', 30, '$2y$10$0gUrUYmMPmR7EggQK4U4NuWSZENAKiCjvN9SidyNHRJrKdqhSNKjy', '2024-10-19 20.00.49.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
