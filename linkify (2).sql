-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 18, 2017 at 07:42 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkify`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `comment` varchar(140) NOT NULL,
  `published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `uid`, `pid`, `comment`, `published`) VALUES
(121, 48, 44, 'Detta fungerar ju inte :(', '2017-01-17 22:56:43'),
(122, 50, 46, 'Jättebra tips!', '2017-01-17 23:04:36'),
(125, 49, 46, 'Ja, visst är de grymma :)', '2017-01-17 23:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `subject` varchar(140) NOT NULL,
  `description` varchar(140) NOT NULL,
  `link` varchar(140) NOT NULL,
  `published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uid`, `subject`, `description`, `link`, `published`) VALUES
(44, 47, 'Flexbox Cheat-Sheet', 'A Flexbox cheat-sheet by Luke Duncan.', 'http://www.lukeduncan.me/flexbox-cheat-sheet/', '2017-01-17 22:53:35'),
(45, 47, 'What the Flexbox? ', 'A simple, free 20 video course that will help you master Flexbox.', 'https://flexbox.io/', '2017-01-17 22:54:38'),
(46, 49, 'Codecourse', 'Super awesome PHP tutorials.', 'https://www.youtube.com/codecourse', '2017-01-17 23:01:40'),
(51, 52, 'Different Ways to Debug JavaScript Code', 'Tons of tips for JS debugging.', 'https://medium.com/@sandeep.scet/different-ways-to-debug-javascript-code-579e7f58cf10#.lywyueexd', '2017-01-18 06:29:13'),
(52, 52, 'Professor Frisby Introduces Composable Functional JavaScript', 'A video course by Egghead.', 'https://egghead.io/courses/professor-frisby-introduces-composable-functional-javascript', '2017-01-18 06:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(140) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` varchar(300) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `bio`, `avatar`) VALUES
(47, 'christianborg', 'christianborg@gmail.com', '$2y$10$fiGPSOQT1tHrS/fN1fT9ceJW40xbJ8BP.bk4KDko8VgzXrYhQjKOi', 'Christian Borg', '', 'hnNQLjuC0n6hUkVqYX3DSmcMDcsAwzYs.png'),
(48, 'jeremydanner', 'jeremydanner@gmail.com', '$2y$10$Pij9uX4pU7ujnXu.T2WB9esN/9en/H2RTtwCFUl0Lj6svNvLzeK0a', 'Jeremy Danner', '', 'BNtjCsvxtCgbz8jv5mc4QGu14VzmQSQY.jpeg'),
(49, 'mariagustafssonniså', 'mariagustafssonnisa@gmail.com', '$2y$10$oqJqltFOIe3JR5eH/ueoEuvO6kVOQz5zuJ1LkdJo2HMHOJyyw7ZBi', 'Maria Gustafsson Niså', '', 'TkF7QjBGc7WHZPaulwPdVRsfvgaVSUFx.jpeg'),
(50, 'marieeriksson', 'marieeriksson@gmail.com', '$2y$10$0DoxJOGsz.A5nYrHp/xz1.VyuVHc8SjoyOLZubPqmQ.D9M2L1DtfW', 'marieeriksson', '', 'VRDG8uBBBz62f18El4Ky3ZhsqXkhsDgO.png'),
(52, 'robertniklasson', 'robertniklasson@gmail.com', '$2y$10$Dv0fuG1n.oeX3R0HmQL69eXBeR23Kh5bpq9gDqqY4w6azWgrJNsxi', 'Robert Niklasson', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `up` int(11) NOT NULL,
  `down` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `pid`, `uid`, `up`, `down`) VALUES
(23, 44, 48, 0, -1),
(24, 46, 50, 1, 0),
(27, 52, 52, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
