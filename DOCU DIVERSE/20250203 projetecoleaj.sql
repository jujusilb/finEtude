-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 fév. 2025 à 10:08
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
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `roles`, `login`) VALUES
(21, 'vviala@guinot.asso.fr', 'mdp', '[\"ROLE_ADMIN\"]', 'vviala');

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
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(20),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(34);

-- --------------------------------------------------------

--
-- Structure de la table `cuisine`
--

DROP TABLE IF EXISTS `cuisine`;
CREATE TABLE IF NOT EXISTS `cuisine` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cuisine`
--

INSERT INTO `cuisine` (`id`, `email`, `roles`, `password`, `login`) VALUES
(27, 'tbozin@guinot.asso.fr', '[\"ROLE_CUISINE\"]', 'mdp', 'tbozin'),
(28, 'mboulingrin@guinot.asso.fr', '[\"ROLE_CUISINE\"]', 'mdp', 'mboulingrin');

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`id`, `libelle`) VALUES
(1, 'Profiterolles'),
(2, 'Banana split'),
(3, 'Tarte aux pommes');

-- --------------------------------------------------------

--
-- Structure de la table `direction`
--

DROP TABLE IF EXISTS `direction`;
CREATE TABLE IF NOT EXISTS `direction` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `direction`
--

INSERT INTO `direction` (`id`, `email`, `roles`, `password`, `login`) VALUES
(26, 'lsimonet@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', 'mdp', 'lsimonet'),
(29, 'mtetegan@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', 'mdp', 'mtetegan');

-- --------------------------------------------------------

--
-- Structure de la table `documentaliste`
--

DROP TABLE IF EXISTS `documentaliste`;
CREATE TABLE IF NOT EXISTS `documentaliste` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `documentaliste`
--

INSERT INTO `documentaliste` (`id`, `email`, `roles`, `password`, `login`) VALUES
(20, 'croals@guinot.asso.fr', '[\"ROLE_DOCUMENTALISTE\"]', 'mdp', 'croals');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int NOT NULL,
  `promotion_id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ECA105F7139DF194` (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `promotion_id`, `email`, `password`, `roles`, `login`) VALUES
(12, 2, 'Jsilberstein@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]', 'jsilberstein'),
(13, 2, 'adreche@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]', 'adreche'),
(14, 2, 'belamrani', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]', 'belamrani'),
(15, 1, 'amarie@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]', 'amarie'),
(16, 2, 'mlnoel@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]', 'mlnoel'),
(17, 2, 'cerrajouani', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]', 'cerrajouani'),
(18, 1, 'mmazeau@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]', 'mmazeau'),
(19, 1, 'pdugbe', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]', 'pdugbe'),
(32, 5, 'adoucoure@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_CRCD\"]', 'adoucoure'),
(35, 1, 'cdubois@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]', 'cdubois'),
(36, 1, 'pouattara@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]', 'pouattara'),
(37, 5, 'sBaCheikh@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_CRCD\"]', 'sbacheikh'),
(38, 5, 'abenmansour@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_CRCD\"]', 'abenmansour'),
(39, 8, 'mgranier@guinot.asso.fr', 'mdp', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_K2\"]', 'mgranier');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ouvrage_id` int NOT NULL,
  `membre_id` int DEFAULT NULL,
  `date_emprunt` date NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_364071D715D884B5` (`ouvrage_id`),
  KEY `IDX_364071D76A99F74A` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `ouvrage_id`, `membre_id`, `date_emprunt`, `statut`) VALUES
(1, 1, 1, '2025-01-09', 'En Cours');

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

DROP TABLE IF EXISTS `entree`;
CREATE TABLE IF NOT EXISTS `entree` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`id`, `libelle`) VALUES
(1, 'Oeufs mimosa'),
(2, 'Poireaux Vinaigrette'),
(3, 'Feuilleté au fromage');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

DROP TABLE IF EXISTS `exercice`;
CREATE TABLE IF NOT EXISTS `exercice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fromage`
--

DROP TABLE IF EXISTS `fromage`;
CREATE TABLE IF NOT EXISTS `fromage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fromage`
--

INSERT INTO `fromage` (`id`, `libelle`) VALUES
(1, 'Camembert'),
(2, 'Gorgonzola'),
(3, 'Brie'),
(4, 'Saint-Nectaire'),
(5, 'Fourme d\'Ambert');

-- --------------------------------------------------------

--
-- Structure de la table `legume`
--

DROP TABLE IF EXISTS `legume`;
CREATE TABLE IF NOT EXISTS `legume` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `legume`
--

INSERT INTO `legume` (`id`, `libelle`) VALUES
(1, 'pates'),
(2, 'Endives'),
(3, 'Ratatouille'),
(4, 'Purée'),
(5, 'Frites');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `libelle`) VALUES
(1, 'Français'),
(2, 'Mathématique'),
(3, 'SVT'),
(4, 'Histoire'),
(5, 'Géographie'),
(6, 'Anglais'),
(7, 'Espagnol'),
(8, 'Allemand'),
(9, 'Physique'),
(10, 'Chimie'),
(11, 'Technologie'),
(12, 'Bureautique'),
(13, 'Informatique'),
(14, 'EPS'),
(15, 'Anatomie'),
(16, 'Neurologie'),
(17, 'Pharmacologie'),
(18, 'Pratique de massage'),
(19, 'Pratique de massage'),
(20, 'Musique'),
(21, 'CRCD'),
(22, 'TRE');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `discrimination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `image_name`, `updated_at`, `created_at`, `discrimination`) VALUES
(1, 'NAIT-KACI', 'Said', 'frame-8-6791798c64c3a978589670.gif', '2025-01-23 00:04:44', '2025-01-21 21:51:50', 'professeur'),
(2, 'Palakott', 'Igor', 'frame-7-679179b5e3c08724920997.gif', '2025-01-23 00:05:25', '2025-01-21 21:52:44', 'professeur'),
(3, 'LEVY', 'Gilles', 'frame-5-679179e5e5451056773441.gif', '2025-01-23 00:06:13', '2025-01-21 21:53:42', 'professeur'),
(4, 'SCHAFF', 'Estelle', 'frame-10-67917a5371f04387910423.gif', '2025-01-23 00:08:03', '2025-01-21 21:56:49', 'professeur'),
(5, 'BLONDELEAU', 'Thomas', 'frame-10-67917a8564cee680425329.gif', '2025-01-23 00:08:53', '2025-01-21 21:58:23', 'professeur'),
(6, 'SRALAOUI', 'Mabrook', 'frame-28-67917aac7da72472337639.gif', '2025-01-23 00:09:32', '2025-01-21 22:00:19', 'professeur'),
(7, 'BENYAHYA', 'Rachida', 'frame-15-67900b313fc80340102943.gif', '2025-01-21 22:01:37', '2025-01-21 22:01:37', 'professeur'),
(8, 'THOMAS', 'Hadrien', 'frame-14-67900b75a1278808189194.gif', '2025-01-21 22:02:45', '2025-01-21 22:02:45', 'professeur'),
(9, 'GUYOT', 'Gregory', 'frame-11-67900babe4753667175215.gif', '2025-01-21 22:03:39', '2025-01-21 22:03:39', 'professeur'),
(10, 'SORENTINO', 'Patrice', 'frame-9-67900c2de2613418178975.gif', '2025-01-21 22:05:49', '2025-01-21 22:05:49', 'professeur'),
(11, 'PARTOUCHE', 'Elie', 'frame-4-67917a1f1c508271854689.gif', '2025-01-23 00:07:11', '2025-01-21 22:06:47', 'professeur'),
(12, 'SILBERSTEIN', 'Julien', 'frame-4-67902addb71eb427605808-679e8ca13dfe6183433295.gif', '2025-02-01 22:05:37', '2025-01-22 00:16:44', 'eleve'),
(13, 'DRECHE', 'Aristide', 'frame-5-678d88cb23933995413371-679e8cbb194ee501766697.gif', '2025-02-01 22:06:03', '2025-01-22 00:19:16', 'eleve'),
(14, 'EL AMRANI', 'BILLEL', 'frame-4-67902addb71eb427605808-679e8ccb5ea79772685494.gif', '2025-02-01 22:06:19', '2025-01-22 00:22:13', 'eleve'),
(15, 'MARIE', 'Alexis', 'frame-3-67954547ecef0011385340-679cc2cd8a46e473117599-679e8dc43ae6f960658594.gif', '2025-02-01 22:10:28', '2025-01-22 00:23:24', 'eleve'),
(16, 'NOËL', 'Marie-Laure', 'frame-5-679179e5e5451056773441-679e8e034684f943346259.gif', '2025-02-01 22:11:31', '2025-01-22 00:25:15', 'eleve'),
(17, 'ERRAJOUANI', 'Chakib', 'frame-5-678d88cb23933995413371-679e8e1dc0b1f578402425.gif', '2025-02-01 22:11:57', '2025-01-22 00:26:53', 'eleve'),
(18, 'MAZEAU', 'Matthias', 'frame-5-678d88cb23933995413371-679e8e6558112405367304.gif', '2025-02-01 22:13:09', '2025-01-22 00:28:25', 'eleve'),
(19, 'DUGBE', 'Prosper', 'frame-3-67954547ecef0011385340-679e8e7a01feb375976576.gif', '2025-02-01 22:13:30', '2025-01-22 00:29:18', 'eleve'),
(20, 'ROALS', 'Catherine', 'frame-5-67903905cd773631613086.gif', '2025-01-22 01:17:09', '2025-01-22 01:17:09', 'documentaliste'),
(21, 'VIALA', 'Vincent', 'frame-9-6791443365455859557030.gif', '2025-01-22 20:17:07', '2025-01-22 20:17:04', 'admin'),
(22, 'RAAD', 'NORA', 'frame-10-6793f66222800884008053.gif', '2025-01-24 21:21:54', '2025-01-24 21:21:53', 'surveillant'),
(23, 'DENDENIS', 'Issam', 'frame-1-6793f6f700784628138685.gif', '2025-01-24 21:24:23', '2025-01-24 21:24:22', 'surveillant'),
(24, 'SILBERSTEIN', 'Madame', 'frame-3-67954547ecef0011385340.gif', '2025-01-25 21:10:47', '2025-01-25 21:10:47', 'parentEleve'),
(25, 'STROMENGER', 'Anne-Catherine', 'frame-13-6796069c74ca4980827048.gif', '2025-01-26 10:55:40', '2025-01-26 10:55:39', 'secretariat'),
(26, 'SIMONET', 'Laure', 'frame-8-678d6639ac57b968593887-679a07a710dcb937510226.gif', '2025-01-29 11:49:11', '2025-01-29 11:49:09', 'direction'),
(27, 'BOZIN', 'Theodore', 'frame-7-679179b5e3c08724920997-679a07ea3846a238146169.gif', '2025-01-29 11:50:18', '2025-01-29 11:50:18', 'cuisine'),
(28, 'BOULINGRIN', 'Muguette', 'frame-8-67902dce9ef00018424002-679a08138af96964409926.gif', '2025-01-29 11:50:59', '2025-01-29 11:50:59', 'cuisine'),
(29, 'TETEGAN', 'Martine', 'frame-5-679179e5e5451056773441-679a084952314630857458.gif', '2025-01-29 11:51:53', '2025-01-29 11:51:53', 'direction'),
(32, 'DOUCOURE', 'ADJA', 'frame-5-679179e5e5451056773441-679a084952314630857458-679e8e8a9da91432149836.gif', '2025-02-01 22:13:46', '2025-01-31 13:36:43', 'eleve'),
(34, 'BUREL', 'Damien', 'frame-5-678d88cb23933995413371-679e04f052618491500159.gif', '2025-02-01 12:26:40', '2025-02-01 12:26:40', 'professeur'),
(35, 'DUBOIS', 'Corentin', 'frame-1-67902d3dc1d32086559979-679e03d49b77f786054139-679e8e52e63e1225655723.gif', '2025-02-01 22:12:50', '2025-02-01 21:41:11', 'eleve'),
(36, 'OUATTARA', 'Pekasso', 'frame-4-67917a1f1c508271854689-679e8e382b0e6668029868.gif', '2025-02-01 22:12:24', '2025-02-01 21:42:30', 'eleve'),
(37, 'BA CHEIKH', 'Sadibou', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047.gif', '2025-02-01 22:04:53', '2025-02-01 21:46:28', 'eleve'),
(38, 'BENMANSOUR', 'Anis', 'frame-4-67902addb71eb427605808-679e8b7f87ba1804386386.gif', '2025-02-01 22:00:47', '2025-02-01 22:00:47', 'eleve'),
(39, 'GRANIER', 'Manon', 'frame-5-678d88cb23933995413371-679fdb8d44e80804634621.gif', '2025-02-02 21:54:37', '2025-02-02 20:08:53', 'eleve');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `plat_id`, `fromage_id`, `dessert_id`, `entree_id`) VALUES
(1, 2, 3, 2, 1),
(2, 3, 4, 1, 3),
(3, 4, 2, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `membre_id` int DEFAULT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privatif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6BD307F6A99F74A` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `membre_id`, `sujet`, `contenu`, `privatif`) VALUES
(1, 12, 'Salut salut !', 'Ceci est le premier message ici !', 0);

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
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `titre`, `statut`, `categorie`) VALUES
(1, 'Le journal d\'Anne Frank', 'Disponible', 'Drame'),
(2, 'Rendez-vous avec Rama', 'Disponible', 'Science-Fiction');

-- --------------------------------------------------------

--
-- Structure de la table `parent_eleve`
--

DROP TABLE IF EXISTS `parent_eleve`;
CREATE TABLE IF NOT EXISTS `parent_eleve` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parent_eleve`
--

INSERT INTO `parent_eleve` (`id`, `email`, `roles`, `password`, `login`) VALUES
(24, 'msilberstein@guinot.asso.fr', '[\"ROLE_PARENTELEVE\"]', 'mdp', 'msilberstein');

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
(1, '2020-01-01', '0146780101'),
(2, '2020-01-01', '0146780101'),
(3, '2020-01-01', '0146780101'),
(4, '2020-01-01', '0146780101'),
(5, '2020-01-01', '0146780101'),
(6, '2020-01-01', '0146780101'),
(7, '2020-01-01', '0146780101'),
(8, '2020-01-01', '0146780101'),
(9, '2020-01-01', '0146780101'),
(10, '2020-01-01', 'mdp'),
(11, '2020-01-01', '0146780101'),
(20, '2020-01-01', '2053'),
(22, '2020-01-01', '0146780100'),
(23, '2020-01-01', '0146780100'),
(25, '2020-01-01', '01467801100'),
(26, '2020-01-01', '0146780100'),
(27, '2020-01-01', '3111'),
(28, '2020-01-01', '0146780100'),
(29, '2020-01-01', '0146780100'),
(34, '2020-01-01', '0146780100');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viande_id` int NOT NULL,
  `legume_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2038A2074C61F684` (`viande_id`),
  KEY `IDX_2038A20725F18E37` (`legume_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `libelle`, `viande_id`, `legume_id`) VALUES
