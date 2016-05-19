-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2016 at 08:23 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; /* Set mode*/
SET time_zone = "+00:00"; /*Set timezone*/


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauusers`
--

CREATE TABLE `cauusers` ( --Create statement for table
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `FirebaseID` text NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Credits` int(11) NOT NULL,
  `Coins` int(11) NOT NULL,
  `Avatar` text NOT NULL,
  `GamesPlayed` int(11) NOT NULL,
  `GamesWon` int(11) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Votes` text NOT NULL,
  `GameNumber` varchar(11) NOT NULL,
  `Submission` text NOT NULL,
  `GamesLost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cauusers`
--

INSERT INTO `cauusers` (`UserID`, `FirebaseID`, `Username`, `Credits`, `Coins`, `Avatar`, `GamesPlayed`, `GamesWon`, `University`, `Votes`, `GameNumber`, `Submission`, `GamesLost`) VALUES
(38, 'de3f7c17-0e56-4275-854f-7e4c58b86b0e', 'me', 0, 0, 'defaultavatar.jpeg', 3, 0, 'Maynooth', 'Option number 3', 'Game 9', 'Option number 3', 3),
(40, '8ff19af8-49d8-4b24-b44e-dcbe56cd835f', 'mike', 0, 0, 'defaultavatar.jpeg', 3, 0, 'Maynooth', 'Option number 5', 'Game 9', 'Option number 5', 3),
(41, 'f6b4d863-4cc4-4bcb-80a9-118efbd912c4', 'mike', 5, 5, 'defaultavatar.jpeg', 1, 1, 'Maynooth', 'Option number 6', 'Game 9', 'Option number 3', 0),
(42, 'eceb6aa0-afe6-4d57-9c92-87385d7eabf4', 'mike', 130, 130, 'defaultavatar.jpeg', 29, 26, 'Maynooth', 'Option number 6', 'Game 9', 'Option number 6', 3),
(43, 'FakeID', 'mike', 85, 85, '', 20, 17, 'Maynooth', 'Option number 6', 'Game 9', 'Option number 5', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cauusers`
--
ALTER TABLE `cauusers`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cauusers`
--
ALTER TABLE `cauusers`
  MODIFY `UserID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
