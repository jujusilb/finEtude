-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 26 jan. 2025 à 11:41
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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
CREATE DATABASE IF NOT EXISTS `projetecoleaj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetecoleaj`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `admin`:
--   `id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `roles`) VALUES
(21, 'vviala@guinot.asso.fr', 'mdp', '[]');

-- --------------------------------------------------------

--
-- Structure de la table `adulte`
--
-- Création : lun. 20 jan. 2025 à 08:02
-- Dernière modification : dim. 26 jan. 2025 à 09:55
--

DROP TABLE IF EXISTS `adulte`;
CREATE TABLE `adulte` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `adulte`:
--   `id`
--       `membre` -> `id`
--

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
(25);

-- --------------------------------------------------------

--
-- Structure de la table `cuisine`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `cuisine`;
CREATE TABLE `cuisine` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `cuisine`:
--   `id`
--       `membre` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `documentaliste`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `documentaliste`;
CREATE TABLE `documentaliste` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `documentaliste`:
--   `id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `documentaliste`
--

INSERT INTO `documentaliste` (`id`, `email`, `roles`, `password`) VALUES
(20, 'croals@guinot.asso.fr', '[]', 'mdp');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `eleve`:
--   `promotion_id`
--       `promotion` -> `id`
--   `id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id`, `promotion_id`, `email`, `password`, `roles`) VALUES
(12, 2, 'Jsilberstein@guinot.asso.fr', 'mdp', '[\"ROLE_ADMIN\"]'),
(13, 2, 'adreche@guinot.asso.fr', 'mdp', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(14, 2, 'belamrani', 'mdp', '[]'),
(15, 1, 'amarie@guinot.asso.fr', 'mdp', '[]'),
(16, 2, 'mlnoel@guinot.asso.fr', 'mdp', '[]'),
(17, 2, 'cerrajouani', 'mdp', '[]'),
(18, 1, 'mmazeau@guinot.asso.fr', 'mdp', '[]'),
(19, 1, 'pdugbe', 'mdp', '[]');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--
-- Création : lun. 20 jan. 2025 à 08:02
-- Dernière modification : dim. 26 jan. 2025 à 09:51
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `ouvrage_id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `date_emprunt` date NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `emprunt`:
--   `ouvrage_id`
--       `ouvrage` -> `id`
--   `membre_id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `ouvrage_id`, `membre_id`, `date_emprunt`, `statut`) VALUES
(1, 1, 1, '2025-01-09', 'En Cours');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `exercice`;
CREATE TABLE `exercice` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `exercice`:
--

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `matiere`:
--

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
(20, 'Musique');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--
-- Création : sam. 25 jan. 2025 à 20:46
-- Dernière modification : dim. 26 jan. 2025 à 09:55
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `discrimination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `membre`:
--

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
(12, 'SILBERSTEIN', 'Julien', 'frame-4-67902addb71eb427605808.gif', '2025-01-22 00:16:45', '2025-01-22 00:16:44', 'eleve'),
(13, 'DRECHE', 'Aristide', 'frame-10-67902b748181b346639290.gif', '2025-01-22 00:19:16', '2025-01-22 00:19:16', 'eleve'),
(14, 'EL AMRANI', 'BILLEL', 'frame-6-67902c258dd29503246620.gif', '2025-01-22 00:22:13', '2025-01-22 00:22:13', 'eleve'),
(15, 'MARIE', 'Alexis', 'frame-11-67902c6cdc31e434632906.gif', '2025-01-22 00:23:24', '2025-01-22 00:23:24', 'eleve'),
(16, 'NOËL', 'Marie-Laure', 'frame-4-67902cdbe9901119699603.gif', '2025-01-22 00:25:15', '2025-01-22 00:25:15', 'eleve'),
(17, 'ERRAJOUANI', 'Chakib', 'frame-1-67902d3dc1d32086559979.gif', '2025-01-22 00:26:53', '2025-01-22 00:26:53', 'eleve'),
(18, 'MAZEAU', 'Matthias', 'frame-11-67902d99be1d5528035808.gif', '2025-01-22 00:28:25', '2025-01-22 00:28:25', 'eleve'),
(19, 'DUGBE', 'Prosper', 'frame-8-67902dce9ef00018424002.gif', '2025-01-22 00:29:18', '2025-01-22 00:29:18', 'eleve'),
(20, 'ROALS', 'Catherine', 'frame-5-67903905cd773631613086.gif', '2025-01-22 01:17:09', '2025-01-22 01:17:09', 'documentaliste'),
(21, 'VIALA', 'Vincent', 'frame-9-6791443365455859557030.gif', '2025-01-22 20:17:07', '2025-01-22 20:17:04', 'admin'),
(22, 'RAAD', 'NORA', 'frame-10-6793f66222800884008053.gif', '2025-01-24 21:21:54', '2025-01-24 21:21:53', 'surveillant'),
(23, 'DENDENIS', 'Issam', 'frame-1-6793f6f700784628138685.gif', '2025-01-24 21:24:23', '2025-01-24 21:24:22', 'surveillant'),
(24, 'SILBERSTEIN', 'Madame', 'frame-3-67954547ecef0011385340.gif', '2025-01-25 21:10:47', '2025-01-25 21:10:47', 'parentEleve'),
(25, 'STROMENGER', 'Anne-Catherine', 'frame-13-6796069c74ca4980827048.gif', '2025-01-26 10:55:40', '2025-01-26 10:55:39', 'secretariat');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--
-- Création : sam. 25 jan. 2025 à 11:04
-- Dernière modification : sam. 25 jan. 2025 à 11:05
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `sujet` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `privatif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `message`:
--   `membre_id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `membre_id`, `sujet`, `contenu`, `privatif`) VALUES
(1, NULL, 'Salut salut !', 'Ceci est le premier message ici !', 0);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--
-- Création : sam. 25 jan. 2025 à 20:46
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `messenger_messages`:
--

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--
-- Création : ven. 24 jan. 2025 à 21:58
-- Dernière modification : sam. 25 jan. 2025 à 09:56
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE `ouvrage` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `ouvrage`:
--

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
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `parent_eleve`;
CREATE TABLE `parent_eleve` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `parent_eleve`:
--   `id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `parent_eleve`
--

