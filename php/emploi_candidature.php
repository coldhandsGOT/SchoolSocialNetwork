<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="refresh" content="0;emploi.php" />  

</head>
</html>

<?php
//on se connecte à la base de donnees
require_once ('connexion_BDD.php');


$name_candid=$_POST["name_candid"];
$lastname_candid=$_POST["lastname_candid"];
$mail_candid=$_POST["mail_candid"];
$tel_candid=$_POST["tel_candid"];
$poste_candid=$_POST["poste_candid"];
$message_candid=$_POST["message_candid"];



// backend upload photo :))))  2 heures de code non stop :(

   $cv_candid = $_FILES['cv_candid'];
    

  
              $namefolder = $cv_candid['name'];

              $folder = "../uploads/candidature/".$_SESSION["mail_candid"]."/";
				if (!file_exists($folder)) {
				    mkdir($folder, 0777, true);
				}
 
              $path = $folder . basename($namefolder); echo $path;
              move_uploaded_file($cv_candid['tmp_name'], $path);
              

		      $sql66 = "UPDATE `emploi_candidature` SET `cv`='$path' ";
		      
              $conn -> query($sql66);
              $_SESSION['cv_candid']=$cv_candid;
            
           


if (empty($name_candid)) {
  $name_candid=$_SESSION["name_candid"];
}else {
  $sql = "UPDATE `emploi_candidature` SET `name`='$name_candid'";
  $conn -> query($sql);
  $_SESSION['name_candid']=$name_candid;
}

if (empty($lastname_candid)) {
  $lastname_candid=$_SESSION["lastname_candid"];
}else {
  $sql = "UPDATE `emploi_candidature` SET `lastname`='$lastname_candid'";
  $conn -> query($sql);
  $_SESSION['lastname_candid']=$name_candid;
}



 if (empty($mail_candid)) {
  $mail_candid=$_SESSION["mail_candid"];
}else {
  $sql = "UPDATE `emploi_candidature` SET `email`='$mail_candid'";
  $conn -> query($sql);
  $_SESSION['mail_candid']=$mail_candid;
}
 


 if (empty($tel_candid)) {
  $tel_candid=$_SESSION["tel_candid"];
}else {
  $sql = "UPDATE `emploi_candidature` SET `tel`='$tel_candid'";
  $conn -> query($sql);
  $_SESSION['tel_candid']=$tel_candid;
}



 
 if (empty($poste_candid)) {
  $poste_candid=$_SESSION["poste_candid"];
}else {
  $sql = "UPDATE `emploi_candidature` SET `poste`='$poste_candid'";
  $conn -> query($sql);
  $_SESSION['poste_candid']=$poste_candid;
}

 if (empty($message_candid)) {
  $message_candid=$_SESSION["message_candid"];
}else {
  $sql = "UPDATE `emploi_candidature` SET `message`='$message_candid'";
  $conn -> query($sql);
  $_SESSION['message_candid']=$message_candid;
}


   //requete pour insérer les données dans la BDD
    $sql = "INSERT INTO emploi_candidature (name, lastname, email, tel, poste, message, cv)
    VALUES ('$name_candid','$lastname_candid', '$mail_candid', '$tel_candid', '$poste_candid', '$message_candid', '$path')";
    $conn-> exec($sql);
  



 /*
 if (empty($lastname_candid)) {
  $lastname_candid=$_SESSION["pseudo"];
}else {
  $sql = "UPDATE `Users` SET `pseudo`='$lastname_candid' WHERE `email`='".$_SESSION['email']."'";
  $conn -> query($sql);
  $_SESSION['pseudo']=$lastname_candid;
}
*/
              


    
?>