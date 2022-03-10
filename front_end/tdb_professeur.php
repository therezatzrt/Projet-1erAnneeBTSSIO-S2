<!--
Page tableau de bord professeur 
Affichage du tableau de bord professeur correspondant au compte connecter
Son afficher sur cette page :
-La liste des stages en attente de décision suivant le prof référant avec possibiliter de refusé ou accepter le stage 
-Les Etudiant et leurs démarche suivant le prof référant
- Les différentes statistique sur les etudiants, entreprises enregistrées et entreprise qui n'acceptent plus de stagiaire
-->
<!DOCTYPE html>
<html lang="en">
<?php 
    $title = "Tableau de Bord Professeur";
    include '../includes/header_connecter.php'; // Le fichier de connexion utilisateur a inclure uniquement sur les pages ou l'utilisateur est connecter
    include '../middlewares/professeur.php';  // eviter la connexion non prévu d'un utilisateur   
    include '../back_end/show-data_gen.php';   //fichier chargant toute les info  générale du tableau de bord
    include '../back_end/show-data_prof.php';    // fichier chargant tout les infos concernant les profs dans le tableau de bord
    ?>
<body>
    <?php 
    
    include '../includes/barnav.php'; 
    include 'tbd_gen.php';
    ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stages en attente</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <form action="../back_end/statut-stage.php" method="POST">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom Stagiaire</th>
                                                <th scope="col">Prénom Stagiaire</th>
                                                <th scope="col">Nom entreprise</th>
                                                <th scope="col">Ville entreprise</th>
                                                <th scope="col">Nom contact</th>
                                                <th scope="col">Tel contact</th>
                                                <th scope="col">Date début</th>
                                                <th scope="col">Date fin</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                           
                                        <?php 
                                        foreach( $stageAttente as $row ) { 
                                            // Boucle for permettant d'afficher l'emsemble des stages en attente sur le tableau de bord du professeur référant
                                            // affichage de deux boutons (radio) qui ont le même id et label pour pouvoir appliquer le Css correctement
                                                echo '
                                            
                                                <tr>
                                                    <td>'. $row['ID_STAGE'] .'</td>    
                                                    <td>'. $row['NOM_ETUDIANT'] .'</td>
                                                    <td>'. $row['PRENOM_ETUDIANT'] .'</td>
                                                    <td>'. $row['NOM_ENTREPRISE'] .'</td>
                                                    <td>'. $row['VILLE_ENTREPRISE'] .'</td>
                                                    <td>'. $row['NOM_SALARIE'] .'</td>
                                                    <td>'. $row['TEL_SALARIE'] .'</td>
                                                    <td>'. $row['DATE_DEBUT'] .'</td>
                                                    <td>'. $row['DATE_FIN'] .'</td>
                                                    <td>
                                                    <div>
                                                    <input type="radio" name="demo2'.$row['ID_STAGE'].'" class="demo2 demoyes" id="demo2-a'.$row['ID_STAGE'].'" value="OK" >
                                                    <label for="demo2-a'.$row['ID_STAGE'].'">Valider</label>
                                                    <input type="radio" name="demo2'.$row['ID_STAGE'].'" class="demo2 demono" id="demo2-b'.$row['ID_STAGE'].'" value="RE" >
                                                    <label for="demo2-b'.$row['ID_STAGE'].'">Refuser</label>
                                                    </div>
                                                    </td>
                                                </tr> 
                                                '; } ?>
                                        </tbody>
                                        <?php
                                        if($countStageAttente !=0){
                                            echo'
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>                                               
                                                <td>
                                                <button type="submit" class="btn btn-primary">Valider les choix</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                      ';}  ?>
                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Etudiants  de SIO1 et synthèse de leurs démarches</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php 
                            if(!empty($etudiantsProfSpeDemarche or $etudiantsProfRefDemarche or $classeProfRef)){ ?>
                            <div class="card-body">
                                <h5 class="card-title">Liste des étudiants vous concernants</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Code postal</th>
                                                <th scope="col">Ville</th>
                                                <th scope="col">Courriel</th>
                                                <th scope="col">Numéro de téléphone</th>
                                                <th scope="col">NB Démarche étudiant(s) </th>
                                                </tr>
                                    </thead>
                                    <tbody>
                                    <!-- parcours de toutes le entreprises de la BDR et affichages des caractéristiques trouvées
                                    -->
                                    <?php 
                                    foreach($etudiantsProfSpeDemarche as $row)  { 
                                                echo '
                                                  <tr>
                                                    <td>'.$row['NOM_ETUDIANT'] .'</td>
                                                    <td>'.$row['PRENOM_ETUDIANT'] .'</td>
                                                    <td>'.$row['ADR_ETUDIANT'] .'</td>
                                                    <td>'.$row['CP_ETUDIANT'] .'</td>
                                                    <td>'.$row['VILLE_ETUDIANT'] .'</td>
                                                    <td>'.$row['EMAIL'] .'</td>
                                                    <td>'.$row['TEL_ETUDIANT'] .'</td>
                                                    <td>'.$row['NB_DEM'] .'</td>
                                                    <td>
                                                    <a href="lister_demarches_prof_form.php?id='.$row['ID_ETUDIANT'].'" <span class="btn btn-success">Voir</span></a>

                                                    
                                                       </td>
                                                
                                                </tr> 
                                                ';                                                                           
                                             }
                                    foreach( $etudiantsProfRefDemarche as $row ) { 
                                        echo '
                                          <tr>
                                            <td>'.$row['NOM_ETUDIANT'] .'</td>
                                            <td>'.$row['PRENOM_ETUDIANT'] .'</td>
                                            <td>'.$row['ADR_ETUDIANT'] .'</td>
                                            <td>'.$row['CP_ETUDIANT'] .'</td>
                                            <td>'.$row['VILLE_ETUDIANT'] .'</td>
                                            <td>'.$row['EMAIL'] .'</td>
                                            <td>'.$row['TEL_ETUDIANT'] .'</td>
                                            <td>'.$row['NB_DEM'] .'</td>
                                            <td>
                                            <a href="lister_demarches_prof_form.php?id='.$row['ID_ETUDIANT'].'" <span class="btn btn-success">Voir</span></a>
                                            </td>
                                        </tr> 
                                        ';
                                        
                                       }
                                    foreach( $classeProfRef as $row ) { 
                                        echo '
                                          <tr>
                                            <td>'. $row['NOM_ETUDIANT'] .'</td>
                                            <td>'. $row['PRENOM_ETUDIANT'] .'</td>
                                            <td>'. $row['ADR_ETUDIANT'] .'</td>
                                            <td>'. $row['CP_ETUDIANT'] .'</td>
                                            <td>'. $row['VILLE_ETUDIANT'] .'</td>
                                            <td>'. $row['EMAIL'] .'</td>
                                            <td>'. $row['TEL_ETUDIANT'] .'</td>
                                            <td>'. $row['NB_DEM'] .'</td>
                                            <td>
                                            <a href="lister_demarches_prof_form.php?id='.$row['ID_ETUDIANT'].'" <span class="btn btn-success">Voir</span></a>
                                            </td>
                                        </tr> 
                                        '; 
                                            
                                           } ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                            }
                            if(empty($etudiantsProfSpeDemarche) && empty($etudiantsProfRefDemarche) && empty($etudiantsProfSpeDemarche))    
                                    echo "<p>Vous n'êtes référent d'aucun élève ni avez aucun n'élève dans votre classe</p>"
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        </tbody>
                    </table>
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
    <?php include '../includes/footer.php' ?>

</body>

</html>