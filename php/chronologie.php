<!DOCTYPE html>
<html>

<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html>

<head>
          <meta charset = "utf-8" />
          <title> Chronologie </title>
      <link rel="stylesheet" type="text/css" href="../CSS/chronologie.css"/>
      <link rel="stylesheet" href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
      <link href='../plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet">
      <link href='../plugins/pace-master/themes/white/pace-theme-flash.css' rel="stylesheet">
      <link href='../plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet">
      <link href='../plugins/fancybox/dist/jquery.fancybox.min.css' rel="stylesheet">
      <link href='../plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css' rel="stylesheet">
      <link href='../plugins/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css' rel="stylesheet">
      <link href='../plugins/select2/dist/css/select2.min.css' rel="stylesheet">
      <link href='../plugins/bootstrap/css/bootstrap-theme.min.css' rel="stylesheet">
      <link href='css/around.css' rel="stylesheet">




<div id="app">
  

              <nav class="navbar navbar-inverse">
                  <div class="container-fluid">

                      <div class="navbar-header">
   
                          <!-- Collapsed Hamburger -->
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                              <span class="sr-only">Toggle Navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>

                          <!-- Branding Image -->
                          <a class="navbar-brand" href="chronologie.php">
                              <img style ="margin-left:-120px" src="../images/logo.png" alt="" />
                          </a>
                      </div>


                      <div class="collapse navbar-collapse" id="app-navbar-collapse">
                           

                            <!-- Left Side Of Navbar -->
                            <div class="navbar-form navbar-left">
                                <form id="custom-search-input" method="post" action="recherche.php">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control input-lg" name="recherche_pseudo" placeholder="search..." />
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="button" onclick="validForm()">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                           </div>


                          <!-- Right Side Of Navbar -->
                          <ul class="nav navbar-nav navbar-right">
                                 <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="amis.php">Messages</a></li>
                                <li><a href="photos.php">Photos</a></li>
                                
                              </ul>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle parent" data-toggle="dropdown" role="button" aria-expanded="false">

                                      <img src="#" alt="" />
                                     <?php echo $_SESSION["pseudo"] ?> <span class="caret"></span>
                                  </a>

                                  <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="user.php">
                                              <i class="fa fa-user"></i> Mon profil
                                          </a>
                                      </li>

 
                                       <li>
                                          <a href="modif_user.php">
                                              <i class="fa fa-cog"></i> Reglages
                                          </a>
                                       </li>


                                       <li>
                                          <a id="retour" href="deconnexion.php" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                               <i class="fa fa-sign-out"></i> Déconnexion
                                          </a>
                                          <form id="logout-form" action="deconnexion.php" method="POST" style="display: none;">
                                          </form>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>


              
          </div>
</head>

<body>


<div class="m-t-10"></div>

   <div class="h-20"></div>
   <div class="container">
            <div class="row">            
              <div class="col-md-3">


      <div class="menu">
            <ul class="list-group">
         <li class="list-group-item">
            <a href="chronologie.php" class="menu-home">
                <i class="fa fa-home"></i>
                Home
            </a>
        </li>


        <li class="list-group-item">
            <a href="user.php" class="menu-home">
                <i class="fa fa-home"></i>
                Profile
            </a>
        </li>
        
        <li class="list-group-item">
            <a href="amis.php" class="menu-groups">
                <i class="fa fa-users"></i>
                Amis
            </a>
        </li>
        <li class="list-group-item">
            <a href="photo.php" class="menu-dm">
                <i class="fa fa-commenting"></i>
                Photo
            </a>
        </li>

    </ul>
</div>
</div>

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
