<!--   NR le 24/12/2020
  affichage de la barre de navigation avec plusieurs zones
   et selon le type d'utilisateurs
-->
<nav class="navbar navbar-expand-lg  navbar-light">


    <?php

  //  affichage des fonctionnalités accessibles aux étudiants
  if ($_SESSION['rank'] == "professeur") {
    echo '
    
    <h2 class="navbar-brand nav-link" >
      <a
        href="tdb_professeur.php">
           iStage  pour les  professeurs. 
      </a>
    </h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations-02"><span class="navbar-toggler-icon"></span></button>
   <div class="collapse navbar-collapse justify-content-md" id="navigations-02">
    <div class="row w-1000 ">
    <div class="col-2">
    <ul class="navbar-nav">
        <li class=" nav-link dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Lister les élèves et leurs démarches
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="lister_etudiant_SIO1.php">
                    BTS SIO1
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="../front_end/liste_stage_referent.php">
                    Stage Référen
                    </a>
                </li>
        </li>
    </ul>
</div>       
       <div class="col-2">
       <ul class="navbar-nav">
           <li class=" nav-link dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               Gérer les visites de stages
               </a>
               <ul class="dropdown-menu">
                   <li>
                       <a class="dropdown-item" href="emettre_voeux.php">
                       émettre des voeux de visites
                       </a>
                   </li>
                   <li>
                       <a class="dropdown-item" href="afficher_visites.php">
                       afficher les visites fixées
                       </a>
                   </li>
           </li>
       </ul>
   </div> 
        <div class="col-2">
        <ul class="navbar-nav">
            <li class=" nav-link dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Liste des stages
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="../front_end/liste_stage_valider.php">
                        Stages validés
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="../front_end/liste_stage_refuser.php">
                          Stages refusés
                        </a>
                    </li>

                    <li>
                    <a class="dropdown-item" href="../front_end/stage_a_annuler.php">
                    Stages à annuler
                    </a>
                </li>
            </li>
        </ul>
    </div> 
    <div class="col-2">
    <ul class="navbar-nav">
    <li class=" nav-link">
             <a href="../front_end/lieux_stage_statistique.php">Stat Stage</a>
             </li>
    </ul>
    </div>
  ';
  }
  //  affichage des fonctionnalités accessibles aux étudiants
  if ($_SESSION['rank'] == "etudiant") {
    include '../back_end/barnav_eleve_stage.php';
    echo '
       <h2 class="navbar-brand nav-link" >
       <a
         href="tdb_etudiant.php">
            iStage  pour les  étudiants. 
       </a>
        </h2>  
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations-02"><span class="navbar-toggler-icon"></span></button>
     <div class="collapse navbar-collapse justify-content-md" id="navigations-02">
     ';
    if ($countStage == 0) {
      echo '
       <div class="row w-1000">
       <div class="col-4">
       <ul class="navbar-nav">
       <li class=" nav-link">
                <a href="lister_demarches.php">Transformer/Creer tes démarches</a>
       </li>
                </ul>
       </div>
        <div class="col-4 ">
        <ul class="navbar-nav">  
        <li class=" nav-link">    
                 <a href="lister_creer_entreprises.php">Chercher une entreprise</a>
        </li>
                 </ul>
        </div>
   ';
    }
  }
  ?>
    <!--   NR le 24/12/2020
//  affichage de la barre de navigation commune aux étudiants et professeurs
//  affichage des éléments d'identification et de la possibilité de les consulter 
// et les modifier!
// ainsi quie la déconnexion à l'application avec RAZ des variables de session
-->
    <div class="col-4">
        <ul class="navbar-nav justify-content-end">
            <li class=" nav-link dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fad fa-user-tag mr-3"></i>
                    <?php echo ucfirst($_SESSION['prenom']) . " " . ucfirst($_SESSION['nom']); ?>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="profil.php">
                            <i class="fad fa-user mr-3"></i>
                            Mon Profil
                        </a>
                    </li>
                    <li><a class="dropdown-item" href="deconnexion.php">
                            <i class="fad fa-sign-out mr-3"></i>
                            Se déconnecter
                        </a>
                    </li>
            </li>
        </ul>
    </div>
    </div>
    </div>
  
</nav>