# Test technique pour l'entreprise Finelia

L'objectif consistait à réaliser une petite application pour ajouter des notes à une base de données d'étudiant puis de calculer la moyenne générale en prenant en compte les coefficients.

## Choix techniques

L'application a été réalisé sur un serveur WAMP, avec une base stockée sur MariaDB (se reposant sur mysql).

Le dossier dans WAMP se nomme finelia.

Lors de l'utilisation de l'application, veuillez changer le contenu de $pdo (stocké dans db.php), afin que celui-ci corresponde à vos informations personnelles.

Concernant la base, j'ai fait le choix de lier le coefficient à une matière et non à une note.

L'application étant simple, je n'ai pas appliqué une architecture de type MVC ou une programmation orienté objet.

Le CSS a été effectué avec l'utilisation du template Bootstrap.

## Utilisation

Le fichier formulaire.php est accesible depuis l'addresse /formulaire.php ou depuis la page d'accueil si le dossier dans WAMP porte bien le nom finelia.

On récupère de façon dynamique les prénoms des étudiants et les matières depuis la base de données.

Une fois le formulaire validé, l'utilisateur est dirigé vers /moyennes.php.

Le premier tableau affiche le prénom des étudiants et calcule la moyenne dans chaque matière.

Le second tableau calcule la moyenne générale en prenant en compte le coefficient de chaque matière dans le calcul.