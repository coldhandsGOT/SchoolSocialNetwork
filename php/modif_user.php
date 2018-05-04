<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>
          <meta charset = "utf-8" />
          <title> <?php echo $_SESSION['pseudo'];?> </title>
		  <link rel="stylesheet" type="text/css" href="../CSS/user.css"/>
</head>

<body>
                                <!--***********************
                                          ENTETE
                                *********************** -->

            <div id="entete">

        <a href="../index.php"> <img src = "../images/logo1.png" width="150" height="120" /> </a>
		 <a id="retour" href="deconnexion.php"> Déconnexion </a>
        <a id="retour" href="user.php"> Retour </a>


      <br />


   <p id="barre0"> </p>

  <nav class="navigateur"  >

  <ul>
		<li><a href="chronologie.php"> Chronologie </a></li>
		<li><a href="amis.php"> Amis </a></li>
		<li><a href="photos.php"> Photos </a></li>
		<li><a href="user.php"> À propos </a></li>

		<li><a href="recherche.php"><img src = "../images/recherche.png" width="15" height="15" />   rechercher des amis</a></li>
		<li><a href="poster.php">Poster</a></li>

	</ul>
  </nav>

   </div>
  <p id="barre0"> </p>

      <?php
      //on se connecte à la base de donnees
      require_once 'connexion_BDD.php'; ?>

<h1>Modifier votre profil </h1>

<div class = "fond">
        <div id = "description">
          <form class="" action="modif_userBDD.php" method="post">
          <br /><label>Pseudo : </label> <?php echo $_SESSION["pseudo"] ?><br />
          <input type="text" name="pseudo_modif" value=""><br />
          <label>Date de naissance : </label> <?php echo $_SESSION["date_naissance"] ?><br />
          <input type="date" name="date_modif" value=""><br />
          <label>Email : </label> <?php echo $_SESSION["email"] ?><br />
          <h4>Impossible de modifier votre email.</h4>
          <label>Civilité : </label> <?php if ($_SESSION["civilite"]=='M') {
            echo "Homme";
          }else {
            echo "Femme";
          }?><br />
          <select class="" name="civilite_modif">
            <option>M</option>
            <option>F</option>
          </select><br />
          <label>Description : </label> <?php echo $_SESSION["description_user"] ?><br />
          <input type="text" name="description_modif" value=""><br />
          <input type="submit" name="" value="modifier le profil"><br />
          <p> </p>
          </form>

</div>
   </div>


 <footer class="footer">
       <p>
         Conditions Confidentialité ©2017-ECE'Raz
       </p>
     </footer>

<br /> <br />

</body>

</html>
