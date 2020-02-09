-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: custsql-dom03.eigbox.net
-- Generation Time: Feb 09, 2020 at 09:26 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am_newdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `star` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `star`, `deleted`, `created`, `modified`) VALUES
(1, 1, 5, 0, '2020-02-01 14:38:10', '2020-02-01 14:38:10'),
(2, 2, 5, 0, '2020-02-01 14:39:03', '2020-02-01 14:39:03'),
(3, 3, 5, 0, '2020-02-01 14:40:06', '2020-02-01 14:40:06'),
(4, 4, 5, 0, '2020-02-01 15:00:23', '2020-02-01 15:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `description`, `deleted`, `created`, `modified`) VALUES
(1, 1, 'Very honest and trustworthy company.My stove bake wasn t working.This guys troubleshoot and find the problem.I have my oven working again.Great job and I will recommend only this company.Good service and honesty.Thanks.', 0, '2020-02-01 14:38:10', '2020-02-05 11:54:49'),
(2, 2, 'These guys are amazing. The person on the phone was very helpful. He arranged everything for me to be fixed the same day and it was crucial for us as we were expecting guests. Technicians just left my house after repairing my stove. I didn\'t expect such a great service from A to Z.', 0, '2020-02-01 14:39:03', '2020-02-04 15:19:33'),
(3, 3, 'Super happy with their service. Technician was friendly and knowledgeable and the issue with my fridge was identified and fixed quickly at a reasonable cost. Will definitely call them again in the future.', 0, '2020-02-01 14:40:06', '2020-02-04 15:19:45'),
(4, 4, 'I submit a service request. Service team Contacted me and clarify some information and confirm my availability. Technician called me and give me a 3hr window. Technician arrive in time. Very  professional service. Reasonable price and the tech was able to figure out the issue and provide me estimate cost before he perform the repair. ', 0, '2020-02-01 15:00:23', '2020-02-04 15:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `api_id` varchar(200) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `api_id`, `deleted`, `created`, `modified`) VALUES
(1, 'Raymark', '', NULL, 0, '2020-02-01 14:38:10', '2020-02-01 14:38:10'),
(2, 'Frenz', '', NULL, 0, '2020-02-01 14:39:03', '2020-02-01 14:39:03'),
(3, 'Jarrel', '', NULL, 0, '2020-02-01 14:40:06', '2020-02-01 14:40:06'),
(4, 'Blance', '', NULL, 0, '2020-02-01 15:00:23', '2020-02-01 15:00:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
