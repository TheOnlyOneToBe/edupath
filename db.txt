-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.3.0 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour bd
CREATE DATABASE IF NOT EXISTS `bds` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bds`;

-- Listage de la structure de la table bd. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fonction` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.utilisateur : ~16 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `password`, `fonction`) VALUES
	(1, 'j', 'j', 'Admin'),
	(2, 'admin', 'admin123', 'Administrateur'),
	(3, 'prof1', 'prof123', 'Professeur'),
	(4, 'prof2', 'prof456', 'Professeur'),
	(5, 'etudiant1', 'etu123', 'Étudiant'),
	(6, 'etudiant2', 'etu456', 'Étudiant'),
	(7, 'secretaire1', 'sec123', 'Secrétaire'),
	(8, 'directeur', 'dir123', 'Directeur'),
	(9, 'coordinateur', 'coord123', 'Coordinateur'),
	(10, 'bibliothecaire', 'biblio123', 'Bibliothécaire'),
	(11, 'comptable', 'compt123', 'Comptable'),
	(12, 'conseiller', 'cons123', 'Conseiller'),
	(13, 'technicien', 'tech123', 'Technicien'),
	(14, 'assistant', 'assist123', 'Assistant'),
	(15, 'responsable', 'resp123', 'Responsable'),
	(16, 'superviseur', 'super123', 'Superviseur');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
