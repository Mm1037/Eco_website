-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 03:39 PM
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
-- Database: `edix_eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `IMAGE_PATH` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`ID`, `NAME`, `EMAIL`, `PHONE`, `ADDRESS`, `IMAGE_PATH`) VALUES
(1, 'STAA', 'sta@edu.ege', '11-222-4455', '10st of ramadansas', 'STAA-11-222-4455-we-academy.png'),
(23, 'We', 'we@we.we', '111666666', 'Caairo', 'We-111666666-we-academy.png'),
(28, 'TBJ', 'tbj@tb.com', '1234567890', 'Caior', 'TBJ-1234567890-sta-academy.png'),
(29, 'TBJ', 'tbj@tb.com', '123456789', 'Caior', 'TBJ-123456789-tree.jpeg'),
(30, 'Adham', 'adhamaltonsy@gmail.com', '01028806961', 'Cairo, Egypt', 'Adham-01028806961-sta-academy.png'),
(31, 'Adham', 'adhamaltonsy@gmail.com', '01028806961', 'Cairo, Egypt', 'Adham-01028806961-sta-academy.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `ROLE` varchar(50) NOT NULL,
  `TOKEN` varchar(255) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `ORG_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `USERNAME`, `PASSWORD`, `CREATED_DATE`, `ROLE`, `TOKEN`, `FNAME`, `LNAME`, `ORG_ID`) VALUES
(1, 'adhamaltonsy@gmail.com', 'Adham', '2024-10-20', 'public', '08q0v8ioqitfenittsd1k5e1r9', 'Adham', 'Altonsy', 1),
(2, 'omar@gmail.com', 'Omar', '2024-10-22', 'public', '08q0v8ioqitfenittsd1k5e1r9', 'Omar', 'Mohamed', 0),
(3, 'mo@mo.com', 'mm', '2024-10-24', 'public', '08q0v8ioqitfenittsd1k5e1r9', 'Mohamed', 'Ahmed', 28),
(4, 'to@yo.com', 'mm', '2024-10-24', 'public', '08q0v8ioqitfenittsd1k5e1r9', 'Tonsy', 'KOOKK', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME_UNIQUE` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
