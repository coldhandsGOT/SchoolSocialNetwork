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
$location_modif=$_POST["location_modif"];
$phone_modif=$_POST["phone_modif"];
$about_modif=$_POST["about_modif"];

echo $pseudo_modif;



if (empty($pseudo_modif)) {
  $pseudo_modif=$_SESSION["pseudo"];
}else {
  $sql = "UPDATE `Users` SET `pseudo`='$pseudo_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql);
  $_SESSION['pseudo']=$pseudo_modif;
}


if (empty($date_modif)) {
  $date_modif=$_SESSION["naissance"];
}else {
  $sql3 = "UPDATE `Users` SET `naissance`='$date_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql3);
  $_SESSION['naissance']=$date_modif;
}


if (empty($location_modif)) {
  $location_modif=$_SESSION["location"];
}else {
  $sql3 = "UPDATE `Users` SET `location`='$location_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql3);
  $_SESSION['location']=$location_modif;
}




if (empty($phone_modif)) {
  $phone_modif=$_SESSION["phone"];
}else {
  $sql3 = "UPDATE `Users` SET `phone`='$phone_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql3);
  $_SESSION['phone']=$phone_modif;
}




if (empty($about_modif)) {
  $about_modif=$_SESSION["about"];
}else {
  $sql4 = "UPDATE `Users` SET `about`='$about_modif' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql4);
  $_SESSION['about']=$about_modif;
}

?>
