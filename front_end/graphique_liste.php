
<script>

var NbDemLieux = <?php echo json_encode($NbDemLieux['NB_DEMARCHE']); ?>;//Récuperation du nombre de démarche du code postal séléctionner
var NbDemHorsLieux = <?php echo json_encode($NbDemHorsLieux['NB_DEMARCHE']); ?>;//Récuperation du nombre de démarche en dehors du CP séléctionner
var NbDemTot = parseInt(NbDemLieux)+parseInt(NbDemHorsLieux);//Nombre de démarche total parse int nécessaire pour éviter la concaténation de chaine


var now = new Date();
var annee1 ;
var annee;
var NbDemLieuxMois=[0,0,0,0,0,0,0,0,0,0,0,0,0];// initialisation du tableau avec pour valeur pour chaque indice 0 qui est laisser a 0 si aucune démarche na été faite dans le mois
var NbDemHorsLieuxMois=[0,0,0,0,0,0,0,0,0,0,0,0,0];// initialisation du tableau avec pour valeur pour chaque indice 0 qui est laisser a 0 si aucune démarche na été faite dans le mois
var NbDemTotMois=[0,0,0,0,0,0,0,0,0,0,0,0,0];// initialisation du tableau avec pour valeur pour chaque indice 0 qui est laisser a 0 si aucune démarche na été faite dans le mois

var NbStageLieuxMois =[0,0,0,0,0,0,0,0,0,0,0,0,0];// initialisation du tableau avec pour valeur pour chaque indice 0 qui est laisser a 0 si aucun stage est présent pour le mois
var NbStageHorsLieuxMois  =[0,0,0,0,0,0,0,0,0,0,0,0,0];// initialisation du tableau avec pour valeur pour chaque indice 0 qui est laisser a 0 si aucun stage est présent pour le mois
var NbStageTotMois =[0,0,0,0,0,0,0,0,0,0,0,0,0];// initialisation du tableau avec pour valeur pour chaque indice 0 qui est laisser a 0 si aucun stage est présent pour le mois

/*
Nécessaire Pour l'affichage de l'année correspondant a l'année scolaire en cours
SI le mois actuelle est situé entre juillet et décembre alors :
Septembre + Année actuelle ect jusqua décembre
A partir de Janvier :
Janvier + Année actuelle+1

SINON
Septembre + Année actuelle-1 ect jusqua décembre
A partir de Janvier :
Janvier + Année actuelle

*/
if(now.getMonth()+1>=7){
    annee = now.getFullYear();
    annee1 = annee+1;
    }   
else{
    annee1 =now.getFullYear() ;
    annee = annee1-1;
    } 

// Statistique sur les démarche par mois

    <?php foreach($NbDemLieuxMois as $row ) {?>
for(var i =1; i<13;i++ ){

        if(i>=7){
            if(i==<?php echo json_encode(intval($row['MOIS_DEM'])); ?> && annee ==<?php echo json_encode(intval($row['ANNEE_DEM'])); ?>){
               NbDemLieuxMois[i]=<?php echo json_encode($row['NB_DEM_MOIS']); ?>;              
             }
             
        }
        else if(i==<?php echo json_encode(intval($row['MOIS_DEM'])); ?> && annee1 ==<?php echo json_encode(intval($row['ANNEE_DEM'])); ?>){
              NbDemLieuxMois[i]=(<?php echo json_encode(intval($row['NB_DEM_MOIS'])); ?>);
             }
    }
<?php }?>

