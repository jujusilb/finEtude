delete from planning_repas;
delete from repas;
delete from menu;
delete from plat;
delete from professeur_matiere;
delete from programme;
delete from emprunt;
delete from ouvrage;
delete from commande;
delete from produit;
delete from sub_forum;
delete from categorie_forum;
delete from membre_jeton;
delete from message;
delete from membre;
delete from user;
delete from professionnel;
delete from promotion;
delete from salle;
delete from etage;
delete from ouvrage;
delete from personnel;
delete from cuisine;
delete from documentaliste;

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `discrimination`) VALUES
(1, 'jdoe@guinot.asso.fr', '[]', 'mdp', 'membre'),
(2, 'snait-kaci@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$hWOHdy31AE8m3NspmWIuFuwoWC8SUZUl/IFL4X3YdIigeAQikoqKG', 'professeur'),
(3, 'glevy@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$v/oOrnAkbsPiAvEsxwY5UO3XTubhJ1JDCz1CwX6ec4nqTr.FCwHHi', 'professeur'),
(4, 'ipalafot@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$9cMUaegw7PltGQad/zyChelB6S.WqLLhCR9JvyHqJhyNLOze/guH6', 'professeur'),
(5, 'eschaff@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$OHAXt55IlEfKimdyA8IBfeYcSI.UHiVWOHZglOk5jKF2mG9QjE/9S', 'professeur'),
(6, 'vviala@guinot.asso.fr', '[\"ROLE_ADMIN\"]', '$2y$13$dx2ZPEIMNBIl/w6cvfpo/u3.R02MsmbNl.TXNc/1LhRP4JPh1d802', 'admin'),
(7, 'jsilberstein@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$B9MJme0lH0PQ9xokAxayQODuNfJScRJOPxm1nIomfuTA616nYDswa', 'eleve'),
(8, 'adreche@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$nu2js7hKqe2jxPpX93.CYubyN42nfP0nxOcaQ12d2d4PG79VOpxpK', 'eleve'),
(9, 'mlnoel@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA2\"]', '$2y$13$5dYfF4zX8Zu/sn1/VMRwsuTrEhU3LxR5ZLeoAlErYPsmCCkFpQ3rC', 'eleve'),
(10, 'amarie@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA1\"]', '$2y$13$HlqHPoF49YyQYdNYBp7r.u3AJICCYHZkmnoqnh2iZgiy/TGZzeXS.', 'eleve'),
(11, 'cdubois@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA1\"]', '$2y$13$oL3bx12snVgqPWRBJWVcSO9cCMV14CeO0zu3NYWd7XwKRGR.dd0Hm', 'eleve'),
(12, 'mmazeau@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_DA1\"]', '$2y$13$rCNs07AUE1apy0IBVVz/wemmyqEzHg4Dr.lRKORS3ipVS./715MQO', 'eleve'),
(13, 'mchabira@guinot.asso.fr', '[\"ROLE_INSERTION\"]', '$2y$13$E4URidk9v24tMaR2nRxNgOUvwPma/eyw.zA3y/8sFuYAf.zDP0o7S', 'insertion'),
(14, 'dburel@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$fHcMtwTfQOn12wtujFUxk.4LmjtytrROfJICmxjuRgq6PYuurQ/ni', 'professeur'),
(15, 'mkheiar@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$84u90djRyiemsfmNI6zhY.MNvymItMlZVifcLgjK6a8nuPjM1adt.', 'secretariat'),
(16, 'cperrin@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$qJufwh7mYId6BvtxIqiYAOD0JkLJCXfbYY5MtKePiz7wesTWcqsP6', 'direction'),
(17, 'lterendij@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_PMK\"]', '$2y$13$SM7RfYB27EnKZWJ360Od4.QzbCSQwDJty3uNGClMmzZDnw4PFgSxO', 'eleve'),
(18, 'tblondeleau@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$shhfZOfzOEZ6tUX7JHTBKOwmKh1Ro270qNytNYOrlKNFnlZaTmrky', 'professeur'),
(19, 'rbenyahya@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$T7nVN5AGcGH5w1nbWUCRIe/Csgd5rYwK2QEXvQuCLS/AcPeBkrIa.', 'professeur'),
(20, 'msakhraoui@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$eRf8IfVnK18pVH7z1jLs9./qgUN79OJVq616kE9Hc5eZmBlJjm6Ee', 'professeur'),
(21, 'hthomas@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$9Grk6W2/onisg.FU37ghPuMt8cQrCXnIO/OzRS4rhenw9usdaepNS', 'professeur'),
(22, 'mduveau-hoaurau@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$C8FKQyP8gJq4oTgbnhfXsec53gpMs.V3a7G/bUG62lB6ZWVfM2z96', 'professeur'),
(23, 'ejeanson@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$RUlNguxqvhiCLRkwB6seneABRMdgJzH7ahIu6bJYOUtIcOVHnM73u', 'professeur'),
(24, 'psorentino@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$qPLNXRdZsZidZOgX/QslQ.tW4tBwaEC0sM80bSgsLeVRKZ.Q8zt7u', 'professeur'),
(25, 'epartouche@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$tbKqv8VTtm8ci0jezPsWLO5bLSA73LrGowsIEcfc6AXICjaqKtoj.', 'professeur'),
(26, 'qbalestan@guinot.asso.fr', '[\"ROLE_PROFESSEUR\"]', '$2y$13$WA.F5seGQLjkG.m//L4bme2rHxC4ZyqX9VA8dNpvY/CldbK.BUAyK', 'professeur'),
(27, 'mgranier@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K2\"]', '$2y$13$MkRl3jIYC/Yf7HKRClxeJeNIr21KpYF69dSJ2fQ14kOhpBQc9YhBC', 'eleve'),
(28, 'mbelmonte-caussieu@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K5\"]', '$2y$13$xcORWCv8t0pKh1YD/ZnWgOcgNU6Zs7Zc8a1tCmVPxXbslq2uemQL.', 'eleve'),
(29, 'mkaufman@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K1\"]', '$2y$13$6JM9KVzD/XIajlvRLxfzm.bD6r3ZaP9Fbx36MEYr31jZq1TuLZ3S.', 'eleve'),
(30, 'lservajean@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K4\"]', '$2y$13$pP97zq6GqoAkIg2gS649Ce5k7gwJ.SkwsfzH2RI1IRv3sj1akgHDu', 'eleve'),
(31, 'dedimo@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$iqagmA/FVq/SPfL/vCcTfOf7FRP95vKIMtwSjh0HnO.X1gi7/wHlK', 'eleve'),
(32, 'nchaffey@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K1\"]', '$2y$13$G4PSXm3rmSmsJM6qjqoHe.d.EKFFeBHWriKKmpeU0sh2BNX9Cd8m2', 'eleve'),
(33, 'mdrouart@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$erTtsZtVreToimfmI7e4O.TIeC/X.e/odf3/5tWFG/iK.58sgDw/G', 'eleve'),
(34, 'souahabi@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$euzZmMGjgF2XVoc2vtTTv.JRAf8X.KX8BBBerrB5wu3yolmhMRWOK', 'eleve'),
(35, 'adoucoure@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_CRCD\"]', '$2y$13$GShoArubfPAypq1Ic1unOeuvjFwq4cWeaDyOzXix1Y.YdG9bHH45G', 'eleve'),
(36, 'ftecher@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_PMT\"]', '$2y$13$mkaLrzz5VBaJpojK7.1jfeMJ9j3rrXI/hAxHRxJNskyoCECH4zJxG', 'eleve'),
(37, 'bturpin@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_PMK\"]', '$2y$13$Nwj0VN8W9hGXyUNn/BNs9OGRWeuLozdG29Tftw/kau96rVUD5asCq', 'eleve'),
(38, 'svilan@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_PMK\"]', '$2y$13$AWtwqdZn9MLHvsGOYM1vh.e2Aja/ofkgzqq1b0ebtGIK6.H/fyRpK', 'eleve'),
(39, 'jcourtois@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K1\"]', '$2y$13$hM4cEKnnMxZuF0J71fx1i.EgSoBT/ED1N2T4al5iL9EddNOsrqx9W', 'eleve'),
(40, 'ragbovi@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K2\"]', '$2y$13$JiMzlYxcp/gWknrtEJ8ly.uaJvsUAspuX.QwPgLoy8SdwYBQYvwpe', 'eleve'),
(41, 'lcharbonnel@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K2\"]', '$2y$13$PHayFl22Ejyg2S2cMrNeZeVvP1B4i3ngWwXvh33ig/X/Nbp/dipAy', 'eleve'),
(42, 'fdedinger@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K2\"]', '$2y$13$8Gks0GLYPUSYbFhrebrAce.QA4BscQqdZbIg8TtNlcv5G59LJjSvC', 'eleve'),
(43, 'mverrier@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K2\"]', '$2y$13$m8Mjqkf7oLSzhhZnxcCzpO6HkJHCZcsPk0i1fhnvvrhamBdmX7AGG', 'eleve'),
(44, 'aariapoutri@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$wSw3zQbGqArlgGxWY.EYz.prwfeqOAII4oatEy7kBw3t88O3LS0yu', 'eleve'),
(45, 'larzur@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$f/HHT4PbqFGp8mDHIafoL.8UXmCDmSQi2W0viIsTeQeA4NQwuHFCa', 'eleve'),
(46, 'ycariou@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$nspMXBdZYCKJaOc2Uq7jNuCR8FPOfseFGh1CN0LxO5foeQhGOVV1q', 'eleve'),
(47, 'adesjars@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$ZdnH7ApAojPMmS9rfD5Bvuah.MB6/pk4TRi58FGXFC/D2R74.9M7m', 'eleve'),
(48, 'mguezoul@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$Vbi/HyiRR5eHme9b4aK/n.sZrhsUwtZY736Kv603BZew3jmtiOJ2a', 'eleve'),
(49, 'jperruchon@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$yQKLO1mxUlrhzXb3KoCgoer.aFjKci6K2SXR0b/piu6GGXaqIdPzO', 'eleve'),
(50, 'tvarbedjian@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K3\"]', '$2y$13$Z2UMCroQEcxP1ZVzcM0PY.BkLaYevfCBKwvvYyxuv1VTnoWn5opo6', 'eleve'),
(51, 'cfauchard@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K4\"]', '$2y$13$LAD6zxaWtqGfUI7qJ3l5OuBVF298bF0ctprAzvS2vdU3cpUMtFgka', 'eleve'),
(52, 'clacointe@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K4\"]', '$2y$13$yRW1JkxOnscth6pZMYNIjeDFWxZZmGKQwoV1DD6Z2l4PgfrWda8OS', 'eleve'),
(53, 'alapujade@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K4\"]', '$2y$13$DlUQ3lcEXwX0Y6x/urySlO4Hh0nWUB4ydcs.YNQw4ouBzYQW9wAja', 'eleve'),
(54, 'lwalter@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K5\"]', '$2y$13$RoBHiqpdS/dnwL6ZN8pQtesxPeM2nXl4elUiYNaCQCocj5gX/mnXq', 'eleve'),
(55, 'ccommeau@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K5\"]', '$2y$13$53W5pfslVvxd7LoqhSu7Weo1jgtC6GNbqcwkuggnaA2V7tMkth8w6', 'eleve'),
(56, 'sezzoubi@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K5\"]', '$2y$13$dCYkIm4Y.ZRa1aD1U326WeYgGsCL32sYLcxtbj4Wu.gHS9Ws6MNke', 'eleve'),
(57, 'ogomes@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K5\"]', '$2y$13$/vAhR/vJVpk1kaQ7LlPV6OHNRCwll1/H8FUFb0mKVlT4g9lXun6zO', 'eleve'),
(58, 'hmakaya@guinot.asso.fr', '[\"ROLE_ELEVE\", \"ROLE_K5\"]', '$2y$13$5hnGfp3dJM0sdUBskM80DeM9eWuUH055dJuU.0tZaqI/YaUvmoghC', 'eleve'),
(59, 'mtetegan@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$/717yK6Vo5KAKSXs9RiWxO7v2wQGvazIXnXPvgu7VLJxuCE437W1m', 'secretariat'),
(60, 'acozee@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$wblvQInsbAY2Jb92X4KekecavgBr2mXYf3BVeP8f5V/QnKdQm0XAW', 'direction'),
(61, 'croels@guinot.asso.fr', '[\"ROLE_DOCUMENTALISTE\"]', '$2y$13$cRab9KY6txVS1lp6GzjENe1dAql74dx8hK5M9898eq8rFY.U5Msxa', 'documentaliste'),
(62, 'zdendenis@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$PBOHj/P9.dBwEYfxW2ZniOQCoqqwsnGg.M4WRM3QjFa4s7D9Nowda', 'secretariat'),
(63, 'nraad@guinot.asso.fr', '[\"ROLE_SURVEILLANT\"]', '$2y$13$WNPiFZGYcgE5F5xF8rlMHOrr0p4HDEn1F23mZ0RHmxkPOnzfpTpe6', 'surveillant'),
(64, 'idendenis@guinot.asso.fr', '[\"ROLE_SURVEILLANT\"]', '$2y$13$vwgWocTqFtEf5xoGpNvrxu/zp01fR1wmblodiU7pR465huWBe6ZF.', 'surveillant'),
(65, 'tbozin@guinot.asso.fr', '[\"ROLE_CUISINE\"]', '$2y$13$9UzgqEgjNiFqrLDqEjznfu21Donx7FU1UubHPmB8o/OUTEnGiFt8W', 'cuisine'),
(66, 'asilberstein@guinot.asso.fr', '[\"ROLE_PARENTELEVE\"]', '$2y$13$JbEl1rtwE22fNy/6wqI.aen0v9sXW2I5JWeya9pduj7UEfUzlFGVi', 'parentEleve'),
(67, 'gguyot@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$aU6vfrt/Q4cAIJR.oeXDgef1Ip3SEjCpglH1i6dzngicU4Uvmcsom', 'direction'),
(68, 'lsimonet@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$Iyh47tkBhNYZ1oZgGQKdPO3FdtJjobRH.LvARYBkL.lXlj5KH99oy', 'direction'),
(69, 'acstromengeg@guinot.asso.fr', '[\"ROLE_DIRECTION\"]', '$2y$13$aQwlOvZldGf5Dphx8sRbcu7.tNBkEmT/TuQ/2BEXkRTTFgORyG7Si', 'direction'),
(70, 'nriou@guinot.asso.fr', '[\"ROLE_PARENTELEVE\"]', '$2y$13$b8Bfg/3uWBb98PrQ/KgVTeZWYTn2ZiKESjlOMvoFTwcCfvk8FlrSO', 'parentEleve'),
(71, 'dcany@guinot.asso.fr', '[\"ROLE_SECRETARIAT\"]', '$2y$13$.nxvwKT2ry2UiOnvRgoDvODiEyN1OlkQs/R.jz.wVJjZ0t3a.yfGK', 'secretariat'),
(74, 'lfevrier@guinot.asso.fr', '[\"ROLE_ELEVE\",\"ROLE_MEMBRE\",\"ROLE_PMT1\"]', '$2y$13$3iH5O0unQdUZvdkYsCdoA.QnToL6oHbVZMMgpNbLBYIsfOg61xe6a', 'eleve'),
(75, 'everdino@guinot.asso.fr', '[\"ROLE_ELEVE\",\"ROLE_MEMBRE\",\"ROLE_PMT1\"]', '$2y$13$ZFisP.PH7f/XZ8JV.TZexOrfz/yq5GKOsFGpo/8hz/Jr9PVx3CIgi', 'eleve');


