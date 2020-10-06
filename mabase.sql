-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2018 at 09:49 AM
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
-- Database: `mabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `IDAdr` bigint(50) NOT NULL,
  `adresse` text NOT NULL,
  `numero` int(50) NOT NULL,
  `apc` varchar(100) NOT NULL,
  `wilaya` varchar(50) NOT NULL,
  `CodePostal` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adresse`
--

INSERT INTO `adresse` (`IDAdr`, `adresse`, `numero`, `apc`, `wilaya`, `CodePostal`) VALUES
(1, 'Azur Et Mer', 176, 'Bordj El Behri', 'Alger', 16046),
(2, 'cité des oliviers', 10, 'Cheraga', 'Alger', 16014),
(3, '500 logs l\'ilot', 236, '16018', 'Alger', 16018),
(4, 'Quartier des affaires', 3, 'Bab Ezzouar', 'Alger', 16024),
(5, '54 Logs ', 5, 'Bouzereah', 'Alger', 16032),
(218, 'sss', 123, '1800', 'Adrar', 1800),
(224, 'cité 1', 2, '16032', 'Alger', 16032),
(227, 'cité dz', 34, 'BLIDA', 'Jijel', 9000),
(228, 'cité dzé', 34, 'BLIDA', 'Jijel', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `bureauposte`
--

CREATE TABLE `bureauposte` (
  `CodePostal` bigint(50) NOT NULL,
  `NomBureau` text NOT NULL,
  `IDW` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bureauposte`
--

INSERT INTO `bureauposte` (`CodePostal`, `NomBureau`, `IDW`) VALUES
(1800, 'BORDJ-BADJI-MOKHTAR', 1),
(2805, 'CHLEF', 2),
(3000, 'LAGHOUAT', 3),
(4000, 'OUM-EL-BOUAGHI', 4),
(4001, 'AIN BEIDA', 4),
(5000, 'BATNA', 5),
(6000, 'BEJAIA', 6),
(7000, 'BISKRA', 7),
(8802, 'BECHAR', 8),
(9000, 'BLIDA', 9),
(10800, 'BOUIRA', 10),
(11800, 'TAMANRASSET', 11),
(12800, 'TEBESSA', 12),
(13000, 'TLEMCEN', 13),
(14000, 'TIARET', 14),
(15000, 'TIZI-OUZOU', 15),
(16001, 'CASBAH', 16),
(16004, 'EL HARRACH', 16),
(16005, 'HUSSEIN DEY', 16),
(16006, 'KOUBA', 16),
(16009, 'BELOUIZDAD', 16),
(16012, 'SIDI M HAMED', 16),
(16013, 'BIR-MOURAD-RAIS', 16),
(16014, 'CHERAGA', 16),
(16015, 'EL MADANIA', 16),
(16016, 'HYDRA', 16),
(16017, 'ROUIBA', 16),
(16018, 'AIN-BENIAN', 16),
(16019, 'AIN-TAYA', 16),
(16024, 'BAB EZZOUAR', 16),
(16027, 'BARAKI', 16),
(16028, 'BEN-AKNOUN', 16),
(16029, 'BIRKHADEM', 16),
(16030, 'BOLOGHINE', 16),
(16032, 'BOUZAREAH', 16),
(16033, 'DAR EL BEIDA', 16),
(16035, 'EL MARSA', 16),
(16044, 'BENI-MESSOUS', 16),
(16045, 'BIRTOUTA', 16),
(16046, 'BORDJ-EL-BAHRI', 16),
(16047, 'DELY BRAHIM', 16),
(16048, 'GUE DE CONSTANTINE', 16),
(16049, 'DOUERA', 16),
(16050, 'DRARIA', 16),
(16062, 'STAOUELI', 16),
(16063, 'ZERALDA', 16),
(16064, 'AIN-NAADJA', 16),
(16078, 'SAID HAMDINE', 16),
(16081, 'BABA HASSEN', 16),
(16082, 'HAMMAMET', 16),
(16084, 'BOUCHAOUI', 16),
(16087, 'DERGANA', 16),
(16088, 'DIAR-EL-DJEMAA', 16),
(16103, 'ALGER-PLAGE', 16),
(16104, 'EL ACHOUR', 16),
(16106, 'OUED ROMANE', 16),
(16109, 'SIDI-YOUCEF', 16),
(16111, 'BABA ALI', 16),
(16129, 'El HAMIZ', 16),
(16131, 'BORDJ EL KIFFAN', 16),
(16162, 'BACHEDJARAH', 16),
(16814, 'EL BIAR', 16),
(17007, 'DJELFA', 17),
(18800, 'JIJEL', 18),
(19000, 'SETIF', 19),
(20800, 'SAIDA', 20),
(21800, 'SKIKDA', 21),
(22800, 'SIDI BEL ABBES', 22),
(23000, 'ANNABA', 23),
(24800, 'GUELMA', 24),
(25000, 'CONSTANTINE', 25),
(25011, 'EL-KHROUB', 25),
(26009, 'MEDEA', 26),
(27800, 'MOSTAGANEM', 27),
(28000, 'MSILA', 28),
(29800, 'MASCARA', 29),
(30000, 'OUARGLA', 30),
(31004, 'ARZEW', 31),
(31804, 'ORAN', 31),
(34000, 'BORDJ-BOU-ARRERIDJ', 34),
(35000, 'Boumerdes', 35),
(42000, 'TIPAZA', 42);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `IDPostal` bigint(50) NOT NULL,
  `Nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'vide si c''est une entreprise',
  `NomEntreprise` varchar(50) DEFAULT NULL COMMENT 'vide si c''est une personne physique',
  `Prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'vide si c''est une entreprise',
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MotDePasse` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DateInscription` date NOT NULL,
  `DateNaissance` date DEFAULT NULL COMMENT 'vide si c''est une entreprise',
  `LieuNaissance` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'vide si c''est une entreprise',
  `Sexe` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '"homme" ou "femme" et vide si c''est une entreprise',
  `NumTel` int(10) NOT NULL,
  `CCP` int(30) DEFAULT NULL,
  `NCIB` bigint(50) DEFAULT NULL COMMENT 'num carte d''identité biometrique',
  `Type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '"personne" pour personne et "entreprise" pour entreprise',
  `CleConfirmation` bigint(20) NOT NULL,
  `EtatConfirmation` int(11) NOT NULL DEFAULT '0',
  `Etat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`IDPostal`, `Nom`, `NomEntreprise`, `Prenom`, `Email`, `MotDePasse`, `DateInscription`, `DateNaissance`, `LieuNaissance`, `Sexe`, `NumTel`, `CCP`, `NCIB`, `Type`, `CleConfirmation`, `EtatConfirmation`, `Etat`) VALUES
(18002001000001, 'hmida', '', 'hmed', 'dqwkljdqwj@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '2018-06-13', '2000-06-07', 'Adrar', 'Homme', 1232131231, 0, 8373521332, 'Personne', 53581242114, 0, 0),
(18002001000002, 'hmida', '', 'hmed', 'qwe@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '2018-06-13', '2000-06-07', 'Adrar', 'Homme', 1232131231, 0, 8373521331, 'Personne', 44527071557, 0, 0),
(18002001000003, 'hmida', '', 'hmed', 'qwedweq@gmail.com', '141f87be1330a105a87923f4ee6383bd7de46541', '2018-06-13', '2000-06-07', 'Adrar', 'Homme', 1232131231, 0, 8343521331, 'Personne', 34018809895, 0, 0),
(18002009000001, 'arar', '', 'akram', 'm.akram.arar@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '2018-06-13', '1998-02-12', 'Blida', 'Homme', 698770743, 123123213, 2674323433, 'Personne', 11698289292, 1, 0),
(18002116000000, NULL, 'Algerie Poste', NULL, 'info@algerieposte.dz', '133113c3498ce3a8b2ced751e28ff77d7237fc8a', '2018-06-04', NULL, NULL, NULL, 23923200, NULL, NULL, 'entreprise', 0, 0, 0),
(18631116000003, 'AGABI', NULL, 'Abd El Halim', 'halim.agabi@gmail.com', '4bdefa821642ad89e92e09cbc9a01e6fa559dff5', '2018-06-05', '1963-04-03', 'Alger', 'homme', 551152568, 5552222, 980018008000, 'personne', 0, 0, 0),
(18981116000000, 'AGABI', NULL, 'Rayane Younes', 'younes.agabi03@gmail.com', 'c7329b36a0495cf910391ad2e5f975504b63b59e', '2018-06-04', '1998-01-03', 'Kouba', 'homme', 782702685, 20840310, 109980581000180309, 'personne', 0, 0, 0),
(18981116000001, 'Hamada', NULL, 'Oussama', 'oussama.hamada@gmail.com', 'ce86478c369649b3a09ce9f5278b10c962736d9f', '2018-06-04', '1998-06-12', 'Ain Benian', 'homme', 550156810, 20740310, 109970481000170310, 'personne', 0, 0, 0),
(18981116000002, 'Arar', NULL, 'Akram', 'm.akram@gmail.com', '00ea1da4192a2030f9ae023de3b3143ed647bbab', '2018-06-04', '1998-03-13', 'Alger', 'homme', 779373219, 20840330, 980018004567, 'personne', 54329451555, 0, 0),
(18981116000005, 'AGABI', NULL, 'Hamid', 'hamid.agabi@gmail.com', 'e5c4f933a178cd626655c7715ac38cde59f1efe3', '2018-06-05', '1998-08-20', 'Kouba', 'homme', 782702600, 55522220, 980018008389, 'personne', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Colis`
--

CREATE TABLE `Colis` (
  `idColis` bigint(11) NOT NULL,
  `idExpediteur` bigint(20) NOT NULL,
  `idRecepteur` bigint(20) NOT NULL,
  `dateEnvoi` date NOT NULL,
  `dateReception` date NOT NULL,
  `adresseReception` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Colis`
--

INSERT INTO `Colis` (`idColis`, `idExpediteur`, `idRecepteur`, `dateEnvoi`, `dateReception`, `adresseReception`) VALUES
(1, 18981116000005, 18002009000001, '2018-06-03', '2018-06-20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `IDPostal` bigint(50) NOT NULL,
  `CodePostal` bigint(50) NOT NULL,
  `DateDemande` date NOT NULL,
  `DateConfirmation` date DEFAULT NULL COMMENT 'laisse la vide si c''est pas encore validée',
  `Etat` int(1) NOT NULL DEFAULT '0' COMMENT '0 pour non valide et 1 pour valide'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`IDPostal`, `CodePostal`, `DateDemande`, `DateConfirmation`, `Etat`) VALUES
(18002009000001, 16032, '2018-06-13', NULL, 1),
(18002116000000, 16024, '2018-06-04', NULL, 0),
(18631116000003, 31804, '2018-06-05', '2018-06-06', 1),
(18981116000000, 16046, '2018-06-04', NULL, 0),
(18981116000001, 16018, '2018-06-03', '2018-06-04', 1),
(18981116000005, 16046, '2018-06-05', '2018-06-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `habitat`
--

CREATE TABLE `habitat` (
  `IDPostal` bigint(50) NOT NULL,
  `IDAdr` bigint(50) NOT NULL,
  `DateDem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habitat`
--

INSERT INTO `habitat` (`IDPostal`, `IDAdr`, `DateDem`) VALUES
(18002001000001, 218, '2018-06-13'),
(18002001000002, 218, '2018-06-13'),
(18002001000003, 218, '2018-06-13'),
(18002009000001, 224, '2018-06-13'),
(18002116000000, 4, '2018-06-04'),
(18631116000003, 1, '2018-06-04'),
(18981116000000, 1, '2018-06-04'),
(18981116000001, 5, '2018-06-04'),
(18981116000005, 1, '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `lignenotification`
--

CREATE TABLE `lignenotification` (
  `IDPostal` bigint(50) NOT NULL,
  `NID` int(50) NOT NULL,
  `Etat` int(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lignenotification`
--

INSERT INTO `lignenotification` (`IDPostal`, `NID`, `Etat`) VALUES
(18002009000001, 3, 0),
(18002009000001, 10, 0),
(18002009000001, 11, 0),
(18002009000001, 12, 0),
(18631116000003, 10, 0),
(18981116000000, 10, 0),
(18981116000000, 12, 0),
(18981116000000, 13, 0),
(18981116000001, 10, 0),
(18981116000001, 11, 0),
(18981116000001, 12, 0),
(18981116000002, 10, 0),
(18981116000002, 11, 0),
(18981116000002, 12, 0),
(18981116000005, 10, 0),
(18981116000005, 11, 0),
(18981116000005, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NID` int(50) NOT NULL,
  `Type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '"offre", "information", "colis"',
  `Date` date NOT NULL,
  `Contenu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UID` int(11) NOT NULL,
  `AgeMin` int(11) DEFAULT NULL COMMENT 'age visé min',
  `AgeMax` int(11) DEFAULT NULL COMMENT 'age visé max',
  `Sexe` varchar(50) DEFAULT NULL COMMENT 'sexe visé "h" ou "f" ou"h&f"',
  `Wilaya` varchar(50) DEFAULT NULL COMMENT '"toutes" pour toutes les wilayas',
  `TypeVise` varchar(50) DEFAULT NULL COMMENT '"personne" pour personne et "entreprise" pour entreprise ou "p&e"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NID`, `Type`, `Date`, `Contenu`, `UID`, `AgeMin`, `AgeMax`, `Sexe`, `Wilaya`, `TypeVise`) VALUES
(1, 'information', '2018-06-04', 'Bonjour Monsieur; \r\nNous avons l\'honneur de vous souhaiter la bienvenue dans notre plateforme IDNAP d\'Algérie Poste. \r\nPour plus d\'informations, veuillez consulter notre site web : www.poste.dz', 1, 15, 80, 'h&f', 'toutes', 'p&e'),
(2, 'offre', '2018-06-04', 'Bonjour; \r\nNous vous informons que la carte Edahabia est maintenant disponible chez tous nos bureaux de Poste.', 2, 15, 80, 'h&f', '16', 'personne'),
(3, 'colis', '2018-06-04', 'Bonjour Monsieur; \r\nNous vous informons que votre colis est bien arrivé.\r\nPour plus d\'informations, veuillez consulter le service \"suivie du colis\" dans notre plateforme.', 3, NULL, NULL, NULL, NULL, NULL),
(4, 'offre', '2018-06-05', 'Bonjour; \r\nNous vous informons que la carte Edahabia est maintenant disponible chez tous nos bureaux de Poste.', 1, 18, 30, 'h&f', '01', 'entreprise'),
(5, 'information', '2018-06-05', 'Bonjour; \r\nNous vous informons que la carte Edahabia est maintenant disponible chez tous nos bureaux de Poste.', 1, 18, 100, 'h&f', 'toutes', 'p&e'),
(6, 'information', '2018-06-05', 'Bonjour; \r\nNous vous informons que la carte Edahabia est maintenant disponible chez tous nos bureaux de Poste.', 2, 18, 100, 'h&f', 'toutes', 'p&e'),
(7, 'information', '2018-06-05', 'Bonjour; \r\nNous vous informons que la carte Edahabia est maintenant disponible chez tous nos bureaux de Poste.', 8, 18, 100, 'h&f', '16', 'p&e'),
(8, 'information', '2018-06-05', 'Bonjour Monsieur; \r\nNous avons l\'honneur de vous souhaiter la bienvenue dans notre plateforme IDNAP d\'Algérie Poste. \r\nPour plus d\'informations, veuillez consulter notre site web : www.poste.dz', 9, 18, 100, 'h&f', '31', 'p&e'),
(9, 'information', '2018-06-05', 'Bonjour Monsieur; \r\nNous avons l\'honneur de vous souhaiter la bienvenue dans notre plateforme IDNAP d\'AlgÃ©rie Poste. \r\nPour plus d\'informations, veuillez consulter notre site web : www.poste.dz', 10, 18, 100, 'h&f', '42', 'p&e'),
(10, 'information', '2018-06-08', 'èéêęe2èe2@3123425@#@*$^!@&^$*(!@\r\n\r\n', 1, 18, 100, 'h&f', 'toutes', 'p&e'),
(11, 'information', '2018-06-08', 'èe2èe2@3123425@#@*$^!@&^$*(!@', 1, 18, 30, 'h', '16', 'personne'),
(12, 'information', '2018-06-08', '18981116000002\r\n', 8, 18, 30, 'h&f', '16', 'p&e'),
(13, 'colis', '2018-06-08', 'wbfyeubbiu', 3, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicepostal`
--

CREATE TABLE `servicepostal` (
  `idService` int(50) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '"posterestante", "reexpedition", "gardecourrier"',
  `DateInscription` date NOT NULL,
  `DateFin` date NOT NULL,
  `NouvelleAdresse` text COLLATE utf8_unicode_ci,
  `IDPostal` bigint(50) NOT NULL,
  `Etat` int(50) NOT NULL DEFAULT '0' COMMENT '0 pour non valide et 1 pour valide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `servicepostal`
--

INSERT INTO `servicepostal` (`idService`, `type`, `DateInscription`, `DateFin`, `NouvelleAdresse`, `IDPostal`, `Etat`) VALUES
(1, 'reexpedition', '2018-06-04', '2018-08-04', '179 Cité des oliviers, Alger', 18981116000000, 0),
(2, 'posterestante', '2018-06-04', '2018-10-04', '65 Avenue V, Dar El Beida, alger', 18981116000001, 1),
(3, 'gardecourrier', '2018-06-04', '2019-03-04', NULL, 18002116000000, 1),
(4, 'gardecourier', '2018-06-13', '2016-02-09', NULL, 18002009000001, 0),
(5, 'gardecourier', '2018-06-13', '2018-06-18', NULL, 18002009000001, 1),
(6, 'reexpedition', '2018-06-13', '2018-06-29', 'TAMANRASSET', 18002009000001, 1),
(7, 'posterestante', '2018-06-13', '2018-06-26', 'EL HARRACH', 18002009000001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `upw`
--

CREATE TABLE `upw` (
  `IDW` int(11) NOT NULL,
  `NomWilaya` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upw`
--

INSERT INTO `upw` (`IDW`, `NomWilaya`) VALUES
(1, 'Adrar'),
(2, 'Chlef'),
(3, 'Laghouat'),
(4, 'Oum El Bouaghi'),
(5, 'Batna'),
(6, 'Bejaia'),
(7, 'Biskra'),
(8, 'Bechar'),
(9, 'Blida'),
(10, 'Bouira'),
(11, 'Tamanrasset'),
(12, 'Tebessa'),
(13, 'Tlemcen'),
(14, 'Tiaret'),
(15, 'Tizi Ouzou'),
(16, 'Alger'),
(17, 'Djelfa'),
(18, 'Jijel'),
(19, 'Setif'),
(20, 'Saida'),
(21, 'Skikda'),
(22, 'Sidi Bel Abbès'),
(23, 'Annaba'),
(24, 'Guelma'),
(25, 'Constantine'),
(26, 'Médéa'),
(27, 'Mostaganem'),
(28, 'M\'Sila'),
(29, 'Mascara'),
(30, 'Ouargla'),
(31, 'Oran'),
(32, 'Bayadh'),
(33, 'Illizi'),
(34, 'Bordj Bou Arreridj'),
(35, 'Boumerdès'),
(36, 'El Tarf'),
(37, 'Tindouf'),
(38, 'Tissemsilt'),
(39, 'El Oued'),
(40, 'Khenchela'),
(41, 'Souk Ahras'),
(42, 'Tipaza'),
(43, 'Mila'),
(44, 'Ain Defla'),
(45, 'Naama'),
(46, 'Ain Témouchent'),
(47, 'Ghardaia'),
(48, 'Relizane');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `UID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IDW` int(50) NOT NULL,
  `CodePostal` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`UID`, `username`, `Nom`, `Prenom`, `Type`, `password`, `IDW`, `CodePostal`) VALUES
(1, 'admin', 'Agabi', 'Younes', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 16, 16046),
(2, 'boutaleb', 'Boutaleb', 'Ali', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 16, 16024),
(3, '16046', 'AGABI', 'Rayane Younes', 'bureauPoste', '7d9e39fdadabe05c9a2833854e1bf9a57c4dd691', 16, 16046),
(8, 'alger', 'Tali', 'Mohamed El Amine', 'superviseur', '179a252f56dce33a9d1b42ea973d8725a1b85a4a', 16, 16017),
(9, 'oran', 'oran', 'oran', 'superviseur', '4bc4982385244a2789f53ac695e2aa0ced00df6d', 31, 31804),
(10, 'tipaza', 'tipaza', 'tipaza', 'superviseur', 'f05bd5a97eedcde2e74391966b9378ae0833688d', 42, 42000),
(11, '16032', 'Bouzereah', 'Bouzereah', 'bureauPoste', 'eb423244d656142487e921eca3615873aec0baee', 16, 16032);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vue_0`
-- (See below for the actual view)
--
CREATE TABLE `vue_0` (
`IDW` int(11)
,`NomWilaya` varchar(50)
,`c0` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vue_1`
-- (See below for the actual view)
--
CREATE TABLE `vue_1` (
`IDW` int(11)
,`NomWilaya` varchar(50)
,`c1` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vue_0`
--
DROP TABLE IF EXISTS `vue_0`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_0`  AS  select `upw`.`IDW` AS `IDW`,`upw`.`NomWilaya` AS `NomWilaya`,count(`demande`.`Etat`) AS `c0` from ((`upw` join `bureauposte`) join `demande`) where ((`upw`.`IDW` = `bureauposte`.`IDW`) and (`bureauposte`.`CodePostal` = `demande`.`CodePostal`) and (`demande`.`Etat` = '0')) group by `upw`.`IDW` order by `upw`.`IDW` ;

-- --------------------------------------------------------

--
-- Structure for view `vue_1`
--
DROP TABLE IF EXISTS `vue_1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_1`  AS  select `upw`.`IDW` AS `IDW`,`upw`.`NomWilaya` AS `NomWilaya`,count(`demande`.`Etat`) AS `c1` from ((`upw` join `bureauposte`) join `demande`) where ((`upw`.`IDW` = `bureauposte`.`IDW`) and (`bureauposte`.`CodePostal` = `demande`.`CodePostal`) and (`demande`.`Etat` = '1')) group by `upw`.`IDW` order by `upw`.`IDW` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`IDAdr`),
  ADD KEY `CodePostal` (`CodePostal`);

--
-- Indexes for table `bureauposte`
--
ALTER TABLE `bureauposte`
  ADD PRIMARY KEY (`CodePostal`),
  ADD KEY `IDW` (`IDW`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IDPostal`);

--
-- Indexes for table `Colis`
--
ALTER TABLE `Colis`
  ADD PRIMARY KEY (`idColis`),
  ADD KEY `idexp` (`idExpediteur`),
  ADD KEY `idrec` (`idRecepteur`),
  ADD KEY `recadr` (`adresseReception`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`IDPostal`,`CodePostal`),
  ADD KEY `IDPostal` (`IDPostal`),
  ADD KEY `CodePostal` (`CodePostal`);

--
-- Indexes for table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`IDPostal`,`IDAdr`),
  ADD KEY `IDPostal` (`IDPostal`),
  ADD KEY `IDAdr` (`IDAdr`);

--
-- Indexes for table `lignenotification`
--
ALTER TABLE `lignenotification`
  ADD PRIMARY KEY (`IDPostal`,`NID`),
  ADD KEY `IDPostal` (`IDPostal`),
  ADD KEY `NID` (`NID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `servicepostal`
--
ALTER TABLE `servicepostal`
  ADD PRIMARY KEY (`idService`),
  ADD KEY `IDPostal` (`IDPostal`);

--
-- Indexes for table `upw`
--
ALTER TABLE `upw`
  ADD PRIMARY KEY (`IDW`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `UI_IDW` (`IDW`),
  ADD KEY `CodePostal` (`CodePostal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `IDAdr` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `Colis`
--
ALTER TABLE `Colis`
  MODIFY `idColis` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `servicepostal`
--
ALTER TABLE `servicepostal`
  MODIFY `idService` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `UID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`CodePostal`) REFERENCES `bureauposte` (`CodePostal`);

--
-- Constraints for table `bureauposte`
--
ALTER TABLE `bureauposte`
  ADD CONSTRAINT `bureauposte_ibfk_1` FOREIGN KEY (`IDW`) REFERENCES `upw` (`IDW`);

--
-- Constraints for table `Colis`
--
ALTER TABLE `Colis`
  ADD CONSTRAINT `idexp` FOREIGN KEY (`idExpediteur`) REFERENCES `client` (`IDPostal`),
  ADD CONSTRAINT `idrec` FOREIGN KEY (`idRecepteur`) REFERENCES `client` (`IDPostal`),
  ADD CONSTRAINT `recadr` FOREIGN KEY (`adresseReception`) REFERENCES `adresse` (`IDAdr`);

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`IDPostal`) REFERENCES `client` (`IDPostal`),
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`CodePostal`) REFERENCES `bureauposte` (`CodePostal`);

--
-- Constraints for table `habitat`
--
ALTER TABLE `habitat`
  ADD CONSTRAINT `habitat_ibfk_1` FOREIGN KEY (`IDPostal`) REFERENCES `client` (`IDPostal`),
  ADD CONSTRAINT `habitat_ibfk_2` FOREIGN KEY (`IDAdr`) REFERENCES `adresse` (`IDAdr`);

--
-- Constraints for table `lignenotification`
--
ALTER TABLE `lignenotification`
  ADD CONSTRAINT `lignenotification_ibfk_1` FOREIGN KEY (`IDPostal`) REFERENCES `client` (`IDPostal`),
  ADD CONSTRAINT `lignenotification_ibfk_2` FOREIGN KEY (`NID`) REFERENCES `notification` (`NID`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `utilisateur` (`UID`);

--
-- Constraints for table `servicepostal`
--
ALTER TABLE `servicepostal`
  ADD CONSTRAINT `servicepostal_ibfk_1` FOREIGN KEY (`IDPostal`) REFERENCES `client` (`IDPostal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`IDW`) REFERENCES `upw` (`IDW`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`CodePostal`) REFERENCES `bureauposte` (`CodePostal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
