<?php

require_once('model/Requete.php');
require_once('model/Connection.php');
require_once('model/Inscription.php');
require_once('model/CreationSujetMessage.php');

function listeForum() {
    $listCategorieSoucategrie = Requete::listCategorieSoucategrie();
    require ('view/listeCategoryView.php');
}

function listeSujet($idSousCategory) {
    $listsujets = Requete::getResultSelect("subject", "id_subject ,subject_name ", "id_sub_category= {$idSousCategory}");
    $nomCatego = Requete::getResultSelect("sub_category", "sub_category_name", "id_sub_category = {$idSousCategory}");

    require ('view/listeSujetsView.php');
}

function listeMessages($idSujet) {
    $listeMessages = Requete::getResultSelect("forum_message", "content", "id_subject = {$idSujet}");
    $nomSujet = Requete::getResultSelect("subject", "subject_name", "id_subject = {$idSujet}");

    require ('view/listeMessagesView.php');
}

function connection($motdepass = "", $pseudo = "") {

    if ($pseudo && $motdepass) {
        $connection = new Connection($motdepass, $pseudo);

        if ($connection->conn()) {

            //creation de variable de session 
            $_SESSION['idUser'] = $connection->getIdUser();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['time'] = time();
            require ('view/aceuille.php');
        } else {

            $error = $connection->getError();


            require ('view/connectionView.php');
        }
    } else {
        require ('view/connectionView.php');
    }
}

function deconnection() {
    if (isset($_SESSION)) {
        $speudo = $_SESSION['pseudo'];
        session_destroy();
        $_SESSION = NULL;
        require ('view/aceuille.php');
    } else {
        require ('view/aceuille.php');
    }
}

function inscription($nom = "", $prenom = "", $pseudo = "", $email = "", $motPass1 = "", $motPass2 = "") {
    $nom = trim($nom);
    $prenom = trim($prenom);
    $pseudo = trim($pseudo);
    $email = trim($email);
    $syntaxe = '<^[A-Za-z0-9]*$>';
    if ($nom && $prenom && $pseudo && $email && $motPass1 && $motPass2) {

        if (preg_match($syntaxe, $nom) && preg_match($syntaxe, $prenom) && preg_match($syntaxe, $pseudo)) {
            $inscription = new Inscription($nom, $prenom, $pseudo, $email, $motPass1, $motPass2);
            $resultat = $inscription->inscription();
            if ($resultat) {
                require ('view/aceuille.php');
            } else {
                $error = $inscription->getError();
                require ('view/inscriptionView.php');
            }
        } else {
            $error = "pas de caracter speciaux";
            require ('view/inscriptionView.php');
        }
    } else {
        require ('view/inscriptionView.php');
    }
}

function creation_message($id_user, $content_message, $id_subject) {
    $creationMessage = new CreationSujetMessage($id_user, $content_message, $id_subject);
    $creationMessage->creat_message();
    listeMessages($creationMessage->getIdSujet());
}

function creation_sujet_et_message($id_user, $content_message, $subject_name, $id_sub_category) {
    $creationMessEtSujet = new CreationSujetMessage($id_user, $content_message, "", $subject_name, $id_sub_category);

    if ($creationMessEtSujet->creat_subject_and_messag()) {       
        listeSujet($creationMessEtSujet->getIdsub());
    } else {
        print_r($creationMessEtSujet->getError());
    }
}
