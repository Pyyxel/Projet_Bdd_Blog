<?php
    require_once("../models/ADatabase.php");
    require_once('AManage.php');
    $token=$_GET['token'];
    if (!empty($token)){
        
        $req=ADatabase::rechercheToken("User",$token);
        if(!AManage::verifLigne($req)){
            ADatabase::activToken($token);
            echo "le mail a bien été activé";
        }
    }
    
    
?>