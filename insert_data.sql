-- Insertion des données pour la table Utilisateur
INSERT INTO Utilisateur (login, password, fonction) VALUES
('admin', 'admin123', 'Administrateur'),
('prof1', 'prof123', 'Professeur'),
('prof2', 'prof456', 'Professeur'),
('etudiant1', 'etu123', 'Étudiant'),
('etudiant2', 'etu456', 'Étudiant'),
('secretaire1', 'sec123', 'Secrétaire'),
('directeur', 'dir123', 'Directeur'),
('coordinateur', 'coord123', 'Coordinateur'),
('bibliothecaire', 'biblio123', 'Bibliothécaire'),
('comptable', 'compt123', 'Comptable'),
('conseiller', 'cons123', 'Conseiller'),
('technicien', 'tech123', 'Technicien'),
('assistant', 'assist123', 'Assistant'),
('responsable', 'resp123', 'Responsable'),
('superviseur', 'super123', 'Superviseur');

-- Insertion des données pour la table Filiere
INSERT INTO Filiere (nom, description, id_utilisateur) VALUES
('Informatique', 'Formation en développement et systèmes informatiques', 1),
('Gestion', 'Formation en management et administration', 2),
('Marketing', 'Formation en marketing et communication', 3),
('Finance', 'Formation en finance et comptabilité', 4),
('Ressources Humaines', 'Formation en gestion des ressources humaines', 5),
('Commerce International', 'Formation en commerce international', 1),
('Génie Civil', 'Formation en construction et infrastructure', 2),
('Architecture', 'Formation en conception architecturale', 3),
('Design', 'Formation en design graphique et multimédia', 4),
('Médecine', 'Formation en sciences médicales', 5),
('Droit', 'Formation en sciences juridiques', 1),
('Psychologie', 'Formation en sciences comportementales', 2),
('Langues', 'Formation en langues étrangères', 3),
('Sciences Politiques', 'Formation en sciences politiques', 4),
('Journalisme', 'Formation en communication médiatique', 5);

-- Insertion des données pour la table Cycle
INSERT INTO Cycle (nom, nbre_annee) VALUES
('Licence', '3 ans'),
('Master', '2 ans'),
('Doctorat', '3 ans'),
('DUT', '2 ans'),
('BTS', '2 ans'),
('Bachelor', '3 ans'),
('MBA', '2 ans'),
('DESS', '1 an'),
('DEA', '1 an'),
('Certificat', '1 an'),
('Formation Continue', '1 an'),
('Formation Professionnelle', '2 ans'),
('Cycle Préparatoire', '2 ans'),
('Cycle Ingénieur', '3 ans'),
('Cycle Spécialisé', '2 ans');

-- Insertion des données pour la table Avoir
INSERT INTO Avoir (id_filiere, id_cycle, montant_inscription, montant_scolarite) VALUES
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
(6, 1, 5100, 25500),
(6, 2, 6100, 30500),
(7, 1, 5300, 26500),
(7, 2, 6300, 31500),
(8, 1, 5400, 27000);

-- Insertion des données pour la table Article
INSERT INTO Article (titre, description_art, date_pub, statut, photo, id_utilisateur) VALUES
('Introduction à la programmation', 'Découvrez les bases de la programmation', '2025-01-15', 'Publié', 'prog1.jpg', 1),
('Gestion de projet agile', 'Méthodologies agiles pour la gestion de projet', '2025-01-16', 'Publié', 'agile1.jpg', 2),
('Marketing digital', 'Stratégies de marketing en ligne', '2025-01-17', 'Publié', 'marketing1.jpg', 3),
('Finance pour débutants', 'Introduction aux concepts financiers', '2025-01-18', 'Publié', 'finance1.jpg', 4),
('Ressources Humaines 2.0', 'Nouvelles tendances RH', '2025-01-19', 'Publié', 'rh1.jpg', 5),
('Commerce international', 'Guide du commerce mondial', '2025-01-20', 'Publié', 'commerce1.jpg', 1),
('Construction durable', 'Méthodes de construction écologique', '2025-01-21', 'Publié', 'construction1.jpg', 2),
('Design moderne', 'Tendances du design contemporain', '2025-01-22', 'Publié', 'design1.jpg', 3),
('Santé publique', 'Enjeux de la santé moderne', '2025-01-23', 'Publié', 'sante1.jpg', 4),
('Droit des affaires', 'Aspects juridiques des entreprises', '2025-01-24', 'Publié', 'droit1.jpg', 5),
('Psychologie cognitive', 'Études du comportement humain', '2025-01-25', 'Publié', 'psycho1.jpg', 1),
('Apprentissage des langues', 'Méthodes d''apprentissage efficaces', '2025-01-26', 'Publié', 'langues1.jpg', 2),
('Politique internationale', 'Relations internationales actuelles', '2025-01-27', 'Publié', 'politique1.jpg', 3),
('Journalisme d''investigation', 'Techniques d''investigation', '2025-01-28', 'Publié', 'journalisme1.jpg', 4),
('Innovation technologique', 'Dernières avancées technologiques', '2025-01-29', 'Publié', 'tech1.jpg', 5);

