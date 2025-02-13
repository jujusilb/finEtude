delete from professeur_matiere;
delete from emprunt;
delete from personnel;
delete from parent_eleve;
delete from adulte;
delete from secretariat;
delete from direction;
delete from cuisine;
delete from documentaliste;
delete from surveillant;
delete from professeur;
delete from eleve;
delete from promotion;
delete from referent;
delete from message;
delete from membre;
delete from ouvrage;
delete from matiere;




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
(25, 'STROMENGER', 'Anne-Catherine', 'frame-13-6796069c74ca4980827048.gif', '2025-01-26 10:55:40', '2025-01-26 10:55:39', 'secretariat'),
(26, 'SIMONET', 'Laure', 'frame-8-678d6639ac57b968593887-679a07a710dcb937510226.gif', '2025-01-29 11:49:11', '2025-01-29 11:49:09', 'direction'),
(27, 'BOZIN', 'Theodore', 'frame-7-679179b5e3c08724920997-679a07ea3846a238146169.gif', '2025-01-29 11:50:18', '2025-01-29 11:50:18', 'cuisine'),
(28, 'BOULINGRIN', 'Muguette', 'frame-8-67902dce9ef00018424002-679a08138af96964409926.gif', '2025-01-29 11:50:59', '2025-01-29 11:50:59', 'cuisine'),
(29, 'TETEGAN', 'Martine', 'frame-5-679179e5e5451056773441-679a084952314630857458.gif', '2025-01-29 11:51:53', '2025-01-29 11:51:53', 'direction');

INSERT INTO `message` (`id`, `membre_id`, `sujet`, `contenu`, `privatif`) VALUES
(1, 12, 'Salut salut !', 'Ceci est le premier message ici !', 0);

INSERT INTO `ouvrage` (`id`, `titre`, `statut`, `categorie`) VALUES
(1, 'Le journal d\'Anne Frank', 'Disponible', 'Drame'),
(2, 'Rendez-vous avec Rama', 'Disponible', 'Science-Fiction');

INSERT INTO `emprunt` (`id`, `ouvrage_id`, `membre_id`, `date_emprunt`, `statut`) VALUES
(1, 1, 1, '2025-01-09', 'En Cours');

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
(29);

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
(29, '2020-01-01', '0146780100');

INSERT INTO `direction` (`id`, `email`, `roles`, `password`) VALUES
(26, 'lsimonet@guinot.asso.fr', '[]', 'mdp'),
(29, 'mtetegan@guinot.asso.fr', '[]', 'mdp');

INSERT INTO `cuisine` (`id`, `email`, `roles`, `password`) VALUES
(27, 'tbozin@guinot.asso.fr', '[]', 'mdp'),
(28, 'mboulingrin@guinot.asso.fr', '[]', 'mdp');

INSERT INTO `admin` (`id`, `email`, `password`, `roles`) VALUES
(21, 'vviala@guinot.asso.fr', 'mdp', '[]');

INSERT INTO `documentaliste` (`id`, `email`, `roles`, `password`) VALUES
(20, 'croals@guinot.asso.fr', '[]', 'mdp');

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

INSERT INTO `professeur_matiere` (`professeur_id`, `matiere_id`) VALUES
(1, 6),
(2, 13),
(3, 13),
(4, 2),
(5, 15),
(6, 12),
(11, 16);

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

INSERT INTO `eleve` (`id`, `promotion_id`, `email`, `password`, `roles`) VALUES
(12, 2, 'Jsilberstein@guinot.asso.fr', 'mdp', '[\"ROLE_ADMIN\"]'),
(13, 2, 'adreche@guinot.asso.fr', 'mdp', '[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(14, 2, 'belamrani', 'mdp', '[]'),
(15, 1, 'amarie@guinot.asso.fr', 'mdp', '[]'),
(16, 2, 'mlnoel@guinot.asso.fr', 'mdp', '[]'),
(17, 2, 'cerrajouani', 'mdp', '[]'),
(18, 1, 'mmazeau@guinot.asso.fr', 'mdp', '[]'),
(19, 1, 'pdugbe', 'mdp', '[]');

INSERT INTO `parent_eleve` (`id`, `email`, `roles`, `password`) VALUES
(24, 'msilberstein@guinot.asso.fr', '[]', 'mdp');

INSERT INTO `secretariat` (`id`, `email`, `password`, `roles`) VALUES
(25, 'acstromenger@guinot.asso.fr', 'mdp', '[]');

INSERT INTO `surveillant` (`id`, `email`, `password`, `roles`) VALUES
(22, 'nraad@guinot.asso.fr', 'mdp', '[]'),
(23, 'idendenis@guinot.asso.fr', 'mdp', '[]');

