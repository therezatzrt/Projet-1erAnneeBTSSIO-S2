<?php
/**
 * * NR le 22/03/2021
 * Fait par Anthony
 *Page permettant de choisir un lieux parmis une liste  
 **/

    $title = "Actualiser les démarches ";   //Titre de la page 
    include '../includes/header_connecter.php';   // Le fichier contenant le header commun de toute les pages avec le CSS, le <head> et la connexion a la BDD
    include '../middlewares/professeur.php';  // eviter la connexion non prévu d'un utilisateur
    include '../back_end/stat_dep.php';
       include '../includes/footer.php';
    ?>
        <body> 
    <?php  include '../includes/barnav.php';// La barre de navigation général
           include 'affichage_statistique.php';// Affiche l'ensemble des graphiques et statistiques concernant le departement.
           include 'graphique_liste.php';
 
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

    </body>
</html>