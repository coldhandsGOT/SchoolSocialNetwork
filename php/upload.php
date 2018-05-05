<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="0;chronologie.php" />
</head>
</html>


<?php
require_once("connexion_BDD.php");

$dossier = "upload/".$_SESSION["email"]."/";
mkdir($dossier, 0777);
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 1000000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.avi', '.mp4');
$extension = strrchr($_FILES['avatar']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, avi, mp4, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';

          $_SESSION["chemin"]=$dossier.$_FILES['avatar']['name'];
          $_SESSION["date"]=$_POST["date_poste"];
          $_SESSION["description_media"]=$_POST["Description"];
          $_SESSION["confidentialite"]=$_POST["confidentialite"];


          /*//test des données stockées
          echo $_SESSION["date"];
          echo "<br />";
          echo $_SESSION["chemin"];
          echo "<br />";
          echo $_SESSION["description_media"];
          echo "<br />";
          echo $_SESSION["confidentialite"];*/

          /*$statement = $conn -> prepare("INSERT INTO `Media` (`chemin`, `email_user`, `date`, `description_media`, `confidentialite`, `liker`, `lover`, `detester`, `rire`) VALUES ('a', 'a', '2017-04-05', 'z', '0', '0', '0', '0', '0');");
          $statement -> EXECUTE();*/
          $sql = "INSERT INTO `Media` (`chemin`, `email_user`, `date`, `description_media`, `confidentialite`, `liker`, `lover`, `detester`, `rire`)
                  VALUES ('".$_SESSION["chemin"]."', '".$_SESSION["email"]."', '".$_SESSION["date"]."', '".$_SESSION["description_media"]."', '".$_SESSION["confidentialite"]."', '0', '0', '0', '0')";
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
