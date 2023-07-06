-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 11:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getionmodule`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `codeG` varchar(255) DEFAULT NULL,
  `codeM` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `MHR` varchar(255) DEFAULT '0',
  `numAff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `affectation`
--

INSERT INTO `affectation` (`codeG`, `codeM`, `matricule`, `MHR`, `numAff`) VALUES
('DD101', 'JS', 'BL1122', '19', 2),
('DD103', 'php', 'BL2233', '11', 3),
('DD104', 'cdn', 'BL1122', '15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

CREATE TABLE `formateur` (
  `matricule` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `psd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`matricule`, `nom`, `prenom`, `psd`) VALUES
('BL1122', 'Salwa', 'Benrayane', 'salwa123'),
('BL2233', 'Hassna', 'Rhiat', 'hassna123'),
('BL3344', 'amal', 'ftir', 'amal123');

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `codeG` varchar(255) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`codeG`, `libelle`, `matricule`) VALUES
('DD101', 'Developpement Digital 101', 'BL3344'),
('DD103', 'Developpement Digital 103', 'BL2233'),
('DD104', 'Developpement Digital 104', 'BL1122');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `codeM` varchar(255) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `masseHoraire` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`codeM`, `libelle`, `masseHoraire`) VALUES
('bsd', 'Base De Données', 90),
('cdn', 'Cloud Native', 80),
('JS', 'JavaScript', 120),
('php', 'Site Web Dynamique', 120);

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `codeS` int(11) NOT NULL,
  `dateS` date DEFAULT NULL,
  `heureD` time DEFAULT NULL,
  `heureF` time DEFAULT NULL,
  `heureS` time DEFAULT NULL,
  `valid` varchar(255) DEFAULT '0',
  `codeG` varchar(255) DEFAULT NULL,
  `typeS` varchar(255) DEFAULT NULL,
  `objS` varchar(255) DEFAULT NULL,
  `typeC` varchar(255) DEFAULT NULL,
  `nbreAbsc` int(11) DEFAULT NULL,
  `nomModule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`codeS`, `dateS`, `heureD`, `heureF`, `heureS`, `valid`, `codeG`, `typeS`, `objS`, `typeC`, `nbreAbsc`, `nomModule`) VALUES
(1, '2023-06-15', '08:34:00', '12:35:00', '-00:00:04', NULL, 'DD101', 'on', 'js', NULL, NULL, NULL),
(2, '2023-06-16', '12:37:00', '18:37:00', '00:00:06', NULL, 'DD104', 'on', 'cours', NULL, NULL, NULL),
(3, '2023-06-29', '12:41:00', '18:41:00', '00:00:06', NULL, 'DD104', 'Cours', 'Traveux pratique', NULL, NULL, NULL),
(4, '2023-06-02', '08:30:00', '17:30:00', '00:00:09', '1', 'DD101', 'CC', '', 'Présentiel', NULL, 'JS'),
(5, '0000-00-00', '08:30:00', '18:00:00', '00:00:10', '1', 'DD101', NULL, '', '', NULL, 'JS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`numAff`),
  ADD KEY `codeG` (`codeG`),
  ADD KEY `codeM` (`codeM`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`matricule`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`codeG`),
  ADD KEY `matricule` (`matricule`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`codeM`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`codeS`),
  ADD KEY `codeG` (`codeG`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `numAff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `codeS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`codeG`) REFERENCES `groupe` (`codeG`),
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`codeM`) REFERENCES `module` (`codeM`),
  ADD CONSTRAINT `affectation_ibfk_3` FOREIGN KEY (`matricule`) REFERENCES `formateur` (`matricule`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `formateur` (`matricule`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`codeG`) REFERENCES `groupe` (`codeG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
