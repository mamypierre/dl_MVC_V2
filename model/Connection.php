<?php

require_once('Requete.php');

class Connection {

    private $motdepass;
    private $pseudo;
    private $error;
    private $result;
    private $idUser;
    private $userType;

    public function __construct($motpass, $pseudo) {
        $this->pseudo = $pseudo;
        $this->motdepass = $motpass;
    }

    public function getPseudo() {
        $res = NULL;
        if (isset($this->pseudo)) {
            $res = $this->pseudo;
        }
        return $res;
    }

    public function conn() {
        $res = FALSE;

        $result = Requete::getresultSelect("user", "id_user, password, id_user_type", "pseudo ={$this->pseudo}");

        if ($result) {

            if (password_verify($this->motdepass, $result[0]['password'])) {
                $resulta = Requete::getResultSelect("user_type", "type", "id_user_type={$result[0]['id_user_type']}");
                if ($resulta[0]['type'] == "utilisateur" || $resulta[0]['type'] == "modérateur" ||$resulta[0]['type'] == "webmaster"  ) {
                    $this->userType = $resulta[0]['type'];
                    $this->result = "Connection réussie";
                    $this->idUser = $result[0]['id_user'];
                    $res = TRUE;
                } else {
                    $this->error = "vous êtes en attente de validation";
                }
            } else {
                $this->error = "isNotPassword";
            }
        } else {
            $this->error = "isNotPseudo";
        }

        return $res;
    }

    public function getResult() {
        return $this->result;
    }

    public function getError() {
        return $this->error;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getUserType() {
        return $this->userType;
    }

}
