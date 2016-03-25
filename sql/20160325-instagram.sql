-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:1024
-- Generation Time: Mar 25, 2016 at 02:55 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblComment`
--

CREATE TABLE `tblComment` (
  `commentID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblFollow`
--

CREATE TABLE `tblFollow` (
  `followID` int(11) NOT NULL,
  `followedID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblLike`
--

CREATE TABLE `tblLike` (
  `likeID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblPost`
--

CREATE TABLE `tblPost` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblUser`
--

CREATE TABLE `tblUser` (
  `userID` int(11) NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `profilpic` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblComment`
--
ALTER TABLE `tblComment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `comment_user` (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tblFollow`
--
ALTER TABLE `tblFollow`
  ADD KEY `followedID` (`followedID`),
  ADD KEY `followUserID` (`userID`);

--
-- Indexes for table `tblLike`
--
ALTER TABLE `tblLike`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tblPost`
--
ALTER TABLE `tblPost`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tblUser`
--
ALTER TABLE `tblUser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblComment`
--
ALTER TABLE `tblComment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblLike`
--
ALTER TABLE `tblLike`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblPost`
--
ALTER TABLE `tblPost`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblUser`
--
ALTER TABLE `tblUser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblComment`
--
ALTER TABLE `tblComment`
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`postID`) REFERENCES `tblPost` (`postID`);

--
-- Constraints for table `tblFollow`
--
ALTER TABLE `tblFollow`
  ADD CONSTRAINT `followUserID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `followedID` FOREIGN KEY (`followedID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `tblLike`
--
ALTER TABLE `tblLike`
  ADD CONSTRAINT `likeUserID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `postID` FOREIGN KEY (`postID`) REFERENCES `tblPost` (`postID`) ON DELETE CASCADE;

--
-- Constraints for table `tblPost`
--
ALTER TABLE `tblPost`
  ADD CONSTRAINT `postUserID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
