<?php

require_once('Requete.php');

class Inscription {

    private $nom;
    private $prenom;
    private $pseudo;
    private $email;
    private $motPass1;
    private $motPass2;
    private $password;
    private $error;
    private $resultat;
    private $waiting;
    public $idDlfapa;
    public $idNotDlafpa;
    private $idUser;

    public function __construct($nom, $prenom, $pseudo, $email, $motPass1, $motPass2) {
        $this->nom = trim($nom);
        $this->prenom = trim($prenom);
        $this->pseudo = trim($pseudo);
        $this->email = trim($email);
        $this->motPass1 = $motPass1;
        $this->motPass2 = $motPass2;
    }

    /**
     * verifie si le nom et prenom exist deja dans la table dl_afpa
     * @param type $nom mom a chercher
     * @param type $prenom prenom a chercher
     * @return vrais lenom et prenom existe
     */
    public function isNomPrenDLafpa() {
        $result = FALSE;
        $res = Requete::getresultSelect('information', 'first_name,id_information,status', "last_name = {$this->nom}");
        if ($res) {
            foreach ($res as $resulta) {
                if ($resulta['first_name'] == $this->prenom) {
                    if ($resulta['status'] == 'DlAfpa') {
                        $this->idDlfapa = $resulta['id_information'];
                    } else {
                        $this->idNotDlafpa = $resulta['id_information'];
                        //print_r($this->idNotDlafpa) ;
                    }

                    $result = TRUE;
                }
            }
        }
        return $result;
    }

    /**
     * savoir si un pseudo existe ou pas
     * @return boolean vrais si ca existe
     */
    public function isPseudoUtilisateur() {
        $result = FALSE;
        $res = Requete::getResultSelect('user', 'id_user', "pseudo = {$this->pseudo}");
        if ($res) {
            $result = TRUE;
            $this->idUser = $res[0]['id_user'];
        }
        return $result;
    }

    /**
     * verification des condition pour insert
     */
    public function verife() {


        $tes = FALSE;
        if (strlen($this->nom) < 50 && strlen($this->prenom) < 50 && strlen($this->pseudo) < 20 && strlen($this->pseudo) > 2) { //verification de nom et prenom et pseudo
            $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
            if (preg_match($syntaxe, $this->email)) {//ferification de l'email
                if (strlen($this->motPass1) > 7 && $this->motPass1 == $this->motPass2) {//verifivation du mot de pass
                    if (!$this->isPseudoUtilisateur()) {
                        $tes = TRUE;
                        $this->password = password_hash($this->motPass1, PASSWORD_DEFAULT);
                        $this->motPass1 = NULL;
                        $this->motPass2 = NULL;
                    } else {
                        $this->error = "Ce pseudo existe deja ";
                    }
                } else {
                    $this->error = "Les deux mot de passe ne correspond pas ou est trop court,Il doit etre supérieur a 8 caractere ";
                }
            } else {
                $this->error = "L'email doit avoir une format caractere@caractere.caractere";
            }
        } else {
            $this->error = "longueur max du nom est de 50 caractere, longeur max du prenom est de 50 caractere, La taille du pseudo doit etre entre 20 a 50 caractere ";
        }
        return $tes;
    }

    /**
     * 
     * @return string return 'ok' c'est inscri et valider et 'encour' pour encour de validation 
     */
    public function inscription() {
        $result = FALSE;
        if ($this->verife()) {
            // retourn id dlafpa si existe
            if ($this->isNomPrenDLafpa()) {
                if ($this->idDlfapa) {
                    $idType = Requete::getResultSelect("user_type", "id_user_type", "type=utilisateur");

                    if (Requete::inser("user", "password, pseudo, email_inscription, id_information, id_user_type ", "'{$this->password}', '{$this->pseudo}', '{$this->email}', '{$this->idDlfapa}', '{$idType[0]['id_user_type']}'")) {
                        $result = TRUE;
                        $waiting = FALSE;
                        $this->resultat = "felicitation vous êtes inscrit ";
                    } else {
                        $this->error = Requete::getErreur();
                    }
                } else {
                    $this->error = "Vous êtes déja inscrit";
                }
            } else {
                //insertion dans la liste d'attente               
                if (Requete::inser("information", "last_name ,first_name,status", "'{$this->nom}','{$this->prenom}',DEFAULT")) {
                    $this->isNomPrenDLafpa();
                    if ($this->idNotDlafpa) {
                        $idType = Requete::getResultSelect("user_type", "id_user_type", "type=unknown");
                        if ($idType) {
                            if (Requete::inser("user", "password, pseudo, email_inscription, id_information, id_user_type ", "'{$this->password}', '{$this->pseudo}', '{$this->email}', '{$this->idNotDlafpa}', '{$idType[0]['id_user_type']}'")) {
                                $this->isPseudoUtilisateur();
                                if ($this->idUser) {
                                    if (Requete::inser("waiting_list", "id_user, approval", "'{$this->idUser}',DEFAULT")) {
                                        $result = TRUE;
                                        $waiting = TRUE;
                                        $this->resultat = "Vous êtes inscrit sur la liste d'attente ";
                                    } else {
                                        $this->error = Requete::getErreur();
                                    }
                                } else {
                                    $this->error = "3";
                                }
                            } else {
                                $this->error = Requete::getErreur();
                            }
                        } else {
                            $this->error = "2";
                        }
                    } else {
                        $this->error = "1";
                    }
                } else {
                    $this->error = Requete::getErreur();
                }
            }
        }
        return $result;
    }

    public function getError() {
        return $this->error;
    }

    public function getResultat() {
        return $this->resultat;
    }

    public function getWaiting() {
        return $this->waiting;        
    }

}
?>

