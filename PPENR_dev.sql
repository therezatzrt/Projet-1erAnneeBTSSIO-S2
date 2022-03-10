# -----------------------------------------------------------------------------
#       DATABASE de l''aplication
# -----------------------------------------------------------------------------

DROP DATABASE IF EXISTS PPENR;

CREATE DATABASE IF NOT EXISTS PPENR;
USE PPENR;
# -----------------------------------------------------------------------------
#       *TABLE : MOYENCOM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MOYENCOM
 (
   ID_MOYEN SMALLINT AUTO_INCREMENT ,
   LIBELLE_MOYEN CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_MOYEN) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;



# -----------------------------------------------------------------------------
#      * TABLE : SPECIALITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SPECIALITE
 ( ID_SPECIALITE SMALLINT AUTO_INCREMENT  ,
   ID_PROF SMALLINT NOT NULL  ,
   LIBELLE_SPECIALITE CHAR(4) NOT NULL  
   , PRIMARY KEY (ID_SPECIALITE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#      * TABLE : ETUDIANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETUDIANT
 (
   ID_ETUDIANT SMALLINT  AUTO_INCREMENT ,
   ID_PROF SMALLINT NOT NULL  ,
   ID_CLASSE INTEGER NOT NULL  ,
   ID_SPECIALITE SMALLINT NOT NULL  ,
   NOM_ETUDIANT CHAR(32) NOT NULL  ,
   PRENOM_ETUDIANT CHAR(32) NOT NULL  ,
   ADR_ETUDIANT CHAR(32) NOT NULL  ,
   CP_ETUDIANT CHAR(5) NOT NULL  ,
   VILLE_ETUDIANT CHAR(32) NOT NULL  ,
   EMAIL CHAR(32) NOT NULL  ,
   TEL_ETUDIANT CHAR(10) NOT NULL ,
   MDP VARCHAR(100) NOT NULL
   , PRIMARY KEY (ID_ETUDIANT) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
 

# -----------------------------------------------------------------------------
#       TABLE : STAGE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STAGE
 (
   ID_STAGE SMALLINT  AUTO_INCREMENT ,
   ID_ETUDIANT SMALLINT NOT NULL  ,
   ID_SALARIE SMALLINT NOT NULL  ,
   DATE_FIN DATE NOT NULL  ,
   DATE_DEBUT DATE NOT NULL  ,
   ETAT CHAR(2) NOT NULL   ,
   DATE_VALIDATION DATE, 
   PRIMARY KEY (ID_STAGE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#       *TABLE : PROFESSEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROFESSEUR
 (
   ID_PROF SMALLINT AUTO_INCREMENT ,
   NOM_PROF CHAR(32) NOT NULL  ,
   PRENOM_PROF CHAR(32) NOT NULL  ,
   EMAIL CHAR(32) NOT NULL  ,
   TEL_PROF CHAR(10) NOT NULL  ,
   MDP VARCHAR(100) NOT NULL
   , PRIMARY KEY (ID_PROF) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#      * TABLE : DEMARCHE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DEMARCHE
 (
   ID_DEMARCHE SMALLINT AUTO_INCREMENT ,
   ID_ETUDIANT SMALLINT NOT NULL  ,
   ID_MOYEN SMALLINT NOT NULL  ,
   ID_SALARIE SMALLINT NOT NULL  ,
   DATE_DEMARCHE DATE NOT NULL  ,
   COMMENTAIRE CHAR(255) NOT NULL  
   , PRIMARY KEY (ID_DEMARCHE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#      * TABLE : ENTREPRISE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENTREPRISE
 (
   ID_ENTREPRISE SMALLINT AUTO_INCREMENT ,
   NOM_ENTREPRISE CHAR(32) NOT NULL  ,
   ADRESSE_ENTREPRISE CHAR(255) NOT NULL  ,
   CP_ENTREPRISE CHAR(5) NOT NULL  ,
   VILLE_ENTREPRISE CHAR(32) NOT NULL  ,
   TEL_ENTREPRISE CHAR(10) NOT NULL  ,
   EMAIL_ENTREPRISE CHAR(32) NOT NULL  ,
   REFUS_ANNEE_SIO1 BOOLEAN NOT NULL DEFAULT FALSE  ,
   REFUS_ANNEE_SIO2 BOOLEAN NOT NULL DEFAULT FALSE 
   , PRIMARY KEY (ID_ENTREPRISE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


# -----------------------------------------------------------------------------
#      * TABLE : SALARIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SALARIE
 (
   ID_SALARIE SMALLINT  AUTO_INCREMENT ,
   ID_ENTREPRISE SMALLINT NOT NULL  ,
   NOM_SALARIE CHAR(32) NOT NULL  ,
   PRENOM_SALARIE CHAR(32) NOT NULL  ,
   TEL_SALARIE CHAR(10) NOT NULL  ,
   EMAIL_SALARIE CHAR(32) NOT NULL  
   , PRIMARY KEY (ID_SALARIE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

# -----------------------------------------------------------------------------
#      * TABLE : CLASSE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLASSE
 (
   ID_CLASSE INTEGER AUTO_INCREMENT ,
   ID_PROF SMALLINT NOT NULL  ,
   LIBELLE_CLASSE CHAR(4) NOT NULL  
   , PRIMARY KEY (ID_CLASSE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0  DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


# -----------------------------------------------------------------------------
#    *   TABLE : ETRE_CONTACTER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETRE_CONTACTER
 (
   ID_DEMARCHE SMALLINT NOT NULL  ,
   ID_SALARIE SMALLINT NOT NULL  
   , PRIMARY KEY (ID_DEMARCHE,ID_SALARIE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
 

# -----------------------------------------------------------------------------
#      * TABLE : ENSEIGNER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ENSEIGNER
 (
   ID_CLASSE INTEGER NOT NULL  ,
   ID_PROF SMALLINT NOT NULL,
   MATIERE VARCHAR(10) NOT NULL,
   NB_HEURES   SMALLINT NOT NULL
   , PRIMARY KEY (ID_CLASSE,ID_PROF) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
 

# -----------------------------------------------------------------------------
#     *  TABLE : VISITER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VISITER
 (
   ID_PROF SMALLINT NOT NULL  ,
   ID_STAGE SMALLINT NOT NULL ,
   DATE_VISITE DATE NOT NULL,
   COMMENTAIRES VARCHAR(50),
   HEURE_PREVUE TIME NOT NULL 
   , PRIMARY KEY (ID_PROF,ID_STAGE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;


# -----------------------------------------------------------------------------
#      * TABLE : SOUHAITER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SOUHAITER
 (
   ID_PROF SMALLINT NOT NULL  ,
   ID_STAGE SMALLINT NOT NULL  ,
   PRIORITE SMALLINT NOT NULL  
   , PRIMARY KEY (ID_PROF,ID_STAGE) 
 )ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE SPECIALITE
  ADD FOREIGN KEY FK_SPECIALIT�_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_CLASSE (ID_CLASSE)
      REFERENCES CLASSE (ID_CLASSE) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_SPECIALIT� (ID_SPECIALITE)
      REFERENCES SPECIALIT� (ID_SPECIALITE) ;


ALTER TABLE STAGE 
  ADD FOREIGN KEY FK_STAGE_ETUDIANT (ID_ETUDIANT)
      REFERENCES ETUDIANT (ID_ETUDIANT) ;

ALTER TABLE STAGE 
  ADD CAUSE VARCHAR(250);

ALTER TABLE STAGE 
  ADD FOREIGN KEY FK_STAGE_SALARIE (ID_SALARIE)
      REFERENCES SALARIE (ID_SALARIE) ;


ALTER TABLE DEMARCHE 
  ADD FOREIGN KEY FK_DEMARCHE_ETUDIANT (ID_ETUDIANT)
      REFERENCES ETUDIANT (ID_ETUDIANT) ;


ALTER TABLE DEMARCHE 
  ADD FOREIGN KEY FK_DEMARCHE_MOYENCOM (ID_MOYEN)
      REFERENCES MOYENCOM (ID_MOYEN) ;



ALTER TABLE DEMARCHE 
  ADD FOREIGN KEY FK_DEMARCHE_ENTREPRISE (ID_SALARIE)
      REFERENCES SALARIE (ID_SALARIE) ;


ALTER TABLE SALARIE 
  ADD FOREIGN KEY FK_SALARIE_ENTREPRISE (ID_ENTREPRISE)
      REFERENCES ENTREPRISE (ID_ENTREPRISE) ;


ALTER TABLE CLASSE 
  ADD FOREIGN KEY FK_CLASSE_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE ETRE_CONTACTER 
  ADD FOREIGN KEY FK_ETRE_CONTACTER_DEMARCHE (ID_DEMARCHE)
      REFERENCES DEMARCHE (ID_DEMARCHE) ;


ALTER TABLE ETRE_CONTACTER 
  ADD FOREIGN KEY FK_ETRE_CONTACTER_SALARIE (ID_SALARIE)
      REFERENCES SALARIE (ID_SALARIE) ;


ALTER TABLE ENSEIGNER 
  ADD FOREIGN KEY FK_ENSEIGNER_CLASSE (ID_CLASSE)
      REFERENCES CLASSE (ID_CLASSE) ;


ALTER TABLE ENSEIGNER 
  ADD FOREIGN KEY FK_ENSEIGNER_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE VISITER 
  ADD FOREIGN KEY FK_VISITER_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE VISITER 
  ADD FOREIGN KEY FK_VISITER_STAGE (ID_STAGE)
      REFERENCES STAGE (ID_STAGE) ;


ALTER TABLE SOUHAITER 
  ADD FOREIGN KEY FK_SOUHAITER_PROFESSEUR (ID_PROF)
      REFERENCES PROFESSEUR (ID_PROF) ;


ALTER TABLE SOUHAITER 
  ADD FOREIGN KEY FK_SOUHAITER_STAGE (ID_STAGE)
      REFERENCES STAGE (ID_STAGE) ;

INSERT INTO MOYENCOM (LIBELLE_MOYEN) VALUES ('telephone'), ('démarchage'),('couriel'), ('entretien');

INSERT INTO SPECIALITE (ID_PROF, LIBELLE_SPECIALITE) VALUES (1,'SLAM'), (2,'SISR');

INSERT INTO PROFESSEUR(NOM_PROF,PRENOM_PROF,EMAIL,TEL_PROF,MDP) 
   VALUES ('RISSER','NAT','NRISSER@GMAIL.COM', '0606060606','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			('DUBOIS','NAT','NDUBOIS@GMAIL.COM', '1616161616','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			('PEILLON','HER','HPEILLON@GMAIL.COM', '2626262626','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			('LHOSTIS','ISA','ILHOSTIS@GMAIL.COM', '3636363636','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			('RICHARD','RIC','RRICHARD@GMAIL.COM', '4646464646','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6');

INSERT INTO ENSEIGNER(ID_CLASSE,ID_PROF,MATIERE,NB_HEURES) 	VALUES (1,1,'DEV',16),(1,2,'RES', 16),(1,3,'FRANCCEE',3),(1,4,'FCasseTEte',4),(2,5,'JEUXVIDES',16);

/*Ajout d'entreprise pour effectuer des test avec plusieurs département différent pour la tache d'affichage celon les départements*/

INSERT INTO ENTREPRISE (NOM_ENTREPRISE,ADRESSE_ENTREPRISE,CP_ENTREPRISE,VILLE_ENTREPRISE,TEL_ENTREPRISE,EMAIL_ENTREPRISE,REFUS_ANNEE_SIO1,REFUS_ANNEE_SIO2) 
	VALUES 

      ('KIANO','RUE BACH','22300','LANNION', '0101010101','KIANO@GMAIL.COM',0,0),
			('GERANO','RUE MOZRAT','22300','LANNION', '0202020202','GERANO@GMAIL.COM',0,1),
			('MINCESIE','RUE BETOVEN','22300','LANNION', '0303030303','MINCESIE@GMAIL.COM',0,0),
			('ABIKI','RUE DVORAK','22100','DINAN', '0404040404','ABIKI@GMAIL.COM',0,0),
			('VONOLE','RUE BARTOK','22720','TREGASTEL', '0505050505','VONOLE@GMAIL.COM',0,0),
			('SUSA','RUE LICORNE','22300','LANNION', '0606060606','SUSA@GMAIL.COM',1,0),
			('BREIZHTICOT','RUE LICORNE','22300','LANNION', '0707070707','BREIZHTICOT@GMAIL.COM',1,0),
			('COMPTEURDUR','RUE LICORNE','22300','LANNION', '0808080808','COMPTEURDUR@GMAIL.COM',0,0),
			('APITICOM','RUE LICORNE','22300','LANNION', '0909090909','APITICOM@GMAIL.COM',0,0),
			('COMCOM','RUE LICORNE','22300','LANNION', '1010101010','COMCOM@GMAIL.COM',1,0), 	
      ('ENTRRENNE','RUE CONCOMBRE','35300','RENNES', '0451456145','ENTRERENNE@GMAIL.COM',0,0),
      ('VILLDU35','RUE CORNICHON','35789','RENNOUILLE', '0123456789','VILLDU35@HOTMAIL.COM',1,0),
      ('RENNAIS','RUE CASTOR','35110','RANNES', '0123443210','RENNAIS@GMAIL.COM',0,1),
      ('CARREFINISTERE','RUE DES OLIVES','29300','BREST', '0141562893','CARREFINISTERE@GMAIL.COM',0,0),
      ('TARTEAU','AVENUE PAYARD','29450','QUIMPER', '0682145363','TARTEAU@GMAIL.COM',1,0),
      ('QUILLE','BOURG BOURGEON','29500','CONCARNEAU', '0987654321','QUILLE@GMAIL.COM',0,0),
      ('XIAOMI','RUE BACHELOR','56300','VANNES', '0458624124','XIAOMI@GMAIL.COM',1,0);
 
 INSERT INTO SALARIE(ID_ENTREPRISE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE) VALUES
			(1,'KIANONO','BACH','0101010111','KIANONO.KIANO@GMAIL.COM'),
			(1,'NOKIANO','BACH','0101011111','NOKIANO.KIANO@GMAIL.COM'),
			(2,'GERANONO','MOZRAT','0202020212','GERANONO.GERANO@GMAIL.COM'),
			(2,'AGERANONO','MOZRAT','0202020222','AGERANONO.GERANO@GMAIL.COM'),
			(2,'BGERANONO','MOZRAT','0202020232','BGERANONO.GERANO@GMAIL.COM'),
			(2,'CGERANONO','MOZRAT','0202020242','CGERANONO.GERANO@GMAIL.COM'),
			(2,'DGERANONO','MOZRAT','0202020252','DGERANONO.GERANO@GMAIL.COM'),
			(2,'EGERANONO','MOZRAT','0202020252','EGERANONO.GERANO@GMAIL.COM'),
			(3,'AMINCESIE','BETOVEN','0303030313','MINCESIE@GMAIL.COM'),
			(3,'BMINCESIE','BETOVEN','0303030323','BMINCESIE@GMAIL.COM'),
			(3,'CMINCESIE','BETOVEN','0303030333','CMINCESIE@GMAIL.COM'),
			(4,'AABIKI','DVORAK','0404040404','AABIKI@GMAIL.COM'),
			(5,'AVONOLE','BARTOK','0505050515','AVONOLE@GMAIL.COM'),
			(5,'BVONOLE','BARTOK','0505050525','BVONOLE@GMAIL.COM'),
			(6,'SUSA','LICORNE','0606060616','ASUSA@GMAIL.COM'),
			(7,'ABREIZHTICOT','LICORNE','0707070717','ABREIZHTICOT@GMAIL.COM'),
			(7,'BBREIZHTICOT','LICORNE','0707070727','BBREIZHTICOT@GMAIL.COM'),
			(8,'ACOMPTEURDUR','LICORNE','0808080808','ACOMPTEURDUR@GMAIL.COM'),
			(8,'BCOMPTEURDUR','LICORNE','0808080818','BCOMPTEURDUR@GMAIL.COM'),
			(8,'CCOMPTEURDUR','LICORNE','0808080828','CCOMPTEURDUR@GMAIL.COM'),
			(8,'DCOMPTEURDUR','LICORNE','0808080838','DCOMPTEURDUR@GMAIL.COM'),
			(9,'AAPITICOM','LICORNE','0909090919','AAPITICOM@GMAIL.COM'),
			(10,'SALARI','LOUCOURNE','0123454321','SALARI@GMAIL.COM'),
      (11,'CASTOR','FLOTEUR','0781723225','BOISFLOTTANT@GMAIL.COM'),
			(12,'ALAIDE','MICHEL','0404010101','ALAIDE@GMAIL.COM'),
			(13,'AVION','LONG','0504510515','AVIONLONG@GMAIL.COM'),
			(15,'BOUNOUVOULE','BARCOQUE','0000050525','BOUNOUVOULE@GMAIL.COM'),
			(14,'SUSANE','LICORNOU','0606060996','SUSANE@GMAIL.COM'),
			(11,'OOOFF','RO','0705714717','BLOX@GMAIL.COM'),
			(12,'CREE','PER','0706945727','AWWMAN@GMAIL.COM'),
			(12,'SO','WE','263080808','BACKINTHEMINE@GMAIL.COM'),
			(11,'GOT','OUR','0808014818','PICKAXE@GMAIL.COM'),
			(13,'SWINGING','FROM','0808080828','SIDETOSIDE@GMAIL.COM'),
			(13,'SIDE','SIDE','0808080838','TOSIDE@GMAIL.COM'),
			(14,'LOOK','UP','0909090919','YOUHEAR@GMAIL.COM'),
      (17,'A','SOUND','1010101010','ANDLOOKUP@GMAIL.COM'),
			(16,'TOTAL','SHOCK','1010101010','FILLYOURBODDY@GMAIL.COM');
      
 
 INSERT INTO  CLASSE (ID_PROF,LIBELLE_CLASSE) VALUES (3,'SIO1'),(5,'SIO2');
 
INSERT INTO ETUDIANT (ID_PROF, ID_CLASSE,ID_SPECIALITE,NOM_ETUDIANT,PRENOM_ETUDIANT,ADR_ETUDIANT,CP_ETUDIANT, VILLE_ETUDIANT,EMAIL, TEL_ETUDIANT,MDP) 
	VALUES (1,1,1,'RENAULT','KYLLIAN','LESREMPARTS','29300', 'MORLES','KRENAULT@GMAIL.COM','1010101010','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(2,1,2,'CORSON','KYLLIAN','LESMACHICOULIS','22300', 'CAMLEZ','KCORSON@GMAIL.COM','1010101011','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(2,1,2,'FIN','YOHAN','PONTLEVIS','22300', 'ROSPEZ','YFIN@GMAIL.COM','1010101012','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(2,1,1,'RUIZ','OLIVIO','ENCIENTE','22300', 'LERHU','ORUIZ@GMAIL.COM','1010101013','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(1,1,1,'RUIZ','ALIVIO','BENCIENTE','22300', 'ALERHU','ARUIZ@GMAIL.COM','1010101014','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(2,1,1,'RUIZ','BLIVIO','BENCIENTE','22300', 'BLERHU','BRUIZ@GMAIL.COM','1010101015','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(2,1,1,'RUIZ','CLIVIO','CENCIENTE','22300', 'CLERHU','CRUIZ@GMAIL.COM','1010101016','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(3,1,1,'RUIZ','DLIVIO','DENCIENTE','22300', 'DLERHU','DRUIZ@GMAIL.COM','1010101017','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(3,1,1,'RUIZ','ELIVIO','EENCIENTE','22300', 'ELERHU','ERUIZ@GMAIL.COM','1010101018','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(3,1,1,'RUIZ','FLIVIO','FENCIENTE','22300', 'FLERHU','FRUIZ@GMAIL.COM','1010101019','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(3,1,2,'FIN','ZYOHAN','ZPONTLEVIS','22300', 'ZROSPEZ','ZFIN@GMAIL.COM','1010101020','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(3,1,2,'FIN','WYOHAN','WPONTLEVIS','22300', 'WROSPEZ','WFIN@GMAIL.COM','1010101021','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(1,1,2,'FIN','VYOHAN','VPONTLEVIS','22300', 'VROSPEZ','VFIN@GMAIL.COM','1010101022','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(1,1,2,'FIN','TYOHAN','TPONTLEVIS','22300', 'TROSPEZ','TFIN@GMAIL.COM','1010101023','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(3,1,2,'FIN','AYOHAN','APONTLEVIS','22300', 'AROSPEZ','AFIN@GMAIL.COM','1010101024','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(4,1,2,'FIN','BYOHAN','BPONTLEVIS','22300', 'BROSPEZ','BFIN@GMAIL.COM','1010101025','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(4,1,2,'FIN','CYOHAN','CPONTLEVIS','22300', 'CROSPEZ','CFIN@GMAIL.COM','1010101026','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(4,1,2,'FIN','DYOHAN','DPONTLEVIS','22300', 'DROSPEZ','DFIN@GMAIL.COM','1010101027','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(4,1,2,'FIN','EYOHAN','EPONTLEVIS','22300', 'EROSPEZ','EFIN@GMAIL.COM','1010101028','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(4,1,2,'FIN','FYOHAN','FPONTLEVIS','22300', 'FROSPEZ','FFIN@GMAIL.COM','1010101029','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(4,1,2,'FIN','GYOHAN','GPONTLEVIS','22300', 'GROSPEZ','GFIN@GMAIL.COM','1010101030','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6'),
			(5,2,2,'HENAFF','MELVIN','GRASSES','22808', 'GRACE','MHENNAFF@GMAIL.COM','1010101300','$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6');

INSERT INTO  DEMARCHE (ID_ETUDIANT,ID_MOYEN,ID_SALARIE,DATE_DEMARCHE,COMMENTAIRE) VALUES
         (1,1,1,'2020-09-21', 'attente_rep'),
		 (1,2,1,'2020-09-28', 'relance'),
		 (1,3,2,'2020-09-30', 'mort'),
		 (1,3,2,'2020-09-30', 'mort'),
		 (1,4,2,'2020-09-21', 'un espoir'),
		 (1,4,12,'2020-09-21', 'en attente'),
		 (2,1,1,'2020-09-21', 'en attente'),
		 (2,2,1,'2020-09-27', 'un espoir'),
		 (2,4,1,'2020-09-30', 'fiche recherche envoyée'),
		 (2,4,5,'2020-09-30', 'un espoir'),
		 (3,3,10,'2020-09-21', 'en attente'),
		 (3,4,4,'2020-09-28', 'en attente'),
		 (22,1,1,'2020-10-10','fiche recherche reçue'),
     (3,4,23,'2020-12-28', 'en attente'),
     (3,4,32,'2020-09-25', 'en attente'),
     (3,4,24,'2020-09-28', 'en attente'),
     (6,4,25,'2021-01-20', 'en attente'),
     (7,4,28,'2021-02-14', 'en attente'),
     (8,4,30,'2020-11-22', 'en attente'),
     (9,4,35,'2020-11-24', 'en attente');
		 
INSERT INTO ETRE_CONTACTER(ID_DEMARCHE,ID_SALARIE)  VALUES 
	(1,1),(2,1),(3,1),(4,3),(5,7),(6,5),(7,2),(8,1),(9,2),(10,5),(11,10),(12,6),(22,1);
		 
INSERT INTO STAGE (ID_ETUDIANT,ID_SALARIE,DATE_FIN ,DATE_DEBUT,ETAT,DATE_VALIDATION ) VALUES
                        (16,2,'2021-05-29','2020-07-01','OK','2021-02-15'),  
                        (15,2,'2021-05-29','2020-07-01','OK','2021-01-08'),
                        (14,25,'2021-05-29','2020-07-01','OK','2021-02-08'),  
                        (13,35,'2021-05-29','2020-07-01','OK','2021-02-08');  
INSERT INTO STAGE (ID_ETUDIANT,ID_SALARIE,DATE_FIN ,DATE_DEBUT,ETAT) VALUES
                  (18,27,'2020-02-29','2020-01-01','AT'),
                  (19,29,'2020-02-29','2020-01-01','AT'),
                  (20,30,'2020-02-29','2020-01-01','AT'),
                  (21,31,'2020-02-29','2020-01-01','AT'),
                  (22,32,'2020-02-29','2020-01-01','RE');
INSERT INTO SOUHAITER (ID_PROF,ID_STAGE,PRIORITE) VALUES(5,1,1); 
INSERT INTO VISITER (ID_PROF,ID_STAGE,DATE_VISITE,COMMENTAIRES,HEURE_PREVUE) VALUES(5,1,'2021-01-31','RAS','10:00:00'); 

# -----------------------------------------------------------------------------
#       Suppression du compte administrateur si déjà présent sur la bdd
# -----------------------------------------------------------------------------

DROP USER IF EXISTS 'administrateur'@'localhost' ;

# -----------------------------------------------------------------------------
#       Suppression du compte inviter si déjà présent sur la bdd
# -----------------------------------------------------------------------------

DROP USER IF EXISTS 'inviter'@'localhost' ;

# -----------------------------------------------------------------------------
#       Suppression des élèves si déjà présent sur la bdd
# -----------------------------------------------------------------------------

DROP USER IF EXISTS 'KRENAULT@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'KCORSON@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'YFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'ORUIZ@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'ARUIZ@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'BRUIZ@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'CRUIZ@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'DRUIZ@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'ERUIZ@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'FRUIZ@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'ZFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'WFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'VFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'TFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'AFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'BFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'CFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'DFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'EFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'FFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'GFIN@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'MHENNAFF@GMAIL.COM'@'localhost' ;

# -----------------------------------------------------------------------------
#       Suppression des professeurs si déjà présent sur la bdd
# -----------------------------------------------------------------------------

DROP USER IF EXISTS 'NRISSER@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'NDUBOIS@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'HPEILLON@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'ILHOSTIS@GMAIL.COM'@'localhost' ;
DROP USER IF EXISTS 'RRICHARD@GMAIL.COM'@'localhost' ;

# -----------------------------------------------------------------------------
#       Création du compte SuperAdmin
# -----------------------------------------------------------------------------

CREATE USER 'administrateur'@'localhost' IDENTIFIED BY 'Rootsio2017';

# -----------------------------------------------------------------------------
#       Création du compte inviter
# -----------------------------------------------------------------------------

CREATE USER 'inviter'@'localhost';

# -----------------------------------------------------------------------------
#       Création des élèves
# -----------------------------------------------------------------------------

CREATE USER 'KRENAULT@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'KCORSON@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'YFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'ORUIZ@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'ARUIZ@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'BRUIZ@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'CRUIZ@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'DRUIZ@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'ERUIZ@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'FRUIZ@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'ZFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'WFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'VFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'TFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'AFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'BFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'CFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'DFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'EFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'FFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'GFIN@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'MHENNAFF@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';

# -----------------------------------------------------------------------------
#       Création des professeurs
# -----------------------------------------------------------------------------

CREATE USER 'NRISSER@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'NDUBOIS@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'HPEILLON@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'ILHOSTIS@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';
CREATE USER 'RRICHARD@GMAIL.COM'@'localhost' IDENTIFIED BY '$2y$08$Ep3VOKSGq7A3vjIaOuCjo.o7Xj2CUPs8JxSfYQ6pLGBZQol49XgQ6';

# -----------------------------------------------------------------------------
#       Attribution des privilège pour le compte SuperAdmin
# -----------------------------------------------------------------------------

 GRANT ALL PRIVILEGES ON  PPENR.* TO 'administrateur'@'localhost';

# -----------------------------------------------------------------------------
#       Attribution des privilège pour le compte inviter
# -----------------------------------------------------------------------------

GRANT SELECT
ON PPENR.ETUDIANT
TO 'inviter'@'localhost';

GRANT SELECT
ON PPENR.PROFESSEUR
TO 'inviter'@'localhost';

# -----------------------------------------------------------------------------
#       Attribution des privilège pour les élèves
# -----------------------------------------------------------------------------
  /*
  Grant create user est nécessaire pour permettre la modification de l'adresse email dans profil.php
  */
GRANT CREATE USER
ON *.*
TO 'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';


GRANT SELECT
ON PPENR.CLASSE
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';
  

GRANT SELECT,INSERT
ON PPENR.DEMARCHE
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';



GRANT SELECT, INSERT,UPDATE
ON PPENR.ENTREPRISE
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';



GRANT SELECT, UPDATE 
ON PPENR.ETUDIANT
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';



GRANT SELECT
ON PPENR.MOYENCOM
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';



GRANT SELECT,INSERT
ON PPENR.SALARIE
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';



GRANT SELECT
ON PPENR.SPECIALITE
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';



GRANT SELECT,INSERT
ON PPENR.STAGE
TO
  'KRENAULT@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'KCORSON@GMAIL.COM'@'localhost',
  'YFIN@GMAIL.COM'@'localhost',
  'ORUIZ@GMAIL.COM'@'localhost',
  'ARUIZ@GMAIL.COM'@'localhost',
  'BRUIZ@GMAIL.COM'@'localhost',
  'CRUIZ@GMAIL.COM'@'localhost',
  'DRUIZ@GMAIL.COM'@'localhost',
  'ERUIZ@GMAIL.COM'@'localhost',
  'FRUIZ@GMAIL.COM'@'localhost',
  'ZFIN@GMAIL.COM'@'localhost',
  'WFIN@GMAIL.COM'@'localhost',
  'VFIN@GMAIL.COM'@'localhost',
  'TFIN@GMAIL.COM'@'localhost',
  'AFIN@GMAIL.COM'@'localhost',
  'BFIN@GMAIL.COM'@'localhost',
  'CFIN@GMAIL.COM'@'localhost',
  'DFIN@GMAIL.COM'@'localhost',
  'EFIN@GMAIL.COM'@'localhost',
  'FFIN@GMAIL.COM'@'localhost',
  'GFIN@GMAIL.COM'@'localhost',
  'MHENNAFF@GMAIL.COM'@'localhost';


# -----------------------------------------------------------------------------
#       Attribution des privilège pour les professeurs
# -----------------------------------------------------------------------------

  /*
  Grant create user est nécessaire pour permettre la modification de l'adresse email dans profil.php
  */
GRANT CREATE USER
ON *.* 
TO 
'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';
GRANT SELECT   
ON PPENR.CLASSE
TO
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT
ON PPENR.DEMARCHE
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT
ON PPENR.ENTREPRISE
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT
ON PPENR.ETUDIANT
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT
ON PPENR.MOYENCOM
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT, UPDATE
ON PPENR.PROFESSEUR
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT
ON PPENR.SALARIE
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT
ON PPENR.SPECIALITE
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

GRANT SELECT, UPDATE
ON PPENR.STAGE
TO 
  'NRISSER@GMAIL.COM'@'localhost',
  'NDUBOIS@GMAIL.COM'@'localhost',
  'HPEILLON@GMAIL.COM'@'localhost', 
  'ILHOSTIS@GMAIL.COM'@'localhost',
  'RRICHARD@GMAIL.COM'@'localhost';

# -----------------------------------------------------------------------------
#       Attribution des privilège pour le compte SuperAdmin
# -----------------------------------------------------------------------------


COMMIT;

