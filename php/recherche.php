<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8" />
  <title> recherche des amis </title>
  <link rel="stylesheet" type="text/css" href="../CSS/recherche.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
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

  <div>

<div id="resultat_recherche">
  <br /><p>Résultat de la recherche :</p><br />
    <?php
    //on se connecte a la base
    require_once('connexion_BDD.php');

    if(!empty($_POST["recherche_pseudo"])) {
      try {
              $statement_pseudo_amis = $conn -> prepare("SELECT pseudo FROM Users WHERE pseudo ='".$_POST["recherche_pseudo"]."'");
              $statement_pseudo_amis -> EXECUTE();
              $pseudo_amis = $statement_pseudo_amis -> fetchColumn(0);

              $statement_email_amis = $conn -> prepare("SELECT email FROM Users WHERE pseudo ='".$_POST["recherche_pseudo"]."'");
              $statement_email_amis -> EXECUTE();
              $email_amis = $statement_email_amis -> fetchColumn(0);

              if (!empty($pseudo_amis)) {
                echo "pseudo: ".$pseudo_amis."<br>";
                echo "email: ".$email_amis;
              }
      } catch (Exception $e) {
        echo "la personne que vous cherchier n'existe pas.".$e->getMessage();
      }
    }

   
    $_SESSION["pseudo_amis"]=$pseudo_amis;
  
   

     ?>
</div>

     <br />
     <br />
     <div >


    
	    <a class="ajouter" href="ajouter_amis.php"> ajouter à mes amis </a><br />
      


      <?php if ($_SESSION["Admin"]==1): ?>
         <br /><a class="ajouter" href="delete_user.php"> Supprimer l'utilisateur </a>
      <?php endif; ?>

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