INSERT INTO `membre` (`id`, `nom`, `prenom`, `image_name`, `updated_at`, `created_at`, `username`, `charte`, `civilite`) VALUES
(1, 'DOE', 'John', 'mur-des-je-t-aime-67bc5d1055653852202728.png', '2025-02-24 12:50:40', '2025-02-24 12:50:40', 'jdoe', 0, 'Monsieur'),
(2, 'NAIT-KACI', 'Said', 'man.png', '2025-02-24 14:49:12', '2025-02-24 14:49:12', 'snait-kaci', 0, 'Monsieur'),
(3, 'LEVY', 'Gilles', 'man.png', '2025-02-24 14:57:26', '2025-02-24 14:57:26', 'glevy', 0, 'Monsieur'),
(4, 'PALAKOT', 'Igor', 'man.png', '2025-02-24 14:59:18', '2025-02-24 14:59:18', 'ipalafot', 0, 'Monsieur'),
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
(74, 'FEVRIER', 'Leika', 'woman.png', NULL, '2025-03-16 18:57:20', 'lfevrier', 0, 'Madame'),
(75, 'VERDINO', 'Ernesto', 'man.png', NULL, '2025-03-16 18:59:23', 'everdino', 0, 'Monsieur');






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





INSERT INTO `promotion` (`id`, `libelle`, `pole_id`) VALUES
(1, 'Pmt1', 4),
(2, 'Pmt2', 4),
(3, 'CRCD', 4),
(4, 'DA1', 4),
(5, 'DA2', 4),
(6, 'PmK', 3),
(7, 'K1', 3),
(8, 'K2', 3),
(9, 'K3', 3),
(10, 'K4', 3),
(11, 'K5', 3);



