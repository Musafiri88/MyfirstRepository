-- SingeeApp base des donnees
--	Création de la base de données
CREATE DATABASE SINGEEAPP;
USE SINGEEAPP;
--	Table de l'administrateur
CREATE TABLE admins (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL UNIQUE,
    Password_hash VARCHAR(255) NOT NULL,
    quartier VARCHAR(50) NOT NULL,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ;
--	Table des étudiants
CREATE TABLE etudiants (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL,
    Post_nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Sexe ENUM("M", "F", "Autres") NOT NULL,
    Etat_civil ENUM("Célibataire", "Marié(e)", "Autres")  NOT NULL,
    Nation VARCHAR(50) NOT NULL,
    Pays_prov ENUM("Burundi","RD Congo","Tanzanie","Rwanda","Cameroun","Cote d'Ivoire") NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Phone VARCHAR(20) UNIQUE NOT NULL,
    Passport_carte_id VARCHAR(100) NOT NULL UNIQUE,
    Quartier ENUM("Bukirasaze","Buterere","Buyenzi","Carama","Cibitoke","Kamenge","Kigobe","Kinama",
                  "Mtakura","Ngagara","Nyakabiga") NOT NULL,
    Address TEXT(50) NOT NULL,
    Registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ; 
--	Table des commentaires
CREATE TABLE commentaires (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    commentaires_content VARCHAR(250) NOT NULL UNIQUE,
    Registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ;

-- Insertion des données de base
-- Admin par défaut (mot de passe : admin123)
INSERT INTO admins (nom_complet, Password_hash, quartier) 
VALUES ("Eholo Musafiri Daniel", "admin123", "Cibitoke") ;