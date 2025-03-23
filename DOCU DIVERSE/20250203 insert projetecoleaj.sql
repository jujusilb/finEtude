
--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(21);


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
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `ouvrage_id`, `membre_id`, `date_emprunt`, `statut`) VALUES
(1, 1, 1, '2025-01-09', 'En Cours');














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

INSERT INTO `secretariat` (`id`, `email`, `password`, `roles`, `login`) VALUES
(25, 'acstromenger@guinot.asso.fr', 'mdp', '[\"ROLE_SECRETARIAT\"]', 'acstromenger');


--
-- Déchargement des données de la table `surveillant`
--

INSERT INTO `surveillant` (`id`, `email`, `password`, `roles`, `login`) VALUES
(22, 'nraad@guinot.asso.fr', 'mdp', '[\"ROLE_SURVEILLANT\"]', 'nraad'),
(23, 'idendenis@guinot.asso.fr', 'mdp', '[\"ROLE_SURVEILLANT\"]', 'idendenis');




