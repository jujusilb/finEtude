-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 mars 2025 à 20:51
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetecoleaj`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(6);

-- --------------------------------------------------------

--
-- Structure de la table `adulte`
--

DROP TABLE IF EXISTS `adulte`;
CREATE TABLE IF NOT EXISTS `adulte` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adulte`
--

INSERT INTO `adulte` (`id`) VALUES
(2),
(3),
(4),
(5),
(6),
(13),
(14),
(15),
(16),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(76);

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

DROP TABLE IF EXISTS `batiment`;
CREATE TABLE IF NOT EXISTS `batiment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`id`, `libelle`) VALUES
(1, 'Guinot');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_forum`
--

DROP TABLE IF EXISTS `categorie_forum`;
CREATE TABLE IF NOT EXISTS `categorie_forum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `forum_id` int DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7053531D29CCBAD0` (`forum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_forum`
--

INSERT INTO `categorie_forum` (`id`, `forum_id`, `libelle`, `description`) VALUES
(1, 1, 'Pmt1', 'Discussions et informations spécifiques à la classe de PMT1.'),
(2, 1, 'Pmt2', 'Discussions et informations spécifiques à la classe de PMT2.'),
(3, 1, 'CRCD', 'Discussions et informations liées au CRCD (Centre de Ressources et de Compétences Documentaires).'),
(4, 1, 'DA1', 'Discussions et informations spécifiques à la classe de DA1.'),
(5, 1, 'DA2', 'Discussions et informations spécifiques à la classe de DA2.'),
(6, 1, 'Pmk', 'Discussions et informations spécifiques à la classe de PMK.'),
(7, 1, 'K1', 'Discussions et informations spécifiques à la classe de K1.'),
(8, 1, 'K2', 'Discussions et informations spécifiques à la classe de K2.'),
(9, 1, 'K3', 'Discussions et informations spécifiques à la classe de K3.'),
(10, 1, 'K4', 'Discussions et informations spécifiques à la classe de K4.'),
(11, 1, 'K5', 'Discussions et informations spécifiques à la classe de K5.'),
(12, 2, 'Manuels scolaires', 'Discussions sur les manuels scolaires, les éditions, les achats et les ventes.'),
(13, 2, 'Ressources en ligne', 'Partage de ressources en ligne, de sites web, de vidéos et de documents utiles pour les études.'),
(14, 2, 'Outils pédagogiques', 'Présentation et utilisation d\'outils pédagogiques, de logiciels, d\'applications et de matériel pour faciliter l\'apprentissage.'),
(15, 2, 'Méthodes d\'apprentissage', 'Discussions sur les méthodes d\'apprentissage, les techniques de révision, les stratégies pour réussir et les conseils pour s\'organiser.'),
(16, 2, 'Actualités pédagogiques', 'Partage d\'articles, de vidéos et d\'informations sur les actualités pédagogiques, les réformes et les tendances dans l\'éducation.'),
(17, 2, 'Atelier du vendredi Tertiaire', 'Discussions et informations sur l\'atelier du vendredi pour les étudiants du secteur tertiaire.'),
(18, 2, 'Judo', 'Discussions sur les cours de judo, les techniques, les compétitions et les informations pratiques.'),
(19, 2, 'Taiso', 'Discussions sur les cours de Taiso, les exercices, les bienfaits et les informations pratiques.'),
(20, 2, 'Soirée massage', 'Discussions sur les soirées massage, les inscriptions, les techniques et les informations pratiques.'),
(21, 3, 'Soutien scolaire', 'Offres et demandes de soutien scolaire, de cours particuliers et d\'aide aux devoirs.'),
(22, 3, 'Orientation', 'Conseils et informations sur l\'orientation scolaire et professionnelle, les filières, les métiers et les études supérieures.'),
(23, 3, 'Bourses et aides', 'Informations sur les bourses, les aides financières, les logements étudiants et les démarches administratives.'),
(24, 3, 'Ateliers de révision', 'Organisation d\'ateliers de révision, de groupes de travail et de séances de préparation aux examens.'),
(25, 3, 'Préparation aux concours', 'Préparation aux concours, aux examens et aux entretiens, conseils et informations sur les épreuves et les modalités.'),
(26, 3, 'Retour de Stage', 'Partage des expériences de stage, des conseils et des informations sur les entreprises et les secteurs d\'activité.'),
(27, 3, 'Idée d\'entreprise', 'Discussions sur les idées d\'entreprise, les projets de création, les études de marché et les démarches pour entreprendre.'),
(28, 3, 'Petites annonces', 'Petites annonces pour les offres d\'emploi, les demandes de stage, les services, les objets à vendre ou à donner et les logements.'),
(29, 4, 'Présentation des filières', 'Présentation des différentes filières de l\'établissement, des programmes, des débouchés et des témoignages d\'étudiants.'),
(30, 4, 'Événements et conférences', 'Annonces et discussions sur les événements, les conférences, les forums et les salons organisés par l\'établissement.'),
(31, 4, 'Visites d\'entreprises', 'Organisation de visites d\'entreprises, de rencontres avec des professionnels et de stages d\'observation.'),
(32, 4, 'Témoignages d\'anciens élèves', 'Partage de témoignages d\'anciens élèves, de conseils et d\'informations sur les parcours professionnels et les études supérieures.'),
(33, 4, 'Partenariats avec les entreprises', 'Discussions sur les partenariats avec les entreprises, les offres de stage, les contrats d\'alternance et les projets communs.'),
(34, 4, 'Internat', 'Discussions et informations sur la vie à l\'internat, les règles, les activités et les services.'),
(35, 4, 'Arrivée/départ', 'Annonces des arrivées et des départs des étudiants, des enseignants et du personnel administratif.'),
(36, 4, 'Annonce travaux', 'Annonces et informations sur les travaux en cours ou à venir dans l\'établissement.'),
(37, 5, 'Réunions pédagogiques', 'Discussions sur les réunions pédagogiques, les ordres du jour, les comptes rendus et les décisions.'),
(38, 5, 'Formations pour enseignants', 'Informations sur les formations pour enseignants, les stages, les ateliers et les conférences.'),
(39, 5, 'Échanges de pratiques', 'Partage de pratiques pédagogiques innovantes, de méthodes d\'enseignement et d\'outils pour améliorer la qualité de l\'enseignement.'),
(40, 5, 'Outils numériques pour l\'enseignement', 'Présentation et utilisation d\'outils numériques pour l\'enseignement, de logiciels, d\'applications et de plateformes en ligne.'),
(41, 5, 'Actualités de l\'enseignement', 'Partage d\'articles, de vidéos et d\'informations sur les actualités de l\'enseignement, les réformes et les tendances.'),
(42, 5, 'Syndicat', 'Discussions sur les activités du syndicat, les revendications, les négociations et les informations pratiques.'),
(43, 5, 'Apéro', 'Organisation d\'apéros entre collègues, choix des lieux, des dates et des thèmes.'),
(44, 5, 'Projet', 'Discussions sur les projets en cours, les idées, les suggestions et les informations pratiques.'),
(45, 5, 'DRH', 'Discussions sur les questions liées aux ressources humaines, aux carrières, aux formations et aux démarches administratives.');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_ouvrage`
--

DROP TABLE IF EXISTS `categorie_ouvrage`;
CREATE TABLE IF NOT EXISTS `categorie_ouvrage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_ouvrage`
--

INSERT INTO `categorie_ouvrage` (`id`, `libelle`) VALUES
(1, 'Pedagogie'),
(2, 'Humour'),
(3, 'Policier'),
(4, 'Drame'),
(5, 'Science-Fiction'),
(6, 'Historique'),
(7, 'Document'),
(8, 'Biographie'),
(9, 'Fantastique'),
(10, 'Théâtre'),
(11, 'Jeunesse'),
(12, 'Religion'),
(13, 'Technique'),
(14, 'Manga'),
(15, 'Comic'),
(16, 'Bande déssiné'),
(17, 'Philosophie'),
(18, 'Romance');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

DROP TABLE IF EXISTS `categorie_produit`;
CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id`, `libelle`) VALUES
(1, 'Jeton'),
(2, 'Objet'),
(3, 'Tombola'),
(4, 'Event');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `membre_id` int DEFAULT NULL,
  `produit_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `prix_total` double NOT NULL,
  `date_achat` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67D6A99F74A` (`membre_id`),
  KEY `IDX_6EEAA67DF347EFB` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `membre_id`, `produit_id`, `quantity`, `prix_total`, `date_achat`) VALUES
(1, 17, 2, 3, 12, '2025-02-28'),
(2, 17, 2, 5, 20, '2025-02-28'),
(3, 17, 3, 2, 300, '2025-02-28'),
(4, 17, 6, 5, 250, '2025-02-28'),
(5, 17, 4, 2, 400, '2025-02-28'),
(6, 17, 2, 13, 52, '2025-02-28');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `professeur_id` int NOT NULL,
  `matiere_id` int NOT NULL,
  `date` date NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FDCA8C9CBAB22EE9` (`professeur_id`),
  KEY `IDX_FDCA8C9CF46CD258` (`matiere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours_promotion`
--

DROP TABLE IF EXISTS `cours_promotion`;
CREATE TABLE IF NOT EXISTS `cours_promotion` (
  `cours_id` int NOT NULL,
  `promotion_id` int NOT NULL,
  PRIMARY KEY (`cours_id`,`promotion_id`),
  KEY `IDX_39B847167ECF78B0` (`cours_id`),
  KEY `IDX_39B84716139DF194` (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cuisine`
--

DROP TABLE IF EXISTS `cuisine`;
CREATE TABLE IF NOT EXISTS `cuisine` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cuisine`
--

INSERT INTO `cuisine` (`id`) VALUES
(65);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`id`, `libelle`) VALUES
(1, 'Profiterolles'),
(2, 'Banana split'),
(3, 'Tarte aux pommes'),
(4, 'Yaourt'),
(5, 'Crème brulée'),
(6, 'Brownie'),
(7, 'Salade de fruits'),
(8, 'Île flotante'),
(9, 'Fruit'),
(10, 'Tiramisu'),
(11, 'Cheesecake');

-- --------------------------------------------------------

--
-- Structure de la table `direction`
--

DROP TABLE IF EXISTS `direction`;
CREATE TABLE IF NOT EXISTS `direction` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `direction`
--

INSERT INTO `direction` (`id`) VALUES
(16),
(60),
(62),
(67),
(68),
(69);

-- --------------------------------------------------------

--
-- Structure de la table `documentaliste`
--

DROP TABLE IF EXISTS `documentaliste`;
CREATE TABLE IF NOT EXISTS `documentaliste` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `documentaliste`
--

INSERT INTO `documentaliste` (`id`) VALUES
(61);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int NOT NULL,
  `promotion_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECA105F7139DF194` (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `promotion_id`) VALUES
(39, 1),
(72, 2),
(73, 2),
(38, 3),
(10, 4),
(11, 4),
(12, 4),
(7, 5),
(8, 5),
(9, 5),
(17, 6),
(27, 6),
(32, 6),
(40, 6),
(41, 6),
(29, 7),
(35, 7),
(42, 7),
(43, 8),
(44, 8),
(45, 8),
(46, 8),
(31, 9),
(34, 9),
(36, 9),
(37, 9),
(47, 9),
(48, 9),
(49, 9),
(50, 9),
(51, 9),
(52, 9),
(53, 9),
(30, 10),
(33, 10),
(54, 10),
(55, 10),
(56, 10),
(28, 11),
(57, 11),
(58, 11);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ouvrage_id` int NOT NULL,
  `statut_id` int NOT NULL,
  `membre_id` int NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_demande` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_364071D715D884B5` (`ouvrage_id`),
  KEY `IDX_364071D7F6203804` (`statut_id`),
  KEY `IDX_364071D76A99F74A` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `ouvrage_id`, `statut_id`, `membre_id`, `date_emprunt`, `date_demande`, `date_retour`) VALUES
