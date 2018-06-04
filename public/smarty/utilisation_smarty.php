<?php
/*Smarty est un moteur de template
Cela permet de s�parer les pages html des scripts php qui les g�n�rent
*/

/*on utilise "require" pour int�grer et ex�cuter un script php ext�rieur 
� celui qu'on est en train d'�crire
ce script sera ex�cut� � chaque fois que ce fichier sera appel�
si on ne souhaite ex�cuter qu'une seule fois le script php ext�rieur
on utilisera "require_once" */
require 'smarty-master/libs/Smarty.class.php';

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

/*On assigne une valeur � un param�tre de smarty. 
Ici la premi�re lettre n'est pas en majuscule
sur le template oui gr�ce � |capitalize*/
$smarty->assign("title","users");

$smarty->assign("users", array(
	array("firstname" =>"John","lastname" =>"Doe","username" =>"john.doe@afpa.fr"),
	array("firstname" =>"Mary","lastname" =>"Smith","username" =>"mary.smith@afpa.fr"),
	array("firstname" =>"James","lastname" =>"Johnson","username" =>"james.johnson@afpa.fr"),
	array("firstname" =>"Henry","lastname" =>"Case","username" =>"henry.case@afpa.fr")
));

$smarty->display('template_html_smarty_bootstrap.tpl');

?>