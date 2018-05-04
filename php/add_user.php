<!DOCTYPE html>
<html>
<head>
          <!-- Retour à la page indiquée avec un intervalle de temps de 5sec-->
          <meta http-equiv="refresh" content="2;../index.php" />
</head>

<body>
</body>
</html>

<?php

try {
    //on se connecte a la base
    require "connexion_BDD.php";

    //test pour récupérer les données du formulaire
    if (isset($_POST['email'])){
      $email = $_POST['email'];
      //echo $_POST['email'];

      $verif_mail = $conn -> prepare("SELECT email FROM Users WHERE email = '".$_POST['email']."'");
      $verif_mail -> EXECUTE();
      $mail_existant = $verif_mail ->fetchColumn();

      if ($mail_existant == true) {
        echo "Email existé";
      }

    }
    if (isset($_POST['pseudo'])){
      $pseudo = $_POST['pseudo'];
      //echo $pseudo;
    }
    if (isset($_POST['mdp'])){
      $mdp = $_POST['mdp'];
      //echo $mdp;
    }
    if (isset($_POST['civilite'])){
      $civilite = $_POST['civilite'];
      //echo $civilite;
    }
    if (isset($_POST['naissance'])){
      $naissance = strtotime( $_POST['naissance']);
      $naissance = date('Y-m-d',$naissance);
      //echo $naissance;
    }
    if (isset($_POST['description'])){
      $description = $_POST['description'];
      //echo $description;
    }


    //requete pour insérer les données dans la BDD
    $sql = "INSERT INTO Users (email, pseudo, mdp, civilite, date_naissance, description_user)
    VALUES ('$email', '$pseudo', '$mdp', '$civilite', '$naissance', '$description')";
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
