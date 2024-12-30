-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 03:23 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rideshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `trip_id`, `seats`, `price`, `date`, `status`) VALUES
(1, 1, 4, 2, '100', '2024-04-21', 'completed'),
(2, 1, 4, 1, '100', '2024-04-22', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `message` text NOT NULL,
  `userid` int(20) NOT NULL,
  `date_time` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sid`, `message`, `userid`, `date_time`, `type`) VALUES
(1, 1, 'hi john', 2, '2024-04-23 06:14:27', ''),
(2, 1, 'may knwo the ride price', 2, '2024-04-23 06:14:49', ''),
(3, 2, 'hello', 1, '2024-04-23 06:37:47', 'investigator'),
(4, 1, 'hi mike how can i help you', 2, '2024-04-23 06:41:28', ''),
(5, 1, 'hi mike how can i help you', 2, '2024-04-23 06:41:42', ''),
(6, 1, 'aaa', 2, '2024-04-23 06:41:57', ''),
(7, 2, 'hi mike', 1, '2024-04-23 06:49:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE IF NOT EXISTS `feedback_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(100) NOT NULL,
  `tid` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(225) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `cardname` varchar(200) NOT NULL,
  `cardnumber` varchar(225) NOT NULL,
  `card_type` varchar(225) NOT NULL,
  `expiry` varchar(225) NOT NULL,
  `cvv` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `status` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `uid`, `booking_id`, `amount`, `cardname`, `cardnumber`, `card_type`, `expiry`, `cvv`, `date`, `status`, `type`) VALUES
(1, '3', 1, '200', 'roshan', '12345678987654', 'debit', '2026', '123', '2024-04-10', '', ''),
(2, '3', 1, '200', 'roshan', '12345678909876', 'debit', '2027', '123', '2024-04-11', '', ''),
(3, '1', 1, '200', 'roshan', '23456765432123', 'credit', '2024-10', '123', '2024-04-21 21:31:26', 'completed', ''),
(4, '1', 1, '10000', 'roshan', '123456788765432', 'debit', '2024-07', '123', '2024-04-22 06:31:48', 'completed', ''),
(5, '1', 1, '10000', 'roshan', '234567654321', 'debit', '2024-04', '123', '2024-04-22 06:40:05', 'completed', 'travel');

-- --------------------------------------------------------

--
-- Table structure for table `request_tbl`
--

CREATE TABLE IF NOT EXISTS `request_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `travel_id` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `request_tbl`
--

INSERT INTO `request_tbl` (`id`, `user_id`, `travel_id`, `price`, `date`, `status`) VALUES
(1, '1', '1', 10000, '2024-04-22', 'completed'),
(2, '1', '1', 10000, '2024-04-22', 'requested'),
(3, '1', '2', 200, '2024-04-22', 'requested'),
(4, '1', '1', 10000, '2024-04-22', 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `ride_tbl`
--

CREATE TABLE IF NOT EXISTS `ride_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(100) NOT NULL,
  `start` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ride_tbl`
--

INSERT INTO `ride_tbl` (`id`, `pid`, `start`, `destination`, `date`, `time`, `status`, `tid`) VALUES
(1, '1', 'Palarivattom ', 'Edapally', '3-3-2024', '16:30', 'accepted', '1'),
(2, '1', 'Palarivattom', 'Vytila', '4-3-2024', '9:0', 'accepted', '2'),
(4, '1', 'Palarivattom', 'Aluva', '15-3-2024', '14:30', 'accepted', '1'),
(5, '1', 'Edapally', 'palarivattom ', '15-3-2024', '11:30', 'requested', ''),
(6, '1', 'Edapally', 'palarivattom ', '15-3-2024', '11:30', 'requested', '');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE IF NOT EXISTS `travels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `document` tinytext NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `name`, `email`, `location`, `phone`, `password`, `document`, `status`) VALUES
(1, 'riya', 'riya@gmail.com', 'kochi', '7355612288', '123', 'a.pdf', 'accepted'),
(2, 'next travels', 'next@gmail.com', 'kochi', '7355612288', '123', 'a.pdf', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `travel_ride`
--

CREATE TABLE IF NOT EXISTS `travel_ride` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `start` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `seats` varchar(100) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `fare` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `travel_ride`
--

INSERT INTO `travel_ride` (`id`, `user_id`, `start`, `destination`, `seats`, `vehicle`, `fare`, `date`, `time`) VALUES
(1, '1', 'kochi', 'alapuzha', '35', 'bus', '10000', '2024-04-22', '12:00'),
(2, '1', 'kochi', 'trivandrum', '40', 'bus', '200', '2024-04-22', '14:55'),
(3, '1', 'kochi', 'trivandrum', '40', 'bus', '100', '2024-04-22', '14:00'),
(4, '2', 'kochi', 'trivandrum', '20', 'traveler', '100', '2024-04-22', '14:00');

-- --------------------------------------------------------

--
-- Table structure for table `trip_tbl`
--

CREATE TABLE IF NOT EXISTS `trip_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `start` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `seats` varchar(100) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `fare` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `trip_tbl`
--

INSERT INTO `trip_tbl` (`id`, `user_id`, `start`, `destination`, `seats`, `vehicle`, `vehicle_no`, `fare`, `date`, `time`) VALUES
(1, '1', 'kochi', 'alapuzha', '3', 'benz', 'kl c 233456', '300', '2024-04-22', '12:00'),
(2, '1', 'kochi', 'trivandrum', '4', 'suv', 'kl c 233342', '200', '2024-04-22', '14:55'),
(3, '1', 'kochi', 'trivandrum', '4', 'swift', 'kl c 233342', '100', '2024-04-22', '14:00'),
(4, '2', 'kochi', 'trivandrum', '4', 'alto', 'kl c 233342', '100', '2024-04-22', '14:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `document` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `document`) VALUES
(1, 'mike', 'mike@gmail.com', '7355612288', '123', 'a.pdf'),
(2, 'john', 'john@gmail.com', '7355612288', '123', 'a.pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
