-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 12:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id_anketa` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `aktivna` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `naziv`, `created_at`, `aktivna`) VALUES
(1, 'Anketa 1', '2024-03-11 17:25:19', 1),
(2, 'Anketa 2', '2024-03-11 18:44:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anketa_pitanje`
--

CREATE TABLE `anketa_pitanje` (
  `id_ap` int(11) NOT NULL,
  `id_anketa` int(11) NOT NULL,
  `id_pitanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anketa_pitanje`
--

INSERT INTO `anketa_pitanje` (`id_ap`, `id_anketa`, `id_pitanje`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cenovnik`
--

CREATE TABLE `cenovnik` (
  `id_cena` int(11) NOT NULL,
  `id_usluga` int(11) NOT NULL,
  `vrednost` int(11) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cenovnik`
--

INSERT INTO `cenovnik` (`id_cena`, `id_usluga`, `vrednost`, `created_at`) VALUES
(1, 1, 60, 0),
(2, 2, 30, 0),
(3, 3, 90, 0),
(4, 4, 150, 0),
(5, 5, 40, 0),
(6, 6, 50, 0),
(7, 7, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `glasanje`
--

CREATE TABLE `glasanje` (
  `id_glasanje` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_odgovor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id_kategorija` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id_kategorija`, `naziv`) VALUES
(1, 'Ishrana'),
(2, 'Trening'),
(3, 'Motivacija');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_meni` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `putanja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_meni`, `naziv`, `putanja`) VALUES
(1, 'Početna', 'index'),
(5, 'Edukacija', 'education');

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `id_odgovor` int(11) NOT NULL,
  `odgovor` varchar(255) NOT NULL,
  `id_pitanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id_odgovor`, `odgovor`, `id_pitanje`) VALUES
(1, 'Online mentorstvo', 1),
(2, 'Plan Treninga', 1),
(3, 'Plan Ishrane', 1),
(4, 'Personalni Trener', 1),
(5, 'Suplementacija', 1),
(6, 'Motivacija i dostupnost', 1),
(7, '18-24', 2),
(8, '25-34', 2),
(9, '35-44', 2),
(10, '45-54', 2),
(11, '55+', 2),
(12, '1', 3),
(13, '2', 3),
(14, '3', 3),
(15, '4', 3),
(16, '5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

CREATE TABLE `pitanja` (
  `id_pitanje` int(11) NOT NULL,
  `pitanje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pitanja`
--

INSERT INTO `pitanja` (`id_pitanje`, `pitanje`) VALUES
(1, 'Koji od sledećih programa na Mentor Online smatrate najkorisnijim?'),
(2, 'Koji je vaš uzrast?'),
(3, 'Ocenite sajt od 1 do 5');

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `id_poruka` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `poruka` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_adresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_uloga`, `naziv`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_korisnik` int(20) NOT NULL,
  `imeprezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `id_uloga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_korisnik`, `imeprezime`, `email`, `username`, `password_hash`, `id_uloga`, `created_at`) VALUES
(25, 'Admin Admin', 'admin@gmail.com', 'Admin123', '2637a5c30af69a7bad877fdb65fbd78b', 1, '2024-09-26 22:42:44'),
(27, 'User User', 'user@gmail.com', 'User123', '8ccb29db1ea08e210d6d54002ada3c23', 2, '2024-09-26 22:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_slika`
--

CREATE TABLE `user_slika` (
  `id_slika` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slika` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_usluga`
--

CREATE TABLE `user_usluga` (
  `id_uu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_usluga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aktivan` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_usluga`
--

INSERT INTO `user_usluga` (`id_uu`, `id_user`, `id_usluga`, `created_at`, `aktivan`) VALUES
(39, 27, 2, '2024-09-26 22:46:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usluga_kategorija`
--

CREATE TABLE `usluga_kategorija` (
  `id_uk` int(11) NOT NULL,
  `id_usluga` int(11) NOT NULL,
  `id_kategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usluga_kategorija`
--

INSERT INTO `usluga_kategorija` (`id_uk`, `id_usluga`, `id_kategorija`) VALUES
(1, 1, 2),
(2, 4, 2),
(3, 3, 2),
(4, 6, 3),
(5, 2, 1),
(6, 5, 1),
(7, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usluge`
--

CREATE TABLE `usluge` (
  `id_usluga` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `ikonica` varchar(100) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usluge`
--

INSERT INTO `usluge` (`id_usluga`, `naziv`, `ikonica`, `opis`) VALUES
(1, 'Online mentorstvo', 'fas fa-laptop', 'Online mentorstvo odnosno online coaching je ništa više nego treniranje na daljinu. Imate trenera, odnosno mentora, sa kojim ne radite uzivo, vec ste konstantno u kontaktu preko interneta. Ova metoda treniranja ima i svoje prednosti i mane, medjutim neki od trenera su toliko usavršili sistem rada, da mogu klijentima da obezbede maksimalne rezultate i sa ovakvom vrstom treniranja. Sa ovakvom metodom sam ostavio uspešne saradnje sa preko 300 klijenata.'),
(2, 'Plan Ishrane', 'fab fa-nutritionix', 'Imate precizno određen unos kalorija. Tačan raspored nutrijenata (proteini, ugljeni hidrati, masti), kao i sve potrebne vitamine i minerale. Plan ishrane se sastavlja na osnovu vašeg glavnog cilja (povećavanje mišićne mase, skidanje masnih naslaga, detoksikacija organizma). Ishrana nije monotona, uvek imate alternativu za neki obrok, tako da vam je i uživanje u hrani zagarantovano.'),
(3, 'Plan Treninga', 'fas fa-dumbbell', 'Plan treninga programiran individualno za vas, na osnovu vašeg glavnog cilja i mogućnosti. Plan treninga koji ima jasno definisan cilj, odabir i raspored vežbi, broj serija, broj ponavljanja. Svi moji klijenti imaju dostupan kompletan video materijal sa pravilnom tehnikom izvođenja svih vežbi.'),
(4, 'Personalni Trener', 'fas fa-heartbeat', 'Ovog puta ulazimo i izlazimo iz teretane zajedno. Kidamo svaki mišić do kraja i zajedno motivišemo jedan drugog da svaka sledeća vežba bude još jača i efektivnija. Bićeš zahvalan što umeš i motivisan što možeš. A ja sam tu samo da te stručnim savetim podsećam da i od najboljeg uvek može još bolje.'),
(5, 'Suplementacija', 'fas fa-leaf', 'Od mene ćete dobiti plan suplementacije (nije obavezno). Tu sam da vam pojasnim koji suplementi zaista koriste a koji ne. Kako se koriste i šta očekivati od njih. Puno ljudi danas daje brdo novca na suplemente, a to je zapravo samo bačeni novac'),
(6, 'Motivacija i dostupnost', 'fas fa-university', 'Ne samo kao vaš trener, već kao i vaš prijatelj, tu sam da vam pomognem i da vas motivišem u svakoj situaciji. Uvek sam dostupan za vas da vam razjasnim bilo kakvu nejasnoću. Zajedno menjamo loše navike.'),
(7, 'Proba', 'fas fa-leaf', 'Ovo je proba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_anketa`);

--
-- Indexes for table `anketa_pitanje`
--
ALTER TABLE `anketa_pitanje`
  ADD PRIMARY KEY (`id_ap`),
  ADD KEY `id_anketa` (`id_anketa`),
  ADD KEY `id_pitanje` (`id_pitanje`);

--
-- Indexes for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD PRIMARY KEY (`id_cena`),
  ADD KEY `id_usluga` (`id_usluga`);

--
-- Indexes for table `glasanje`
--
ALTER TABLE `glasanje`
  ADD PRIMARY KEY (`id_glasanje`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_odgovor` (`id_odgovor`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id_kategorija`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_meni`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`id_odgovor`),
  ADD KEY `id_pitanje` (`id_pitanje`);

--
-- Indexes for table `pitanja`
--
ALTER TABLE `pitanja`
  ADD PRIMARY KEY (`id_pitanje`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`id_poruka`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_uloga`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_uloga` (`id_uloga`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_slika`
--
ALTER TABLE `user_slika`
  ADD PRIMARY KEY (`id_slika`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_usluga`
--
ALTER TABLE `user_usluga`
  ADD PRIMARY KEY (`id_uu`),
  ADD UNIQUE KEY `unique_user_usluga` (`id_user`,`id_usluga`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_usluga` (`id_usluga`);

--
-- Indexes for table `usluga_kategorija`
--
ALTER TABLE `usluga_kategorija`
  ADD PRIMARY KEY (`id_uk`),
  ADD KEY `usl` (`id_usluga`),
  ADD KEY `kat` (`id_kategorija`);

--
-- Indexes for table `usluge`
--
ALTER TABLE `usluge`
  ADD PRIMARY KEY (`id_usluga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_anketa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anketa_pitanje`
--
ALTER TABLE `anketa_pitanje`
  MODIFY `id_ap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cenovnik`
--
ALTER TABLE `cenovnik`
  MODIFY `id_cena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `glasanje`
--
ALTER TABLE `glasanje`
  MODIFY `id_glasanje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id_kategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_meni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `id_odgovor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pitanja`
--
ALTER TABLE `pitanja`
  MODIFY `id_pitanje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `id_poruka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_korisnik` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_slika`
--
ALTER TABLE `user_slika`
  MODIFY `id_slika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_usluga`
--
ALTER TABLE `user_usluga`
  MODIFY `id_uu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `usluga_kategorija`
--
ALTER TABLE `usluga_kategorija`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usluge`
--
ALTER TABLE `usluge`
  MODIFY `id_usluga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketa_pitanje`
--
ALTER TABLE `anketa_pitanje`
  ADD CONSTRAINT `anketa_pitanje_ibfk_1` FOREIGN KEY (`id_anketa`) REFERENCES `anketa` (`id_anketa`),
  ADD CONSTRAINT `anketa_pitanje_ibfk_2` FOREIGN KEY (`id_pitanje`) REFERENCES `pitanja` (`id_pitanje`);

--
-- Constraints for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD CONSTRAINT `cenovnik_ibfk_1` FOREIGN KEY (`id_usluga`) REFERENCES `usluge` (`id_usluga`);

--
-- Constraints for table `glasanje`
--
ALTER TABLE `glasanje`
  ADD CONSTRAINT `glasanje_ibfk_1` FOREIGN KEY (`id_odgovor`) REFERENCES `odgovori` (`id_odgovor`),
  ADD CONSTRAINT `glasanje_ibfk_2` FOREIGN KEY (`id_korisnik`) REFERENCES `users` (`id_korisnik`);

--
-- Constraints for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD CONSTRAINT `odgovori_ibfk_1` FOREIGN KEY (`id_pitanje`) REFERENCES `pitanja` (`id_pitanje`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `roles` (`id_uloga`);

--
-- Constraints for table `user_slika`
--
ALTER TABLE `user_slika`
  ADD CONSTRAINT `user_slika_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_korisnik`);

--
-- Constraints for table `user_usluga`
--
ALTER TABLE `user_usluga`
  ADD CONSTRAINT `user_usluga_ibfk_1` FOREIGN KEY (`id_usluga`) REFERENCES `usluge` (`id_usluga`),
  ADD CONSTRAINT `user_usluga_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_korisnik`);

--
-- Constraints for table `usluga_kategorija`
--
ALTER TABLE `usluga_kategorija`
  ADD CONSTRAINT `usluga_kategorija_ibfk_1` FOREIGN KEY (`id_usluga`) REFERENCES `usluge` (`id_usluga`),
  ADD CONSTRAINT `usluga_kategorija_ibfk_2` FOREIGN KEY (`id_kategorija`) REFERENCES `kategorije` (`id_kategorija`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