(1, 7, 3, 15, '2025-02-17', '2025-02-15', '2025-02-20'),
(2, 3, 3, 4, '2025-02-18', '2025-02-18', '2025-02-19'),
(3, 8, 3, 8, '2025-02-20', '2025-02-20', '2025-02-26'),
(4, 9, 3, 8, '2025-02-20', '2025-02-20', '2025-03-04'),
(5, 10, 2, 8, '2025-02-26', '2025-03-20', NULL),
(6, 11, 2, 8, '2025-03-04', '2025-03-20', NULL),
(7, 12, 1, 8, NULL, '2025-02-20', NULL),
(8, 13, 1, 8, NULL, '2025-02-20', NULL),
(9, 14, 1, 8, NULL, '2025-02-20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

DROP TABLE IF EXISTS `entree`;
CREATE TABLE IF NOT EXISTS `entree` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`id`, `libelle`) VALUES
(1, 'Oeufs mimosa'),
(2, 'Poireaux Vinaigrette'),
(3, 'Feuilleté au fromage'),
(4, 'Tomates Mozzarella'),
(5, 'coleslaw'),
(6, 'Taboulé orientale'),
(7, 'Carotte rapées'),
(8, 'Foie gras'),
(9, 'Terrine de campagne');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `libelle`, `adresse`, `code_postal`, `ville`, `telephone`, `email`) VALUES
(1, 'CNAM', '50 avenue du professeur lemiere', '75019', 'paris', '0123456789', 'contact@ameli.fr'),
(2, 'Ubisoft', '20 avenue du parc', '94200', 'vincennes', '0123456789', 'contact@ubisoft.com'),
(3, 'Google France', '25 rue LaFayette', '75009', 'Paris', '0123456789', 'contact@google.fr'),
(4, 'pier et vacances', '3 rue des cocotiers', '75001', 'Paris', '0123456789', 'contact@pieretvacance.com'),
(5, 'C&A', '4 avenue du linge', '75010', 'Paris', '0123456789', 'contact@ca.com'),
(6, 'H&M', '12 boulevard Gerard Demanche', '75016', 'Paris', '0123456789', 'contact@hm.com'),
(7, 'RATP', '1 quai de la rapée', '75012', 'Paris', '0123456789', 'contact@ratp.fr'),
(8, 'SNCF', '3 boulevard Georgio', '75008', 'Paris', '0123456789', 'contact@sncf.com'),
(9, 'DGSI', '1 rue nelaton', '75015', 'Paris', '0123456789', 'contact@dgsi.interieur.gouv.fr'),
(10, 'Auchan', 'esplanade de la defense', '92000', 'Nanterre', '0123456789', 'contact@auchan.fr');

-- --------------------------------------------------------

--
-- Structure de la table `etage`
--

