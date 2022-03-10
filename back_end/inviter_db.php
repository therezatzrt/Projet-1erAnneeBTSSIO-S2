<?php
/** Fait par Anthony
 * 
 * NR le 25/05/2020
 * ce fichier permet de 
 *   . réaliser la connexion à la base de données en inviter
 *   . définir des fonctions à la base .
 **/
// il est INCLUS SYSTéMATQUEMENT lors de l'inclusion 
// des pages ou l'utilisateurs n'est pas connecter
// protection de la connexion par une exception pour afficher à l'utilisateur 
// un message d'erreur si la connexion n'a pas réussi n'a pas réussi
$machine="localhost";
$port=3306;
$utilisateur="inviter";
$motdepasse="";
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

