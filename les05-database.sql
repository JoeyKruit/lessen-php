-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Gegenereerd op: 18 apr 2016 om 11:05
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reactions`
--

CREATE TABLE `reactions` (
  `id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reactions`
--

INSERT INTO `reactions` (`id`, `subject_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Tja, wat maakt dat nou uit. Fuck de veiligheid.......', '0000-00-00 00:00:00', '2016-04-17 17:27:18'),
(2, 1, 4, 'Ben jij wel helemaal normaal. Zonder veiligheid ook geen zekerheid over onze bankrekening.', '0000-00-00 00:00:00', '2016-04-17 17:27:18');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL,
  `theme_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `subjects`
--

INSERT INTO `subjects` (`id`, `theme_id`, `user_id`, `title`, `slug`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Databases met PDO', 'databases_met_pdo', 'Onveilige methode met PDO, wat je dus nooit moet doen wanneer je gegevens via een formulier verstuurd en het met PDO laat opslaan in een database of zo.', '0000-00-00 00:00:00', '2016-04-17 17:24:29'),
(2, 1, 1, 'Array''s', 'arrays', 'Dit gaat over array''s in PHP 5.4 en hoger', '0000-00-00 00:00:00', '2016-04-17 17:24:29'),
(3, 2, 1, 'OOP in Javascript', 'oop_in_javascript', 'Dit gaat over Objectgeoriënteerd programmeren in Javascript', '0000-00-00 00:00:00', '2016-04-17 17:25:55'),
(4, 2, 1, 'Array''s in Javascript', 'arrays_in_javascript', 'Dit gaat over array''s in Javascript', '0000-00-00 00:00:00', '2016-04-17 17:25:55'),
(5, 2, 1, 'JSON', 'json', 'JSON, wat is het en wat kan je er mee?', '0000-00-00 00:00:00', '2016-04-17 17:26:19'),
(6, 3, 4, 'Het eerste onderwerp', 'het_eerste_onderwerp', 'Dit het eerste onderwerp voor HTML5 en CSS3', '0000-00-00 00:00:00', '2016-04-18 08:52:24');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `themes`
--

CREATE TABLE `themes` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `themes`
--

INSERT INTO `themes` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'php', 'Dit gaat over PHP', '0000-00-00 00:00:00', '2016-04-17 17:21:52'),
(2, 'Javascript', 'javascript', 'Dit gaat over Javascript', '0000-00-00 00:00:00', '2016-04-17 17:21:52'),
(3, 'Webdesign met HTML5 en CSS3', 'webdesign_met_html5_en_css3', 'Dit gaat over HTML5 en CSS3', '0000-00-00 00:00:00', '2016-04-18 08:33:43');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `username`, `password`, `email`, `role`, `verified`, `verification_code`) VALUES
(1, 'Administrator', 'admin', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'admin@ao-alfa.nl', 0, 1, NULL),
(2, 'Wilhelmina Pepermunt', 'wilhelmina', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'trutje@sieling.com', 1, 1, NULL),
(3, 'Kobus Kuch', 'kobus', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'kobus@bitterbal.eu', 1, 1, NULL),
(7, 'Trutje Snutje', 'trutje', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'trutje@viespeuk.nl', 1, 1, NULL),
(20, 'Wilhelmina Sputter', 'sputter', '06ffd77dd9497e3eb8a2e2152880f5ee702b1682', 'wilhelmina@sputter.be', 1, 1, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexen voor tabel `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
-- AUTO_INCREMENT voor een tabel `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
