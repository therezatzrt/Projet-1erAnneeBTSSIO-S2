<?php
/**
 * * NR le 22/03/2021
 * Fait par Anthony
 *Page permettant de choisir un lieux parmis une liste   
 *que celle du professeur connecté s'il est professeur de spécialité
 **/

    $title = "Actualiser les démarches ";   //Titre de la page 
    include '../includes/header_connecter.php';   // Le fichier contenant le header commun de toute les pages avec le CSS, le <head> et la connexion a la BDD
    include '../middlewares/professeur.php';  // eviter la connexion non prévu d'un utilisateur
    include '../back_end/stat_lieux.php';// Fichier récupérant les code postal(pour transformer en département avec la fonction :cherche_dept(), le nom des villes ,  et le nom des entreprises)
    ?>
        <body> 
    <?php  include '../includes/barnav.php';// La barre de navigation général
           include '../front_end/lister_dern_statistique.php';//Affiche les deux tableaux pour selectionner la ville ou le departement dans une liste déroulante
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