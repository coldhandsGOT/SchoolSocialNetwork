

<?php session_start();


?>

<!DOCTYPE html>
<html>
<head>
     <!--  <meta http-equiv="refresh" content="0;emploi.php" />    -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


</head>

<body>

<!-- pending requetst -->



<?php
      require_once('connexion_BDD.php');



if (isset($statut)==0){

$user_one = $_GET["user_one_id"];
$user_two = $_GET["user_two_id"];


   $query = $conn->prepare("SELECT * FROM `relation_ami` WHERE (`user_one_id` = '$user_one' OR `user_two_id` = '$user_two') AND `status` = '0' AND `action_user_id` != '1' ");
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
                        echo $results['user_one_id'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                        echo $results['user_two_id'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                        echo "$".$results['status'];
                echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                             echo "$".$results['action_user_id'];
 echo "</td></tr>"; 
                    }
                echo "</table>";    
                } else {
                    echo 'pas dami';
                }






}




?>




</body>
</html>