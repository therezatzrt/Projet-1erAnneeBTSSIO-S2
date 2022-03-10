<!-- 
NR le 25/05/21
Fait par Anthony   
Page d'affichage html des 3 diagramme
Le canvas id="lineChart" fait référence au nom du chart dans le fichier graphique_liste
-->
<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Statistiques sur le nombre de démarche périodique</h5>
                              <canvas id="lineChart"></canvas>
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
                        <h5 class="card-title">Statistiques sur le nombre total de démarche</h5>
                              <canvas id="pieChart"></canvas>
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
                        <h5 class="card-title">Statistiques sur les stages</h5>
                              <canvas id="barChart"></canvas>
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
<!--
Idée de graphique a ajouter :
-Un graphique qui récupere toute les démarches qui ont été fait auprès d'entreprise qui ont le même département(SUBSTR(CP_ENTREPRISE,1,2)) que celui qui a été cliqué 
 (Pie sur chart.js) avec :
    -la partie d'entreprise démarché sur le département
    -une deuxième partie sur le reste des démarches faites qui ne sont pas dans le département.
    -une troisième partie sur la totalité des démarches faites 

-Une line chart montrant le nombre de démarche réaliser sur le département celon la date de démarche pour une ligne
    -Une deuxième ligne avec le nombre total de démarche réaliser pour tout les départements toujours celon la date de démarche 
    -Une troisième ligne avec le nombre de démarche réaliser en dehors du département concerner toujours celon la date de démarche

-Un bar Chart affichant:
    -le nombre d'élève qui ont un stage dans le département 
    -Le nombre d'élève qui ont un stage dans tout les départements
    -le nombre d'élève sans stage 
-->