INSERT INTO `etage` (`id`, `batiment_id`, `libelle`) VALUES
(1, 1, '1'),
(2, 1, '2'),
(3, 1, '3'),
(4, 1, '4'),
(5, 1, '5'),
(6, 1, '6');


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




INSERT INTO `ouvrage` (`id`, `statut_ouvrage_id`, `titre`) VALUES
(1, 4, 'Le journal d\'Anne Frank'),
(2, 4, 'Rendez-vous avec Rama'),
(3, 4, 'Un sac de billes'),
(4, 4, 'Le petit chaperon rouge'),
(5, 4, 'My First English Book'),
(6, 4, 'Dune'),
(7, 4, 'Cendrille'),
(8, 3, 'Harry Potter à l\école des sorcier'),
(9, 3, 'Harry Potter et la chambre des secrets'),
(10, 5, 'Harry Potter et le prisonnier d\'Azkaban'),
(11, 5, 'Harry Potter et la coupe de feu'),
(12, 4, 'Harry Potter et l\'ordre du phoénix'),
(13, 4, 'Harry Potter et le prince de sang-mélé'),
(14, 4, 'Harry Potter et les reliques de la mort');



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
(71);



INSERT INTO `eleve` (`id`, `promotion_id`) VALUES
(39, 1),
(74, 1),
(75, 1),
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

