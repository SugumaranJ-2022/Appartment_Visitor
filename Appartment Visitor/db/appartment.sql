-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2025 at 10:03 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventdetails`
--

DROP TABLE IF EXISTS `eventdetails`;
CREATE TABLE IF NOT EXISTS `eventdetails` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `EventName` varchar(50) NOT NULL,
  `ConPerson` varchar(50) NOT NULL,
  `FlatNo` varchar(50) NOT NULL,
  `EventDate` varchar(50) NOT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdetails`
--

INSERT INTO `eventdetails` (`eventid`, `EventName`, `ConPerson`, `FlatNo`, `EventDate`) VALUES
(3, 'Birthday', 'Abdul', '12A', '2025-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `flatowners`
--

DROP TABLE IF EXISTS `flatowners`;
CREATE TABLE IF NOT EXISTS `flatowners` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `FlatNo` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Details` varchar(300) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flatowners`
--

INSERT INTO `flatowners` (`fid`, `Name`, `FlatNo`, `Designation`, `Mobile`, `Email`, `Details`) VALUES
(2, 'Abdul', '12A', 'Business', '9876543212', 'abdul@gmail.com', 'About Abdul detals');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `visitor` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `username`, `password`, `role`, `visitor`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `rvisitor`
--

DROP TABLE IF EXISTS `rvisitor`;
CREATE TABLE IF NOT EXISTS `rvisitor` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `VisitorName` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `toWhomVisit` varchar(50) NOT NULL,
  `Purpose` varchar(250) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rvisitor`
--

INSERT INTO `rvisitor` (`rid`, `VisitorName`, `Mobile`, `Address`, `toWhomVisit`, `Purpose`) VALUES
(1, 'Prem', '9876543432', 'Chennai Royapuram', 'Ismail', 'Just Friends');

-- --------------------------------------------------------

--
-- Table structure for table `security_details`
--

DROP TABLE IF EXISTS `security_details`;
CREATE TABLE IF NOT EXISTS `security_details` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Details` varchar(50) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_details`
--

INSERT INTO `security_details` (`sid`, `Name`, `Address`, `Mobile`, `Email`, `Details`) VALUES
(1, 'Niyaz', 'Chennai', '9876543432', 'niyaz@gmail.com', 'Security Man'),
(2, 'Ram', 'Chennai', '9876543432', 'ram@gmail.com', 'About Security Persn');

-- --------------------------------------------------------

--
-- Table structure for table `visitormessage`
--

DROP TABLE IF EXISTS `visitormessage`;
CREATE TABLE IF NOT EXISTS `visitormessage` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `VisitorName` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `toWhomVisit` varchar(50) NOT NULL,
  `Purpose` varchar(250) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitormessage`
--

INSERT INTO `visitormessage` (`rid`, `VisitorName`, `Mobile`, `Address`, `toWhomVisit`, `Purpose`) VALUES
(1, 'Prem', '9876543432', 'Chennai Royapuram', 'Ismail', 'Just Friends'),
(2, 'Azar', '9876543432', 'Chennai', 'Vinoth', 'Some Reasons');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
