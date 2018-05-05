<!DOCTYPE html>
<html>

<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html>


<?php include 'header.php' ?>

<div class="container">
  <div class="col-lg-4">

                   

    <div class="panel panel-default">
      <div class="panel-heading">
        <p class="text-center"><?php echo $_SESSION["pseudo"] ?></p>
      </div> 

       <div class="panel-body">
             <center>
                   <img src="<?php echo  $_SESSION['profile_pic']; ?>" width="250" height="250" style="border-radius: 4%;" alt="error">
             </center>
        </div>
    </div>
    <div class="panel panel-default">
      <div class="body">
       <!-- <friend :profile_id="{{ $user->id}}">  </friend>   -->
      </div>
    </div>
 

<div class="profile-information">
   <!-- @if(Auth::id()==$user->id)  -->
        <div class="edit-button">
            <div class="button-frame">
                <a href="edit_profile.php" data-toggle="modal" data-target="#info">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
            </div>
        </div>
    <!-- @endif -->

  
<ul class="list-group">
        <li class="list-group-item">

          <?php if ($_SESSION["civilite"]=='M') { ?>
             <i class="fa fa-mars">Male</i>
          <?php } else { ?>

             <i class="fa fa-venus">Female</i>
         <?php } ?>

        </li>

     <li class="list-group-item">
        
             <i class="fa fa-birthday-cake"></i>
         <?php echo $_SESSION["naissance"] ?>
    </li>
        
        <li class="list-group-item">
          
             <i class="fa fa-map-marker"></i>
         <?php echo $_SESSION["location"] ?>
    </li>
     <li class="list-group-item">
             <i class="fa fa-mobile"></i>
          <?php echo $_SESSION["phone"] ?>
    </li>

    <li class="list-group-item">
          
             <i class="fa fa-info-circle"></i>
          <?php echo $_SESSION["about"] ?>
    </li>   

    </ul>

  </div>
</div>

</div>


<!--
@if(Auth::id()==$user->id)   -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
        </div>
    </div>
</div>
<!-- @endif  -->

    


   

<?php include 'footer.php' ?>

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









<!DOCTYPE html>
<html>


<body>
  

     

<h1>Votre profil </h1>

<div class = "fond">

        <div id="photo_profil">
          <img src="../images/photo_profil_defaut.jpg" width="300" height="300">
        </div>
        <div id = "description">
          <label>Pseudo : </label> <br /><br />
          <label>Date de naissance : </label> <br /><br />
          <label>Email : </label> <?php echo $_SESSION["email"] ?><br /><br />
          <label>Civilité : </label> <?php if ($_SESSION["civilite"]=='M') {
            echo "Homme";
          }else {
            echo "Femme";
          }?><br /><br />
          <label>Description : </label> <?php echo $_SESSION["description_user"] ?><br /><br />
          <a id="retour" href="modif_user.php"> Modifier le profil</a>


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
