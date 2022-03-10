<?php
// Fait par Océane
// Requête pour pouvoir exécuter une démarche

//Exécution de la démarche au niveau de la table DEMARCHE
$id = $_GET['id'];
    if (isset($_POST['creer_demarche'])) {
    if (!empty($_POST['id_moyen']) && !empty($_POST['date_dem']) && !empty($_POST['comment'])&& !empty($_POST['id_contact'])) {
        

            $query = "INSERT INTO DEMARCHE (ID_SALARIE, ID_ETUDIANT,ID_MOYEN,DATE_DEMARCHE,COMMENTAIRE) VALUES (:id_contact,:id_etudiant,:id_moyen,:date_dem,:comment);";
    
            $stmt = $db->prepare($query);
//binValue permet d'associer par valeur les emplacements anonymes ou nommés de la requête aux valeurs ou variables passées en paramètres.
// Elle retourne TRUE en cas de succès et FALSE en cas d'erreur.

            $stmt->bindValue(':id_contact', $_POST['id_contact'], PDO::PARAM_INT); 
            $stmt->bindValue(':id_etudiant', $_SESSION['id'], PDO::PARAM_INT);
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

         
    
      
        $query = "UPDATE entreprise
         SET REFUS_ANNEE_SIO1 =:refus 
         WHERE ID_ENTREPRISE = :id_entreprise ";

        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_entreprise',$_GET['id'],PDO::PARAM_INT); //avec le $_GET['id'] on récupère la valeur de l'id de l'entreprise inscrite dans l'URL
        $stmt->bindValue(':refus', $_POST['Status_Demarche'], PDO::PARAM_INT);

    try {    
          $stmt->execute();

          header("refresh:0; tdb_etudiant.php");
        } 

    catch    (Exception $e){
        $message =$e;
        $success = false;
        $message ="pas d'ajout.";
    }
    if($_POST['demarche_entreprise']=="1"){
        header("refresh:0; transformation_stage_form.php?id=".$id); // affichage de la page transformation démarche avec l'ID
        //Requête pour récuperer l'id de la démarche qui viens d'être créer si la demarche est validé par l'entreprise pour être pris en compte comme un stage
 /*  
        A supprimer si jamais aucune utilisation
        
        $stmt = $db->prepare("
        SELECT LAST_INSERT_ID()as ID_DERNIERE_DEMARCHE;
        ");
        $stmt->execute(); //
        $idDemarche = $stmt->fetch(PDO::FETCH_BOTH);//recuperation de la requete executer dans une variable
     */
        }

    }
 }