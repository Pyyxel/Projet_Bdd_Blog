<?php
    require_once("Article.php");
    class imageArticle extends Article{
        private $image; 

        public function __construct($titre,$imageTitre,$active,$en_tete,$corps,$id_user,$image){
            parent::__construct($titre,$active,$en_tete,$corps,$id_user,$imageTitre);
            $this->image=$image;
        }
        public function ajouterArticleImageBdd(){
            $id_article=parent::ajouterArticleBdd();
            $req=parent::$bdd->prepare("INSERT INTO Image SET lien=?");
            $req->execute([$this->image]);
            $req=parent::$bdd->prepare("SELECT id_image FROM Image WHERE lien = ? ORDER BY id_image desc");
            $req->execute([$this->image]);
            $id_image=$req->fetch();
            $req=parent::$bdd->prepare("INSERT INTO POSSEDE SET id_image = ?,id_article  = ?");
            $req->execute([$id_image['id_image'],$id_article['id_article']]);
        }
    }

?>