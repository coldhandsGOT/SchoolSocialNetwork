<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
     
</head>
</html>

<?php

 require "connexion_BDD.php";


 $search=$_POST['search'];
   $query = $conn->prepare("select * from emploi_offres where poste LIKE '%$search%' OR entreprise LIKE '%$search%'  LIMIT 0 , 10");
        $query->bindValue(1, "%$search%", PDO::PARAM_STR);
        $query->execute();

        // Display search result
              if (!$query->rowCount() == 0) {
                echo "Search found :<br/>";
                echo "<table style=\"font-family:arial;color:#333333;\">";  
                        echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Title Books</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Author</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Price</td></tr>";       
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