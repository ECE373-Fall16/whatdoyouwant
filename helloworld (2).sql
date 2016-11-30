-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 07:56 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helloworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `room` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `message` varchar(140) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`room`, `user`, `message`, `id`) VALUES
('kachis', 'trinath', '', 1),
('kachis', 'trinath', 'fadffsd', 2),
('The Crew', 'trinath', '', 3),
('The Crew', 'trinath', 'meaningful', 4),
('kachis', 'trinath', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `john_list`
--

CREATE TABLE `john_list` (
  `activerooms` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `john_list`
--

INSERT INTO `john_list` (`activerooms`) VALUES
('johns place'),
('kachis');

-- --------------------------------------------------------

--
-- Table structure for table `kachi_list`
--

CREATE TABLE `kachi_list` (
  `activerooms` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kachi_list`
--

INSERT INTO `kachi_list` (`activerooms`) VALUES
('justtt'),
('oyo'),
('yo');

-- --------------------------------------------------------

--
-- Table structure for table `lkjh_list`
--

CREATE TABLE `lkjh_list` (
  `activerooms` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `password`) VALUES
(1, 'trinath', 'trinath'),
(15, 'kachi', '11'),
(16, 'john', '11');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomname` varchar(20) NOT NULL,
  `roompassword` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomname`, `roompassword`, `id`) VALUES
('The Crew', '1234', 1),
('kachis', '11', 12),
('yo', 'dsd', 13),
('oyo', '121', 14),
('justtt', 'qqqq', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `john_list`
--
ALTER TABLE `john_list`
  ADD PRIMARY KEY (`activerooms`);

--
-- Indexes for table `kachi_list`
--
ALTER TABLE `kachi_list`
  ADD PRIMARY KEY (`activerooms`);

--
-- Indexes for table `lkjh_list`
--
ALTER TABLE `lkjh_list`
  ADD PRIMARY KEY (`activerooms`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `roompassword` (`roompassword`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
