<!DOCTYPE html>
<html>

<head>
          <meta charset = "utf-8" />
          <title> Chronologie </title>
		  <link rel="stylesheet" type="text/css" href="../CSS/chronologie.css"/>
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
  <h1>Chronologie </h1>

                <div class="encadrement">
                  <!--***********************On récupère les données des posts*********************** -->
                  <?php
                  session_start();
                  //on se connecte a la base
                  require "connexion_BDD.php";

                  try {
                    $reqpost = $conn -> prepare("SELECT ID_poste, chemin, email_user, date, description_media, confidentialite,
                                                        liker, lover, detester, rire
                                                FROM Media ORDER BY ID_poste DESC");
                      $reqpost -> EXECUTE();
                  /**************************************************************************************************************/
                  /*************************************Affichage des posts de tout le monde*************************************/
                  /**************************************************************************************************************/

                          while($rowpost = $reqpost->fetch()){ // On récupère les données un par un
                            if($rowpost['confidentialite']==0){ // On affiche le post ssi le post n'est pas confidentiel
                  ?>
                              <table class="container_post">
                                <tr>
                                  <td>
                                    <div class="container">
                                      <p>
                                        <?php $reqauteur = $conn -> prepare("SELECT pseudo
                                                                          FROM Users
                                                                          JOIN Media ON Media.email_user= Users.email
                                                                          WHERE Media.ID_poste = ".$rowpost['ID_poste']);
                                              $reqauteur -> EXECUTE();
                                              while($rowauteur = $reqauteur -> fetch()){ ?>
                                                <p>
                                                  <?php echo "L'utilisateur: ".$rowauteur["pseudo"]; ?>
                                                </p>
                                              <?php } ?>
                                      <h3 class="description"> <?php echo $rowpost['description_media']; ?></h3>
                                      Date : <?php echo $rowpost["date"]; ?>
                                      <!-- Si l'user est un admin alors le bouton delete apparait pour supprimer les posts -->
                                    <?php if($_SESSION['Admin']==1){ ?>
                                      <a class="delete" href="../php/delete_post.php?ID_poste=<?php echo $rowpost['ID_poste']; ?>" >
                                        <img id="bin_post" src="../images/bin.jpg" height="15" width="15"/></a>
                                    <?php } ?>
                                      <br>
                                      <?php
                                      $info = new SplFileInfo($rowpost['chemin']);
                                      //echo $info->getExtension();
                                      if ($info->getExtension()==('mp4')){ ?>
                                        <video width="320" height="240" controls>
                                          <source src="<?php echo $rowpost['chemin'];?>" type="video/mp4">
                                          </video>
                                      <?php }else { ?>
                                        <img src="<?php echo $rowpost['chemin'];?>" width="300" height="300"/><br />

                                      <?php } ?>

                                      <br>

                                        <img src = '../images/like_icon.png' height="30" width="30"/> Like: <?php echo $rowpost["liker"] ?>
                                        <img src = '../images/comment_icon.png' height="30" width="30"/> Commenter
                                        <a href="ajouter_favori.php?chemin_photo=<?php echo $rowpost['chemin']?>"><img src = '../images/ajouter_icon.png' height="30" width="30" /> ajouter aux favoris</a>

                                    </div>
                                  </table>
                    <?php
                            }
                          }
                        } catch(PDOException $e) {
                      			    echo $e->getMessage();
                      			}
                    //$conn = null;
                  ?>


                </div>



<div class="footer">
  <footer>
    <p>
      Conditions Confidentialité ©2017-ECE'Raz
    </p>
  </footer>
</div>
</body>

</html>