(1, NULL, 1, 1),
(2, NULL, 3, 5),
(3, NULL, 4, 4),
(4, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `email`, `password`, `roles`, `login`) VALUES
(1, 'saidnaitk214@gmail.com', 'mdp', '[]', 'saidnaitk214'),
(2, 'ipalakot@guinot.asso.fr', 'mdp', '[]', 'ipalakot'),
(3, 'glevy@guinot.asso.fr', 'mdp', '[]', 'glevy'),
(4, 'eschaff@guinot.asso.fr', 'mdp', '[]', 'eschaff'),
(5, 'tblondeleau@guinot.fr', 'mdp', '[]', 'tblondeleau'),
(6, 'msralaoui', 'mdp', '[\"ROLE_\"]', 'msralaoui'),
(7, 'rbenyahya', 'mdp', '[\"ROLE_\"]', 'rbenyahaya'),
(8, 'hthomas@guinot.fr', 'mdp', '[\"ROLE_\"]', 'hthomas'),
(9, 'gguyot@guinot.fr', 'mdp', '[\"ROLE_\"]', 'gguyot'),
(10, 'psorentino', 'mdp', '[\"ROLE_\"]', 'psorentino'),
(11, 'epartouche', 'mdp', '[\"ROLE_\"]', 'epartouche'),
(34, 'dburel@guinot.asso.fr', 'mdp', '[\"ROLE_PROFESSEUR\"]', 'dburel');

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
(1, 6),
(2, 13),
(3, 13),
(4, 2),
(5, 15),
(6, 12),
(11, 16),
(34, 1);

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
(1, 6, 1),
(1, 6, 2),
(1, 6, 3),
(1, 6, 4),
(1, 6, 5),
(1, 6, 6),
(1, 6, 7),
(1, 6, 8),
(1, 6, 9),
(1, 6, 10),
(1, 6, 11),
(2, 13, 2),
(3, 13, 1),
(4, 2, 3),
(4, 2, 4),
(5, 15, 8),
(7, 21, 5),
(34, 1, 4),
(34, 22, 2);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referent_id` int NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C11D7DD135E47E35` (`referent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `referent_id`, `libelle`) VALUES
(1, 6, 'DA1'),
(2, 2, 'DA2'),
(3, 1, 'PREPA DEV'),
(4, 4, 'PREPA CRCD'),
(5, 7, 'CRCD'),
(6, 8, 'PMK'),
(7, 3, 'K1'),
(8, 10, 'K2'),
(9, 11, 'K3'),
(10, 12, 'K4'),
(11, 5, 'K5');

-- --------------------------------------------------------

--
-- Structure de la table `referent`
--

DROP TABLE IF EXISTS `referent`;
CREATE TABLE IF NOT EXISTS `referent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `professeur_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FE9AAC6CBAB22EE9` (`professeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `referent`
--

INSERT INTO `referent` (`id`, `professeur_id`) VALUES
(1, 1),
(2, 2),
(6, 3),
(4, 4),
(10, 5),
(8, 6),
(7, 7),
(11, 8),
(5, 9),
(12, 10),
(3, 11);

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
  `membre_id` int NOT NULL,
  `prix` double NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_achat` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A8D351B3CCD7E912` (`menu_id`),
  KEY `IDX_A8D351B36A99F74A` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id`, `menu_id`, `membre_id`, `prix`, `date`, `heure`, `date_achat`) VALUES
(1, 2, 1, 4.5, '2025-02-20', 'Midi', '2025-02-02');

-- --------------------------------------------------------

--
-- Structure de la table `secretariat`
--

DROP TABLE IF EXISTS `secretariat`;
CREATE TABLE IF NOT EXISTS `secretariat` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secretariat`
--

INSERT INTO `secretariat` (`id`, `email`, `password`, `roles`, `login`) VALUES
(25, 'acstromenger@guinot.asso.fr', 'mdp', '[\"ROLE_SECRETARIAT\"]', 'acstromenger');

-- --------------------------------------------------------

--
-- Structure de la table `surveillant`
--

DROP TABLE IF EXISTS `surveillant`;
CREATE TABLE IF NOT EXISTS `surveillant` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `surveillant`
--

INSERT INTO `surveillant` (`id`, `email`, `password`, `roles`, `login`) VALUES
(22, 'nraad@guinot.asso.fr', 'mdp', '[\"ROLE_SURVEILLANT\"]', 'nraad'),
(23, 'idendenis@guinot.asso.fr', 'mdp', '[\"ROLE_SURVEILLANT\"]', 'idendenis');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `viande`
--

DROP TABLE IF EXISTS `viande`;
CREATE TABLE IF NOT EXISTS `viande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `viande`
--

INSERT INTO `viande` (`id`, `libelle`) VALUES
(1, 'Boeuf Bourguignon'),
(2, 'Escalope pané'),
(3, 'Steak haché'),
(4, 'Cordon Bleu');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_880E0D76BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `adulte`
--
ALTER TABLE `adulte`
  ADD CONSTRAINT `FK_757FE71EBF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cuisine`
--
ALTER TABLE `cuisine`
  ADD CONSTRAINT `FK_10D52C6BBF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `direction`
--
ALTER TABLE `direction`
  ADD CONSTRAINT `FK_3E4AD1B3BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `documentaliste`
--
ALTER TABLE `documentaliste`
  ADD CONSTRAINT `FK_AB233A5BBF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `FK_ECA105F7139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `FK_ECA105F7BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_364071D715D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`),
  ADD CONSTRAINT `FK_364071D76A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK_7D053A93745B52FD` FOREIGN KEY (`dessert_id`) REFERENCES `dessert` (`id`),
  ADD CONSTRAINT `FK_7D053A937FCE0491` FOREIGN KEY (`fromage_id`) REFERENCES `fromage` (`id`),
  ADD CONSTRAINT `FK_7D053A93AF7BD910` FOREIGN KEY (`entree_id`) REFERENCES `entree` (`id`),
  ADD CONSTRAINT `FK_7D053A93D73DB560` FOREIGN KEY (`plat_id`) REFERENCES `plat` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307F6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`);

--
-- Contraintes pour la table `parent_eleve`
--
ALTER TABLE `parent_eleve`
  ADD CONSTRAINT `FK_20909154BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `FK_A6BCF3DEBF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A20725F18E37` FOREIGN KEY (`legume_id`) REFERENCES `legume` (`id`),
  ADD CONSTRAINT `FK_2038A2074C61F684` FOREIGN KEY (`viande_id`) REFERENCES `viande` (`id`);

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `FK_17A55299BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `professeur_matiere`
--
ALTER TABLE `professeur_matiere`
  ADD CONSTRAINT `FK_FBC82ABCBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`),
  ADD CONSTRAINT `FK_FBC82ABCF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);

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
  ADD CONSTRAINT `FK_C11D7DD135E47E35` FOREIGN KEY (`referent_id`) REFERENCES `referent` (`id`);

--
-- Contraintes pour la table `referent`
--
ALTER TABLE `referent`
  ADD CONSTRAINT `FK_FE9AAC6CBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`);

--
-- Contraintes pour la table `repas`
--
ALTER TABLE `repas`
  ADD CONSTRAINT `FK_A8D351B36A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_A8D351B3CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `secretariat`
--
ALTER TABLE `secretariat`
  ADD CONSTRAINT `FK_F0C364B5BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `surveillant`
--
ALTER TABLE `surveillant`
  ADD CONSTRAINT `FK_960905BABF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
