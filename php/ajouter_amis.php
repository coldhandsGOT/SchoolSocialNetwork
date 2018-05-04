<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
          <!-- Retour à la page indiquée avec un intervalle de temps de 5sec-->
          <meta http-equiv="refresh" content="0;recherche.php" />
          <title>Ajout en cours...</title>
</head>

<body>
  <?php
  echo "ajout en cours...";
  //on se connecte a la base
  require_once('connexion_BDD.php');

  /*echo $_SESSION["pseudo_amis"];
  echo $_SESSION["email_amis"];*/

  $statement_photo_profil = $conn -> prepare("SELECT photo_profil FROM Users WHERE email ='".$_SESSION["email_amis"]."'");
  $statement_photo_profil -> EXECUTE();
  $photo_profil_amis = $statement_photo_profil -> fetchColumn(0);

  echo $photo_profil_amis;
  /*$statement_ajouter_amis = $conn -> prepare("INSERT INTO `Amis` (`pseudo_amis`, `photo_profil_amis`, `email_amis`, `email_user`) VALUES ('".$_SESSION["pseudo_amis"]."', $photo_profil_amis, '".$_SESSION["email_amis"]."', '".$_SESSION["email"]."')");
  $statement_ajouter_amis -> EXECUTE();*/
  $pseudo_amis=$_SESSION["pseudo_amis"];
  $email_amis=$_SESSION["email_amis"];
  $email_user=$_SESSION["email"];
  //echo $email_user;

  $statement_ajouter_amis = $conn -> prepare("INSERT INTO `Amis` (`pseudo_amis`, `photo_profil_amis`, `email_amis`, `email_user`) VALUES ('".$pseudo_amis."', '".$photo_profil_amis."', '".$email_amis."', '".$email_user."')");
  $statement_ajouter_amis -> EXECUTE();

    ?>

</body>
</html>
