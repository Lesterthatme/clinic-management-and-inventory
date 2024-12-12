-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 12, 2024 at 03:30 PM
-- Server version: 11.7.1-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `audID` int(11) NOT NULL,
  `audUserID` int(11) NOT NULL,
  `audIllnessType` int(11) DEFAULT NULL,
  `audDescription` varchar(255) NOT NULL,
  `audDate` datetime NOT NULL,
  `audSupplyID` int(11) DEFAULT NULL,
  `auditType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audittype`
--

CREATE TABLE `audittype` (
  `audTypeID` int(11) NOT NULL,
  `audTypeDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audittype`
--

INSERT INTO `audittype` (`audTypeID`, `audTypeDescription`) VALUES
(1, 'authentication'),
(2, 'dispense'),
(3, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `illnesstypes`
--

CREATE TABLE `illnesstypes` (
  `illID` int(11) NOT NULL,
  `illDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `illnesstypes`
--

INSERT INTO `illnesstypes` (`illID`, `illDescription`) VALUES
(1, 'Respiratory Illnesses'),
(2, 'Gastrointestinal Illnesses'),
(3, 'Skin Conditions'),
(4, 'Allergic Reactions'),
(5, 'Other Illnesses');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `supplyID` int(11) NOT NULL,
  `supplyName` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `expDate` date NOT NULL,
  `dispense` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`supplyID`, `supplyName`, `stock`, `startDate`, `expDate`, `dispense`, `status`) VALUES
(1, 'Biogesic', 4, '2024-12-01', '0000-00-00', 0, 'In Stock'),
(2, 'Buscopan', 4, '2024-12-01', '0000-00-00', 0, 'In Stock'),
(3, 'Diatabs', 0, '2024-12-01', '2028-12-01', 0, 'Out of Stock'),
(4, 'Neozep', 10, '2024-12-01', '2028-12-01', 0, 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userStudentID` varchar(100) DEFAULT NULL,
  `userFName` varchar(100) NOT NULL,
  `userMName` varchar(100) NOT NULL,
  `userLName` varchar(100) NOT NULL,
  `userType` int(11) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `userBirthday` date NOT NULL,
  `userWorkPosition` varchar(100) DEFAULT NULL,
  `userInstitute` varchar(100) NOT NULL,
  `userSubject` varchar(100) DEFAULT NULL,
  `userBarangay` varchar(100) NOT NULL,
  `userTown` varchar(100) NOT NULL,
  `userCity` varchar(100) NOT NULL,
  `userProvince` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userStudentID`, `userFName`, `userMName`, `userLName`, `userType`, `userEmail`, `userPassword`, `userBirthday`, `userWorkPosition`, `userInstitute`, `userSubject`, `userBarangay`, `userTown`, `userCity`, `userProvince`) VALUES
(7, NULL, 'dave', 'B', 'Tolentino', 2, 'vincentdavetolentino.basc@gmail.com', '$2y$10$Blv7mdqdMXaX1/OOrn/uyu5W8pG48RCNkpv/8NfUBJf.syNNm4z3G', '2024-10-01', NULL, 'IEAT', NULL, 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan'),
(8, NULL, 'Althea Shamel', 'B', 'Pangilinan', 3, 'altheamiranda.basc@gmail.com', '$2y$10$jolwyRxDv5qZJYbXHEOQpe4sJDrn2FNcvL/S7ZGjKKwBcpNT34Ime', '2024-09-01', 'Librarian', '', NULL, 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan'),
(9, '2022000595', 'Margelyn', 'B', 'Gonzales', 1, 'margelynvijandre.basc@gmail.com', '$2y$10$AWIqlEP4v7SzzOCMKmaT7ew.u5VOHUMeTQE84PuhIl4LPErAp48QS', '2024-09-01', NULL, 'engineering', 'information_technology', 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan'),
(12, NULL, 'Allen', 'B', 'Buenaventura', 5, 'Allen@gmail.com', '$2y$10$rVUb.1CInTziThUup8tWkO4vVsLxg6axbvIns91gf9.Un1Dswcl5S', '2024-09-01', 'nurse', '', NULL, 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan'),
(15, '2022000288', 'Lester Arjay', 'B', 'Merino', 1, 'lesterarjaymerino.basc@gmail.com', '$2y$10$/NYPPiFz/J6Qn2i88c72eOxsEJKO9xL.8/9nzsWLzll0HmAv4wLWm', '2024-07-01', NULL, 'engineering', 'information_technology', 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `valType` int(11) NOT NULL,
  `valDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`valType`, `valDescription`) VALUES
(1, 'student'),
(2, 'faculty'),
(3, 'staff'),
(4, 'doctor'),
(5, 'nurse');

-- --------------------------------------------------------

--
-- Table structure for table `validation`
--

CREATE TABLE `validation` (
  `valID` int(11) NOT NULL,
  `valNum` varchar(100) DEFAULT NULL,
  `valEmail` text NOT NULL,
  `valType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `validation`
--

INSERT INTO `validation` (`valID`, `valNum`, `valEmail`, `valType`) VALUES
(7, '2022000288', 'lesterarjaymerino.basc@gmail.com', 1),
(8, '2022000595', 'margelynvijandre.basc@gmail.com', 1),
(9, NULL, 'altheamiranda.basc@gmail.com', 3),
(10, NULL, 'vincentdavetolentino.basc@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`audID`),
  ADD KEY `auditTypeFk` (`auditType`),
  ADD KEY `userIDFk` (`audUserID`);

--
-- Indexes for table `audittype`
--
ALTER TABLE `audittype`
  ADD PRIMARY KEY (`audTypeID`);

--
-- Indexes for table `illnesstypes`
--
ALTER TABLE `illnesstypes`
  ADD PRIMARY KEY (`illID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`supplyID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userType` (`userType`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`valType`);

--
-- Indexes for table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`valID`),
  ADD KEY `valType` (`valType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audittrail`
--
ALTER TABLE `audittrail`
  MODIFY `audID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audittype`
--
ALTER TABLE `audittype`
  MODIFY `audTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `illnesstypes`
--
ALTER TABLE `illnesstypes`
  MODIFY `illID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `supplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `valType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `validation`
--
ALTER TABLE `validation`
  MODIFY `valID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD CONSTRAINT `auditTypeFk` FOREIGN KEY (`auditType`) REFERENCES `audittype` (`audTypeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userIDFk` FOREIGN KEY (`audUserID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `userType` FOREIGN KEY (`userType`) REFERENCES `usertype` (`valType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `validation`
--
ALTER TABLE `validation`
  ADD CONSTRAINT `valType` FOREIGN KEY (`valType`) REFERENCES `usertype` (`valType`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
