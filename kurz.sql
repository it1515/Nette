-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 29. bře 2016, 22:05
-- Verze serveru: 10.1.9-MariaDB
-- Verze PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `kurz`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kurz`
--

CREATE TABLE `kurz` (
  `id_kurzu` int(5) UNSIGNED NOT NULL,
  `nazev` varchar(100) NOT NULL,
  `lekci` int(3) DEFAULT NULL,
  `jazyk` enum('ANJ','NEJ','RUJ','SPJ') NOT NULL,
  `ucebna` varchar(20) DEFAULT NULL,
  `uroven` enum('pokročilí','začátečníci') DEFAULT NULL,
  `lektor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `kurz`
--

INSERT INTO `kurz` (`id_kurzu`, `nazev`, `lekci`, `jazyk`, `ucebna`, `uroven`, `lektor`) VALUES
(1, 'Byznys angličtina', 15, 'ANJ', 'UC02', 'pokročilí', 'Grey'),
(2, 'Učíme se německy', 10, 'NEJ', 'UC01', 'začátečníci', 'Bassová'),
(3, 'Základy španělštiny', 10, 'SPJ', 'UC03', 'začátečníci', 'Lopez'),
(4, 'Angličtina pro pokročilé', 20, 'ANJ', 'UC02', 'pokročilí', 'Grey'),
(5, 'Angličtina snadno a rychle', 10, 'ANJ', 'UC03', 'začátečníci', 'Bassová'),
(6, 'Ruština pro dobrodruhy', 10, 'RUJ', 'UC02', 'začátečníci', 'Petruškin'),
(7, 'Śpanělsky s prstem v nose', 10, 'SPJ', 'UC02', 'pokročilí', 'Lopez'),
(8, 'Angličtina - nic jednoduššího', 15, 'ANJ', 'UC02', 'začátečníci', 'Grey');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `kurz`
--
ALTER TABLE `kurz`
  ADD PRIMARY KEY (`id_kurzu`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kurz`
--
ALTER TABLE `kurz`
  MODIFY `id_kurzu` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