-- Listage de la structure de la table bd. article
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description_art` varchar(200) NOT NULL,
  `date_pub` date NOT NULL,
  `statut` varchar(100) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.article : ~15 rows (environ)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id_article`, `titre`, `description_art`, `date_pub`, `statut`, `photo`, `id_utilisateur`) VALUES
	(1, 'Introduction à la programmation', 'Découvrez les bases de la programmation', '2025-01-15', 'publié', 'prog1.jpg', 1),
	(2, 'Gestion de projet agile', 'Méthodologies agiles pour la gestion de projet', '2025-01-16', 'Publié', 'agile1.jpg', 2),
	(3, 'Marketing digital', 'Stratégies de marketing en ligne', '2025-01-17', 'Publié', 'marketing1.jpg', 3),
	(4, 'Finance pour débutants', 'Introduction aux concepts financiers', '2025-01-18', 'Publié', 'finance1.jpg', 4),
	(5, 'Ressources Humaines 2.0', 'Nouvelles tendances RH', '2025-01-19', 'Publié', 'rh1.jpg', 5),
	(6, 'Commerce international', 'Guide du commerce mondial', '2025-01-20', 'Publié', 'commerce1.jpg', 1),
	(7, 'Construction durable', 'Méthodes de construction écologique', '2025-01-21', 'Publié', 'construction1.jpg', 2),
	(8, 'Design moderne', 'Tendances du design contemporain', '2025-01-22', 'Publié', 'design1.jpg', 3),
	(9, 'Santé publique', 'Enjeux de la santé moderne', '2025-01-23', 'Publié', 'sante1.jpg', 4),
	(10, 'Droit des affaires', 'Aspects juridiques des entreprises', '2025-01-24', 'Publié', 'droit1.jpg', 5),
	(11, 'Psychologie cognitive', 'Études du comportement humain', '2025-01-25', 'Publié', 'psycho1.jpg', 1),
	(12, 'Apprentissage des langues', 'Méthodes d\'apprentissage efficaces', '2025-01-26', 'Publié', 'langues1.jpg', 2),
	(13, 'Politique internationale', 'Relations internationales actuelles', '2025-01-27', 'Publié', 'politique1.jpg', 3),
	(14, 'Journalisme d\'investigation', 'Techniques d\'investigation', '2025-01-28', 'Publié', 'journalisme1.jpg', 4),
	(15, 'Innovation technologique', 'Dernières avancées technologiques', '2025-01-29', 'Publié', 'tech1.jpg', 5),
	(16, 'qscc', ',,;;;*', '2025-03-23', 'publié', 'assets/imgs/articles/67e05839eb520.jpg', NULL),
	(17, 'jean', 'vOTRE MOT EST DOUX', '2025-03-24', 'publié', '../../assets/imgs/articles/67e1c8fd454c2.png', NULL),
	(18, 'Jean Marc', 'vOTRE MOT EST DOUX', '2025-03-24', 'publié', 'assets/imgs/articles/67e1cafd52cb6.png', NULL),
	(19, 'Jean Marc', 'VOTRE MOT EST DOUX', '2025-03-24', 'publié', '67e1cc4d69aeb.png', NULL);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `cycle` (
  `id_cycle` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `nbre_annee` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cycle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.cycle : ~15 rows (environ)
/*!40000 ALTER TABLE `cycle` DISABLE KEYS */;

INSERT INTO `cycle` (`id_cycle`, `nom`, `nbre_annee`) VALUES
	(1, 'Licence', '4'),
	(2, 'Master', '2 ans'),
	(3, 'Doctorat', '3 ans'),
	(4, 'DUT', '2 ans'),
	(5, 'BTS', '2 ans'),
	(6, 'Bachelore', '8'),
	(7, 'MBA', '2 ans'),
	(8, 'DESS', '1 an'),
	(9, 'DEA', '1 an'),
	(10, 'Certificat', '1 an'),
	(11, 'Formation Continue', '1 an'),
	(12, 'Formation Professionnelle', '2 ans'),
	(13, 'Cycle Préparatoire', '2 ans'),
	(14, 'Cycle Ingénieur', '3 ans'),
	(15, 'Cycle Spécialisé', '2 ans');
/*!40000 ALTER TABLE `cycle` ENABLE KEYS */;
-- Listage de la structure de la table bd. filiere
CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_filiere`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `filiere_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.filiere : ~15 rows (environ)
/*!40000 ALTER TABLE `filiere` DISABLE KEYS */;
INSERT INTO `filiere` (`id_filiere`, `nom`, `description`, `id_utilisateur`) VALUES
	(1, 'Informatique', 'Formation en développement et systèmes informatiques', 1),
	(2, 'Gestion', 'Formation en management et administration', 2),
	(3, 'Marketing', 'Formation en marketing et communication', 3),
	(4, 'Finance', 'Formation en finance et comptabilité', 4),
	(5, 'Ressources Humaines', 'Formation en gestion des ressources humaines', 5),
	(6, 'Commerce International', 'Formation en commerce international', 1),
	(7, 'Génie Civil', 'Formation en construction et infrastructure', 2),
	(8, 'Architecture', 'Formation en conception architecturale', 3),
	(9, 'Design', 'Formation en design graphique et multimédia', 4),
	(10, 'Médecine', 'Formation en sciences médicales', 5),
	(11, 'Droit', 'Formation en sciences juridiques', 1),
	(12, 'Psychologie', 'Formation en sciences comportementales', 2),
	(13, 'Langues', 'Formation en langues étrangères', 3),
	(14, 'Sciences Politiques', 'Formation en sciences politiques', 4),
	(15, 'Journalisme', 'Formation en communication médiatique', 5);
/*!40000 ALTER TABLE `filiere` ENABLE KEYS */;
-- Listage de la structure de la table bd. avoir
CREATE TABLE IF NOT EXISTS `avoir` (
  `id_filiere` int NOT NULL,
  `id_cycle` int NOT NULL,
  `montant_inscription` int DEFAULT NULL,
  `montant_scolarite` int DEFAULT NULL,
  PRIMARY KEY (`id_filiere`,`id_cycle`),
  KEY `id_cycle` (`id_cycle`),
  CONSTRAINT `avoir_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `avoir_ibfk_2` FOREIGN KEY (`id_cycle`) REFERENCES `cycle` (`id_cycle`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.avoir : ~15 rows (environ)
/*!40000 ALTER TABLE `avoir` DISABLE KEYS */;
INSERT INTO `avoir` (`id_filiere`, `id_cycle`, `montant_inscription`, `montant_scolarite`) VALUES
	(1, 1, 5000, 25000),
	(1, 2, 6000, 30000),
	(2, 1, 4500, 23000),
	(2, 2, 5500, 28000),
	(3, 1, 4800, 24000),
	(3, 2, 5800, 29000),
	(4, 1, 5200, 26000),
	(4, 2, 6200, 31000),
	(5, 1, 4700, 23500),
	(5, 2, 5700, 28500),
	(5, 5, 1500, 25000),
	(6, 1, 5100, 25500),
	(6, 2, 6100, 30500),
	(7, 1, 5300, 26500),
	(7, 2, 6300, 31500);
/*!40000 ALTER TABLE `avoir` ENABLE KEYS */;

-- Listage de la structure de la table bd. bourse
CREATE TABLE IF NOT EXISTS `bourse` (
  `id_bourse` int NOT NULL AUTO_INCREMENT,
  `caracteristique` varchar(200) DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_bourse`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `bourse_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.bourse : ~15 rows (environ)
/*!40000 ALTER TABLE `bourse` DISABLE KEYS */;
INSERT INTO `bourse` (`id_bourse`, `caracteristique`, `id_utilisateur`) VALUES
	(1, 'Bourse d\'excellence académiqu', 1),
	(2, 'Bourse sociale', 2),
	(3, 'Bourse de mérite', 3),
	(4, 'Bourse internationale', 4),
	(5, 'Bourse de recherche', 5),
	(6, 'Bourse sportive', 1),
	(7, 'Bourse culturelle', 2),
	(8, 'Bourse d\'innovation', 3),
	(9, 'Bourse de mobilité', 4),
	(10, 'Bourse doctorale', 5),
	(11, 'Bourse de stage', 1),
	(12, 'Bourse entrepreneuriale', 2),
	(13, 'Bourse linguistique', 3),
	(14, 'Bourse technologique', 4),
	(15, 'Bourse artistique', 5),
	(16, 'love', NULL);
/*!40000 ALTER TABLE `bourse` ENABLE KEYS */;

-- Listage de la structure de la table bd. contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sujet` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.contact : ~19 rows (environ)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id_contact`, `nom`, `email`, `sujet`, `message`, `date_envoi`) VALUES
	(1, 'Jean', 'jkmarc8173@gmail.com', 'Je vous aime', 'Love you', '2025-03-20 07:09:28'),
	(2, 'Jean', 'jkmarc8173@gmail.com', 'Je vous aime', 'Love you', '2025-03-20 07:10:11'),
	(3, 'Jean', 'jkmarc8173@gmail.com', 'Je vous aime', 'Love you', '2025-03-20 07:11:02'),
	(4, 'Jean', 'jkmarc8173@gmail.com', 'Je vous aime', 'Love you', '2025-03-20 07:12:04'),
	(5, 'Jean Dupont', 'jean.dupont@email.com', 'Demande d\'information', 'Je souhaite des informations sur les formations.', '2025-03-20 07:34:30'),
	(6, 'Marie Martin', 'marie.martin@email.com', 'Inscription', 'Comment puis-je m\'inscrire à vos cours ?', '2025-03-20 07:34:30'),
	(7, 'Pierre Durant', 'pierre.durant@email.com', 'Tarifs', 'Je voudrais connaître vos tarifs.', '2025-03-20 07:34:30'),
	(8, 'Sophie Bernard', 'sophie.bernard@email.com', 'Stage', 'Possibilité de stage en entreprise ?', '2025-03-20 07:34:30'),
	(9, 'Lucas Petit', 'lucas.petit@email.com', 'Formation continue', 'Information sur la formation continue', '2025-03-20 07:34:30'),
	(10, 'Emma Garcia', 'emma.garcia@email.com', 'Partenariat', 'Proposition de partenariat', '2025-03-20 07:34:30'),
	(11, 'Thomas Robert', 'thomas.robert@email.com', 'Question technique', 'Problème d\'accès au site', '2025-03-20 07:34:30'),
	(12, 'Julie Lambert', 'julie.lambert@email.com', 'Candidature', 'Envoi de CV pour poste', '2025-03-20 07:34:30'),
	(13, 'Nicolas Moreau', 'nicolas.moreau@email.com', 'Événement', 'Information sur prochain événement', '2025-03-20 07:34:30'),
	(14, 'Laura Simon', 'laura.simon@email.com', 'Documentation', 'Demande de brochure', '2025-03-20 07:34:30'),
	(15, 'Antoine Dubois', 'antoine.dubois@email.com', 'Rendez-vous', 'Demande de rendez-vous', '2025-03-20 07:34:30'),
	(16, 'Claire Leroy', 'claire.leroy@email.com', 'Réclamation', 'Problème administratif', '2025-03-20 07:34:30'),
	(17, 'Paul Michel', 'paul.michel@email.com', 'Suggestion', 'Proposition d\'amélioration', '2025-03-20 07:34:30'),
	(18, 'Sarah Blanc', 'sarah.blanc@email.com', 'Admission', 'Processus d\'admission', '2025-03-20 07:34:30'),
	(19, 'David Roux', 'david.roux@email.com', 'Autre', 'Question générale', '2025-03-20 07:34:30'),
	(20, 'jean', 'kj@gmail.com', 'Demande d\'adhesion', 'Je veux m\'inscrire', '2025-03-21 12:07:36');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Listage de la structure de la table bd. cycle


-- Listage de la structure de la table bd. evenement
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `description_ev` varchar(200) DEFAULT NULL,
  `id_utilisateur` int DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.evenement : ~15 rows (environ)
/*!40000 ALTER TABLE `evenement` DISABLE KEYS */;
INSERT INTO `evenement` (`id_evenement`, `nom`, `description_ev`, `id_utilisateur`) VALUES
	(1, 'Journée Portes Ouvertes', 'Découverte de l\'établissement et des formations', 1),
	(2, 'Conférence Tech', 'Conférence sur les nouvelles technologies', 2),
	(3, 'Forum Entreprises', 'Rencontre avec les entreprises partenaires', 3),
	(4, 'Hackathon', 'Compétition de programmation', 4),
	(5, 'Séminaire RH', 'Séminaire sur les ressources humaines', 5),
	(6, 'Gala annuel', 'Soirée de remise des diplômes', 1),
	(7, 'Workshop Design', 'Atelier pratique de design', 2),
	(8, 'Concours Innovation', 'Concours de projets innovants', 3),
	(9, 'Festival culturel', 'Événement multiculturel', 4),
	(10, 'Conférence Santé', 'Conférence sur la santé publique', 5),
	(11, 'Salon de l\'emploi', 'Rencontres professionnelles', 1),
	(12, 'Débat éthique', 'Discussion sur l\'éthique professionnelle', 2),
	(13, 'Exposition artistique', 'Exposition des travaux étudiants', 3),
	(14, 'Marathon sportif', 'Événement sportif caritatif', 4),
	(15, 'Cérémonie de remise', 'Remise des prix d\'excellence', 5);
/*!40000 ALTER TABLE `evenement` ENABLE KEYS */;



-- Listage de la structure de la table bd. partenaire
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id_partenaire` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_partenaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table bd.partenaire : ~15 rows (environ)
/*!40000 ALTER TABLE `partenaire` DISABLE KEYS */;
INSERT INTO `partenaire` (`id_partenaire`, `nom`, `photo`) VALUES
	(1, 'Microsoft', 'microsoft.jpg'),
	(2, 'Google', 'google.jpg'),
	(3, 'Apple', 'apple.jpg'),
	(4, 'IBM', 'ibm.jpg'),
	(5, 'Oracle', 'oracle.jpg'),
	(6, 'Amazon', 'amazon.jpg'),
	(7, 'Facebook', 'facebook.jpg'),
	(8, 'Twitter', 'twitter.jpg'),
	(9, 'LinkedIn', 'linkedin.jpg'),
	(10, 'SAP', 'sap.jpg'),
	(11, 'Cisco', 'cisco.jpg'),
	(12, 'Intel', 'intel.jpg'),
	(13, 'HP', 'hp.jpg'),
	(14, 'Dell', 'dell.jpg'),
	(15, 'Adobe', 'adobe.jpg'),
	(17, '3 Cycle Préparatoire', '67e1d789b24e0.png');
/*!40000 ALTER TABLE `partenaire` ENABLE KEYS */;



/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
