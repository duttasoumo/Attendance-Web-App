-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 04:53 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--
CREATE DATABASE IF NOT EXISTS `attendance` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `attendance`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `EnrollNo` varchar(20) NOT NULL,
  `Subject_Code` varchar(20) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`EnrollNo`, `Subject_Code`, `Date`) VALUES
('111', '111', '2017-11-20'),
('111', '111', '2017-11-21'),
('114', '111', '2017-11-20'),
('114', '111', '2017-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `EnrollNo` varchar(20) NOT NULL,
  `RollNo` int(3) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Year` int(4) NOT NULL,
  `Semester` int(1) NOT NULL,
  `F_Name` varchar(20) NOT NULL,
  `M_Name` varchar(20) DEFAULT NULL,
  `L_Name` varchar(20) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `Password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`EnrollNo`, `RollNo`, `Course`, `Year`, `Semester`, `F_Name`, `M_Name`, `L_Name`, `EmailId`, `Address`, `Password`) VALUES
('111', 47, 'MCS', 2017, 1, 'Utteya', 'Prasad', 'Pal', 'upp@g.com', 'Moulali, kolkata-700014', 'ce0de9807a5b61acec7aec544b7faa7cc2ffc74d6d6fc4107e2c880caed16f41'),
('112', 21, 'MCA', 2016, 3, 'NILOY', NULL, 'BISWAS', 'nb@g.com', 'Krishnamagar, kolkata-700000', '4f9c70c841a465d6524cfa25dc72d33cbabdb026ee5bae967fd112959092ca46'),
('113', 41, 'MCS', 2017, 1, 'SURAJIT', NULL, 'DAS', 'sd@gmail.com', 'Sonarpur, Kolkata-700150', '8641807ff51edbba69409ad71cf9028b226a2ceb9f71393945cc1ca2443148d2'),
('114', 11, 'PHYS', 2017, 1, 'ADITI', NULL, NULL, 'ad@gmail.com', 'NEW DELHI', 'e3913b66f36fece2b593445f5772cb9125c8aa078a999b928647a59e88403460'),
('115', 13, 'MCS', 2016, 3, 'SWAPNIL', 'KUMAR', 'GUPTA', '243@c.c', 'U.P', 'a3ab7bbaf7390c1faafb17a4075a3a633882f897fa93ace3976bb64b0712842c'),
('116', 26, 'MATH', 2016, 1, 'RISOV', NULL, NULL, NULL, 'Beckbagan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

DROP TABLE IF EXISTS `studies`;
CREATE TABLE `studies` (
  `EnrollNo` varchar(20) NOT NULL,
  `Subject_Code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`EnrollNo`, `Subject_Code`) VALUES
('111', '111'),
('111', '112'),
('111', '113'),
('112', '115'),
('113', '112'),
('114', '111'),
('114', '113'),
('114', '115'),
('115', '115'),
('116', '112');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `Subject_Code` varchar(20) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Semester` int(1) NOT NULL,
  `Teacher_ID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_Code`, `Subject_Name`, `Course`, `Semester`, `Teacher_ID`) VALUES
('111', 'NETWORK DESIGN', 'MCA', 1, 'T101'),
('112', 'Operating system', 'MCS', 3, 'T102'),
('113', 'Compiler Design', 'MCA', 1, 'T103'),
('114', 'Electronics', 'PHYS', 3, 'T104'),
('115', 'OPERATIONAL RESEARCH', 'MATH', 3, 'T105');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `Teacher_ID` varchar(30) NOT NULL,
  `F_Name` varchar(20) NOT NULL,
  `M_Name` varchar(20) DEFAULT NULL,
  `L_Name` varchar(20) DEFAULT NULL,
  `Department` varchar(20) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `Password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_ID`, `F_Name`, `M_Name`, `L_Name`, `Department`, `EmailId`, `Password`) VALUES
('T101', 'Sonali ', NULL, 'Sen', 'CMSA', 'ssp@g.c', 'd6af2212dad5a938daa3465e2571f18326804cb7db8d6e8f2bf3a8a97240e051'),
('T102', 'Ashok ', NULL, 'Nath', 'CMSA', 'anp@gmail.com', '0fca4045482ca142f4eae53a8b0e4be948a4df86c5022587ea26bd565de5781d'),
('T103', 'Jayati ', 'Ghosh', 'Dashtidar', 'CMSA', 'jgdp@g.com', '54a32dd48d142dc503514df9d1f5cb77b9018eddbb913dc4e8aa7a2e7623a0eb'),
('T104', 'Sudipto', NULL, 'Roy', 'PHYS', 'srp@gmail.com', '97757cba4541c08b5d26b105e3f86390ae50da73d1826aa9404b562aeb25da26'),
('T105', 'Prabur', NULL, 'Ghosh', 'MATH', 'pgp@g.com', '42ef62043dcd782a2f1ed69e1ac8ba6946bcc636b34ee67893d00b4f27ad0136');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`EnrollNo`,`Subject_Code`,`Date`),
  ADD KEY `C5` (`Subject_Code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`EnrollNo`),
  ADD UNIQUE KEY `RollNo` (`RollNo`,`Course`,`Year`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`EnrollNo`,`Subject_Code`),
  ADD KEY `C3` (`Subject_Code`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_Code`),
  ADD KEY `C1` (`Teacher_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_ID`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `C4` FOREIGN KEY (`EnrollNo`) REFERENCES `student` (`EnrollNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `C5` FOREIGN KEY (`Subject_Code`) REFERENCES `subject` (`Subject_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `C2` FOREIGN KEY (`EnrollNo`) REFERENCES `student` (`EnrollNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `C3` FOREIGN KEY (`Subject_Code`) REFERENCES `subject` (`Subject_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `C1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
