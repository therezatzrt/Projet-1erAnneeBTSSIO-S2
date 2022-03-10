<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Créer une nouvelle demarche si l'entreprise existe";

    include_once '../includes/header_connecter.php';//C'est pas ici
    include_once '../middlewares/etudiant.php';//C'est pas ici
    //(Modification ultérieur nécessaire pour ne prendre que la requête concernant le $countStage)(Ajout d'un nouveau fichier middlewares\show-count-stage_etudiant.php)
    include_once '../back_end/recherche_entreprise.php';
    include_once '../back_end/creer_demarche.php';//c'est pas ici
    
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
                                      <!-- Récupère les informations de l'entreprise choisit déjà enregistré dans la base de données -->
                                <div class="card">
                                  <p class="card-title">Entreprise choisie</p>
                                    <div class="card-body">
                                    <p class="card-text">Nom de l'entreprise : <?php echo $entreprise['NOM_ENTREPRISE'];?></p>
                                    <p class="card-text">Adresse de l'entreprise : <?php echo $entreprise['ADRESSE_ENTREPRISE'];?></p>
                                    <p class="card-text"><?php echo $entreprise['CP_ENTREPRISE'].' '.$entreprise['VILLE_ENTREPRISE'];?></p>
                                    <p class="card-text">Teléphone : <?php echo $entreprise['TEL_ENTREPRISE'];?></p>
                                    <p class="card-text"> Courriel : <?php echo $entreprise['EMAIL_ENTREPRISE'];?></p>
                                    </div>
                                </div>


                                
                                <form method="POST" id="creer_demarche" name="creer_demarche" class="mt-4">
                                    <div class="form-group">

                                    <!-- Affiche les contacts possibles pour l'entreprise -->
                                        <label for="contact">Contacts possibles  </label>
                                        <select   name="id_contact" id="id_contact"  required  >
                                        <?php foreach ($contacts as $contact) { ?> 
                                             <option value="<?php echo $contact['ID_SALARIE']?>"><?php echo $contact['PRENOM_SALARIE'].' '.$contact['NOM_SALARIE'].', Tél :  '.$contact['TEL_SALARIE'].', Courriel :  '.$contact['EMAIL_SALARIE'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>

                                    <!-- Indique la date de la démarche via un calendrier-->
                                    <div class="form-group">
                                        <label for="date">Date de la démarche</label>
                                        <input type="date" class="form-control " id="date_dem"  name="date_dem"  required >
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Commentaire </label>
                                        
                                        <input type="text" class="form-control " id="comment"  name="comment"  required>
                                    </div>

                                    <!-- Inique le moyen utilisé pour contacter l'entreprise par un menu roulant-->
                                    
                                    <div class="form-group">
                                        <label for="moyen">Moyen de communication</label>
                                        <select   name="id_moyen" id="moyen_com" required>
                                           <?php foreach ($moyens as $moyen) { ?> 
                                             <option value="<?php echo $moyen['ID_MOYEN']?>"><?php echo $moyen['LIBELLE_MOYEN']?></option>
                                           <?php } ?>
                                        </select>
                                     
                                    <!-- Demande à l'utilisateur si l'entreprise accepte encore des stagiaire -->
                                    </div>
                                    <div class="form-group">
                                        <label for="moyen">L'entreprise accepte-t-elle encore des stagiaires ?</label>
                                        <select   name="Status_Demarche" id="Status_Demarche" required>  <!-- La variable "select" crée un petit menu roulant -->
                                            <option value="0">Oui</option>
                                            <option value="1">Non</option>
                                        </select>
                                     
                                    </div>
                                    <div class="form-group">
                                        <label for="moyen">L'entreprise a-t-elle validée la démarche ?</label>
                                        <select   name="demarche_entreprise" id="demarche_entreprise" required>  <!-- La variable "select" crée un petit menu roulant -->
                                            <option value="1">Oui</option>
                                            <option value="0">Non</option>
                                        </select>
                                     
                                    </div>
                                    
                                    <div class="mt-3">
                                            <button type="submit" name="creer_demarche" id="creer_demarche"
                                            class="btn btn-block btn-primary btn-lg" data-toggle="">Soumettre</button>
     
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