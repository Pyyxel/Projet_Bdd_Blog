<?php
require_once("../models/ADatabase.php");
abstract class AManage{
    public function verifMDP($mdp1,$mdp2){
        $bool=false;
        if($mdp1==$mdp2){
            $bool=true;
        }
        return $bool;
    }

    public function compteLigne($requete){
        return $requete->rowCount();
    }

    public function verifLigne($requete){
            $bool=false;
            if(self::compteLigne($requete)==0){
                $bool=true;
            }
            return $bool;
    }

    public function returnArticle(){
        return ADatabase::reqAllArticle();  
    }

    public function ArticleById($id){
        $req=ADatabase::reqAllArticleById($id);
        return $req->fetch();
    }

    public function deconexion(){
        session_start();

        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        echo "Vous êtes maintenant déconnecté";
        echo "<a href='../views/inde.php'> Cliquer ici pour revenir en arrière </a>";
    }

    public function afficherUser(){
        return ADatabase::userIdType();
        
    }

    public function afficherImage($id_article){
        $id_image=ADatabase::selectPossede($id_article);
        $req=ADatabase::selectImage($id_article);
        return $req;
    }

    public function afficherDroitUser($id_type){
        $req=ADatabase::afficherDroitUser($id_type);
        $donnee=$req->fetch();
        $donnee=$donnee['nom'];
        return $donnee;
    }

    public function afficherDroit(){
        return ADatabase::afficherDroit();
    }

    public function Active($active){
        $bool = false;
        if($active==1){
            $bool = true;
        }
        return $bool;
    }
}

?>