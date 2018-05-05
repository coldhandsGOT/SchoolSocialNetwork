 <?php
// Start the session
session_start();
?>

 <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br>
                <div class="panel-heading">Modifier vos informations</div>


                <div class="panel-body">
                    <form action="modif_userBDD.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="photo_modif"> upload photo </label>
                            <input type="file" name ="photo_modif"  class="form-control" accept="image/*" value="<?php echo  $_SESSION['profile_pic']; ?>">
                        </div>


                       
                        <div class="form-group">
                            <label for="date_modif">Birthday</label>
                            <input type="date" class="form-control datepicker" name="date_modif" value="<?php echo $_SESSION["naissance"] ?>">
                                
                        </div>


                        <div class="form-group">
                            <label for="location_modif"> localisation </label>
                            <input type="text" name ="location_modif" value="<?php echo $_SESSION["location"] ?>" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="pseudo_modif"> Modifier votre pseudo </label>
                            <input type="text" name ="pseudo_modif" value="<?php echo $_SESSION["pseudo"] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone_modif"> phone </label>
                            <input type="phone" name ="phone_modif" value="<?php echo $_SESSION["phone"] ?>" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="about_modif"> CV </label>
                            <textarea name ="about_modif" id="bio"  cols="40" rows ="9" class="form-control" > <?php echo $_SESSION["about"] ?> </textarea>
                        </div>

                        <div class="form-group">
                            <p class="text-center">
                                <button class ="btn btn-primary btn-lg" type="submit">save your information</button>
                            </p>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>



