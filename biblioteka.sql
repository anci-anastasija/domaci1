-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 11:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `idknjiga` int(11) NOT NULL,
  `nazivknjiga` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`idknjiga`, `nazivknjiga`) VALUES
(1, 'Na Drini Ćuprija - Ivo Andrić'),
(2, 'Tvrđava - Meša Selimović'),
(3, 'Ana Karenjina - Lav Tolstoj'),
(4, 'Stranac - Alber Kami');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `iduser` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`iduser`, `name`, `username`, `password`) VALUES
(1, 'Anastasija B', 'ana', '123'),
(2, 'Jovan Petrovic', 'jovan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `podaci`
--

CREATE TABLE `podaci` (
  `id` int(11) NOT NULL,
  `id_knjiga` int(11) NOT NULL,
  `ime` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `podaci`
--

INSERT INTO `podaci` (`id`, `id_knjiga`, `ime`, `email`, `telefon`) VALUES
(80, 4, 'Milica Jovanović', 'milica@gmail.com', '063123456'),
(81, 1, 'Ivan Petrovic', 'ivan@gmail.com', '065123456'),
(83, 4, 'Ana Ivanovic', 'ana@gmail.com', '061123122'),
(85, 3, 'Sanja Peric', 'sanja@gmail.com', '062565645'),
(87, 4, 'Petar Jovic', 'petar@gmail.com', '063258369'),
(90, 2, 'Ivan Savic', 'ivan1@gmail.com', '063222456'),
(91, 2, 'Iva Jelic', 'iva12@gmail.com', '065456456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`idknjiga`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `podaci`
--
ALTER TABLE `podaci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_knjiga` (`id_knjiga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `idknjiga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `podaci`
--
ALTER TABLE `podaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `podaci`
--
ALTER TABLE `podaci`
  ADD CONSTRAINT `podaci_ibfk_1` FOREIGN KEY (`id_knjiga`) REFERENCES `knjige` (`idknjiga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
