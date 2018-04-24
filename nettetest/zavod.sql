-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 01. dub 2017, 22:25
-- Verze serveru: 10.1.9-MariaDB
-- Verze PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `zavod`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `startlist`
--

CREATE TABLE `startlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `jmeno` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `stat` enum('Česká republika','Slovensko','Polsko','Maďarsko') COLLATE utf8_czech_ci NOT NULL,
  `narozeni` date DEFAULT NULL,
  `kariera` text COLLATE utf8_czech_ci,
  `vykon` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `startlist`
--

INSERT INTO `startlist` (`id`, `jmeno`, `prijmeni`, `stat`, `narozeni`, `kariera`, `vykon`) VALUES
(1, 'Milan', 'Macho', 'Slovensko', '1984-02-26', 'Šesté místo v půlmaratónu v Levoči (2011),\r\npátý v maratónu ve Spišské Nové Vsi (2013).', '02:26:17'),
(2, 'Robert', 'Lowecki', 'Polsko', '1991-05-15', 'Závodník běžeckého klubu GKS Katowice, běhá půlmaratóny i maratóny.', '02:20:22'),
(4, 'Marcin', 'Gliwicki', 'Polsko', '1998-07-15', 'Nadějný polský juniorský vytrvalec, který reprezentoval svou vlast na mistrovství světa juniorů.', '02:19:56'),
(5, 'Štěpán', 'Trnka', 'Česká republika', '1995-04-28', 'Mladý český vytrvalec, účastník pražského půlmaratónu i maratónu.', '02:26:15'),
(6, 'Istvan', 'Kerkesz', 'Maďarsko', '1989-11-13', '', '02:19:05'),
(7, 'Jan', 'Vedral', 'Česká republika', '1988-12-01', 'Populární závodník-komik, který se proslavil tím, že všechny své závody absolvuje pozpátku.', '04:08:35'),
(8, 'Imre', 'Kiss', 'Maďarsko', '1991-03-08', 'Hvězda maďarského amatérského běhu, opakovaně vyhrál řadu bezvýznamných běžeckých podniků. Většinu závodů absolvuje s batůžkem plným maďarských klobás, které cestou nabízí divákům.', '03:05:15'),
(9, 'Jiří', 'Nedobelhal', 'Česká republika', '1977-01-30', 'Veterán maratónských závodů a zároveň jeden z největších smolařů. Opakovaně byl nedaleko před cílem nucen vzdát své závody kvůli naprostému vyčerpání.', '03:37:21');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `startlist`
--
ALTER TABLE `startlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `startlist`
--
ALTER TABLE `startlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