<?php foreach($NbDemHorsLieuxMois as $row ) {?>
for(var i =1; i<13;i++ ){

        if(i>=7){
            if(i==<?php echo json_encode(intval($row['MOIS_DEM'])); ?> && annee ==<?php echo json_encode(intval($row['ANNEE_DEM'])); ?>){
               NbDemHorsLieuxMois[i]=<?php echo json_encode($row['NB_DEM_MOIS']); ?>;              
             }
             
        }
        else if(i==<?php echo json_encode(intval($row['MOIS_DEM'])); ?> && annee1 ==<?php echo json_encode(intval($row['ANNEE_DEM'])); ?>){
              NbDemHorsLieuxMois[i]=(<?php echo json_encode(intval($row['NB_DEM_MOIS'])); ?>);
             }
    }
<?php }?>
// Remplissage du Tableau avec les deux autres valeurs pour avoir le nombre total de démarche dans le mois
for(var i=1; i<13;i++){
    NbDemTotMois[i] = Number(NbDemHorsLieuxMois[i])+Number(NbDemLieuxMois[i]);
}

// Statistiques sur les stages par mois

<?php foreach($NbStageLieuxMois as $row ) {?>
for(var i =1; i<13;i++ ){

        if(i>=7){
            if(i==<?php echo json_encode(intval($row['MOIS_VALIDATION'])); ?> && annee ==<?php echo json_encode(intval($row['ANNEE_VALIDATION'])); ?>){
               NbStageLieuxMois[i]=<?php echo json_encode($row['NB_STAGE_MOIS']); ?>;              
             }
             
        }
        else if(i==<?php echo json_encode(intval($row['MOIS_VALIDATION'])); ?> && annee1 ==<?php echo json_encode(intval($row['ANNEE_VALIDATION'])); ?>){
              NbStageLieuxMois[i]=(<?php echo json_encode(intval($row['NB_STAGE_MOIS'])); ?>);
             }
    }
<?php }?>

<?php foreach($NbStageHorsLieuxMois as $row ) {?>
for(var i =1; i<13;i++ ){

        if(i>=7){
            if(i==<?php echo json_encode(intval($row['MOIS_VALIDATION'])); ?> && annee ==<?php echo json_encode(intval($row['ANNEE_VALIDATION'])); ?>){
               NbStageHorsLieuxMois[i]=<?php echo json_encode($row['NB_STAGE_MOIS']); ?>;              
             }
             
        }
        else if(i==<?php echo json_encode(intval($row['MOIS_VALIDATION'])); ?> && annee1 ==<?php echo json_encode(intval($row['ANNEE_VALIDATION'])); ?>){
              NbStageHorsLieuxMois[i]=(<?php echo json_encode(intval($row['NB_STAGE_MOIS'])); ?>);
             }
    }
<?php }?>
// Remplissage du Tableau avec les deux autres valeurs pour avoir le nombre total de stage dans le mois
for(var i=1; i<13;i++){
    NbStageTotMois[i] = Number(NbStageHorsLieuxMois[i])+Number(NbStageLieuxMois[i]);
}

// Affichage des Chart


//LineChart affichant le nombre de démarche hors  et sur le lieux ainsi que le nombre total de démarche par mois durant l'année scolaire
 let ctx = document.querySelector("#lineChart");
 let graph = new Chart(ctx,{
     type: "line",
     data: {
         labels:['Juillet '+annee,'Aout '+annee,'Septembre '+annee,'Octobre '+annee,' Novembre '+annee,' Décembre '+annee,'Janvier '+annee1,'Février '+annee1,'Mars '+annee1,'Avril '+annee1,'Mai '+annee1,'Juin '+annee1],
         datasets:[{
            label: 'Nombre de démarche sur le lieux',
            data:[NbDemLieuxMois[7],NbDemLieuxMois[8],NbDemLieuxMois[9],NbDemLieuxMois[10],NbDemLieuxMois[11],NbDemLieuxMois[12],NbDemLieuxMois[1],NbDemLieuxMois[2],NbDemLieuxMois[3],NbDemLieuxMois[4],NbDemLieuxMois[5],NbDemLieuxMois[6]],
            borderColor:'green'

            
         },
         {
                label: 'Nombre de démarche en déhors du lieux',
                data:[NbDemHorsLieuxMois[7],NbDemHorsLieuxMois[8],NbDemHorsLieuxMois[9],NbDemHorsLieuxMois[10],NbDemHorsLieuxMois[11],NbDemHorsLieuxMois[12],NbDemHorsLieuxMois[1],NbDemHorsLieuxMois[2],NbDemHorsLieuxMois[3],NbDemHorsLieuxMois[4],NbDemHorsLieuxMois[5],NbDemHorsLieuxMois[6]],
                borderColor:'red'

         },
         {
             label: 'Nombre total de démarche',
             data:[NbDemTotMois[7],NbDemTotMois[8],NbDemTotMois[9],NbDemTotMois[10],NbDemTotMois[11],NbDemTotMois[12],NbDemTotMois[1],NbDemTotMois[2],NbDemTotMois[3],NbDemTotMois[4],NbDemTotMois[5],NbDemTotMois[6]],
             borderColor: 'blue'

         }
         
         
         ]
     },

 })

