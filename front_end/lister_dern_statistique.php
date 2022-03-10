

            <div class="container">
                <div class="row">
                <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste pour les départements</h5>
        <div class="table-responsive">
                 <table class="table">
                            <thead>
                            
                                    <tr>
                                        <th scope="col-center">Nom du département</th>
                                        <th scope="col">Nombre de stage </th>
                                    </tr>
                              </thead>
                        <tbody>
                        <?php 
                                        foreach( $CodePostal as $row ) { // Boucle for permettant d'afficher l'emsemble des Des département ainsi que le nombre de stage valider pour chaque département
                                                echo '                
                                                    <tr>
                                                        <td><a  href="lieux_statistique_dep.php?CP='.substr($row['CP_ENTREPRISE'],0,2).'"> '.cherche_dept($row['CP_ENTREPRISE'] ).'</a></td> 
                                                        <td>'. $row['NB_STAGE'] .'</td>
                                                    </tr> 
                                                '; } ?>
                        </tbody>
                    </table>
                 </div>         

      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste par ville</h5>
        <div class="table-responsive">
                 <table class="table">
                            <thead>
                            
                                    <tr>
                                        <th scope="col-center">Ville</th>
                                        <th scope="col">Nombre de stage </th>
                                    </tr>
                              </thead>
                        <tbody>
                        <?php 
                                        foreach( $VilleStage as $row ) { // Boucle for permettant d'afficher l'emsemble des Des département ainsi que le nombre de stage valider pour chaque département
                                            echo '                
                                                <tr>
                                                    <td><a href="lieux_statistique_ville.php?VILLE='.$row['VILLE_ENTREPRISE'].'">'. $row['VILLE_ENTREPRISE'].'</a></td> 
                                                    <td>'. $row['NB_STAGE'] .'</td>
                                                </tr> 
                                                '; } ?>
                        </tbody>
                    </table>
                 </div>         

      </div>
    </div>
  </div>                                    
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Liste par entreprise</h5>
        <div class="table-responsive">
                 <table class="table">
                            <thead>
                            
                                    <tr>
                                        <th scope="col-center">Nom Entreprise</th>
                                        <th scope="col">Nombre de stage </th>
                                    </tr>
                              </thead>
                        <tbody>
                        <?php 
                                        foreach( $EntrepriseStage as $row ) { // Boucle for permettant d'afficher l'emsemble des Des département ainsi que le nombre de stage valider pour chaque département
                                            echo '                
                                                <tr>
                                                    <td><a href="lieux_statistique_entreprise.php?ID='.$row['ID_ENTREPRISE'].'"> '. $row['NOM_ENTREPRISE'].'</a></td>  
                                                    <td>'. $row['NB_STAGE'] .'</td>
                                                </tr> 
                                                '; } ?>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>