INSERT INTO `admin` (`id`) VALUES
(6);


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
(71, '2025-10-16', '0146780100');


INSERT INTO `surveillant` (`id`) VALUES
(63),
(64);

INSERT INTO `secretariat` (`id`) VALUES
(15),
(59),
(71);



INSERT INTO `parent_eleve` (`id`) VALUES
(66),
(70);


INSERT INTO `parent_eleve_eleve` (`parent_eleve_id`, `eleve_id`) VALUES
(66, 7),
(70, 7);

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
(26);



INSERT INTO `planning_repas` (`id`, `repas_id`, `membre_id`, `date_achat`) VALUES
(1, 1, 4, '2025-02-24'),
(2, 5, 4, '2025-02-24'),
(3, 3, 17, '2025-02-25'),
(4, 1, 17, '2025-02-25'),
(5, 4, 17, '2025-02-25');

INSERT INTO `insertion` (`id`) VALUES
(13);

INSERT INTO `documentaliste` (`id`) VALUES
(61);

INSERT INTO `cuisine` (`id`) VALUES
(65);

INSERT INTO `direction` (`id`) VALUES
(16),
(60),
(62),
(67),
(68),
(69);



INSERT INTO `categorie_forum` (`id`,`forum_id`, `libelle`, `description`) VALUES
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
(8,  9),
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

