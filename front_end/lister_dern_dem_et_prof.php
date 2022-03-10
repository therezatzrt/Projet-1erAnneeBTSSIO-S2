<!--   NR le 24/12/2020
//  Ce fichier comporte l'affichage de toutes les démarches de l'étudiant courant.
// cette affichage sera inclus dans le tableau e bord de l'étudiant 
// et celui du professeur 
-->
<?php
include '../back_end/show_prenom_etudiant_selec.php'
?>

<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="card-body">
            <?php 
            if($countStageAT==0){
                echo'
                 <h5 class="card-title">Dernières démarches de '.$prenomeleve['PRENOM_ETUDIANT'].' </h5>';
            }
                 else{
                    echo'
                    <h5 class="card-title">Dernières démarches que tu as réalisées</h5>
                    <p>Vous avez déjà un stage en attente, veuillez attendre la validation de ce dernier !</p>';

                 }
                 ?>

                 <div class="table-responsive">
                 <table class="table">
                        <thead>
                            <tr>
                                                <th scope="col">Date démarche</th>
                                                <th scope="col">Nom entreprise</th>
                                                <th scope="col">Ville entreprise</th>
                                                <th scope="col">nom du contact</th>
                                                <th scope="col">tel du contact</th>
                                                <th scope="col">moyen de communication</th>
                                                <th scope="col">commentaire</th> 

                             </tr>
                        </thead>
                        <tbody>
                        <!-- parcours des démarches issues de la BDR
                            et affichages des caractéristiques trouvées-->
                            <?php 
                                 foreach( $demarches as $row ) {  
                                    echo ' 
                                    <tr>
                                        <td>'. join('-',array_reverse(explode('-',substr($row['DATE_DEMARCHE'],0,10)))).'</td> 
                                        <td>'. $row['NOM_ENTREPRISE'].'</td>
                                        <td>'. $row['VILLE_ENTREPRISE'].'</td>
                                        <td>'. $row['NOM_SALARIE'].'</td>
                                        <td>'. $row['TEL_SALARIE'].'</td>
                                        <td>'. $row['LIBELLE_MOYEN'].'</td>
                                        <td>'. $row['COMMENTAIRE'].'</td>
                                        
                                    </tr> 
                                '; } ?>
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>