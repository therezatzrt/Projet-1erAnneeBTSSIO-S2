<!-- 
 Fait par Alan 
 Mise en pagle global de la page avec le footer, la navbar ainsi que 
 l'ajout de lien pour les differente page de code 
 -->
 <!DOCTYPE html>
<html lang="en">
    
    <?php 
    $title = "Actualiser les démarches ";    
    include '../includes/header_connecter.php';   // Le fichier de connexion utilisateur a inclure uniquement sur les pages ou l'utilisateur est connecter
    include '../middlewares/professeur.php'; 
    include '../back_end/show_data_stage_referent_a_annuler.php';
    ?>

    <body> 
    <?php  include '../includes/barnav.php';
           include 'lister_stage_a_annuler.php'; ?> 
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