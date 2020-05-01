<?php
    require_once("Article.php");
    class imageArticle extends Article{
        private $image; 
        //private $id_article;
        private $id_image;

        public function __construct($titre,$imageTitre,$active,$en_tete,$corps,$id_user,$image){
            parent::__construct($titre,$active,$en_tete,$corps,$id_user,$imageTitre);
            $this->image=$image;
        }
        public function ajouterArticleImageBdd(){
            Article::getBDD();
            $req=parent::$bdd->prepare("INSERT INTO Image SET lien=?");
            $req->execute([$this->image]);
            $req=parent::$bdd->prepare("SELECT id_image FROM Image WHERE lien = ? ORDER BY id_image desc");
            $req->execute([$this->image]);
            $x=$req->fetch();
            $this->id_image=$x['id_image'];
            $req=parent::$bdd->prepare('SELECT id_article FROM Article ORDER BY id_article DESC');
            $req->execute();
            $id_article=$req->fetch();
            $id_article=$id_article['id_article'];
            $req=parent::$bdd->prepare("INSERT INTO POSSEDE SET id_image = ?,id_article  = ?");
            $req->execute([$this->id_image,$id_article]);
        }
    }

?>