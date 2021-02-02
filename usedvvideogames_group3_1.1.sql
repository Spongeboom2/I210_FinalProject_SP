-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 06:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usedvideogames`
--
CREATE DATABASE IF NOT EXISTS `usedvideogames` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `usedvideogames`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` tinyint(4) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `description`) VALUES
(1, 'RPG', 'Exploring the world around you, with many storys to uncover'),
(2, 'FPS', 'Shooting from the eyes of the character!'),
(3, 'Horror', 'Scaring people from zombies from puppets'),
(4, 'MMO', 'Meet man players in a world of gaming! WoW is a great MMO!'),
(5, 'Party', 'Mario, packman, and more invite your friends to have a virtual party.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'Super', 'admin', 'password', 1),
(2, 'Parker', 'Staph', 'Pstaph', 'p$ssw0rd', 1),
(3, 'Alex', 'Young', 'Ayoung', '123', 2),
(4, 'Sean', 'Brikle', 'Sbirkle', '456', 2),
(5, 'Ryan', 'Stump', 'Adve3', '789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `videogames`
--

CREATE TABLE `videogames` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `company` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `image` varchar(120) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videogames`
--

INSERT INTO `videogames` (`id`, `title`, `company`, `release_date`, `publisher`, `price`, `category_id`, `image`, `description`) VALUES
(1, 'Super Mario Party', 'Nintendo', '2018-10-05', 'Nintendo', '59.99', 5, 'https://images-na.ssl-images-amazon.com/images/I/81%2B4Spiow3L._SL1500_.jpg', 'Outwit family and friends as you race across the board to collect the most stars in the original four-player* Mario Party series board game mode. Face off against opponents in the 2 vs. 2 mode with grid-based maps. And for the first time in the series’ history, you can put your skills to the test in an online** minigame mode. There’s fun for everyone in the Super Mario Party game, available exclusively for the Nintendo Switch system!'),
(2, 'Call of Duty: Modern Warfare', 'Infinity Ward', '2019-08-23', 'Actvision', '59.99', 2, 'https://images-na.ssl-images-amazon.com/images/I/81n2llGXyiL._SL1500_.jpg', 'Call of Duty: Modern Warfare is a 2019 first-person shooter video game developed by Infinity Ward and published by Activision.'),
(3, 'Final Fantasy 7 Remake', 'Square Enix', '2020-02-03', 'Square Enix', '59.99', 1, 'https://images-na.ssl-images-amazon.com/images/I/81J-uEoQ6WL._SL1500_.jpg', 'EXPLORE A DARK & ECLECTIC WORLD – Dive deep into the heart of the neo-noir metropolis of Midgar; This retro-futuristic city comes to life giving players access to re-envisioned locations and new districts; What secrets will you uncover\r\nGENESIS OF A RESISTANCE – See how some of the most iconic characters in gaming began their journey; Discover their deep back stories and master each of their unique fighting styles to find success on the battlefield\r\nCHOOSE HOW YOU WANT TO PLAY - FINAL FANTASY VII REMAKE features a hybrid gameplay system that merges real-time action with strategic, command-based combat\r\nUNLEASH A CUSTOMIZABLE ARSENAL - Gain the upper hand against Shinra by unleashing spectacular Limit Breaks, powerful magic, and otherworldly summons; Customize your characters by equipping materia and upgrading your weapons to unlock hidden abilities'),
(4, 'Resident Evil 2 (2019)', 'Capcom', '2019-01-25', 'Capcom', '30.00', 3, 'https://images-na.ssl-images-amazon.com/images/I/81w8LE2aPjL._SL1500_.jpg', 'A spine-chilling reimagining of a horror classic - Based on the original PlayStation console release in 1998, the new game has been completely rebuilt from the ground up for a deeper narrative experience\r\nA whole new perspective – New over-the-shoulder camera mode and modernized control scheme creates a more modern take on the survival horror experience and offers players a trip down memory lane with the original gameplay modes from the 1998 release.\r\nTerrifyingly realistic visuals – Built on Capcom’s proprietary RE Engine, Resident Evil 2 delivers breathtakingly photorealistic visuals in 4K whilst stunning lighting creates an up-close, intense and atmospheric experience as players roam the corridors of the Raccoon City Police Department (RPD).\r\nFace the grotesque hordes – Zombies are brought to life with a horrifyingly realistic wet gore effect as they react in real time taking instant visible damage, making every bullet count.\r\nIconic series defining gameplay – Engage in frenzied combat with enemies, explore dark menacing corridors, solve puzzles to access areas and collect and use items discovered around the environment in a terrifying constant fight for survival'),
(5, 'Final Fantasy 14: A realm reborn', 'Square Enix', '2013-08-25', 'Square Enix', '20.00', 4, 'https://images-na.ssl-images-amazon.com/images/I/81aezpeJItL._SL1500_.jpg', 'All the hallmarks of the FINAL FANTASY franchise, including genre-leading graphics and HD real-time cut scenes; Robust gameplay features such as Free Companies, story-driven player–vs.-player content, and primal summoning to bring players together\r\nIncredible new graphics engine that delivers a high level of detail and quality on both the PlayStation 3 and Windows PC platforms\r\nA flexible class system that allows players to change to any of the eighteen different classes on the fly simply by changing their equipped weapon or tool  \r\nBreathtaking musical score by renowned FINAL FANTASY series composer Nobuo Uematsu  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `videogames`
--
ALTER TABLE `videogames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `videogames`
--
ALTER TABLE `videogames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