INSERT INTO `parent_eleve` (`id`, `email`, `roles`, `password`) VALUES
(24, 'msilberstein@guinot.asso.fr', '[]', 'mdp');

-- --------------------------------------------------------

--
-- Structure de la table `parent_eleve_eleve`
--
-- Création : sam. 25 jan. 2025 à 18:16
-- Dernière modification : sam. 25 jan. 2025 à 20:10
--

DROP TABLE IF EXISTS `parent_eleve_eleve`;
CREATE TABLE `parent_eleve_eleve` (
  `parent_eleve_id` int(11) NOT NULL,
  `eleve_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `parent_eleve_eleve`:
--   `parent_eleve_id`
--       `parent_eleve` -> `id`
--   `eleve_id`
--       `eleve` -> `id`
--

--
-- Déchargement des données de la table `parent_eleve_eleve`
--

INSERT INTO `parent_eleve_eleve` (`parent_eleve_id`, `eleve_id`) VALUES
(24, 12);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--
-- Création : lun. 20 jan. 2025 à 08:02
-- Dernière modification : dim. 26 jan. 2025 à 09:55
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `date_embauche` date NOT NULL,
  `poste` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `personnel`:
--   `id`
--       `membre` -> `id`
--

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
(25, '2020-01-01', '01467801100');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE `professeur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `professeur`:
--   `id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id`, `email`, `password`, `roles`) VALUES
(1, 'saidnaitk214@gmail.com', 'mdp', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(2, 'ipalakott@guinot.asso.fr', 'mdp', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(3, 'glevy@guinot.asso.fr', 'mdp', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(4, 'eschaft@guinot.asso.fr', 'mdp', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(5, 'tblondeleau@guinot.fr', 'mdp', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(6, 'msralaoui', 'mdp', '[]'),
(7, 'rbenyahya', 'mdp', '[]'),
(8, 'hthomas@guinot.fr', 'mdp', '[]'),
(9, 'gguyot@guinot.fr', 'mdp', '[]'),
(10, 'psorentino', 'mdp', '[]'),
(11, 'epartouche', 'mdp', '[]');

-- --------------------------------------------------------

--
-- Structure de la table `professeur_matiere`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `professeur_matiere`;
CREATE TABLE `professeur_matiere` (
  `professeur_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `professeur_matiere`:
--   `professeur_id`
--       `professeur` -> `id`
--   `matiere_id`
--       `matiere` -> `id`
--

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
(11, 16);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `referent_id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `promotion`:
--   `referent_id`
--       `referent` -> `id`
--

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
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `referent`;
CREATE TABLE `referent` (
  `id` int(11) NOT NULL,
  `professeur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `referent`:
--   `professeur_id`
--       `professeur` -> `id`
--

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
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `remplir_exo`;
CREATE TABLE `remplir_exo` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `remplir_exo`:
--

-- --------------------------------------------------------

--
-- Structure de la table `secretariat`
--
-- Création : lun. 20 jan. 2025 à 08:02
-- Dernière modification : dim. 26 jan. 2025 à 09:55
--

DROP TABLE IF EXISTS `secretariat`;
CREATE TABLE `secretariat` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `secretariat`:
--   `id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `secretariat`
--

INSERT INTO `secretariat` (`id`, `email`, `password`, `roles`) VALUES
(25, 'acstromenger@guinot.asso.fr', 'mdp', '[]');

-- --------------------------------------------------------

--
-- Structure de la table `surveillant`
--
-- Création : ven. 24 jan. 2025 à 19:07
--

DROP TABLE IF EXISTS `surveillant`;
CREATE TABLE `surveillant` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `surveillant`:
--   `id`
--       `membre` -> `id`
--

--
-- Déchargement des données de la table `surveillant`
--

INSERT INTO `surveillant` (`id`, `email`, `password`, `roles`) VALUES
(22, 'nraad@guinot.asso.fr', 'mdp', '[]'),
(23, 'idendenis@guinot.asso.fr', 'mdp', '[]');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
-- Création : lun. 20 jan. 2025 à 08:02
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `user`:
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `adulte`
--
ALTER TABLE `adulte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `documentaliste`
--
ALTER TABLE `documentaliste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_ECA105F7139DF194` (`promotion_id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_364071D715D884B5` (`ouvrage_id`),
  ADD KEY `IDX_364071D76A99F74A` (`membre_id`);

--
-- Index pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6BD307F6A99F74A` (`membre_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parent_eleve`
--
ALTER TABLE `parent_eleve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parent_eleve_eleve`
--
ALTER TABLE `parent_eleve_eleve`
  ADD PRIMARY KEY (`parent_eleve_id`,`eleve_id`),
  ADD KEY `IDX_98ED0A6E95A16B63` (`parent_eleve_id`),
  ADD KEY `IDX_98ED0A6EA6CC7B2` (`eleve_id`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professeur_matiere`
--
ALTER TABLE `professeur_matiere`
  ADD PRIMARY KEY (`professeur_id`,`matiere_id`),
  ADD KEY `IDX_FBC82ABCBAB22EE9` (`professeur_id`),
  ADD KEY `IDX_FBC82ABCF46CD258` (`matiere_id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C11D7DD135E47E35` (`referent_id`);

--
-- Index pour la table `referent`
--
ALTER TABLE `referent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_FE9AAC6CBAB22EE9` (`professeur_id`);

--
-- Index pour la table `remplir_exo`
--
ALTER TABLE `remplir_exo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `secretariat`
--
ALTER TABLE `secretariat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `surveillant`
--
ALTER TABLE `surveillant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `referent`
--
ALTER TABLE `referent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `remplir_exo`
--
ALTER TABLE `remplir_exo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `FK_17A55299BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `professeur_matiere`
--
ALTER TABLE `professeur_matiere`
  ADD CONSTRAINT `FK_FBC82ABCBAB22EE9` FOREIGN KEY (`professeur_id`) REFERENCES `professeur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FBC82ABCF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`) ON DELETE CASCADE;

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
-- Contraintes pour la table `secretariat`
--
ALTER TABLE `secretariat`
  ADD CONSTRAINT `FK_F0C364B5BF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `surveillant`
--
ALTER TABLE `surveillant`
  ADD CONSTRAINT `FK_960905BABF396750` FOREIGN KEY (`id`) REFERENCES `membre` (`id`) ON DELETE CASCADE;


--
-- Métadonnées
--
USE `phpmyadmin`;

--
-- Métadonnées pour la table admin
--

--
-- Métadonnées pour la table adulte
--

--
-- Métadonnées pour la table cuisine
--

--
-- Métadonnées pour la table documentaliste
--

--
-- Métadonnées pour la table eleve
--

--
-- Métadonnées pour la table emprunt
--

--
-- Métadonnées pour la table exercice
--

--
-- Métadonnées pour la table matiere
--

--
-- Métadonnées pour la table membre
--

--
-- Déchargement des données de la table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'projetecoleaj', 'membre', '{\"CREATE_TIME\":\"2025-01-20 00:29:34\",\"sorted_col\":\"`membre`.`discrimination` ASC\"}', '2025-01-26 09:53:14');

--
-- Métadonnées pour la table message
--

--
-- Métadonnées pour la table messenger_messages
--

--
-- Métadonnées pour la table ouvrage
--

--
-- Métadonnées pour la table parent_eleve
--

--
-- Métadonnées pour la table parent_eleve_eleve
--

--
-- Métadonnées pour la table personnel
--

--
-- Métadonnées pour la table professeur
--

--
-- Métadonnées pour la table professeur_matiere
--

--
-- Métadonnées pour la table promotion
--

--
-- Métadonnées pour la table referent
--

--
-- Métadonnées pour la table remplir_exo
--

--
-- Métadonnées pour la table secretariat
--

--
-- Métadonnées pour la table surveillant
--

--
-- Métadonnées pour la table user
--

--
-- Métadonnées pour la base de données projetecoleaj
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
