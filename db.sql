-- Table Utilisateur : Représente les utilisateurs du système.
CREATE TABLE Utilisateur (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    fonction VARCHAR(50)
) ENGINE=InnoDB;

-- Table Filiere : Représente les filières disponibles.
CREATE TABLE Filiere (
    id_filiere INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    description VARCHAR(200),
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table Cycle : Représente les cycles d'études.
CREATE TABLE Cycle (
    id_cycle INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    nbre_annee VARCHAR(20)
) ENGINE=InnoDB;

-- Table Avoir : Associe les filières aux cycles avec des informations financières.
CREATE TABLE Avoir (
    id_filiere INT,
    id_cycle INT,
    montant_inscription INT,
    montant_scolarite INT,
    PRIMARY KEY (id_filiere, id_cycle),
    FOREIGN KEY (id_filiere) REFERENCES Filiere(id_filiere)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_cycle) REFERENCES Cycle(id_cycle)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table Article : Représente les articles publiés par les utilisateurs.
CREATE TABLE Article (
    id_article INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(50) NOT NULL,
    description_art VARCHAR(200) NOT NULL,
    date_pub DATE NOT NULL,
    statut VARCHAR(100) NOT NULL,
    photo VARCHAR(200),
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table Bourse : Représente les bourses attribuées par des utilisateurs.
CREATE TABLE Bourse (
    id_bourse INT PRIMARY KEY AUTO_INCREMENT,
    caracteristique VARCHAR(200),
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table Contact : Stocke les messages du formulaire de contact
CREATE TABLE Contact (
    id_contact INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    sujet VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table Evenement : Représente les événements organisés par des utilisateurs.
CREATE TABLE Evenement (
    id_evenement INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    description_ev VARCHAR(200),
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table Partenaire : Représente les partenaires associés.
CREATE TABLE Partenaire (
    id_partenaire INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    photo VARCHAR(50)
) ENGINE=InnoDB;