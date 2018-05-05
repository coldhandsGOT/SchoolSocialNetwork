<!DOCTYPE html>
<html>
<head>
          <!-- Retour à la page indiquée avec un intervalle de temps de 5sec-->
          <meta http-equiv="refresh" content="2;user.php" />
</head>

<body>
</body>
</html>

<?php

try {
    //connection à la bdd
    require "connexion_BDD.php";

    //try catch pour l'insertion dans la bdd
    if (isset($_POST['email']))
    {
      $email = $_POST['email'];

      $verif_mail = $conn -> prepare("SELECT email FROM Users WHERE email = '".$_POST['email']."'");
      $verif_mail -> EXECUTE();
      $mail_existant = $verif_mail ->fetchColumn();

      if ($mail_existant == true) {
        echo "Email existé";
      }
    }


    if (isset($_POST['name'])){
      $name = $_POST['name'];
    }

    if (isset($_POST['lastname'])){
      $lastname = $_POST['lastname'];
    }

     if (isset($_POST['pseudo'])){
      $pseudo = $_POST['pseudo'];
    }

    if (isset($_POST['mdp'])){
      $mdp = $_POST['mdp'];
    }
    if (isset($_POST['civilite'])){
      $civilite = $_POST['civilite'];
    }
    if (isset($_POST['naissance'])){
      $naissance = strtotime( $_POST['naissance']);
      $naissance = date('Y-m-d',$naissance);
    }

   
  


    //requete pour insérer les données dans la BDD
    $sql = "INSERT INTO Users (email, pseudo, mdp, name, lastname,  civilite, naissance)
    VALUES ('$email', '$pseudo', '$mdp', '$name', '$lastname',  '$civilite', '$naissance')";
    $conn-> exec($sql);
    echo "En cours d'inscription";

    /*$titre_albumdefaut = "Default Album";

    $album_defaut = $conn -> prepare("INSERT INTO Album ( album_defaut, Nom_album, Utilisateur_Mail )
    VALUES ('1', '".$titre_albumdefaut."', '".$_POST["email"]."')" );
    $album_defaut -> EXECUTE();

    $dossier_nom = $_POST['email'];
    $target_dir = "data1/";
    $dossier = $target_dir . $dossier_nom . "/";
    $dossier_image1 = $dossier . "image1/";
    $dossier_tooltips = $dossier . "tooltips/";

    if (!is_dir($dossier)) {
      mkdir($dossier);
    }

    if (!is_dir($dossier_image1)) {
      mkdir($dossier_image1);
    }

    if (!is_dir($dossier_tooltips)) {
      mkdir($dossier_tooltips);
    }*/

  }

catch(PDOException $e)
    {
    echo $sql . "<br><br>Inscription echouée" . $e->getMessage();
    }

$conn = null;

?>
