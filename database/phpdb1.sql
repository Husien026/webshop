-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 apr 2022 om 09:18
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdb1`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aankopen`
--

CREATE TABLE `aankopen` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `userid` int(11) NOT NULL,
  `aantaal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aankopen`
--

INSERT INTO `aankopen` (`id`, `productid`, `datum`, `userid`, `aantaal`) VALUES
(125, 17, '2022-04-19', 6, 2),
(126, 20, '2022-04-19', 6, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorieen`
--

CREATE TABLE `categorieen` (
  `id` int(11) NOT NULL,
  `categorieen` varchar(255) NOT NULL,
  `soorten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categorieen`
--

INSERT INTO `categorieen` (`id`, `categorieen`, `soorten`) VALUES
(33, 'test2', 'test5'),
(34, 'Winter', 'Jassen'),
(35, 'Winter', 'Hoddies'),
(42, '2', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `geschiedenis`
--

CREATE TABLE `geschiedenis` (
  `id` int(11) NOT NULL,
  `producten_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `aantaal` int(255) NOT NULL,
  `bestelnummer` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `soorten` varchar(255) NOT NULL,
  `omschrijven` varchar(255) NOT NULL,
  `prijs` decimal(9,2) NOT NULL,
  `FK_categorie` int(11) NOT NULL,
  `voorraden` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `soorten`, `omschrijven`, `prijs`, `FK_categorie`, `voorraden`) VALUES
(14, 'Hoddies11', 'Sportcategorie: Fitness ', '77.00', 35, 79),
(15, 'T_shirt', 'Sportcategorie: Fitness', '60.00', 33, 178),
(17, 'T_shirt', 'Sportcategorie: Fitness ', '44.00', 33, 192),
(20, 'tshirt', 'caton', '55.00', 33, 49),
(25, 'Overhemden', 'catop', '50.00', 34, 199),
(26, 'Hemden', 'Goed ', '60.00', 33, 2),
(28, 'Hoddies11', 'asfdd', '40.00', 33, 200);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `huisnummer` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `geboortedatum` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `voornaam`, `tussenvoegsel`, `achternaam`, `woonplaats`, `straat`, `huisnummer`, `postcode`, `email`, `password`, `geboortedatum`, `rol`) VALUES
(1, 'admin', 'husein', '', 'Qasem', 'Arnhem', 'arnhemstraat', '13', '6826 VA', 'hussein.qasem1991@gmail.com', '123', '2022-03-15', 'admin'),
(2, '1', '1', 'null', '1', '1', '1', '1', '1', '1', '1', '1', 'user'),
(4, 'a', 'a', 'a', 'a', 'a', 'a', '1', '1', 'hussein.qasem1991@gmail.com', 'a', '2022-03-23', 'admin'),
(5, 'q', 'q', 'q', 'q', 'q', 'q', '1', '1', 'hussein.qasem1991@gmail.com', 'q', '2022-03-02', 'user'),
(6, 'w', 'w', 'w', 'w', 'w', 'w', '1', '1', 'hussein.qasem1991@gmail.com', 'w', '2022-03-31', 'user');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aankopen`
--
ALTER TABLE `aankopen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_productid` (`productid`),
  ADD KEY `FK_userid` (`userid`);

--
-- Indexen voor tabel `categorieen`
--
ALTER TABLE `categorieen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `geschiedenis`
--
ALTER TABLE `geschiedenis`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `progesch` (`producten_id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ord_proid` (`productid`),
  ADD KEY `ord_user` (`userid`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_producten` (`FK_categorie`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aankopen`
--
ALTER TABLE `aankopen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT voor een tabel `categorieen`
--
ALTER TABLE `categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `aankopen`
--
ALTER TABLE `aankopen`
  ADD CONSTRAINT `FK_productid` FOREIGN KEY (`productid`) REFERENCES `producten` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `geschiedenis`
--
ALTER TABLE `geschiedenis`
  ADD CONSTRAINT `progesch` FOREIGN KEY (`producten_id`) REFERENCES `producten` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usergesch` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ord_proid` FOREIGN KEY (`productid`) REFERENCES `producten` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ord_user` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `categorie_producten` FOREIGN KEY (`FK_categorie`) REFERENCES `categorieen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
