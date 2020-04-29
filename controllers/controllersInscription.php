<?php 


require_once("../models/User.php");
require_once("AManage.php");
session_start();
$pseudo=$_POST['pseudo'];
$email=$_POST['email'];
$mdp=$_POST['password'];
$mdp2=$_POST['re_password'];
if(!empty($pseudo) && !empty($email) && !empty($mdp) && !empty($mdp2)){
    $user=new User($pseudo,$email,$mdp);
    if(AManage::verifMDP($mdp,$mdp2)){
        $reqEmail=$user->existEmail("User",$email);
        $reqPseudo=$user->existPseudo("User",$pseudo);
        if(AManage::verifLigne($reqEmail)){
            if(AManage::verifLigne($reqPseudo)){
                $user->inscription();
                echo "Bien inscrits verifié votre mail";
                echo "<a href='../views/inde.php'> Acceuil</a>";
            }else{
                $_SESSION['erreur']="Le pseudo est deja pris";
                header('Location: ../views/colorlib-regform-8/index.php');
            }
        }else{
            $_SESSION['erreur']="Le mail est deja pris";
            header('Location: ../views/colorlib-regform-8/index.php');
        }
    }else{
        $_SESSION['erreur']="Les 2 mots de passe ne sont pas identique";
        header('Location: ../views/colorlib-regform-8/index.php');
    }
}else{     
    $_SESSION['erreur']="Vous avez laissé un champs vide";
    header('Location: ../views/colorlib-regform-8/index.php');
}


?>