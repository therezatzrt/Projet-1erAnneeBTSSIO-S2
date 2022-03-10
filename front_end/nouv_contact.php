<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Nouveau contact";
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    include '../includes/header_connecter.php';// Le fichier de connexion utilisateur a inclure uniquement sur les pages ou l'utilisateur est connecter
    include '../middlewares/etudiant.php';
    // inclusion des fichiers de traitements de données
    //(Modification ultérieur nécessaire pour ne prendre que la requête concernant le $countStage)(Ajout d'un nouveau fichier middlewares\show-count-stage_etudiant.php)
    include '../back_end/recherche_entreprise.php';
    include '../back_end/nouv_contact.php'
?>

<body>
<?php
    include '../includes/barnav.php';
?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nouveau contact</h5>
                                <div class="mt-4">

                                    <?php if(isset($success)) {
                                    echo '<p class="text-'.($success == true ? 'success' : 'danger').'">'.$message.'</p>';
                                      } ?>
                                </div>

                                <div class="card">
                                  <p class="card-title">Entreprise choisie</p>
                                    <div class="card-body">
                                    <p class="card-text">Nom de l'entreprise : <?php echo $entreprise['NOM_ENTREPRISE'];?></p>
                                    <p class="card-text">Adresse de l'entreprise : <?php echo $entreprise['ADRESSE_ENTREPRISE'];?></p>
                                    <p class="card-text"><?php echo $entreprise['CP_ENTREPRISE'].' '.$entreprise['VILLE_ENTREPRISE'];?></p>
                                    <p class="card-text">Teléphone : <?php echo $entreprise['TEL_ENTREPRISE'];?></p>
                                    <p class="card-text"> Courriel : <?php echo $entreprise['EMAIL_ENTREPRISE'];?></p>
                                    <p class="card-text">  <?php if ($entreprise['REFUS_ANNEE_SIO1']==1 ) echo'<p> <i class="fad fa-exclamation-circle" style="color:red"></i>refus stagiaire</p>';?>
                                    </div>
                                </div>
                                <form method="POST" id="nouv_contact" name="nouv_contact" class="mt-4">
                                    <div class="form-group">
                                        <label for="comment">Nom contact </label>
                                        
                                        <input type="text" class="form-control " id="nom_cont"  name="nom_cont"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Prenom contact </label>
                                        
                                        <input type="text" class="form-control " id="prenom_cont"  name="prenom_cont"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Tel contact </label>
                                        
                                        <input type="text" class="form-control " id="tel_cont"  name="tel_cont"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Courriel contact </label>
                                        
                                        <input type="text" class="form-control " id="courriel_cont"  name="courriel_cont"  required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" name="nouv_contact" id="nouv_contact"
                                            class="btn btn-block btn-primary btn-lg">Soumettre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>

    <?php include '../includes/footer.php' ?>

</body>

</html>