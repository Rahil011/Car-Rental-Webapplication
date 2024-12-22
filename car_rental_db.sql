-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 08:58 PM
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
-- Database: `car_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `agency_Id` int(11) NOT NULL,
  `agency_Name` varchar(100) NOT NULL,
  `agency_Phone` varchar(20) NOT NULL,
  `agency_Email` varchar(100) NOT NULL,
  `agency_Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`agency_Id`, `agency_Name`, `agency_Phone`, `agency_Email`, `agency_Password`) VALUES
(1, 'car dheko', '9874563215', 'car@gmail.com', '$2y$10$TKlC9eCORnFROmUrc8ZEV.LTj4eYKH79axgv3Af/7pA9YPKtlRKyy');

-- --------------------------------------------------------

--
-- Table structure for table `available_car`
--

CREATE TABLE `available_car` (
  `V_Id` int(11) NOT NULL,
  `V_Model` varchar(50) NOT NULL,
  `V_Name` varchar(100) NOT NULL,
  `V_Number` varchar(20) NOT NULL,
  `V_Seat_Cap` int(11) NOT NULL,
  `V_Rent` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_car`
--

INSERT INTO `available_car` (`V_Id`, `V_Model`, `V_Name`, `V_Number`, `V_Seat_Cap`, `V_Rent`) VALUES
(2, 'ASDFGHJ', 'AUDI', '23456VBNSM', 5, 100),
(3, 'GH54S', 'BMW', 'UP32RR4004', 5, 900);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_model` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `total_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `customer_Name` varchar(100) NOT NULL,
  `customer_Phone` varchar(20) NOT NULL,
  `customer_Email` varchar(100) NOT NULL,
  `customer_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `customer_Name`, `customer_Phone`, `customer_Email`, `customer_Password`) VALUES
(1, 'Rahil Khan', '9889848122', 'rahil4356@gmail.com', '$2y$10$qVidM8NKB9gqwV7FxcYBPOAgjfctM6cunv7sRLOJ1Mnl1szaiaYpu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`agency_Id`);

--
-- Indexes for table `available_car`
--
ALTER TABLE `available_car`
  ADD PRIMARY KEY (`V_Id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `agency_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_car`
--
ALTER TABLE `available_car`
  MODIFY `V_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