-- Insertion des données pour la table Bourse
INSERT INTO Bourse (caracteristique, id_utilisateur) VALUES
('Bourse d''excellence académique', 1),
('Bourse sociale', 2),
('Bourse de mérite', 3),
('Bourse internationale', 4),
('Bourse de recherche', 5),
('Bourse sportive', 1),
('Bourse culturelle', 2),
('Bourse d''innovation', 3),
('Bourse de mobilité', 4),
('Bourse doctorale', 5),
('Bourse de stage', 1),
('Bourse entrepreneuriale', 2),
('Bourse linguistique', 3),
('Bourse technologique', 4),
('Bourse artistique', 5);

-- Insertion des données pour la table Contact
INSERT INTO Contact (nom, email, sujet, message) VALUES
('Jean Dupont', 'jean.dupont@email.com', 'Demande d''information', 'Je souhaite des informations sur les formations.'),
('Marie Martin', 'marie.martin@email.com', 'Inscription', 'Comment puis-je m''inscrire à vos cours ?'),
('Pierre Durant', 'pierre.durant@email.com', 'Tarifs', 'Je voudrais connaître vos tarifs.'),
('Sophie Bernard', 'sophie.bernard@email.com', 'Stage', 'Possibilité de stage en entreprise ?'),
('Lucas Petit', 'lucas.petit@email.com', 'Formation continue', 'Information sur la formation continue'),
('Emma Garcia', 'emma.garcia@email.com', 'Partenariat', 'Proposition de partenariat'),
('Thomas Robert', 'thomas.robert@email.com', 'Question technique', 'Problème d''accès au site'),
('Julie Lambert', 'julie.lambert@email.com', 'Candidature', 'Envoi de CV pour poste'),
('Nicolas Moreau', 'nicolas.moreau@email.com', 'Événement', 'Information sur prochain événement'),
('Laura Simon', 'laura.simon@email.com', 'Documentation', 'Demande de brochure'),
('Antoine Dubois', 'antoine.dubois@email.com', 'Rendez-vous', 'Demande de rendez-vous'),
('Claire Leroy', 'claire.leroy@email.com', 'Réclamation', 'Problème administratif'),
('Paul Michel', 'paul.michel@email.com', 'Suggestion', 'Proposition d''amélioration'),
('Sarah Blanc', 'sarah.blanc@email.com', 'Admission', 'Processus d''admission'),
('David Roux', 'david.roux@email.com', 'Autre', 'Question générale');

-- Insertion des données pour la table Evenement
INSERT INTO Evenement (nom, description_ev, id_utilisateur) VALUES
('Journée Portes Ouvertes', 'Découverte de l''établissement et des formations', 1),
('Conférence Tech', 'Conférence sur les nouvelles technologies', 2),
('Forum Entreprises', 'Rencontre avec les entreprises partenaires', 3),
('Hackathon', 'Compétition de programmation', 4),
('Séminaire RH', 'Séminaire sur les ressources humaines', 5),
('Gala annuel', 'Soirée de remise des diplômes', 1),
('Workshop Design', 'Atelier pratique de design', 2),
('Concours Innovation', 'Concours de projets innovants', 3),
('Festival culturel', 'Événement multiculturel', 4),
('Conférence Santé', 'Conférence sur la santé publique', 5),
('Salon de l''emploi', 'Rencontres professionnelles', 1),
('Débat éthique', 'Discussion sur l''éthique professionnelle', 2),
('Exposition artistique', 'Exposition des travaux étudiants', 3),
('Marathon sportif', 'Événement sportif caritatif', 4),
('Cérémonie de remise', 'Remise des prix d''excellence', 5);

-- Insertion des données pour la table Partenaire
INSERT INTO Partenaire (nom, photo) VALUES
('Microsoft', 'microsoft.jpg'),
('Google', 'google.jpg'),
('Apple', 'apple.jpg'),
('IBM', 'ibm.jpg'),
('Oracle', 'oracle.jpg'),
('Amazon', 'amazon.jpg'),
('Facebook', 'facebook.jpg'),
('Twitter', 'twitter.jpg'),
('LinkedIn', 'linkedin.jpg'),
('SAP', 'sap.jpg'),
('Cisco', 'cisco.jpg'),
('Intel', 'intel.jpg'),
('HP', 'hp.jpg'),
('Dell', 'dell.jpg'),
('Adobe', 'adobe.jpg');
