<?php
/** Fait par Océane
 * 
 * NR le 07/05/2021
 * ce fichier permet de supprimer le stage dans la table pour lui donner le statut "annul"
 **/ 

 /* Requête pour pouvoir récupérer automatiquement les données sur l'étudiant */
 /* 
 $stmt = $db->prepare(
        "SELECT ETAT,ID_STAGE,DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
        PRENOM_ETUDIANT,NOM_ENTREPRISE,
        VILLE_ENTREPRISE
        FROM stage,entreprise,etudiant,salarie,specialite 
        WHERE SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
        SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
       STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
       ETUDIANT.ID_SPECIALITE=SPECIALITE.ID_SPECIALITE   
       ORDER BY NOM_ETUDIANT DESC"
    ); 
 */



 /* Requête pour pouvoir mettre rentrer un commentaire 
 $id = $_GET['id'];
 $cause = $_POST['comment'];  



A modifier pour être adapter au formulaire de la page annuler stage affichage.php
if (!empty($_POST['date_fin']) && !empty($_POST['date_debut'])){
  
      
     
    $stmt = $db->prepare("INSERT INTO stage (cause) VALUES (:cause) WHERE ID_ETUDIANT=:id_etudiant ;");
    $stmt->bindValue(':id_etudiant', $_GET['id'], PDO::PARAM_INT);// déjà bon
    $stmt->bindValue(':cause', $cause, PDO::PARAM_VARCHAR);

//binValue permet d'associer par valeur les emplacements anonymes ou nommés de la requête aux valeurs ou variables passées en paramètres.
// Elle retourne TRUE en cas de succès et FALSE en cas d'erreur. 

     try {    
           $stmt->execute();
     } 
     catch    (Exception $e){
         $message =$e;
         $success = false;
         $message ="pas d'ajout.";
     }   
 }



 $stmt = $db->prepare("UPDATE stage (etat) SET 'AN';");
 $stmt->execute();
 try {    
    $stmt->execute();
} 
catch    (Exception $e){
  $message =$e;
  $success = false;
  $message ="pas d'ajout.";
}
*/

/*A modifier pour être adapter au formulaire de la page annuler stage affichage.php*/
if (isset($_POST['annuler_stage'])) {
if (!empty($_POST['comment'])){

 filter_var(FILTER_VALIDATE_FLOAT, ["option" => ["default" => 100]]);


 $stmt = $db->prepare("UPDATE stage SET etat='AN',cause=:comment WHERE ID_ETUDIANT=:id_etudiant;");
 $stmt->bindValue(':id_etudiant', $_GET['id'], PDO::PARAM_INT);
 $stmt->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);
 //binValue permet d'associer par valeur les emplacements anonymes ou nommés de la requête aux valeurs ou variables passées en paramètres.

 $stmt->execute();
 try {    
    $stmt->execute();
    header("refresh:0; tdb_professeur.php");
} 
catch    (Exception $e){
  $message =$e;
  $success = false;
  $message ="pas d'ajout.";
}
}
}







?> 