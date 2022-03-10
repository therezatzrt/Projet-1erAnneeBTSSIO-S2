<?php 
/*
Fait par la PROF
NR le 24/12/2020
ce fichier permet de modifer de rechercher une entreprise 
connaissant son identifiant passé dans le GET
 
$id= $_GET['id'];
$id_etudiant=$_SESSION['id']; 
$stmt = $db->prepare(
    "SELECT  NOM_ENTREPRISE,ADRESSE_ENTREPRISE, CP_ENTREPRISE,
       VILLE_ENTREPRISE,TEL_ENTREPRISE,EMAIL_ENTREPRISE,REFUS_ANNEE_SIO1,REFUS_ANNEE_SIO2  
       FROM entreprise  
       WHERE ENTREPRISE.ID_ENTREPRISE=:id;"
);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$entreprise = $stmt->fetch(PDO::FETCH_BOTH);

// recherche des  salariés contact pour cette entreprise
// à présenter dans un menu déroulant
$stmt = $db->prepare(
    "SELECT  ID_SALARIE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE  
      FROM salarie INNER JOIN entreprise 
          ON SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE 
      WHERE ENTREPRISE.ID_ENTREPRISE=:id;"
);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$contacts = $stmt->fetchAll(PDO::FETCH_BOTH);

// recherche des  moyens de communication
// à présenter dans un menu déroulant
$stmt = $db->prepare("SELECT  ID_MOYEN,LIBELLE_MOYEN  FROM moyencom;");
$stmt->execute(); 
$moyens = $stmt->fetchAll(PDO::FETCH_BOTH);

// recherche de la classe de l'étudiant 
// pour vérifier quelle classe appartient l'élève avec le compte connecté

$stmt = $db->prepare(" SELECT ID_CLASSE FROM etudiant WHERE ID_ETUDIANT = :id_etudiant;");
$stmt ->bindValue(':id_etudiant',$id_etudiant,PDO::PARAM_INT);
$stmt ->execute();
$classe = $stmt->fetch(PDO::FETCH_BOTH); */


/**
 * Fait par la PROF
 * * NR le 24/12/2020
 *   ce fichier permet de modifer de rechercher une entreprise 
 *     àconnaissant son identifiant passé dans le GET
 **/ 
$id= $_GET['id'];
$id_etudiant=$_SESSION['id']; 
$stmt = $db->prepare(
    "SELECT  NOM_ENTREPRISE,ADRESSE_ENTREPRISE, CP_ENTREPRISE,
       VILLE_ENTREPRISE,TEL_ENTREPRISE,EMAIL_ENTREPRISE,REFUS_ANNEE_SIO1,REFUS_ANNEE_SIO2  
       FROM entreprise  
       WHERE ENTREPRISE.ID_ENTREPRISE=:id;"
);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$entreprise = $stmt->fetch(PDO::FETCH_BOTH);

// recherche des  salariés contact pour cette entreprise
// à présenter dans un menu déroulant
$stmt = $db->prepare(
    "SELECT  ID_SALARIE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE  
      FROM salarie INNER JOIN entreprise 
          ON SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE 
      WHERE ENTREPRISE.ID_ENTREPRISE=:id;"
);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$contacts = $stmt->fetchAll(PDO::FETCH_BOTH);

// recherche des  moyens de communication
// à présenter dans un menu déroulant
$stmt = $db->prepare("SELECT  ID_MOYEN,LIBELLE_MOYEN  FROM moyencom;");
$stmt->execute(); 
$moyens = $stmt->fetchAll(PDO::FETCH_BOTH);

// recherche de la classe de l'étudiant 
// pour vérifier quelle classe appartient l'élève avec le compte connecté

$stmt = $db->prepare(" SELECT ID_CLASSE FROM etudiant WHERE ID_ETUDIANT = :id_etudiant;");
$stmt ->bindValue(':id_etudiant',$id_etudiant,PDO::PARAM_INT);
$stmt ->execute();
$classe = $stmt->fetch(PDO::FETCH_BOTH);

//Requête permettant d'afficher les stages d'un étudiant choisi
$stmt = $db->prepare(
    "SELECT ETUDIANT.ID_ETUDIANT,ID_STAGE, NOM_ENTREPRISE,VILLE_ENTREPRISE,LIBELLE_SPECIALITE,ADRESSE_ENTREPRISE,CP_ENTREPRISE,TEL_ENTREPRISE,EMAIL_ENTREPRISE,NOM_ETUDIANT,PRENOM_ETUDIANT,EMAIL
      FROM stage,entreprise,etudiant,salarie,specialite 
      WHERE (SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
            SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
            STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
            ETUDIANT.ID_SPECIALITE=SPECIALITE.ID_SPECIALITE) AND
            ETUDIANT.ID_ETUDIANT=:id;
           ;"
  );
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$etudiant = $stmt->fetchAll(PDO::FETCH_BOTH);

?>