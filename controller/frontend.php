<?php

require_once('model/Requete.php');
require_once('model/Connection.php');
require_once('model/Inscription.php');


function listeForum() {
    $listCategorieSoucategrie = Requete::listCategorieSoucategrie();
    if ($listCategorieSoucategrie) {
        require ('view/listeCategoryView.php');
    } else {
        require ('view/pageEmpty.php');
    }
}

function listeSujet($idSousCategory) {
    $listsujets = Requete::getResultSelect("sujet", "id_sujet ,nom_sujet ", "id_sous_catégorie= {$idSousCategory}");
    $nomCatego = Requete::getResultSelect("sous_categorie", "nom_sous_catégorie", "id_sous_catégorie = {$idSousCategory}");
    if ($listsujets && $nomCatego) {
        require ('view/listeSujetsView.php');
    } else {
        require ('view/aceuille.php');
    }
}

function listeMessages($idSujet) {
    $listeMessages = Requete::getResultSelect("message_forum", "contenue", "id_sujet = {$idSujet}");
    $nomSujet = Requete::getResultSelect("sujet", "nom_sujet", "id_sujet = {$idSujet}");
    if ($listeMessages && $nomSujet) {
        require ('view/listeMessagesView.php');
    } else {
        require ('view/aceuille.php');
    }
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
            $waiting =$inscription->getWaiting();
            //La partie de Jérémy


            // envoi d' un mail de confirmation d'inscription  avec les différents champs remplis par l' utilisateur dans le cas ou il est inscrit et pas en liste d' attente



            if($resultat==true && $waiting==false)
            {

    require_once('public/smarty/smarty-master/libs/Smarty.class.php');
    require_once('public/phpmailer/src/Exception.php'); 
    require_once('public/phpmailer/src/SMTP.php'); 
    require_once('public/phpmailer/src/PHPMailer.php');  //PHPmailer est un bibliothéque qui permet d' envoyer les donnés recueillies par mail
    
        $smarty = new Smarty;

        $smarty->debugging = true;
        $smarty->caching = true; 
        $smarty->cache_lifetime = 120;

                                                 
    $smarty->assign("nom",$nom);  // assigne des valeurs à smarty(clé,valeur)     
    $smarty->assign("prenom",$prenom); 
    $smarty->assign("pseudo",$pseudo);
    $smarty->assign("courriel",$email);
    $smarty->assign("mdp" ,$motPass1);
    $smarty->assign( "mdp2", $motPass2);

    $contenu=$smarty->fetch('view/contenuMail.html');     // récupère  le contenu du template

    

        $mail = new PHPMailer\PHPMailer\PHPMailer();            //crée une instance de PHP mailer
        $mail->Host = 'ssl://smtp.gmail.com'; //smtp serveur permet de se connecter à gmail et d' envoyer les 
        $mail->SMTPAuth = true;                 // informations recueillie par l' application qui l' utilise.
        $mail->Port = 465;                      // paramétrage du serveur de meéssagerie selon les éléments fourni
        $mail->SetFrom('jeregrosjean@gmail.com', 'GROSJEAN Jérémy');  //par Google
        $mail->addAddress($email, $nom);
        $mail->Subject = 'Voici vos identifiants  d\'inscription au forum DL Community . Nous vous souhaitons la bienvenue dans note communauté!';
        $mail->CharSet = 'UTF-8';   // permet d' utiliser tous les caractéres spéciaux
        $mail->MsgHTML($contenu);  // permet d' envoyer un mail d' une application codée en HTML dans un code en PHP

            if (!$mail->send()) {
                    $error = 'ERREUR : '.$mail->ErrorInfo;  // vérifie que le mail est envoyé sinon marque un message d' erreur
                 } else {

                    print 'Message envoyé !!';
                 }


            }

            //fin de la partie de jérémy
            if ($resultat) {
                require ('view/aceuille.php');
            } else {
                $error = $inscription->getError();
                require ('view/inscriptionView.php');
            }
        } else {
            $error = "pas de caractères spéciaux";
            require ('view/inscriptionView.php');
        }
    } else {
        require ('view/inscriptionView.php');
    }
}