INSERT INTO `produit` (`id`, `libelle`, `prix`, `description`, `stock`, `created_at`, `archive`, `date_event`, `categorie_produit_id`) VALUES
(2, 'Jetons Repas', 4, 'Sert à commander des repas', '100', '2025-02-27', 0, NULL, 1),
(3, 'Boite à os', 150, 'Sert au étudient Kiné', '50', '2025-02-27', 0, NULL, 2),
(4, 'Angleterre', 200, 'Séjour de 4jours', '10', '2025-02-27', 0, NULL, 4),
(5, 'Tombola de noël', 2, 'Nombreux lot à gagner', '70', '2025-02-27', 0, NULL, 3),
(6, 'blouse', 50, 'Habillement pour Kiné', '50', '2025-02-27', 0, NULL, 2),
(7, 'Allemagne', 0, 'Séjour à Marbourg', '4', '2025-02-27', 0, NULL, 4),
(8, 'Tombola Octobre Rose', 2, 'Nombreux lots à gagner !', '100', '2025-02-27', 0, NULL, 3);


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
(72, 74, 0),
(73, 75, 0);

INSERT INTO `salle` (`id`, `etage_id`, `libelle`, `promo_principale_id`) VALUES
(1, 1, 'Pmt1', NULL),
(2, 1, 'Pmt2', NULL),
(3, 1, 'CRCD', NULL),
(4, 1, 'DA1', NULL),
(5, 1, 'DA2', NULL),
(6, 1, 'Gymnase', NULL),
(7, 2, 'DOTTE', NULL),
(8, 2, 'GANTET', NULL),
(9, 2, 'FOUCAULT', NULL),
(10, 2, 'DOLTO', NULL),
(11, 2, 'IMBERT', NULL),
(12, 3, 'Polyvalente', NULL);


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



