-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 21 fév. 2025 à 13:11
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
(21);

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
(34),
(41),
(42),
(43);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_forum`
--

INSERT INTO `categorie_forum` (`id`, `forum_id`, `libelle`, `description`) VALUES
(1, 1, 'Pédagogie', 'Tout ce qui a trait au coté pédagogie');

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
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `professeur_id` int NOT NULL,
  `matiere_id` int NOT NULL,
  `date` date NOT NULL,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FDCA8C9CBAB22EE9` (`professeur_id`),
  KEY `IDX_FDCA8C9CF46CD258` (`matiere_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `professeur_id`, `matiere_id`, `date`, `libelle`, `fichier`) VALUES
(2, 3, 13, '2024-04-03', 'Mon bilan', '67b5a93fd3442.pdf'),
(3, 3, 7, '2024-04-03', 'Mon bilan', '67b5c1a214f2f.pdf'),
(4, 3, 9, '2023-06-07', 'mein bilan !', '67b5d0fcabda4.pdf');

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

--
-- Déchargement des données de la table `cours_promotion`
--

INSERT INTO `cours_promotion` (`cours_id`, `promotion_id`) VALUES
(2, 1),
(3, 2),
(4, 2);

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
(27),
(28);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `direction`
--

INSERT INTO `direction` (`id`) VALUES
(26),
(29);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250218150631', '2025-02-18 16:07:22', 279),
('DoctrineMigrations\\Version20250220104711', '2025-02-20 11:48:02', 40),
('DoctrineMigrations\\Version20250220121323', '2025-02-20 13:13:44', 88),
('DoctrineMigrations\\Version20250220130308', '2025-02-20 14:03:23', 44);

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
(20);

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
(15, 1),
(18, 1),
(19, 1),
(35, 1),
(36, 1),
(12, 2),
(13, 2),
(14, 2),
(16, 2),
(17, 2),
(32, 5),
(37, 5),
(38, 5),
(39, 8);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ouvrage_id` int NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_demande` date NOT NULL,
  `membre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_364071D715D884B5` (`ouvrage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entree`
--

DROP TABLE IF EXISTS `entree`;
CREATE TABLE IF NOT EXISTS `entree` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`id`, `libelle`) VALUES
(1, 'Oeufs mimosa'),
(2, 'Poireaux Vinaigrette'),
(3, 'Feuilleté au fromage'),
(4, 'Tomates Mozzarella');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `libelle`, `adresse`, `code_postal`, `ville`, `telephone`, `email`) VALUES
(1, 'Symfony', '18 rue du philarmonique', '92000', 'Levalois', '0123456789', 'contact@symfony.com'),
(2, 'Ubisoft', 'rue de l\'Assasin\'s CRUD', '94000', 'Vincennes', '0123456789', 'contact@ubisoft.com'),
(3, 'logitech', 'rue de la petite souris', '75000', 'Paris', '0123456789', 'contact@logitech.com'),
(4, 'Ankama', 'quelque part, mystere', '01011', 'dans le nord', '0123456789', 'contact@ankama.com'),
(5, 'google france', 'dans le 9e', '75009', 'paris', '0123456789', 'contact@gmail.com'),
(6, 'Caisse Nationale d\'Assurance Maladie', '50 boulevard du professeur lemiere', '75019', 'paris', '0123456789', 'contact@cnam.fr');

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
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `libelle`, `description`) VALUES
(1, 'Forum Principal', 'Le Forum Principal de l\'établissement');

-- --------------------------------------------------------

--
-- Structure de la table `fromage`
--

DROP TABLE IF EXISTS `fromage`;
CREATE TABLE IF NOT EXISTS `fromage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fromage`
--

INSERT INTO `fromage` (`id`, `libelle`) VALUES
(1, 'Camembert'),
(2, 'Gorgonzola'),
(3, 'Brie'),
(4, 'Saint-Nectaire'),
(5, 'Fourme d\'Ambert'),
(6, 'Babybel');

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
(41);

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
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charte` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `image_name`, `updated_at`, `created_at`, `username`, `charte`) VALUES
(1, 'NAIT-KACI', 'Said', 'frame-5-678d88cb23933995413371-679fdb8d44e80804634621-67b0e303ef39f572318862.gif', '2025-02-15 19:54:59', '2025-01-21 21:51:50', 'snaitkaci', 0),
(2, 'PALAKOT', 'Igor', 'frame-11-67902c6cdc31e434632906-67b0e1a6893a3841543650.gif', '2025-02-15 19:49:10', '2025-01-21 21:52:44', 'ipalakot', 0),
(3, 'LEVY', 'Gilles', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047-67b0e2587e787010602338.gif', '2025-02-15 19:52:08', '2025-01-21 21:53:42', 'glevy', 1),
(4, 'SCHAFF', 'Estelle', 'frame-28-67917aac7da72472337639-67b0e32e6654c514633787.gif', '2025-02-15 19:55:42', '2025-01-21 21:56:49', 'eschaff', 0),
(5, 'BLONDELEAU', 'Thomas', 'frame-11-67902c6cdc31e434632906-67b0e35713baa131580439.gif', '2025-02-15 19:56:23', '2025-01-21 21:58:23', 'tblondeleau', 0),
(6, 'SAKHRAOUI', 'Mabrouk', 'frame-5-678d88cb23933995413371-679fdb8d44e80804634621-67b0e3ad6d345695334367.gif', '2025-02-15 19:57:49', '2025-01-21 22:00:19', 'sakhraoui', 0),
(7, 'BENYAHYA', 'Rachida', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047-67b0e4739a331196807145.gif', '2025-02-15 20:01:07', '2025-01-21 22:01:37', 'rbenhyahya', 0),
(8, 'THOMAS', 'Hadrien', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047-67b0e3c89dad9495548434.gif', '2025-02-15 19:58:16', '2025-01-21 22:02:45', 'hthomas', 0),
(9, 'GUYOT', 'Gregory', 'frame-28-67917aac7da72472337639-67b0e48f00a9b782110280.gif', '2025-02-15 20:01:35', '2025-01-21 22:03:39', 'gguyot', 0),
(10, 'SORENTINO', 'Patrice', 'frame-5-678d88cb23933995413371-679fdb8d44e80804634621-67b0e4a71e4f9423846246.gif', '2025-02-15 20:01:59', '2025-01-21 22:05:49', 'psorentino', 0),
(11, 'PARTOUCHE', 'Elie', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047-67b0e4b61e77c644756790.gif', '2025-02-15 20:02:14', '2025-01-21 22:06:47', 'epartouche', 0),
(12, 'SILBERSTEIN', 'Julien', 'frame-5-679179e5e5451056773441-67a1d72f1effd449327344.gif', '2025-02-04 10:00:31', '2025-01-22 00:16:44', 'jsilberstein', 1),
(13, 'DRÊCHE', 'Aristide', 'frame-5-678d88cb23933995413371-67a1d7eeb6ac6709108661.gif', '2025-02-04 10:03:42', '2025-01-22 00:19:16', 'adreche', 0),
(14, 'EL AMRANI', 'Billel', 'frame-5-679179e5e5451056773441-679a084952314630857458-67a1d7f8d8218372502300.gif', '2025-02-04 10:03:52', '2025-01-22 00:22:13', 'belamrani', 0),
(15, 'MARIE', 'Alexis', 'frame-3-67954547ecef0011385340-679cc3db6344d713279830-67a1d8038e900244722054.gif', '2025-02-04 10:04:03', '2025-01-22 00:23:24', 'amarie', 0),
(16, '', 'Marie-Laure', 'frame-8-678d62c12f32d669910956-67a1d87882a84447238306.gif', '2025-02-04 10:06:00', '2025-01-22 00:25:15', 'mlnoel', 0),
(17, 'ERRAJOUANI', 'Chakib', 'frame-5-679179e5e5451056773441-679a084952314630857458-67a1d92357d01466646584.gif', '2025-02-04 10:08:51', '2025-01-22 00:26:53', 'cerrajouani', 0),
(18, 'MAZEAU', 'Matthias', 'frame-4-678d87ae32dab447003034-67a1d914e03a6463146484.gif', '2025-02-04 10:08:36', '2025-01-22 00:28:25', 'mmazeau', 0),
(19, 'DUGBÉ', 'Prosper', 'frame-4-678d87ae32dab447003034-67a1d9081ec04493156675.gif', '2025-02-04 10:08:24', '2025-01-22 00:29:18', 'pdugbe', 0),
(20, 'ROELS', 'Catherine', 'frame-11-67902d99be1d5528035808-67a1d8fcbb994089994260.gif', '2025-02-04 10:08:12', '2025-01-22 01:17:09', 'croels', 1),
(21, 'VIALA', 'Vincent', 'frame-8-678d62c12f32d669910956-6798dde051863637386700-67a1d8ef25ba0504534719.gif', '2025-02-04 10:07:59', '2025-01-22 20:17:04', 'vviala', 0),
(22, 'RAAD', 'Nora', 'frame-5-678d88cb23933995413371-67a1ec3d34c87883179876.gif', '2025-02-04 11:30:21', '2025-01-24 21:21:53', 'nraad', 0),
(23, 'DENDENIS', 'Issam', 'frame-4-67902addb71eb427605808-67a1d8e047607174207591.gif', '2025-02-04 10:07:44', '2025-01-24 21:24:22', 'idendenis', 0),
(24, 'SILBERSTEIN', 'Madame', 'frame-5-679179e5e5451056773441-679a084952314630857458-67a1d8d464a78010825039.gif', '2025-02-04 10:07:32', '2025-01-25 21:10:47', 'msiblerstein', 0),
(25, 'STROMENGER', 'Anne-Catherine', 'frame-5-679179e5e5451056773441-67a1d8ca5a6a1073364238.gif', '2025-02-04 10:07:22', '2025-01-26 10:55:39', 'acstromenger', 0),
(26, 'SIMONET', 'Laure', 'frame-5-678d88cb23933995413371-67a1d8bf33a33880670201.gif', '2025-02-04 10:07:11', '2025-01-29 11:49:09', 'lsimonet', 0),
(27, 'BOZIN', 'Théodore', 'frame-5-679179e5e5451056773441-679a084952314630857458-67a1d8b29d850677042994.gif', '2025-02-04 10:06:58', '2025-01-29 11:50:18', 'tbozin', 0),
(28, 'BOULINGRIN', 'Muguette', 'frame-4-67902cdbe9901119699603-67a1d8a65d316095623463.gif', '2025-02-04 10:06:46', '2025-01-29 11:50:59', 'mboulingrin', 0),
(29, 'TETEGAN', 'Martine', 'frame-5-67903905cd773631613086-67a1d89937d7a033011822.gif', '2025-02-04 10:06:33', '2025-01-29 11:51:53', 'mtetegan', 0),
(32, 'DOUCOURE', 'Adja', 'frame-5-679179e5e5451056773441-679a084952314630857458-67a1d88f2dac4776645914.gif', '2025-02-04 10:06:23', '2025-01-31 13:36:43', 'adoucoure', 0),
(34, 'BUREL', 'Damien', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047-67b0e38406a1c779212955.gif', '2025-02-15 19:57:08', '2025-02-01 12:26:40', 'dburel', 0),
(35, 'DUBOIS', 'Damien', 'frame-5-678d88cb23933995413371-67a1d7e279e85032618578.gif', '2025-02-04 10:03:30', '2025-02-01 21:41:11', 'cdubois', 0),
(36, 'OUATTARA', 'Pekasso', 'frame-5-678d88cb23933995413371-679e04f052618491500159-67a1d7d5b0783452044791.gif', '2025-02-04 10:03:17', '2025-02-01 21:42:30', 'pouattara', 0),
(37, 'BA CHEIKH', 'Sadibou', 'frame-5-678d88cb23933995413371-67a1d7cac8292250958054.gif', '2025-02-04 10:03:06', '2025-02-01 21:46:28', 'sbacheikh', 0),
(38, 'BENMANSOUR', 'Anis', 'frame-5-678d88cb23933995413371-67a1d7ba641bf840609042.gif', '2025-02-04 10:02:50', '2025-02-01 22:00:47', 'abenmansour', 0),
(39, 'GRANIER', 'Manon', 'frame-5-678d88cb23933995413371-679e04f052618491500159-67a1d7ac93e04942514250.gif', '2025-02-04 10:02:36', '2025-02-02 20:08:53', 'mgranie', 0),
(40, 'BELMONTE-CAUSSIEU', 'Manon', 'frame-4-67902addb71eb427605808-67a1d79e8e456154020359.gif', '2025-02-04 10:02:22', '2025-02-03 16:26:50', 'ùbelmontecaussieu', 0),
(41, 'CHABIRA', 'Malika', 'frame-8-67902dce9ef00018424002-679a08138af96964409926-67b0e4fde00db918459228.gif', '2025-02-15 20:03:25', '2025-02-11 18:13:19', 'mchabira', NULL),
(42, 'DENDENIS', 'Zoubida', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047-67af88347a265522933583.gif', '2025-02-14 19:15:16', '2025-02-14 18:16:52', 'zdendenis', NULL),
(43, 'PAGNY', 'Florent', 'frame-28-67917aac7da72472337639-67af861aa9aa8106360195.gif', '2025-02-14 19:06:18', '2025-02-14 19:06:18', 'fpagny', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `plat_id`, `fromage_id`, `dessert_id`, `entree_id`) VALUES
(1, 2, 3, 2, 1),
(2, 3, 4, 1, 3),
(3, 4, 2, 3, 2),
(4, 2, 3, 1, 2),
(5, 4, 2, 2, 2),
(6, 5, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `thread_id` int DEFAULT NULL,
  `expediteur_id` int DEFAULT NULL,
  `destinataire_id` int DEFAULT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privatif` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `requerant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6BD307FE2904019` (`thread_id`),
  KEY `IDX_B6BD307F10335F61` (`expediteur_id`),
  KEY `IDX_B6BD307FA4F84F6E` (`destinataire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `thread_id`, `expediteur_id`, `destinataire_id`, `sujet`, `contenu`, `privatif`, `created_at`, `updated_at`, `requerant`) VALUES
(1, NULL, 12, 1, 'Salut salut !', 'Ceci est le premier message ici !', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 1, 12, NULL, 'j\'ai besoin d\'aide sur le dernier exercice', 'il est super dur en fait...\r\n\r\ncomment on fait?', 0, '2025-02-07 15:36:27', '2025-02-07 15:36:27', NULL),
(3, NULL, 12, 13, 'test expediteur', 'desolé Arikiller, c\'est juste un test0', 1, '2025-02-10 13:46:03', '2025-02-10 13:52:55', NULL),
(4, NULL, NULL, 25, 'Merci pour l\'Allemagne !', 'C\'était cool !', 1, '2025-02-13 13:07:59', '2025-02-13 13:07:59', 'M. Drêche'),
(5, NULL, NULL, 25, 'Merci pour l\'Allemagne !', 'C\'était cool, j\'insiste !', 1, '2025-02-13 13:10:33', '2025-02-13 13:10:33', 'M. Drêche'),
(6, NULL, 12, 2, 'do you are well?', 'please answer to me, english teacher !', 1, '2025-02-15 19:02:29', '2025-02-15 19:02:29', NULL),
(7, NULL, 13, 12, 'je te reponds a ton test', 'Non mais Tkt, pas de soucis, on va y arriver a ce projet a la con !', 1, '2025-02-15 20:09:28', '2025-02-15 20:09:28', NULL),
(8, NULL, NULL, 42, 'Bonjour', 'Comment ca va', 1, '2025-02-16 21:10:18', '2025-02-16 21:10:18', 'Monsieur El amrani'),
(9, NULL, 12, NULL, 'simple test', 'Ceci est un test', 1, '2025-02-17 09:26:00', '2025-02-17 09:26:00', NULL),
(10, NULL, 12, NULL, 'encore un test', 'j\'aime pas ca les test', 1, '2025-02-17 15:21:29', '2025-02-17 15:21:29', NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `titre`, `statut`) VALUES
(1, 'Le journal d\'Anne Frank', 'Disponible'),
(2, 'Rendez-vous avec Rama', 'Disponible'),
(3, 'Un sac de billes', 'Disponible'),
(4, 'Le petit chaperon rouge', 'Disponible'),
(5, 'My First English Book', 'Disponible'),
(6, 'Dune', 'Disponible'),
(7, 'Cendrille', 'Disponible');

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
(7, 18);

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
(24);

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
(34, '2020-01-01', '0146780100'),
(41, '2020-01-01', '0146780100'),
(42, '2020-01-01', '0146780100'),
(43, '2020-01-01', '0146780100');

-- --------------------------------------------------------

--
-- Structure de la table `planning_repas`
--

DROP TABLE IF EXISTS `planning_repas`;
CREATE TABLE IF NOT EXISTS `planning_repas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `repas_id` int NOT NULL,
  `membre_id` int NOT NULL,
  `date_achat` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_397FEB2C1D236AAA` (`repas_id`),
  KEY `IDX_397FEB2C6A99F74A` (`membre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `planning_repas`
--

INSERT INTO `planning_repas` (`id`, `repas_id`, `membre_id`, `date_achat`) VALUES
(1, 1, 1, '2025-02-11'),
(2, 1, 12, '2025-02-12'),
(3, 1, 12, '2025-02-15'),
(4, 1, 12, '2023-03-01');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `viande_id`, `legume_id`, `libelle`) VALUES
(1, 1, 1, 'Boeuf Bourguignon - pates'),
(2, 3, 5, 'Steak haché - Frites'),
(3, 4, 4, 'Cordon Bleu - Purée'),
(4, 2, 2, 'Escalope pané - Endives'),
(5, 3, 3, 'Steak haché - Ratatouille');

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
(34);

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
-- Structure de la table `professionnel`
--

DROP TABLE IF EXISTS `professionnel`;
CREATE TABLE IF NOT EXISTS `professionnel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise_id` int DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7A28C10FA4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professionnel`
--

INSERT INTO `professionnel` (`id`, `nom`, `prenom`, `email`, `telephone`, `entreprise_id`, `profession`) VALUES
(1, 'POTENCIER', 'Fabien', 'fpotencier@symfony.com', '0123456789', 1, 'developper'),
(2, 'FATOME', 'Thomas', 'tfatome@cnam.fr', '0123456789', 6, 'directeur'),
(3, 'PAGE', 'Larry', 'lpage@gmail.com', '0123456789', 5, 'directeur'),
(4, 'GUILLEMOT', 'Yves', 'yguillemot@ubisoft.com', '0123456789', 2, 'directeur');

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
  `prix` double NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A8D351B3CCD7E912` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id`, `menu_id`, `prix`, `date`, `heure`) VALUES
(1, 2, 4.5, '2025-02-20', 'Midi');

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
(25),
(42),
(43);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `responsable_id` int DEFAULT NULL,
  `date_fin` date NOT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `stagiaire_id` int NOT NULL,
  `entreprise_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C27C9369BBA93DD6` (`stagiaire_id`),
  KEY `IDX_C27C9369A4AEAFEA` (`entreprise_id`),
  KEY `IDX_C27C936953C59D72` (`responsable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id`, `responsable_id`, `date_fin`, `fonction`, `date_debut`, `stagiaire_id`, `entreprise_id`) VALUES
(1, 3, '2025-06-20', 'developpeur', '2025-03-03', 13, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_forum`
--

INSERT INTO `sub_forum` (`id`, `categorie_forum_id`, `libelle`, `description`) VALUES
(1, 1, 'Entraide', 'Pour que les élèves s\'aident entre eux');

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
(22),
(23);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `thread`
--

INSERT INTO `thread` (`id`, `sub_forum_id`, `createur_id`, `libelle`, `description`, `created_at`) VALUES
(1, 1, 12, 'Aidez moi !', 'venez moi en aide !', '2025-02-07 15:35:06'),
(2, 1, 12, 'Test SubForum', 'c\'est juste un test pour le createur', '2025-02-10 15:09:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `discrimination`) VALUES
(1, 'snaitkaci@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$uJRm.II4lpgdLGvqNcRWF.Ghh5eQhBIQfZA8zH5Cj9Hvz8wO32yLK', 'professeur'),
(2, 'ipalakot@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$PodgYYUMrdoP7Ldwp3jjheg3ACFFMYhNBd832P5DEJRbCPoRYDFO2', 'professeur'),
(3, 'glevy@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$jDGdvQ/i9lzMS9TeZnnHK.cIzhHRcjhmiBzRBtM4VFeBdDBV2Jnke', 'professeur'),
(4, 'eschaff@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$afE0c/ZH1o/w1FPtMpp3uubyWmFDQDEeo7eHeeV2.Fx.RInq/Uquu', 'professeur'),
(5, 'tblondeleau@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$wItrztaeXZoE/Xt5WiZ2W.yn8yePlZsmy0VIHR1exlTnLguI565U.', 'professeur'),
(6, 'sakhraoui@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$lQ8H6KjY2vzZ7ma712bKjO0IWJ2.0DFBTiw3rt7XjPxXR8FeeFFg6', 'professeur'),
(7, 'rbenhyahya@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$LtWBfx9GbJup7GBMrcg3ruhruXDzM614LIvaqYksXvPhYAtklVutS', 'professeur'),
(8, 'hthomas@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$Or2NGzsvkj2E7S1gIShPJe.RetrTMEYjz4u7Fhr7oSR/rnpMcSGjq', 'professeur'),
(9, 'gguyot@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$KGi5C8GzzcxJw8zD/u.xUuiisQrQ5OqP8ZAaNiwnQLTcBx.mg9kTS', 'professeur'),
(10, 'psorentino@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$PNzU8PtC/dsVB8reHzG1MOqfRjx0GUFl43BTCZ4ePuYEUuvcJOfQm', 'professeur'),
(11, 'epartouche@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$ujvzXpTKeolIxqPjnx6swuyTpr9rAoHFU3o3g3TvQjrA8bSl72ma6', 'professeur'),
(12, 'jsilberstein@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$BfSP9yGkU6QIc1ZG1zelmeuKmCnB/4DZClTWTdg3thVqIZ.WEzXeW', 'eleve'),
(13, 'adreche@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$joKkSZUAcaTwivDILI4Z3u9ocAu2.2bbk7nSF38raQaLhji4tUpyW', 'eleve'),
(14, 'belamrani@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$zJunRlK7UHVx9Y.bbyEV1.IP0r1ot78XOcDl2vgIdSP74eagdtxOO', 'eleve'),
(15, 'amarie@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA1\"]', '$2y$13$b4qRL/7Pb5jFZ/upGNgmr.KZyY9Uw1NI/arcIYeV7DAfhEBJ0lRf2', 'eleve'),
(16, 'mlnoel@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'eleve'),
(17, 'cerrajouani@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'eleve'),
(18, 'mmazeau@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA1\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'eleve'),
(19, 'pdugbe@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA1\"]', '$2y$13$JA10CC5PXo8kl2LxVKSNeOv21ZA92gWMWykQZKf09B6Tm.EPVAaCS', 'eleve'),
(20, 'croels@guinot.asso.fr', '[\"ROLE_DOCUMENTALISTE\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'documentaliste'),
(21, 'vviala@guinot.asso.fr', '[\"ROLE_ADMIN\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'admin'),
(22, 'nraad@guinot.asso.fr', '[\"ROLE_SURVEILLANT\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'surveillant'),
(23, 'idendenis@guinot.asso.fr', '[\"ROLE_SURVEILLANT\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'surveillant'),
(24, 'msiblerstein@guinot.asso.fr', '[\"ROLE_PARENTELEVE\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'parentEleve'),
(25, 'acstromenger@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'secretariat'),
(26, 'lsimonet@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'direction'),
(27, 'tbozin@guinot.asso.fr', '[\"ROLE_CUISINE\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'cuisine'),
(28, 'mboulingrin@guinot.asso.fr', '[\"ROLE_CUISINE\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'cuisine'),
(29, 'mtetegan@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'direction'),
(32, 'adoucoure@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_CRCD\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'eleve'),
(34, 'dburel@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$Vv149a7Mnjs02qRnzMLmA.W62R9eMfwZxrzaCRrVUYlQpstwnhqm2', 'professeur'),
(35, 'cdubois@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA1\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'eleve'),
(36, 'pouattara@guinot.asso.fr', '[\"ROLE_DA1\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'eleve'),
(37, 'sbacheikh@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_CRCD\"]', '$2y$13$gT1bxL/84uFl.yHCHm.Yg.UtzlC98ccWXiqD9JQZNTup9lhNYXHSm', 'eleve'),
(38, 'abenmansour@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_CRCD\"]', '$2y$13$RStpfMPzWuH2MqnigSeiG.AUVASgRPa2.GgxgbLNcTyuMWXHGQKha', 'eleve'),
(39, 'mgranie@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K2\"]', '$2y$13$ncnRluh7XGqSO1uTnuxpbedDUwKWiWIFu0x50HkXUzT1G8fHSy.9m', 'eleve'),
(40, 'ùbelmontecaussieu@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K5\"]', '$2y$13$K5yBk95eYLC9tYA7efkENu9cnaPU/6z5GoD678gXTewCjuMRXvBqe', 'eleve'),
(41, 'mchabira@guinot.asso.fr', '[\"ROLE_INSERTION\"]', '$2y$13$jucgeysJYkfR0JF2gyfWbuP8Y1KD/5ZiQcwkqu0DmwHSasGZ3Fe5W', 'insertion'),
(42, 'zdendenis@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$9Ok4ZGCHfAmAi2w8PU/SUOlDel2WysiQZhOC1BQK0vZHy2/MzGSQm', 'secretariat'),
(43, 'fpagny@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$IfJV1g6Q3Huv5BEP29foXeJSyYqbPJNTKFB74V2fL3Udr4yn6C3ga', 'secretariat');

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
  ADD CONSTRAINT `FK_364071D715D884B5` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrage` (`id`);

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
  ADD CONSTRAINT `FK_B6BD307F10335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_B6BD307FA4F84F6E` FOREIGN KEY (`destinataire_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `FK_B6BD307FE2904019` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`);

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
-- Contraintes pour la table `planning_repas`
--
ALTER TABLE `planning_repas`
  ADD CONSTRAINT `FK_397FEB2C1D236AAA` FOREIGN KEY (`repas_id`) REFERENCES `repas` (`id`),
  ADD CONSTRAINT `FK_397FEB2C6A99F74A` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`);

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
  ADD CONSTRAINT `FK_A8D351B3CCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

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
