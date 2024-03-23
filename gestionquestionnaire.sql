-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 mars 2024 à 12:11
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionquestionnaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `numEtudiant` int NOT NULL AUTO_INCREMENT,
  `nomEtudiant` varchar(50) NOT NULL,
  `prenomEtudiant` varchar(50) NOT NULL,
  `niveauEtudiant` varchar(10) NOT NULL,
  `courrierEtudiant` varchar(100) NOT NULL,
  `passwordEtudiant` varchar(20) NOT NULL,
  PRIMARY KEY (`numEtudiant`),
  UNIQUE KEY `etudiant_pk` (`courrierEtudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`numEtudiant`, `nomEtudiant`, `prenomEtudiant`, `niveauEtudiant`, `courrierEtudiant`, `passwordEtudiant`) VALUES
(134, 'Moreau', 'Camille', 'L3', 'camille.moreau@gmail.com', 'password9'),
(133, 'Baron', 'Alexandre', 'L2', 'alexandre.baron@gmail.com', 'password8'),
(132, 'Roux', 'Laura', 'L2', 'laura.roux@gmail.com', 'password7'),
(131, 'Fournier', 'Alice', 'L2', 'alice.fournier@gmail.com', 'password6'),
(156, 'admin', 'ok', 'L1', 'admin@gil.com', '12'),
(148, 'tsiravay', 'alexxx', 'L2', 'tsiravayalexandre3@gmail.com', 'fitiavana240'),
(149, 'tsiravay', 'alexxxx', 'L2', 'tsiravayalexandre4@gmail.com', 'fitiavana'),
(150, 'tsiravay', 'alexxxxx', 'L3', 'tsiravayalexandre5@gmail.com', 'fitiavana'),
(151, 'tsiravay', 'alexxxxxx', 'L3', 'tsiravayalexandre6@gmail.com', 'fitiavana'),
(130, 'Leroy', 'Julien', 'L2', 'julien.leroy@gmail.com', 'password5'),
(123, 'jUDIA', 'JUSIA', 'L3', 'ejlogiciel@gmail.com', '12'),
(106, 'admin', 'ad', 'M2', 'admin@gmail.com', 'admin'),
(118, 'Esoalahy', 'Josefa', 'L2', 'esoalahyjosefa@gmail.com', '124578'),
(120, 'Romeo', 'Manoela', 'L2', 'romeo@gmail.com', '12'),
(135, 'Girard', 'Lucas', 'L3', 'lucas.girard@gmail.com', 'password10'),
(157, 'EsoalahyJosefa', '12', 'L1', 'esoahyjosefa@gmail.com', '12'),
(159, 'Randria', 'jean Jeannot', 'L2', 'dollar.marielle@gmail.com', '12'),
(139, 'Meyer', 'Antoine', 'M1', 'antoine.meyer@gmail.com', 'password14'),
(140, 'Roy', 'Emma', 'M1', 'emma.roy@gmail.com', 'password15'),
(153, 'tsiravay', 'alex8', 'M1', 'tsiravayalexandre8@gmail.com', 'fitiavana'),
(152, 'tsiravay', 'alex7', 'M1', 'tsiravayalexandre7@gmail.com', 'fitiavana'),
(143, 'Blanc', 'Thomas', 'M2', 'thomas.blanc@gmail.com', 'password18'),
(144, 'Leroux', 'Celia', 'M2', 'celia.leroux@gmail.com', 'password19'),
(154, 'tsiravay', 'alex9', 'M2', 'tsiravayalexandre9@gmail.com', 'fitiavana'),
(155, 'tsiravay', 'alex10', 'M2', 'tsiravayalexandre10@gmail.com', 'fitiavana');

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `numExam` int NOT NULL AUTO_INCREMENT,
  `anneeUniv` varchar(20) DEFAULT NULL,
  `numEtudiant` varchar(10) DEFAULT NULL,
  `note` int DEFAULT NULL,
  `commentaire` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`numExam`),
  KEY `numEtudiant` (`numEtudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`numExam`, `anneeUniv`, `numEtudiant`, `note`, `commentaire`) VALUES
