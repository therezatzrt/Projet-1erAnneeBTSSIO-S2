<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Créer une nouvelle demarche si l'entreprise existe";

    include_once '../includes/header_connecter.php';// Le fichier de connexion utilisateur a inclure uniquement sur les pages ou l'utilisateur est connecter
    include_once '../middlewares/etudiant.php';//C'est pas ici
    //(Modification ultérieure nécessaire pour ne prendre que la requête concernant le $countStage)(Ajout d'un nouveau fichier middlewares\show-count-stage_etudiant.php)
    include_once '../back_end/recherche_entreprise.php';
    include_once '../back_end/creer_demarche.php';//c'est pas ici
    include_once '../back_end/transformation_stage.php';
    
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
                                
                                    <!-- Transformation démarches en stage -->
                                
                                    <!-- TRANSFORMATION DE LA DEMARCHE EN SOUMISSION DE STAGE  -->
                                    
                                    <h5 class="card-title">Récapitulatif de ton stage</h5>            
                                
                                    <!-- Récupère les informations de l'entreprise choisit déjà enregistré dans la base de données -->
                                <div class="card">
                                  <p class="card-title">Entreprise choisie</p>
                                    <div class="card-body">
                                    <form method="POST" id="transformation_stage" name="transformation_stage" class="mt-4">
                                    <p class="card-text">Nom de l'entreprise : <?php echo $entreprise['NOM_ENTREPRISE'];?></spa>
                                    <p class="card-text">Adresse de l'entreprise : <?php echo $entreprise['ADRESSE_ENTREPRISE'];?></p>
                                    <p class="card-text"><?php echo $entreprise['CP_ENTREPRISE'].' '.$entreprise['VILLE_ENTREPRISE'];?></p>
                                    <p class="card-text">Teléphone : <?php echo $entreprise['TEL_ENTREPRISE'];?></p>
                                    <p class="card-text"> Courriel : <?php echo $entreprise['EMAIL_ENTREPRISE'];?></p>    <!-- mettre le stage en input pré rempli pour les modifier -->
                                    </div>
                                </div>

                                <!-- Indique la date de la démarche via un calendrier-->
                                <h5 class="card-title">Renseigne les dates de ton stage</h5>
                                <div class="form-group">
                                        <label for="date">Date de début</label>
                                        <input type="date" class="form-control " id="date_debut"  name="date_debut"  required >
                                        <label for="date">Date de fin</label>
                                        <input type="date" class="form-control " id="date_fin"  name="date_fin"  required >
                                    </div>

                                    <div class="form-group">

                                    <!-- Affiche les contacts possibles pour l'entreprise -->
                                        <label for="contact">Veuillez selectionner le tuteur : </label>
                                        <select   name="id_contact" id="id_contact"  required  >
                                        <?php foreach ($contacts as $contact) { ?> 
                                             <option value="<?php echo $contact['ID_SALARIE']?>"><?php echo $contact['PRENOM_SALARIE'].' '.$contact['NOM_SALARIE'].', Tél :  '.$contact['TEL_SALARIE'].', Courriel :  '.$contact['EMAIL_SALARIE'] ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                            <button type="submit" name="transformation_stage" id="transformation_stage"
                                            class="btn btn-block btn-primary btn-lg">Valider informations</button>
     
                                    </div></form>
                                    <div class="mt-3">
                                    <a href="tdb_etudiant.php" <span class="btn btn-block btn-primary btn-lg">Annuler</span></a>

                                    </div>
                                
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