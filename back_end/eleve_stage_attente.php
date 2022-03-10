
<?php

$id_et=$_SESSION['id'];
$stmt = $db->prepare("SELECT * FROM stage WHERE  ETAT='AT' AND :id=id_etudiant ;");
$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$stageAT = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageAT = count($stageAT);


?>