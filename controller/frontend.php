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
    $listsujets = Requete::getResultSelect("subject", "id_subject ,subject_name, id_user ", "id_sub_category= {$idSousCategory}");
    $nomCatego = Requete::getResultSelect("sub_category", "sub_category_name", "id_sub_category = {$idSousCategory}");

    require ('view/listeSujetsView.php');
}

function listeMessages($idSujet) {
    $listeMessages = Requete::listMessageAndPseudo($idSujet);
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
            $_SESSION['UserType'] = $connection->getUserType();
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

function creation_message($id_user, $content_message, $id_subject) {
    $creationMessage = new CreationSujetMessage($id_user, $content_message, $id_subject);
    $creationMessage->creat_message();
    listeMessages($creationMessage->getIdSujet());
}

function creation_sujet_et_message($id_user, $content_message, $subject_name, $id_sub_category) {
    $creationMessEtSujet = new CreationSujetMessage($id_user, $content_message, "", $subject_name, $id_sub_category);

    $creationMessEtSujet->creat_subject_and_messag();
    listeSujet($creationMessEtSujet->getIdsub());
}

function editMessage($id_message, $contentMessage = "") {

    $content = Requete::getResultSelect("forum_message ", "content, id_subject", "id_message={$id_message}");

    if ($id_message && $contentMessage) {
        Requete::update("forum_message", "content", "$contentMessage", "id_message={$id_message}");
        listeMessages($content[0]['id_subject']);
    } else {

        require ('view/modification_message view.php');
    }
}

function editSujet($idsubjet, $content = "") {

    $nomSujet = Requete::getResultSelect("subject ", "subject_name, id_sub_category", "id_subject={$idsubjet}");

    if ($idsubjet && $content) {
        Requete::update("subject", "subject_name", "$content", "id_subject={$idsubjet}");
        listeSujet($nomSujet[0]['id_sub_category']);
    } else {

        require ('view/modification_nom_sujet_view.php');
    }
}

function inscription($nom = "", $prenom = "", $pseudo = "", $email = "", $motPass1 = "", $motPass2 = "") {
    $nom = trim($nom);
    $prenom = trim($prenom);
    $pseudo = trim($pseudo);
    $email = trim($email);
    if ($nom && $prenom && $pseudo && $email && $motPass1 && $motPass2) {

        $inscription = new Inscription($nom, $prenom, $pseudo, $email, $motPass1, $motPass2);
        $resultat = $inscription->inscription();
        if ($resultat) {
            require ('view/aceuille.php');
        } else {
            $error = $inscription->getError();
            require ('view/inscriptionView.php');
        }
    } else {
        require ('view/inscriptionView.php');
    }
}

function administrateur() {
    if (isset($_POST['news'])) {
        $test = $_POST['news'];
        if (Requete::inser("news", "description", "'{$test}'")) {
            echo "News ajouté";
        } else {
            echo "Ajout news echoué";
        }
    }

    if (isset($_POST['pseudo']) && isset($_POST['password1']) && isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $nom = trim($_POST['last_name']);
        $prenom = trim($_POST['first_name']);
        $pseudo = trim($_POST['pseudo']);
        $email = trim($_POST['email']);
        if ($nom && $prenom && $pseudo && $email && $_POST['password1'] && $_POST['password2']) {

            $inscription = new Inscription($nom, $prenom, $pseudo, $email, $_POST['password1'], $_POST['password2']);
            $resultat = $inscription->inscription();
            if ($resultat) {
                require ('view/administrateurView.php');
            } else {
                $error = $inscription->getError();
                require ('view/inscriptionView.php');
            }
        } else {
            require ('view/inscriptionView.php');
        }
    }
    if (isset($_POST['user_nameDel'])) {
        $query = "SELECT status from information inner join user on information.id_information = user.id_information where pseudo = " . $_POST['user_nameDel'];
        if (Requete::getResults($query) != "DlAfpa") {
            if (Requete::deleteUser($_POST['user_nameDel'])) {
                echo "Utilisateur supprimer";
            } else {
                echo "Effacement echoué";
            }
        } elseif (Requete::delete("user", "pseudo", $_POST['user_nameDel'])) {
            echo "Utilisateur supprimer";
        } else {
            echo "Effacement echoué";
        }
    }
    require ('view/administrateurView.php');
}
