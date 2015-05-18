#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP TABLE IF EXISTS peut_concerner;
DROP TABLE IF EXISTS Mesagerie;
DROP TABLE IF EXISTS licencier,Club;
DROP TABLE IF EXISTS reserve;
DROP TABLE IF EXISTS concerner, actualite;
DROP TABLE IF EXISTS s_inscrire;
DROP TABLE IF EXISTS adresser,messagerie;
DROP TABLE IF EXISTS pratiquer;
DROP TABLE IF EXISTS horaire;
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
        ref_salle   Varchar (25) NOT NULL ,
        nom_salle   Varchar (25) ,
        maintenance Bool ,
        PRIMARY KEY (ref_salle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Activite
#------------------------------------------------------------

CREATE TABLE Activite(
        ref_activite         Varchar (25) NOT NULL ,
        nom_activite         Varchar (25) ,
        description_activite Text ,
        nbre_fixe_heure      Int ,
        capacite_max         Int ,
        etat                 Bool ,
        numero_personne      Varchar (25) ,
        PRIMARY KEY (ref_activite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Horaire
#------------------------------------------------------------

CREATE TABLE Horaire(
        heure_start  Varchar (25) ,
        heure_fin    Varchar (25) ,
        id           int (11) Auto_increment  NOT NULL ,
        Date_journee Varchar (25) NOT NULL ,
        ref_salle    Varchar (25) ,
        ref_activite Varchar (25) ,
        PRIMARY KEY (id ,Date_journee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reserve
#------------------------------------------------------------

CREATE TABLE reserve(
        description  Text ,
        ref_salle    Varchar (25) NOT NULL ,
        ref_activite Varchar (25) NOT NULL ,
        id           Int ,
        Date_journee Varchar (25) ,
        PRIMARY KEY (ref_salle ,ref_activite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Journee
#------------------------------------------------------------

CREATE TABLE Journee(
        Date_journee Varchar (25) NOT NULL ,
        etat_journee Bool ,
        id_planning  Int NOT NULL ,
        PRIMARY KEY (Date_journee ,id_planning )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: planning
#------------------------------------------------------------

CREATE TABLE planning(
        id_planning   int (11) Auto_increment  NOT NULL ,
        nom_planning  Varchar (25) ,
        date_de_debut Varchar (25) ,
        date_de_fin   Varchar (25) ,
        PRIMARY KEY (id_planning )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: campus
#------------------------------------------------------------

CREATE TABLE campus(
        ref_campus Varchar (25) NOT NULL ,
        nom        Varchar (25) ,
        PRIMARY KEY (ref_campus )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: personnes
#------------------------------------------------------------

CREATE TABLE personnes(
        numero_personne   Varchar (25) NOT NULL ,
        nom               Varchar (25) ,
        prenom            Varchar (25) ,
        date_de_naissance Varchar (25) ,
        photo             Varchar (25) ,
        tel               Varchar (25) ,
        email_perso       Varchar (25) ,
        ref_niveau        Varchar (25) ,
        PRIMARY KEY (numero_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: statue
#------------------------------------------------------------

CREATE TABLE statue(
        code_statue    Char (25) NOT NULL ,
        libelle_statue Varchar (25) ,
        PRIMARY KEY (code_statue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appartenir
#------------------------------------------------------------

CREATE TABLE appartenir(
        email_uha       Varchar (25) ,
        pass_uha        Varchar (25) ,
        frais_sport     Bool ,
        numero_personne Varchar (25) NOT NULL ,
        ref_campus      Varchar (25) ,
        code_statue     Char (25) ,
        PRIMARY KEY (numero_personne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: niveau
#------------------------------------------------------------

CREATE TABLE niveau(
        ref_niveau         Varchar (25) NOT NULL ,
        nombre_heure_sport Int ,
        ref_campus         Varchar (25) ,
        PRIMARY KEY (ref_niveau )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: actualite
#------------------------------------------------------------

CREATE TABLE actualite(
        id_actualite    int (11) Auto_increment  NOT NULL ,
        titre           Varchar (25) ,
        description_act Text ,
        PRIMARY KEY (id_actualite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Mesagerie
#------------------------------------------------------------

CREATE TABLE Mesagerie(
        code_messagerie Varchar (25) NOT NULL ,
        raison          Varchar (25) ,
        contenue        Text ,
        PRIMARY KEY (code_messagerie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Club
#------------------------------------------------------------

CREATE TABLE Club(
        id_club         int (11) Auto_increment  NOT NULL ,
        nom_club        Varchar (25) ,
        activite        Varchar (25) ,
        licence_fichier Varchar (25) ,
        PRIMARY KEY (id_club )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pratiquer
#------------------------------------------------------------

CREATE TABLE pratiquer(
        notee_ou_pas    Bool ,
        note            Float ,
        etat            Char (25) ,
        numero_personne Varchar (25) NOT NULL ,
        ref_activite    Varchar (25) NOT NULL ,
        id              Int NOT NULL ,
        Date_journee    Varchar (25) NOT NULL ,
        PRIMARY KEY (numero_personne ,ref_activite ,id ,Date_journee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: s_inscrire
#------------------------------------------------------------

CREATE TABLE s_inscrire(
        etat_inscription Int ,
        notee_ou_pas     Bool ,
        club             Varchar (25) ,
        activite_club    Varchar (25) ,
        numero_personne  Varchar (25) NOT NULL ,
        ref_activite     Varchar (25) NOT NULL ,
        PRIMARY KEY (numero_personne ,ref_activite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: concerner
#------------------------------------------------------------

CREATE TABLE concerner(
        ref_activite Varchar (25) NOT NULL ,
        id_actualite Int NOT NULL ,
        PRIMARY KEY (ref_activite ,id_actualite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: adresser
#------------------------------------------------------------

CREATE TABLE adresser(
        numero_personne Varchar (25) NOT NULL ,
        code_messagerie Varchar (25) NOT NULL ,
        PRIMARY KEY (numero_personne ,code_messagerie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: licencier
#------------------------------------------------------------

CREATE TABLE licencier(
        numero_personne Varchar (25) NOT NULL ,
        id_club         Int NOT NULL ,
        PRIMARY KEY (numero_personne ,id_club )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: peut concerner
#------------------------------------------------------------

CREATE TABLE peut_concerner(
        code_messagerie Varchar (25) NOT NULL ,
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



