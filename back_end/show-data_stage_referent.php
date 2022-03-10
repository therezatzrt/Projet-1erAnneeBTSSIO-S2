<!-- 
 Fait par Alan 
 les 2 requètes servent à afficher la liste de tout les élève réferent d'un professeur (stageReferentlist)
 et à afficher ceux d'entre eux qui ont un stage (stageReferentoui)
 -->
<?php 
// Conservation de l'identifiant  pour  les traitements sur le professeur
$id_courant=$_SESSION['id'];

$stmt = $db->prepare(
      "SELECT DISTINCT etudiant.ID_ETUDIANT,NOM_ETUDIANT,PRENOM_ETUDIANT,DATE_FIN,DATE_DEBUT
      FROM etudiant, stage,professeur
            WHERE PROFESSEUR.ID_PROF=:id 
            AND etudiant.ID_PROF = professeur.ID_PROF
            AND etudiant.ID_ETUDIANT  NOT IN 
            (
                  SELECT stage.ID_ETUDIANT
                  FROM stage,etudiant
                  WHERE etudiant.ID_ETUDIANT = stage.ID_ETUDIANT
                  AND ETAT = 'OK'
            ) 
            ORDER BY NOM_ETUDIANT DESC;
            
            ");
  $stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
  $stmt->execute(); 
  $stageReferentlist = $stmt->fetchAll(PDO::FETCH_BOTH);

  $stmt = $db->prepare(
      "SELECT stage.ID_ETUDIANT,NOM_ETUDIANT,PRENOM_ETUDIANT,DATE_FIN,DATE_DEBUT
      FROM etudiant,professeur
      INNER JOIN stage
      WHERE etudiant.ID_ETUDIANT = stage.ID_ETUDIANT
      AND professeur.ID_PROF =:id
      AND professeur.ID_PROF = etudiant.ID_PROF
      ORDER BY NOM_ETUDIANT DESC;
      ");
  $stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
  $stmt->execute(); 
  $AucunStageReferent = $stmt->fetchAll(PDO::FETCH_BOTH);