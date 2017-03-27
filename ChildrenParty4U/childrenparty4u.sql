-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 08:15 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childrenparty4u`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(6) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `party_id` int(6) DEFAULT NULL,
  `no_of_child` int(5) NOT NULL,
  `book_cost` int(5) NOT NULL,
  `party_date` date DEFAULT NULL,
  `book_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `user_id`, `party_id`, `no_of_child`, `book_cost`, `party_date`, `book_status`) VALUES(1, 2, 2, 10, 300, '2017-04-29', 1);
INSERT INTO `booking` (`book_id`, `user_id`, `party_id`, `no_of_child`, `book_cost`, `party_date`, `book_status`) VALUES(2, 2, 3, 15, 225, '2017-03-30', 0);
INSERT INTO `booking` (`book_id`, `user_id`, `party_id`, `no_of_child`, `book_cost`, `party_date`, `book_status`) VALUES(3, 4, 3, 9, 135, '2017-04-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `child_id` int(5) NOT NULL,
  `child_name` varchar(30) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `child_bdate` date DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `user_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`child_id`, `child_name`, `gender`, `child_bdate`, `age`, `user_id`) VALUES(1, 'Jamila', 'F', '2009-02-15', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` int(6) NOT NULL,
  `party_type` varchar(20) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `max_child` int(5) DEFAULT NULL,
  `cost_per_child` int(5) DEFAULT NULL,
  `party_length` int(3) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `images` varchar(100) NOT NULL DEFAULT 'http://localhost/assets/img/noimage.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party_type`, `description`, `max_child`, `cost_per_child`, `party_length`, `service`, `images`) VALUES(1, 'The Best of Pirate', 'This will be a pirate themed party and will include relevant decorations.', 30, 15, 90, 'Pirate costumers and face painting', 'pirate-party-ideas.jpg');
INSERT INTO `party` (`party_id`, `party_type`, `description`, `max_child`, `cost_per_child`, `party_length`, `service`, `images`) VALUES(2, 'Build a Bear', 'This party will show the children how to make their own bear which they will keep at the end of the party.', 10, 30, 120, 'Each child will keep the bear they have made. Optional costumes can be purchased for an additional c', 'Build-a-Bear.jpg');
INSERT INTO `party` (`party_id`, `party_type`, `description`, `max_child`, `cost_per_child`, `party_length`, `service`, `images`) VALUES(3, 'Star Wars', 'This party will have a Star Wars theme. It looks like you are in Star Wars.', 15, 15, 90, 'Each child will receive a Star Wars gift as their party prize.', 'star-wars-party.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_type` int(1) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `currency` varchar(5) DEFAULT 'GBP',
  `no_of_child` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`) VALUES(1, 0, 'One', 'o', 'o@o.com', 'o', 'Oman', 'USD', 5);
INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`) VALUES(2, 0, 'Hridoy', 'h', 'h@h.com', 'h', 'Holand', 'USD', 3);
INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`) VALUES(3, 1, 'Admin', 'a', 'admin@admin.com', 'a', NULL, 'GBP', NULL);
INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`) VALUES(4, 0, 'I am Root', 'root', 'root@root.com', 'root', 'Russia', 'EUR', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `party_id` (`party_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `child_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
