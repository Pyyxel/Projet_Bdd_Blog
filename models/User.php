<?php
require_once("ADatabase.php");
class User extends ADatabase{

    private $pseudo;
    private $email;
    private $mdp;
    private $token;
    private $active;
    private $id_type_user;
    private $id_user;

    public function __construct($pseudo,$email,$mdp){
        $this->pseudo=$pseudo;
        $this->email=$email;
        $this->mdp=$mdp;
        
    }
    public function conexion($token,$active,$id_type_user,$id_user){
        $this->token=$token;
        $this->active=$active;
        $this->id_type_user=$id_type_user;
        $this->id_user=$id_user;
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
    public function getIdType(){
        return $this->id_type_user;
    }
    public function getActive(){
        return $this->active;
    }

    public function getIdUser(){
        return $this->id_user;
    }
    
    public function inscription(){
        $req=User::$bdd->prepare("INSERT INTO User SET pseudo = ?, email = ? , mdp = ?, token = ?, id_type= 2");
        $this->setToken();
        $req->execute([$this->pseudo,$this->email,$this->mdp,$this->token]);
    }
}


?>