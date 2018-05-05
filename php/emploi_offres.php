<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
     <!--  <meta http-equiv="refresh" content="0;emploi.php" />    -->
     <link href='../CSS/emploi_menu.css' rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


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


//backend pour le module de recherche de emploi_offre
 $search=$_POST['search'];
   $query = $conn->prepare("select * from emploi_offres where poste LIKE '%$search%' OR entreprise LIKE '%$search%'  LIMIT 0 , 10");
        $query->bindValue(1, "%$search%", PDO::PARAM_STR);
        $query->execute();

        // Display search result
              if (!$query->rowCount() == 0) {

                if($speciality_offer=='SI')
                {
                echo"<div class=\"grid-block\">
                       <div class=\"flip-container\">
                          <div id=\"f1\" class=\"flip-card shadow\">
                            <div class=\"front-face\">
                              <img src=\"https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png\" alt=\"Cost Pie\">
                              <br><br>  <span>Finances</span>
                            </div>
                            <div class=\"back-face-center\">
                              <p>
                               <br> Working with our clients, building financial models to establish value for money for business-as-usual and key investment decisions.
                              </p>
                            </div>
                          </div>
                      </div>";
                    }

                echo "<table style=\"font-family:arial;color:#333333;\">";  
                    echo "<tr>
                          <td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Poste</td>
                          <td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Entrepries</td>
                          <td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">email</td></tr>"; 

              while ($results = $query->fetch()) {
                echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";      
                        echo $results['poste'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                        echo $results['entreprise'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                        echo "$".$results['email'];
                echo "</td></tr>";        
                    }
                echo "</table>";    
                } else {
                    echo 'Nothing found';
                }

    


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