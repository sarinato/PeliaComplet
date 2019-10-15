-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 04 sep. 2019 à 13:28
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pelia`
--

-- --------------------------------------------------------

--
-- Structure de la table `conntroles_medecin`
--

CREATE TABLE `conntroles_medecin` (
  `id_conntroles` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom_conntroles` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_conntroles` date DEFAULT NULL,
  `heure_conntroles` time DEFAULT NULL,
  `rappel_conntroles` time DEFAULT NULL,
  `emplacement` text COLLATE utf8_bin,
  `remarque` text COLLATE utf8_bin,
  `rappel_text` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `conntroles_medecin`
--

INSERT INTO `conntroles_medecin` (`id_conntroles`, `id_medecin`, `id_user`, `nom_conntroles`, `date_conntroles`, `heure_conntroles`, `rappel_conntroles`, `emplacement`, `remarque`, `rappel_text`) VALUES
(2, 0, 1, 'tabanlak', '2019-09-04', '11:00:00', '02:45:00', 'dkfjdkfj', 'skdksdj', NULL),
(3, 2, 1, 'hmaaar', '2019-09-02', '14:00:00', NULL, 'scofideriance', 'moins important', NULL),
(33, 1, 1, 'akhiran', '2019-08-10', '13:00:00', '12:00:00', 'lsdml,dsm', 'machi mohim', '1 heure avant'),
(34, 0, 1, 'kddk,sk', '2019-09-11', '03:15:00', '05:45:00', 'b3iiid', 'tres important', '4 heure avant');

-- --------------------------------------------------------

--
-- Structure de la table `jours_prises`
--

CREATE TABLE `jours_prises` (
  `id_jours` int(11) NOT NULL,
  `id_temps` int(11) NOT NULL,
  `methode` tinyint(1) DEFAULT NULL,
  `Monday` tinyint(1) DEFAULT NULL,
  `Tuesday` tinyint(1) DEFAULT NULL,
  `Wednesday` tinyint(1) DEFAULT NULL,
  `Thursday` tinyint(1) DEFAULT NULL,
  `Friday` tinyint(1) DEFAULT NULL,
  `Saturday` tinyint(1) DEFAULT NULL,
  `Sunday` tinyint(1) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_prise` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `jours_prises`
--

INSERT INTO `jours_prises` (`id_jours`, `id_temps`, `methode`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`, `date_debut`, `date_prise`) VALUES
(119, 118, 0, 1, 0, 1, 0, 1, 1, 1, NULL, NULL),
(120, 119, 0, 1, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_medecin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom_medecin` varchar(55) COLLATE utf8_bin NOT NULL,
  `specialite_medecin` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `numero_telephone` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `adresse` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `id_user`, `nom_medecin`, `specialite_medecin`, `numero_telephone`, `email`, `adresse`) VALUES
(0, 1, 'adnane', 'bassar', '1234567890', 'zkdjdzkdzuhi@gmail.com', 'nqssd'),
(1, 1, 'hmida', 'ras lmida', '1234567890', 'raslmida@gmail.com', 'zaban lak'),
(2, 1, 'abdo', 'wassa3', '39823083', 'kslskdks@fdsksd.jsd', 'zld,kdjlddsdlknqssd');

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE `medicaments` (
  `id_medicament` int(11) NOT NULL,
  `nom_medicament` varchar(55) COLLATE utf8_bin NOT NULL,
  `type_medicament` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `description_medicament` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `medicaments`
--

INSERT INTO `medicaments` (`id_medicament`, `nom_medicament`, `type_medicament`, `description_medicament`) VALUES
(1, 'doliprane', 'comprimé', 'un medicament à avaler pour les douleurs'),
(2, 'aspirine', 'comprimé', 'un medicament à avaler pour les douleurs'),
(3, 'doliprane', 'gillule', 'un medicament à avaler pour les douleurs'),
(4, 'ATACAND', 'comprimé', 'Comprimé sécable ');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id_questionnaire` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_temps` int(11) NOT NULL,
  `date_questionaire` date NOT NULL,
  `prise1` int(11) DEFAULT '400',
  `prise2` int(11) DEFAULT '400',
  `prise3` int(11) DEFAULT '400',
  `prise4` int(11) DEFAULT '400'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`id_questionnaire`, `id_user`, `id_temps`, `date_questionaire`, `prise1`, `prise2`, `prise3`, `prise4`) VALUES
