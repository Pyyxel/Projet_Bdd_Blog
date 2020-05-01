<?php
    session_start();
    require_once("../models/Article.php");
    require_once("../models/imageArticle.php");
    require_once("../controllers/AManage.php");
    if(isset($_SESSION['nbPhoto'])){
        if(empty($_POST['active'])){
            $active=0;
        }else{
            $active=1;
        }
        $titre=$_POST['titre'];
        $imageTitre=$_POST['imageTitre'];
        $entete=$_POST['entete'];
        
        $corps=$_POST['corps'];
       
        $id_user=$_SESSION['id_user'];
        
    
    
        if($_SESSION['nbPhoto']>0){
            if(!empty($titre) && !empty($imageTitre) && !empty($entete) && !empty($corps)){
                if(AManage::active($active)){
                    $article=new Article($titre,$active,$entete,$corps,$id_user,$imageTitre);
                    $article->ajouterArticleBdd();
                    for($i=0;$i<$_SESSION['nbPhoto'];$i++){
                        $imageArticle=new imageArticle($titre,$imageTitre,$active,$entete,$corps,$id_user,$_POST["imageArticle$i"]);
                        $imageArticle->ajouterArticleImageBdd();
                    }
                    $_SESSION['erreur']="L'article avec image a bien été ajouté et sera afficher";
                        //header('Location: ../views/admin.php');
                        unset($_SESSION['nbPhoto']);
                    
                }else{
                    $active=0;
                    $article=new Article($titre,$active,$entete,$corps,$id_user,$imageTitre);
                    $article->ajouterArticleBdd();
                    for($i=0;$i<$_SESSION['nbPhoto'];$i++){
                        $imageArticle=new imageArticle($titre,$imageTitre,$active,$entete,$corps,$id_user,$_POST["imageArticle$i"]);
                        $imageArticle->ajouterArticleImageBdd();
                    }
                    $_SESSION['erreur']="L'article avec image a bien été ajouté et mais ne sera pas afficher";
                    header('Location: ../views/admin.php');
                    unset($_SESSION['nbPhoto']);
                }
            }else{
                $_SESSION['erreur']="un champ a mal été remplis";
                header('Location: ../views/admin.php');
            }
        }else{
            if(!empty($titre) && !empty($imageTitre) && !empty($entete) && !empty($corps)){
                if(AManage::active($active)){
                    $article=new Article($titre,$active,$entete,$corps,$id_user,$imageTitre);
                    $article->ajouterArticleBdd();
                    $_SESSION['erreur']="L'article sans image a bien été ajouté et sera afficher";
                    header('Location: ../views/admin.php');
                }else{
                    $active=0;
                    $article=new Article($titre,$active,$entete,$corps,$id_user,$imageTitre);
                    $article->ajouterArticleBdd();
                    $_SESSION['erreur']="L'article sans image a bien été ajouté et sera afficher";
                    header('Location: ../views/admin.php');
                }
            }else{
                $_SESSION['erreur']="un champ a mal été remplis";
                header('Location: ../views/admin.php');
            }
        }
    }else{
        $_SESSION['nbPhoto']=$_POST['nbPhoto'];
        header('Location: ../views/admin.php');
    }
    


?>