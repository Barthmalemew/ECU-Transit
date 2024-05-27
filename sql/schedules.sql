-- phpMyAdmin SQL Dump
-- version 5.2.1-2.fc39
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2024 at 03:37 PM
-- Server version: 10.5.23-MariaDB
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Transit_Drivers`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `clock_in_time` time NOT NULL,
  `clock_out_time` time NOT NULL,
  `date` date NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `driver_id`, `clock_in_time`, `clock_out_time`, `date`, `route_id`) VALUES
(1, 1, '07:30:00', '09:30:00', '2024-05-13', 1),
(2, 2, '08:00:00', '10:00:00', '2024-05-27', 2),
(3, 3, '08:30:00', '10:30:00', '2024-05-06', 3),
(4, 4, '09:00:00', '11:00:00', '2024-05-07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `route_id` (`route_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