INSERT INTO `professeur_matiere` (`professeur_id`, `matiere_id`) VALUES
(2, 3),
(3, 5),
(4, 5),
(5, 4),
(18, 8),
(14, 2),
(14, 12),
(18, 16),
(19, 11),
(20, 1),
(25, 13);


INSERT INTO `commande` (`id`, `membre_id`, `produit_id`, `quantity`, `prix_total`, `date_achat`) VALUES
(1, 17, 2, 3, 12, '2025-02-28'),
(2, 17, 2, 5, 20, '2025-02-28'),
(3, 17, 3, 2, 300, '2025-02-28'),
(4, 17, 6, 5, 250, '2025-02-28'),
(5, 17, 4, 2, 400, '2025-02-28'),
(6, 17, 2, 13, 52, '2025-02-28');




INSERT INTO `message` (`id`, `thread_id`, `expediteur_id`, `destinataire_id`, `sujet`, `contenu`, `privatif`, `created_at`, `updated_at`, `requerant`) VALUES
(1, NULL, NULL, 17, 'petite question', 'c\'est bien ici pour poser des question ?', 1, '2025-03-04 19:27:59', '2025-03-04 19:27:59', 'monsieur tout le monde'),
(2, NULL, 17, 7, 'le bon endroit', 'dis moi Vincent, Monsieur tout le monde veut savoir si c\'est ici pour poser des question, je lui dis quoi ?', 1, '2025-03-04 19:30:52', '2025-03-04 19:31:55', NULL);


