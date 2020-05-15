-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2020 at 09:49 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uno`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `card_name` text NOT NULL,
  `card_value` text NOT NULL,
  `color` text NOT NULL,
  `type` text NOT NULL,
  `owner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `card_name`, `card_value`, `color`, `type`, `owner`) VALUES
(1, 'R0', '0', 'red', 'normal', NULL),
(2, 'R1', '1', 'red', 'normal', NULL),
(3, 'R1', '1', 'red', 'normal', 'burnt'),
(4, 'R2', '2', 'red', 'normal', NULL),
(5, 'R2', '2', 'red', 'normal', NULL),
(6, 'R3', '3', 'red', 'normal', NULL),
(7, 'R3', '3', 'red', 'normal', NULL),
(8, 'R4', '4', 'red', 'normal', NULL),
(9, 'R4', '4', 'red', 'normal', 'burnt'),
(10, 'R5', '5', 'red', 'normal', NULL),
(11, 'R5', '5', 'red', 'normal', NULL),
(12, 'R6', '6', 'red', 'normal', NULL),
(13, 'R6', '6', 'red', 'normal', NULL),
(14, 'R7', '7', 'red', 'normal', NULL),
(15, 'R7', '7', 'red', 'normal', NULL),
(16, 'R8', '8', 'red', 'normal', NULL),
(17, 'R8', '8', 'red', 'normal', NULL),
(18, 'R9', '9', 'red', 'normal', NULL),
(19, 'R9', '9', 'red', 'normal', NULL),
(20, 'RS', 'Skip', 'red', 'special', NULL),
(21, 'RS', 'Skip', 'red', 'special', 'burnt'),
(22, 'RR', 'Reverse', 'red', 'special', 'burnt'),
(23, 'RR', 'Reverse', 'red', 'special', NULL),
(24, 'R+2', 'Draw Two', 'red', 'special', NULL),
(25, 'R+2', 'Draw Two', 'red', 'special', NULL),
(26, 'Y0 ', '0', 'yellow', 'normal', NULL),
(27, 'Y1 ', '1', 'yellow', 'normal', NULL),
(28, 'Y1 ', '1', 'yellow', 'normal', NULL),
(29, 'Y2', '2', 'yellow', 'normal', NULL),
(30, 'Y2', '2', 'yellow', 'normal', 'PlayingCard'),
(31, 'Y3', '3', 'yellow', 'normal', NULL),
(32, 'Y3', '3', 'yellow', 'normal', NULL),
(33, 'Y4', '4', 'yellow', 'normal', NULL),
(34, 'Y4', '4', 'yellow', 'normal', 'player2'),
(35, 'Y5', '5', 'yellow', 'normal', NULL),
(36, 'Y5', '5', 'yellow', 'normal', NULL),
(37, 'Y6', '6', 'yellow', 'normal', NULL),
(38, 'Y6', '6', 'yellow', 'normal', NULL),
(39, 'Y7', '7', 'yellow', 'normal', NULL),
(40, 'Y7', '7', 'yellow', 'normal', NULL),
(41, 'Y8', '8', 'yellow', 'normal', NULL),
(42, 'Y8', '8', 'yellow', 'normal', NULL),
(43, 'Y9', '9', 'yellow', 'normal', NULL),
(44, 'Y9', '9', 'yellow', 'normal', NULL),
(45, 'YS', 'Skip', 'yellow', 'special', NULL),
(46, 'YS', 'Skip', 'yellow', 'special', NULL),
(47, 'YR', 'Reverse', 'yellow', 'special', NULL),
(48, 'YR', 'Reverse', 'yellow', 'special', NULL),
(49, 'Y+2', 'Draw Two', 'yellow', 'special', 'player1'),
(50, 'Y+2', 'Draw Two', 'yellow', 'special', NULL),
(51, 'G0', '0', 'green', 'normal', NULL),
(52, 'G1', '1', 'green', 'normal', 'player1'),
(53, 'G1', '1', 'green', 'normal', NULL),
(54, 'G2', '2', 'green', 'normal', NULL),
(55, 'G2', '2', 'green', 'normal', NULL),
(56, 'G3', '3', 'green', 'normal', NULL),
(57, 'G3', '3', 'green', 'normal', NULL),
(58, 'G4', '4', 'green', 'normal', NULL),
(59, 'G4', '4', 'green', 'normal', NULL),
(60, 'G5', '5', 'green', 'normal', NULL),
(61, 'G5', '5', 'green', 'normal', NULL),
(62, 'G6', '6', 'green', 'normal', 'player2'),
(63, 'G6', '6', 'green', 'normal', 'player1'),
(64, 'G7', '7', 'green', 'normal', NULL),
(65, 'G7', '7', 'green', 'normal', NULL),
(66, 'G8', '8', 'green', 'normal', NULL),
(67, 'G8', '8', 'green', 'normal', NULL),
(68, 'G9', '9', 'green', 'normal', NULL),
(69, 'G9', '9', 'green', 'normal', NULL),
(70, 'GS', 'Skip', 'green', 'special', 'player2'),
(71, 'GS', 'Skip', 'green', 'special', NULL),
(72, 'GR', 'Reverse', 'green', 'special', 'player1'),
(73, 'GR', 'Reverse', 'green', 'special', NULL),
(74, 'G+2', 'Draw Two', 'green', 'special', NULL),
(75, 'G+2', 'Draw Two', 'green', 'special', NULL),
(76, 'B0', '0', 'blue', 'normal', NULL),
(77, 'B1', '1', 'blue', 'normal', NULL),
(78, 'B1', '1', 'blue', 'normal', NULL),
(79, 'B2', '2', 'blue', 'normal', NULL),
(80, 'B2', '2', 'blue', 'normal', NULL),
(81, 'B3', '3', 'blue', 'normal', NULL),
(82, 'B3', '3', 'blue', 'normal', NULL),
(83, 'B4', '4', 'blue', 'normal', NULL),
(84, 'B4', '4', 'blue', 'normal', NULL),
(85, 'B5', '5', 'blue', 'normal', NULL),
(86, 'B5', '5', 'blue', 'normal', NULL),
(87, 'B6', '6', 'blue', 'normal', NULL),
(88, 'B6', '6', 'blue', 'normal', NULL),
(89, 'B7', '7', 'blue', 'normal', NULL),
(90, 'B7', '7', 'blue', 'normal', NULL),
(91, 'B8', '8', 'blue', 'normal', 'player2'),
(92, 'B8', '8', 'blue', 'normal', NULL),
(93, 'B9', '9', 'blue', 'normal', 'player2'),
(94, 'B9', '9', 'blue', 'normal', NULL),
(95, 'BS', 'Skip', 'blue', 'special', NULL),
(96, 'BS', 'Skip', 'blue', 'special', NULL),
(97, 'BR', 'Reverse', 'blue', 'special', NULL),
(98, 'BR', 'Reverse', 'blue', 'special', 'player1'),
(99, 'B+2', 'Draw Two', 'blue', 'special', NULL),
(100, 'B+2', 'Draw Two ', 'blue', 'special', NULL),
(101, 'YW', 'Wild', 'yellow', 'special', 'burnt'),
(102, 'W', 'Wild', 'no_color', 'special', NULL),
(103, 'W', 'Wild', 'no_color', 'special', 'player1'),
(104, 'W', 'Wild', 'no_color', 'special', NULL),
(105, 'W+4', 'Draw Four', 'no_color', 'special', NULL),
(106, 'W+4', 'Draw Four', 'no_color', 'special', NULL),
(107, 'W+4', 'Draw Four', 'no_color', 'special', NULL),
(108, 'W+4', 'Draw Four', 'no_color', 'special', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cards_empty`
--

CREATE TABLE `cards_empty` (
  `id` int(11) NOT NULL,
  `card_name` text NOT NULL,
  `card_value` text NOT NULL,
  `color` text NOT NULL,
  `type` text NOT NULL,
  `owner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards_empty`
--

INSERT INTO `cards_empty` (`id`, `card_name`, `card_value`, `color`, `type`, `owner`) VALUES
(1, 'R0', '0', 'red', 'normal', NULL),
(2, 'R1', '1', 'red', 'normal', NULL),
(3, 'R1', '1', 'red', 'normal', NULL),
(4, 'R2', '2', 'red', 'normal', NULL),
(5, 'R2', '2', 'red', 'normal', NULL),
(6, 'R3', '3', 'red', 'normal', NULL),
(7, 'R3', '3', 'red', 'normal', NULL),
(8, 'R4', '4', 'red', 'normal', NULL),
(9, 'R4', '4', 'red', 'normal', NULL),
(10, 'R5', '5', 'red', 'normal', NULL),
(11, 'R5', '5', 'red', 'normal', NULL),
(12, 'R6', '6', 'red', 'normal', NULL),
(13, 'R6', '6', 'red', 'normal', NULL),
(14, 'R7', '7', 'red', 'normal', NULL),
(15, 'R7', '7', 'red', 'normal', NULL),
(16, 'R8', '8', 'red', 'normal', NULL),
(17, 'R8', '8', 'red', 'normal', NULL),
(18, 'R9', '9', 'red', 'normal', NULL),
(19, 'R9', '9', 'red', 'normal', NULL),
(20, 'RS', 'Skip', 'red', 'special', NULL),
(21, 'RS', 'Skip', 'red', 'special', NULL),
(22, 'RR', 'Reverse', 'red', 'special', NULL),
(23, 'RR', 'Reverse', 'red', 'special', NULL),
(24, 'R+2', 'Draw Two', 'red', 'special', NULL),
(25, 'R+2', 'Draw Two', 'red', 'special', NULL),
(26, 'Y0 ', '0', 'yellow', 'normal', NULL),
(27, 'Y1 ', '1', 'yellow', 'normal', NULL),
(28, 'Y1 ', '1', 'yellow', 'normal', NULL),
(29, 'Y2', '2', 'yellow', 'normal', NULL),
(30, 'Y2', '2', 'yellow', 'normal', NULL),
(31, 'Y3', '3', 'yellow', 'normal', NULL),
(32, 'Y3', '3', 'yellow', 'normal', NULL),
(33, 'Y4', '4', 'yellow', 'normal', NULL),
(34, 'Y4', '4', 'yellow', 'normal', NULL),
(35, 'Y5', '5', 'yellow', 'normal', NULL),
(36, 'Y5', '5', 'yellow', 'normal', NULL),
(37, 'Y6', '6', 'yellow', 'normal', NULL),
(38, 'Y6', '6', 'yellow', 'normal', NULL),
(39, 'Y7', '7', 'yellow', 'normal', NULL),
(40, 'Y7', '7', 'yellow', 'normal', NULL),
(41, 'Y8', '8', 'yellow', 'normal', NULL),
(42, 'Y8', '8', 'yellow', 'normal', NULL),
(43, 'Y9', '9', 'yellow', 'normal', NULL),
(44, 'Y9', '9', 'yellow', 'normal', NULL),
(45, 'YS', 'Skip', 'yellow', 'special', NULL),
(46, 'YS', 'Skip', 'yellow', 'special', NULL),
(47, 'YR', 'Reverse', 'yellow', 'special', NULL),
(48, 'YR', 'Reverse', 'yellow', 'special', NULL),
(49, 'Y+2', 'Draw Two', 'yellow', 'special', NULL),
(50, 'Y+2', 'Draw Two', 'yellow', 'special', NULL),
(51, 'G0', '0', 'green', 'normal', NULL),
(52, 'G1', '1', 'green', 'normal', NULL),
(53, 'G1', '1', 'green', 'normal', NULL),
(54, 'G2', '2', 'green', 'normal', NULL),
(55, 'G2', '2', 'green', 'normal', NULL),
(56, 'G3', '3', 'green', 'normal', NULL),
(57, 'G3', '3', 'green', 'normal', NULL),
(58, 'G4', '4', 'green', 'normal', NULL),
(59, 'G4', '4', 'green', 'normal', NULL),
(60, 'G5', '5', 'green', 'normal', NULL),
(61, 'G5', '5', 'green', 'normal', NULL),
(62, 'G6', '6', 'green', 'normal', NULL),
(63, 'G6', '6', 'green', 'normal', NULL),
(64, 'G7', '7', 'green', 'normal', NULL),
(65, 'G7', '7', 'green', 'normal', NULL),
(66, 'G8', '8', 'green', 'normal', NULL),
(67, 'G8', '8', 'green', 'normal', NULL),
(68, 'G9', '9', 'green', 'normal', NULL),
(69, 'G9', '9', 'green', 'normal', NULL),
(70, 'GS', 'Skip', 'green', 'special', NULL),
(71, 'GS', 'Skip', 'green', 'special', NULL),
(72, 'GR', 'Reverse', 'green', 'special', NULL),
(73, 'GR', 'Reverse', 'green', 'special', NULL),
(74, 'G+2', 'Draw Two', 'green', 'special', NULL),
(75, 'G+2', 'Draw Two', 'green', 'special', NULL),
(76, 'B0', '0', 'blue', 'normal', NULL),
(77, 'B1', '1', 'blue', 'normal', NULL),
(78, 'B1', '1', 'blue', 'normal', NULL),
(79, 'B2', '2', 'blue', 'normal', NULL),
(80, 'B2', '2', 'blue', 'normal', NULL),
(81, 'B3', '3', 'blue', 'normal', NULL),
(82, 'B3', '3', 'blue', 'normal', NULL),
(83, 'B4', '4', 'blue', 'normal', NULL),
(84, 'B4', '4', 'blue', 'normal', NULL),
(85, 'B5', '5', 'blue', 'normal', NULL),
(86, 'B5', '5', 'blue', 'normal', NULL),
(87, 'B6', '6', 'blue', 'normal', NULL),
(88, 'B6', '6', 'blue', 'normal', NULL),
(89, 'B7', '7', 'blue', 'normal', NULL),
(90, 'B7', '7', 'blue', 'normal', NULL),
(91, 'B8', '8', 'blue', 'normal', NULL),
(92, 'B8', '8', 'blue', 'normal', NULL),
(93, 'B9', '9', 'blue', 'normal', NULL),
(94, 'B9', '9', 'blue', 'normal', NULL),
(95, 'BS', 'Skip', 'blue', 'special', NULL),
(96, 'BS', 'Skip', 'blue', 'special', NULL),
(97, 'BR', 'Reverse', 'blue', 'special', NULL),
(98, 'BR', 'Reverse', 'blue', 'special', NULL),
(99, 'B+2', 'Draw Two', 'blue', 'special', NULL),
(100, 'B+2', 'Draw Two ', 'blue', 'special', NULL),
(101, 'W', 'Wild', 'no_color', 'special', NULL),
(102, 'W', 'Wild', 'no_color', 'special', NULL),
(103, 'W', 'Wild', 'no_color', 'special', NULL),
(104, 'W', 'Wild', 'no_color', 'special', NULL),
(105, 'W+4', 'Draw Four', 'no_color', 'special', NULL),
(106, 'W+4', 'Draw Four', 'no_color', 'special', NULL),
(107, 'W+4', 'Draw Four', 'no_color', 'special', NULL),
(108, 'W+4', 'Draw Four', 'no_color', 'special', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_status` text DEFAULT NULL,
  `has_turn` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_status`, `has_turn`) VALUES
('started', 'Giannis');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player` text NOT NULL,
  `nickname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player`, `nickname`) VALUES
('player1', 'Giannis'),
('player2', 'Alex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards_empty`
--
ALTER TABLE `cards_empty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `cards_empty`
--
ALTER TABLE `cards_empty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
