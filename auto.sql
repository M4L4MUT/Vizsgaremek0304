-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 18. 08:50
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `auto`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmuvek`
--

CREATE TABLE `jarmuvek` (
  `id` int(10) UNSIGNED NOT NULL,
  `marka` varchar(100) NOT NULL,
  `modell` varchar(100) NOT NULL,
  `motor` varchar(100) NOT NULL,
  `uzemanyag` varchar(100) NOT NULL,
  `km` int(100) NOT NULL,
  `kaukcio` int(100) NOT NULL,
  `berletidij` int(100) NOT NULL,
  `szszam` int(100) NOT NULL,
  `fogyasztas` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `jarmuvek`
--

INSERT INTO `jarmuvek` (`id`, `marka`, `modell`, `motor`, `uzemanyag`, `km`, `kaukcio`, `berletidij`, `szszam`, `fogyasztas`) VALUES
(2, 'Audi ', 'A4', '2.0 PDTDI', 'Dízel', 230354, 80000, 15000, 5, 7),
(3, 'Audi', 'A6', '3.0 v6 TDI quattro', 'Dízel', 220432, 100000, 17000, 5, 9),
(5, 'BMW', '520D', '2.0', 'Dízel', 290431, 70000, 13000, 5, 7),
(6, 'BMW', '530D', '3.0', 'Dízel', 230223, 80000, 15000, 5, 8),
(7, 'BMW', '318D', '1.8', 'Dízel', 430201, 70000, 13000, 5, 9),
(9, 'Dacia', 'Duster', '1.5', 'Benzin', 180340, 80000, 15000, 5, 6),
(10, 'MERCEDES-AMG', 'Cla180', '1.6', 'Benzin', 86543, 200000, 30000, 5, 9),
(13, 'MERCEDES-BENZ', 'ML 500', '5.0', 'Benzin', 310321, 100000, 18000, 5, 10),
(14, 'Volkswagen ', 'Passat B5', '1.9', 'Dízel', 280432, 80000, 15000, 5, 6),
(15, 'Volkswagen', 'Golf 7 R', '2.0', 'Dízel', 266341, 70000, 18000, 5, 10),
(16, 'Volkswagen', 'Passat B7', '2.0 PDTDI', 'Dízel', 176976, 130000, 18000, 5, 9),
(17, 'Volkswagen', 'Arteon', '2.0', 'Dízel', 167035, 150000, 20000, 5, 8),
(18, 'Opel', 'Mokka', '1.6', 'Dízel', 300000, 30000, 10000, 5, 8),
(19, 'Opel', 'Astra H', '1.6', 'Benzin', 280321, 60000, 12000, 5, 7),
(20, 'Opel', 'Astra Caravan', '1.8', 'Benzin', 230322, 50000, 13000, 5, 8),
(21, 'Ford', 'Focus', '1.8', 'Benzin', 380341, 80000, 15000, 5, 8),
(22, 'Subaru', 'Impreza', '2.5', 'Benzin', 230454, 200000, 30000, 5, 12),
(23, 'Seat', 'Ibiza', '1.6', 'Dízel', 190201, 70000, 16000, 5, 7),
(24, 'Seat', 'Leon', '1.8', 'Benzin', 210202, 80000, 15000, 5, 7),
(25, 'Mazda', '3', '1.6', 'Dízel', 140300, 30000, 10000, 5, 6),
(26, 'Alfa Romeo', '159', '1.8', 'Benzin', 201312, 50000, 14000, 5, 8),
(27, 'Audi', 'A7', '3.0 V6', 'Dízel', 153200, 130000, 25000, 5, 13),
(28, 'Maserati', 'C8', '4.7', 'Benzin', 97654, 250000, 40000, 4, 15),
(29, 'Aston Martin', 'cygnet', '1.0', 'Benzin', 54003, 20000, 5000, 4, 5),
(30, 'Skoda ', 'Octavia RS', '1.8 TFSI', 'Dízel', 143020, 100000, 20000, 5, 11),
(31, 'Volkswagen', 'E-Golf', 'Elektromos', 'Elektromos', 130302, 100000, 18000, 5, 0),
(33, 'Honda', 'Civic', '1.5 T', 'Benzin', 180400, 70000, 15000, 5, 8),
(34, 'Toyota ', 'Avensis', '1.8', 'Benzin', 230220, 60000, 15000, 5, 8),
(35, 'Ford', 'Ranger', '2.2', 'Dízel', 250322, 80000, 17000, 5, 9),
(36, 'Ford', 'Smax', '2.0 TDCI', 'Dízel', 220210, 65000, 15000, 7, 8),
(37, 'Volkswagen', 'Sharan', '1.9 PDTDI', 'Dízel', 310454, 65000, 15000, 7, 7),
(38, 'Volkswagen\r\n', 'Transporter', '2.5 TDI', 'Dízel', 274543, 50000, 14000, 9, 9),
(39, 'Iveco', 'Daily', '3.0 HPI', 'Dízel', 375430, 60000, 15000, 3, 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'khdfhkkf', 'asdfasdfg@glg.ji', '$2y$10$UJkBZ8be7N1nUXWuP6Ld1emTvOCJvI.vMlyE2apTUG1tpKEOvscyu', '2024-01-15 12:34:52'),
(2, 'M4L4MUT', 'losonczikrisztian12@gmail.com', '$2y$10$ZetBlwjNkhsYqGQZ9dx84OqzdtFNmu8rErIUhcCTyDzB8nEF9YX9q', '2024-01-16 07:52:02');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `jarmuvek`
--
ALTER TABLE `jarmuvek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `jarmuvek`
--
ALTER TABLE `jarmuvek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
