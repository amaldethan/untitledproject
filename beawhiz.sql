-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 03:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beawhiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `taken` int(255) NOT NULL,
  `rem` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `dob` date NOT NULL,
  `syllabus` text NOT NULL,
  `grade` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `userid`, `dob`, `syllabus`, `grade`, `city`) VALUES
(2, 11, '2017-03-01', 'State', '7', 'Kerala'),
(3, 12, '2017-03-12', 'State', '6', 'Raj'),
(4, 14, '2017-03-07', 'CBSE', '7', 'Jharkand');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_id` int(255) NOT NULL,
  `qno` int(255) NOT NULL,
  `question` varchar(10240) NOT NULL,
  `option_1` varchar(255) NOT NULL,
  `option_2` varchar(255) NOT NULL,
  `option_3` varchar(255) NOT NULL,
  `option_4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score_1` float NOT NULL,
  `score_2` float NOT NULL,
  `score_3` float NOT NULL,
  `net_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `qno`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `score_1`, `score_2`, `score_3`, `net_score`) VALUES
(1, 5, 1, '<p>What is x+y</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', 'option_2', 0.5, 0.6, 0.7, 1.2),
(2, 5, 2, '<p>What is y-y ?</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', 'option_2', 2, 3, 4, 5),
(3, 5, 3, '<p>What is this ?</p>\r\n\r\n<p><img alt="" src="http://localhost/test/admin/images/Hydrangeas.jpg" style="height:77px; width:102px" /></p>\r\n', '<p>this</p>\r\n', '<p>that</p>\r\n', '<p>here</p>\r\n', '<p>there</p>\r\n', 'option_2', 3, 4, 5, 6),
(4, 6, 1, '<p>What is this ?</p>\r\n', '<p>this&nbsp;</p>\r\n', '<p>is</p>\r\n', '<p>what</p>\r\n', '<p>you</p>\r\n', 'option_2', 0.2, 0.4, 0.6, 0.8),
(5, 6, 2, '<p>This is that</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '<p>5</p>\r\n', '<p>6</p>\r\n', 'option_3', 1, 2, 3, 4),
(6, 7, 1, '<p>fadsfdsf</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>4</p>\r\n', 1, 2, 3, 4),
(7, 8, 12, '<p>4*8</p>\r\n', '<p>12</p>\r\n', '<p>32</p>\r\n', '<p>34</p>\r\n', '<p>36</p>\r\n', '<p>32</p>\r\n', 1, 1, 1, 1),
(8, 10, 0, '<p>Which digit is in the hundred&#39;s place in the number 987?</p>\r\n', '<p>9</p>\r\n', '<p>6</p>\r\n', '<p>3</p>\r\n', '<p>3</p>\r\n', '<p>9</p>\r\n', 0.5, 0.5, 0.25, 0.41667),
(9, 10, 0, '<p>Which digit is in the hundred&#39;s place in the number 8974?</p>\r\n', '<p>9</p>\r\n', '<p>5</p>\r\n', '<p>7</p>\r\n', '<p>1</p>\r\n', '<p>9</p>\r\n', 0.6, 0.75, 0.25, 0.5333),
(10, 10, 0, '<p>Which digit is in the ten&#39;s place in the number 48?</p>\r\n', '<p>4</p>\r\n', '<p>4</p>\r\n', '<p>6</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', 0.35, 0.25, 0.75, 0.45),
(11, 10, 0, '<p>Which digit is in the unit&#39;s place in the number 8?</p>\r\n', '<p>8</p>\r\n', '<p>8</p>\r\n', '<p>8</p>\r\n', '<p>8</p>\r\n', '<p>8</p>\r\n', 0.5, 0.6, 0.7, 1.2),
(12, 10, 0, '<p>Which digit is in the ten&#39;s place in the number 18?</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 0.2, 0.4, 0.25, 0.8),
(13, 10, 0, '<p>Which digit is in the thousand&#39;s place in the number 8974? How many tens</p>\r\n', '<p>8</p>\r\n', '<p>6</p>\r\n', '<p>2</p>\r\n', '<p>66</p>\r\n', '<p>8</p>\r\n', 1, 2, 5, 6),
(14, 10, 0, '<p>the number 80?</p>\r\n', '<p>8</p>\r\n', '<p>8</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', 2, 3, 4, 5),
(15, 10, 0, '<p>How many tens are there in the number 50+40? How many ones are t</p>\r\n', '<p>9</p>\r\n', '<p>9</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', 4, 5, 6, 7),
(16, 10, 0, '<p>the number 8? How many tens are there in</p>\r\n', '<p>8</p>\r\n', '<p>8</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', 9, 8, 7, 6),
(17, 10, 0, '<p>the number 10?</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', 2, 4, 3, 6),
(18, 10, 0, '<p>How many tens are there in the number 30+40+10?</p>\r\n', '<p>8</p>\r\n', '<p>8</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', '<p>24</p>\r\n', 1, 2, 3, 4),
(19, 10, 0, '<p>8873 can be written in words as</p>\r\n', '<p>Eight thousan d eight hundere d and seventy three</p>\r\n', '<p>Eight thousan d eight hundere d and seventy three</p>\r\n', '<p>Eight thousan d eight hundere d and seventy three</p>\r\n', '<p>Eight thousan d eight hundere d and seventy three</p>\r\n', '<p>Eight thousan d eight hundere d and seventy three</p>\r\n', 3, 4, 5, 6),
(20, 10, 0, '<p>613 can be written in words as</p>\r\n', '<p>Six hundred thirteen only</p>\r\n', '<p>Six hundred thirty three</p>\r\n', '<p>Sizxhund red thirty one</p>\r\n', '<p>Six hundred forty two</p>\r\n', '<p>Six hundred thirteen only</p>\r\n', 3, 4, 5, 6),
(21, 10, 0, '<p>Round 873 to the nearest 10.</p>\r\n', '<p>880</p>\r\n', '<p>770</p>\r\n', '<p>670</p>\r\n', '<p>456</p>\r\n', '<p>880</p>\r\n', 1, 2, 3, 4),
(22, 12, 0, '<p>dsgdgdgdf</p>\r\n', '<p>dsa</p>\r\n', '<p>dsgfds</p>\r\n', '<p>df</p>\r\n', '<p>5tert</p>\r\n', '<p>df</p>\r\n', 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `syllabus` varchar(255) NOT NULL,
  `samp_flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `subject`, `chapter`, `syllabus`, `samp_flag`) VALUES
(4, 'Sample', 'Maths', '1', 'ICSE', 0),
(5, 'Test 2', 'Physics', '1', 'CBSE', 0),
(6, 'Maths101', 'Maths', '5', 'CBSE', 0),
(7, 'Chem101', 'Chemistry', '6', 'STATE', 0),
(8, 'Bio303', 'Biology', '1', 'ICSE', 0),
(9, 'History101', 'History', '1', 'CBSE', 1),
(10, 'TrialRun', 'maths', '1', 'ICSE', 1),
(11, 'temp', 'rrr', '1', 'ICSE', 0),
(12, 'fsdd', 'fsdfgds', '1', 'ICSE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `uname`, `password`) VALUES
(11, 'Amal', 'Dethan', 'amaldethan@gmail.com', ''),
(12, 'Test', 'User', 'tony@stark.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'Amal', 'Dethan', 'amalsnewmail@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mem` (`uid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`userid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `fk_mem` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
