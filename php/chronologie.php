<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html>

<?php include 'header.php' ?>




<body>

<?php include 'side_menu.php' ?>

<?php include 'wallpost.php' ?>


<div class="container">
  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6"><span class="pull-right">
    	<?php include 'weather.php' ?>
</span></div>
  </div>
</div>



                <div class="encadrement">
              
                    <?php include 'posts.php' ?>


                </div>

</div>
</div>




<?php include 'footer.php' ?>


</style>
</body>

</html>
