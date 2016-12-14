-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2016 at 09:29 PM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wdyd_helloworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `room` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `message` varchar(140) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`room`, `user`, `message`, `id`) VALUES
('the crew', 'deji', 'Hello people!', 110),
('the crew', 'wyatt', 'hey', 111),
('the crew', 'john', 'Hey Deji!', 112),
('the crew', 'john', 'Hi Wyatt!', 113),
('the crew', 'john', 'Which homework should we work on tonight?', 114),
('the crew', 'deji', 'Signals !! Duh?', 115),
('the crew', 'john', 'idk man, SIE', 116),
('the crew', 'john', 'Wyatt wants to party... :/', 117),
('the crew', 'deji', 'partying tonight won''t be bad', 118),
('the crew', 'john', 'I''m sticking with SIE', 119),
('the crew', 'john', 'Let''s spin?', 120),
('the crew', 'deji', 'LOL, party definitely is winning', 121),
('the crew', 'john', 'SIE won!', 122),
('ece313', 'john', 'What''s on the agenda for tonight?', 123),
('game on!', 'deji', 'Tristan, where you at?', 124),
('game on!', 'john', 'Which game we playing?', 125),
('the crew', 'melloni', 'What''s up guys!', 126),
('the crew', 'kachi', 'ðŸ‘€ ðŸ˜ðŸ» ', 127),
('the crew', 'paul', 'Nice emojis!', 128),
('the crew', 'joe shmoe', 'woop', 129),
('ece313', 'wyatt', 'party party party', 130),
('ece323', 'john', 'Should we even study for this exam?', 131),
('game on!', 'wyatt', 'quidditch?', 132),
('game on!', 'deji', 'hey', 133),
('billionaires club', 'wyatt', '$$ bill yall', 134);

-- --------------------------------------------------------

--
-- Table structure for table `deji_list`
--

CREATE TABLE IF NOT EXISTS `deji_list` (
  `activerooms` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deji_list`
--

INSERT INTO `deji_list` (`activerooms`) VALUES
('billionaires club'),
('ece313'),
('ece323'),
('game on!'),
('the crew');

-- --------------------------------------------------------

--
-- Table structure for table `john_list`
--

CREATE TABLE IF NOT EXISTS `john_list` (
  `activerooms` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `john_list`
--

INSERT INTO `john_list` (`activerooms`) VALUES
('billionaires club'),
('ece313'),
('ece323'),
('game on!'),
('the crew');

-- --------------------------------------------------------

--
-- Table structure for table `kachi_list`
--

CREATE TABLE IF NOT EXISTS `kachi_list` (
  `activerooms` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kachi_list`
--

INSERT INTO `kachi_list` (`activerooms`) VALUES
('the crew');

-- --------------------------------------------------------

--
-- Table structure for table `melloni_list`
--

CREATE TABLE IF NOT EXISTS `melloni_list` (
  `activerooms` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `melloni_list`
--

INSERT INTO `melloni_list` (`activerooms`) VALUES
('the crew');

-- --------------------------------------------------------

--
-- Table structure for table `paul_list`
--

CREATE TABLE IF NOT EXISTS `paul_list` (
  `activerooms` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paul_list`
--

INSERT INTO `paul_list` (`activerooms`) VALUES
('the crew');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `password`) VALUES
(29, 'john', '6512bd43d9caa6e02c990b0a82652dca'),
(30, 'deji', '6512bd43d9caa6e02c990b0a82652dca'),
(31, 'wyatt', '6512bd43d9caa6e02c990b0a82652dca'),
(32, 'kachi', '6512bd43d9caa6e02c990b0a82652dca'),
(33, 'melloni', '6512bd43d9caa6e02c990b0a82652dca'),
(34, 'paul', '6512bd43d9caa6e02c990b0a82652dca'),
(35, 'joe shmoe', '6512bd43d9caa6e02c990b0a82652dca');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL,
  `roomname` varchar(20) NOT NULL,
  `roompassword` varchar(40) NOT NULL,
  `roomprompt` varchar(140) NOT NULL,
  `result` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomname`, `roompassword`, `roomprompt`, `result`) VALUES
(18, 'the crew', '6512bd43d9caa6e02c990b0a82652dca', 'Which homework for tonight?', 'SIE'),
(19, 'ece313', '6512bd43d9caa6e02c990b0a82652dca', 'Food for tonight?', ''),
(20, 'game on!', '6512bd43d9caa6e02c990b0a82652dca', 'Favorite color?', 'red'),
(21, 'ece323', '6512bd43d9caa6e02c990b0a82652dca', 'Which night should we study?', ''),
(22, 'billionaires club', '6512bd43d9caa6e02c990b0a82652dca', '''''''''''''?..', '');

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE IF NOT EXISTS `selections` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `choice` varchar(140) NOT NULL,
  `roomplususer` varchar(140) NOT NULL,
  `user` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selections`
--

INSERT INTO `selections` (`id`, `room`, `choice`, `roomplususer`, `user`) VALUES
(198, 'the crew', 'SIE', 'the crewjohn', 'john'),
(199, 'the crew', 'Electronics', 'the crewmelloni', 'melloni'),
(200, 'the crew', 'Comp Sys Lab', 'the crewpaul', 'paul'),
(201, 'the crew', 'ðŸ»', 'the crewkachi', 'kachi'),
(202, 'the crew', 'signals', 'the crewjoe shmoe', 'joe shmoe'),
(203, 'ece313', 'Pizza', 'ece313john', 'john'),
(204, 'ece313', 'bbq wings ðŸ—', 'ece313deji', 'deji'),
(205, 'ece323', 'Monday', 'ece323john', 'john'),
(207, 'ece323', 'sunday', 'ece323wyatt', 'wyatt');

-- --------------------------------------------------------

--
-- Table structure for table `wyatt_list`
--

CREATE TABLE IF NOT EXISTS `wyatt_list` (
  `activerooms` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wyatt_list`
--

INSERT INTO `wyatt_list` (`activerooms`) VALUES
('billionaires club'),
('ece313'),
('ece323'),
('game on!'),
('the crew');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deji_list`
--
ALTER TABLE `deji_list`
  ADD PRIMARY KEY (`activerooms`);

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
-- Indexes for table `melloni_list`
--
ALTER TABLE `melloni_list`
  ADD PRIMARY KEY (`activerooms`);

--
-- Indexes for table `paul_list`
--
ALTER TABLE `paul_list`
  ADD PRIMARY KEY (`activerooms`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selections`
--
ALTER TABLE `selections`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roomplususer` (`roomplususer`);

--
-- Indexes for table `wyatt_list`
--
ALTER TABLE `wyatt_list`
  ADD PRIMARY KEY (`activerooms`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=270;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
