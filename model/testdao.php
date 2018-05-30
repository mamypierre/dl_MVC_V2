
<?php

/* inclusion de notre classe DAO */
//require_once("Requete.php");
//require_once ("Inscription.php");
//require_once ("Connection.php");
require_once ("CreationSujetMessage.php");


$test = new CreationSujetMessage("15", "test", "", "tes1", "4") ;
//$test = new Connection("12345678", "pierre");
//$res = $test->conn();

//$res = $test->inscription();
 //$res = $test->isNomPrenDLafpa();
if ($test->getidsub()) {
    //print_r($test);
    echo $test->getidsub();
    echo "c'est bon";
    //echo $test->idNotDlafpa;
   //echo $test->getResultat();
} else {
    echo 'pas bon';
    print_r($test->getError());
}
      