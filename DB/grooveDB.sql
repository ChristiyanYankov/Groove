-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2018 at 10:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grooveDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Giant Steps', 1, 2, 'assets/images/artwork/giantsteps.jpg'),
(2, 'Bitches brew', 3, 2, 'assets/images/artwork/bitchesbrew.jpg'),
(3, 'Curtis', 4, 3, 'assets/images/artwork/curtis.jpg'),
(4, 'Alone Together', 5, 2, 'assets/images/artwork/alonetogether.jpg'),
(5, 'Legendary Tapes', 8, 2, 'assets/images/artwork/weatherreport.jpg'),
(6, 'Only Built For Cuban Linx II', 7, 5, 'assets/images/artwork/raekwon.jpg'),
(7, 'Take My Soul', 9, 5, 'assets/images/artwork/takemysoul.jpg'),
(8, 'Purple Haze', 6, 1, 'assets/images/artwork/hendrix.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'John Coltrane'),
(3, 'Miles Davis'),
(4, 'Curtis Mayfield'),
(5, 'Karriem Riggins'),
(6, 'Jimi Hendrix'),
(7, 'Raekwon'),
(8, 'Weather Report'),
(9, 'Thievery Corporation');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Jazz'),
(3, 'Funk'),
(4, 'RnB'),
(5, 'Hip-hop');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(1, 'Avocado', 'dirtentacles', '2018-02-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistSongs`
--

CREATE TABLE `playlistSongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlistSongs`
--

INSERT INTO `playlistSongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(3, 3, 1, 2),
(5, 6, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE `Songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Giant Steps', 1, 1, 2, '04:47', 'assets/music/1959 - Giant Steps/01 - Giant Steps.mp3', 1, 148),
(2, 'Cousin Mary', 1, 1, 2, '05:50', 'assets/music/1959 - Giant Steps/02 - Cousin Mary.mp3', 2, 119),
(3, 'Countdown', 1, 1, 2, '02:26', 'assets/music/1959 - Giant Steps/03 - Countdown.mp3', 3, 101),
(4, 'Spiral', 1, 1, 2, '06:01', 'assets/music/1959 - Giant Steps/04 - Spiral.mp3', 4, 104),
(5, 'Syeeda\'s Song Flute', 1, 1, 2, '07:05', 'assets/music/1959 - Giant Steps/05 - Syeeda\'s Song Flute.mp3', 5, 98),
(6, 'Naima', 1, 1, 2, '04:24', 'assets/music/1959 - Giant Steps/06 - Naima.mp3', 6, 75),
(7, 'Mr. P.C.', 1, 1, 2, '07:02', 'assets/music/1959 - Giant Steps/07 - Mr. P.C..mp3', 7, 66);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'dirtentacles', 'Dirt', 'Tentacles', 'ninjamininja7@gmail.com', 'ba02ac11f5b74cda59251d20c33bb0f1', '2017-12-10 00:00:00', 'assets/images/profile-pics/head_emerald.jpg'),
(2, 'tester', 'Tested', 'Testing', 'test@test.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-08-21 00:00:00', 'assets/images/profile-pics/head_emerald.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Songs`
--
ALTER TABLE `Songs`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playlistSongs`
--
ALTER TABLE `playlistSongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `Songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