DROP TABLE IF EXISTS `etage`;
CREATE TABLE IF NOT EXISTS `etage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `batiment_id` int NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2DDCF14BD6F6891B` (`batiment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etage`
--

INSERT INTO `etage` (`id`, `batiment_id`, `libelle`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3'),
(4, 1, '4'),
(5, 1, '5'),
(6, 1, '6');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

DROP TABLE IF EXISTS `exercice`;
CREATE TABLE IF NOT EXISTS `exercice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `promotion_id` int NOT NULL,
  `matiere_id` int NOT NULL,
  `professeur_id` int NOT NULL,
  `date` date NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E418C74D139DF194` (`promotion_id`),
  KEY `IDX_E418C74DF46CD258` (`matiere_id`),
  KEY `IDX_E418C74DBAB22EE9` (`professeur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `libelle`, `description`, `role`) VALUES
(1, 'Pédagogie', 'Tout ce qui à concerne la pédagogie', '[\"ROLE_PROFESSEUR\", \"ROLE_ELEVE\"]'),
(2, 'Para-scolaire', 'Tout ce qui concerne les activités', '[\"ROLE_MEMBRE\"]'),
(3, 'Insertion', 'Avis sur les entreprises, petites annonces...', '[\"ROLE_INSERTION\", \"ROLE_ELEVE\", \"ROLE_PARENT\"]'),
(4, 'Votre école', 'Tout ce qui concerne votre école', '[\"ROLE_MEMBRE\"]'),
(5, 'Personnel', 'Discussion entre employés', '[\"ROLE_PERSONNEL\"]');

-- --------------------------------------------------------

--
-- Structure de la table `fromage`
--

DROP TABLE IF EXISTS `fromage`;
CREATE TABLE IF NOT EXISTS `fromage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fromage`
--

INSERT INTO `fromage` (`id`, `libelle`) VALUES
(1, 'Camembert'),
(2, 'Gorgonzola'),
(3, 'Brie'),
(4, 'Saint-Nectaire'),
(5, 'Fourme d\'Ambert'),
(6, 'Babybel'),
(7, 'Morbier'),
(8, 'Tome de Savoie'),
(9, 'Saint-Moret'),
(10, 'Fourme d\'Yssingeaux'),
(11, 'Rambol');

-- --------------------------------------------------------

--
-- Structure de la table `insertion`
--

DROP TABLE IF EXISTS `insertion`;
CREATE TABLE IF NOT EXISTS `insertion` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `insertion`
--

INSERT INTO `insertion` (`id`) VALUES
(13);

-- --------------------------------------------------------

--
-- Structure de la table `legume`
--

DROP TABLE IF EXISTS `legume`;
CREATE TABLE IF NOT EXISTS `legume` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `legume`
--

INSERT INTO `legume` (`id`, `libelle`) VALUES
(1, 'pates'),
(2, 'Endives'),
(3, 'Ratatouille'),
(4, 'Purée'),
(5, 'Frites'),
(6, 'Haricot verts'),
(7, 'Lentilles Vertes'),
(8, 'Pommes dauphine'),
(9, 'Ebly'),
(10, 'riz');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `libelle`) VALUES
(1, 'Bureautique'),
(2, 'Français'),
(3, 'Anglais'),
(4, 'Mathématique'),
(5, 'Informatique'),
(6, 'Anatomie'),
(7, 'Pratique de massage'),
(8, 'Pratique de massage'),
(9, 'Physique'),
(10, 'Chimie'),
(11, 'CRCD'),
(12, 'TRE'),
(13, 'Neurologie'),
(14, 'Pharmacologie');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charte` tinyint(1) DEFAULT NULL,
  `civilite` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `image_name`, `updated_at`, `created_at`, `username`, `charte`, `civilite`) VALUES
(1, 'DOE', 'John', 'mur-des-je-t-aime-67bc5d1055653852202728.png', '2025-02-24 12:50:40', '2025-02-24 12:50:40', 'jdoe', 0, 'Monsieur'),
(2, 'NAIT-KACI', 'Said', 'man.png', '2025-02-24 14:49:12', '2025-02-24 14:49:12', 'snait-kaci', 0, 'Monsieur'),
(3, 'LEVY', 'Gilles', 'man.png', '2025-02-24 14:57:26', '2025-02-24 14:57:26', 'glevy', 0, 'Monsieur'),
(4, 'PALAKOT', 'Igor', 'man.png', '2025-02-24 14:59:18', '2025-02-24 14:59:18', 'ipalakot', 0, 'Monsieur'),
(5, 'SCHAFF', 'Estelle', 'woman.png', '2025-02-24 15:02:18', '2025-02-24 15:02:19', 'eschaff', 0, 'Madame'),
(6, 'VIALA', 'Vincent', 'man.png', '2025-02-24 15:06:30', '2025-02-24 15:06:30', 'vviala', 0, 'Madame'),
(7, 'SILBERSTEIN', 'Julien', 'man.png', '2025-02-24 16:26:45', '2025-02-24 16:26:45', 'jsilberstein', 0, 'Monsieur'),
(8, 'DRECHE', 'Aristide', 'man.png', '2025-02-24 16:28:13', '2025-02-24 16:28:13', 'adreche', 0, 'Monsieur'),
(9, 'NOEL', 'Marie-Laure', 'woman.png', '2025-02-24 16:29:30', '2025-02-24 16:29:30', 'mlnoel', 0, 'Madame'),
(10, 'MARIE', 'Alexis', 'man.png', '2025-02-24 16:29:56', '2025-02-24 16:29:56', 'amarie', 0, 'Monsieur'),
(11, 'DUBOIS', 'Corentin', 'man.png', '2025-02-24 16:30:18', '2025-02-24 16:29:56', 'cdubois', 0, 'Monsieur'),
(12, 'MAZEAU', 'Matthias', 'man.png', '2025-02-24 16:30:47', '2025-02-24 16:30:47', 'mmazeau', 0, 'Monsieur'),
(13, 'CHABIRA', 'Malika', 'woman.png', '2025-02-24 16:33:16', '2025-02-24 16:45:08', 'mchabira', 0, 'Madame'),
(14, 'BUREL', 'Damien', 'man.png', '2025-02-24 16:45:08', '2025-02-24 16:45:08', 'dburel', 0, 'Monsieur'),
(15, 'KHEIAR', 'Myriam', 'woman.png', '2025-02-24 22:56:41', '2025-02-24 16:29:56', 'mkheiar', 0, 'Madame'),
(16, 'PERRIN', 'Clement', 'man.png', '2025-02-24 23:23:31', '2025-02-24 16:29:56', 'cperrin', 0, 'Monsieur'),
(17, 'TERENDIJ', 'Lucas', 'man.png', '2025-02-25 09:02:37', '2025-02-24 16:29:56', 'shadjdoudou', 0, 'Monsieur'),
(18, 'BLONDELEAU', 'Thomas', 'man.png', '2025-02-25 09:05:05', '2025-02-24 16:29:56', 'tblondeleau', 0, 'Monsieur'),
(19, 'BENYAHYA', 'Rachida', 'woman.png', '2025-02-25 09:05:58', '2025-02-24 14:49:12', 'rbenyahya', 0, 'Madame'),
(20, 'SAKHRAOUI', 'Mabrouk', 'man.png', '2025-02-25 09:06:44', '2025-02-24 14:49:12', 'msakhraoui', 0, 'Monsieur'),
(21, 'THOMAS', 'Hadrien', 'man.png', '2025-02-25 09:07:37', '2025-02-25 09:07:37', 'hthomas', 0, 'Monsieur'),
(22, 'DUVEAU HOAURAU', 'Mickaël', 'man.png', '2025-02-25 09:15:27', '2025-02-24 14:49:12', 'mduveau hoaurau', 0, 'Monsieur'),
(23, 'JEANSON', 'Edouard', 'man.png', '2025-02-25 09:17:43', '2025-02-24 16:29:56', 'ejeanson', 0, 'Monsieur'),
(24, 'SORENTINO', 'Patrice', 'man.png', '2025-02-25 09:26:58', '2025-02-24 16:29:56', 'psorentino', 0, 'Monsieur'),
(25, 'PARTOUCHE', 'Elie', 'man.png', '2025-02-25 09:28:21', '2025-02-24 16:29:56', 'epartouche', 0, 'Monsieur'),
(26, 'BALESTAN', 'Quentin', 'man.png', '2025-02-25 09:29:29', '2025-02-24 16:29:56', 'qbalestan', 0, 'Monsieur'),
(27, 'GRANIER', 'Manon', 'woman.png', '2025-02-25 09:35:39', '2025-02-24 16:29:56', 'mgranier', 0, 'Madame'),
(28, 'BELMONTE-CAUSSIEU', 'Manon', 'woman.png', '2025-02-25 09:36:13', '2025-02-24 16:29:56', 'mbelmonte-caussieu', 0, 'Madame'),
(29, 'KAUFMAN', 'Manon', 'woman.png', '2025-02-25 09:36:38', '2025-02-24 16:29:56', 'mkaufman', 0, 'Madame'),
(30, 'SERVAJEAN', 'Laure', 'woman.png', '2025-02-25 09:37:03', '2025-02-24 16:29:56', 'lservajean', 0, 'Madame'),
(31, 'EDIMO', 'Diane', 'woman.png', '2025-02-25 09:37:23', '2025-02-24 16:29:56', 'dedimo', 0, 'Madame'),
(32, 'CHAFFEY', 'Nathan', 'man.png', '2025-02-25 09:40:39', '2025-02-24 16:29:56', 'nchaffey', 0, 'Monsieur'),
(33, 'DROUART', 'Melvin', 'man.png', '2025-02-25 09:42:03', '2025-02-24 16:29:56', 'mdrouart', 0, 'Monsieur'),
(34, 'OUAHABI', 'Sofian', 'man.png', '2025-02-25 09:42:31', '2025-02-24 16:29:56', 'souahabi', 0, 'Monsieur'),
(35, 'DOUCOURE', 'Adja', 'woman.png', '2025-02-25 09:43:22', '2025-02-24 16:29:56', 'adoucoure', 0, 'Madame'),
(36, 'TECHER', 'Florian', 'man.png', '2025-02-25 09:44:30', '2025-02-24 16:29:56', 'ftecher', 0, 'Monsieur'),
(37, 'TURPIN', 'Brandon', 'man.png', '2025-02-25 09:46:35', '2025-02-24 16:29:56', 'bturpin', 0, 'Monsieur'),
(38, 'VILAIN', 'Simon', 'man.png', '2025-02-25 09:51:17', '2025-02-25 09:51:17', 'svilan', 0, 'Monsieur'),
(39, 'COURTOIS', 'James', 'man.png', '2025-02-25 09:52:19', '2025-02-24 16:29:56', 'jcourtois', 0, 'Monsieur'),
(40, 'AGBOVI', 'Rolande', 'woman.png', '2025-02-25 10:08:42', '2025-02-24 16:29:56', 'ragbovi', 0, 'Madame'),
(41, 'CHARBONNEL', 'Louane', 'woman.png', '2025-02-25 10:09:31', '2025-02-24 16:29:56', 'lcharbonnel', 0, 'Madame'),
(42, 'DEDINGER', 'Fallone', 'woman.png', '2025-02-25 10:10:12', '2025-02-24 16:29:56', 'mcapelle', 0, 'Madame'),
(43, 'VERRIER', 'Laura', 'woman.png', '2025-02-25 10:11:11', '2025-02-24 16:29:56', 'mverrier', 0, 'Madame'),
(44, 'ARIAPOUTRI', 'Adeline', 'woman.png', '2025-02-25 10:14:51', '2025-02-24 16:29:56', 'aariapoutri', 0, 'Madame'),
(45, 'ARZUR', 'Lola', 'woman.png', '2025-02-25 10:15:50', '2025-02-24 16:29:56', 'larzur', 0, 'Madame'),
(46, 'CARIOU', 'Youn', 'man.png', '2025-02-25 10:16:32', '2025-02-24 16:29:56', 'ycariou', 0, 'Monsieur'),
(47, 'DESJARS', 'Anna', 'woman.png', '2025-02-25 10:17:12', '2025-02-24 16:29:56', 'adesjars', 0, 'Madame'),
(48, 'GUEZOUL', 'Myriam', 'woman.png', '2025-02-25 10:17:54', '2025-02-24 16:29:56', 'mguezoul', 0, 'Madame'),
(49, 'PERRUCHON', 'JORDANE', 'man.png', '2025-02-25 10:18:42', '2025-02-24 16:29:56', 'jperruchon', 0, 'Monsieur'),
(50, 'VARBEDJIAN', 'Thaïs', 'woman.png', '2025-02-25 10:19:50', '2025-02-24 16:29:56', 'tvarbedjian', 0, 'Madame'),
(51, 'FAUCHARD', 'Corinne', 'woman.png', '2025-02-25 10:20:44', '2025-02-24 16:29:56', 'cfauchard', 0, 'Madame'),
(52, 'LACOINTE', 'Christian', 'man.png', '2025-02-25 10:21:21', '2025-02-24 16:29:56', 'clacointe', 0, 'Monsieur'),
(53, 'LAPUJADE', 'Alice', 'woman.png', '2025-02-25 10:21:56', '2025-02-24 16:29:56', 'alapujade', 0, 'Madame'),
(54, 'WALTER', 'Léa', 'woman.png', '2025-02-25 10:24:57', '2025-02-24 16:29:56', 'lwalter', 0, 'Madame'),
(55, 'COMMEAU', 'Cédric', 'man.png', '2025-02-25 10:26:20', '2025-02-24 16:29:56', 'ccommeau', 0, 'Monsieur'),
(56, 'E2ZOUbI', 'Sanah', 'woman.png', '2025-02-25 10:27:07', '2025-02-24 16:29:56', 'sezzoubi', 0, 'Madame'),
(57, 'GOMES', 'Olivier', 'man.png', '2025-02-25 10:28:15', '2025-02-24 16:29:56', 'ogomes', 0, 'Monsieur'),
(58, 'MAKAYA', 'Henri', 'man.png', '2025-02-25 10:29:03', '2025-02-24 16:29:56', 'hmakaya', 0, 'Monsieur'),
(59, 'TETEGAN', 'Martine', 'woman.png', '2025-02-25 10:58:21', '2025-02-24 16:29:56', 'mtetegan', 0, 'Madame'),
(60, 'OZEE', 'Anne-Cécile', 'woman.png', '2025-02-25 17:00:28', '2025-02-24 16:29:56', 'acozee', 0, 'Madame'),
(61, 'ROELS', 'Catherine', 'woman.png', '2025-02-25 17:15:57', '2025-02-24 16:29:56', 'croels', 0, 'Madame'),
(62, 'DENDENIS', 'Zoubida', 'woman.png', '2025-02-25 17:22:42', '2025-02-25 17:22:42', 'zdendenis', 0, 'Madame'),
(63, 'RAAD', 'Nora', 'woman.png', '2025-02-25 17:26:31', '2025-02-25 17:26:31', 'nraad', 0, 'Madame'),
(64, 'DENDENIS', 'Issam', 'woman.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'idendenis', 0, 'Madame'),
(65, 'BOZIN', 'Theodore', 'man.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'tbozin', 0, 'Monsieur'),
(66, 'SILBERSTEIN', 'André', 'man.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'asilberstein', 0, 'Monsieur'),
(67, 'GUYOT', 'Grégory', 'man.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'gguyot', 0, 'Monsieur'),
(68, 'SIMONNET', 'Laure', 'woman.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'lsimonnet', 0, 'Madame'),
(69, 'STROMENGER', 'Anne-Catherine', 'woman.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'acstromenger', 0, 'Madame'),
(70, 'RIOU', 'Nicole', 'woman.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'nriou', 0, 'Madame'),
(71, 'CANY', 'Delphine', 'woman.png', '2025-02-25 19:26:08', '2025-02-25 19:26:08', 'dcany', 0, 'Madame'),
(72, 'FEVRIER', 'Leika', 'woman.png', NULL, '2025-03-16 18:57:20', 'lfevrier', 0, 'Madame'),
(73, 'VERDINO', 'Ernesto', 'man.png', NULL, '2025-03-16 18:59:23', 'everdino', 0, 'Monsieur'),
(76, 'MALLET', 'Clothilde', 'woman.png', NULL, '2025-03-26 20:45:26', 'cmallet', 0, 'Madame');

-- --------------------------------------------------------

--
-- Structure de la table `membre_event`
--

DROP TABLE IF EXISTS `membre_event`;
CREATE TABLE IF NOT EXISTS `membre_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `membre_id` int DEFAULT NULL,
  `produit_id` int DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D8805266A99F74A` (`membre_id`),
  KEY `IDX_8D880526F347EFB` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre_jeton`
--

DROP TABLE IF EXISTS `membre_jeton`;
CREATE TABLE IF NOT EXISTS `membre_jeton` (
  `id` int NOT NULL AUTO_INCREMENT,
  `membre_id` int DEFAULT NULL,
  `nombre_jeton` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B4E96BFA6A99F74A` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre_jeton`
--

INSERT INTO `membre_jeton` (`id`, `membre_id`, `nombre_jeton`) VALUES
(1, 1, 0),
(2, 2, 25),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 10),
(9, 9, 0),
(10, 10, 0),
(11, 11, 0),
(12, 12, 0),
(13, 13, 0),
(14, 14, 0),
(15, 15, 0),
(16, 16, 0),
(17, 17, 15),
(18, 18, 0),
(19, 19, 0),
(20, 20, 0),
(21, 21, 0),
(22, 22, 0),
(23, 23, 0),
(24, 24, 0),
(25, 25, 0),
(26, 26, 0),
(27, 27, 0),
(28, 28, 0),
(29, 29, 0),
(30, 30, 0),
(31, 31, 0),
(32, 32, 0),
(33, 33, 0),
(34, 34, 0),
(35, 35, 0),
(36, 36, 0),
(37, 37, 0),
(38, 38, 0),
(39, 39, 0),
(40, 40, 0),
(41, 41, 0),
(42, 42, 0),
(43, 43, 0),
(44, 44, 0),
(45, 45, 0),
(46, 46, 0),
(47, 47, 0),
(48, 48, 0),
(49, 49, 0),
(50, 50, 0),
(51, 51, 0),
(52, 52, 0),
(53, 53, 0),
(54, 54, 0),
(55, 55, 0),
(56, 56, 0),
(57, 57, 0),
(58, 58, 0),
(59, 59, 0),
(60, 60, 0),
(61, 61, 0),
(62, 62, 0),
(63, 63, 0),
(64, 64, 0),
(65, 65, 0),
(66, 66, 0),
(67, 67, 0),
(68, 68, 0),
(69, 69, 0),
(70, 70, 0),
(71, 71, 0),
(72, 72, 0),
(73, 73, 0),
(74, 76, 0);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `plat_id` int DEFAULT NULL,
  `fromage_id` int DEFAULT NULL,
  `dessert_id` int DEFAULT NULL,
  `entree_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7D053A93D73DB560` (`plat_id`),
  KEY `IDX_7D053A937FCE0491` (`fromage_id`),
  KEY `IDX_7D053A93745B52FD` (`dessert_id`),
  KEY `IDX_7D053A93AF7BD910` (`entree_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `plat_id`, `fromage_id`, `dessert_id`, `entree_id`) VALUES
(1, 2, 3, 2, 1),
(2, 3, 4, 1, 3),
(3, 4, 2, 3, 2),
(4, 2, 3, 1, 2),
(5, 4, 2, 2, 2),
(6, 5, 2, 1, 1),
(7, 7, 2, 1, 2),
(8, 6, 1, 5, 3),
(9, 2, 6, 7, 4),
(10, 4, 7, 9, 8),
(11, 9, 9, 4, 9),
(12, 5, 2, 5, 1),
(13, 1, 1, 3, 6),
(14, 7, 1, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `discrimination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `sujet`, `contenu`, `created_at`, `updated_at`, `discrimination`) VALUES
(1, 'test général', 'c\'est un test', '2025-03-23', NULL, 'messageGeneral'),
(2, 'Test guest', 'c\'est un test guest', '2025-03-23', NULL, 'messageGuest'),
(3, 'Commande', 'Service Sanitaire', '2025-03-23', NULL, 'messageForum'),
(4, 'Test prive', 'ceci est un message privé', '2025-03-23', NULL, 'messagePrive'),
(5, 'Test envoyes', 'j\'envois un message', '2025-03-23', NULL, 'messagePrive'),
(6, 'Test recus', 'je recois un message', '2025-03-23', NULL, 'messagePrive');

-- --------------------------------------------------------

--
-- Structure de la table `message_forum`
--

DROP TABLE IF EXISTS `message_forum`;
CREATE TABLE IF NOT EXISTS `message_forum` (
  `id` int NOT NULL,
  `expediteur_id` int NOT NULL,
  `thread_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7A8D412610335F61` (`expediteur_id`),
  KEY `IDX_7A8D4126E2904019` (`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message_forum`
--

INSERT INTO `message_forum` (`id`, `expediteur_id`, `thread_id`) VALUES
(3, 59, 1);

-- --------------------------------------------------------

--
-- Structure de la table `message_general`
--

DROP TABLE IF EXISTS `message_general`;
CREATE TABLE IF NOT EXISTS `message_general` (
  `id` int NOT NULL,
  `expediteur_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5EA10C4610335F61` (`expediteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message_general`
--

INSERT INTO `message_general` (`id`, `expediteur_id`) VALUES
(1, 59);

-- --------------------------------------------------------

--
-- Structure de la table `message_guest`
--

DROP TABLE IF EXISTS `message_guest`;
CREATE TABLE IF NOT EXISTS `message_guest` (
  `id` int NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message_guest`
--

INSERT INTO `message_guest` (`id`, `auteur`, `email`, `telephone`) VALUES
(2, 'julien', 'jujusilb@gmail.com', '0123456789');

-- --------------------------------------------------------

--
-- Structure de la table `message_prive`
--

DROP TABLE IF EXISTS `message_prive`;
CREATE TABLE IF NOT EXISTS `message_prive` (
  `id` int NOT NULL,
  `expediteur_id` int NOT NULL,
  `destinataire_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2DB3B2610335F61` (`expediteur_id`),
  KEY `IDX_2DB3B26A4F84F6E` (`destinataire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message_prive`
--

INSERT INTO `message_prive` (`id`, `expediteur_id`, `destinataire_id`) VALUES
(4, 7, 8),
(5, 7, 8),
(6, 8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eleve_id` int NOT NULL,
  `professeur_id` int NOT NULL,
  `matiere_id` int NOT NULL,
  `exercice_id` int DEFAULT NULL,
  `note` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coefficient` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CFBDFA14A6CC7B2` (`eleve_id`),
  KEY `IDX_CFBDFA14F46CD258` (`matiere_id`),
  KEY `IDX_CFBDFA1489D40298` (`exercice_id`),
  KEY `IDX_CFBDFA14BAB22EE9` (`professeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`id`, `eleve_id`, `professeur_id`, `matiere_id`, `exercice_id`, `note`, `created_at`, `updated_at`, `libelle`, `coefficient`) VALUES
(1, 41, 18, 7, NULL, 10, '2025-03-24 22:11:30', NULL, 'test', 2),
(2, 7, 4, 9, NULL, 15, '2025-03-24 22:11:30', NULL, 'test2', 5),
(3, 35, 3, 5, NULL, 3, '2025-03-24 22:11:30', NULL, 'test3', 1),
(4, 50, 5, 5, NULL, 16, '2025-03-24 22:11:30', NULL, 'test4', 1),
(5, 55, 14, 7, NULL, 1, '2025-03-24 22:11:30', NULL, 'test5', 3),
(6, 9, 18, 6, NULL, 5, '2025-03-24 22:11:30', NULL, 'test6', 1),
(7, 29, 19, 5, NULL, 10, '2025-03-24 22:11:30', NULL, 'test7', 3),
(8, 35, 21, 5, NULL, 9, '2025-03-24 22:11:30', NULL, 'test8', 4),
(9, 30, 18, 6, NULL, 11, '2025-03-24 22:11:30', NULL, 'test9', 1),
(10, 45, 20, 1, NULL, 12, '2025-03-24 22:11:30', NULL, 'test10', 1),
(11, 51, 19, 4, NULL, 7, '2025-03-24 22:12:30', NULL, 'test11', 2),
(12, 56, 14, 5, NULL, 13, '2025-03-24 09:11:30', NULL, 'test12', 4);

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `statut_ouvrage_id` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_52A8CBD8601389BC` (`statut_ouvrage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `statut_ouvrage_id`, `titre`) VALUES
(1, 4, 'Le journal d\'Anne Frank'),
(2, 4, 'Rendez-vous avec Rama'),
(3, 4, 'Un sac de billes'),
(4, 4, 'Le petit chaperon rouge'),
(5, 4, 'My First English Book'),
(6, 4, 'Dune'),
(7, 4, 'Cendrille'),
(8, 3, 'Harry Potter à lécole des sorcier'),
(9, 3, 'Harry Potter et la chambre des secrets'),
(10, 5, 'Harry Potter et le prisonnier d\'Azkaban'),
(11, 5, 'Harry Potter et la coupe de feu'),
(12, 4, 'Harry Potter et l\'ordre du phoénix'),
(13, 4, 'Harry Potter et le prince de sang-mélé'),
(14, 4, 'Harry Potter et les reliques de la mort');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage_categorie_ouvrage`
--

DROP TABLE IF EXISTS `ouvrage_categorie_ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage_categorie_ouvrage` (
  `ouvrage_id` int NOT NULL,
  `categorie_ouvrage_id` int NOT NULL,
  PRIMARY KEY (`ouvrage_id`,`categorie_ouvrage_id`),
  KEY `IDX_A014510C15D884B5` (`ouvrage_id`),
  KEY `IDX_A014510C8B114E19` (`categorie_ouvrage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ouvrage_categorie_ouvrage`
--

INSERT INTO `ouvrage_categorie_ouvrage` (`ouvrage_id`, `categorie_ouvrage_id`) VALUES
(1, 4),
(1, 6),
(1, 8),
(2, 5),
(3, 4),
(3, 6),
(3, 8),
(4, 11),
(5, 1),
(5, 2),
(6, 5),
(7, 4),
(7, 11),
(7, 18),
(8, 9),
(8, 11),
(9, 9),
(9, 11),
(10, 9),
(10, 11),
(11, 9),
(11, 11),
(12, 9),
(12, 11),
(13, 9),
(13, 11),
(14, 9),
(14, 11);

-- --------------------------------------------------------

--
-- Structure de la table `parent_eleve`
--

DROP TABLE IF EXISTS `parent_eleve`;
CREATE TABLE IF NOT EXISTS `parent_eleve` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parent_eleve`
--

INSERT INTO `parent_eleve` (`id`) VALUES
(66),
(70);

-- --------------------------------------------------------

--
-- Structure de la table `parent_eleve_eleve`
--

DROP TABLE IF EXISTS `parent_eleve_eleve`;
CREATE TABLE IF NOT EXISTS `parent_eleve_eleve` (
  `parent_eleve_id` int NOT NULL,
  `eleve_id` int NOT NULL,
  PRIMARY KEY (`parent_eleve_id`,`eleve_id`),
  KEY `IDX_98ED0A6E95A16B63` (`parent_eleve_id`),
  KEY `IDX_98ED0A6EA6CC7B2` (`eleve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parent_eleve_eleve`
--

INSERT INTO `parent_eleve_eleve` (`parent_eleve_id`, `eleve_id`) VALUES
(66, 7),
(70, 7);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id` int NOT NULL,
  `date_embauche` date NOT NULL,
  `poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `date_embauche`, `poste`) VALUES
(2, '2021-02-10', '0146780100'),
(3, '2025-02-10', '0146780100'),
(4, '2025-04-08', '0146780100'),
(5, '2023-03-12', '0146780100'),
(6, '2025-10-16', '0146780100'),
(13, '2025-03-10', '0146780100'),
(14, '2026-09-15', '0146780100'),
(15, '2028-10-14', '0146780100'),
(16, '2027-10-17', '0146780100'),
(18, '2027-10-14', '0146780100'),
(19, '2029-09-18', '0146780100'),
(20, '2028-09-15', '0146780100'),
(21, '2025-09-16', '0146780100'),
(22, '2027-09-17', '0146780100'),
(23, '2029-08-16', '0146780100'),
(24, '2025-10-16', '0146780100'),
(25, '2025-10-16', '0146780100'),
(26, '2025-10-16', '0146780100'),
(59, '2025-10-16', '0146780100'),
(60, '2025-10-16', '0146780100'),
(61, '2025-10-16', '0146780100'),
(62, '2023-06-13', '0146780100'),
(63, '2025-04-03', '0146780100'),
(64, '2026-08-12', '0146780100'),
(65, '2021-09-12', '0146780100'),
(66, '2024-07-16', '0146780100'),
(67, '2023-05-02', '0146780100'),
(68, '2025-10-16', '0146780100'),
(69, '2025-10-16', '0146780100'),
(71, '2025-10-16', '0146780100'),
(76, '2026-08-13', '0146780100');

-- --------------------------------------------------------

--
-- Structure de la table `personnel_pole`
--

DROP TABLE IF EXISTS `personnel_pole`;
CREATE TABLE IF NOT EXISTS `personnel_pole` (
  `personnel_id` int NOT NULL,
  `pole_id` int NOT NULL,
  PRIMARY KEY (`personnel_id`,`pole_id`),
  KEY `IDX_364A56901C109075` (`personnel_id`),
  KEY `IDX_364A5690419C3385` (`pole_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnel_pole`
--

INSERT INTO `personnel_pole` (`personnel_id`, `pole_id`) VALUES
(2, 3),
(2, 4),
(3, 4),
(4, 4),
(5, 3),
(5, 4),
(14, 4),
(18, 3),
(19, 4),
(20, 2),
(20, 3),
(20, 4),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(76, 3);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `viande_id` int NOT NULL,
  `legume_id` int NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2038A2074C61F684` (`viande_id`),
  KEY `IDX_2038A20725F18E37` (`legume_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `viande_id`, `legume_id`, `libelle`) VALUES
(1, 1, 1, 'Boeuf Bourguignon - pates'),
(2, 3, 5, 'Steak haché - Frites'),
(3, 4, 4, 'Cordon Bleu - Purée'),
(4, 2, 2, 'Escalope pané - Endives'),
(5, 3, 3, 'Steak haché - Ratatouille'),
(6, 8, 8, 'Canard laqué Pommes dauphine'),
(7, 3, 10, 'Steak haché riz'),
(8, 9, 5, 'Brochette Frites'),
(9, 10, 9, 'Croque monsieur Ebly'),
(10, 5, 7, 'pilon de poulet Lentilles Vertes');

-- --------------------------------------------------------

--
-- Structure de la table `pole`
--

DROP TABLE IF EXISTS `pole`;
CREATE TABLE IF NOT EXISTS `pole` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pole`
--

INSERT INTO `pole` (`id`, `libelle`) VALUES
(1, 'Général'),
(2, 'Accompagnement'),
(3, 'Kiné'),
(4, 'Tertiaire');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categorie_produit_id` int NOT NULL,
  `libelle` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `archive` tinyint(1) NOT NULL,
  `date_event` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC2791FDB457` (`categorie_produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `categorie_produit_id`, `libelle`, `prix`, `description`, `stock`, `created_at`, `archive`, `date_event`) VALUES
(2, 1, 'Jetons Repas', 4, 'Sert à commander des repas', '100', '2025-02-27', 0, NULL),
(3, 2, 'Boite à os', 150, 'Sert au étudient Kiné', '50', '2025-02-27', 0, NULL),
(4, 4, 'Angleterre', 200, 'Séjour de 4jours', '10', '2025-02-27', 0, NULL),
(5, 3, 'Tombola de noël', 2, 'Nombreux lot à gagner', '70', '2025-02-27', 0, NULL),
(6, 2, 'blouse', 50, 'Habillement pour Kiné', '50', '2025-02-27', 0, NULL),
(7, 4, 'Allemagne', 0, 'Séjour à Marbourg', '4', '2025-02-27', 0, NULL),
(8, 3, 'Tombola Octobre Rose', 2, 'Nombreux lots à gagner !', '100', '2025-02-27', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`) VALUES
(2),
(3),
(4),
(5),
(14),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(76);

-- --------------------------------------------------------

--
-- Structure de la table `professeur_matiere`
--

DROP TABLE IF EXISTS `professeur_matiere`;
CREATE TABLE IF NOT EXISTS `professeur_matiere` (
  `professeur_id` int NOT NULL,
  `matiere_id` int NOT NULL,
  PRIMARY KEY (`professeur_id`,`matiere_id`),
  KEY `IDX_FBC82ABCBAB22EE9` (`professeur_id`),
  KEY `IDX_FBC82ABCF46CD258` (`matiere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur_matiere`
--

INSERT INTO `professeur_matiere` (`professeur_id`, `matiere_id`) VALUES
(2, 3),
(3, 5),
(4, 5),
(5, 4),
(14, 2),
(14, 12),
(18, 6),
(19, 11),
(20, 1),
(25, 13);

-- --------------------------------------------------------

--
-- Structure de la table `professionnel`
--

DROP TABLE IF EXISTS `professionnel`;
CREATE TABLE IF NOT EXISTS `professionnel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `entreprise_id` int DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7A28C10FA4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professionnel`
--

INSERT INTO `professionnel` (`id`, `entreprise_id`, `nom`, `prenom`, `email`, `telephone`, `profession`) VALUES
(1, 1, 'LOUVRIER', 'Bertrand', 'blouvrier@gmail.com', '0123456789', 'Attaché'),
(2, 1, 'LOISEAU', 'Marie', 'mloiseau@gmail.com', '0123456789', 'Référent Handicap'),
(3, 1, 'BLOUVI', 'Grégoire', 'gblouvi@gmail.com', '0123456789', 'DRH'),
(4, 2, 'GASCON', 'Lionel', 'lgascon@gmail.com', '0123456789', 'Développeur'),
(5, 2, 'BINGO', 'Philippe', 'pbingo@gmail.com', '0123456789', 'Référent Handicap'),
(6, 2, 'Dupuis', 'Jérome', 'jdupuis@gmail.com', '0123456789', 'DRH'),
(7, 3, 'PAGE', 'LARRY', 'lpage@google.com', '0015551234', 'VRP'),
(8, 3, 'De la Soupe de Coquillette', 'Marguerite', 'mdlsdcoquillette@gmail.com', '0123456789', 'DRH'),
(9, 3, 'BLAGUE', 'Jonathan', 'jblague@gmail.com', '0123456789', 'Référent Handicap'),
(10, 4, 'Dugour', 'Gaëtan', 'gdugour@gmail.com', '0123456789', 'DRH'),
(11, 4, 'Delaveine', 'Vladimir', 'vdelaveine@gmail.com', '0123456789', 'Référent Handicap'),
(12, 4, 'CROISILLE', 'Claire', 'ccoisille@gmail.com', '0123456789', 'Guide'),
(13, 5, 'MICHELOT', 'Charlotte', 'cmichelot@gmail.com', '0123456789', 'Développeur'),
(14, 5, 'DINGUET', 'Manon', 'mdinguet@gmail.com', '0123456789', 'referent Handicap'),
(15, 5, 'PLOUTOKF', 'Igor', 'iploutokf@gmail.com', '0123456789', 'DRH'),
(16, 6, 'NIACK', 'Jean-Paul', 'jpniack@gmail.com', '0123456789', 'Vendeur'),
(17, 6, 'MULETON', 'Michel', 'mmuleton@gmail.com', '0123456789', 'Référent Handicap'),
(18, 6, 'AZSWICK', 'Jacob', 'jazswick@gmail.com', '0123456789', 'DRH'),
(19, 7, 'PLYMNE', 'David', 'dplymne@gmail.com', '0123456789', 'VRP'),
(20, 7, 'VLICK', 'Therese', 'tvlick@gmail.com', '0123456789', 'DRH'),
(21, 7, 'FRANCK', 'Marie-Noëlle', 'mnfranck@gmail.com', '0123456789', 'Référent Handicap'),
(22, 8, 'MARTIN', 'Julien', 'jmartin@gmail.com', '0123456789', 'Référent Handicap'),
(23, 8, 'HOUILLE', 'Jacques', 'jhouille@gmail.com', '0123456789', 'DRH'),
(24, 8, 'DERMAN', 'Nicole', 'nderman@gmail.com', '0123456789', 'Secrétaire'),
(25, 9, 'CHOPINE', 'Arnaud', 'achopine@gmail.com', '0123456789', 'DRH'),
(26, 9, 'RETULIN', 'Holly', 'hretulin@gmail.com', '0123456789', 'Développeur'),
(27, 9, 'ZERBIB', 'Charles', 'czerbib@gmail.com', '0123456789', 'Référent Handicap'),
(28, 10, 'MALIN', 'Paco', 'pmalin@gmail.com', '0123456789', 'Référent Handicap'),
(29, 10, 'TROUBADIN', 'John', 'jtroubadin@gmail.com', '0123456789', 'Cuisinier'),
(30, 10, 'CLICCEUR', 'Karl', 'kclicceur@gmail.com', '0123456789', 'DRH');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `professeur_id` int NOT NULL,
  `matiere_id` int NOT NULL,
  `promotion_id` int NOT NULL,
  PRIMARY KEY (`professeur_id`,`matiere_id`,`promotion_id`),
  KEY `IDX_3DDCB9FFBAB22EE9` (`professeur_id`),
  KEY `IDX_3DDCB9FFF46CD258` (`matiere_id`),
  KEY `IDX_3DDCB9FF139DF194` (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `programme`
--

INSERT INTO `programme` (`professeur_id`, `matiere_id`, `promotion_id`) VALUES
(2, 3, 1),
(2, 3, 2),
(2, 3, 3),
(2, 3, 4),
(2, 3, 5),
(2, 3, 6),
(2, 3, 7),
(2, 3, 8),
(2, 3, 9),
(2, 3, 10),
(2, 3, 11),
(3, 5, 4),
(4, 5, 5),
(5, 4, 1),
(5, 4, 2),
(5, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pole_id` int NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C11D7DD1419C3385` (`pole_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `pole_id`, `libelle`) VALUES
(1, 4, 'Pmt1'),
(2, 4, 'Pmt2'),
(3, 4, 'CRCD'),
(4, 4, 'DA1'),
(5, 4, 'DA2'),
(6, 3, 'PmK'),
(7, 3, 'K1'),
(8, 3, 'K2'),
(9, 3, 'K3'),
(10, 3, 'K4'),
(11, 3, 'K5');

-- --------------------------------------------------------

--
-- Structure de la table `remplir_exo`
--

DROP TABLE IF EXISTS `remplir_exo`;
CREATE TABLE IF NOT EXISTS `remplir_exo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `note` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `prix` double NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A8D351B3CCD7E912` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id`, `menu_id`, `prix`, `date`, `heure`) VALUES
(1, 4, 4.5, '2025-03-09', 'Midi'),
(2, 4, 4.5, '2025-02-11', 'Midi'),
(3, 1, 4.5, '2025-02-20', 'Midi'),
(4, 5, 4.5, '2025-02-26', 'Midi'),
(5, 3, 4.5, '2025-03-03', 'Midi'),
(6, 4, 4.5, '2025-03-11', 'Midi'),
(7, 1, 4.5, '2025-03-19', 'Midi'),
(8, 5, 4.5, '2025-03-04', 'Midi'),
(9, 2, 4.5, '2025-03-21', 'Midi'),
(10, 8, 4.5, '2023-04-10', 'Midi');

-- --------------------------------------------------------

--
-- Structure de la table `reservation_repas`
--

DROP TABLE IF EXISTS `reservation_repas`;
CREATE TABLE IF NOT EXISTS `reservation_repas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `repas_id` int NOT NULL,
  `membre_id` int NOT NULL,
  `date_achat` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EBAC81141D236AAA` (`repas_id`),
  KEY `IDX_EBAC81146A99F74A` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation_repas`
--

INSERT INTO `reservation_repas` (`id`, `repas_id`, `membre_id`, `date_achat`) VALUES
(1, 1, 4, '2025-02-24'),
(2, 5, 4, '2025-02-24'),
(3, 3, 17, '2025-02-25'),
(4, 1, 17, '2025-02-25'),
(5, 4, 17, '2025-02-25');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etage_id` int NOT NULL,
  `promo_principale_id` int DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4E977E5C56BDB169` (`promo_principale_id`),
  KEY `IDX_4E977E5C984CE93F` (`etage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `etage_id`, `promo_principale_id`, `libelle`) VALUES
(1, 1, NULL, 'Pmt1'),
(2, 1, NULL, 'Pmt2'),
(3, 1, NULL, 'CRCD'),
(4, 1, NULL, 'DA1'),
(5, 1, NULL, 'DA2'),
(6, 1, NULL, 'Gymnase'),
(7, 2, NULL, 'DOTTE'),
(8, 2, NULL, 'GANTET'),
(9, 2, NULL, 'FOUCAULT'),
(10, 2, NULL, 'DOLTO'),
(11, 2, NULL, 'IMBERT'),
(12, 3, NULL, 'Polyvalente');

-- --------------------------------------------------------

--
-- Structure de la table `salle_promotion`
--

DROP TABLE IF EXISTS `salle_promotion`;
CREATE TABLE IF NOT EXISTS `salle_promotion` (
  `salle_id` int NOT NULL,
  `promotion_id` int NOT NULL,
  PRIMARY KEY (`salle_id`,`promotion_id`),
  KEY `IDX_26B91181DC304035` (`salle_id`),
  KEY `IDX_26B91181139DF194` (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `secretariat`
--

DROP TABLE IF EXISTS `secretariat`;
CREATE TABLE IF NOT EXISTS `secretariat` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secretariat`
--

INSERT INTO `secretariat` (`id`) VALUES
(15),
(59),
(71);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `responsable_id` int DEFAULT NULL,
  `stagiaire_id` int NOT NULL,
  `entreprise_id` int DEFAULT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_fin` date NOT NULL,
  `date_debut` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C27C936953C59D72` (`responsable_id`),
  KEY `IDX_C27C9369BBA93DD6` (`stagiaire_id`),
  KEY `IDX_C27C9369A4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statut_emprunt`
--

DROP TABLE IF EXISTS `statut_emprunt`;
CREATE TABLE IF NOT EXISTS `statut_emprunt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statut_emprunt`
--

INSERT INTO `statut_emprunt` (`id`, `libelle`) VALUES
(1, 'Emprunt demandé'),
(2, 'Emprunt en Cours'),
(3, 'Ouvrage rendu');

-- --------------------------------------------------------

--
-- Structure de la table `statut_ouvrage`
--

DROP TABLE IF EXISTS `statut_ouvrage`;
CREATE TABLE IF NOT EXISTS `statut_ouvrage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statut_ouvrage`
--

INSERT INTO `statut_ouvrage` (`id`, `libelle`) VALUES
(1, 'Souhaité'),
(2, 'Commandé'),
(3, 'Disponible'),
(4, 'Emprunt demandé'),
(5, 'Emprunt en cours');

-- --------------------------------------------------------

--
-- Structure de la table `sub_forum`
--

DROP TABLE IF EXISTS `sub_forum`;
CREATE TABLE IF NOT EXISTS `sub_forum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categorie_forum_id` int DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_696FDA74114BFBBA` (`categorie_forum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_forum`
--

INSERT INTO `sub_forum` (`id`, `categorie_forum_id`, `libelle`, `description`) VALUES
(1, 1, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(2, 1, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(3, 1, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(4, 1, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(5, 2, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(6, 2, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(7, 2, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(8, 2, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(9, 3, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(10, 3, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(11, 3, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(12, 3, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(13, 4, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(14, 4, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(15, 4, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(16, 4, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(17, 5, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(18, 5, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(19, 5, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(20, 5, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(21, 6, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(22, 6, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(23, 6, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(24, 6, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(25, 7, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(26, 7, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(27, 7, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(28, 7, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(29, 8, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(30, 8, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(31, 8, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(32, 8, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(33, 9, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(34, 9, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(35, 9, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(36, 9, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(37, 10, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(38, 10, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(39, 10, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(40, 10, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(41, 11, 'Emploi du temps', 'Discussions sur les emplois du temps, les changements d\'horaires et les questions liées à l\'organisation des cours.'),
(42, 11, 'Supports de cours', 'Partage de supports de cours, de documents pédagogiques et de ressources utiles pour les étudiants.'),
(43, 11, 'Devoirs et examens', 'Discussions sur les devoirs, les examens, les modalités d\'évaluation et les conseils pour réussir.'),
(44, 11, 'Projets de groupe', 'Organisation des projets de groupe, répartition des tâches, coordination et partage des informations.'),
(45, 12, 'Club de théâtre', 'Discussions sur les répétitions, les pièces de théâtre, les costumes et les événements liés au club de théâtre.'),
(46, 12, 'Club de musique', 'Discussions sur les instruments, les partitions, les concerts et les activités du club de musique.'),
(47, 12, 'Club de danse', 'Discussions sur les chorégraphies, les costumes, les spectacles et les événements du club de danse.'),
(48, 12, 'Club d\'arts plastiques', 'Discussions sur les techniques, les matériaux, les expositions et les projets du club d\'arts plastiques.'),
(49, 12, 'Club de cinéma', 'Discussions sur les films, les réalisateurs, les projections et les activités du club de cinéma.'),
(50, 13, 'Entraînements', 'Discussions sur les horaires, les techniques et les conseils pour les entraînements de judo.'),
(51, 13, 'Compétitions', 'Discussions sur les compétitions, les résultats et les informations pratiques pour les participants.'),
(52, 13, 'Techniques de judo', 'Discussions sur les techniques de judo, les mouvements et les conseils pour progresser.'),
(53, 13, 'Matériel de judo', 'Discussions sur les kimonos, les ceintures et les autres équipements nécessaires pour la pratique du judo.'),
(54, 13, 'Actualités du judo', 'Partage d\'articles, de vidéos et d\'informations sur les événements et les actualités du monde du judo.'),
(55, 14, 'Entraînements', 'Discussions sur les horaires, les techniques et les conseils pour les entraînements de Taiso.'),
(56, 14, 'Techniques de Taiso', 'Discussions sur les techniques de Taiso, les mouvements et les conseils pour progresser.'),
(57, 14, 'Matériel de Taiso', 'Discussions sur les vêtements, les tapis et les autres équipements nécessaires pour la pratique du Taiso.'),
(58, 14, 'Bienfaits du Taiso', 'Discussions sur les bienfaits du Taiso pour la santé physique et mentale.'),
(59, 14, 'Actualités du Taiso', 'Partage d\'articles, de vidéos et d\'informations sur les événements et les actualités du monde du Taiso.'),
(60, 15, 'Techniques de massage', 'Discussions sur les différentes techniques de massage et les conseils pour les pratiquer.'),
(61, 15, 'Matériel de massage', 'Discussions sur les huiles, les tables de massage et les autres équipements nécessaires pour les massages.'),
(62, 15, 'Bienfaits du massage', 'Discussions sur les bienfaits du massage pour la relaxation, la détente et la santé.'),
(63, 15, 'Organisation des soirées massage', 'Organisation des soirées massage, inscription et partage des informations pratiques.'),
(64, 15, 'Actualités du massage', 'Partage d\'articles, de vidéos et d\'informations sur les événements et les actualités du monde du massage.'),
(65, 16, 'Retours de stage par secteur', 'Partage des expériences de stage par secteur d\'activité.'),
(66, 16, 'Conseils pour les entretiens de stage', 'Conseils et astuces pour réussir les entretiens de stage.'),
(67, 16, 'Modèles de CV et de lettres de motivation', 'Partage de modèles de CV et de lettres de motivation pour les stages.'),
(68, 16, 'Offres de stage', 'Publication des offres de stage disponibles.'),
(69, 16, 'Questions administratives (conventions, etc.)', 'Questions et réponses sur les démarches administratives liées aux stages.'),
(70, 17, 'Brainstorming', 'Espace pour partager des idées de création d\'entreprise.'),
(71, 17, 'Études de marché', 'Discussions sur les études de marché et les analyses de la concurrence.'),
(72, 17, 'Financement', 'Conseils et informations sur les différentes sources de financement pour les projets d\'entreprise.'),
(73, 17, 'Aspects juridiques', 'Questions et réponses sur les aspects juridiques de la création d\'entreprise.'),
(74, 17, 'Partage de ressources utiles', 'Partage de ressources utiles pour les entrepreneurs en herbe.'),
(75, 18, 'Offres d\'emploi', 'Publication des offres d\'emploi disponibles.'),
(76, 18, 'Demandes d\'emploi', 'Publication des demandes d\'emploi.'),
(77, 18, 'Services proposés', 'Publication des services proposés par les membres.'),
(78, 18, 'Objets à vendre/donner', 'Publication des objets à vendre ou à donner.'),
(79, 18, 'Logements à louer/partager', 'Publication des offres et demandes de logements.'),
(80, 19, 'Règlement intérieur', 'Discussions sur le règlement intérieur de l\'école et les questions liées à la vie quotidienne.'),
(81, 19, 'Activités et événements', 'Annonces et discussions sur les activités et événements organisés par l\'école.'),
(82, 19, 'Repas et menus', 'Discussions sur les repas servis à la cantine et les suggestions de menus.'),
(83, 19, 'Ambiance et vie quotidienne', 'Discussions sur l\'ambiance générale de l\'école et les questions liées à la vie quotidienne.'),
(84, 19, 'Suggestions d\'amélioration', 'Suggestions d\'amélioration pour l\'école et son fonctionnement.'),
(85, 20, 'Annonces des nouveaux arrivants', 'Présentation des nouveaux arrivants et partage des informations pratiques.'),
(86, 20, 'Pot de départ', 'Organisation des pots de départ et partage des souvenirs.'),
(87, 20, 'Cadeaux et souvenirs', 'Partage des idées de cadeaux et de souvenirs pour les personnes qui quittent l\'école.'),
(88, 20, 'Coordonnées des anciens élèves', 'Partage des coordonnées des anciens élèves pour garder le contact.'),
(89, 20, 'Réseau des anciens élèves', 'Discussions sur le réseau des anciens élèves et les opportunités de carrière.'),
(90, 21, 'Planning des travaux', 'Informations sur le planning des travaux en cours ou à venir.'),
(91, 21, 'Impact sur la vie quotidienne', 'Discussions sur l\'impact des travaux sur la vie quotidienne des élèves et du personnel.'),
(92, 21, 'Sécurité', 'Questions et réponses sur la sécurité pendant les travaux.'),
(93, 21, 'Suggestions d\'amélioration', 'Suggestions d\'amélioration pour les travaux et leur organisation.'),
(94, 21, 'Questions administratives', 'Questions et réponses sur les démarches administratives liées aux travaux.'),
(95, 22, 'Actualités syndicales', 'Informations sur les actualités syndicales et les actions en cours.'),
(96, 22, 'Droits et devoirs', 'Questions et réponses sur les droits et devoirs des employés.'),
(97, 22, 'Négociations en cours', 'Informations sur les négociations en cours avec la direction.'),
(98, 22, 'Questions administratives', 'Questions et réponses sur les démarches administratives liées au syndicat.'),
(99, 22, 'Partage de ressources utiles', 'Partage de ressources utiles pour les employés et les représentants syndicaux.'),
(100, 23, 'Organisation des apéros', 'Organisation des apéros entre collègues et partage des informations pratiques.'),
(101, 23, 'Suggestions de lieux et de thèmes', 'Suggestions de lieux et de thèmes pour les apéros.'),
(102, 23, 'Photos des apéros précédents', 'Partage des photos des apéros précédents.'),
(103, 23, 'Covoiturage', 'Organisation du covoiturage entre collègues.'),
(104, 23, 'Humour et détente', 'Partage de blagues, de vidéos et de moments de détente entre collègues.'),
(105, 24, 'Présentation des projets', 'Présentation des projets en cours et à venir.'),
(106, 24, 'Brainstorming', 'Espace pour partager des idées et des suggestions pour les projets.'),
(107, 24, 'Suivi de l\'avancement', 'Suivi de l\'avancement des projets et partage des informations pratiques.'),
(108, 24, 'Partage de ressources utiles', 'Partage de ressources utiles pour les projets.'),
(109, 24, 'Questions administratives', 'Questions et réponses sur les démarches administratives liées aux projets.'),
(110, 25, 'Annonces de la DRH', 'Publication des annonces de la DRH.'),
(111, 25, 'Questions administratives', 'Questions et réponses sur les démarches administratives liées à la DRH.'),
(112, 25, 'Conseils pour les entretiens', 'Conseils et astuces pour réussir les entretiens avec la DRH.'),
(113, 25, 'Offres d\'emploi internes', 'Publication des offres d\'emploi internes.'),
(114, 25, 'Partage de ressources utiles', 'Partage de ressources utiles pour les employés et la DRH.');

-- --------------------------------------------------------

--
-- Structure de la table `surveillant`
--

DROP TABLE IF EXISTS `surveillant`;
CREATE TABLE IF NOT EXISTS `surveillant` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `surveillant`
--

INSERT INTO `surveillant` (`id`) VALUES
(63),
(64);

-- --------------------------------------------------------

--
-- Structure de la table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE IF NOT EXISTS `thread` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sub_forum_id` int DEFAULT NULL,
  `createur_id` int DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_31204C8393635489` (`sub_forum_id`),
  KEY `IDX_31204C8373A201E5` (`createur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `thread`
--

INSERT INTO `thread` (`id`, `sub_forum_id`, `createur_id`, `libelle`, `description`, `created_at`) VALUES
(1, 1, 7, 'Fil de discussion test', 'On essaie de tester', '2025-03-23 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discrimination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `discrimination`) VALUES
(1, 'jdoe@guinot.asso.fr', '[]', 'mdp', 'membre'),
(2, 'snait-kaci@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$iVeHiKfv3HjP..OypLwVq.FykAKEm7KHtclRT1.ojPnJPwv/qPkPi', 'professeur'),
(3, 'glevy@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$ARpexx1ZkMWoQIC3H/MMpu/dTHGRHjAYQ/1LfFmzouQMKIaSOTTki', 'professeur'),
(4, 'ipalakot@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$RYgfJkanNBvCy9zdlSuueO1j8pfFQKs6roOKntr4HfClKikFIq9fm', 'professeur'),
(5, 'eschaff@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$BnXJzTitpXU4QJqKFM9me.r4RMFugeNtDH3mAEz1hfRfv1J1uNtnq', 'professeur'),
(6, 'vviala@guinot.asso.fr', '[\"ROLE_ADMIN\"]', '$2y$13$dx2ZPEIMNBIl/w6cvfpo/u3.R02MsmbNl.TXNc/1LhRP4JPh1d802', 'admin'),
(7, 'jsilberstein@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$B9MJme0lH0PQ9xokAxayQODuNfJScRJOPxm1nIomfuTA616nYDswa', 'eleve'),
(8, 'adreche@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$nu2js7hKqe2jxPpX93.CYubyN42nfP0nxOcaQ12d2d4PG79VOpxpK', 'eleve'),
(9, 'mlnoel@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$5dYfF4zX8Zu/sn1/VMRwsuTrEhU3LxR5ZLeoAlErYPsmCCkFpQ3rC', 'eleve'),
(10, 'amarie@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$HlqHPoF49YyQYdNYBp7r.u3AJICCYHZkmnoqnh2iZgiy/TGZzeXS.', 'eleve'),
(11, 'cdubois@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$oL3bx12snVgqPWRBJWVcSO9cCMV14CeO0zu3NYWd7XwKRGR.dd0Hm', 'eleve'),
(12, 'mmazeau@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$rCNs07AUE1apy0IBVVz/wemmyqEzHg4Dr.lRKORS3ipVS./715MQO', 'eleve'),
(13, 'mchabira@guinot.asso.fr', '[\"ROLE_INSERTION\"]', '$2y$13$E4URidk9v24tMaR2nRxNgOUvwPma/eyw.zA3y/8sFuYAf.zDP0o7S', 'insertion'),
(14, 'dburel@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$m8EMGr7XfZk6v.qKpdLmOeipXjzmGnsqNJb9DSzgUzY3S1ZkuGUxe', 'professeur'),
(15, 'mkheiar@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$84u90djRyiemsfmNI6zhY.MNvymItMlZVifcLgjK6a8nuPjM1adt.', 'secretariat'),
(16, 'cperrin@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$qJufwh7mYId6BvtxIqiYAOD0JkLJCXfbYY5MtKePiz7wesTWcqsP6', 'direction'),
(17, 'lterendij@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$SM7RfYB27EnKZWJ360Od4.QzbCSQwDJty3uNGClMmzZDnw4PFgSxO', 'eleve'),
(18, 'tblondeleau@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$RNPcptc7Nt4O123hf1CyBux5V90rS9o0xvmqgFik5OFptpHWpHvn.', 'professeur'),
(19, 'rbenyahya@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$NvyXv49L3rodmwJRRozpNe.X/dYG5s8wy5Mi7R5PJQgAR1RjBkaYy', 'professeur'),
(20, 'msakhraoui@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$NS6lWvrD77fYcRe5SLnDmuC14BNC9Ri./qny97FJfT.C/yRlSW1e.', 'professeur'),
(21, 'hthomas@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$EVKiqy7JU.MH8kntPwVlFekccqmBEU7KTtFiulC7TJy.4C2dhVB.C', 'professeur'),
(22, 'mduveau hoaurau@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$klQ4IkAo5PeVd..bnEnBF.di7mCTZQ8suvOL7Re/RLE202o.miZNa', 'professeur'),
(23, 'ejeanson@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$8.RD8yRKuS7yjWL3dPJ9QOKwW8p3i/qe40pn04KaKnoAA/wY6XBYe', 'professeur'),
(24, 'psorentino@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$crl9N4Q2mBTLzoJesGTXduggfxfiBNcweEekBIgtYaBH9Fuck5Vze', 'professeur'),
(25, 'epartouche@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$bn41Bh.J2T5QDf4/is4nzu4JeICDEkHonHuJV0iylAaKTGrh/aFGW', 'professeur'),
(26, 'qbalestan@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$wlea1k0uQmma1N9mmHP8..WvM2Er2tXX9SsJBHeAQm91Z9ug.UkaG', 'professeur'),
(27, 'mgranier@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$MkRl3jIYC/Yf7HKRClxeJeNIr21KpYF69dSJ2fQ14kOhpBQc9YhBC', 'eleve'),
(28, 'mbelmonte-caussieu@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$xcORWCv8t0pKh1YD/ZnWgOcgNU6Zs7Zc8a1tCmVPxXbslq2uemQL.', 'eleve'),
(29, 'mkaufman@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$6JM9KVzD/XIajlvRLxfzm.bD6r3ZaP9Fbx36MEYr31jZq1TuLZ3S.', 'eleve'),
(30, 'lservajean@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$pP97zq6GqoAkIg2gS649Ce5k7gwJ.SkwsfzH2RI1IRv3sj1akgHDu', 'eleve'),
(31, 'dedimo@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$iqagmA/FVq/SPfL/vCcTfOf7FRP95vKIMtwSjh0HnO.X1gi7/wHlK', 'eleve'),
(32, 'nchaffey@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$G4PSXm3rmSmsJM6qjqoHe.d.EKFFeBHWriKKmpeU0sh2BNX9Cd8m2', 'eleve'),
(33, 'mdrouart@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$erTtsZtVreToimfmI7e4O.TIeC/X.e/odf3/5tWFG/iK.58sgDw/G', 'eleve'),
(34, 'souahabi@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$euzZmMGjgF2XVoc2vtTTv.JRAf8X.KX8BBBerrB5wu3yolmhMRWOK', 'eleve'),
(35, 'adoucoure@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$GShoArubfPAypq1Ic1unOeuvjFwq4cWeaDyOzXix1Y.YdG9bHH45G', 'eleve'),
(36, 'ftecher@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$mkaLrzz5VBaJpojK7.1jfeMJ9j3rrXI/hAxHRxJNskyoCECH4zJxG', 'eleve'),
(37, 'bturpin@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$Nwj0VN8W9hGXyUNn/BNs9OGRWeuLozdG29Tftw/kau96rVUD5asCq', 'eleve'),
(38, 'svilan@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$AWtwqdZn9MLHvsGOYM1vh.e2Aja/ofkgzqq1b0ebtGIK6.H/fyRpK', 'eleve'),
(39, 'jcourtois@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$hM4cEKnnMxZuF0J71fx1i.EgSoBT/ED1N2T4al5iL9EddNOsrqx9W', 'eleve'),
(40, 'ragbovi@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$JiMzlYxcp/gWknrtEJ8ly.uaJvsUAspuX.QwPgLoy8SdwYBQYvwpe', 'eleve'),
(41, 'lcharbonnel@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$PHayFl22Ejyg2S2cMrNeZeVvP1B4i3ngWwXvh33ig/X/Nbp/dipAy', 'eleve'),
(42, 'fdedinger@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$8Gks0GLYPUSYbFhrebrAce.QA4BscQqdZbIg8TtNlcv5G59LJjSvC', 'eleve'),
(43, 'mverrier@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$m8Mjqkf7oLSzhhZnxcCzpO6HkJHCZcsPk0i1fhnvvrhamBdmX7AGG', 'eleve'),
(44, 'aariapoutri@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$wSw3zQbGqArlgGxWY.EYz.prwfeqOAII4oatEy7kBw3t88O3LS0yu', 'eleve'),
(45, 'larzur@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$f/HHT4PbqFGp8mDHIafoL.8UXmCDmSQi2W0viIsTeQeA4NQwuHFCa', 'eleve'),
(46, 'ycariou@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$nspMXBdZYCKJaOc2Uq7jNuCR8FPOfseFGh1CN0LxO5foeQhGOVV1q', 'eleve'),
(47, 'adesjars@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$ZdnH7ApAojPMmS9rfD5Bvuah.MB6/pk4TRi58FGXFC/D2R74.9M7m', 'eleve'),
(48, 'mguezoul@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$Vbi/HyiRR5eHme9b4aK/n.sZrhsUwtZY736Kv603BZew3jmtiOJ2a', 'eleve'),
(49, 'jperruchon@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$yQKLO1mxUlrhzXb3KoCgoer.aFjKci6K2SXR0b/piu6GGXaqIdPzO', 'eleve'),
(50, 'tvarbedjian@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$Z2UMCroQEcxP1ZVzcM0PY.BkLaYevfCBKwvvYyxuv1VTnoWn5opo6', 'eleve'),
(51, 'cfauchard@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$LAD6zxaWtqGfUI7qJ3l5OuBVF298bF0ctprAzvS2vdU3cpUMtFgka', 'eleve'),
(52, 'clacointe@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$yRW1JkxOnscth6pZMYNIjeDFWxZZmGKQwoV1DD6Z2l4PgfrWda8OS', 'eleve'),
(53, 'alapujade@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$DlUQ3lcEXwX0Y6x/urySlO4Hh0nWUB4ydcs.YNQw4ouBzYQW9wAja', 'eleve'),
(54, 'lwalter@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$RoBHiqpdS/dnwL6ZN8pQtesxPeM2nXl4elUiYNaCQCocj5gX/mnXq', 'eleve'),
(55, 'ccommeau@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$53W5pfslVvxd7LoqhSu7Weo1jgtC6GNbqcwkuggnaA2V7tMkth8w6', 'eleve'),
(56, 'sezzoubi@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$dCYkIm4Y.ZRa1aD1U326WeYgGsCL32sYLcxtbj4Wu.gHS9Ws6MNke', 'eleve'),
(57, 'ogomes@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$/vAhR/vJVpk1kaQ7LlPV6OHNRCwll1/H8FUFb0mKVlT4g9lXun6zO', 'eleve'),
(58, 'hmakaya@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$5hnGfp3dJM0sdUBskM80DeM9eWuUH055dJuU.0tZaqI/YaUvmoghC', 'eleve'),
(59, 'mtetegan@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$/717yK6Vo5KAKSXs9RiWxO7v2wQGvazIXnXPvgu7VLJxuCE437W1m', 'secretariat'),
(60, 'acozee@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$wblvQInsbAY2Jb92X4KekecavgBr2mXYf3BVeP8f5V/QnKdQm0XAW', 'direction'),
(61, 'croels@guinot.asso.fr', '[\"ROLE_DOCUMENTALISTE\"]', '$2y$13$cRab9KY6txVS1lp6GzjENe1dAql74dx8hK5M9898eq8rFY.U5Msxa', 'documentaliste'),
(62, 'zdendenis@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$PBOHj/P9.dBwEYfxW2ZniOQCoqqwsnGg.M4WRM3QjFa4s7D9Nowda', 'secretariat'),
(63, 'nraad@guinot.asso.fr', '[\"ROLE_SURVEILLANT\"]', '$2y$13$WNPiFZGYcgE5F5xF8rlMHOrr0p4HDEn1F23mZ0RHmxkPOnzfpTpe6', 'surveillant'),
(64, 'idendenis@guinot.asso.fr', '[\"ROLE_SURVEILLANT\"]', '$2y$13$vwgWocTqFtEf5xoGpNvrxu/zp01fR1wmblodiU7pR465huWBe6ZF.', 'surveillant'),
(65, 'tbozin@guinot.asso.fr', '[\"ROLE_CUISINE\"]', '$2y$13$9UzgqEgjNiFqrLDqEjznfu21Donx7FU1UubHPmB8o/OUTEnGiFt8W', 'cuisine'),
(66, 'asilberstein@guinot.asso.fr', '[\"ROLE_PARENT\"]', '$2y$13$JbEl1rtwE22fNy/6wqI.aen0v9sXW2I5JWeya9pduj7UEfUzlFGVi', 'parentEleve'),
(67, 'gguyot@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$aU6vfrt/Q4cAIJR.oeXDgef1Ip3SEjCpglH1i6dzngicU4Uvmcsom', 'direction'),
(68, 'lsimonet@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$Iyh47tkBhNYZ1oZgGQKdPO3FdtJjobRH.LvARYBkL.lXlj5KH99oy', 'direction'),
(69, 'acstromengeg@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$aQwlOvZldGf5Dphx8sRbcu7.tNBkEmT/TuQ/2BEXkRTTFgORyG7Si', 'direction'),
(70, 'nriou@guinot.asso.fr', '[\"ROLE_PARENT\"]', '$2y$13$b8Bfg/3uWBb98PrQ/KgVTeZWYTn2ZiKESjlOMvoFTwcCfvk8FlrSO', 'parentEleve'),
(71, 'dcany@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$.nxvwKT2ry2UiOnvRgoDvODiEyN1OlkQs/R.jz.wVJjZ0t3a.yfGK', 'secretariat'),
(72, 'lfevrier@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$3iH5O0unQdUZvdkYsCdoA.QnToL6oHbVZMMgpNbLBYIsfOg61xe6a', 'eleve'),
(73, 'everdino@guinot.asso.fr', '[\"ROLE_ELEVE\"]', '$2y$13$ZFisP.PH7f/XZ8JV.TZexOrfz/yq5GKOsFGpo/8hz/Jr9PVx3CIgi', 'eleve'),
(76, 'cmallet@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$ry/D/kE/mx1u1SNag/mq8.iczrlFAp77.ZXp..7cWWCDVOB2XFKGS', 'professeur');

-- --------------------------------------------------------

--
-- Structure de la table `viande`
--

DROP TABLE IF EXISTS `viande`;
CREATE TABLE IF NOT EXISTS `viande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `viande`
--

INSERT INTO `viande` (`id`, `libelle`) VALUES
(1, 'Boeuf Bourguignon'),
(2, 'Escalope pané'),
(3, 'Steak haché'),
(4, 'Cordon Bleu'),
(5, 'pilon de poulet'),
(6, 'Saucisse de Francfort'),
(7, 'ailes de poulet'),
(8, 'Canard laqué'),
(9, 'Brochette'),
(10, 'Croque monsieur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_880E0D76BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `adulte`
--
ALTER TABLE `adulte`
  ADD CONSTRAINT `FK_757FE71EBF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `categorie_forum`
--
ALTER TABLE `categorie_forum`
  ADD CONSTRAINT `FK_7053531D29CCBAD0` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_6EEAA67DF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_FDCA8C9CBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_FDCA8C9CF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `cours_promotion`
--
ALTER TABLE `cours_promotion`
  ADD CONSTRAINT `FK_39B84716139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_39B847167ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cuisine`
--
ALTER TABLE `cuisine`
  ADD CONSTRAINT `FK_10D52C6BBF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `direction`
--
ALTER TABLE `direction`
  ADD CONSTRAINT `FK_3E4AD1B3BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `documentaliste`
--
ALTER TABLE `documentaliste`
  ADD CONSTRAINT `FK_AB233A5BBF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `FK_ECA105F7139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `FK_ECA105F7BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_364071D715D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`),
  ADD CONSTRAINT `FK_364071D76A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_364071D7F6203804` FOREIGN KEY (`statut_id`) REFERENCES `statut_emprunt` (`id`);

--
-- Contraintes pour la table `etage`
--
ALTER TABLE `etage`
  ADD CONSTRAINT `FK_2DDCF14BD6F6891B` FOREIGN KEY (`batiment_id`) REFERENCES `batiment` (`id`);

--
-- Contraintes pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD CONSTRAINT `FK_E418C74D139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `FK_E418C74DBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_E418C74DF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `insertion`
--
ALTER TABLE `insertion`
  ADD CONSTRAINT `FK_3E378A7BBF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `FK_F6B4FB29BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `membre_event`
--
ALTER TABLE `membre_event`
  ADD CONSTRAINT `FK_8D8805266A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_8D880526F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `membre_jeton`
--
ALTER TABLE `membre_jeton`
  ADD CONSTRAINT `FK_B4E96BFA6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_7D053A93745B52FD` FOREIGN KEY (`dessert_id`) REFERENCES `dessert` (`id`),
  ADD CONSTRAINT `FK_7D053A937FCE0491` FOREIGN KEY (`fromage_id`) REFERENCES `fromage` (`id`),
  ADD CONSTRAINT `FK_7D053A93AF7BD910` FOREIGN KEY (`entree_id`) REFERENCES `entree` (`id`),
  ADD CONSTRAINT `FK_7D053A93D73DB560` FOREIGN KEY (`plat_id`) REFERENCES `plat` (`id`);

--
-- Contraintes pour la table `message_forum`
--
ALTER TABLE `message_forum`
  ADD CONSTRAINT `FK_7A8D412610335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_7A8D4126BF396750` FOREIGN KEY (`id`) REFERENCES `message` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7A8D4126E2904019` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`);

--
-- Contraintes pour la table `message_general`
--
ALTER TABLE `message_general`
  ADD CONSTRAINT `FK_5EA10C4610335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_5EA10C46BF396750` FOREIGN KEY (`id`) REFERENCES `message` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message_guest`
--
ALTER TABLE `message_guest`
  ADD CONSTRAINT `FK_531165DEBF396750` FOREIGN KEY (`id`) REFERENCES `message` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message_prive`
--
ALTER TABLE `message_prive`
  ADD CONSTRAINT `FK_2DB3B2610335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_2DB3B26A4F84F6E` FOREIGN KEY (`destinataire_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_2DB3B26BF396750` FOREIGN KEY (`id`) REFERENCES `message` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA1489D40298` FOREIGN KEY (`exercice_id`) REFERENCES `exercice` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14A6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14BAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_CFBDFA14F46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `FK_52A8CBD8601389BC` FOREIGN KEY (`statut_ouvrage_id`) REFERENCES `statut_ouvrage` (`id`);

--
-- Contraintes pour la table `ouvrage_categorie_ouvrage`
--
ALTER TABLE `ouvrage_categorie_ouvrage`
  ADD CONSTRAINT `FK_A014510C15D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A014510C8B114E19` FOREIGN KEY (`categorie_ouvrage_id`) REFERENCES `categorie_ouvrage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parent_eleve`
--
ALTER TABLE `parent_eleve`
  ADD CONSTRAINT `FK_20909154BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parent_eleve_eleve`
--
ALTER TABLE `parent_eleve_eleve`
  ADD CONSTRAINT `FK_98ED0A6E95A16B63` FOREIGN KEY (`parent_eleve_id`) REFERENCES `parent_eleve` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_98ED0A6EA6CC7B2` FOREIGN KEY (`eleve_id`) REFERENCES `eleve` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `FK_A6BCF3DEBF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personnel_pole`
--
ALTER TABLE `personnel_pole`
  ADD CONSTRAINT `FK_364A56901C109075` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_364A5690419C3385` FOREIGN KEY (`pole_id`) REFERENCES `pole` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A20725F18E37` FOREIGN KEY (`legume_id`) REFERENCES `legume` (`id`),
  ADD CONSTRAINT `FK_2038A2074C61F684` FOREIGN KEY (`viande_id`) REFERENCES `viande` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC2791FDB457` FOREIGN KEY (`categorie_produit_id`) REFERENCES `categorie_produit` (`id`);

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `FK_17A55299BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `professeur_matiere`
--
ALTER TABLE `professeur_matiere`
  ADD CONSTRAINT `FK_FBC82ABCBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_FBC82ABCF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `professionnel`
--
ALTER TABLE `professionnel`
  ADD CONSTRAINT `FK_7A28C10FA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `programme`
--
ALTER TABLE `programme`
  ADD CONSTRAINT `FK_3DDCB9FF139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `FK_3DDCB9FFBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_3DDCB9FFF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_C11D7DD1419C3385` FOREIGN KEY (`pole_id`) REFERENCES `pole` (`id`);

--
-- Contraintes pour la table `repas`
--
ALTER TABLE `repas`
  ADD CONSTRAINT `FK_A8D351B3CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `reservation_repas`
--
ALTER TABLE `reservation_repas`
  ADD CONSTRAINT `FK_EBAC81141D236AAA` FOREIGN KEY (`repas_id`) REFERENCES `repas` (`id`),
  ADD CONSTRAINT `FK_EBAC81146A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `FK_4E977E5C56BDB169` FOREIGN KEY (`promo_principale_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `FK_4E977E5C984CE93F` FOREIGN KEY (`etage_id`) REFERENCES `etage` (`id`);

--
-- Contraintes pour la table `salle_promotion`
--
ALTER TABLE `salle_promotion`
  ADD CONSTRAINT `FK_26B91181139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_26B91181DC304035` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `secretariat`
--
ALTER TABLE `secretariat`
  ADD CONSTRAINT `FK_F0C364B5BF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `FK_C27C936953C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `professionnel` (`id`),
  ADD CONSTRAINT `FK_C27C9369A4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`),
  ADD CONSTRAINT `FK_C27C9369BBA93DD6` FOREIGN KEY (`stagiaire_id`) REFERENCES `eleve` (`id`);

--
-- Contraintes pour la table `sub_forum`
--
ALTER TABLE `sub_forum`
  ADD CONSTRAINT `FK_696FDA74114BFBBA` FOREIGN KEY (`categorie_forum_id`) REFERENCES `categorie_forum` (`id`);

--
-- Contraintes pour la table `surveillant`
--
ALTER TABLE `surveillant`
  ADD CONSTRAINT `FK_960905BABF396750` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `FK_31204C8373A201E5` FOREIGN KEY (`createur_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_31204C8393635489` FOREIGN KEY (`sub_forum_id`) REFERENCES `sub_forum` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
