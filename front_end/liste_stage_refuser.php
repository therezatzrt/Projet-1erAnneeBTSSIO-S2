<!DOCTYPE html>
<html lang="en">
<!-- 
Fait par Anthony    
NR :23/02/2021
Ce fichier contient l'ensemble des pages nécessaire a l'affichage des stages refuser pour le professeur selon le professeur de spécialité
test modif
-->    
    <?php 
    $title = "Actualiser les démarches ";   //Titre de la page 
    include '../includes/header_connecter.php';   // Le fichier contenant le header commun de toute les pages avec le CSS, le <head> et la connexion a la BDD
    include '../middlewares/professeur.php'; // eviter la connexion non prévu d'un utilisateur
    include '../back_end/show-data_stage_refuser.php';   //Execution de la requête selectionnant la liste des stages refuser par le professeur de spécialité
    ?>

    <body> 
    <?php  include '../includes/barnav.php';// La barre de navigation général
           include 'lister_dern_stage_refuser.php';// Tableau contenant l'affichage de tout les stage refuser par le proffesseur de spécialité
            ?> 
    <div class="lime-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">2020 © iStage</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        <?php include '../includes/footer.php' ?>
    </body>
</html>