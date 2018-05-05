<?php   //on se connecte a la base
  require "connexion_BDD.php";
  session_start(); ?>

<!DOCTYPE html>
<html>

<?php include 'header.php' ?>




</div>
<?php include 'side_menu.php' ?>

<!--<div class="album">
  <h1>Albums</h1>
    <form class="" action="photos.php" method="post">
      <fieldset>
        <legend>Création d'un album</legend>
        <label>Titre de l'album à créer</label><br />
        <input type="text" name="titre_album" value=""><br />
        <input type="submit" name="" value="valider">
      </fieldset>
    </form>
</div>-->

<div class="">
  <h1>Album</h1>
  <?php

  $reqalbum = $conn -> prepare("SELECT `titre_album`, `email_user`, `chemin_photo`, `ID_photo` FROM `Albums` WHERE `email_user`='".$_SESSION["email"]."' ORDER BY `ID_photo` DESC");
    $reqalbum -> EXECUTE();

    while ($rowalbum = $reqalbum ->fetch()) {
      if (!empty($rowalbum["chemin_photo"])) {      ?>
      <div class="container">
        <?php
        $info = new SplFileInfo($rowalbum['chemin_photo']);
        //echo $info->getExtension();
        if ($info->getExtension()==('mp4')){ ?>
          <video width="320" height="240" controls>
            <source src="<?php echo $rowalbum['chemin_photo'];?>" type="video/mp4">
            </video>
        <?php }else { ?>
          <img src="<?php echo $rowalbum['chemin_photo'];?>" width="300" height="300"/><br />
        <?php } ?>
      </div>
    <?php } } ?>

</div>




<h1>Vos publications</h1>

                <div class="encadrement">
                  <!--***********************On récupère les données des posts*********************** -->
                  <?php

                  try {

                    if (!empty($_POST["titre_album"])) {
                      $sql = $conn ->prepare("INSERT INTO `Albums` (`titre_album`, `email_user`, `chemin_photo`, `ID_photo`) VALUES ('".$_POST["titre_album"]."', '".$_SESSION["email"]."', '', '')");
                      $sql -> EXECUTE();
                    }


                    $reqpost = $conn -> prepare("SELECT `ID_poste`, `chemin`, `email_user`, `date`, `description_media`, `confidentialite`, `liker`, `lover`, `detester`, `rire` FROM `Media` WHERE `email_user`='".$_SESSION["email"]."' ORDER BY `ID_poste` DESC");
                      $reqpost -> EXECUTE();
                  /**************************************************************************************************************/
                  /*************************************Affichage des posts de tout le monde*************************************/
                  /**************************************************************************************************************/

                          while($rowpost = $reqpost->fetch()){ // On récupère les données un par un
                            //if($rowpost['confidentialite']==0){ // On affiche le post ssi le post n'est pas confidentiel
                  ?>

                                    <div class="container">
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
                                        <img src = '../images/ajouter_icon.png' height="30" width="30"/> ajouter aux favoris

                                    </div>

                    <?php

                          }
                        } catch(PDOException $e) {
                      			    echo $e->getMessage();
                      			}
                    //$conn = null;
                  ?>


              <?php include 'footer.php' ?>  
</body>

</html>
