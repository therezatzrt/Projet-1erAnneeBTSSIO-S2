<?php
/**
 * Fait par la PROF
 * * NR le 24/12/2020
 *   ce fichier permet de selectionner toute les informations relatives a l'entreprise
 *   correspondant a l'identifiant de la session courante
 **/ 
$stmt = $db->prepare("SELECT * FROM entreprise ");
$id_et=$_SESSION['id'];
$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$stage = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStage = count($stage);

// connaitre une démarche nécessite  non seulement de connaitre ces caractéristiques
// mais aussi les caractéristiques de l'entreprise et les moyens de comm utilsés
// et le salarié contacté au sein de l'entreprise


$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$demarches = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarches= count($demarches);
?>