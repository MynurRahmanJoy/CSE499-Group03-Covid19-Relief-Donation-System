-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 09:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse499`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `ID` int(11) NOT NULL,
  `User_Name` text NOT NULL,
  `Mobile_Number` varchar(13) NOT NULL,
  `Current_Address` varchar(255) NOT NULL,
  `Email_ID` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`ID`, `User_Name`, `Mobile_Number`, `Current_Address`, `Email_ID`, `Password`, `Created_At`) VALUES
(1, 'mrjoy123', '1622869968', '342,Elephant Road, Dhaka-1205\r\nMega A High Palace, Flat:8AB', 'mynurrahman.mrj@gmail.com', 'aA123456789', '2021-06-22 21:20:50'),
(2, 'mrjoy456', '1680599989', '342,Elephant Road, Dhaka-1205', 'nazmunnahar@gmail.com', '12345aA908', '2021-06-22 21:26:23'),
(3, 'joy123', '2147483647', '342,elephant road', 'mahbuburrahman@gmail.com', 'aaAA1234567', '2021-06-22 23:25:52'),
(4, 's345', '2147483647', '432,ewrewr', 'sdfsd@gmail.com', 'asdadAA345', '2021-06-22 23:59:22'),
(5, 'sad344', '2147483647', '234,kichu ekta', 'aaa@gmail.com', 'aaAA1234', '2021-06-23 00:05:23'),
(6, 'asd232', '11111111111', '213,ewqweqe', 'dsfs@blabla.com', 'Mmsad123', '2021-06-23 00:08:25'),
(7, 'abc123', '01234567891', 'habijabi,blabla,dhaka-1205', 'mynur.rahman@northsouth.edu', 'aaAA12345678', '2021-06-23 15:38:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
