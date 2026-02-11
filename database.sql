-- 1. Clean up old tables
DROP TABLE IF EXISTS Medecin;
DROP TABLE IF EXISTS Service;
DROP TABLE IF EXISTS Utilisateur;

-- 2. Create Services
CREATE TABLE Service (
    Id SERIAL PRIMARY KEY,
    Nom_service VARCHAR(50) NOT NULL,
    Description TEXT NOT NULL
);

-- 3. Create Doctors
CREATE TABLE Medecin (
    Id SERIAL PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    specialite VARCHAR(50) NOT NULL,
    biographie TEXT,
    photo_url VARCHAR(255),
    id_service INT REFERENCES Service(Id) ON DELETE CASCADE
);

-- 4. Create Users (Admin)
CREATE TABLE Utilisateur (
    id_user SERIAL PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);

-- 5. Insert Data
INSERT INTO Service (Nom_service, Description) VALUES 
('Cardiologie', 'Soins du cœur.'),
('Dermatologie', 'Soins de la peau.'),
('Pédiatrie', 'Soins des enfants.');

INSERT INTO Medecin (Nom, Prenom, specialite, biographie, id_service, photo_url) VALUES 
('Dupont', 'Jean', 'Cardiologue', 'Expert cœur.', 1, 'https://randomuser.me/api/portraits/men/32.jpg'),
('Martin', 'Sophie', 'Dermatologue', 'Expert peau.', 2, 'https://randomuser.me/api/portraits/women/44.jpg');

-- 6. Insert Admin (Login: admin@medicab.com / Pass: admin123)
INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe) 
VALUES ('Admin', 'Super', 'admin@medicab.com', 'admin123');