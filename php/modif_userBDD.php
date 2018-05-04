<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
          <meta http-equiv="refresh" content="0;user.php" />
</head>
</html>

<?php
//on se connecte à la base de donnees
require_once ('connexion_BDD.php');
$pseudo_modif=$_POST["pseudo_modif"];
$date_modif=$_POST["date_modif"];
$civilite_modif=$_POST["civilite_modif"];
$description_modif=$_POST["description_modif"];
echo $pseudo_modif;

if (empty($pseudo_modif)) {
  $pseudo_modif=$_SESSION["pseudo"];
}else {
  $sql = "UPDATE `Users` SET `pseudo`='$pseudo_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql);
  $_SESSION['pseudo']=$pseudo_modif;
}

if (empty($date_modif)) {
  $date_modif=$_SESSION["date"];
}else {
  $sql3 = "UPDATE `Users` SET `date`='$date_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql3);
  $_SESSION['date']=$date_modif;
}

if (empty($civilite_modif)) {
  $civilite_modif=$_SESSION["civilite"];
}else {
  $sql2 = "UPDATE `Users` SET `civilite`='$civilite_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql2);
  $_SESSION['civilite']=$civilite_modif;
}

if (empty($description_modif)) {
  $description_modif=$_SESSION["description"];
}else {
  $sql4 = "UPDATE `Users` SET `description_user`='$description_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql4);
  $_SESSION['description_user']=$description_modif;
}

?>
