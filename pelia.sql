-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 15 oct. 2019 à 10:54
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

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
-- Structure de la table `afectation_sujet`
--

CREATE TABLE `afectation_sujet` (
  `id_afectation_sujet` int(11) NOT NULL,
  `id_details_article` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `afectation_sujet`
--

INSERT INTO `afectation_sujet` (`id_afectation_sujet`, `id_details_article`, `id_sujet`) VALUES
(1, 50, 0),
(2, 50, 2),
(3, 50, 0),
(4, 51, 2),
(5, 51, 4),
(6, 52, 2),
(7, 52, 3),
(8, 53, 4),
(9, 54, 4);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires_article`
--

CREATE TABLE `commentaires_article` (
  `id_commentaires_article` int(11) NOT NULL,
  `id_details_article` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `contenue_commentaire` text CHARACTER SET utf8,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT 'utilisateur_pelia',
  `email_comment` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commentaires_article`
--

INSERT INTO `commentaires_article` (`id_commentaires_article`, `id_details_article`, `date_creation`, `contenue_commentaire`, `name`, `email_comment`) VALUES
(9, 52, '2019-09-11 16:41:26', 'qsml,qlksd', 'adnane', 'adnae@gmail.com'),
(10, 52, '2019-09-11 16:41:58', 'lksdkjhdjh', 'hmida', 'hmida@gmail.com'),
(11, 52, '2019-09-11 16:43:18', 'dlklksqdjlksdlksqhdlj', 'abdo', 'lzzjd@djsd.Zdsd'),
(12, 52, '2019-09-11 16:46:05', 'woow!!!!', 'ahmed', 'ahmedkhachia17@gmail.com'),
(13, 49, '2019-09-11 19:29:32', 'slksdnsdlnql', 'hmida', 'raslmida@kdfj.fk'),
(14, 49, '2019-09-11 19:30:09', 'qslksdknqds', 'adnane', 'zdhdqld@djnsd.djqsdj'),
(15, 49, '2019-09-11 19:30:51', 'sdlsdjdsd', 'fouzia', 's,n@dflkn.js'),
(16, 49, '2019-09-11 19:31:50', 'jqfnlwdscnwd<', 'abdo', 'zldzj@sd.qzdh'),
(17, 49, '2019-09-11 19:32:12', 'esjfsdkjsl', 'qlskkslqsDM', 'QNFSDB@lsqks.qdjsd'),
(18, 49, '2019-09-11 19:34:25', 'qzdzmljqzljqd', 'lkalb', 'in3al@hassak.fouzia'),
(19, 52, '2019-09-13 13:54:02', 'nta Hmar', 'abdo', 'fafa');

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
(3, 2, 1, 'smdjsd', '2019-09-02', '14:00:00', '00:00:00', 'scofideriance', 'moins important', NULL),
(33, 1, 1, 'akhiran', '2019-08-10', '13:00:00', '12:00:00', 'lsdml,dsm', 'machi mohim', '1 heure avant'),
(34, 0, 1, 'kddk,sk', '2019-09-11', '03:15:00', '05:45:00', 'b3iiid', 'tres important', '4 heure avant');

-- --------------------------------------------------------

--
-- Structure de la table `contenue_article`
--

CREATE TABLE `contenue_article` (
  `id_contenue_article` int(11) NOT NULL,
  `id_details_article` int(11) NOT NULL,
  `title_article` varchar(255) CHARACTER SET utf8 NOT NULL,
  `legende_article` text CHARACTER SET utf8 NOT NULL,
  `image_principale_article` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `soustitle_article` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_article` text CHARACTER SET utf8,
  `image1_article` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image2_article` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `autres_paragraphes_article` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `contenue_article`
--

INSERT INTO `contenue_article` (`id_contenue_article`, `id_details_article`, `title_article`, `legende_article`, `image_principale_article`, `soustitle_article`, `description_article`, `image1_article`, `image2_article`, `autres_paragraphes_article`) VALUES
(15, 49, 'diabéte : premier article concérnant les diabéte', 'q,nd;s,qdsqd,sdsd,sdnsdqSHSQJH', 'tlchargement1.jpg', 'wach biti dir', ' qssdq', '', '', ' sdqsdqqds'),
(17, 51, 'diabéte : premier article concérnant les diabéte', 'q,nd;s,qdsqd,sdsd,sdnsdqSHSQJH', 'tlchargement1.jpg', 'wach biti dir', ' qsmnqsknqsd', '', '', ' klqsqdknds'),
(18, 52, 'Le quart des patients âgés polymédiqués risque des interactions médicamenteuses', 'Une étude conduite pendant deux ans sur un millier d’ordonnances de personnes âgées de plus de 65 ans et polymédiquées a livré ses résultats. Une étude conduite pendant deux ans sur un millier d’ordonnances de personnes âgées de plus de 65 ans et polymédiquées a livré ses résultats.', 'pill.jpg', 'résultat des étude du laboratoire TEVA', ' Une étude conduite pendant deux ans sur un millier d’ordonnances de personnes âgées de plus de 65 ans et polymédiquées a livré ses résultats. Cette étude menée par le laboratoire Teva en partenariat avec le service Icar de l’hôpital de la Pitié Salpêtrière, a montré notamment que 85 % des patients âgés prennent et préparent seuls leurs médicaments. Et un patient sur 3 dit ne pas savoir pourquoi lui sont prescrits ses médicaments. De fait, 45 % des patients disent avoir déjà oublié de prendre leurs médicaments au bon moment. Et le même pourcentage de patients indiquent n’avoir pas pris leur traitement car ils avaient l’impression que celui-ci faisait plus de mal que de bien. En étudiant leurs ordonnances, il s’avère que 83 % des patients étaient exposés à au moins une prescription potentiellement inappropriées. La moitié des patients sont exposés à au moins 2 prescriptions inappropriées. Le quart (27 %) des patients sont potentiellement exposés à au moins une interaction médicamenteuse majeure.\r\n Boot camps have its supporters and its detractors. Some people do not understand\r\n                                    why\r\n                                    you should have to spend money on boot camp when you can get the MCSE study\r\n                                    materials\r\n                                    yourself at a fraction of the camp price. However, who has the willpower to\r\n                                    actually\r\n                                    sit through a self-imposed MCSE training. who has the willpower to actually sit\r\n                                    through\r\n                                    a self-imposed\r\n Boot camps have its supporters and its detractors. Some people do not understand\r\n                                    why\r\n                                    you should have to spend money on boot camp when you can get the MCSE study\r\n                                    materials\r\n                                    yourself at a fraction of the camp price. However, who has the willpower to\r\n                                    actually\r\n                                    sit through a self-imposed MCSE training. who has the willpower to actually sit\r\n                                    through\r\n                                    a self-imposed', '', '', '    MCSE boot camps have its supporters and its detractors. Some people do not\r\n                                    understand\r\n                                    why you should have to spend money on boot camp when you can get the MCSE study\r\n                                    materials yourself at a fraction of the camp price. However, who has the willpower\r\n                                    to\r\n                                    actually sit through a self-imposed MCSE training.'),
(20, 54, 'diabéte : premier article concérnant les diabéte', 'q,nd;s,qdsqd,sdsd,sdnsdqSHSQJH', 'pelia.png', 'wach biti dir', ' sqk,qsld', '', '', ' sqjksj');

-- --------------------------------------------------------

--
-- Structure de la table `details_article`
--

CREATE TABLE `details_article` (
  `id_details_article` int(4) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `details_article`
--

INSERT INTO `details_article` (`id_details_article`, `date_creation`, `date_modification`, `view`) VALUES
(49, '2019-09-08', '2019-09-08', 3),
(50, '2019-09-08', '2019-09-08', 0),
(51, '2019-09-08', '2019-09-08', 2),
(52, '2019-09-11', '2019-09-11', 5),
(53, '2019-09-11', '2019-09-11', 0),
(54, '2019-09-11', '2019-09-11', 8);

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
(1, 131, 0, 0, 0, 0, 0, 0, 0, 0, '2019-10-24', '2019-10-27'),
(2, 132, 1, 1, 1, 1, 1, 1, 1, 1, '0000-00-00', NULL),
(6, 136, 0, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(7, 137, 0, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(8, 138, 0, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(9, 139, 0, 0, 1, 0, 0, 0, 0, 0, NULL, NULL);

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
  `adresse` text COLLATE utf8_bin,
  `room_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `id_user`, `nom_medecin`, `specialite_medecin`, `numero_telephone`, `email`, `adresse`, `room_id`) VALUES
(0, 1, 'adnane', 'bassar', '1234567890', 'zkdjdzkdzuhi@gmail.com', 'ezjfzeezfz', NULL),
(1, 1, 'hmida', 'ras lmida', '11111', 'hmida@gmail.com', 'zaban lak', NULL),
(2, 1, 'abdo', 'wassa3', '39823083', 'kslskdks@fdsksd.jsd', 'zld,kdjlddsdlknqssd', NULL),
(3, 1, 'hmaaaar', 'kalb', 'dkj,slk', 'sdj@df.dsd', 'zldskd', NULL),
(4, 1, 'kajzzlqkd', 'dsjnsldl', 'sqlmdknsdlkq', 'qsldknsndlknds@sdfjo.ds', 'zldskd', NULL),
(5, 1, 'hmida', 'ras lmida', '39823083', 'adnanerouhi@gmail.com', 'zld,kdjlddsdlknqssd', NULL),
(6, 1, 'abdo', 'ras lmida', '39823083', 'adnanerouhi@gmail.com', 'zldskd', NULL),
(7, 1, 'abdo', 'ras lmida', '39823083', 'adnanerouhi@gmail.com', 'zldskd', NULL),
(8, 1, 'abdo', 'ras lmida', '39823083', 'adnanerouhi@gmail.com', 'zldskd', NULL),
(9, 1, 'abdo', 'ras lmida', '39823083', 'adnanerouhi@gmail.com', 'zldskd', NULL),
(17, 7, 'medOne', 'azfza', '0678046907', 's@gmail.com', 'Rabat,Bloc 38', 34),
(18, 3, 'ali', 'azfza', '0678046907', 'D@gmail.com', 'Rabat,Bloc 38', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE `medecins` (
  `id` int(11) NOT NULL,
  `prenom` varchar(55) COLLATE utf8_bin NOT NULL,
  `nom` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `cpassword` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `sex` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `photo_medecin` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `medecins`
--

INSERT INTO `medecins` (`id`, `prenom`, `nom`, `email`, `password`, `cpassword`, `phone`, `sex`, `age`, `photo_medecin`) VALUES
(1, 'ali', 'moham', 'adnanerouhi@gmail.com', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '23456789', 'homme', 23, NULL);

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
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `message` text COLLATE utf8_bin,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `room_name` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `id_room`, `message`, `time`, `room_name`) VALUES
(1, 16, 'ahlaan', '2019-10-14 13:55:42', 'chihaja2'),
(2, 17, 'woow', '2019-10-14 13:55:55', 'chihaja2'),
(3, 14, 'ahyaaaaaa', '2019-10-14 14:11:20', 'chihaja1'),
(4, 16, 'hhh', '2019-10-14 22:22:54', 'chihaja2'),
(5, 16, 'woow', '2019-10-14 22:24:57', 'chihaja2'),
(6, 11, 'achaa', '2019-10-14 22:27:08', 'chihaja1'),
(7, 16, 'akha', '2019-10-14 22:28:07', 'chihaja2'),
(8, 16, 'khonaa', '2019-10-14 22:34:16', 'chihaja2'),
(9, 14, 'ahyaa', '2019-10-14 23:16:26', 'chihaja1');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_Newsletter` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id_Newsletter`, `email`) VALUES
(1, 'test@test.com'),
(2, 'sdlihfsd@lhkj.com'),
(3, 'patrick@gmail.com'),
(4, 'test@test.com'),
(5, 'test@test.com'),
(6, 'adnanerouhi@gmail.com'),
(7, 'sdlihfsd@lhkj.com'),
(8, 'patrick@gmail.com'),
(9, 'adnanerouhi@gmail.com'),
(10, 'test@test.com');

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
(1, 1, 129, '2019-09-12', 100, 0, 0, 0),
(2, 1, 130, '2019-09-12', 100, 0, 0, 0),
(3, 1, 129, '2019-09-11', 100, 0, 0, 0),
(4, 1, 130, '2019-09-11', 100, 0, 0, 0),
(5, 1, 129, '2019-09-10', 0, 0, 0, 0),
(6, 1, 130, '2019-09-10', 0, 0, 0, 0),
(7, 1, 129, '2019-09-09', 0, 0, 0, 0),
(8, 1, 130, '2019-09-09', 0, 0, 0, 0),
(9, 1, 129, '2019-09-08', 100, 0, 0, 0),
(10, 1, 130, '2019-09-08', 100, 0, 0, 0),
(11, 6, 131, '2019-10-05', 0, 0, 0, 0),
(12, 6, 132, '2019-10-05', 0, 0, 0, 0),
(13, 6, 136, '2019-10-05', 0, 0, 0, 0),
(14, 6, 137, '2019-10-05', 0, 0, 0, 0),
(15, 6, 138, '2019-10-05', 0, 0, 0, 0),
(16, 6, 131, '2019-10-04', 100, 0, 0, 0),
(17, 6, 132, '2019-10-04', 0, 0, 0, 0),
(18, 6, 136, '2019-10-04', 0, 0, 0, 0),
(19, 6, 137, '2019-10-04', 0, 0, 0, 0),
(20, 6, 138, '2019-10-04', 0, 0, 0, 0),
(21, 6, 131, '2019-10-03', 50, 0, 0, 0),
(22, 6, 132, '2019-10-03', 0, 0, 0, 0),
(23, 6, 136, '2019-10-03', 0, 0, 0, 0),
(24, 6, 137, '2019-10-03', 0, 0, 0, 0),
(25, 6, 138, '2019-10-03', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `id_seder` int(11) NOT NULL,
  `id_geter` int(11) DEFAULT NULL,
  `room_name` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_room`, `id_seder`, `id_geter`, `room_name`) VALUES
(10, 3, 4, 'ddd'),
(11, 8, 5, 'chihaja1'),
(12, 3, 6, 'fff'),
(13, 6, 3, 'fff'),
(14, 5, 8, 'chihaja1'),
(15, 4, 3, 'ddd'),
(16, 8, 4, 'chihaja2'),
(17, 4, 8, 'chihaja2');

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `id_sujets` int(11) NOT NULL,
  `sujets` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id_sujets`, `sujets`) VALUES
(1, 'aucun sujet'),
(2, 'diabéte'),
(3, 'multiple maladie chronique'),
(4, 'tention');

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
(129, 1, 1, 0, 1, '02:30:00', 1, '00:00:00', 0.25, '00:00:00', 0.25, '00:00:00', 0.25, '2019-09-11', '2029-02-28'),
(130, 1, 1, 3, 1, '02:30:00', 1, '00:00:00', 0.25, '00:00:00', 0.25, '00:00:00', 0.25, '2019-09-11', '2019-09-10'),
(131, 1, 3, 0, 1, '02:15:00', 0, '00:00:00', 0, '00:00:00', 0, '00:00:00', 0, '2019-09-15', '2020-01-14'),
(132, 1, 3, 0, 1, '06:00:00', 0.25, '00:00:00', 0, '00:00:00', 0, '00:00:00', 0, '2019-09-15', '2293-06-29'),
(136, 1, 3, 0, 1, '01:15:00', 0.25, '00:00:00', 0, '00:00:00', 0, '00:00:00', 0, '2019-09-15', '2293-06-29'),
(137, 1, 3, 0, 1, '00:00:00', 0.25, '00:00:00', 0.25, '00:00:00', 0.25, '00:00:00', 0.25, '2019-09-15', '2293-06-29'),
(138, 1, 3, 0, 1, '01:15:00', 0.25, '00:00:00', 0.25, '00:00:00', 0.25, '00:00:00', 0.25, '2019-09-15', '2293-06-29'),
(139, 1, 3, 0, 2, '00:00:00', 0.25, '01:15:00', 0.25, '00:00:00', 0.25, '00:00:00', 0.25, '2019-09-15', '2019-09-24');

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
  `photo_utilisateur` text COLLATE utf8_bin,
  `Type` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`, `cpassword`, `phone`, `sex`, `age`, `photo_utilisateur`, `Type`) VALUES
(1, 'mama', 'knk', 'e', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', 'zfez', 'knjk', 78, '', ''),
(2, 'ayoub', 'berhimi', 'ayoub@gmail.com', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO', '12345432', 'femme', 16, NULL, ''),
(3, 'ahmed', 'hj', 'adnanerouhi@gmail.com', '$2y$10$iusesomecrazystrings2uzuPqZKK9mSkwa8uDBGHy7LzdqLhelNW', '$2y$10$iusesomecrazystrings2uzuPqZKK9mSkwa8uDBGHy7LzdqLhelNW', 'sdv', 'nk', 45, 'untitled.jpg', ''),
(4, 'abdo', 'filali', 'g@gmail.com', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '0678046907', 'homme', 18, 'handsomeabderrahmane.jpg', 'patient'),
(5, 'Adnane', 'rohi', 'h@gmail.com', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '234567890876', 'homme', 18, NULL, 'patient'),
(6, 'Ali', 'efer', 'f@gmail.com', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '4567890', 'homme', 56, NULL, ''),
(7, 'one', 'one', '1@gmail.com', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '$2y$10$iusesomecrazystrings2u/cJF71lRN4P7cTI0ACuUjdKOIn3goC.', '3456789', 'homme', 18, NULL, ''),
(8, 'tbib', 'tbib', 'tbib@gmail.com', '$2y$10$iusesomecrazystrings2uUC0jp4pslJZASPqr10U4nVtsGsrnCMy', '$2y$10$iusesomecrazystrings2uUC0jp4pslJZASPqr10U4nVtsGsrnCMy', '6677777', 'homme', 34, NULL, 'medecin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `afectation_sujet`
--
ALTER TABLE `afectation_sujet`
  ADD PRIMARY KEY (`id_afectation_sujet`),
  ADD KEY `fk_id_article_sujets` (`id_details_article`);

--
-- Index pour la table `commentaires_article`
--
ALTER TABLE `commentaires_article`
  ADD PRIMARY KEY (`id_commentaires_article`),
  ADD KEY `fk_id_article_commentaire` (`id_details_article`);

--
-- Index pour la table `conntroles_medecin`
--
ALTER TABLE `conntroles_medecin`
  ADD PRIMARY KEY (`id_conntroles`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_id_medecin` (`id_medecin`);

--
-- Index pour la table `contenue_article`
--
ALTER TABLE `contenue_article`
  ADD PRIMARY KEY (`id_contenue_article`),
  ADD KEY `fk_id_article_contenue` (`id_details_article`);

--
-- Index pour la table `details_article`
--
ALTER TABLE `details_article`
  ADD PRIMARY KEY (`id_details_article`);

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
-- Index pour la table `medecins`
--
ALTER TABLE `medecins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `medicaments`
--
ALTER TABLE `medicaments`
  ADD PRIMARY KEY (`id_medicament`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `fk_id_room` (`id_room`),
  ADD KEY `time` (`time`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_Newsletter`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id_questionnaire`),
  ADD KEY `fk_id_user_questionaire` (`id_user`),
  ADD KEY `fk_id_user_temps` (`id_temps`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `fk_id_seder` (`id_seder`),
  ADD KEY `fk_id_geter` (`id_geter`);

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`id_sujets`);

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
-- AUTO_INCREMENT pour la table `afectation_sujet`
--
ALTER TABLE `afectation_sujet`
  MODIFY `id_afectation_sujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commentaires_article`
--
ALTER TABLE `commentaires_article`
  MODIFY `id_commentaires_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `conntroles_medecin`
--
ALTER TABLE `conntroles_medecin`
  MODIFY `id_conntroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `contenue_article`
--
ALTER TABLE `contenue_article`
  MODIFY `id_contenue_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `details_article`
--
ALTER TABLE `details_article`
  MODIFY `id_details_article` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `jours_prises`
--
ALTER TABLE `jours_prises`
  MODIFY `id_jours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `medecins`
--
ALTER TABLE `medecins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `medicaments`
--
ALTER TABLE `medicaments`
  MODIFY `id_medicament` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_Newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id_questionnaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `id_sujets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `temps_prises`
--
ALTER TABLE `temps_prises`
  MODIFY `id_temps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `afectation_sujet`
--
ALTER TABLE `afectation_sujet`
  ADD CONSTRAINT `fk_id_article_sujets` FOREIGN KEY (`id_details_article`) REFERENCES `details_article` (`id_details_article`);

--
-- Contraintes pour la table `commentaires_article`
--
ALTER TABLE `commentaires_article`
  ADD CONSTRAINT `fk_id_article_commentaire` FOREIGN KEY (`id_details_article`) REFERENCES `details_article` (`id_details_article`);

--
-- Contraintes pour la table `conntroles_medecin`
--
ALTER TABLE `conntroles_medecin`
  ADD CONSTRAINT `fk_id_medecin_controle` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `fk_id_user_controle` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `contenue_article`
--
ALTER TABLE `contenue_article`
  ADD CONSTRAINT `fk_id_article_contenue` FOREIGN KEY (`id_details_article`) REFERENCES `details_article` (`id_details_article`);

--
-- Contraintes pour la table `jours_prises`
--
ALTER TABLE `jours_prises`
  ADD CONSTRAINT `fk_id_temps` FOREIGN KEY (`id_temps`) REFERENCES `temps_prises` (`id_temps`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_id_room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`);

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `fk_id_user_questionaire` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_id_user_temps` FOREIGN KEY (`id_temps`) REFERENCES `temps_prises` (`id_temps`);

--
-- Contraintes pour la table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_id_geter` FOREIGN KEY (`id_geter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_id_seder` FOREIGN KEY (`id_seder`) REFERENCES `users` (`id`);

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
