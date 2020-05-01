<?php 

abstract class ADatabase {
    private static $_host="localhost";
    private static $_dbname="Projet_BDD_Blog";
    private static $_username="root";
    private static $_password="";
    protected static $bdd;
    // Créer l'object à partir du constructeur
    private static function setBDD(){
        self::$bdd = new PDO('mysql:host='.self::$_host.'; dbname='.self::$_dbname, self::$_username, self::$_password);
        self::$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    

    public function getBDD(){
        if(self::$bdd==null){
            self::setBDD();
        }
        return self::$bdd;
    }

    public function existEmail($nametable,$email){ 
        self::setBDD();
        $req=self::$bdd->prepare("SELECT * FROM $nametable WHERE email= ?");
        $req->execute([$email]);
        return $req;
    }

    public function existPseudo($nametable,$pseudo){   
        self::setBDD();
        $req=self::$bdd->prepare("SELECT * FROM $nametable WHERE pseudo= ?");
        $req->execute([$pseudo]);
        return $req;
    }


    public function existPseudoMdp($nametable,$pseudo,$mdp){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT * FROM $nametable WHERE pseudo = ? AND mdp = ?");
        $req->execute([$pseudo,$mdp]);
        return $req;
    }

    public function rechercheToken($nametable,$token){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT * FROM $nametable WHERE token = ?");
        $req->execute([$token]);
        return $req;
    }

    public function activToken($token){
        self::setBDD();
        $req=self::$bdd->prepare('UPDATE User SET activate = ? WHERE token = ?');
        $req->execute([1,$token]);
        return $req;
    }

    public function reqAllArticle(){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT * FROM Article WHERE active=1");
        $req->execute();
        return $req;
    }


    public function reqAllArticleById($id){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT * FROM Article WHERE id_article=?");
        $req->execute([$id]);
        return $req;
    }

    public function userIdType(){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT pseudo,id_type,id_user FROM User WHERE activate = ?");
        $req->execute([1]);
        return $req;

    }

    public function afficherDroitUser($id_type){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT nom FROM Type_user WHERE id_type = ?");
        $req->execute([$id_type]);
        return $req;

    }
    public function afficherDroit(){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT nom FROM Type_user");
        $req->execute();
        return $req;
    }

    public function selectPossede($id){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT id_image FROM POSSEDE WHERE id_article= ?");
        $req->execute([$id]);
        return $req;
    }

    public function selectLien($id){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT lien from Image WHERE id_image= ?");
        $req->execute([$id]);
        return $req->fetch();
    }

    public function selectImage($id){
        self::setBDD();
        $req=self::$bdd->prepare("SELECT lien FROM Image WHERE id_image=?");
        $req->execute([$id]);
        return $req;
    }

    
}
?>