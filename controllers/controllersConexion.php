<?php 
    require_once("../models/ADatabase.php");
    require_once("../models/User.php");
    require_once('AManage.php');
    session_start();
    $pseudo=$_POST['pseudo'];
    $mdp=$_POST['mdp'];

    if(!empty($pseudo) && !empty($mdp)){
        $req=ADatabase::existPseudo("User",$pseudo,$mdp);
        $donnees=$req->fetch();
        if(!AManage::verifLigne($req)){
            $user=new User($donnees['pseudo'],$donnees['email'],$donnees['mdp']);
            $user->conexion($donnees['token'],$donnees['activate'],$donnees['id_type'],$donnees['id_user']);
            if($user->getActive()==1){
          
                $_SESSION['erreur']="Vous etes conecté";
                $_SESSION["pseudo"]=$user->getPseudo();
                
                $_SESSION["id_user"]=$user->getIdUser();
                $_SESSION["id_type"]=$user->getIdType();
                header('Location: ../views/inde.php');
            }else{
               
                $_SESSION['erreur']="Veuillez valider votre adresse mail";
                header('Location: ../views/colorlib-regform-8/conexion.php');

            }
        }else{
    
            $_SESSION['erreur']="Erreur lors du pseudo ou du mot de passe";
            header('Location: ../views/colorlib-regform-8/conexion.php');
        }
    }
?>