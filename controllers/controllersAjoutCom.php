<?php
require_once('../models/Commentaire.php');
$id_article=$_GET['id'];
$message=$_POST['message'];
$id_user=$_SESSION['id_user'];

if(isset($message)){
    $com=new Commentaire($message,$id_article,$id_user);
}

?>