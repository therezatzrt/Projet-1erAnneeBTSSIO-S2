<?php
/**
 ** NR le 08/04/21
 * Fait par Océane
 *Page permettant d'annuler un stage
 **/

    $title = "Actualiser les démarches ";   //Titre de la page 
    include '../includes/header_connecter.php';   // Le fichier contenant le header commun de toute les pages avec le CSS, le <head> et la connexion a la BDD
    include '../middlewares/professeur.php';  // eviter la connexion non prévu d'un utilisateur
    include '../back_end/recherche_entreprise.php';
    include '../back_end/annuler_stage.php';
   ?>
        <body> 
    <?php  include '../includes/barnav.php';// La barre de navigation général
            include '../front_end/Annuler_stage_affichage.php';

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
        <?php include '../includes/footer.php' ?>
    </body>
</html>

    </body>
</html>