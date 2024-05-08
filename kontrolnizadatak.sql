-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2024 at 12:36 PM
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
-- Table structure for table `bibliotekari`
--

CREATE TABLE `bibliotekari` (
  `id_bibliotekara` int(11) NOT NULL,
  `korisnickoime` varchar(30) NOT NULL,
  `lozinka` varchar(30) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bibliotekari`
--

INSERT INTO `bibliotekari` (`id_bibliotekara`, `korisnickoime`, `lozinka`, `ime`, `prezime`) VALUES
(1, 'veljko', '123', 'Veljko', 'Dragićević');

-- --------------------------------------------------------

--
-- Table structure for table `clanovi`
--

CREATE TABLE `clanovi` (
  `id_clana` int(11) NOT NULL,
  `ime` varchar(11) NOT NULL,
  `prezime` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clanovi`
--

INSERT INTO `clanovi` (`id_clana`, `ime`, `prezime`) VALUES
(1, 'g', 'g');

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id_knjige` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `godina` int(4) NOT NULL,
  `vrsta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id_knjige`, `naziv`, `autor`, `godina`, `vrsta`) VALUES
(1, 'Neko od nas laže', 'Karen Makmanus', 2017, 'YA'),
(2, 'Neko od nas je sledeći', 'Karen Makmanus', 2020, 'YA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bibliotekari`
--
ALTER TABLE `bibliotekari`
  ADD PRIMARY KEY (`id_bibliotekara`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bibliotekari`
--
ALTER TABLE `bibliotekari`
  MODIFY `id_bibliotekara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clanovi`
--
ALTER TABLE `clanovi`
  MODIFY `id_clana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id_knjige` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
