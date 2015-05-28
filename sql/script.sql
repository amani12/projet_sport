#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP TABLE IF EXISTS peut_concerner;
DROP TABLE IF EXISTS licencier,Club;
DROP TABLE IF EXISTS reserve;
DROP TABLE IF EXISTS concerner, actualite;
DROP TABLE IF EXISTS s_inscrire;
DROP TABLE IF EXISTS adresser,messagerie;
DROP TABLE IF EXISTS pratiquer;
DROP TABLE IF EXISTS horaire;
DROP TABLE IF EXISTS Mesagerie;
DROP TABLE IF EXISTS salle;
DROP TABLE IF EXISTS journee, planning;
DROP TABLE IF EXISTS activite;
DROP TABLE IF EXISTS appartenir,statue;
DROP TABLE IF EXISTS personnes, niveau;
DROP TABLE IF EXISTS campus;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Salle
#------------------------------------------------------------

CREATE TABLE Salle(
        ref_salle   Varchar (100) NOT NULL ,
        nom_salle   Varchar (100) ,
        maintenance Bool ,
        PRIMARY KEY (ref_salle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Activite
#------------------------------------------------------------

CREATE TABLE Activite(
        ref_activite         Varchar (100) NOT NULL ,
        nom_activite         Varchar (100) ,
        description_activite Varchar(2000),
        nbre_fixe_heure      Int ,
        capacite_max         Int ,
        etat                 Bool ,
		type_activite		 Varchar(100),
        numero_personne      Varchar (100) ,
		date_premier_cours	Varchar (100),
        PRIMARY KEY (ref_activite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Horaire
#------------------------------------------------------------

CREATE TABLE Horaire(
        heure_start  Varchar (100) ,
        heure_fin    Varchar (100) ,
        id           int (11) Auto_increment  NOT NULL ,
        Date_journee Varchar (100) NOT NULL ,
        ref_salle    Varchar (100) ,
        ref_activite Varchar (100) ,
        PRIMARY KEY (id ,Date_journee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reserve
#------------------------------------------------------------

CREATE TABLE reserve(
        description  Text ,
        ref_salle    Varchar (100) NOT NULL ,
        ref_activite Varchar (100) NOT NULL ,
        id           Int ,
        Date_journee Varchar (100) ,
        PRIMARY KEY (ref_salle ,ref_activite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Journee
#------------------------------------------------------------

CREATE TABLE Journee(
        Date_journee Varchar (100) NOT NULL ,
        etat_journee Bool ,
        id_planning  Int NOT NULL ,
        PRIMARY KEY (Date_journee ,id_planning )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: planning
#------------------------------------------------------------

CREATE TABLE planning(
        id_planning   int (11) Auto_increment  NOT NULL ,
        nom_planning  Varchar (100) ,
        date_de_debut Varchar (100) ,
        date_de_fin   Varchar (100) ,
        PRIMARY KEY (id_planning )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: campus
#------------------------------------------------------------

CREATE TABLE campus(
        ref_campus Varchar (100) NOT NULL ,
        nom        Varchar (100) ,
        PRIMARY KEY (ref_campus )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: personnes
#------------------------------------------------------------

CREATE TABLE personnes(
        numero_personne   Varchar (100) NOT NULL ,
        nom               Varchar (100) ,
        prenom            Varchar (100) ,
        date_de_naissance Varchar (100) ,
        photo             Varchar (100) ,
        tel               Varchar (100) ,
        email_perso       Varchar (100) ,
        ref_niveau        Varchar (100) ,
        PRIMARY KEY (numero_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: statue
#------------------------------------------------------------

CREATE TABLE statue(
        code_statue    Char (100) NOT NULL ,
        libelle_statue Varchar (100) ,
        PRIMARY KEY (code_statue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartenir
#------------------------------------------------------------

CREATE TABLE appartenir(
        email_uha        Varchar (100) ,
        pass_uha         Varchar (100) ,
        frais_sport      Bool ,
        photo_identite   Varchar (100) ,
        photo_certificat Varchar (100) ,
        numero_personne  Varchar (100) NOT NULL ,
        ref_campus       Varchar (100) ,
        code_statue      Char (100) ,
        PRIMARY KEY (numero_personne )
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: niveau
#------------------------------------------------------------

CREATE TABLE niveau(
        ref_niveau         Varchar (100) NOT NULL ,
        nombre_heure_sport Int ,
        ref_campus         Varchar (100) ,
        PRIMARY KEY (ref_niveau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: actualite
#------------------------------------------------------------

CREATE TABLE actualite(
        id_actualite    int (11) Auto_increment  NOT NULL ,
        titre           Varchar (100) ,
        description_act Text ,
        PRIMARY KEY (id_actualite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Mesagerie
#------------------------------------------------------------

CREATE TABLE Mesagerie(
        code_messagerie Varchar (100) NOT NULL ,
        raison          Varchar (100) ,
        contenue        Text ,
        PRIMARY KEY (code_messagerie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Club
#------------------------------------------------------------

CREATE TABLE Club(
        id_club         int (11) Auto_increment  NOT NULL ,
        nom_club        Varchar (100) ,
        activite        Varchar (100) ,
        licence_fichier Varchar (100) ,
        PRIMARY KEY (id_club )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pratiquer
#------------------------------------------------------------

CREATE TABLE pratiquer(
        etat            Char (100) ,
        numero_personne Varchar (100) NOT NULL ,
        ref_activite    Varchar (100) NOT NULL ,
        id              Int NOT NULL ,
        Date_journee    Varchar (100) NOT NULL ,
        PRIMARY KEY (numero_personne ,ref_activite ,id ,Date_journee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: s_inscrire
#------------------------------------------------------------

CREATE TABLE s_inscrire(
        etat_inscription Int ,
        notee_ou_pas     Bool ,
        principale       Bool ,
        note             Float ,
        numero_personne  Varchar (100) NOT NULL ,
        ref_activite     Varchar (100) NOT NULL ,
        PRIMARY KEY (numero_personne ,ref_activite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: concerner
#------------------------------------------------------------

CREATE TABLE concerner(
        ref_activite Varchar (100) NOT NULL ,
        id_actualite Int NOT NULL ,
        PRIMARY KEY (ref_activite ,id_actualite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: adresser
#------------------------------------------------------------

CREATE TABLE adresser(
        numero_personne Varchar (100) NOT NULL ,
        code_messagerie Varchar (100) NOT NULL ,
        PRIMARY KEY (numero_personne ,code_messagerie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: licencier
#------------------------------------------------------------

CREATE TABLE licencier(
        numero_personne Varchar (100) NOT NULL ,
        id_club         Int NOT NULL ,
        PRIMARY KEY (numero_personne ,id_club )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: peut concerner
#------------------------------------------------------------

CREATE TABLE peut_concerner(
        code_messagerie Varchar (100) NOT NULL ,
        id_actualite    Int NOT NULL ,
        PRIMARY KEY (code_messagerie ,id_actualite )
)ENGINE=InnoDB;

ALTER TABLE Activite ADD CONSTRAINT FK_Activite_numero_personne FOREIGN KEY (numero_personne) REFERENCES personnes(numero_personne);
ALTER TABLE Horaire ADD CONSTRAINT FK_Horaire_Date_journee FOREIGN KEY (Date_journee) REFERENCES Journee(Date_journee);
ALTER TABLE Horaire ADD CONSTRAINT FK_Horaire_ref_salle FOREIGN KEY (ref_salle) REFERENCES Salle(ref_salle);
ALTER TABLE Horaire ADD CONSTRAINT FK_Horaire_ref_activite FOREIGN KEY (ref_activite) REFERENCES Activite(ref_activite);
ALTER TABLE reserve ADD CONSTRAINT FK_reserve_ref_salle FOREIGN KEY (ref_salle) REFERENCES Salle(ref_salle);
ALTER TABLE reserve ADD CONSTRAINT FK_reserve_ref_activite FOREIGN KEY (ref_activite) REFERENCES Activite(ref_activite);
ALTER TABLE reserve ADD CONSTRAINT FK_reserve_id FOREIGN KEY (id) REFERENCES Horaire(id);
ALTER TABLE reserve ADD CONSTRAINT FK_reserve_Date_journee FOREIGN KEY (Date_journee) REFERENCES Journee(Date_journee);
ALTER TABLE Journee ADD CONSTRAINT FK_Journee_id_planning FOREIGN KEY (id_planning) REFERENCES planning(id_planning);
ALTER TABLE personnes ADD CONSTRAINT FK_personnes_ref_niveau FOREIGN KEY (ref_niveau) REFERENCES niveau(ref_niveau);
ALTER TABLE appartenir ADD CONSTRAINT FK_appartenir_numero_personne FOREIGN KEY (numero_personne) REFERENCES personnes(numero_personne);
ALTER TABLE appartenir ADD CONSTRAINT FK_appartenir_ref_campus FOREIGN KEY (ref_campus) REFERENCES campus(ref_campus);
ALTER TABLE appartenir ADD CONSTRAINT FK_appartenir_code_statue FOREIGN KEY (code_statue) REFERENCES statue(code_statue);
ALTER TABLE niveau ADD CONSTRAINT FK_niveau_ref_campus FOREIGN KEY (ref_campus) REFERENCES campus(ref_campus);
ALTER TABLE pratiquer ADD CONSTRAINT FK_pratiquer_numero_personne FOREIGN KEY (numero_personne) REFERENCES personnes(numero_personne);
ALTER TABLE pratiquer ADD CONSTRAINT FK_pratiquer_ref_activite FOREIGN KEY (ref_activite) REFERENCES Activite(ref_activite);
ALTER TABLE pratiquer ADD CONSTRAINT FK_pratiquer_id FOREIGN KEY (id) REFERENCES Horaire(id);
ALTER TABLE pratiquer ADD CONSTRAINT FK_pratiquer_Date_journee FOREIGN KEY (Date_journee) REFERENCES Journee(Date_journee);
ALTER TABLE s_inscrire ADD CONSTRAINT FK_s_inscrire_numero_personne FOREIGN KEY (numero_personne) REFERENCES personnes(numero_personne);
ALTER TABLE s_inscrire ADD CONSTRAINT FK_s_inscrire_ref_activite FOREIGN KEY (ref_activite) REFERENCES Activite(ref_activite);
ALTER TABLE concerner ADD CONSTRAINT FK_concerner_ref_activite FOREIGN KEY (ref_activite) REFERENCES Activite(ref_activite);
ALTER TABLE concerner ADD CONSTRAINT FK_concerner_id_actualite FOREIGN KEY (id_actualite) REFERENCES actualite(id_actualite);
ALTER TABLE adresser ADD CONSTRAINT FK_adresser_numero_personne FOREIGN KEY (numero_personne) REFERENCES personnes(numero_personne);
ALTER TABLE adresser ADD CONSTRAINT FK_adresser_code_messagerie FOREIGN KEY (code_messagerie) REFERENCES Mesagerie(code_messagerie);
ALTER TABLE licencier ADD CONSTRAINT FK_licencier_numero_personne FOREIGN KEY (numero_personne) REFERENCES personnes(numero_personne);
ALTER TABLE licencier ADD CONSTRAINT FK_licencier_id_club FOREIGN KEY (id_club) REFERENCES Club(id_club);
ALTER TABLE peut_concerner ADD CONSTRAINT FK_peut_concerner_code_messagerie FOREIGN KEY (code_messagerie) REFERENCES Mesagerie(code_messagerie);
ALTER TABLE peut_concerner ADD CONSTRAINT FK_peut_concerner_id_actualite FOREIGN KEY (id_actualite) REFERENCES actualite(id_actualite);



INSERT INTO statue (code_statue,libelle_statue) VALUES (0,'etudiant');
INSERT INTO statue (code_statue,libelle_statue) VALUES (1,'prof_sport');
INSERT INTO statue (code_statue,libelle_statue) VALUES (2,'directeur_sport');
INSERT INTO campus (ref_campus, nom) VALUES ('fst', 'faculte des sciences et de technologies');
INSERT INTO campus (ref_campus, nom) VALUES ('ensisa', 'ecole');
INSERT INTO campus (ref_campus, nom) VALUES ('IUT', '');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('L1info', '50', 'fst');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('L2info', '50', 'fst');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('L3info', '50', 'fst');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('M1info', '50', 'fst');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('M2info', '50', 'fst');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('A1', '25', 'ensisa');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('A2', '25', 'ensisa');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('A3', '25', 'ensisa');
INSERT INTO niveau (ref_niveau, nombre_heure_sport, ref_campus) VALUES ('B1', '50', 'IUT');
INSERT INTO personnes (numero_personne, nom, prenom, date_de_naissance, photo, tel, email_perso, ref_niveau) VALUES ('21303586', 'younes', 'amani', '29/10/1990', NULL, '0641102810', 'amani.younes2@gmail.com', 'M1info');
INSERT INTO personnes (numero_personne, nom, prenom, date_de_naissance, photo, tel, email_perso, ref_niveau) VALUES ('21303587', 'demuth', 'Xavier', '29/10/1990', NULL, '0641102810', 'amani.younes2@gmail.com', Null);
INSERT INTO personnes (numero_personne, nom, prenom, date_de_naissance, photo, tel, email_perso, ref_niveau) VALUES ('21303588', 'matinya', 'raphael', '29/10/1990', NULL, '0641102810', 'amani.younes2@gmail.com', Null);
INSERT INTO appartenir (email_uha, pass_uha, frais_sport, photo_identite, photo_certificat, numero_personne,ref_campus,code_statue) VALUES ('amani.younes@uha.fr', '50ba9916ab3b54f93012e6a2acb48230', '1','../../img/uploads/photo.jpg', NULL, '21303586', 'fst', '0');
INSERT INTO appartenir (email_uha, pass_uha, frais_sport, photo_identite, photo_certificat, numero_personne,ref_campus,code_statue) VALUES ('xavier.demuth@uha.fr', '50ba9916ab3b54f93012e6a2acb48230', '1','../../img/uploads/photo.jpg', NULL, '21303587', NULL, '2');
INSERT INTO appartenir (email_uha, pass_uha, frais_sport, photo_identite, photo_certificat, numero_personne,ref_campus,code_statue) VALUES ('raphael.matinya@uha.fr', '50ba9916ab3b54f93012e6a2acb48230', '1','../../img/uploads/photo.jpg', NULL, '21303588', NULL, '1');