<!DOCTYPE html>
<html>

<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<?php include 'header.php' ?>
</head>



<body>

<?php include 'side_menu.php' ?>
  <div class="col-md-6">
               <div class="clearfix"></div>

<div class="panel panel-default new-post-box">
    <div class="panel-body">
        <form id="form-new-post">
            <input type="hidden" name="group_id" value="">
            <div><textarea rows="5" cols="58" name="content" placeholder="Share what you think or photos"></textarea></div>
            <div class="image-area">
                <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                <img src="" />
            </div>
            <hr />
            <div class="row">
                <div class="col-xs-4">
                  
                    <input type="file" accept="image/*" class="image-input" name="photo" onchange="previewPostImage(this)">
                </div>
                <div class="col-xs-4">
                    
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-submit pull-right" onclick="">
                        Post!
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>




            </div>


<div class="m-t-10"></div>



                <div class="encadrement">
                  <!--***********************On récupère les données des posts*********************** -->
                  <?php
                  
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
                              <table >
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

</div>
</div>



<div class="footer">
    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-left">
            ECE Paris © 2018 All rights reserved.
        </div>
    </div>
</div>



<script src='../plugins/jquery/jquery-2.1.4.min.js'></script>
<script src='../plugins/pace-master/pace.min.js'></script>
<script src='../plugins/bootstrap/js/bootstrap.min.js'></script>
<script src='../plugins/jquery.serializeJSON/jquery.serializejson.min.js'></script>
<script src='../plugins/fancybox/dist/jquery.fancybox.min.js'></script>
<script src='../plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'></script>
<script src='../plugins/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js'></script>
<script src='../plugins/select2/dist/js/select2.full.min.js'></script>
<script src='../js/around.js'></script>
<script src='../js/wall.js'></script>
<script src='../js/notifications.js'></script>

</style>
</body>

</html>
