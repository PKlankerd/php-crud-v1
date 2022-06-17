-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 08:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `ID` int(11) NOT NULL,
  `PositionName` varchar(50) NOT NULL,
  `IsActive` int(3) DEFAULT NULL,
  `CreateBy` int(3) DEFAULT NULL,
  `CreateDate` datetime DEFAULT current_timestamp(),
  `UpdateBy` int(3) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`ID`, `PositionName`, `IsActive`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'เจ้าหน้าที่สำนักงาน', 1, 1, '2022-06-15 10:42:31', 1, '2022-06-15 10:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `ID` int(11) NOT NULL,
  `PrefixName` varchar(50) NOT NULL,
  `PrefixNameDescription` varchar(50) DEFAULT NULL,
  `IsActive` int(10) DEFAULT NULL,
  `CreateBy` int(10) DEFAULT NULL,
  `CreateDate` datetime DEFAULT current_timestamp(),
  `UpdateBy` int(10) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`ID`, `PrefixName`, `PrefixNameDescription`, `IsActive`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'นาย', NULL, 1, 1, '2022-06-15 10:37:20', 1, '2022-06-15 10:37:20'),
(2, 'นาง', NULL, 1, 1, '2022-06-15 10:41:14', 1, '2022-06-15 10:41:14'),
(3, 'น.ส.', NULL, 1, 1, '2022-06-15 10:41:14', 1, '2022-06-15 10:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `roletype`
--

CREATE TABLE `roletype` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `IsActive` int(3) NOT NULL,
  `CreateBy` int(3) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` int(3) NOT NULL,
  `UpdateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roletype`
--

INSERT INTO `roletype` (`ID`, `Name`, `IsActive`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'Viewer', 1, 1, '2022-06-15 12:09:02', 1, '2022-06-15 12:09:02'),
(2, 'Administrator', 1, 1, '2022-06-15 12:09:02', 1, '2022-06-15 12:09:02'),
(3, 'ฝ่ายการตลาด', 1, 1, '2022-06-15 12:09:02', 1, '2022-06-15 12:09:02'),
(4, 'ITA', 1, 1, '2022-06-15 12:09:02', 1, '2022-06-15 12:09:02'),
(5, 'Call Center', 1, 1, '2022-06-15 12:09:02', 1, '2022-06-15 12:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `PrefixID` varchar(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `PositionID` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `ImagePath` varchar(200) DEFAULT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `RoleTypeID` varchar(50) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `CreateBy` varchar(50) DEFAULT NULL,
  `CreateDate` datetime DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `PrefixID`, `Name`, `Lastname`, `PositionID`, `Address`, `Email`, `PhoneNumber`, `ImagePath`, `UserName`, `Password`, `RoleTypeID`, `Status`, `IsActive`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
(1, 'นาย', 'ปรเมศวร์', 'กลั่นเกิด', 'เจ้าหน้าที่สำนักงาน', 'mmm', 'zasd@gmail.com', '08xxxxxxxx', NULL, 'nem123', '25d55ad283aa400af464c76d713c07ad', 'ฝ่ายการตลาด', 0, 1, 'ปรเมศวร์', '2022-06-16 17:36:10', 'ปรเมศวร์', '2022-06-17 11:55:42'),
(2, 'นาย', 'kkk', 'azxc', 'เจ้าหน้าที่สำนักงาน', 'cvbcb', 'vbn@gmail.com', '087xxxxxxxx', NULL, 'asd123', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 1, 1, 'kkk', '2022-06-17 09:25:59', 'kkk', '2022-06-17 13:19:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roletype`
--
ALTER TABLE `roletype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roletype`
--
ALTER TABLE `roletype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