//BarChart affichant les élèves ayant un stage hors et sur le lieux ainsi que le total par mois durant l'année scolaire
 let categorie = document.querySelector("#barChart")
 let graphique = new Chart(categorie,{
     type:"bar",
     data: {
        labels:['Juillet '+annee,'Aout '+annee,'Septembre '+annee,'Octobre '+annee,' Novembre '+annee,' Décembre '+annee,'Janvier '+annee1,'Février '+annee1,'Mars '+annee1,'Avril '+annee1,'Mai '+annee1,'Juin '+annee1],
         datasets:[{
            label: 'Elève avec stage sur le lieux',
            data:[NbStageLieuxMois[7],NbStageLieuxMois[8],NbStageLieuxMois[9],NbStageLieuxMois[10],NbStageLieuxMois[11],NbStageLieuxMois[12],NbStageLieuxMois[1],NbStageLieuxMois[2],NbStageLieuxMois[3],NbStageLieuxMois[4],NbStageLieuxMois[5],NbStageLieuxMois[6]],
            borderColor:'green',
            backgroundColor:'green'

            
         },
         {
                label: 'Elève avec stage en dehors du lieux',
                data:[NbStageHorsLieuxMois[7],NbStageHorsLieuxMois[8],NbStageHorsLieuxMois[9],NbStageHorsLieuxMois[10],NbStageHorsLieuxMois[11],NbStageHorsLieuxMois[12],NbStageHorsLieuxMois[1],NbStageHorsLieuxMois[2],NbStageHorsLieuxMois[3],NbStageHorsLieuxMois[4],NbStageHorsLieuxMois[5],NbStageHorsLieuxMois[6]],
                borderColor:'red',
                backgroundColor:'red'

         },
         {
             label: 'Elève avec stage',
             data:[NbStageTotMois[7],NbStageTotMois[8],NbStageTotMois[9],NbStageTotMois[10],NbStageTotMois[11],NbStageTotMois[12],NbStageTotMois[1],NbStageTotMois[2],NbStageTotMois[3],NbStageTotMois[4],NbStageTotMois[5],NbStageTotMois[6]],
             borderColor: 'blue',
             backgroundColor:'blue'

         }
         
         
         ]
     }
 })
 //Pie chart affichant le nombre de démarche sans date
 let Pie = document.querySelector("#pieChart")
 let graphiquePie = new Chart(Pie,{
     type:"pie",
     data: {
        labels:[
            'Nombre de démarche réaliser sur le lieux ',
            'Nombre de démarche réaliser en dehors du lieux',
            'Nombre de démarche total'
        ],
         datasets:[{
            label: 'Elève avec stage sur le lieux',
            data:  [NbDemLieux,NbDemHorsLieux,NbDemTot],
            borderColor:'grey',
            backgroundColor:[
            'green',
            'red',
            'blue',
            ]
            
         }     
         ]
     }
 })
</script>

