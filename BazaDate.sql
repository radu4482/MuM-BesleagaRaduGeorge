-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 23, 2020 la 07:28 AM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `asd`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `artist`
--

INSERT INTO `artist` (`id`, `name`, `gender`) VALUES
(926, 'Pharaoh', 'RussianMusic'),
(927, 'Eminem', 'Rap'),
(928, 'LIL PEEP', 'Rap'),
(932, '6IX9INE', 'Rap'),
(936, 'KingBob', 'BananaSong'),
(937, 'George Enescu', 'Clasica'),
(938, 'RatoiulSingurel', 'Pentru copii');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comm` varchar(100) NOT NULL,
  `time_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `comment`
--

INSERT INTO `comment` (`id`, `song_id`, `user_id`, `comm`, `time_upload`) VALUES
(0, 106, 21, 'Buna dimineata ', '2020-06-23 03:12:38'),
(0, 106, 21, 'Buna dimineata ', '2020-06-23 03:12:43'),
(0, 106, 21, 'asdaaaaa', '2020-06-23 03:15:18'),
(0, 106, 21, 'asdaaaaa', '2020-06-23 03:15:25'),
(0, 106, 21, 'asdaaaaa', '2020-06-23 03:15:26'),
(0, 106, 21, 'buna dimineata', '2020-06-23 03:15:32'),
(0, 106, 21, 'sau poate nu', '2020-06-23 05:18:16'),
(0, 109, 21, 'buna dimineataaa!', '2020-06-23 06:17:45'),
(0, 109, 21, 'buna dimineataaa!', '2020-06-23 06:30:18'),
(0, 109, 21, 'sau poate nu', '2020-06-23 07:20:07'),
(0, 116, 21, 'Mac Mac', '2020-06-23 07:27:55');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `like`
--

INSERT INTO `like` (`id`, `song_id`, `user_id`) VALUES
(25, 100, 21),
(26, 101, 21),
(27, 103, 21),
(28, 105, 21),
(30, 108, 21),
(35, 106, 0),
(36, 107, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `gen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `song`
--

INSERT INTO `song` (`id`, `artist_id`, `name`, `path`, `gen`) VALUES
(109, 926, 'PHARAOH - ДИКО, НАПРИМЕР.mp3', 'uploads/PHARAOH - ДИКО, НАПРИМЕР.mp3', 'RussianMusic'),
(110, 928, 'LIL PEEP - FLEXIN (prod. RONEN).mp3', 'uploads/LIL PEEP - FLEXIN (prod. RONEN).mp3', 'Rap'),
(111, 927, 'Eminem - Godzilla ft. Juice WRLD.mp3', 'uploads/Eminem - Godzilla ft. Juice WRLD.mp3', 'Rap'),
(112, 932, '6IX9INE- GOOBA (Official Music Video).mp3', 'uploads/6IX9INE- GOOBA (Official Music Video).mp3', 'Rap'),
(113, 936, 'MinionsBanana Song Full Song).mp3', 'uploads/MinionsBanana Song Full Song).mp3', 'BananaSong'),
(114, 937, 'George Enescu, Balada pentru vioara.mp3', 'uploads/George Enescu, Balada pentru vioara.mp3', 'Clasica'),
(116, 938, 'O rățușcă stă pe lac - Cântece pentru copii TraLaLa.mp3', 'uploads/O rățușcă stă pe lac - Cântece pentru copii TraLaLa.mp3', 'Pentru copii');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `admin`, `username`, `password`, `email`) VALUES
(21, 1, 'radu44', 'asd', 'radu44@ymail.com'),
(22, 0, 'radu4482', 'asd', 'radu.geroge44@gmail.com'),
(23, 0, 'maria', 'asd', 'maria@gmail.com'),
(24, 0, 'maria besleaga', 'asd', 'maria_besleaga@gmail.com');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexuri pentru tabele `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=939;

--
-- AUTO_INCREMENT pentru tabele `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pentru tabele `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
