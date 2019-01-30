-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2018 at 11:32 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminorganization`
--

DROP TABLE IF EXISTS `adminorganization`;
CREATE TABLE IF NOT EXISTS `adminorganization` (
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminorganization`
--

INSERT INTO `adminorganization` (`user_id`, `organization_id`) VALUES
(1, 0),
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventorganization`
--

DROP TABLE IF EXISTS `eventorganization`;
CREATE TABLE IF NOT EXISTS `eventorganization` (
  `event_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  KEY `event_id` (`event_id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventorganization`
--

INSERT INTO `eventorganization` (`event_id`, `organization_id`) VALUES
(2, 2),
(3, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `email`, `phone`, `public`, `created`, `modified`) VALUES
(1, 'Fake Event', 'This event doesn\'t really exist', 'event@email.com', '1800-111-2222', 1, '2018-09-05 23:40:52', '2018-09-05 23:40:52'),
(2, 'GGC Event', 'This is a example event for GGC', 'events@ggc.edu', '(678) 407-5000', 1, '0000-00-00 00:00:00', '2018-09-11 00:02:21'),
(3, 'GGC Hidden Event', 'GGC event that is hidden', 'events@ggc.edu', '(678) 407-5000', 0, '2018-09-11 00:00:00', '2018-09-11 00:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `code` varchar(16) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `description`, `code`, `email`, `phone`, `created`) VALUES
(1, 'Test Organization', 'This is a test organization!', NULL, 'contact@email.com', '1800-111-1111', '2018-09-05 23:38:57'),
(2, 'Georgia Gwinnett College', 'Georgia Gwinnett College is a public college in Lawrenceville, Gwinnett County, Georgia. It is a member of the University System of Georgia.', 'GGCEvent10', 'contact@ggc.edu', '(678) 407-5000', '2018-09-05 23:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `slotevent`
--

DROP TABLE IF EXISTS `slotevent`;
CREATE TABLE IF NOT EXISTS `slotevent` (
  `slot_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  KEY `slot_id` (`slot_id`),
  KEY `event_id` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slotevent`
--

INSERT INTO `slotevent` (`slot_id`, `event_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
CREATE TABLE IF NOT EXISTS `slots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `min` int(11) NOT NULL DEFAULT '1',
  `max` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `title`, `description`, `date`, `starttime`, `endtime`, `min`, `max`, `created`, `modified`) VALUES
(1, 'Job 1', 'Hand out food', '2018-09-10', '09:00:00', '20:00:00', 1, NULL, '2018-09-05 23:43:05', '2018-09-05 23:43:05'),
(2, 'Job 2', 'Hand out drinks', '2018-09-10', '09:00:00', '17:00:00', 1, NULL, '2018-09-05 23:43:05', '2018-09-05 23:43:05'),
(3, 'Greeter', 'You\'ll be greeting people!', '2018-09-22', '10:00:00', '14:00:00', 1, NULL, '2018-09-10 19:05:07', '2018-09-11 00:05:07'),
(7, 'GGC Event Slot', 'Made using CreateTest.html', '2018-05-15', '00:00:05', '00:00:22', 1, 5, '2018-09-20 16:02:33', '2018-09-20 16:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `userorganization`
--

DROP TABLE IF EXISTS `userorganization`;
CREATE TABLE IF NOT EXISTS `userorganization` (
  `user_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `organization_id` (`organization_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL COMMENT 'SHA256',
  `token` varchar(64) NOT NULL,
  `stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `token`, `stamp`) VALUES
(1, 'Ammar', 'Huseinspahic', 'ammarhus@live.com', '5E884898DA28047151D0E56F8DC6292773603D0D6AABBDD62A11EF721D1542D8', 'kBZVtB6wum4DhDxg', '2018-10-28 23:42:15'),
(2, 'John', 'Doe', 'test@test.com', '5E884898DA28047151D0E56F8DC6292773603D0D6AABBDD62A11EF721D1542D8', '', '2018-10-28 21:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `userslot`
--

DROP TABLE IF EXISTS `userslot`;
CREATE TABLE IF NOT EXISTS `userslot` (
  `user_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `slot_id` (`slot_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;