<?php 
    require_once("../models/ADatabase.php");
    require_once('AManage.php');
    $pseudo=$_POST['pseudo'];
    $mdp=$_POST['mdp'];

    if(!empty($pseudo) && !empty($mdp)){
        
        $count=ADatabase::existPseudo("User",$pseudo,$mdp);
        if(!AManage::verifLigne($count)){
            session_start();
            $_SESSION["pseudo"]=$pseudo;
            $_SESSION["mdp"]=$mdp;
            echo "vous etes bien connecté";
        }
    }
?>