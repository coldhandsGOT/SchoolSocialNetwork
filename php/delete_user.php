<!DOCTYPE html>
<html>
<head>
          <!-- Retour à la page indiquée avec un intervalle de temps de 5sec-->
          <meta http-equiv="refresh" content="0;recherche.php" />
</head>

<body>
</body>
</html>


<?php
// on se connecte à la base de donnée en ajoutant le connect_BDD.php
require_once('connexion_BDD.php');
// on essaye de supprimer l'utilisateur
try {
  session_start();

  // la quete afin de supprimer l'utilisateur. On supprime la ligne où Mail = $_GET['Mail']
  $email=$_SESSION['email_amis'];

  $statement_suppresion_media = $conn -> prepare("DELETE FROM Media WHERE email_user='$email' ");
  $statement_suppresion_media -> EXECUTE();

  $statement_suppresion_album = $conn -> prepare("DELETE FROM Albums WHERE email_user='$email' ");
  $statement_suppresion_album -> EXECUTE();

  $statement_suppresion_amis = $conn -> prepare("DELETE FROM Amis WHERE email_user='$email' ");
  $statement_suppresion_amis -> EXECUTE();

  $query = "DELETE FROM Users
            WHERE email='$email'";
  $conn -> query($query); // on exécute la requete
  echo "User deleted successfully";

}catch(PDOException $e){
    echo $e->getMessage();
    }

$conn = null;

?>
