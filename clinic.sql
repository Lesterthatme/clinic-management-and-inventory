-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 06:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.33

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
-- Table structure for table `audittrails`
--

CREATE TABLE `audittrails` (
  `patientID` int(11) NOT NULL,
  `patientUserID` int(11) NOT NULL,
  `patientEmail` varchar(100) NOT NULL,
  `patientIllnessType` int(11) NOT NULL,
  `patientDescription` varchar(255) NOT NULL,
  `patientDate` datetime NOT NULL,
  `patientSupplyID` int(11) NOT NULL,
  `patientType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audittrails`
--

INSERT INTO `audittrails` (`patientID`, `patientUserID`, `patientEmail`, `patientIllnessType`, `patientDescription`, `patientDate`, `patientSupplyID`, `patientType`) VALUES
(1, 0, 'allen@gmail.com', 1, 'You have cough and colds', '2024-12-13 00:00:00', 1, 1);

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
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`supplyID`, `supplyName`, `stock`, `startDate`, `expDate`, `status`) VALUES
(1, 'Biogesic', 4, '2024-12-01', '0000-00-00', 'In Stock'),
(2, 'Buscopan', 4, '2024-12-01', '0000-00-00', 'In Stock'),
(3, 'Diatabs', 0, '2024-12-01', '2028-12-01', 'Out of Stock'),
(4, 'Neozep', 10, '2024-12-01', '2028-12-01', 'In Stock'),
(5, 'Paracetamol', 500, '2023-12-01', '2025-06-01', 'In Stock'),
(6, 'Ibuprofen', 300, '2023-11-15', '2025-05-15', 'In Stock'),
(7, 'Amoxicillin', 250, '2023-12-10', '2024-12-10', 'In Stock'),
(8, 'Cetrizine', 400, '2023-10-20', '2024-11-20', 'In Stock'),
(9, 'Vitamin C', 1000, '2023-08-01', '2025-01-01', 'In Stock'),
(10, 'Metformin', 350, '2023-09-05', '2025-02-05', 'In Stock'),
(11, 'Loperamide', 200, '2023-11-01', '2024-11-01', 'In Stock'),
(12, 'Losartan', 150, '2023-07-15', '2024-07-15', 'In Stock'),
(13, 'Mefenamic Acid', 450, '2023-06-01', '2024-06-01', 'In Stock'),
(14, 'Dextromethorphan', 320, '2023-05-01', '2024-05-01', 'In Stock'),
(15, 'Hydrocortisone', 180, '2023-01-01', '2024-12-01', 'In Stock'),
(16, 'Salbutamol', 220, '2023-02-01', '2025-01-15', 'In Stock'),
(17, 'Clarithromycin', 130, '2023-03-01', '2025-03-01', 'In Stock'),
(18, 'Cloxacillin', 410, '2023-04-01', '2024-04-15', 'In Stock'),
(19, 'Ciprofloxacin', 260, '2023-05-20', '2024-06-20', 'In Stock'),
(20, 'Albuterol', 300, '2023-06-15', '2024-12-31', 'In Stock'),
(21, 'Cetirizine Hydrochloride', 240, '2023-07-01', '2024-07-30', 'In Stock'),
(22, 'Omeprazole', 370, '2023-08-10', '2025-08-10', 'In Stock'),
(23, 'Simvastatin', 290, '2023-09-01', '2024-09-15', 'In Stock'),
(24, 'Aspirin', 600, '2023-10-05', '2025-10-05', 'In Stock');

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
  `userProvince` varchar(100) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userStudentID`, `userFName`, `userMName`, `userLName`, `userType`, `userEmail`, `userPassword`, `userBirthday`, `userWorkPosition`, `userInstitute`, `userSubject`, `userBarangay`, `userTown`, `userCity`, `userProvince`, `deleted`) VALUES
(7, NULL, 'Dave Vincent', 'B', 'Tolentino', 2, 'vincentdavetolentino.basc@gmail.com', '$2y$10$Blv7mdqdMXaX1/OOrn/uyu5W8pG48RCNkpv/8NfUBJf.syNNm4z3G', '2024-10-01', NULL, 'IEAT', NULL, 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan', 1),
(8, NULL, 'Althea Shamel', 'B', 'Pangilinan', 3, 'altheamiranda.basc@gmail.com', '$2y$10$jolwyRxDv5qZJYbXHEOQpe4sJDrn2FNcvL/S7ZGjKKwBcpNT34Ime', '2024-09-01', 'Librarian', 'IEAT', NULL, 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan', 0),
(9, '2022000595', 'Margelyn', 'V.', 'Gonzales', 1, 'margelynvijandre.basc@gmail.com', '$2y$10$AWIqlEP4v7SzzOCMKmaT7ew.u5VOHUMeTQE84PuhIl4LPErAp48QS', '2024-09-01', NULL, 'engineering', 'information_technology', 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan', 0),
(12, NULL, 'Allen', 'B', 'Buenaventura', 5, 'Allen@gmail.com', '$2y$10$rVUb.1CInTziThUup8tWkO4vVsLxg6axbvIns91gf9.Un1Dswcl5S', '2024-09-01', 'nurse', 'IEAT', NULL, 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan', 0),
(15, '2022000288', 'Lester Arjay', 'B', 'Merino', 1, 'lesterarjaymerino.basc@gmail.com', '$2y$10$/NYPPiFz/J6Qn2i88c72eOxsEJKO9xL.8/9nzsWLzll0HmAv4wLWm', '2024-07-01', NULL, 'engineering', 'information_technology', 'Sampaguita St.', 'San Juan', 'San Ildefonso', 'Bulacan', 0),
(16, '2023004931', 'Test', 'U', 'User', 1, 'testuser@gmail.com', '$2y$10$NqP0vSS6ACYMJYz7u7VTaumy/rfAEW3MjG7eQSJj1sF/doov.X7KG', '2024-12-12', NULL, 'agriculture', 'crop_science', 'Lapnit ', 'San Ildefonso', 'Bulacan', 'PJ', 0),
(17, '124', 'Allen', 'V', 'Buenaventura', 1, 'allenbnvtra.11@gmail.com', '$2y$10$5xDJGSOcsMyN2uNSD138Lu0giegQf9U7zYNAfnouHvooNXTkccCNC', '2024-12-14', NULL, 'agriculture', 'crop_science', 'Lapnit', 'Lapnit', 'San ildefonso', 'Bulacan', 0);

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
-- Indexes for table `audittrails`
--
ALTER TABLE `audittrails`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `patientType` (`patientType`);

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
-- AUTO_INCREMENT for table `audittrails`
--
ALTER TABLE `audittrails`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `supplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `audittrails`
--
ALTER TABLE `audittrails`
  ADD CONSTRAINT `patientType` FOREIGN KEY (`patientType`) REFERENCES `audittype` (`audTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
