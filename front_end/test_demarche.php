<doctype html!>
<html lang="en">
<?php
    $title = "Créer une nouvelle demarche si l'entreprise existe";

    include_once '../includes/header_connecter.php';// Le fichier de connexion utilisateur a inclure uniquement sur les pages ou l'utilisateur est connecter
    include_once '../middlewares/etudiant.php';// eviter la connexion non prévu d'un utilisateur

    include_once '../back_end/recherche_entreprise.php';
    include_once '../back_end/creer_demarche.php';
?>

<body>
<?php
    include_once '../includes/barnav.php';
?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nouvelle demarche si l'entreprise existe</h5>
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


                                
                                <form method="POST" id="creer_demarche" name="creer_demarche" class="mt-4">
                                    <div class="form-group">
                                        <label for="contact">Contacts possibles  </label>
                                        <select   name="id_contact" id="id_contact"  required  >
                                        <?php foreach ($contacts as $contact) { ?> 
                                             <option value="<?php echo $contact['ID_SALARIE']?>"><?php echo $contact['PRENOM_SALARIE'].' '.$contact['NOM_SALARIE'].', Tél :  '.$contact['TEL_SALARIE'].', Courriel :  '.$contact['EMAIL_SALARIE'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date de la démarche</label>
                                        <input type="date" class="form-control " id="date_dem"  name="date_dem"  required >
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Commentaire </label>
                                        
                                        <input type="text" class="form-control " id="comment"  name="comment"  required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="moyen">Moyen de communication</label>
                                        <select   name="id_moyen" id="moyen_com" required>
                                           <?php foreach ($moyens as $moyen) { ?> 
                                             <option value="<?php echo $moyen['ID_MOYEN']?>"><?php echo $moyen['LIBELLE_MOYEN']?></option>
                                           <?php } ?>
                                        </select>
                                     
                                    </div>
                                    
                                    <div class="mt-3">
                                        <button type="submit" name="creer_demarche" id="creer_demarche"
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
    

    <?php include '../includes/footer.php' ?>

</body>

</html>