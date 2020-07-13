<?php

$route = strtok($_SERVER['REQUEST_URI'], '?');

//echo $route;
switch ($route){
    case "/finelia/":
        if (file_exists('formulaire.php')){
            include 'formulaire.php';
        } else { 
            die('Fichier non trouvé, erreur 404');
        }
    break;
    case '/formulaire':
        if (file_exists('formulaire.php')){
            include 'formulaire.php';
        } else { 
            die('Fichier non trouvé, erreur 404');
        }
    break;
    case '/moyennes':
        if (file_exists('moyennes.php')){
            include 'moyennes.php';
        } else {
            die('Fichier non trouvé, erreur 404');
        }
    break;
}