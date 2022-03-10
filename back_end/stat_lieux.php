
<?php
//Requête pour récuperer 3 variable contenant chacune :
// Le code postal(transformer en nom de département a l'affichage)

// Le nom de l'entreprise

//La ville 

// Pour chacune de ces 3 variable on récupérera en plus le NOMBRE de stage validé
// tout les requêtes seront dans l'ordre du plus grand nombre de stagiaire au plus petit nombre

/*
Explication du COUNT case :
COUNT(case ETAT when 'OK' then 1 else null end)AS NB_STAGE
Dans le cas ou la colonne ETAT vaut OK ajouter 1 au compte sinon ajouter au compte 0
*/

//ex:
//SUBSTR(nom_de_colonne,4,10)
//Le contenu de nom_de_colonne sera segmenté a partir du 4ème caractère sur 10 caractères.
$stmt = $db->prepare(
    "SELECT CP_ENTREPRISE,COUNT(case ETAT when 'OK' then 1 else null end)AS NB_STAGE
    FROM entreprise
    LEFT JOIN salarie ON entreprise.ID_ENTREPRISE= salarie.ID_ENTREPRISE
    LEFT JOIN stage ON salarie.ID_SALARIE = stage.ID_SALARIE
    GROUP BY SUBSTR(CP_ENTREPRISE,1,2)
    ORDER BY COUNT(case ETAT when 'OK' then 1 else null end) DESC
    ;");
$stmt->execute(); 
$CodePostal = $stmt->fetchAll(PDO::FETCH_BOTH);


$stmt = $db->prepare(
    "SELECT VILLE_ENTREPRISE,COUNT(case ETAT when 'OK' then 1 else null end)AS NB_STAGE
    FROM entreprise
    LEFT JOIN salarie ON entreprise.ID_ENTREPRISE= salarie.ID_ENTREPRISE
    LEFT JOIN stage ON salarie.ID_SALARIE = stage.ID_SALARIE
    GROUP BY VILLE_ENTREPRISE
    ORDER BY COUNT(case ETAT when 'OK' then 1 else null end) DESC
    ;");
$stmt->execute(); 
$VilleStage = $stmt->fetchAll(PDO::FETCH_BOTH);

$stmt = $db->prepare(
    "SELECT NOM_ENTREPRISE,COUNT(case ETAT when 'OK' then 1 else null end)AS NB_STAGE,entreprise.ID_ENTREPRISE
    FROM entreprise
    LEFT JOIN salarie ON entreprise.ID_ENTREPRISE= salarie.ID_ENTREPRISE
    LEFT JOIN stage ON salarie.ID_SALARIE = stage.ID_SALARIE
    GROUP BY NOM_ENTREPRISE
    ORDER BY COUNT(case ETAT when 'OK' then 1 else null end) DESC
    ;");
$stmt->execute(); 
$EntrepriseStage = $stmt->fetchAll(PDO::FETCH_BOTH);


?>