-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 10:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handyman_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnum` varchar(13) NOT NULL,
  `date` date NOT NULL,
  `promo` varchar(50) DEFAULT NULL,
  `needs` text NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `employee` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `address`, `email`, `pnum`, `date`, `promo`, `needs`, `job`, `employee`) VALUES
(1, 'Sample name', 'Sample address', 'sample@gmail.com', '09123456789', '2024-04-26', 'Sample Promo Code', 'I need help with my roof!', 'Plumbers', 'Jeon Jungkook');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `job`, `photo_path`) VALUES
(1, 'Renz D. Carpaintor', 'Carpenters', 'images/Carpenter 1.png'),
(2, 'Bogart D. Washington', 'Carpenters', 'images/Carpenter 2.1.png'),
(3, 'Sren X. Catacutan', 'Carpenters', 'images/Carpenter 3.png'),
(4, 'Eren Yeager', 'Electricians', 'images/Electrician 1.png'),
(5, 'Andoqs A. Kilabut', 'Electricians', 'images/Electrician 2.png'),
(6, 'Han Sah Mah', 'Plumbers', 'images/plumber 1.png'),
(7, 'Jeon Jungkook', 'Plumbers', 'images/plumber 2.png'),
(8, 'Duhdee Rens', 'Plumbers', 'images/plumber 3.png'),
(9, 'Kanino ka lang? Oliver', 'Mechanics', 'images/mechanic 1.png'),
(10, 'Abdul Jabar Hakim', 'Mechanics', 'images/mechanic 2.png'),
(11, 'Will Smith', 'Mechanics', 'images/mechanic 3.png'),
(12, 'Vic Sotto', 'Installers', 'images/Wifi Installer.png'),
(13, 'Pepsi Paloma', 'Installers', 'images/CCTV Installer.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_job` (`job`),
  ADD KEY `fk_employee` (`employee`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_idx` (`job`),
  ADD KEY `name_idx` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_employee` FOREIGN KEY (`employee`) REFERENCES `employees` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_job` FOREIGN KEY (`job`) REFERENCES `employees` (`job`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
