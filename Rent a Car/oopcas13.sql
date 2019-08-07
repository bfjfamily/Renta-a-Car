-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 08:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oopcas13`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `kategorija` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `trajanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorija`, `opis`, `trajanje`) VALUES
('A', 'motocikl', 5),
('B', 'automobil', 10),
('C', 'kamion', 5),
('D', 'autobus', 3);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idkorisnika` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idkorisnika`, `ime`, `prezime`, `email`, `username`, `password`) VALUES
(1, 'Nikola', 'Dimitrijevic', 'nikola@gmail.com', 'admin', 'admin'),
(2, 'Suzana', 'Todorovic', 'suzana@gmail.com', 'suzana', 'suzana');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjaci`
--

CREATE TABLE `proizvodjaci` (
  `imeproizvodjaca` varchar(255) NOT NULL,
  `zemljaporekla` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodjaci`
--

INSERT INTO `proizvodjaci` (`imeproizvodjaca`, `zemljaporekla`) VALUES
('Audi', 'Nemacka'),
('Fiat', 'Italija'),
('Honda', 'Japan'),
('Mercedes', 'Nemacka'),
('Peugeot', 'Francuska'),
('Reno', 'Francuska'),
('Suzuki', 'Japan'),
('Toyota', 'Japan'),
('Volvo', 'Svedska');

-- --------------------------------------------------------

--
-- Table structure for table `vozaci`
--

CREATE TABLE `vozaci` (
  `idvozaca` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `godiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozaci`
--

INSERT INTO `vozaci` (`idvozaca`, `ime`, `prezime`, `godiste`) VALUES
(2, 'Ana', 'Sretenovic', 1981),
(3, 'Petar', 'Peric', 1990),
(4, 'Andjela', 'Vujic', 1994),
(5, 'Natasa', 'Djordjevic', 1969),
(6, 'Maja', 'Maric', 1988),
(7, 'Djordje', 'Djokovic', 1988),
(8, 'Nikola', 'Djokic', 1991);

-- --------------------------------------------------------

--
-- Table structure for table `vozila`
--

CREATE TABLE `vozila` (
  `idvozila` int(11) NOT NULL,
  `imeproizvodjaca` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `kategorija` varchar(255) NOT NULL,
  `godiste` int(11) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozila`
--

INSERT INTO `vozila` (`idvozila`, `imeproizvodjaca`, `model`, `kategorija`, `godiste`, `cena`) VALUES
(1, 'Audi', 'A4', 'B', 2005, 5000),
(2, 'Fiat', 'Ducato', 'C', 2008, 11000),
(3, 'Volvo', 'FH', 'D', 2010, 30000),
(4, 'Peugeot', 'speedfight', 'A', 2012, 1500),
(5, 'Suzuki', 'swift', 'B', 2009, 4500),
(6, 'Honda', 'civic', 'B', 2006, 3800),
(7, 'Reno', 'trafic', 'C', 2011, 7500),
(9, 'Mercedes', 'actros', 'C', 2006, 11000),
(10, 'Fiat', '500', 'B', 2011, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `vozilavozaci`
--

CREATE TABLE `vozilavozaci` (
  `idvozila` int(11) NOT NULL,
  `idvozaca` int(11) NOT NULL,
  `vremedodele` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozilavozaci`
--

INSERT INTO `vozilavozaci` (`idvozila`, `idvozaca`, `vremedodele`) VALUES
(1, 2, '2019-02-18 17:54:25'),
(1, 5, '2019-01-21 18:04:54'),
(2, 6, '2019-01-21 18:04:26'),
(3, 7, '2019-01-21 18:04:54'),
(4, 6, '2019-01-21 18:04:26'),
(6, 4, '2019-01-21 18:02:34'),
(7, 8, '2019-01-21 18:05:42'),
(9, 4, '2019-01-21 18:05:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`kategorija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idkorisnika`);

--
-- Indexes for table `proizvodjaci`
--
ALTER TABLE `proizvodjaci`
  ADD PRIMARY KEY (`imeproizvodjaca`);

--
-- Indexes for table `vozaci`
--
ALTER TABLE `vozaci`
  ADD PRIMARY KEY (`idvozaca`);

--
-- Indexes for table `vozila`
--
ALTER TABLE `vozila`
  ADD PRIMARY KEY (`idvozila`),
  ADD KEY `imeproizvodjaca` (`imeproizvodjaca`),
  ADD KEY `kategorija` (`kategorija`);

--
-- Indexes for table `vozilavozaci`
--
ALTER TABLE `vozilavozaci`
  ADD PRIMARY KEY (`idvozila`,`idvozaca`),
  ADD KEY `idvozila` (`idvozila`),
  ADD KEY `idvozaca` (`idvozaca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idkorisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vozaci`
--
ALTER TABLE `vozaci`
  MODIFY `idvozaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vozila`
--
ALTER TABLE `vozila`
  MODIFY `idvozila` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vozila`
--
ALTER TABLE `vozila`
  ADD CONSTRAINT `vozila_ibfk_1` FOREIGN KEY (`imeproizvodjaca`) REFERENCES `proizvodjaci` (`imeproizvodjaca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vozila_ibfk_2` FOREIGN KEY (`kategorija`) REFERENCES `kategorije` (`kategorija`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vozilavozaci`
--
ALTER TABLE `vozilavozaci`
  ADD CONSTRAINT `vozilavozaci_ibfk_1` FOREIGN KEY (`idvozila`) REFERENCES `vozila` (`idvozila`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vozilavozaci_ibfk_2` FOREIGN KEY (`idvozaca`) REFERENCES `vozaci` (`idvozaca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
