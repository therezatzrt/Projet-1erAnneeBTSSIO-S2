
<?php
/**  NR le 24/12/2020
* Ce fichier sera inclus dans toutes les pages
* Il permet de définir des fonctions générales 
* qui peuvent être utilisés dans toutes les pages
* la fonction escape peut être utilisées pour éviter des injections XSS



 *   escape retourne la chaine de caractères avec changement 
 *    des doubles quotes en simple quote
 *   $data représente la chaine de caractères à traiter
 */
function escape(string $data) : string {
    return htmlentities($data, ENT_QUOTES, 'UTF-8');
}
/*---------------------------------------------------------------*/
/*
    Titre : Donne  le nom du département à partir du Code Postal 
    Permet d'éviter a devoir rajouter une colonne Departement dans la bdd qui
    peut en plus être fausser par l'élève 
    ex : Lannion CP 75000 (Pas normal)

                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=205
    Auteur           : Matt                                                                                               
    Date édition     : 22 Jan 2007                                                                                        
    Date mise à jour : 18 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

    function cherche_dept($cp)
    {
    $nom_dept = array (
    "01" => "Ain",
    "02" => "Aisne",
    "03" => "Allier",
    "04" => "Alpes-de-Haute Provence",
    "05" => "Hautes-Alpes",
    "06" => "Alpes Maritimes",
    "07" => "Ardèche",
    "08" => "Ardennes",
    "09" => "Ariège",
    "10" => "Aube",
    "11" => "Aude",
    "12" => "Aveyron",
    "13" => "Bouches-du-Rhône",
    "14" => "Calvados",
    "15" => "Cantal",
    "16" => "Charente",
    "17" => "Charente-Maritime",
    "18" => "Cher",
    "19" => "Corrèze",
    "20" => "Corse",
    "21" => "Côte d'Or",
    "22" => "Côtes d'Armor",
    "23" => "Creuse",
    "24" => "Dordogne",
    "25" => "Doubs",
    "26" => "Drôme",
    "27" => "Eure",
    "28" => "Eure-et-Loire",
    "29" => "Finistère",
    "30" => "Gard",
    "31" => "Haute-Garonne",
    "32" => "Gers",
    "33" => "Gironde",
    "34" => "Hérault",
    "35" => "Ille-et-Vilaine",
    "36" => "Indre",
    "37" => "Indre-et-Loire",
    "38" => "Isère",
    "39" => "Jura",
    "40" => "Landes",
    "41" => "Loir-et-Cher",
    "42" => "Loire",
    "43" => "Haute-Loire",
    "44" => "Loire-Atlantique",
    "45" => "Loiret",
    "46" => "Lot",
    "47" => "Lot-et-Garonne",
    "48" => "Lozère",
    "49" => "Maine-et-Loire",
    "50" => "Manche",
    "51" => "Marne",
    "52" => "Haute-Marne",
    "53" => "Mayenne",
    "54" => "Meurthe-et-Moselle",
    "55" => "Meuse",
    "56" => "Morbihan",
    "57" => "Moselle",
    "58" => "Nièvre",
    "59" => "Nord",
    "60" => "Oise",
    "61" => "Orne",
    "62" => "Pas-de-Calais",
    "63" => "Puy-de-Dôme",
    "64" => "Pyrenées-Atlantiques",
    "65" => "Hautes-Pyrenées",
    "66" => "Pyrenées-Orientales",
    "67" => "Bas-Rhin",
    "68" => "Haut-Rhin",
    "69" => "Rhône",
    "70" => "Haute-Saône",
    "71" => "Saône-et-Loire",
    "72" => "Sarthe",
    "73" => "Savoie",
    "74" => "Haute-Savoie",
    "75" => "Paris",
    "76" => "Seine-Maritime",
    "77" => "Seine-et-Marne",
    "78" => "Yvelines",
    "79" => "Deux-Sèvres",
    "80" => "Somme",
    "81" => "Tarn",
    "82" => "Tarn-et-Garonne",
    "83" => "Var",
    "84" => "Vaucluse",
    "85" => "Vendée",
    "86" => "Vienne",
    "87" => "Haute-Vienne",
    "88" => "Vosges",
    "89" => "Yonne",
    "90" => "Territoire de Belfort",
    "91" => "Essonne",
    "92" => "Hauts-de-Seine",
    "93" => "Seine-Saint-Denis",
    "94" => "Val-de-Marne",
    "95" => "Val-d'Oise");

    $dept = substr($cp,0,2);
    return $nom_dept[$dept];
    }
    //Pour utiliser cette fonction il faut utiliser comme ceci :
    // <td>'.cherche_dept($row['CP_ETUDIANT'] ).'</td> pour un affichage avec SQL
    //cherche_dept(75119) sa renvois Paris car les deux premier caractère du CP est 75
?>
