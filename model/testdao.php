
<?php

/* inclusion de notre classe DAO */
//require_once("Requete.php");
require_once ("Inscription.php");
require_once ("Connection.php");


$test = new Inscription("mamy", "pierre", "saw", "wqau@gmail.com", "123456789", "123456789");
//$test = new Connection("12345678", "pierre");
//$res = $test->conn();

$res = $test->inscription();
 //$res = $test->isNomPrenDLafpa();
if ($res) {
    echo 'ok';
    //echo $test->idNotDlafpa;
   echo $test->getResultat();
} else {
    echo 'pas bon';
    print_r($test->getError());
}
      