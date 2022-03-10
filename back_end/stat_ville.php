<!--
    Page permettant de récupérer l'ensemble des informations nécessaire pour l'affichage
    des 3 graphique sur la page lieux_statistique_ville.php
    Fait par Anthony
    NR :20/04/2021
-->
<?php
$Ville=$_GET['VILLE'];
$stmt = $db->prepare(
    "SELECT COUNT(demarche.ID_DEMARCHE) AS NB_DEMARCHE
    FROM demarche 
    LEFT JOIN salarie ON demarche.ID_SALARIE= salarie.ID_SALARIE
    LEFT JOIN entreprise ON salarie.ID_ENTREPRISE= entreprise.ID_ENTREPRISE
    WHERE VILLE_ENTREPRISE =:ville
    
;");
$stmt->bindValue(':ville',$Ville, PDO::PARAM_STR);
$stmt->execute(); 
$NbDemLieux = $stmt->fetch(PDO::FETCH_BOTH);

$stmt = $db->prepare(
    "SELECT COUNT(demarche.ID_DEMARCHE) AS NB_DEMARCHE
    FROM demarche 
    LEFT JOIN salarie ON demarche.ID_SALARIE= salarie.ID_SALARIE
    LEFT JOIN entreprise ON salarie.ID_ENTREPRISE= entreprise.ID_ENTREPRISE
    WHERE VILLE_ENTREPRISE !=:ville
    
;");
$stmt->bindValue(':ville',$Ville, PDO::PARAM_STR);
$stmt->execute(); 
$NbDemHorsLieux = $stmt->fetch(PDO::FETCH_BOTH);

$stmt = $db->prepare(
    "SELECT COUNT(*)AS NB_DEM_MOIS,MONTH(DATE_DEMARCHE) AS MOIS_DEM ,YEAR(DATE_DEMARCHE) AS ANNEE_DEM
    FROM demarche
    LEFT JOIN salarie ON demarche.ID_SALARIE= salarie.ID_SALARIE
    LEFT JOIN entreprise ON salarie.ID_ENTREPRISE= entreprise.ID_ENTREPRISE
    WHERE VILLE_ENTREPRISE =:ville
    GROUP BY MONTH(DATE_DEMARCHE)
    ;");
$stmt->bindValue(':ville',$Ville, PDO::PARAM_STR);
$stmt->execute(); 
$NbDemLieuxMois = $stmt->fetchAll(PDO::FETCH_BOTH);

$stmt = $db->prepare(
    "SELECT COUNT(*)AS NB_DEM_MOIS,MONTH(DATE_DEMARCHE) AS MOIS_DEM ,YEAR(DATE_DEMARCHE) AS ANNEE_DEM
    FROM demarche
    LEFT JOIN salarie ON demarche.ID_SALARIE= salarie.ID_SALARIE
    LEFT JOIN entreprise ON salarie.ID_ENTREPRISE= entreprise.ID_ENTREPRISE
    WHERE VILLE_ENTREPRISE !=:ville
    GROUP BY MONTH(DATE_DEMARCHE)
    ;");
$stmt->bindValue(':ville',$Ville, PDO::PARAM_STR);
$stmt->execute(); 
$NbDemHorsLieuxMois = $stmt->fetchAll(PDO::FETCH_BOTH);

$stmt = $db->prepare(
    "SELECT COUNT(*)AS NB_STAGE_MOIS,MONTH(DATE_VALIDATION) AS MOIS_VALIDATION ,YEAR(DATE_VALIDATION) AS ANNEE_VALIDATION
    FROM stage
    LEFT JOIN salarie ON stage.ID_SALARIE= salarie.ID_SALARIE
    LEFT JOIN entreprise ON salarie.ID_ENTREPRISE= entreprise.ID_ENTREPRISE
    WHERE VILLE_ENTREPRISE =:ville
    AND ETAT = 'OK'
    GROUP BY MONTH(DATE_VALIDATION)
    ;");
$stmt->bindValue(':ville',$Ville, PDO::PARAM_STR);
$stmt->execute(); 
$NbStageLieuxMois = $stmt->fetchAll(PDO::FETCH_BOTH);

$stmt = $db->prepare(
    "SELECT COUNT(*)AS NB_STAGE_MOIS,MONTH(DATE_VALIDATION) AS MOIS_VALIDATION ,YEAR(DATE_VALIDATION) AS ANNEE_VALIDATION
    FROM stage
    LEFT JOIN salarie ON stage.ID_SALARIE= salarie.ID_SALARIE
    LEFT JOIN entreprise ON salarie.ID_ENTREPRISE= entreprise.ID_ENTREPRISE
    WHERE VILLE_ENTREPRISE !=:ville
    AND ETAT = 'OK'
    GROUP BY MONTH(DATE_VALIDATION)
    ;");
$stmt->bindValue(':ville',$Ville, PDO::PARAM_STR);
$stmt->execute(); 
$NbStageHorsLieuxMois = $stmt->fetchAll(PDO::FETCH_BOTH);
