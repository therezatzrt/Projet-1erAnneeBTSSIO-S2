<?php

      /*  $stmt = $db->prepare($query);
        $stmt->bindValue(':id_etudiant',$_GET['id'],PDO::PARAM_INT); //avec le $_GET['id'] on récupère la valeur de l'id de l'entreprise inscrite dans l'URL
        $stmt->bindValue(':id_moyen', $_POST['id_moyen'], PDO::PARAM_INT);
        $stmt->bindValue(':date_dem', $_POST['date_dem'], PDO::PARAM_STR);
        $stmt->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);

        try {    
              $stmt->execute();
        } 
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }

*/
    $id = $_GET['id_etudiant'];
    if (isset($_POST['stage'])) {
    if (!empty($_POST['date_fin']) && !empty($_POST['date_debut']) && !empty($_POST['etat']) && !empty($_POST['date_validation']) && !empty($_POST['cause']) ) {
        

           /* $query = "INSERT INTO STAGE (DATE_FIN, DATE_DEBUT, ETAT, DATE_VALIDATION, CAUSE) VALUES (:date_fin, :date_debut,:etat,:date_validation,:comment);";*/

           $stmt = $db->prepare(
            "SELECT NOM_ETUDIANT, PRENOM_ETUDIANT,ID_SPECIALITE, EMAIL FROM etudiant, stage WHERE STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND ID_ETUDIANT =:id"
        ); 
    
            $stmt = $db->prepare($query);
//binValue permet d'associer par valeur les emplacements anonymes ou nommés de la requête aux valeurs ou variables passées en paramètres.
// Elle retourne TRUE en cas de succès et FALSE en cas d'erreur.

            $stmt->bindValue(':date_fin', $_POST['date_fin'], PDO::PARAM_DATE); 
            $stmt->bindValue(':date_debut', $_POST['date_debut'], PDO::PARAM_DATE);
            $stmt->bindValue(':etat', $_POST['etat'], PDO::PARAM_CHAR);
            $stmt->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);

            filter_var($date_fin, FILTER_VALIDATE_FLOAT, ["option"] => ["default" => 100]);

        try {    
              $stmt->execute();
        } 
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }
    }
}
?>