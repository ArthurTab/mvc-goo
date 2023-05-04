<?php
require_once 'include/configuration.php';
//Permet donc d'appeler "modele.php ainsi que parametre.php, smarty et surtout L'AUTOLOADER
autoloader::chargerClasses();


//On va avoir une variable $gestion pour savoir si on va aller sur mod_client, produit, profil, accueil...
//On a une seconde variable qu'on va appeler $action qui va lister les actions, si on veut ajouter, modifier, supprimer, rechercher, trier...
//Par exemple, si je veux un formulaire vierge, on aura form_ajouter, par contre si on veut consulter des données on aura form_consulter
//form_ajouter = formulaire vierge, alors que juste ajouter c'est une action pour insérer dans la bdd
//La méthode POST et la méthode GET sont fusionnées dans la méthode $_REQUEST

//On redirige vers accueil
//Si on n'a pas de variable gestion d'existante (= on vient d'arriver sur le site), on regarde si gestion est Null. Si oui, on lui donne la variable 'accueil'
//Donc notre script va d'abord diriger vers accueil
if (!isset($_REQUEST['gestion'])) {

    $_REQUEST['gestion'] = 'accueil';

};

//Appel du routeur (accueil.php, client.php, ...)

/*
require_once 'mod_'.$_REQUEST['gestion'].'/'.$_REQUEST['gestion'].'.php';
comme on a l'autoload, on n'a plus besoin de la ligne ci dessous
//Donc ici on appèle mod_accueil/accueil.php car on rappelle que $_request['gestion'] contient "accueil".
*/

//var_dump($_REQUEST);

//Création d'un objet, instance de la classe de type (routeur) accueil (ou clien, ou produit...)
$oRouteur = new $_REQUEST['gestion']($_REQUEST);
// = new accueil(); juste on travaille avec $_REQUEST

//Admettons, index.php parle au routeur accueil.php, ce routeur parle au controleur accueilControleur.php, ce controleur
//Parle à la vue

//Si jamais dans mon menu de gauche je clique sur "produits" puis sur "nouveau", la gestion sera "produits" tandis que l'action sera "form_ajouter"

$oRouteur->choixAction();