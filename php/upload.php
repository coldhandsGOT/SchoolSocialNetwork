<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  
</head>
</html>


<?php
require_once("connexion_BDD.php");



$file = basename($_FILES['avatar']['name']);
$taille_maxi = 1000000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.avi', '.mp4');
$extension = strrchr($_FILES['avatar']['name'], '.');


$folder = "upload/".$_SESSION["email"]."/";
     if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }


//accept media files only from array
if(!in_array($extension, $extensions)) 
{
     $erreur = 'Extension refusée';
}
if($taille>$taille_maxi)
{
     $erreur = 'Are you carrying a brahemian or a backpacK?';
}

if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $file = strtr($file,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $folder . $file)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';

          $_SESSION["chemin"]=$folder.$_FILES['avatar']['name']; 

  echo  $_SESSION["chemin"];
 
          $_SESSION["description_media"] = $_POST["Description"];
          $_SESSION["confidentialite"]=$_POST["confidentialite"];



          /*$statement = $conn -> prepare("INSERT INTO `Media` (`chemin`, `email_user`, `date`, `description_media`, `confidentialite`, `liker`, `lover`, `detester`, `rire`) VALUES ('a', 'a', '2017-04-05', 'z', '0', '0', '0', '0', '0');");
          $statement -> EXECUTE();*/
          $sql = "INSERT INTO `Media` (`chemin`, `email_user`,  `description_media`, `confidentialite`, `liker`, `lover`, `detester`, `rire`)
                  VALUES ('".$_SESSION["chemin"]."', '".$_SESSION["email"]."', '".$_SESSION["description_media"]."', '".$_SESSION["confidentialite"]."', '0', '0', '0', '0')";
          $conn->query($sql);




     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}






?>
