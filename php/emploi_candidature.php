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


$name=$_POST["name"];
$mail=$_POST["mail"];
$tel=$_POST["tel"];
$poste=$_POST["poste"];
$message=$_POST["message"];



// backend upload photo :))))  2 heures de code non stop :(

   $cv = $_FILES['cv'];
    
       
  
              $namefolder = $cv['name'];
              $folder = "../CV/candidature".$_SESSION["name"]."/";
               mkdir($folder, 0700);

              $path = $folder . basename($namefolder);
              move_uploaded_file($cv['tmp_name'], $path);

              $sql66 = "INSERT INTO `emploi_candidature` VALUES ('".$name."', '".$mail."', '".$tel."', '".$poste."', '$path', '".$message."')";

                            $conn -> query($sql66);
               


 

              


    
?>