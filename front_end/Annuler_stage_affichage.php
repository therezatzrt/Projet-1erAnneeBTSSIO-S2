<!DOCTYPE html>
<html lang="en">
<?php foreach ($etudiant as $key) {
?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Annulation  du stage : </h5>
                                <div class="mt-4">

                                    <?php if(isset($success)) {
                                    echo '<p class="text-'.($success == true ? 'success' : 'danger').'">'.$message.'</p>';
                                      } ?>
                                </div>
                                      <!-- Récupère les informations de l'entreprise choisit déjà enregistré dans la base de données -->
                                <div class="card">
                                  <p class="card-title">Informations sur l'entreprise</p>
                                    <div class="card-body">
                                    <p class="card-text">Nom de l'entreprise : <?php echo $key['NOM_ENTREPRISE'];?></p>
                                    <p class="card-text">Adresse de l'entreprise : <?php echo $key['ADRESSE_ENTREPRISE'];?></p>
                                    <p class="card-text"><?php echo $key['CP_ENTREPRISE'].' '.$key['VILLE_ENTREPRISE'];?></p>
                                    <p class="card-text">Teléphone : <?php echo $key['TEL_ENTREPRISE'];?></p>
                                    <p class="card-text"> Courriel : <?php echo $key['EMAIL_ENTREPRISE'];?></p>
                                    </div>
                                </div>

                                      <!-- Récupère les informations de l'étudiant -->
                                <div class="card">
                                  <p class="card-title">Coordonnées de l'étudiant</p>
                                    <div class="card-body">
                                    <p class="card-text">Nom de l'étudiant : <?php echo $key['NOM_ETUDIANT'];?></p>
                                    <p class="card-text">Prénom de l'étudiant : <?php echo $key['PRENOM_ETUDIANT'];?></p>
                                    <p class="card-text">Spécialité : <?php echo $key['LIBELLE_SPECIALITE'];?></p>
                                    <p class="card-text"> Email : <?php echo $key['EMAIL'];?></p>
                                    </div>
                                </div>
                                
                                <form method="POST" id="annulation_stage" name="annulation_stage" class="mt-4">
                                    <!-- Indique quel est la raison du reufus-->
                                    
                                    <div class="form-group">
                                        <label for="comment">Cause</label>
                                        
                                        <input type="text" class="form-control " id="comment"  name="comment"  required>
                                    </div>
                                    
                                    <div class="mt-3">
                                            <button type="submit" name="annuler_stage" id="annuler_stage"
                                            class="btn btn-block btn-primary btn-lg" data-toggle="">Annuler le stage</button>
                                    <!--Ajouter une variable "comment" dans la bdd pour "stage"-->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}
?>