<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="refresh" content="0;emploi.php" />  

</head>
</html>

<?php
  $query = $_GET['query']; 
  // reçoit la valeur envoyée du search
 
  
    
    $raw_results = mysql_query("SELECT * FROM emploi_offres
      WHERE (`poste` LIKE '%".$query."%') OR (`entreprise` LIKE '%".$query."%') OR (`address` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%')") or die(mysql_error());
      
    // * signifie que tous les champs sont séléctionnés de la table emploi_offres
   
    
    // '%$query%' ce qu'on cherche, % avant et après le query %
    
    if(mysql_num_rows($raw_results) > 0){ // si y'a une ou plusieurs lignes, alors:
      
      while($results = mysql_fetch_array($raw_results)){
      // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
      
        echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
        // posts results gotten from database(title and text) you can also show id ($results['id'])
      }
      
    }
    else{ // if there is no matching rows do following
      echo "No results";
    }
    
 
?>