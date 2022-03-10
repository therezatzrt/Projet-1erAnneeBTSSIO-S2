<!--
NR :23/02/2021
Fait Par Anthony
Affichage des stage refuser par le prof de spécialité (Partie affichage liste)
-->
<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="card-body">
                 <h5 class="card-title">Liste des stages ayant été refusé.</h5>
                 <div class="table-responsive">
                 <table class="table">
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
                                    </tr>
                              </thead>
                        <tbody>
                        <!-- parcours des stages refusé issues de la BDR
                            Affichage de tout les stages refusé par le professeur de spécialités.-->
                            <?php 
                                        foreach( $stageRefuser as $row ) { // Boucle for permettant d'afficher l'emsemble des stages refusé par le professeur de spécialité
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
                                                </tr> 
                                                '; } ?>
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>