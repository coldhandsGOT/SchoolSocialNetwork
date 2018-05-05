<?php session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
</head>

<body>
  <?php
  
  require_once('connexion_BDD.php');


  echo $_SESSION["user_one_id"];

  /*echo $_SESSION["pseudo_amis"];
  echo $_SESSION["email_amis"];*/

  // $statement_photo_profil = $conn -> prepare("SELECT photo_profil FROM Users WHERE email ='".$_SESSION["email_amis"]."'");
  // $statement_photo_profil -> EXECUTE();
  // $photo_profil_amis = $statement_photo_profil -> fetchColumn(0);

  // echo $photo_profil_amis;
  /*$statement_ajouter_amis = $conn -> prepare("INSERT INTO `Amis` (`pseudo_amis`, `photo_profil_amis`, `email_amis`, `email_user`) VALUES ('".$_SESSION["pseudo_amis"]."', $photo_profil_amis, '".$_SESSION["email_amis"]."', '".$_SESSION["email"]."')");
  $statement_ajouter_amis -> EXECUTE();*/
  // $pseudo_amis=$_SESSION["pseudo_amis"];
  // $email_amis=$_SESSION["email_amis"];
  // $email_user=$_SESSION["email"];
  // //echo $email_user;

  // $statement_ajouter_amis = $conn -> prepare("INSERT INTO `Amis` (`pseudo_amis`, `photo_profil_amis`, `email_amis`, `email_user`) VALUES ('".$pseudo_amis."', '".$photo_profil_amis."', '".$email_amis."', '".$email_user."')");
  // $statement_ajouter_amis -> EXECUTE();

    ?>

</body>
</html>
