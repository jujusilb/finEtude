delete from cuisine;
delete from documentaliste;
delete from direction;
delete from secretariat;
delete from surveillant;
delete from professeur_matiere;
delete from programme;
delete from matiere;
delete from eleve;
delete from promotion;
delete from referent;
delete from professeur;
delete from emprunt;
delete from ouvrage;
delete from personnel;
delete from adulte;
delete from eleve;
delete from message;
delete from repas;
delete from membre;

delete from menu;
delete from entree;
delete from plat;
delete from viande;
delete from legume;

delete from fromage;
delete from dessert;





INSERT INTO `membre` (`id`, `nom`, `prenom`, `image_name`, `updated_at`, `created_at`, `discrimination`, `email`, `password`, `login`, `roles`) VALUES
(1, 'NAIT-KACI', 'Said', 'frame-8-6791798c64c3a978589670.gif', '2025-01-23 00:04:44', '2025-01-21 21:51:50', 'professeur', 'saidnaitk214@gmail.com', 'mdp', 'saidnaitk214', '[\"ROLE_USER\"]'),
(2, 'Palakott', 'Igor', 'frame-7-679179b5e3c08724920997.gif', '2025-01-23 00:05:25', '2025-01-21 21:52:44', 'professeur', 'ipalakot@guinot.asso.fr', 'mdp', 'ipalakot', '[\"ROLE_USER\"]'),
(3, 'LEVY', 'Gilles', 'frame-5-679179e5e5451056773441.gif', '2025-01-23 00:06:13', '2025-01-21 21:53:42', 'professeur', 'glevy@guinot.asso.fr', 'mdp', 'glevy', '[\"ROLE_USER\"]'),
(4, 'SCHAFF', 'Estelle', 'frame-10-67917a5371f04387910423.gif', '2025-01-23 00:08:03', '2025-01-21 21:56:49', 'professeur', 'eschaff@guinot.asso.fr', 'mdp', 'eschaff', '[\"ROLE_USER\"]'),
(5, 'BLONDELEAU', 'Thomas', 'frame-10-67917a8564cee680425329.gif', '2025-01-23 00:08:53', '2025-01-21 21:58:23', 'professeur', 'tblondeleau@guinot.fr', 'mdp', 'tblondeleau', '[\"ROLE_USER\"]'),
(6, 'SRALAOUI', 'Mabrook', 'frame-28-67917aac7da72472337639.gif', '2025-01-23 00:09:32', '2025-01-21 22:00:19', 'professeur', 'msralaoui', 'mdp', 'msralaoui', '[\"ROLE_USER\"]'),
(7, 'BENYAHYA', 'Rachida', 'frame-15-67900b313fc80340102943.gif', '2025-01-21 22:01:37', '2025-01-21 22:01:37', 'professeur', 'rbenyahya', 'mdp', 'rbenyahaya', '[\"ROLE_USER\"]'),
(8, 'THOMAS', 'Hadrien', 'frame-14-67900b75a1278808189194.gif', '2025-01-21 22:02:45', '2025-01-21 22:02:45', 'professeur', 'hthomas@guinot.fr', 'mdp', 'hthomas', '[\"ROLE_USER\"]'),
(9, 'GUYOT', 'Gregory', 'frame-11-67900babe4753667175215.gif', '2025-01-21 22:03:39', '2025-01-21 22:03:39', 'professeur', 'gguyot@guinot.fr', 'mdp', 'gguyot', '[\"ROLE_USER\"]'),
(10, 'SORENTINO', 'Patrice', 'frame-9-67900c2de2613418178975.gif', '2025-01-21 22:05:49', '2025-01-21 22:05:49', 'professeur', 'psorentino', 'mdp', 'psorentino', '[\"ROLE_USER\"]'),
(11, 'PARTOUCHE', 'Elie', 'frame-4-67917a1f1c508271854689.gif', '2025-01-23 00:07:11', '2025-01-21 22:06:47', 'professeur', 'epartouche', 'mdp', 'epartouche', '[\"ROLE_USER\"]'),
(12, 'SILBERSTEIN', 'Julien', 'frame-4-67902addb71eb427605808-679e8ca13dfe6183433295.gif', '2025-02-01 22:05:37', '2025-01-22 00:16:44', 'eleve', 'Jsilberstein@guinot.asso.fr', 'mdp', 'jsilberstein', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]'),
(13, 'DRECHE', 'Aristide', 'frame-5-678d88cb23933995413371-679e8cbb194ee501766697.gif', '2025-02-01 22:06:03', '2025-01-22 00:19:16', 'eleve', 'adreche@guinot.asso.fr', 'mdp', 'adreche', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]'),
(14, 'EL AMRANI', 'BILLEL', 'frame-4-67902addb71eb427605808-679e8ccb5ea79772685494.gif', '2025-02-01 22:06:19', '2025-01-22 00:22:13', 'eleve', 'belamrani', 'mdp', 'belamrani', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]'),
(15, 'MARIE', 'Alexis', 'frame-3-67954547ecef0011385340-679cc2cd8a46e473117599-679e8dc43ae6f960658594.gif', '2025-02-01 22:10:28', '2025-01-22 00:23:24', 'eleve', 'amarie@guinot.asso.fr', 'mdp', 'amarie', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]'),
(16, 'NOËL', 'Marie-Laure', 'frame-5-679179e5e5451056773441-679e8e034684f943346259.gif', '2025-02-01 22:11:31', '2025-01-22 00:25:15', 'eleve', 'mlnoel@guinot.asso.fr', 'mdp', 'mlnoel', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]'),
(17, 'ERRAJOUANI', 'Chakib', 'frame-5-678d88cb23933995413371-679e8e1dc0b1f578402425.gif', '2025-02-01 22:11:57', '2025-01-22 00:26:53', 'eleve', 'cerrajouani@guinot.asso.fr', 'mdp', 'cerrajouani', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA2\"]'),
(18, 'MAZEAU', 'Matthias', 'frame-5-678d88cb23933995413371-679e8e6558112405367304.gif', '2025-02-01 22:13:09', '2025-01-22 00:28:25', 'eleve', 'mmazeau@guinot.asso.fr', 'mdp', 'mmazeau', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]'),
(19, 'DUGBE', 'Prosper', 'frame-3-67954547ecef0011385340-679e8e7a01feb375976576.gif', '2025-02-01 22:13:30', '2025-01-22 00:29:18', 'eleve', 'pdugbe', 'mdp', 'pdugbe', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]'),
(20, 'ROALS', 'Catherine', 'frame-5-67903905cd773631613086.gif', '2025-01-22 01:17:09', '2025-01-22 01:17:09', 'documentaliste', 'croals@guinot.asso.fr', 'mdp', 'croals', '[\"ROLE_DOCUMENTALISTE\"]'),
(21, 'VIALA', 'Vincent', 'frame-9-6791443365455859557030.gif', '2025-01-22 20:17:07', '2025-01-22 20:17:04', 'admin', 'vviala@guinot.asso.fr', 'mdp', 'vviala', '[\"ROLE_ADMIN\"]'),
(22, 'RAAD', 'NORA', 'frame-10-6793f66222800884008053.gif', '2025-01-24 21:21:54', '2025-01-24 21:21:53', 'surveillant', 'nraad@guinot.asso.fr', 'mdp', 'nraad', '[\"ROLE_SURVEILLANT\"]'),
(23, 'DENDENIS', 'Issam', 'frame-1-6793f6f700784628138685.gif', '2025-01-24 21:24:23', '2025-01-24 21:24:22', 'surveillant', 'idendenis@guinot.asso.fr', 'mdp', 'idendenis', '[\"ROLE_SURVEILLANT\"]'),
(24, 'SILBERSTEIN', 'Madame', 'frame-3-67954547ecef0011385340.gif', '2025-01-25 21:10:47', '2025-01-25 21:10:47', 'parentEleve', 'msilberstein@guinot.asso.fr', 'mdp', 'msilberstein', '[\"ROLE_PARENTELEVE\"]'),
(25, 'STROMENGER', 'Anne-Catherine', 'frame-13-6796069c74ca4980827048.gif', '2025-01-26 10:55:40', '2025-01-26 10:55:39', 'secretariat', 'acstromenger@guinot.asso.fr', 'mdp', 'acstromenger', '[\"ROLE_SECRETARIAT\"]'),
(26, 'SIMONET', 'Laure', 'frame-8-678d6639ac57b968593887-679a07a710dcb937510226.gif', '2025-01-29 11:49:11', '2025-01-29 11:49:09', 'direction', 'lsimonet@guinot.asso.fr', 'mdp', 'lsimonet', '[\"ROLE_DIRECTION\"]'),
(27, 'BOZIN', 'Theodore', 'frame-7-679179b5e3c08724920997-679a07ea3846a238146169.gif', '2025-01-29 11:50:18', '2025-01-29 11:50:18', 'cuisine', 'tbozin@guinot.asso.fr', 'mdp', 'tbozin', '[\"ROLE_CUISINE\"]'),
(28, 'BOULINGRIN', 'Muguette', 'frame-8-67902dce9ef00018424002-679a08138af96964409926.gif', '2025-01-29 11:50:59', '2025-01-29 11:50:59', 'cuisine', 'mboulingrin@guinot.asso.fr', 'mdp', 'mboulingrin', '[\"ROLE_CUISINE\"]'),
(29, 'TETEGAN', 'Martine', 'frame-5-679179e5e5451056773441-679a084952314630857458.gif', '2025-01-29 11:51:53', '2025-01-29 11:51:53', 'direction', 'mtetegan@guinot.asso.fr', 'mdp', 'mtetegan', '[\"ROLE_DIRECTION\"]'),
(32, 'DOUCOURE', 'ADJA', 'frame-5-679179e5e5451056773441-679a084952314630857458-679e8e8a9da91432149836.gif', '2025-02-01 22:13:46', '2025-01-31 13:36:43', 'eleve', 'adoucoure@guinot.asso.fr', 'mdp', 'adoucoure', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_CRCD\"]'),
(34, 'BUREL', 'Damien', 'frame-5-678d88cb23933995413371-679e04f052618491500159.gif', '2025-02-01 12:26:40', '2025-02-01 12:26:40', 'professeur', 'dburel@guinot.asso.fr', 'mdp', 'dburel', '[\"ROLE_PROFESSEUR\"]'),
(35, 'DUBOIS', 'Corentin', 'frame-1-67902d3dc1d32086559979-679e03d49b77f786054139-679e8e52e63e1225655723.gif', '2025-02-01 22:12:50', '2025-02-01 21:41:11', 'eleve', 'cdubois@guinot.asso.fr', 'mdp', 'cdubois', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]'),
(36, 'OUATTARA', 'Pekasso', 'frame-4-67917a1f1c508271854689-679e8e382b0e6668029868.gif', '2025-02-01 22:12:24', '2025-02-01 21:42:30', 'eleve', 'pouattara@guinot.asso.fr', 'mdp', 'pouattara', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_DA1\"]'),
(37, 'BA CHEIKH', 'Sadibou', 'frame-5-678d88cb23933995413371-679e8c75d3d32405802047.gif', '2025-02-01 22:04:53', '2025-02-01 21:46:28', 'eleve', 'sBaCheikh@guinot.asso.fr', 'mdp', 'sbacheikh', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_CRCD\"]'),
(38, 'BENMANSOUR', 'Anis', 'frame-4-67902addb71eb427605808-679e8b7f87ba1804386386.gif', '2025-02-01 22:00:47', '2025-02-01 22:00:47', 'eleve', 'abenmansour@guinot.asso.fr', 'mdp', 'abenmansour', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_CRCD\"]'),
(39, 'GRANIER', 'Manon', 'frame-5-678d88cb23933995413371-679fdb8d44e80804634621.gif', '2025-02-02 21:54:37', '2025-02-02 20:08:53', 'eleve', 'mgranier@guinot.asso.fr', 'mdp', 'mgranier', '[\"ROLE_ELEVE\", \"ROLE_USER\", \"ROLE_K2\"]');


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

--
-- Déchargement des données de la table `admin`
--
INSERT INTO `admin` (`id`) VALUES
(21);



--
-- Déchargement des données de la table `cuisine`
--
INSERT INTO `cuisine` (`id`) VALUES
(27),
(28);

--
-- Déchargement des données de la table `direction`
--
INSERT INTO `direction` (`id`) VALUES
(26),
(29);

--
-- Déchargement des données de la table `documentaliste`
--
INSERT INTO `documentaliste` (`id`) VALUES
(20);

--
-- Déchargement des données de la table `message`
--
INSERT INTO `message` (`id`, `membre_id`, `sujet`, `contenu`, `privatif`) VALUES
(1, 12, 'Salut salut !', 'Ceci est le premier message ici !', 0);



--
-- Déchargement des données de la table `parent_eleve`
--
INSERT INTO `parent_eleve` (`id`) VALUES
(24);



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


--
-- Déchargement des données de la table `secretariat`
--

INSERT INTO `secretariat` (`id`) VALUES
(25);


--
-- Déchargement des données de la table `surveillant`
--

INSERT INTO `surveillant` (`id`) VALUES
(22),
(23);


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

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`id`, `titre`, `statut`, `categorie`) VALUES
(1, 'Le journal d\'Anne Frank', 'Disponible', 'Drame'),
(2, 'Rendez-vous avec Rama', 'Disponible', 'Science-Fiction');



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


--
-- Déchargement des données de la table `emprunt`
--
INSERT INTO `emprunt` (`id`, `ouvrage_id`, `membre_id`, `date_emprunt`, `statut`) VALUES
(1, 1, 1, '2025-01-09', 'En Cours');



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


--
-- Déchargement des données de la table `eleve`
--
INSERT INTO `eleve` (`id`, `promotion_id`) VALUES
(12, 2),
(13, 2),
(14, 2),
(15, 1),
(16, 2),
(17, 2),
(18, 1),
(19, 1),
(32, 5),
(35, 1),
(36, 1),
(37, 5),
(38, 5),
(39, 8);


--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`id`, `libelle`) VALUES
(1, 'Profiterolles'),
(2, 'Banana split'),
(3, 'Tarte aux pommes');



--
-- Déchargement des données de la table `fromage`
--

INSERT INTO `fromage` (`id`, `libelle`) VALUES
(1, 'Camembert'),
(2, 'Gorgonzola'),
(3, 'Brie'),
(4, 'Saint-Nectaire'),
(5, 'Fourme d\'Ambert');

--
-- Déchargement des données de la table `entree`
--

INSERT INTO `entree` (`id`, `libelle`) VALUES
(1, 'Oeufs mimosa'),
(2, 'Poireaux Vinaigrette'),
(3, 'Feuilleté au fromage');




--
-- Déchargement des données de la table `viande`
--

INSERT INTO `viande` (`id`, `libelle`) VALUES
(1, 'Boeuf Bourguignon'),
(2, 'Escalope pané'),
(3, 'Steak haché'),
(4, 'Cordon Bleu');



--
-- Déchargement des données de la table `legume`
--

INSERT INTO `legume` (`id`, `libelle`) VALUES
(1, 'pates'),
(2, 'Endives'),
(3, 'Ratatouille'),
(4, 'Purée'),
(5, 'Frites');


--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `libelle`, `viande_id`, `legume_id`) VALUES
(1, NULL, 1, 1),
(2, NULL, 3, 5),
(3, NULL, 4, 4),
(4, NULL, 2, 2);

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `plat_id`, `fromage_id`, `dessert_id`, `entree_id`) VALUES
(1, 2, 3, 2, 1),
(2, 3, 4, 1, 3),
(3, 4, 2, 3, 2);


--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id`, `menu_id`, `membre_id`, `prix`, `date`, `heure`, `date_achat`) VALUES
(1, 2, 1, 4.5, '2025-02-20', 'Midi', '2025-02-02');