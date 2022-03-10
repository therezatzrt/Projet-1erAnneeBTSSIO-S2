Intégrer ce fichier dans le fichier de configuration de votre serveur php pour avoir une sécurisation optimale de la variable de session.
Voici les différents paramètres modifier dans le fichier php.ini:

//Spécifie la durée de vie des données sur le serveur, en nombre de secondes.
//Après cette durée, les données seront considérées comme obsolètes, et peuvent potentiellement être supprimées.
session.gc_maxlifetime=1200

//Marque le cookie pour qu'il ne soit accessible que via le protocole HTTP.
//Cela signifie que le cookie ne sera pas accessible par les langage de script, comme Javascript.
//Cette configuration permet de limiter les attaques comme les attaques XSS 
-session.cookie_httponly=true

//Permet au serveur qu'un cookie ne soit pas envoyer avec des requêtes entre site (cross-site).
//Cette assertion permet aux agent utilisateur de mitiger les riques de fuite d'information d'origine du site (cross-origin),
//et fourni de la protection contre les attaques des fausse requête entre site (cross-site request forgery).
-session.cookie_samesite=Strict

//Spécifie la durée de vie du cookie en secondes.
session.cookie_lifetime=1200

A ajouter uniquement sur un serveur sécuriser en HTTPS :

//Spécifie que les cookies ne doivent être émis que sur des connexions sécurisées. 
-session.cookie_secure=true