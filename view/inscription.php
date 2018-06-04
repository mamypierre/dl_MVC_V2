<?php

// VARIABLE PHP :
    // $nomDeVariable

    $nom = $_POST['nom'];       // enregistre le nom tapé et le met dans la variable $nom
    $prenom= $_POST['prenom'];  // enregistre le prénom tapé et le met dans la variable $prenom
    $courriel = $_POST['email'];  //enregistre le courrieltapé et le met dans la variable $courriel
    $mdp =$_POST['motdepass1'];        //enregistre le mdp tapé et le met dans la variable $mdp
    $mdp2 =$_POST['motdepass2'];      //enregistre le mdp22 tapé et le met dans la variable $mdp2
    $bool =false;                   // test d' erreur
    $pseudo = $_POST['pseudo'];
    
    


    
    require '../public/smarty/smarty-master/libs/Smarty.class.php';

    $smarty = new Smarty;

    $smarty->debugging = true;
    $smarty->caching = true; // ne fait un appel à la base de donnée que si le fichier de cache n' existe pas
    $smarty->cache_lifetime = 120;


   
/*On assigne une valeur à un paramètre de smarty. 
Ici la première lettre n'est pas en majuscule
sur le template oui grâce à |capitalize*/
                                                    
    $smarty->assign("nom",$nom);  // assigne des valeurs à smarty(clé,valeur)     
    $smarty->assign("prenom",$prenom); 
    $smarty->assign("pseudo",$pseudo);
    $smarty->assign("courriel",$courriel);
    $smarty->assign("mdp" ,$mdp);
    $smarty->assign( "mdp2", $mdp2);
            
    
    //$smarty->display('contenuMail.html');   //affiche le rendu dans un template html
    $contenu=$smarty->fetch('contenuMail.html');     // récupère  le contenu du template
              //la variable $contenu concatène toutes les informations .
    require '../public/phpmailer/src/PHPMailer.php';  //PHPmailer est une bibliothéque qui permet d' envoyer les donnés 
    use PHPMailer\PHPMailer\PHPMailer;
          //recueillies par mail

    if (isset($_POST['courriel']))   // vérifie si il y quelque chose dand le mail

    { 
            $_POST['courriel'] =htmlspecialchars($_POST['courriel']);  //On rend inoffensives les balises HTML que le visiteur a pu rentrer

            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['courriel'])) //regex pour un email correct
            {
 
                $bool=true;

                echo 'L\'adresse ' . $_POST['courriel'] . ' n\'est pas valide, recommencez !';  //e- mail non valide

               

            }

    }
         
              
               if  ($mdp != $mdp2)                     //test si les 2 mots de passse demandés sont identiques
                                            
                {                           // apparaît : "mots de passe différents"
                    
                      $bool=true;

                    echo 'mots de passe différents,recommencez';

                }
                    if (($nom == Null)  || ($prenom == Null) || ($pseudo == Null) || ($mdp == Null) || ($mdp2 == Null))
                        { 
                                                      //vérifie que ces  5 champs sont remplis
                    $bool = true;
                   
                    echo 'Tous les champs sont obligatoires';
                        
                        }



                                           
        /*print $contenu;*/
    
        

        $mail = new PHPMailer();            //crée une instance de PHP mailer
        $mail->Host = 'ssl://smtp.gmail.com'; //smtp serveur permet de se connecter à gmail et d' envoyer les 
        $mail->SMTPAuth = true;                 // informations recueillie par l' application qui l' utilise.
        $mail->Port = 465;                      // paramétrage du serveur de meéssagerie selon les éléments fourni
        $mail->SetFrom('jeregrosjean@gmail.com', 'GROSJEAN Jérémy');  //par Google
        $mail->addAddress($courriel, $nom);
        $mail->Subject = 'Envoye MAIL avec PHPMailer';
        $mail->CharSet = 'UTF-8';   // permet d' utiliser tous les caractéres spéciaux
        $mail->MsgHTML($contenu);  // permet d' envoyer un mail d' une application codée en HTML dans un code en PHP
                                
                                    
         if  ($bool == false)
            {
                 if (!$mail->send()) {
                    print 'ERREUR : '.$mail->ErrorInfo;  // vérifie que le mail est envoyé sinon marque un message d' erreur
                 } else {

                    print 'Message envoyé !!';
                 }

            } else 
                {
                    
                }

               
        
     


?>
