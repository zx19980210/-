-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 09:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ee5`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `doctor` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `appointmentDate` date NOT NULL,
  `confirm` tinyint(1) NOT NULL,
  `reject` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient`, `doctor`, `appointmentDate`, `confirm`, `reject`) VALUES
(2, 'r0001', 's0002', '2020-05-30', 1, 0),
(8, 'r0001', 's0003', '2020-05-27', 0, 0),
(23, 'r0001', 's0001', '2020-05-25', 0, 0),
(24, 'r0001', 's0001', '2020-05-25', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `changed_login_info`
--

CREATE TABLE `changed_login_info` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `password` varchar(64) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `changed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `content` text NOT NULL,
  `writeDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `username`, `content`, `writeDate`) VALUES
(1, 'r0001', 'It\'s Sunday today, my little friends Fiona and I went to the center bookstore for picking some books. We arrived at the store early morning by subway. In the beginning, there are a few persons, we both came to the comic bookshelf, and chose our best-liked comic book to read sitting on the floor. As time passed, more people came, and we found that we became roadblock, so we got up and picked several comics, encyclopedia and exercises book, paid for them, and then went home for reading.', '2020-05-03'),
(3, 'r0001', 'Today is my birthday and I\'m so excited about it.In the morning I put a note on the table for my mum and it said,\"Today is my birthday,don\'t forget it!\"At school,I got many gifts and cards for my classmates and had a lot of fun.But I was still expecting the birthday party after school.', '2020-05-05'),
(4, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(5, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(6, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(7, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(8, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(9, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(10, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(11, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(12, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(13, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(14, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(15, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(16, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(17, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(18, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(19, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(20, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(21, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(22, 'r0001', 'One Sunday morning, my mother and I are in a fruit shop . I like fruit very much , so I want to buy some fruit. There are a lot of fruits in the shop. Look, the watermelons are green and big , the bananas are yellow and nice , the apples are red and sweet. I like pears very much , so my mother buys three kilos of pears for me. And my father likes bananas, so my mother buys two kilos of bananas for him.', '2020-05-22'),
(23, 'r0001', 'happy day', '2020-05-24'),
(24, 'r0001', 'Happy day', '2020-05-24'),
(25, 'r0001', '666', '2020-05-24'),
(26, 'r0001', '666', '2020-05-24'),
(27, 'r0001', '666', '2020-05-24'),
(28, 'r0001', '6666', '2020-05-24'),
(29, 'r0001', '666', '2020-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `group_info`
--

CREATE TABLE `group_info` (
  `group_id` tinyint(1) NOT NULL,
  `motto` text NOT NULL DEFAULT 'Move on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_info`
--

INSERT INTO `group_info` (`group_id`, `motto`) VALUES
(1, 'Everything will be fine'),
(2, 'Move on'),
(3, 'Smile');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `password` varchar(64) CHARACTER SET ascii COLLATE ascii_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`username`, `password`) VALUES
('r0001', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0002', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0003', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0004', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0005', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0006', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0007', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0008', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('r0009', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('s0001', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('s0002', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('s0003', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('s0004', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('s0005', '$2y$10$RLDa2CfEiC2RygS4gelp5.Hx2jn6C5QKqYNwnpo/YFNB8nKc3LxQa'),
('123456', '$2y$10$sHSYWLthP19Ju.itJqQIYeubokVUJ1hcT/mqazCgIgDTnC0Hpt6dm');

--
-- Triggers `login_info`
--
DELIMITER $$
CREATE TRIGGER `save_old_login_info` BEFORE UPDATE ON `login_info` FOR EACH ROW insert into changed_login_info(username,password,changed_date)
values(old.username,old.password,now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `r_profile`
--

CREATE TABLE `r_profile` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `firstname` varchar(15) CHARACTER SET ascii NOT NULL,
  `lastname` varchar(15) CHARACTER SET ascii NOT NULL,
  `birthday` date NOT NULL,
  `groups` tinyint(1) NOT NULL,
  `godFather` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `joinDate` date NOT NULL,
  `avatar` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_profile`
--

INSERT INTO `r_profile` (`id`, `username`, `firstname`, `lastname`, `birthday`, `groups`, `godFather`, `joinDate`, `avatar`, `deleted`) VALUES
(1, 'r0001', 'Alex', 'Smith', '1998-02-10', 1, 'r0003', '2020-04-01', 4, 0),
(2, 'r0002', 'Diana', 'Steven', '1988-09-20', 2, 'r0001', '2020-03-10', 7, 0),
(3, 'r0003', 'Jeff', 'Drump', '1988-09-10', 1, 'r0002', '2020-05-11', 5, 0),
(4, 'r0004', 'Mary', 'Drump', '1988-09-22', 1, 'r0003', '2020-04-02', 6, 0),
(5, 'r0005', 'Zoe', 'Miller', '1989-10-13', 1, 'r0002', '2020-04-02', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_profile`
--

CREATE TABLE `staff_profile` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `position` varchar(15) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_profile`
--

INSERT INTO `staff_profile` (`id`, `username`, `firstname`, `lastname`, `position`, `description`) VALUES
(1, 's0001', 'Jeff', 'Smith', 'doctor', 'Responsible for adjusting therapy'),
(2, 's0002', 'Mike', 'Davis', 'doctor', 'Responsible for psychological counseling'),
(3, 's0003', 'Zac', 'Wilson', 'doctor', 'Responsible for psychological counseling'),
(4, 'r0004', 'Mary', 'Miller', 'doctor', 'Responsible for front desk');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_description`
--

CREATE TABLE `tasks_description` (
  `step` tinyint(1) NOT NULL,
  `task` tinyint(1) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks_description`
--

INSERT INTO `tasks_description` (`step`, `task`, `description`) VALUES
(1, 1, 'task1.1'),
(1, 2, 'task1.2'),
(1, 3, 'task1.3'),
(1, 4, 'task1.4'),
(2, 1, 'task2.1'),
(2, 2, 'task2.2'),
(2, 3, 'task2.3'),
(2, 4, 'task2.4'),
(3, 1, 'task3.1'),
(3, 2, 'task3.2'),
(3, 3, 'task3.3'),
(3, 4, 'task3.4');

-- --------------------------------------------------------

--
-- Table structure for table `task_info`
--

CREATE TABLE `task_info` (
  `id` tinyint(1) NOT NULL,
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `step` tinyint(1) NOT NULL,
  `task` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_info`
--

INSERT INTO `task_info` (`id`, `username`, `step`, `task`, `deleted`) VALUES
(1, 'r0001', 1, 1, 0),
(2, 'r0001', 1, 2, 0),
(3, 'r0001', 1, 3, 0),
(4, 'r0001', 1, 4, 0),
(5, 'r0001', 2, 1, 0),
(6, 'r0001', 2, 2, 0),
(7, 'r0001', 2, 3, 0),
(8, 'r0001', 2, 4, 0),
(9, 'r0001', 3, 1, 0),
(10, 'r0001', 3, 2, 0),
(11, 'r0001', 3, 3, 0),
(12, 'r0002', 1, 1, 0),
(13, 'r0002', 1, 2, 0),
(14, 'r0002', 1, 3, 0),
(15, 'r0002', 2, 1, 0),
(16, 'r0002', 2, 2, 0),
(17, 'r0003', 1, 2, 0),
(19, 'r0003', 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `therapy`
--

CREATE TABLE `therapy` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `therapy` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `therapy`
--

INSERT INTO `therapy` (`id`, `username`, `therapy`, `start`, `end`) VALUES
(1, 'r0001', 'Medicine', '2020-05-01', '2020-06-19'),
(2, 'r0001', 'Psychological counseling', '2020-05-21', '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `yellow_card`
--

CREATE TABLE `yellow_card` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `description` text NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yellow_card`
--

INSERT INTO `yellow_card` (`id`, `username`, `description`, `time`) VALUES
(1, 'r0001', 'Eat too much', '2020-05-25'),
(2, 'r0001', 'Smoke in public area', '2020-05-05'),
(3, 'r0001', 'Absent in yoga course', '2020-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_patient` (`patient`),
  ADD KEY `appointment_doctor` (`doctor`);

--
-- Indexes for table `changed_login_info`
--
ALTER TABLE `changed_login_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_old_info` (`username`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_diary_fk` (`username`);

--
-- Indexes for table `group_info`
--
ALTER TABLE `group_info`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`username`),
  ADD KEY `login_info_password` (`password`);

--
-- Indexes for table `r_profile`
--
ALTER TABLE `r_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `group_fk` (`groups`),
  ADD KEY `godfather_fk` (`godFather`);

--
-- Indexes for table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_staff_fk` (`username`);

--
-- Indexes for table `tasks_description`
--
ALTER TABLE `tasks_description`
  ADD PRIMARY KEY (`step`,`task`);

--
-- Indexes for table `task_info`
--
ALTER TABLE `task_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_step_task` (`step`,`task`,`username`) USING BTREE,
  ADD KEY `task_info_step` (`step`),
  ADD KEY `task_info_deleted` (`deleted`),
  ADD KEY `task_username_fk` (`username`);

--
-- Indexes for table `therapy`
--
ALTER TABLE `therapy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `therapy_username` (`username`);

--
-- Indexes for table `yellow_card`
--
ALTER TABLE `yellow_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yellow_card_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `changed_login_info`
--
ALTER TABLE `changed_login_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `r_profile`
--
ALTER TABLE `r_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_profile`
--
ALTER TABLE `staff_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_info`
--
ALTER TABLE `task_info`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `therapy`
--
ALTER TABLE `therapy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yellow_card`
--
ALTER TABLE `yellow_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_doctor` FOREIGN KEY (`doctor`) REFERENCES `login_info` (`username`),
  ADD CONSTRAINT `appointment_patient` FOREIGN KEY (`patient`) REFERENCES `login_info` (`username`);

--
-- Constraints for table `changed_login_info`
--
ALTER TABLE `changed_login_info`
  ADD CONSTRAINT `old_password_username_fk` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`);

--
-- Constraints for table `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `username_diary_fk` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`);

--
-- Constraints for table `r_profile`
--
ALTER TABLE `r_profile`
  ADD CONSTRAINT `godfather_fk` FOREIGN KEY (`godFather`) REFERENCES `login_info` (`username`),
  ADD CONSTRAINT `group_fk` FOREIGN KEY (`groups`) REFERENCES `group_info` (`group_id`),
  ADD CONSTRAINT `username_fk` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`);

--
-- Constraints for table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD CONSTRAINT `username_staff_fk` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`);

--
-- Constraints for table `task_info`
--
ALTER TABLE `task_info`
  ADD CONSTRAINT `step_task` FOREIGN KEY (`step`,`task`) REFERENCES `tasks_description` (`step`, `task`),
  ADD CONSTRAINT `task_username_fk` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`);

--
-- Constraints for table `therapy`
--
ALTER TABLE `therapy`
  ADD CONSTRAINT `therapy_username` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`);

--
-- Constraints for table `yellow_card`
--
ALTER TABLE `yellow_card`
  ADD CONSTRAINT `yellow_card_username` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
