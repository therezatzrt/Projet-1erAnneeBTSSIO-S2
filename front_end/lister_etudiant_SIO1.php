<!DOCTYPE html>
<html kang="en">
<?php

    $title = "Liste des étudiants";
    //inclusion des fichiers header, tt du type d'utilisateur
    include '../includes/header_connecter.php';// Le fichier de connexion utilisateur a inclure uniquement sur les pages ou l'utilisateur est connecter
    include '../middlewares/professeur.php';
    //inclusion des fichiers de traitements de données
    include '../back_end/show-data_prof.php';
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
          <div class="lime-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">2020 iStage</span>
                        </div>
                    </div>
                 </div>
            </div>
            <?php include '../includes/footer.php' ?>
</body>             
</html>