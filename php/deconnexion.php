<!DOCTYPE html>
<html>
<head>
          <!-- Retour à la page indiquée avec un intervalle de temps de 5sec-->
          <meta http-equiv="refresh" content="0;../index.php" />
		   <link rel="stylesheet" type="text/css" href="../CSS/deconnexion.css"/>
</head>

<body>
  <div id="loading">
    <img src="../images/gif_chargement.gif" width="150" height="150">
  </div>
</body>
</html>

<?php
//On commence la connexion
session_start();

//réinitialise toutes les variables SESSION
session_unset();

//détruit la connexion
session_destroy();

echo "Log Out";
header('Location: ../index.php');
?>
