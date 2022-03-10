<?php
 //savoir si le stagiaire a obtenu un stage
$id_et=$_SESSION['id'];

$stmt = $db->prepare("SELECT * FROM stage WHERE ID_ETUDIANT=:id AND ETAT='OK' ;");
$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$stage = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStage = count($stage);


?>