<?php
require_once("ADatabase.php");
class Article extends ADatabase{
    private $titre;
    private $imageTitre;
    private $active;
    private $en_tete;
    private $corps;
    private $id_user;
    private $id_article;

    public function __construct($titre,$active,$en_tete,$corps,$id_user,$image){
        $this->titre=$titre;
        //var_dump($this->titre);
        $this->imageTitre=$image;
        //var_dump($this->imageTitre);
        $this->active=$active;
        //var_dump($this->active);
        $this->en_tete=$en_tete;
        //var_dump($this->en_tete);
        $this->corps=$corps;
        //var_dump($this->corps);
        $this->id_user=$id_user;
        //var_dump($this->id_user);

    }

    public function getIdArticle(){
        return $this->id_article;
    }

    public function ajouterArticleBdd(){
        Article::getBDD();
        $req=Article::$bdd->prepare("INSERT INTO Article SET titre = ?, active = ? , en_tete = ?,imageTitre = ?, corps = ?, id_user= ?");
        $req->execute([$this->titre,$this->active,$this->en_tete,$this->imageTitre,$this->corps,$this->id_user]);
        $req=Article::$bdd->prepare("SELECT id_article FROM Article WHERE id_user = ? ORDER BY id_article DESC");
        $req->execute([$this->id_user]);
        return $req->fetch();

    }

}


?>