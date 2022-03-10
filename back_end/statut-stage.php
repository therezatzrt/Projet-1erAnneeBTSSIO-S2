<!--
Fichier servant de modification de l'état d'un stage passant de en attente a accepter ou refuser
-->

<?php
require '../includes/header_connecter.php';//récupération des paramètre de connexion de la BDD, pour la requête
foreach ($_POST as $key => $choixstage) {// Pour chaque valeur caractère récuperer dans le post sa affecte a value
    $idstage = str_replace("demo2","", $key);// Recupération du bout de l'option pour avoir l'id de l'article
    $valeurradio = $choixstage;// recuperation de l'etat de la value de la checkbox donc sois RE ou OK
    if($valeurradio!='OK'){
    $requete = $db->prepare('UPDATE stage SET ETAT = :etatstage WHERE ID_STAGE=:id_stage  ');// préparation de la requête SQL
    }
    else{
    $requete = $db->prepare('UPDATE stage SET ETAT = :etatstage, DATE_VALIDATION=NOW() WHERE ID_STAGE=:id_stage  ');// préparation de la requête SQL
    }
    $requete->bindParam(":id_stage", $idstage);// on met les paramètres pour préparer la requête SQL
    $requete->bindParam(":etatstage",$valeurradio);
    $requete->execute();// execution de la requête
    header("Location: ../front_end/tdb_professeur.php");//Renvois au tableau de bord professeur
}
?>