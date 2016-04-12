-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Gegenereerd op: 12 apr 2016 om 08:41
-- Serverversie: 5.5.42
-- PHP-versie: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `les05`
--
CREATE DATABASE IF NOT EXISTS `les05` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `les05`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `username`, `password`, `email`, `role`, `verified`, `verification_code`) VALUES
(1, 'Administrator', 'admin', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'admin@ao-alfa.nl', 0, 1, NULL),
(2, 'Wilhelmina Pepermunt', 'wilhelmina', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'trutje@sieling.com', 1, 1, NULL),
(3, 'Kobus Kuch', 'kobus', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'kobus@bitterbal.eu', 1, 1, NULL),
(7, 'Trutje Snutje', 'trutje', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'trutje@viespeuk.nl', 1, 1, NULL),
(18, 'Wilhelmina Sputter', 'sputter', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'wilhelmina@sputter.be', 1, 0, 'ZvRcRJhdZLXyQBXl79JrRKSNdvOJ0LB0gtc8culbgjJ6UHs2RbtIWmw9RkTR6vSn');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
