<?php
session_start();
$connexion = mysqli_connect ('localhost', 'root','', 'blogue' );
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
     }
// echo $_SESSION['user_id'];
if(!empty($_SESSION['user_id'])){
$sessionUserId = $_SESSION['user_id'];
$selection="SELECT * FROM users WHERE id='$sessionUserId' ";

 $query=mysqli_query ($connexion,$selection);

 $recuperation=mysqli_fetch_assoc($query);
 if($recuperation){
    unset($_SESSION['user_id']);
    header ('LOCATION:../connexion.php');
    // var_dump($recuperation);
 }else{
    die("utilisateur inconnu");
 }
}else{
    header('LOCATION:../../connexion.php');
}

?>