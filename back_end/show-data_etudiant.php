<?php 
/** Fait par la PROF
 * * NR le 24/12/2020
 *   ce fichier permet de retrouver les informations nécessaires
 *   à l'affichage du tableau de bord
 *      . savoir si le stagiaire a obtenu un stage
 *      . connaitre les démarches effectuées par le candidat
 **/ 
if ($_SESSION['rank'] == "etudiant") { 
$id_et=$_SESSION['id'];
}
 if ($_SESSION['rank'] == "professeur") { 
  $id_et=$_GET['id'];
 }; //Il y a deux ID, les deux id passent dans la même requête.  quand le prof clique il récupère l'id du bouton cliqué dans l'URL avec le GETcar on veut récupérer l'id du bouton, et l'id etudiant est pour récupérer ses données et l'utilisateur 


$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$nomEtudiantSelec = $stmt->fetchAll(PDO::FETCH_BOTH);

// connaitre une démarche nécessite  non seulement de connaitre ces caractéristiques
// mais aussi les caractéristiques de l'entreprise et les moyens de comm utilsés
// et le salarié contacté au sein de l'entreprise
$stmt = $db->prepare(
    "SELECT ENTREPRISE.ID_ENTREPRISE, NOM_ENTREPRISE,VILLE_ENTREPRISE, NOM_SALARIE, 
           TEL_SALARIE,DATE_DEMARCHE,COMMENTAIRE,LIBELLE_MOYEN 
        FROM salarie,demarche,entreprise,moyencom 
        WHERE MOYENCOM.ID_MOYEN=DEMARCHE.ID_MOYEN AND 
              DEMARCHE.ID_SALARIE=SALARIE.ID_SALARIE AND
            ENTREPRISE.ID_ENTREPRISE= SALARIE.ID_ENTREPRISE AND 
            DEMARCHE.ID_ETUDIANT=:id 
        ORDER BY DATE_DEMARCHE  DESC"
);

$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$demarches = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarches= count($demarches);
?>