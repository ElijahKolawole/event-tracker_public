-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 12:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `organization_id`, `title`, `description`, `email`, `phone`, `created`) VALUES
(1, 1, 'Fake Event', 'This event doesn\'t really exist', 'event@email.com', '1800-111-2222', '2018-09-05 23:40:52'),
(2, 2, 'GGC Event', 'This is a example event for GGC', 'events@ggc.edu', '(678) 407-5000', '0000-00-00 00:00:00'),
(3, 3, 'Annual Car Show', 'This is the biggest carshow in the Southeast', 'bmw@car.net', '888-366-8999', '2018-10-12 00:00:00'),
(5, 4, 'Fall Festival', 'Great Opportunity for Family', 'lawrenceville@city.org', '555-666-7777', '2018-10-12 00:00:00'),
(8, 4, 'Trick or Treat', 'Annual family friendly trick or treat event Halloween 2018.', 'lawrenceville@city.org', '555-666-7777', '2018-10-19 09:56:56'),
(14, 2, 'Software Dev 2 ', 'Software Dev 2 Class will present their project.', 'ggc@college.edu', '678-655-7700', '2018-10-20 23:21:00'),
(16, 3, 'Year End Sale', '2018 Year End close out sale. ', 'bmw@car.org', '888-999-2010', '2018-10-22 18:24:27'),
(18, 1, 'Testing 2', 'This is just another testing event.', 'testing2@ggc.edu', '000-000-0000', '2018-10-22 18:31:13'),
(19, 3, 'Give Away ', 'Free car giving away in Dec 32, 2018. Come and get it.', 'bmw@car.org', '888-777-9999', '2018-10-22 19:21:12'),
(43, 4, 'Halloween', 'Trick or Treat', 'lawrecenville@city.org', '888-888-8888', '2018-10-22 23:15:34'),
(44, 1, 'Winter Wonderland', 'Winter lights display for family', 'testing@ggc.edu', '222-333-4444', '2018-10-24 10:41:59'),
(45, 2, 'No School this week', 'Christmas Break', 'testing@ggc.edu', '888-777-9999', '2018-10-29 03:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `description`, `email`, `phone`, `created`) VALUES
(1, 'Test Organization', 'This is a test organization!', 'contact@email.com', '1800-111-1111', '2018-09-05 23:38:57'),
(2, 'Georgia Gwinnett College', 'Georgia Gwinnett College is a public college in Lawrenceville, Gwinnett County, Georgia. It is a member of the University System of Georgia.', 'contact@ggc.edu', '(678) 407-5000', '2018-09-05 23:46:25'),
(3, 'BMW', 'Car dealership', 'bmw@car.net', '888-555-3333', '2018-10-12 00:00:00'),
(4, 'City of Lawrenceville', 'City Events Organizer', 'lawrenceville@city.org', '888-555-7777', '2018-10-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `created` datetime NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `event_id`, `title`, `description`, `date`, `starttime`, `endtime`, `created`, `min`, `max`, `modified`) VALUES
(1, 1, 'Job 1', 'Hand out food', '2018-09-10', '09:00:00', '20:00:00', '2018-09-05 23:43:05', 2, 5, '2018-09-05 23:43:05'),
(2, 3, 'Handing out flyers', 'Arranging customer for next available sale personnel', '2018-09-10', '09:00:00', '17:00:00', '2018-09-05 23:43:05', 4, 10, '2018-09-05 23:43:05'),
(3, 2, 'Greeter', 'You\'ll be greeting people!', '2018-09-22', '10:00:00', '14:00:00', '2018-09-10 19:05:07', 1, 3, '2018-09-11 00:05:07'),
(6, 44, '44', 'dd', '0000-00-00', '00:00:00', '00:00:00', '2018-11-06 21:33:15', 0, 0, '2018-11-06 20:33:15'),
(7, 45, 'dd', 'dd', '2018-11-08', '17:55:00', '05:55:00', '2018-11-06 21:36:28', 0, 0, '2018-11-06 20:36:28'),
(8, 45, 'dd', 'dd', '2018-11-08', '17:55:00', '05:55:00', '2018-11-06 21:36:30', 0, 0, '2018-11-06 20:36:30'),
(9, 45, 'Just Testing', 'Sign Up table', '2018-12-13', '15:30:00', '20:30:00', '2018-11-07 08:17:28', 0, 0, '2018-11-07 07:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(2048) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created`, `modified`) VALUES
(5, 'Yiet', 'Mai', 'ymai@ggc.edu', '$2y$10$7CdX7HaDMivaRaJlixqwHuOUnK0ZMATQ4eEDi6HH6o0HDiLtnUqdK', '2018-11-08 04:16:11', '2018-11-08 09:16:11'),
(6, 'Mario', 'Bros', 'mario@ggc.edu', '$2y$10$e2FlZSYapGbr6T85IAjZbuOSer54qrQ/KF87uKFMDQ/1dRMeIRJFO', '2018-11-08 09:05:17', '2018-11-08 14:05:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`);

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `slots_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
