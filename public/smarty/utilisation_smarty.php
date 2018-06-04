<?php
/*Smarty est un moteur de template
Cela permet de séparer les pages html des scripts php qui les génèrent
*/

/*on utilise "require" pour intégrer et exécuter un script php extérieur 
à celui qu'on est en train d'écrire
ce script sera exécuté à chaque fois que ce fichier sera appelé
si on ne souhaite exécuter qu'une seule fois le script php extérieur
on utilisera "require_once" */
require 'smarty-master/libs/Smarty.class.php';

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

/*On assigne une valeur à un paramètre de smarty. 
Ici la première lettre n'est pas en majuscule
sur le template oui grâce à |capitalize*/
$smarty->assign("title","users");

$smarty->assign("users", array(
	array("firstname" =>"John","lastname" =>"Doe","username" =>"john.doe@afpa.fr"),
	array("firstname" =>"Mary","lastname" =>"Smith","username" =>"mary.smith@afpa.fr"),
	array("firstname" =>"James","lastname" =>"Johnson","username" =>"james.johnson@afpa.fr"),
	array("firstname" =>"Henry","lastname" =>"Case","username" =>"henry.case@afpa.fr")
));

$smarty->display('template_html_smarty_bootstrap.tpl');

?>