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
}

?>