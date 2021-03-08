-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 04:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carhut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `Condition` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `sellerinfo` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`, `category`, `brand`, `Condition`, `colour`, `sellerinfo`) VALUES
(2, 'Nissan GTR', 'Images/car2.jpg', 1000000.00, 'Sedan', 'Toyota', 'Recondition', 'White', 'This car is imported by CAR HOUSE LImited'),
(3, 'Toyota Supra MK5', 'Images/car3.jpg', 3000000.00, 'Sports Sedan', 'Nissan', 'Brand New', 'Red', 'This car is imported by Sal-Sabeel Car'),
(4, 'Toyota RAV4', 'Images/car4.jpg', 8000000.00, 'SUV', 'Toyota', 'Recondition', 'Metalic Black', 'This car is imported by Auto-Museum Limited'),
(1, 'Toyota Camry', 'Images/car1.jpg', 30445000.00, 'Sedan', 'Toyota', 'Brand New', 'Red', 'This car is imported by CAR HOUSE LImited');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `User_Name`, `Password`, `Gender`, `Contact_No`, `Email`) VALUES
(1, 'Tahmid', 'tahmid231', '12345678', 'Male', '01706348352', 'tahmid231@gmail.com'),
(2, 'Ahanaf', 'ahanaf231', '053161279', 'Male', '01706348352', 'ahanaf.Islam@northsouth.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
