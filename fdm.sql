-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 10:07 AM
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
-- Database: `fdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `surname`) VALUES
(1, 'admin', '$2y$10$lHl7l0rl5ZMCUeMmrpwr4OgZhjiQZjCMUTzc1XusePk1qFDVT3/Hy', 'name', 'surname');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `building` char(1) NOT NULL,
  `floor` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `img` blob DEFAULT NULL,
  `contract` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `price`, `building`, `floor`, `number`, `status`, `startDate`, `endDate`, `img`, `contract`) VALUES
(4, '1+3', 500, 'A', 4, 355627126, 'Empty', NULL, NULL, NULL, NULL),
(5, '1+3', 8000, 'A', 4, 355627126, 'Empty', NULL, NULL, NULL, NULL),
(6, 'Single', 99.99, 'A', 1, 101, 'Empty', NULL, NULL, NULL, NULL),
(7, 'Double', 149.99, 'B', 2, 205, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(8, 'Suite', 299.99, 'C', 3, 303, 'Empty', NULL, NULL, NULL, NULL),
(9, 'Single', 89.99, 'A', 2, 202, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(10, 'Double', 139.99, 'B', 1, 103, 'Empty', NULL, NULL, NULL, NULL),
(11, 'Suite', 249.99, 'C', 4, 401, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(12, 'Single', 99.99, 'A', 3, 301, 'Empty', NULL, NULL, NULL, NULL),
(13, 'Double', 159.99, 'B', 3, 305, 'Empty', NULL, NULL, NULL, NULL),
(14, 'Suite', 289.99, 'C', 2, 201, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(15, 'Single', 79.99, 'A', 4, 401, 'Empty', NULL, NULL, NULL, NULL),
(16, 'Double', 129.99, 'A', 3, 303, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(17, 'Suite', 269.99, 'B', 2, 202, 'Empty', NULL, NULL, NULL, NULL),
(18, 'Single', 89.99, 'C', 1, 101, 'Empty', NULL, NULL, NULL, NULL),
(19, 'Double', 139.99, 'A', 2, 203, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(20, 'Suite', 299.99, 'B', 1, 102, 'Empty', NULL, NULL, NULL, NULL),
(21, 'Single', 99.99, 'C', 4, 401, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(22, 'Double', 159.99, 'A', 4, 404, 'Empty', NULL, NULL, NULL, NULL),
(23, 'Suite', 279.99, 'B', 3, 302, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(24, 'Single', 79.99, 'C', 3, 301, 'Empty', NULL, NULL, NULL, NULL),
(25, 'Double', 129.99, 'A', 1, 101, 'Empty', NULL, NULL, NULL, NULL),
(26, 'Suite', 259.99, 'B', 4, 402, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(27, 'Single', 99.99, 'C', 2, 201, 'Empty', NULL, NULL, NULL, NULL),
(28, 'Double', 149.99, 'A', 2, 204, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(29, 'Suite', 299.99, 'B', 3, 303, 'Empty', NULL, NULL, NULL, NULL),
(30, 'Single', 89.99, 'C', 4, 401, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(31, 'Double', 139.99, 'A', 3, 303, 'Empty', NULL, NULL, NULL, NULL),
(32, 'Suite', 249.99, 'B', 1, 101, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(33, 'Single', 99.99, 'C', 1, 101, 'Empty', NULL, NULL, NULL, NULL),
(34, 'Double', 159.99, 'A', 4, 403, 'Empty', NULL, NULL, NULL, NULL),
(35, 'Suite', 289.99, 'B', 2, 202, 'Occupied', '2023-10-22', NULL, NULL, NULL),
(36, 'Single', 79.99, 'C', 3, 302, 'Empty', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `personalNo` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `phoneNo` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `roomId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `personalNo`, `name`, `surname`, `phoneNo`, `email`, `roomId`) VALUES
(1, 'sdfghj', 'Erlis', 'Kendezi', '', '', NULL),
(3, 'A1234567', 'John', 'Doe', '555-123-4567', 'john.doe@example.com', NULL),
(4, 'B9876543', 'Jane', 'Smith', '555-987-6543', 'jane.smith@example.com', NULL),
(5, 'C2345678', 'Robert', 'Johnson', '555-234-5678', 'robert.johnson@example.com', NULL),
(6, 'D8765432', 'Emily', 'Brown', '555-876-5432', 'emily.brown@example.com', NULL),
(7, 'E3456789', 'Michael', 'Davis', '555-345-6789', 'michael.davis@example.com', NULL),
(8, 'F7654321', 'Olivia', 'Lee', '555-765-4321', 'olivia.lee@example.com', NULL),
(9, 'G4567890', 'William', 'Clark', '555-456-7890', 'william.clark@example.com', NULL),
(10, 'H6543210', 'Sophia', 'Taylor', '555-654-3210', 'sophia.taylor@example.com', NULL),
(11, 'I2345678', 'James', 'Harris', '555-234-5678', 'james.harris@example.com', NULL),
(12, 'J9876543', 'Mia', 'Anderson', '555-987-6543', 'mia.anderson@example.com', NULL),
(13, 'K1234567', 'Benjamin', 'Moore', '555-123-4567', 'benjamin.moore@example.com', NULL),
(14, 'L8765432', 'Ava', 'White', '555-876-5432', 'ava.white@example.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomOwn` (`roomId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `roomOwn` FOREIGN KEY (`roomId`) REFERENCES `room` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
