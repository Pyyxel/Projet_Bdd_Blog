<?php
    session_start();
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="../../controllers/controllersConexion.php" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Conexion</h2>
                        <?php
                            if(isset($_SESSION['erreur'])){
                                echo '<p>'.$_SESSION['erreur'].'</p>';
                                unset($_SESSION['erreur']);
                            }
                        ?>




                        <div class="form-group">
                            <input type="text" class="form-input" name="pseudo" id="name" placeholder="Pseudo"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="mdp" id="re_password" placeholder="Mot de passe"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>