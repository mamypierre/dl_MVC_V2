<?php

require_once('Requete.php');

class CreationSujetMessage {

    private $subject_name;
    private $id_sub_category;
    private $id_user;
    private $content_message;
    private $id_subject;
    private $error;

    function __construct($id_user, $content_message, $id_subject = "", $subject_name = "", $id_sub_category = "") {

        if (isset($content_message) && trim($content_message)) {
            $this->content_message = str_replace("'", "''", $content_message);
        }
        if (isset($subject_name) && trim($subject_name)) {
            $this->subject_name = str_replace("'", "''", $subject_name);
        }
        if (isset($id_user) && trim($id_user)) {
            $this->id_user = trim($id_user);
        }
        if (isset($id_subject) && trim($id_subject)) {
            $this->setId_Subject($id_subject);
        }
        if (isset($id_sub_category) && trim($id_sub_category)) {
            $this->setId_sub_category($id_sub_category);
        }
    }

    /*private function setIdUser($id_user) {
        $result = FALSE;
        if (is_numeric($id_user)) {
            $request = Requete::getResultSelect("user", "id_user", "id_user={$id_user}"); // test si user existe
            if ($request) {
                $request = Requete::getResultSelect("waiting_list", "id_user", "id_user={$id_user}"); //test si user est dans la liste d'attente
                if ($request) {
                    $request = Requete::getResultSelect("waiting_list", "id_user", "id_user='{$id_user}' and approval='Validé'"); // test si user est valider
                    if ($request) {
                        $this->id_user = trim($id_user);
                        $result = TRUE;
                    } else {
                        $this->error = "user n'est pas encore valider";
                    }
                } else {
                    $this->id_user = trim($id_user);
                    $result = TRUE;
                }
            } else {
                $this->error = "id_user n'existe pas dans la table user";
            }
        } else {
            $this->error = "$id_user n'est pas un chifre";
        }

        return $result;
    }*/

    public function getIdsub() {
        return $this->id_sub_category;
        ;
    }

    public function getIdSujet() {
        return $this->id_subject;
    }


    private function setId_Subject($id_Subject) {
        $result = FALSE;
        if (is_numeric($id_Subject)) {
            $request = Requete::getResultSelect("subject", "id_subject", "id_subject={$id_Subject}"); // test si sujet existe
            if ($request) {
                $this->id_subject = trim($id_Subject);
                $result = TRUE;
            } else {
                $this->error = "id_Subject n'existe pas dans la table subject";
            }
        } else {
            $this->error = "id_Subject n'est pas un chifre";
        }

        return $result;
    }

    private function setId_sub_category($id_sub_category) {
        $result = FALSE;
        if (is_numeric($id_sub_category)) {
            $request = Requete::getResultSelect("sub_category", "id_category", "id_sub_category={$id_sub_category}"); // test si category existe
            if ($request) {

                $this->id_sub_category = trim($id_sub_category);
                $result = TRUE;
            } else {
                $this->error = "id_sub_category n'existe pas dans la table sub_category";
            }
        } else {
            $this->error = "id_sub_category n'est pas un chifre";
        }

        return $result;
    }

    public function creat_message() {
        $result = FALSE;
        if ($this->content_message && $this->id_subject && $this->id_user) {
            $sql = "INSERT INTO forum_message ( content, id_subject, id_user) VALUES ('" . $this->content_message . "','" . $this->id_subject . "','" . $this->id_user . "')";
            if (Requete::inserte($sql)) {
                $result = TRUE;
            }
        } else {
            $this->error = "manque content_message ou id_subject ou id_user";
        }
        return $result;
    }

    public function creat_subject_and_messag() {
        $rep = FALSE;
        $this->id_subject = NULL;
        if ($this->subject_name && $this->id_sub_category && $this->id_user && $this->content_message) {
            $result = $this->idSujet($this->subject_name);
            echo $result;
            if (!$result) {
                Requete::inser("subject", "subject_name, id_sub_category, id_user", "'{$this->subject_name}', '{$this->id_sub_category}', '{$this->id_user}'");
                $result = $this->idSujet($this->subject_name);
                $this->setId_Subject($result);
                echo $result;
                if ($this->id_subject) {

                    if ($this->creat_message()) {
                        $rep = TRUE;
                    } else {
                        $this->error = "errer d'insertion de message forum";
                    }
                } else {
                    $this->error = "erreur d'insertion de sujet";
                }
            } else {
                $this->error = "sujet deja existant";
            }
        } else {
            $this->error = "manque subject_name ou id_sub_category ou id_user ou content_message";
        }
        return $rep;
    }
    

    /*
     * @param type $subject_name  
     * @return type $result idsujet
     */

    public function idSujet($subject_name) {
        $result = NULL;
        $request = Requete::getResultSelect("subject", "id_subject", "subject_name = {$subject_name}");
        if ($request) {
            $result = $request[0]['id_subject'];
        }

        return $result;
    }

    public function getError() {
        $erreur = NULL ;
        if ($this->error) {
            $erreur = $this->error;
        }
        return $erreur;
    }

}
