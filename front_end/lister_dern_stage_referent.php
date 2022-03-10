<!-- 
 Fait par Alan 
 Affichage des 2 tableau contenant la liste des élèves réferent du'un professeur ainsi 
 que les élèves qui ont un stage
 -->

<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste de vos étudiants réferent en BTS ayant un de stage</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom élèves</th>
                                        <th scope="col">Prénom élèves</th>
                                        <th scope="col">Date Début</th>
                                        <th scope="col">Date Fin</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                        
                             // Boucle for permettant d'afficher l'emsemble élèves réferent
                                        foreach( $AucunStageReferent as $row ) {
                                           
                                            echo '
                                                <tr>
                                                    <td>'. $row['ID_ETUDIANT'] .'</td>
                                                    <td>'. $row['NOM_ETUDIANT'] .'</td>
                                                    <td>'. $row['PRENOM_ETUDIANT'] .'</td>
                                                    <td>'. $row['DATE_DEBUT'] .'</td>
                                                    <td>'. $row['DATE_FIN'] .'</td>
                                                </tr> 
                                                ';} ?>
                                </tbody>
                            </table>
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
            </div>
        </div>
    </div>
</div>
<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste de vos étudiants réferent en BTS n'ayant pas un stage</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"></th>
                                        <th scope="col">Nom élèves</th>
                                        <th scope="col"></th>
                                        <th scope="col">Prénom élèves</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        
                                        // Boucle for permettant d'afficher l'emsemble élèves réferent
                                                   foreach($stageReferentlist as $row ) {
                                                      
                                                       echo '
                                                           <tr>
                                                               <td>'. $row['ID_ETUDIANT'] .'</td>
                                                               <td></td>
                                                               <td>'. $row['NOM_ETUDIANT'] .'</td>  
                                                               <td></td>
                                                               <td>'. $row['PRENOM_ETUDIANT'] .'</td>
                                                           </tr> 
                                                           ';} ?>




                                </tbody>
                            </table>
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
            </div>
        </div>
    </div>
</div>
</div>