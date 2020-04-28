<?php
require_once("ADatabase.php");
class User extends ADatabase{
    private $pseudo;
    private $email;
    private $mdp;
    private $token;
    private $id_type_user;

    public function __construct($pseudo,$email,$mdp){
        $this->pseudo=$pseudo;
        $this->email=$email;
        $this->mdp=$mdp;
    }

    public function setToken(){
        $this->token=substr(str_shuffle(str_repeat("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN", 40)), 0, 40);
    }

    public function setIdTypeUser($x){
        $this->id_type_user=$x;
    }

    public function getMdp(){
        return $this->mdp;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPseudo(){
        return $this->pseudo;
    }

    
    public function inscription(){
        $req=User::$bdd->prepare("INSERT INTO User SET pseudo = ?, email = ? , mdp = ?, token = ?, id_type= 2");
        $this->setToken();
        $req->execute([$this->pseudo,$this->email,$this->mdp,$this->token]);
    }
}


?>