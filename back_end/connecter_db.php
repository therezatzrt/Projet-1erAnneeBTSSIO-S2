<?php
/**
 * * NR le 25/05/21
 * Fait par Anthony
 *page permettant la connexion au compte utilisateurs voulant ce connecter
 * l'utilisateur est connecter avec son adresse mail et son mdp stocker dans la SESSION
 **/

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

/**
 * Execute une requête $query via PDO
 *
 * @param $query  string La requête à
 *                exécuter
 * @param $params array Tableau associative pour l'utilisation de bindParam
 *                Ex: [':etudiant_id' => 2, ':entreprise_id' => 10]
 */
function sql_execute(string $query, array $params = [])
{
    global $db;
    $stmt = $db->prepare($query);
    if (count($params) > 0) {
        foreach ($params as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
    }
    if (!$stmt->execute()) {
        var_dump($stmt->errorInfo());
    }
    return $stmt;
}

function sql_fetch_all(string $query, array $params = [])
{
    $stmt = sql_execute($query, $params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function sql_fetch_column(string $query, array $params = [], $column = 0)
{
    $stmt = sql_execute($query, $params);
    return $stmt->fetchColumn($column);
}
?>