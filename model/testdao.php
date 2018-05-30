
<?php

/* inclusion de notre classe DAO */
//require_once("Requete.php");
//require_once ("Inscription.php");
//require_once ("Connection.php");
require_once ("CreationSujetMessage.php");


$test = new CreationSujetMessage("1", "test", "", "nom", "4") ;
//$test = new Connection("12345678", "pierre");
//$res = $test->conn();

//$res = $test->inscription();
 //$res = $test->isNomPrenDLafpa();
if ($test->creat_subject_and_messag()) {
    //print_r($test);
    echo "c'est bon :";
    //echo $test->idNotDlafpa;
   //echo $test->getResultat();
} else {
    echo 'pas bon ';
    print_r($test->getError());
}
      