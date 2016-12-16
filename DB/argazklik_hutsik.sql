-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2016 a las 11:38:44
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `argazklik`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumak`
--

CREATE TABLE `albumak` (
  `ID` int(10) NOT NULL,
  `Izena` varchar(50) NOT NULL,
  `Egilea` varchar(20) NOT NULL,
  `Eskuragarritasuna` enum('pribatua','atzipenMugatua','publikoa','custom') NOT NULL,
  `SorreraData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `albumak`
--
DELIMITER $$
CREATE TRIGGER `albumaEzabatu` BEFORE DELETE ON `albumak` FOR EACH ROW BEGIN
	DELETE FROM argazkiak WHERE AlbumID = OLD.ID;
	DELETE FROM albumatzipenzerrenda WHERE AlbumID = OLD.ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumatzipenzerrenda`
--

CREATE TABLE `albumatzipenzerrenda` (
  `AlbumID` int(10) NOT NULL,
  `Nickname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `argazkiak`
--

CREATE TABLE `argazkiak` (
  `ID` int(10) NOT NULL,
  `Argazkia` longblob NOT NULL,
  `Egilea` varchar(20) NOT NULL,
  `AlbumID` int(10) NOT NULL,
  `Eskuragarritasuna` enum('pribatua','atzipenMugatua','publikoa','custom') NOT NULL,
  `IgoeraData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Deskribapena` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `argazkiak`
--
DELIMITER $$
CREATE TRIGGER `argazkiaEzabatu` BEFORE DELETE ON `argazkiak` FOR EACH ROW BEGIN
	DELETE FROM argazkiatzipenzerrenda WHERE ArgazkiID = OLD.ID;
	DELETE FROM taghitza WHERE ArgazkiID = OLD.ID;
	DELETE FROM taglekua WHERE ArgazkiID = OLD.ID;
	DELETE FROM tagpertsona WHERE ArgazkiID = OLD.ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `argazkiatzipenzerrenda`
--

CREATE TABLE `argazkiatzipenzerrenda` (
  `ArgazkiID` int(10) NOT NULL,
  `Nickname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

CREATE TABLE `erabiltzaileak` (
  `Nickname` varchar(20) NOT NULL,
  `Eposta` varchar(100) NOT NULL,
  `IzenAbizenak` varchar(100) NOT NULL,
  `Pasahitza` varchar(40) NOT NULL,
  `Argazkia` blob NOT NULL,
  `Mota` enum('bazkidea','administraria') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `erabiltzaileak`
--
DELIMITER $$
CREATE TRIGGER `erabiltzaileaEzabatu` BEFORE DELETE ON `erabiltzaileak` FOR EACH ROW BEGIN
	DELETE FROM tagpertsona WHERE Nickname = OLD.Nickname;
	DELETE FROM argazkiak WHERE Egilea = OLD.Nickname;
	DELETE FROM albumak WHERE Egilea = OLD.Nickname;	
	DELETE FROM albumatzipenzerrenda WHERE Nickname = OLD.Nickname;
	DELETE FROM argazkiatzipenzerrenda WHERE Nickname = OLD.Nickname;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taghitza`
--

CREATE TABLE `taghitza` (
  `ID` int(10) NOT NULL,
  `ArgazkiID` int(10) NOT NULL,
  `Hitza` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taglekua`
--

CREATE TABLE `taglekua` (
  `ID` int(10) NOT NULL,
  `ArgazkiID` int(10) NOT NULL,
  `LekuaLong` varchar(30) NOT NULL,
  `LekuaLat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tagpertsona`
--

CREATE TABLE `tagpertsona` (
  `ID` int(10) NOT NULL,
  `ArgazkiID` int(10) NOT NULL,
  `Nickname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumak`
--
ALTER TABLE `albumak`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Egilea` (`Egilea`);

--
-- Indices de la tabla `albumatzipenzerrenda`
--
ALTER TABLE `albumatzipenzerrenda`
  ADD PRIMARY KEY (`AlbumID`,`Nickname`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Indices de la tabla `argazkiak`
--
ALTER TABLE `argazkiak`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Egilea` (`Egilea`),
  ADD KEY `AlbumID` (`AlbumID`);

--
-- Indices de la tabla `argazkiatzipenzerrenda`
--
ALTER TABLE `argazkiatzipenzerrenda`
  ADD PRIMARY KEY (`ArgazkiID`,`Nickname`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Indices de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD PRIMARY KEY (`Nickname`),
  ADD UNIQUE KEY `Eposta` (`Eposta`);

--
-- Indices de la tabla `taghitza`
--
ALTER TABLE `taghitza`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArgazkiID` (`ArgazkiID`);

--
-- Indices de la tabla `taglekua`
--
ALTER TABLE `taglekua`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArgazkiID` (`ArgazkiID`);

--
-- Indices de la tabla `tagpertsona`
--
ALTER TABLE `tagpertsona`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArgazkiID` (`ArgazkiID`),
  ADD KEY `Nickname` (`Nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumak`
--
ALTER TABLE `albumak`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
--
-- AUTO_INCREMENT de la tabla `argazkiak`
--
ALTER TABLE `argazkiak`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;
--
-- AUTO_INCREMENT de la tabla `taghitza`
--
ALTER TABLE `taghitza`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;
--
-- AUTO_INCREMENT de la tabla `taglekua`
--
ALTER TABLE `taglekua`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT de la tabla `tagpertsona`
--
ALTER TABLE `tagpertsona`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumak`
--
ALTER TABLE `albumak`
  ADD CONSTRAINT `albumak_ibfk_1` FOREIGN KEY (`Egilea`) REFERENCES `erabiltzaileak` (`Nickname`);

--
-- Filtros para la tabla `albumatzipenzerrenda`
--
ALTER TABLE `albumatzipenzerrenda`
  ADD CONSTRAINT `albumatzipenzerrenda_ibfk_1` FOREIGN KEY (`AlbumID`) REFERENCES `albumak` (`ID`),
  ADD CONSTRAINT `albumatzipenzerrenda_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `erabiltzaileak` (`Nickname`);

--
-- Filtros para la tabla `argazkiatzipenzerrenda`
--
ALTER TABLE `argazkiatzipenzerrenda`
  ADD CONSTRAINT `argazkiatzipenzerrenda_ibfk_1` FOREIGN KEY (`ArgazkiID`) REFERENCES `argazkiak` (`ID`),
  ADD CONSTRAINT `argazkiatzipenzerrenda_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `erabiltzaileak` (`Nickname`);

--
-- Filtros para la tabla `taghitza`
--
ALTER TABLE `taghitza`
  ADD CONSTRAINT `taghitza_ibfk_1` FOREIGN KEY (`ArgazkiID`) REFERENCES `argazkiak` (`ID`);

--
-- Filtros para la tabla `taglekua`
--
ALTER TABLE `taglekua`
  ADD CONSTRAINT `taglekua_ibfk_1` FOREIGN KEY (`ArgazkiID`) REFERENCES `argazkiak` (`ID`);

--
-- Filtros para la tabla `tagpertsona`
--
ALTER TABLE `tagpertsona`
  ADD CONSTRAINT `tagpertsona_ibfk_1` FOREIGN KEY (`ArgazkiID`) REFERENCES `argazkiak` (`ID`),
  ADD CONSTRAINT `tagpertsona_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `erabiltzaileak` (`Nickname`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
