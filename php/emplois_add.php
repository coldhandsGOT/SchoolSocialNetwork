<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
     <!--  <meta http-equiv="refresh" content="0;emploi.php" />    -->
    

</head>
</html>

<?php

 require "connexion_BDD.php";

  //try catch pour l'insertion dans la bdd
    if (isset($_POST['id']))
    {
      $id = $_POST['id'];

      $id_offer = $conn -> prepare("SELECT id FROM emploi_offres WHERE id = '".$_POST['id']."'");
      $id_offer -> EXECUTE();
      $id_existing = $id_offer ->fetchColumn();

      if ($id_existing == true) {
        echo "Id does exist, can't insert";
      }
    }

// module d'insertion pour les recruteurs



if (isset($_POST['poste'])){
      $poste_offer = $_POST['poste'];
    }

if (isset($_POST['entreprise'])){
      $entreprise_offer = $_POST['entreprise'];
    }

if (isset($_POST['address'])){
      $address_offer = $_POST['address'];
    }

if (isset($_POST['email'])){
      $email_offer = $_POST['email'];
    }

if (isset($_POST['contenu'])){
      $contenu_offer = $_POST['contenu'];
    }
    if (isset($_POST['speciality'])){
      $speciality_offer = $_POST['speciality'];
    }


    //requete pour insérer les données dans la BDD
    $query = $conn->prepare("INSERT INTO Users (id, speciality, poste, entreprise, address, email,  contenu)
                                  VALUES ('$id_offer',  '$speciality_offer', '$poste_offer', '$entreprise_offer', '$address_offer', '$email_offer',  '$contenu_offer')");
    $query->execute();
    echo "updated!";
    
    //SI == system info
    //BD  == Big Data
    //F  == finance
    //
/*
 $result = $conn->prepare("SELECT * FROM emploi_offres WHERE (`poste` LIKE '%".$query."%') OR (`entreprise` LIKE '%".$query."%') OR (`address` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%') "); 

$result->execute();
$result = $conn->prepare("SELECT FOUND_ROWS()"); 
$result->execute();
$row_count =$result->fetchColumn();
echo $row_count;
  
  
    


    /* display number of posts  
$result = $conn->prepare("SELECT * FROM emploi_offres WHERE (`poste` LIKE '%".$query."%') OR (`entreprise` LIKE '%".$query."%') OR (`address` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%') "); 

$result->execute();
$result = $conn->prepare("SELECT FOUND_ROWS()"); 
$result->execute();
$row_count =$result->fetchColumn();
echo $row_count;

*/

    
 
?>