(150, '2024', '118', 1, 'Avec une note pareille tu vas redoubler'),
(151, '2024', '120', 0, 'Recommecer svp !! C\'est inaceptable'),
(152, '2024', '121', 2, 'Tu es en dessous de la note '),
(153, '2024', '121', 2, 'Tu es en dessous de la note '),
(154, '2024', '146', 6, 'En dessous de la moyenne'),
(155, '2024', '118', 2, 'Tu es en dessous de la note eliminatoire'),
(156, '2024', '155', 1, 'Avec une note pareille tu vas redoubler'),
(157, '2024', '155', 1, 'Avec une note pareille tu vas redoubler'),
(158, '2024', '155', 1, 'Avec une note pareille tu vas redoubler'),
(159, '2024', '155', 2, 'Tu es en dessous de la note eliminatoire'),
(160, '2024', '155', 2, 'Tu es en dessous de la note eliminatoire'),
(161, '2024', '118', 0, 'Recommecer svp !! C\'est inaceptable'),
(162, '2024', '118', 0, 'Recommecer svp !! C\'est inaceptable'),
(163, '2024', '155', 3, 'Tu as besoin de faire beaucoup d\'efforts'),
(164, '2024', '154', 0, 'Recommecer svp !! C\'est inaceptable'),
(165, '2024', '154', 0, 'Recommecer svp !! C\'est inaceptable'),
(166, '2024', '118', 1, 'Avec une note pareille tu vas redoubler'),
(167, '2024', '154', 4, 'Continue, c\'est presque'),
(168, '2024', '159', 1, 'Avec une note pareille tu vas redoubler');

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE IF NOT EXISTS `qcm` (
  `numQuestion` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `reponse1` varchar(255) NOT NULL,
  `reponse2` varchar(255) NOT NULL,
  `reponse3` varchar(255) NOT NULL,
  `reponse4` varchar(255) NOT NULL,
  `reponse_correcte` int NOT NULL,
  `niveau` varchar(5) NOT NULL,
  PRIMARY KEY (`numQuestion`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`numQuestion`, `question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `reponse_correcte`, `niveau`) VALUES
(113, 'Comment ecrire 4 en binaire ??', '1111', '1212', '0101', '0011', 3, 'L1'),
(114, 'HTML ? ', 'HyperText Markup Language', 'HyperText Made Language', 'HyperText Man Lang', 'Aucun', 1, 'L1'),
(9, 'Qu\'est-ce que le \"Cloud Computing\" ?', 'La fourniture de services informatiques via Internet', 'Un logiciel de météo en ligne', 'Un réseau social pour les entreprises', 'Un système de stockage de données sur disque dur', 1, 'L1'),
(10, 'Qu\'est-ce que le \"URL\" en informatique ?', 'Uniform Resource Locator, une adresse web', 'Un format de fichier pour les images', 'Un logiciel de navigation web', 'Une technique de programmation', 1, 'L1'),
(11, 'Quel est le principal langage de balisage utilisé pour structurer le contenu des pages web ?', 'HTML', 'CSS', 'JavaScript', 'PHP', 1, 'L1'),
(12, 'Quelle est la différence entre un ordinateur portable et un ordinateur de bureau ?', 'Un ordinateur portable est portable, tandis qu\'un ordinateur de bureau est fixe', 'Un ordinateur portable est plus puissant qu\'un ordinateur de bureau', 'Un ordinateur portable est moins cher qu\'un ordinateur de bureau', 'Un ordinateur portable est plus grand qu\'un ordinateur de bureau', 1, 'L1'),
(13, 'Qu\'est-ce qu\'un \"pilote\" (driver) en informatique ?', 'Un logiciel permettant à un périphérique de communiquer avec l\'ordinateur', 'Un type de fichier image', 'Un terme utilisé en programmation', 'Un outil de sauvegarde de données', 1, 'L1'),
(14, 'Qu\'est-ce qu\'un \"spam\" en informatique ?', 'Des messages non sollicités envoyés en masse', 'Un logiciel malveillant', 'Un type de fichier compressé', 'Un terme utilisé pour décrire un système informatique lent', 1, 'L1'),
(15, 'Quelle est la fonction principale d\'un logiciel de traitement de texte ?', 'Créer et modifier des documents textuels', 'Surfer sur Internet', 'Envoyer des e-mails', 'Jouer à des jeux', 1, 'L1'),
(16, 'Quelle est la différence entre un disque dur (HDD) et un disque SSD ?', 'Les disques SSD sont plus rapides', 'Les disques SSD ont une plus grande capacité de stockage', 'Les disques SSD sont moins chers', 'Les disques SSD sont plus fragiles', 1, 'L2'),
(17, 'Quel est le langage de programmation utilisé pour créer des applications Android ?', 'Java', 'C++', 'Python', 'Swift', 1, 'L2'),
(18, 'Qu\'est-ce que le \"Cloud Storage\" ?', 'Le stockage de données en ligne', 'Un logiciel de dessin', 'Un système de gestion de contenu', 'Un système de sauvegarde automatique', 1, 'L2'),
(19, 'Quelle est la fonction principale d\'un logiciel de retouche d\'images ?', 'Modifier des photos et des images', 'Éditer des vidéos', 'Créer des animations', 'Dessiner des illustrations', 1, 'L2'),
(20, 'Qu\'est-ce qu\'un \"firewall\" en informatique ?', 'Un système de sécurité pour protéger un réseau', 'Un logiciel de gestion de fichiers', 'Un système de stockage en ligne', 'Un programme de sauvegarde automatique', 1, 'L2'),
(21, 'Qu\'est-ce qu\'un \"bug\" en informatique ?', 'Une erreur ou un défaut dans un programme', 'Un virus informatique', 'Un problème de matériel', 'Un problème de connexion Internet', 1, 'L2'),
(22, 'Quelle est la fonction principale d\'un logiciel de gestion de base de données ?', 'Stocker, organiser et manipuler des données', 'Surfer sur Internet', 'Créer des documents textuels', 'Éditer des photos', 1, 'L2'),
(23, 'Qu\'est-ce qu\'un \"cookie\" en informatique ?', 'Un petit fichier texte stocké sur un ordinateur par un site web', 'Un logiciel espion', 'Un virus informatique', 'Un programme de sauvegarde automatique', 1, 'L2'),
(24, 'Qu\'est-ce que le \"Bluetooth\" ?', 'Une technologie sans fil pour la communication à courte distance', 'Un logiciel de montage vidéo', 'Un type de connecteur USB', 'Une méthode de stockage de données', 1, 'L2'),
(25, 'Qu\'est-ce que le \"phishing\" en informatique ?', 'Une technique d\'hameçonnage pour voler des informations', 'Un logiciel de messagerie', 'Une méthode de recherche sur Internet', 'Un type de virus informatique', 1, 'L2'),
(26, 'Quelle est la fonction principale d\'un logiciel de messagerie ?', 'Envoyer et recevoir des e-mails', 'Éditer des photos', 'Éditer des vidéos', 'Créer des documents textuels', 1, 'L2'),
(27, 'Qu\'est-ce que le \"spam\" en informatique ?', 'Des messages non sollicités envoyés en masse', 'Un logiciel malveillant', 'Un type de fichier compressé', 'Un terme utilisé pour décrire un système informatique lent', 1, 'L2'),
(28, 'Qu\'est-ce que la \"Programmation Orientée Objet\" ?', 'Un style de programmation basé sur la définition de classes et d\'objets', 'Un langage de programmation pour les enfants', 'Un langage de programmation utilisé pour créer des graphiques', 'Un concept de programmation obsolète', 1, 'L2'),
(29, 'Qu\'est-ce qu\'un \"pixel\" en informatique ?', 'Le plus petit élément d\'une image numérique', 'Une unité de mesure de la résolution d\'écran', 'Un type de fichier image', 'Un outil de dessin', 1, 'L2'),
(30, 'Quelle est la fonction principale d\'un logiciel de montage vidéo ?', 'Éditer des vidéos', 'Modifier des photos', 'Créer des animations', 'Enregistrer des sons', 1, 'L2'),
(31, 'Qu\'est-ce qu\'un algorithme de tri ?', 'Un algorithme qui organise des données dans un ordre spécifique', 'Un algorithme utilisé pour mélanger des données', 'Un algorithme utilisé pour supprimer des données', 'Un algorithme utilisé pour stocker des données', 1, 'L3'),
(32, 'Quelle est la différence entre un firewall et un antivirus ?', 'Un firewall contrôle le trafic réseau, tandis qu\'un antivirus détecte et supprime les logiciels malveillants', 'Un firewall protège contre les incendies, tandis qu\'un antivirus protège contre les virus informatiques', 'Un firewall est matériel, tandis qu\'un antivirus est logiciel', 'Un firewall est utilisé sur les serveurs, tandis qu\'un antivirus est utilisé sur les ordinateurs personnels', 1, 'L3'),
(33, 'Qu\'est-ce qu\'un algorithme de recherche ?', 'Un algorithme permettant de trouver une valeur dans un ensemble de données', 'Un algorithme qui génère des nombres aléatoires', 'Un algorithme qui trie des données', 'Un algorithme qui supprime des données', 1, 'L3'),
(34, 'Qu\'est-ce que le \"Machine Learning\" ?', 'Un sous-domaine de l\'intelligence artificielle où les systèmes apprennent à partir de données', 'Un logiciel de gestion de projet', 'Un langage de programmation', 'Un concept de programmation orientée objet', 1, 'L3'),
(35, 'Qu\'est-ce qu\'un \"Data Center\" ?', 'Un centre de données où sont stockées et traitées de grandes quantités de données', 'Un logiciel de gestion de base de données', 'Un système de stockage de données sur disque dur', 'Un serveur web', 1, 'L3'),
(36, 'Qu\'est-ce que le \"Cryptage\" ?', 'Le processus de conversion de données en un code secret pour en assurer la confidentialité', 'Un logiciel de dessin', 'Un logiciel de messagerie', 'Une méthode de sauvegarde de données', 1, 'L3'),
(37, 'Qu\'est-ce que le \"Big Data\" ?', 'Un terme utilisé pour décrire de grandes quantités de données', 'Un logiciel de traitement de texte', 'Une technique de cryptage des données', 'Un type de serveur web', 1, 'L3'),
(38, 'Quelle est la fonction principale d\'un logiciel de gestion de projet ?', 'Planifier, organiser et suivre les projets', 'Créer des animations', 'Éditer des vidéos', 'Enregistrer des sons', 1, 'L3'),
(39, 'Qu\'est-ce qu\'un \"Cluster\" en informatique ?', 'Un groupe de serveurs travaillant ensemble pour fournir des services', 'Un logiciel de dessin', 'Une méthode de recherche sur Internet', 'Un type de virus informatique', 1, 'L3'),
(40, 'Qu\'est-ce que le \"Deep Learning\" ?', 'Une technique d\'apprentissage automatique basée sur des réseaux de neurones artificiels', 'Un langage de programmation pour les enfants', 'Un langage de programmation utilisé pour créer des graphiques', 'Un concept de programmation orientée objet', 1, 'L3'),
(41, 'Qu\'est-ce que le \"Crowdsourcing\" en informatique ?', 'Le fait de confier une tâche à un grand nombre de personnes via Internet', 'Un logiciel de messagerie', 'Une méthode de recherche sur Internet', 'Un type de virus informatique', 1, 'L3'),
(42, 'Quelle est la fonction principale d\'un logiciel de gestion de contenu (CMS) ?', 'Créer, gérer et publier du contenu sur un site web', 'Surfer sur Internet', 'Envoyer des e-mails', 'Jouer à des jeux', 1, 'L3'),
(43, 'Qu\'est-ce qu\'un \"Data Scientist\" ?', 'Un professionnel qui analyse et interprète des données pour prendre des décisions stratégiques', 'Un logiciel de traitement de texte', 'Une technique de cryptage des données', 'Un type de serveur web', 1, 'L3'),
(44, 'Qu\'est-ce que le \"DevOps\" ?', 'Une approche de développement logiciel qui vise à rapprocher les équipes de développement et d\'exploitation', 'Un logiciel de dessin', 'Un langage de programmation', 'Un concept de programmation orientée objet', 1, 'L3'),
(45, 'Qu\'est-ce qu\'un \"Data Lake\" en informatique ?', 'Un système de stockage de données brutes', 'Un logiciel de traitement de texte', 'Un langage de programmation', 'Un concept de programmation orientée objet', 1, 'L3'),
(46, 'Qu\'est-ce qu\'un réseau de neurones artificiels ?', 'Un modèle informatique inspiré du cerveau humain', 'Un réseau de câbles utilisé pour connecter des ordinateurs', 'Un réseau social pour les robots', 'Un réseau utilisé pour transmettre des signaux électriques', 1, 'M1'),
(47, 'Qu\'est-ce qu\'un logiciel Open Source ?', 'Un logiciel dont le code source est accessible à tous', 'Un logiciel qui ne peut être utilisé que par une seule personne à la fois', 'Un logiciel gratuit', 'Un logiciel qui n\'est pas protégé par des droits d\'auteur', 1, 'M1'),
(48, 'Qu\'est-ce que le \"Natural Language Processing\" (NLP) ?', 'Le traitement automatique du langage naturel par un ordinateur', 'Un logiciel de traitement de texte', 'Un langage de programmation', 'Une technique de cryptage des données', 1, 'M1'),
(49, 'Qu\'est-ce que le \"Data Mining\" en informatique ?', 'L\'extraction de connaissances à partir de grandes quantités de données', 'Un logiciel de traitement de texte', 'Un langage de programmation', 'Une technique de cryptage des données', 1, 'M1'),
(50, 'Qu\'est-ce qu\'un \"API\" en informatique ?', 'Une interface de programmation d\'applications', 'Un logiciel de dessin', 'Un langage de programmation', 'Une technique de cryptage des données', 1, 'M1'),
(51, 'Qu\'est-ce que la \"Sécurité Informatique\" ?', 'La protection des systèmes informatiques contre les intrusions et les attaques', 'Un logiciel de traitement de texte', 'Un langage de programmation', 'Une technique de cryptage des données', 1, 'M1'),
(52, 'Qu\'est-ce que le \"Cloud Computing\" ?', 'La fourniture de services informatiques via Internet', 'Un logiciel de météo en ligne', 'Un réseau social pour les entreprises', 'Un système de stockage de données sur disque dur', 1, 'M1'),
(53, 'Qu\'est-ce que le \"Machine Learning\" ?', 'Un sous-domaine de l\'intelligence artificielle où les systèmes apprennent à partir de données', 'Un logiciel de gestion de projet', 'Un langage de programmation', 'Un concept de programmation orientée objet', 1, 'M1'),
(54, 'Qu\'est-ce qu\'un \"Data Center\" ?', 'Un centre de données où sont stockées et traitées de grandes quantités de données', 'Un logiciel de gestion de base de données', 'Un système de stockage de données sur disque dur', 'Un serveur web', 1, 'M1'),
(55, 'Qu\'est-ce que le \"Cryptage\" ?', 'Le processus de conversion de données en un code secret pour en assurer la confidentialité', 'Un logiciel de dessin', 'Un logiciel de messagerie', 'Une méthode de sauvegarde de données', 1, 'M1'),
(117, 'Comment est la terre ?', 'Ovale', 'Ronde', 'Carree', 'Rectangle', 2, 'L2'),
(57, 'Qu\'est-ce que le \"Data Lake\" en informatique ?', 'Un système de stockage de données brutes', 'Un logiciel de traitement de texte', 'Un langage de programmation', 'Un concept de programmation orientée objet', 1, 'M1'),
(58, 'Quelle est la fonction principale d\'un logiciel de gestion de projet ?', 'Planifier, organiser et suivre les projets', 'Créer des animations', 'Éditer des vidéos', 'Enregistrer des sons', 1, 'M1'),
(59, 'Qu\'est-ce qu\'un \"Cluster\" en informatique ?', 'Un groupe de serveurs travaillant ensemble pour fournir des services', 'Un logiciel de dessin', 'Une méthode de recherche sur Internet', 'Un type de virus informatique', 1, 'M1'),
(60, 'Qu\'est-ce que le \"Deep Learning\" ?', 'Une technique d\'apprentissage automatique basée sur des réseaux de neurones artificiels', 'Un langage de programmation pour les enfants', 'Un langage de programmation utilisé pour créer des graphiques', 'Un concept de programmation orientée objet', 1, 'M1'),
(61, 'Qu\'est-ce que la \"Programmation Orientée Objet\" ?', 'Un style de programmation basé sur la définition de classes et d\'objets', 'Un langage de programmation pour les enfants', 'Un langage de programmation utilisé pour créer des graphiques', 'Un concept de programmation obsolète', 1, 'M2'),
(62, 'Qu\'est-ce que le \"Big Data\" ?', 'Un terme utilisé pour décrire de grandes quantités de données', 'Un logiciel de traitement de texte', 'Une technique de cryptage des données', 'Un type de serveur web', 1, 'M2'),
(63, 'Qu\'est-ce que la \"Programmation Fonctionnelle\" ?', 'Un style de programmation basé sur les fonctions mathématiques', 'Un langage de programmation utilisé pour créer des interfaces utilisateur', 'Un concept de programmation utilisé pour les calculs scientifiques', 'Un type de programmation utilisé pour les jeux vidéo', 1, 'M2'),
(64, 'Qu\'est-ce que le \"Machine Learning\" ?', 'Un domaine de l\'intelligence artificielle où les systèmes apprennent à partir de données', 'Un logiciel utilisé pour gérer les bases de données', 'Une méthode de cryptage des données', 'Un langage de programmation pour les supercalculateurs', 1, 'M2'),
(66, 'Qu\'est-ce que le \"Deep Learning\" ?', 'Une branche du machine learning basée sur des réseaux neuronaux profonds', 'Un logiciel de dessin assisté par ordinateur', 'Un langage de programmation utilisé pour les simulations scientifiques', 'Une méthode de gestion de projet informatique', 1, 'M2'),
(67, 'Qu\'est-ce que la \"Blockchain\" ?', 'Une technologie de stockage et de transmission d\'informations, transparente, sécurisée, et fonctionnant sans organe central de contrôle', 'Un langage de programmation pour les bases de données', 'Un système de gestion de contenu web', 'Une méthode de cryptage des données', 1, 'M2'),
(69, 'Qu\'est-ce que le \"NoSQL\" ?', 'Une famille de systèmes de gestion de bases de données qui ne suivent pas le modèle de base de données relationnelle', 'Un langage de programmation pour les jeux vidéo', 'Un type de serveur web sécurisé', 'Un logiciel de traitement de texte', 1, 'M2'),
(70, 'Qu\'est-ce que le \"Containerization\" ?', 'Une méthode de virtualisation où les applications et leurs dépendances sont regroupées dans des conteneurs', 'Un langage de programmation pour les enfants', 'Une technique de cryptage des données', 'Un type de serveur web', 1, 'M2'),
(71, 'Qu\'est-ce que le \"Cybersecurity\" ?', 'La pratique de protéger les systèmes informatiques, les réseaux, les programmes et les données contre des attaques, des dommages ou un accès non autorisé', 'Un logiciel de dessin assisté par ordinateur', 'Une méthode de gestion de projet informatique', 'Un langage de programmation utilisé pour les simulations scientifiques', 1, 'M2'),
(72, 'Qu\'est-ce que la \"Réalité Virtuelle\" ?', 'Un environnement généré par ordinateur qui simule la présence physique de l\'utilisateur', 'Un langage de programmation pour les supercalculateurs', 'Un logiciel utilisé pour gérer les bases de données', 'Une méthode de cryptage des données', 1, 'M2'),
(73, 'Qu\'est-ce que le \"Data Mining\" ?', 'L\'extraction de connaissances à partir de grandes quantités de données', 'Un langage de programmation utilisé pour les simulations scientifiques', 'Un logiciel de dessin assisté par ordinateur', 'Une méthode de gestion de projet informatique', 1, 'M2'),
(115, 'A quoi sert css ?', 'Styliser page web', 'styliser un pc', 'les deux', 'aucun', 1, 'L1'),
(116, 'Quel est le language coté serveur ?', 'JS', 'PHP', 'HTML', 'CSS', 2, 'L1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
