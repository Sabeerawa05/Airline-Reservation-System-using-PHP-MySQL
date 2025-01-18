-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 19, 2010 at 10:25 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `alsabsans`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `customers`
-- 

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL auto_increment,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  PRIMARY KEY  (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- 
-- Dumping data for table `customers`
-- 

INSERT INTO `customers` (`customerID`, `FirstName`, `LastName`, `Address`, `City`, `State`, `Country`, `Mobile`) VALUES 
(7, 'auwal', 'auwal2', 'kano', 'kano', 'kano', 'nigeria', '08037475475'),
(8, 'khamisu', 'kamal', 'kazaure', 'kazaure', 'jigawa', 'nigeria', '084085589'),
(12, 'sabman', 'sabmn', 'jos', 'joss', 'sads', 'niger', '0909099'),
(13, 'ali', 'aliyu', 'tsafe', 'gusar', 'zamfara', 'nigeria', '09090900000'),
(16, 'sani', 'salele', 'kano', 'kano', 'kano', 'nigeria', '09809899'),
(17, 'saber', 'saeed', 'dogon karfee', 'jos', 'plateau', 'nigeria', '09056775544'),
(18, 'aliyu', 'tsafe', 'kano', 'kano', 'kano', 'nigeria', '0803245456'),
(19, 'sadiq', 'sani', 'dala', 'kano', 'kano', 'nigeria', '08077853344'),
(20, 'sabah', 'sadat', 'numua street', 'jos', 'plateau state', 'nigeria', '090456645665'),
(21, 'informatics', 'informatics', 'kazaure', 'aaabbccc', 'jigawa', 'nigeria', '0909978765'),
(22, 'zainab usman', 'garga', 'no 5 dogon karfe jos', 'jos', 'plateau state', 'nigeria', '0804t645534');

-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `ID` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `login`
-- 

INSERT INTO `login` (`ID`, `username`, `password`) VALUES 
(1, 'admin', 'admin'),
(2, 'user', 'user');

-- --------------------------------------------------------

-- 
-- Table structure for table `reserved`
-- 

CREATE TABLE `reserved` (
  `reserveID` int(11) NOT NULL auto_increment,
  `DepartingFrom` varchar(20) NOT NULL,
  `ArrivalTo` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Adult` int(11) NOT NULL,
  `Child` int(11) NOT NULL,
  `Infant` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY  (`reserveID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `reserved`
-- 

INSERT INTO `reserved` (`reserveID`, `DepartingFrom`, `ArrivalTo`, `Date`, `Time`, `Adult`, `Child`, `Infant`, `Price`) VALUES 
(1, 'Kano', 'Dubai', '2009-09-09', '15:20:00', 5, 3, 2, 8800),
(2, 'Kano', 'New Delhi', '2009-07-27', '05:00:00', 2, 3, 3, 6500),
(3, 'Kano', 'Kaduna', '2009-12-09', '13:40:00', 4, 1, 4, 7600),
(4, 'New Delhi', 'Kano', '2009-07-30', '11:00:00', 4, 6, 0, 8800),
(5, 'Kano', 'Kaduna', '2009-12-09', '13:40:00', 3, 1, 1, 4500),
(6, 'New Delhi', 'Kano', '2009-07-30', '11:00:00', 0, 0, 0, 0),
(7, 'Kano', 'New Delhi', '2009-07-27', '05:00:00', 2, 1, 0, 2800),
(8, 'Kano', 'New Delhi', '2009-07-27', '05:00:00', 2, 1, 0, 2800),
(9, 'Kano', 'Dubai', '2009-08-03', '12:00:00', 2, 2, 0, 3600),
(10, 'kano', 'New Delhi', '2009-08-01', '05:00:00', 0, 0, 0, 0),
(11, 'kano', 'New Delhi', '2009-08-01', '05:00:00', 4, 5, 5, 24500),
(12, 'kano', 'New Delhi', '2009-08-01', '05:00:00', 0, 0, 0, 0),
(13, 'Kano', 'Dubai', '2009-08-03', '12:00:00', 2, 2, 0, 7600),
(14, 'Jedda', 'Kano', '2009-08-02', '13:40:00', 0, 2, 0, 3600),
(15, 'Jedda', 'Kano', '2009-08-02', '13:40:00', 1, 1, 1, 5300),
(16, 'Dubai', 'Kano', '2009-08-04', '02:00:00', 3, 2, 0, 9600),
(17, 'Dubai', 'Kano', '2009-08-04', '02:00:00', 1, 2, 1, 7100),
(18, 'New Delhi', 'Kano', '2009-08-02', '11:00:00', 1, 3, 1, 8900),
(19, 'Kano', 'Dubai', '2009-08-03', '12:00:00', 2, 1, 0, 5800);

-- --------------------------------------------------------

-- 
-- Table structure for table `schedule`
-- 

CREATE TABLE `schedule` (
  `schedulID` int(11) NOT NULL auto_increment,
  `From` varchar(20) NOT NULL,
  `To` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY  (`schedulID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `schedule`
-- 

INSERT INTO `schedule` (`schedulID`, `From`, `To`, `Date`, `Time`, `Price`) VALUES 
(1, 'kano', 'New Delhi', '2009-08-01', '05:00:00', 2000),
(2, 'New Delhi', 'Kano', '2009-08-02', '11:00:00', 2000),
(4, 'jedda', 'kano', '2009-08-08', '10:00:00', 12500),
(5, 'Kano', 'Dubai', '2009-08-03', '12:00:00', 2000),
(6, 'Dubai', 'Kano', '2009-08-04', '02:00:00', 2000);
