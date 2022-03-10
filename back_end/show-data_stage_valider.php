<?php 
/**
 * * NR le 23/12/2021
 * Fait par Anthony
 *Recherche des stages validés dans la même spécialité  
 *que celle du professeur connecté s'il est professeur de spécialité
 **/ 

// Conservation de l'identifiant  pour  les traitements sur le professeur
$id_courant=$_SESSION['id'];
$stmt = $db->prepare(
    "SELECT ID_STAGE,DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
            PRENOM_ETUDIANT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE 
      FROM stage,entreprise,etudiant,salarie,specialite 
      WHERE SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
            SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
           STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
           ETUDIANT.ID_SPECIALITE=SPECIALITE.ID_SPECIALITE AND 
           SPECIALITE.ID_PROF=:id    AND ETAT ='OK' 
           ORDER BY NOM_ETUDIANT DESC;"
);
$stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$stageValider = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageValider = count($stageValider);
?>