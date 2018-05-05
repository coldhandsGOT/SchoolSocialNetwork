<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
          <!-- redirect to home page-->
          <meta http-equiv="refresh" content="0;chronologie.php" />
</head>
</html>

<?php

    //on se connecte a la base
    require_once('connexion_BDD.php');

    //recuperer le login et le mot de passe
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    //verifier si l'email et le mot de passe sont remplis
    if(empty($email) || empty($mdp)) {
      echo "Entrer votre email et/ou votre mot de passe";
    }
    //executer les codes suivants si les champs sont remplis
    else {
      try{
        //vérifier si le email et le mot de passe sont corrects.
        $statement = $conn -> prepare("SELECT email, mdp FROM Users WHERE email ='".$email."' and mdp = '".$mdp."'");
        $statement -> bindParam('".$email"', $email,PDO::PARAM_STR);
        $statement -> bindParam('".$mdp"', $mdp,PDO::PARAM_STR);

        //executer la requete preparée.
        $statement -> EXECUTE();
        $em = $statement -> fetchColumn();

        //vérifier si l'identification est correcte.
        if ($em == true){

          //recuperer les données du User de la BDD
          $statement_pseudo = $conn -> prepare("SELECT pseudo FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_pseudo -> EXECUTE();
          $pseudo = $statement_pseudo -> fetchColumn();


           $statement_name = $conn -> prepare("SELECT name FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_name -> EXECUTE();
          $name = $statement_name -> fetchColumn(0);


          $statement_lastname = $conn -> prepare("SELECT lastname FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_lastname -> EXECUTE();
          $lastname = $statement_lastname -> fetchColumn(0);
         

          $statement_civilite = $conn -> prepare("SELECT civilite FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_civilite -> EXECUTE();
          $civilite = $statement_civilite -> fetchColumn(0);

          $statement_naissance = $conn -> prepare("SELECT naissance FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_naissance -> EXECUTE();
          $naissance = $statement_naissance -> fetchColumn(0);

          $statement_profile_pic = $conn -> prepare("SELECT profile_pic FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_profile_pic -> EXECUTE();
          $photo_profil = $statement_profile_pic -> fetchColumn(0);

          $statement_image_fond = $conn -> prepare("SELECT image_fond FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_image_fond -> EXECUTE();
          $image_fond = $statement_image_fond -> fetchColumn(0);

          $statement_description_user = $conn -> prepare("SELECT description_user FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_description_user -> EXECUTE();
          $description_user = $statement_description_user -> fetchColumn(0);

          $statement_admin = $conn -> prepare("SELECT Admin FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_admin -> EXECUTE();
          $admin = $statement_admin -> fetchColumn(0);




          $statement_phone = $conn -> prepare("SELECT phone FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_phone -> EXECUTE();
          $phone = $statement_phone -> fetchColumn(0);

          $statement_location = $conn -> prepare("SELECT location FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_location -> EXECUTE();
          $location = $statement_location -> fetchColumn(0);

          $statement_about = $conn -> prepare("SELECT about FROM Users WHERE email ='".$email."' AND mdp = '".$mdp."'");
          $statement_about -> EXECUTE();
          $about = $statement_about -> fetchColumn(0);





          //enregistrer les données de l'Users dans la session.
          $_SESSION["email"] = $email;
          $_SESSION["mdp"] = $mdp;
          $_SESSION["pseudo"] = $pseudo;  
          $_SESSION["civilite"] = $civilite;
          $_SESSION["naissance"] = $naissance;
          $_SESSION["profile_pic"] = $photo_profil;
          $_SESSION["image_fond"] = $image_fond;
          $_SESSION["description_user"] = $description_user;
          $_SESSION["Admin"] = $admin;
          $_SESSION["phone"] = $phone;
          $_SESSION["location"] = $location;
          $_SESSION["about"] = $about;


        } 
        else //si l'identification est echouée.
        { 
          echo "E-email ou mot de passe incorrect(s)";
        }
      }catch (Exception $e){
          echo "".$e->getMessage();
      }
    }

    $conn = null;

?>
