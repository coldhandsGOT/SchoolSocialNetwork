<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8" />
  <title> recherche des amis </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
  <?php include 'header.php' ?>

<body>





<div>
<?php include 'side_menu.php' ?>

<div class="container" style="float=right, margin-right:550px">
     <div class="col-md-6" >
<div class="panel panel-primary">
                  <div class="panel-heading">Search Friend</div>
                  <div class="panel-body">


<center>
                   <img src="<?php echo  $_SESSION['profile_pic']; ?>" width="250" height="250" style="border-radius: 4%;" alt="error">
             </center>

             <center style="font-size:34px">
                    <?php echo $_SESSION["pseudo_amis_recherche"] ?>
</center>
<center>
  <form method="post">
      <button type ="submit" id="submit" name="submit" class="btn btn-warning" value="Submit">Add friend</button>
     






      <a href=""><button type="button" class="btn" >View Profile</button></a>
    </form>
</center>

                  </div>
                  </div>
     
     </div >

</div>

</div>

    <?php
    //on se connecte a la base
    require_once('connexion_BDD.php');

$mon_chiffre = 0;
    if(!empty($_POST["recherche_pseudo"])) {
      try {
              $statement_pseudo_amis = $conn -> prepare("SELECT pseudo FROM users WHERE pseudo ='".$_POST["recherche_pseudo"]."'");
              $statement_pseudo_amis -> EXECUTE();
              $pseudo_amis_recherche = $statement_pseudo_amis -> fetchColumn(0);

              $statement_email_amis = $conn -> prepare("SELECT email FROM users WHERE pseudo='".$_POST["recherche_pseudo"]."'");
              $statement_email_amis -> EXECUTE();
              $email_amis_recherche = $statement_email_amis -> fetchColumn(0);

     
              $statement_photo_amis = $conn -> prepare("SELECT profile_pic FROM users WHERE pseudo='".$_POST["recherche_pseudo"]."'");
              $statement_photo_amis -> EXECUTE();
              $photo_amis_recherche = $statement_photo_amis -> fetchColumn(0);


             
   $_SESSION["pseudo_amis_recherche"]=$pseudo_amis_recherche;
   $_SESSION["email_amis_recherche"]=$email_amis_recherche;
   $_SESSION["photo_amis_recherche"]=$photo_amis_recherche;


              if (isset($pseudo_amis_recherche)) {

            
  


// $sql="INSERT INTO `amis` (`pseudo_amis_recherche`, `photo_amis_recherche`, `email_amis_recherche`, `email_user`) 
// VALUES ('".$pseudo_amis_recherche."','".$photo_amis_recherche."','".$email_amis_recherche."', '".$_SESSION["email"]."'";
//  $conn-> exec($sql);
   
      $user_send=$_SESSION["pseudo"];
      $user_receive=$pseudo_amis_recherche;

 if (isset($_POST['submit'])){
      
            $statut=0;

              
                 // echo "pseudo: ".$pseudo_amis_recherche;
                 // echo "email: ".$email_amis_recherche;  
//friend request

  $sql = "INSERT INTO `relation_ami` (`user_one_id`, `user_two_id`, `status`, `action_user_id`)
    VALUES ('$user_send','$user_receive', '$status', '$action_user)";
    $conn-> exec($sql);



}


 if (isset($_POST['submit']) && isset($user_receive) ){


       $statut=1;
       $action_user=2;

  $sql = "UPDATE `relation_ami` SET `status` = '$statut', `action_user_id` = '$action_user' WHERE `user_one_id` = 'user_send' AND `user_two_id` = 'user_receive'";
    $conn-> exec($sql);


}
       
            $statut=1;


              $statement_check_friend = $conn -> prepare("SELECT * FROM `relation_ami` WHERE `user_one_id` = 'user_send' AND `user_two_id` = 'user_receive' AND `status` = '$status'");
              $statement_check_friend -> EXECUTE();
              $check_friend_request = $statement_check_friend -> fetchColumn(0);

if (isset($check_friend_request)){
  echo  "deja amii";
}




}

      } catch (Exception $e) {
        echo "la personne que vous cherchier n'existe pas.".$e->getMessage();
      }
 $conn = null;

    }
  //       $sql = "UPDATE `amis_recherche` SET `pseudo_amis_recherche`='".$pseudo_amis_recherche."', `photo_amis_recherche`='".$photos_amis."',`email_amis_recherche`='".$email_amis."'";
  // $conn -> query($sql);



       

       

             




   

     ?>




    
	    <a class="" href="ajouter_amis.php"> ajouter à mes amis </a><br />
      


      <?php if ($_SESSION["Admin"]==1): ?>
         <br /><a class="" href="delete_user.php"> Supprimer l'utilisateur </a>
      <?php endif; ?>

     </div>







</body>
</html>
