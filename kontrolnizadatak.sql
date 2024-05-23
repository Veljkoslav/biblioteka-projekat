-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2024 at 10:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kontrolnizadatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanovi`
--

CREATE TABLE `clanovi` (
  `id_clana` int(11) NOT NULL,
  `ime` varchar(11) NOT NULL,
  `prezime` varchar(11) NOT NULL,
  `korisnickoime` varchar(50) NOT NULL,
  `lozinka` varchar(50) NOT NULL,
  `tipnaloga` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clanovi`
--

INSERT INTO `clanovi` (`id_clana`, `ime`, `prezime`, `korisnickoime`, `lozinka`, `tipnaloga`) VALUES
(1, 'Veljko', 'Dragićević', 'veljko', '123', 1),
(5, 'ljubomir', 'bajic', 'ljbajic', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id_knjige` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `godina` int(4) NOT NULL,
  `vrsta` varchar(30) NOT NULL,
  `cena` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id_knjige`, `naziv`, `autor`, `godina`, `vrsta`, `cena`) VALUES
(1, 'Neko od nas laže', 'Karen Makmanus', 2017, 'YA', 100),
(2, 'Neko od nas je sledeći', 'Karen Makmanus', 2020, 'YA', 200),
(4, '1984', 'Džordž Orvel', 1949, 'drama', 340),
(5, 'Životinjska farma', 'Džordž Orvel', 1945, 'novela', 400),
(6, 'Čovek po imenu Uve', 'Fredrik Bakman', 2012, 'novela', 600),
(7, 'Sve što znam o ljubavi', 'Doli Olderton', 2018, 'autobiografija', 100),
(8, 'Stiv Džobs', 'Volter Ajzakson', 2011, 'biografija', 150),
(9, 'Mali princ', 'Antoan de Sent Egziperi', 1943, 'novela', 700),
(10, 'Koreni', 'Dobrica Ćosić', 1954, 'novela', 50);

-- --------------------------------------------------------

--
-- Table structure for table `prodavnica`
--

CREATE TABLE `prodavnica` (
  `id_kupovine` int(5) NOT NULL,
  `id_clana` int(5) NOT NULL,
  `id_knjige` int(5) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanovi`
--
ALTER TABLE `clanovi`
  ADD PRIMARY KEY (`id_clana`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`id_knjige`);

--
-- Indexes for table `prodavnica`
--
ALTER TABLE `prodavnica`
  ADD PRIMARY KEY (`id_kupovine`),
  ADD KEY `id_clana` (`id_clana`),
  ADD KEY `id_knjige` (`id_knjige`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanovi`
--
ALTER TABLE `clanovi`
  MODIFY `id_clana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id_knjige` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prodavnica`
--
ALTER TABLE `prodavnica`
  MODIFY `id_kupovine` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prodavnica`
--
ALTER TABLE `prodavnica`
  ADD CONSTRAINT `id_clana` FOREIGN KEY (`id_clana`) REFERENCES `clanovi` (`id_clana`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_knjige` FOREIGN KEY (`id_knjige`) REFERENCES `knjige` (`id_knjige`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
