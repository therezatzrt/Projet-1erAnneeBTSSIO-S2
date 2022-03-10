<?php
// fait par JA
// Requête pour pouvoir exécuter une démarche

//Exécution de la démarche au niveau de la table DEMARCHE
$id = $_GET['id'];
    if (isset($_POST['transformation_stage'])) {

    if (!empty($_POST['date_fin']) && !empty($_POST['date_debut'])){
        
        
            $query = "INSERT INTO STAGE (ID_ETUDIANT,ID_SALARIE,DATE_FIN, DATE_DEBUT, ETAT) VALUES (:id_etudiant,:id_salarie,:date_fin,:date_debut,'AT');";
    
            $stmt = $db->prepare($query);
//binValue permet d'associer par valeur les emplacements anonymes ou nommés de la requête aux valeurs ou variables passées en paramètres.
// Elle retourne TRUE en cas de succès et FALSE en cas d'erreur. 
            $stmt->bindValue(':id_etudiant', $_SESSION['id'], PDO::PARAM_INT);// déjà bon
            $stmt->bindValue(':id_salarie', $_POST['id_contact'], PDO::PARAM_INT);
            $stmt->bindValue(':date_fin', $_POST['date_fin'], PDO::PARAM_STR);//Formulaire
            $stmt->bindValue(':date_debut', $_POST['date_debut'], PDO::PARAM_STR);//Formulaire

        try {    
              $stmt->execute();
              // affichage du tableau de bord du professeur
              header("refresh:1; tdb_etudiant.php");
        } 
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }   
$POST ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // mets l'attribut sur 
    }
    }
  