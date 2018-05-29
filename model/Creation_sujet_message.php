<?php

include_once('../DAOSingleton/Requete.php');

class Creation_sujet_message {

    private $subject_name;
    private $id_sub_category;
    private $id_user;
    private $content_message;
    private $id_subject;
    private $error;

    function __construct($id_user, $content_message, $id_subject = "", $subject_name = "", $id_sub_category = "") {

        $this->id_user = $id_user;
        $this->content_message = str_replace("'", "''", $content_message);
        $this->id_subject = $id_subject;
        if ($subject_name && $id_sub_category) {
            $this->subject_name = str_replace("'", "''", $subject_name);
            $this->id_sub_category = $id_sub_category;
        }
    }

    private function setId_Subject($id_Subject) {
        $res = FALSE;
        
        if ($this->idSujet($id_Subject)) {
            $this->id_subject = $this->idSujet($id_Subject);
            $res = TRUE;
        }
        return $res;
    }

    private function setId_sub_category($id_sub_category) {
        
    }

    function creat_message() {
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

    function creat_sub_messag() {
        $rep = FALSE;
        if ($this->subject_name && $this->id_sub_category && $this->id_user && $this->content_message) {
            $result = $this->idSujet($this->subject_name);
            if (!$result) {
                Requete::inser("subject", "subject_name, id_sub_category, id_user", "'{$this->subject_name}', '{$this->id_sub_category}', '{$this->id_user}'");
                $this->id_subject = $this->idSujet($this->subject_name);
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
    }

    function idSujet($subject_name) {
        $result = Requete::getResultSelect("subject", "id_subject", "subject_name = {$subject_name} ");
        return $result[0]['id_subject'];
    }

}
