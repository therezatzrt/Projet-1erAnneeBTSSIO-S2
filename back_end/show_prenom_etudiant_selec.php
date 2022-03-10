<?php
$id_et=$_GET['id'];
$stmt = $db->prepare(
    "SELECT PRENOM_ETUDIANT FROM ETUDIANT WHERE ID_ETUDIANT=:id;   
    "
);

$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$prenomeleve = $stmt->fetch(PDO::FETCH_BOTH);

?>