(1, 1, 119, '2019-09-04', 100, 100, 100, 100),
(2, 1, 118, '2019-09-04', 100, 100, 100, 100),
(3, 1, 119, '2019-09-01', 100, 100, 50, 0),
(4, 1, 118, '2019-09-01', 100, 100, 50, 0);

-- --------------------------------------------------------

--
-- Structure de la table `temps_prises`
--

CREATE TABLE `temps_prises` (
  `id_temps` int(11) NOT NULL,
  `id_medicament` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `nombre_fois` smallint(6) DEFAULT '1',
  `f1` time DEFAULT NULL,
  `dose_medicament1` float DEFAULT NULL,
  `f2` time DEFAULT NULL,
  `dose_medicament2` float DEFAULT NULL,
  `f3` time DEFAULT NULL,
  `dose_medicament3` float DEFAULT NULL,
  `f4` time DEFAULT NULL,
  `dose_medicament4` float DEFAULT NULL,
  `date_insertion` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `temps_prises`
--

INSERT INTO `temps_prises` (`id_temps`, `id_medicament`, `id_user`, `id_medecin`, `nombre_fois`, `f1`, `dose_medicament1`, `f2`, `dose_medicament2`, `f3`, `dose_medicament3`, `f4`, `dose_medicament4`, `date_insertion`, `date_fin`) VALUES
(117, 1, 1, 0, 3, '04:15:00', 0.25, '06:30:00', 0.25, '08:30:00', 0.25, '00:00:00', 0.25, '2019-09-01', '2019-08-31'),
(118, 4, 1, 0, 3, '01:15:00', 0.25, '03:30:00', 0.25, '05:30:00', 0.25, '00:00:00', 0.25, '2019-09-01', '2019-08-31'),
(119, 2, 1, 0, 4, '05:15:00', 0.25, '16:30:00', 0.25, '17:15:00', 0.25, '22:00:00', 0.25, '2019-09-03', '2019-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(55) COLLATE utf8_bin NOT NULL,
  `nom` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `cpassword` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `sex` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `photo_utilisateur` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`, `cpassword`, `phone`, `sex`, `age`, `photo_utilisateur`) VALUES
(1, 'adnane', 'ROUHI', 'adnanerouhi@gmail.com', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', '0650517418', 'home', 25, 'pp.jpg'),
(2, 'ayoub', 'berhimi', 'ayoub@gmail.com', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', '12345432', 'femme', 16, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conntroles_medecin`
--
ALTER TABLE `conntroles_medecin`
  ADD PRIMARY KEY (`id_conntroles`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_medecin` (`id_medecin`);

--
-- Index pour la table `jours_prises`
--
ALTER TABLE `jours_prises`
  ADD PRIMARY KEY (`id_jours`),
  ADD KEY `fk_id_temps` (`id_temps`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Index pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`id_medicament`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id_questionnaire`),
  ADD KEY `fk_id_user_questionaire` (`id_user`),
  ADD KEY `fk_id_user_temps` (`id_temps`);

--
-- Index pour la table `temps_prises`
--
ALTER TABLE `temps_prises`
  ADD PRIMARY KEY (`id_temps`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_medicament` (`id_medicament`),
  ADD KEY `fk_id_medecin` (`id_medecin`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conntroles_medecin`
--
ALTER TABLE `conntroles_medecin`
  MODIFY `id_conntroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `jours_prises`
--
ALTER TABLE `jours_prises`
  MODIFY `id_jours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `id_medicament` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id_questionnaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `temps_prises`
--
ALTER TABLE `temps_prises`
  MODIFY `id_temps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conntroles_medecin`
--
ALTER TABLE `conntroles_medecin`
  ADD CONSTRAINT `fk_id_medecin_controle` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `fk_id_user_controle` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `jours_prises`
--
ALTER TABLE `jours_prises`
  ADD CONSTRAINT `fk_id_temps` FOREIGN KEY (`id_temps`) REFERENCES `temps_prises` (`id_temps`);

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `fk_id_user_questionaire` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_id_user_temps` FOREIGN KEY (`id_temps`) REFERENCES `temps_prises` (`id_temps`);

--
-- Contraintes pour la table `temps_prises`
--
ALTER TABLE `temps_prises`
  ADD CONSTRAINT `fk_id_medecin` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `fk_id_medicament` FOREIGN KEY (`id_medicament`) REFERENCES `medicaments` (`id_medicament`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
