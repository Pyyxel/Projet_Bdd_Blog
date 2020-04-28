<?php 


require_once("../models/User.php");
require_once("AManage.php");

$pseudo=$_POST['pseudo'];
$email=$_POST['email'];
$mdp=$_POST['password'];
$mdp2=$_POST['re_password'];
if(!empty($pseudo) && !empty($email) && !empty($mdp) && !empty($mdp2)){
    $user=new User($pseudo,$email,$mdp);
    if(AManage::verifMDP($mdp,$mdp2)){
        
        $reqEmail=$user->existEmail("User",$email);
        $reqPseudo=$user->existPseudo("User",$pseudo);
        if(AManage::verifLigne($reqEmail) && AManage::verifLigne($reqPseudo)){
            $user->inscription();
        }
    }
}


?>