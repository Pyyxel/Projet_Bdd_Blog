<?php
    session_start();
    require_once("../controllers/AManage.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="colorlib-regform-8/css/style.css">
</head>

<body>


    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
                <form action="../../controllers/controllersInscription.php" method="POST" id="signup-form"
                    class="signup-form">
                    <h2 class="form-title">changer les droits utilisateurs</h2>

                    <div class="form-group">
                        <select name="iduser" tabindex="8" require>

                        <?php 
                                $req=AManage::afficherUser();
                            while ($donnees=$req->fetch()){
                        ?>

                            <option value="<?= $donnees['id_user']; ?>"> Pseudo : <?= $donnees['pseudo']; ?>
                                <?= "   Droit : ".AManage::afficherDroitUser($donnees['id_type']); ?> </option>

                        <?php
                            }
                        ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <select name="id_type" tabindex="8" require>

                        <?php 
                                $req=AManage::afficherDroit();
                                while ($donnees=$req->fetch()){
                        ?>

                            <option value="<?= $donnees['id_type']; ?>"> droit : <?= $donnees['nom']; ?></option>

                        <?php
                            }
                        ?>
                        </select>
                    </div>  
                   
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Changer les droits" />
                    </div>
                </form>
                
            </div>
        </div>
    </section>

    <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="../controllers/controllersAjoutArticle.php" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Ajout article</h2>
                        <?php 
                            if(isset($_SESSION['erreur'])){
                                echo '<p>'.$_SESSION['erreur'].'<p>';
                                unset($_SESSION['erreur']);
                            }
                        ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="titre" id="titre" placeholder="titre"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="imageTitre" id="email" placeholder="Url de l'image du titre de l'article "/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="entete" id="password" placeholder="Entete"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="imageArticle" id="email" placeholder="Url de l'image du titre de l'article "/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="corps" id="email" placeholder="corps"/>
                        </div>
                        <div class="form-group">
                            <input value="1" type="checkbox" name="active" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Afficher ou non l'article</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="ajouter un article"/>
                        </div>
                    </form>
                   
                </div>
            </div>
        </section>
        
        
</body>

</html>