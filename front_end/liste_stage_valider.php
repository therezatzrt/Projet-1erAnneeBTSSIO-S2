<!DOCTYPE html>
<html lang="en">
<!-- 
Fait par Anthony    
NR :23/02/2021
Ce fichier contient l'ensemble des pages nécessaire a l'affichage des stages accepter pour le professeur selon le professeur de spécialité
-->      
    <?php 
    $title = "Actualiser les démarches ";   //Titre de la page 
    include '../includes/header_connecter.php';  // Le fichier de connexion utilisateur a inclure uniquement sur les pages ou l'utilisateur est connecter
    include '../middlewares/professeur.php';  // eviter la connexion non prévu d'un utilisateur
    include '../back_end/show-data_stage_valider.php';   //Execution de la requête selectionnant la liste des stages valider par le professeur de spécialité
    ?>

    <body> 
    <?php  include '../includes/barnav.php';
           include 'lister_dern_stage_valider.php'; ?> 
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