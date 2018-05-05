<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8" />
  <title> recherche des amis </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
  <?php include 'header.php' ?>





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
      <button type="button" class="btn btn-warning" name="ajout_bouton">Add friend</button>
      <a href=""><button type="button" class="btn" >View Profile</button></a>
<center>

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


         

              if (!empty($pseudo_amis_recherche)) {

            
                // echo "pseudo: ".$pseudo_amis."<br>";
                // echo "email: ".$email_amis;
              }


   $_SESSION["pseudo_amis_recherche"]=$pseudo_amis_recherche;
   $_SESSION["email_amis_recherche"]=$email_amis_recherche;
   $_SESSION["photo_amis_recherche"]=$photo_amis_recherche;

// $sql="INSERT INTO `amis_recherche` (`pseudo_amis_recherche`, `photo_amis_recherche`, `email_amis_recherche`, `email_user`) 
// VALUES (".$pseudo_amis_recherche.",".$photo_amis_recherche.",".$email_amis_recherche.", ".$email_user_recherche."";
//  $conn-> exec($sql);

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
