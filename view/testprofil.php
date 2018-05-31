
<?php

include_once '../model/Requete.php';

$test = Requete::getprofil($_GET['pseudo']) ;
$dates = Requete::getdate($_GET['pseudo']) ;



print_r ($test);
?><br><?php
print_r ($dates);




