<!-- 
 Fait par Alan 
 Requete qui envoie les information du forulaire sur la base de données dans la table salarie
 -->
<?php
if (isset($_POST['nouv_contact'])) {
    
    if (!empty($_POST['nom_cont']) && !empty($_POST['prenom_cont']) && !empty($_POST['tel_cont'])&& !empty($_POST['courriel_cont'])) {
            // Elaboration 
            $stmt = $db->prepare("INSERT INTO SALARIE (ID_ENTREPRISE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE ) 
            VALUES (:id_entreprise,:nom_cont,:prenom_cont,:tel_cont,:courriel_cont);"); //Association de la requête avec paramètres associés
           //execution avec les valeurs saisies 
           //binValue permet d'associer par valeur les emplacements anonymes ou nommés de la requête aux valeurs ou variables passées en paramètres.
            // Elle retourne TRUE en cas de succès et FALSE en cas d'erreur.
            $stmt->bindValue(':id_entreprise', $_SESSION['id'], PDO::PARAM_STR); 
            $stmt->bindValue(':nom_cont', $_POST['nom_cont'], PDO::PARAM_STR);
            $stmt->bindValue(':prenom_cont', $_POST['prenom_cont'], PDO::PARAM_STR);
            $stmt->bindValue(':tel_cont', $_POST['tel_cont'], PDO::PARAM_INT); // bindValue associe une valeur à une variable, PARAM_INT sert à vérifier le type de valeur  
            $stmt->bindValue(':courriel_cont', $_POST['courriel_cont'], PDO::PARAM_STR);
            if (filter_var($query, FILTER_VALIDATE_INT, array("options"=> array("min_range"=>1, "max_range"=>30)))=== true) //; DROP DATABASE PPENR;
            {
                if (filter_var($query, FILTER_SANITIZE_STRING)=== true){
                try {
                    $execute =$stmt->execute();
                    $success = true;
                    $message = "L'entreprise' a bien été ajoutée.";
                    // à la suite de l'actualisation-création de ses démarches, 
                    //l'étudiant est renvoyé sur son tableau de bord
                    header("lister_creer_entreprises.php");
                }
                // si l'enregistrement n'a pas été effectué , 
                //traitement d'avertissement de l'utilisateur
                catch    (Exception $e){
                    $message =$e;
                    $success = false;
                    $message ="pas d'ajout.";
                }
            }
            else
            {
                $message =$e;
                $success = false;
                $message ="pas d'ajout." ;
            }
            }
            else
            { 
                $message =$e;
                $success = false;
                $message ="pas d'ajout.";
            }
            try {    
              $stmt->execute(); //appel de la procédure stockée
              header("refresh:1; tdb_etudiant.php");
        } 
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }
    } 
} 