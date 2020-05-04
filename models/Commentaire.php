<?php
    require_once("ADatabase.php");
    class Commentaire extends ADatabase{

        private $message;
        private $id_article;
        private $id_user;

        public function __construct($message,$id_article,$id_user){
            $this->message=$message;
            $this->id_article=$id_article;
            $this->id_user=$id_user;
        }

        public function ajouterCommentaire(){
            Commentaire::getBDD();
            $req=Commentaire::$bdd->prepare("INSERT INTO Commentaire SET message = ?,id_article = ?, id_user = ?");
            $req->execute($this->message,$this->id_article,$this->id_user);
        }


    }
?>