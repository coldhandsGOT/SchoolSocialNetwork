<!DOCTYPE html>
<html>
<head>
          <!-- Retour à la page indiquée avec un intervalle de temps de 5sec-->
          <meta http-equiv="refresh" content="3;chronologie.php" />
</head>

<body>
</body>
</html>

<?php
// on se connecte à la base de donnée en ajoutant le connect_BDD.php
require_once('connexion_BDD.php');
// on essaye de supprimer le Post
try {
  // la quete afin de supprimer le post. On supprime la ligne où ID_post = $_GET['ID_post']
  $ID_poste=$_GET['ID_poste'];
  $query = "DELETE FROM Media
            WHERE ID_poste='$ID_poste'";

  $conn -> query($query); // on exécute la requete
  echo "Post deleted successfully";

  /*$statement_admin = $conn -> prepare("SELECT chemin FROM Media WHERE ID_poste ='".$ID_poste."'");
  $statement_admin -> EXECUTE();
  $chemin_photo = $statement_admin -> fetchColumn(0);

  $query = "SELECT chemin FROM Media WHERE ID_poste ='".$ID_poste."'";
  $chemin_photo = $conn -> query($query);

  echo $ID_poste;
  echo $chemin_photo;
  $query = "DELETE FROM Albums
            WHERE chemin_photo='$chemin_photo'";

  $conn -> query($query);*/

}catch(PDOException $e){
    echo $e->getMessage();
    }

$conn = null;

?>
