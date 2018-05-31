<?php

session_start();
require ('controller/frontend.php');

if (isset($_GET['idSousCategory']) && is_numeric($_GET['idSousCategory']) && $_GET['idSousCategory'] > 0) {
    listeSujet(trim($_GET['idSousCategory']));
}

elseif (isset($_GET['idSujet']) && is_numeric($_GET['idSujet']) && $_GET['idSujet'] > 0) {
    listeMessages(trim($_GET['idSujet']));
}

elseif (isset($_GET['conn']) && $_GET['conn'] == 1) {
    connection();
} 

elseif (isset($_POST['pseudo']) && isset($_POST['motdepass'])) {
    connection($_POST['motdepass'], $_POST['pseudo']);
} 

elseif (isset($_GET['deconnection'])) {
    deconnection();
}

elseif (isset($_GET['inscription']) && $_GET['inscription'] == 1) {
    inscription();
}

elseif (isset($_GET['Administrateur'])) {
    administrateur();
} 

elseif (isset($_GET['IdSujet'])) {
    editSujet($_GET['IdSujet']) ;
}

elseif (isset($_GET['IdMessage'])) {
    editMessage($_GET['IdMessage']) ;
}

elseif (isset($_GET['IdEditMessage'])&& isset($_POST['contentMessageEdit'])) {
    editMessage($_GET['IdEditMessage'], $_POST['contentMessageEdit']) ;
}

elseif (isset($_GET['idSuj']) && isset($_POST['message'])) {
    creation_message($_SESSION['idUser'], $_POST['message'], $_GET['idSuj']);
}

elseif (isset($_GET['idSousCategoryCreat']) && isset($_POST['nomSujer']) && isset($_POST['message'])) {
    
    creation_sujet_et_message($_SESSION['idUser'], $_POST['message'], $_POST['nomSujer'], $_GET['idSousCategoryCreat']);
    
} 

elseif (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['motdepass1']) && isset($_POST['motdepass2'])) {
    inscription($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['motdepass1'], $_POST['motdepass2']);
} 

elseif (isset($_GET['IdEditSujet']) && isset($_POST['sujetEdit'])) {
    
    editSujet($_GET['IdEditSujet'], $_POST['sujetEdit']);
} 

else {
    listeForum();
}

