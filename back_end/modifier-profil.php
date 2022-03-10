<?php
/**
 * Fait par la Anthony
 * * NR le 24/12/2020
 *   ce fichier permet de modifer le profil d'un utilisateur.
 *   Les caractéristiques : nom;prénom, tel et courriel
 **/ 
$show = false;
$showMdp = false;
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$email = $_SESSION['email'];
$telephone = $_SESSION['telephone'];

// 
if (isset($_POST['modifier-profil'])) {
    // Récupération des données et stockage
    $id = $_SESSION['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

 /* 
    Tache cybesécurité océane (Tester)
   $x = 50;
    filter_var($x, FILTER_VALIDATE_FLOAT, ["option" => ["default" => 100]]);
    filter_email(,FILTER_VALIDATE_EMAIL,["option" => ["default"]] );
    filter_email(FILTER_SANITIZE_EMAIL);
*/

    //Le nom, prenom, email et téléphone ne prend pas en compte de caractère spéciaux
    if (!empty($nom) && !empty($prenom) && !empty($email) & !empty($telephone)) {
        if (preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $telephone) && strlen($telephone) >= 10) {             
            // Insertion des données en base
            if ($_SESSION['rank']=='etudiant') {
                $req="UPDATE etudiant 
                       SET NOM_ETUDIANT=:nom, prenom_ETUDIANT=:prenom, 
                            email=:email,tel_ETUDIANT=:telephone 
                       WHERE id_ETUDIANT=:id;";

            } else {
                $req="UPDATE professeur 
                        SET NOM_PROF=:nom, prenom_PROF=:prenom, 
                             email=:email, tel_PROF=:telephone 
                        WHERE id_PROF=:id;";
            }

            try {
                $stmt = $db->prepare($req);

                //binValue permet d'associer par valeur les emplacements anonymes ou nommés de la requête aux valeurs ou variables passées en paramètres.
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);
                $stmt->execute();
                if($email!=$_SESSION['email'])
                {
                    $reqCompte="RENAME USER :email@localhost TO :emailmodif@localhost";
                    $stmt = $db->prepare($reqCompte);
                    $stmt->bindValue(':emailmodif', $email, PDO::PARAM_STR);
                    $stmt->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
                    $stmt->execute();
                }
                
                //Lorsque la modification est réussie
                $show = true;
                $color = "success";
                $message = "Modification réussie."; 
                $_SESSION['email']=$email;
                $_SESSION['nom']=$nom;
                $_SESSION['prenom']=$prenom;
                $_SESSION['telephone']=$telephone;
                $db=null;
                $machine="localhost";
                $port=3306;
                $utilisateur=$_SESSION['email'];
                $motdepasse=$_SESSION['mdp'];
                $nomdebase="ppenr";
                try {
                    $db =new PDO('mysql:host='.$machine.';port='.$port. ';dbname='.$nomdebase. ';charset=utf8', $utilisateur, $motdepasse);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
                }
                // si la connexion à la BDR n'a pas été effectuée , 
                //Avertissement de l'utilisateur cybersécurité???
                catch(Exception $e) {
                    die('Erreur '.$e->getMessage());
                }
            }
            catch    (Exception $e){
                $message =$e;
                $show = true;
                $color = "danger";
            }
        } else {
            $show = true;
            $color = "danger";
            $message = "Le numéro de téléphone est incorrecte. Exemple: 0123456789";
        }
    } else {
        $show = true;
        $color = "danger";
        $message = "Il faut remplir tous les champs.";
    }
}

/* Suppression de partie */
if (isset($_POST['modifier-mdp'])) {
    // Récupération des données et stockage
    $id = $_SESSION['id'];
    $motdepasse = $_POST['motdepasse'];
    $motdepassec = $_POST['motdepassec'];


    if (!empty($motdepasse)) {
        if ($motdepasse == $motdepassec) {
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/", $motdepasse)) {
                // hashage du mot de passe
                $hashed = password_hash($motdepasse, PASSWORD_DEFAULT);
                if ($_SESSION['rank']=='etudiant') {
                    $reqmdp="UPDATE etudiant 
                              SET MDP_ETUDIANT=:motdepasse 
                              WHERE id_ETUDIANT=:id;";
                } else {
                    $reqmdp="UPDATE etudiant 
                              SET MDP_ETUDIANT=:motdepasse
                              WHERE id_ETUDIANT=:id;";
                }
                 
                // Insertion des données en base
                try {
                    $stmt = $db->prepare($reqmdp);
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $stmt->bindValue(':motdepasse', $hashed, PDO::PARAM_STR);
                    $stmt->execute();
                    
                    $showMdp = true;
                    $colorMdp = "success";
                    $messageMdp = "Modification réussie.";           
                } 
                catch    (Exception $e){
                    $message =$e;
                    $show = true;
                    $color = "danger";
                }
            } else {
                $showMdp = true;
                $colorMdp = "danger";
                $messageMdp = "Le mot de passe doit être composé de 8 caractères, 1 majuscule, 1 minuscule et un chiffre.";
            }  
        } else {
            $showMdp = true;
            $colorMdp = "danger";
            $messageMdp = "Les deux mots de passe doivent être identiques.";
        } 
    } else {
        $showMdp = true;
        $colorMdp = "danger";
        $messageMdp = "Il faut remplir tous les champs.";
    }
}