-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 04:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(200) NOT NULL,
  `admin_pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_pass`) VALUES
('admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_Name` varchar(100) NOT NULL,
  `Book_ID` int(11) NOT NULL,
  `Available_Status` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Mem_Id` int(11) DEFAULT NULL,
  `ISBN` varchar(100) NOT NULL,
  `book_type` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_Name`, `Book_ID`, `Available_Status`, `Rating`, `Mem_Id`, `ISBN`, `book_type`, `book_author`) VALUES
('1', 2, 3, 0, 1, '6', '7', '9'),
('12', 3, 12, 31, 1, '123', '', ''),
('Amra', 4, 1, 0, 1, '1233', 'Hstory', 'Humayon Ahmed'),
('Mrinmoyir Mon valo nei', 12344, 2, 0, 1, '123412341', 'upoonnash', 'Humayon Ahmed'),
('abul', 131267, 2, 0, 1, '56667', 'Hstory', 'Humayon Ahmed'),
('23', 12341234, 2, 0, 1, '312', '231', '23');

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE `book_request` (
  `Book_ID` int(11) NOT NULL,
  `Mem_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `Issue_date` date NOT NULL,
  `Return_date` varchar(200) DEFAULT NULL,
  `Due_date` date NOT NULL,
  `Fine` int(11) DEFAULT NULL,
  `Book_ID` int(11) NOT NULL,
  `Mem_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`Issue_date`, `Return_date`, `Due_date`, `Fine`, `Book_ID`, `Mem_ID`) VALUES
('2021-05-03', '2021-05-20', '2021-05-12', 100, 2, 1),
('2020-12-12', '2021-05-13', '2020-12-12', 100, 3, 5),
('2021-05-04', '2000-12-12', '2021-05-04', 100, 3, 7),
('2021-05-02', '2021-05-07', '2021-05-04', 100, 12, 3),
('2021-05-03', '2021-05-29', '2021-05-06', 100, 13, 8),
('2021-05-03', '2021-05-28', '2021-05-12', 100, 4, 7),
('0000-00-00', '0', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `can_rates`
--

CREATE TABLE `can_rates` (
  `Rates` int(11) NOT NULL,
  `Book_ID` int(11) NOT NULL,
  `Mem_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_Name` varchar(100) NOT NULL,
  `Mem_Id` int(11) NOT NULL,
  `Mem_pass` varchar(100) NOT NULL,
  `Phone_num` char(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `DOB` date NOT NULL,
  `profession` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_Name`, `Mem_Id`, `Mem_pass`, `Phone_num`, `Email`, `Address`, `DOB`, `profession`) VALUES
('Rishad', 7, '81dc9bdb52d04dc20036dbd8313ed055', '01680032074', 'rishad@gmail.com', '238/6,East Marialy , Joydebpur , Gazipur', '1999-09-17', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `new_books`
--

CREATE TABLE `new_books` (
  `Book_Name` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Book_Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_books`
--

INSERT INTO `new_books` (`Book_Name`, `Author`, `Book_Type`) VALUES
('Bangla Bhasha', 'Alim Dar', 'History');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Book_Name` varchar(100) NOT NULL,
  `Mem_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_ID`),
  ADD KEY `Mem_Id` (`Mem_Id`);

--
-- Indexes for table `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`Book_ID`,`Mem_Id`),
  ADD KEY `Mem_Id` (`Mem_Id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `fk1` (`Book_ID`),
  ADD KEY `fk2` (`Mem_ID`);

--
-- Indexes for table `can_rates`
--
ALTER TABLE `can_rates`
  ADD PRIMARY KEY (`Book_ID`,`Mem_Id`),
  ADD KEY `Mem_Id` (`Mem_Id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Mem_Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `new_books`
--
ALTER TABLE `new_books`
  ADD PRIMARY KEY (`Book_Name`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Book_Name`,`Mem_Id`),
  ADD KEY `Mem_Id` (`Mem_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Mem_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
