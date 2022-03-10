<?php 
// Conservation de l'identifiant  pour  les traitements sur le professeur
$id_courant=$_SESSION['id'];

$stmt = $db->prepare(
      "SELECT DISTINCT etudiant.ID_ETUDIANT,NOM_ETUDIANT,PRENOM_ETUDIANT,DATE_FIN,DATE_DEBUT
      FROM etudiant, stage,professeur
            WHERE PROFESSEUR.ID_PROF=:id 
            AND etudiant.ID_PROF = professeur.ID_PROF
            AND etudiant.ID_ETUDIANT= stage.ID_ETUDIANT
            AND ETAT='OK'
            ORDER BY etudiant.ID_ETUDIANT ASC;
            
            ");
  $stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
  $stmt->execute(); 
  $stageReferentlist = $stmt->fetchAll(PDO::FETCH_BOTH);