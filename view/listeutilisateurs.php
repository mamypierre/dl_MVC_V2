
<?php

include_once '../model/Requete.php';

$test = Requete::tablenomprenompseudo($_GET["saisie"]) ;


echo json_encode($test);
?>




