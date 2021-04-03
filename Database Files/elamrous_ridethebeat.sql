-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 11:29 PM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elamrous_ridethebeat`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `ID` int(11) NOT NULL,
  `image_url` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `public` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`ID`, `image_url`, `name`, `public`) VALUES
(1, 'https://i.pinimg.com/originals/18/7e/b3/187eb37999f86568eaec0740855b1900.jpg', 'ChillVibes', 1),
(2, 'https://wallpaperaccess.com/full/1716489.jpg', 'SadSongs', 0),
(3, 'https://i.pinimg.com/236x/6b/49/c9/6b49c95877ed3ffc588801264fb0a67e.jpg', 'AllThingsFrank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `playlist_ratings`
--

CREATE TABLE `playlist_ratings` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist_ratings`
--

INSERT INTO `playlist_ratings` (`ID`, `user_id`, `playlist_id`, `rating`, `comment`) VALUES
(1, 2, 2, 5, 'Great Songs!!!'),
(2, 1, 1, 3, 'Wasn\'t the songs I was looking for. The name is misleading'),
(3, 3, 3, 8, 'Good songs but the playlist needs more inclusion of lesser known artists');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `ID` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_users`
--

CREATE TABLE `playlist_users` (
  `ID` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orig_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist_users`
--

INSERT INTO `playlist_users` (`ID`, `playlist_id`, `user_id`, `orig_user_id`) VALUES
(1, 1, 2, 1),
(2, 2, 3, 1),
(3, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `spotify_id` varchar(100) NOT NULL,
  `song_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `song_artists`
--

CREATE TABLE `song_artists` (
  `ID` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `security_level` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password_hash` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `security_level`, `username`, `password_hash`) VALUES
(1, 'Menna', 'Elamroussy', 'elamrous@usc.edu', 12, 'elamrous', '12345'),
(2, 'Louis', 'Chen', 'chenloui@usc.edu', 20, 'chenloui', '67890'),
(3, 'Sam', 'Budiartho', 'Budiarth@usc.edu', 13, 'budiarth', '24680');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `playlist_ratings`
--
ALTER TABLE `playlist_ratings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `playlist_users`
--
ALTER TABLE `playlist_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `orig_user_id` (`orig_user_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `song_artists`
--
ALTER TABLE `song_artists`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlist_ratings`
--
ALTER TABLE `playlist_ratings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist_users`
--
ALTER TABLE `playlist_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `song_artists`
--
ALTER TABLE `song_artists`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist_ratings`
--
ALTER TABLE `playlist_ratings`
  ADD CONSTRAINT `playlist_ratings_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`ID`),
  ADD CONSTRAINT `playlist_ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `playlist_songs_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`ID`),
  ADD CONSTRAINT `playlist_songs_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `song` (`ID`);

--
-- Constraints for table `playlist_users`
--
ALTER TABLE `playlist_users`
  ADD CONSTRAINT `playlist_users_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`ID`),
  ADD CONSTRAINT `playlist_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `playlist_users_ibfk_3` FOREIGN KEY (`orig_user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `song_artists`
--
ALTER TABLE `song_artists`
  ADD CONSTRAINT `song_artists_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `song` (`ID`),
  ADD CONSTRAINT `song_artists_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
