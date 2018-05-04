<!DOCTYPE html>
<html>
<head>
          <!-- Retour à la page indiquée avec un intervalle de temps de 5sec-->
          <meta http-equiv="refresh" content="0;chronologie.php" />
</head>

<body>
</body>
</html>
<?php
session_start();
require "connexion_BDD.php";
$chemin_photo = $_GET["chemin_photo"];
/*echo $_SESSION["email"];
echo $chemin_photo;*/
$sql = $conn -> prepare("INSERT INTO `Albums` (`titre_album`, `email_user`, `chemin_photo`, `ID_photo`) VALUES ('album', '".$_SESSION["email"]."', '$chemin_photo', NULL)");
$sql -> EXECUTE();



 ?>
