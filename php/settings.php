<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<?php include 'header.php' ?>

   </div>
  <p id="barre0"> </p>

      <?php
      //on se connecte à la base de donnees
      require_once 'connexion_BDD.php'; ?>

<h1>Modifier votre profil </h1>

<div class = "fond">
        <div id = "description">
          <form class="" action="modif_userBDD.php" method="post">
          <br /><label>Pseudo : </label> <?php echo $_SESSION["pseudo"] ?><br />
          <input type="text" name="pseudo_modif" value=""><br />
          <label>Date de naissance : </label> <?php echo $_SESSION["date_naissance"] ?><br />
          <input type="date" name="date_modif" value=""><br />
          <label>Email : </label> <?php echo $_SESSION["email"] ?><br />
          <h4>Impossible de modifier votre email.</h4>
          <label>Civilité : </label> <?php if ($_SESSION["civilite"]=='M') {
            echo "Homme";
          }else {
            echo "Femme";
          }?><br />
          <select class="" name="civilite_modif">
            <option>M</option>
            <option>F</option>
          </select><br />
          <label>Description : </label> <?php echo $_SESSION["description_user"] ?><br />
          <input type="text" name="description_modif" value=""><br />
          <input type="submit" name="" value="modifier le profil"><br />
          <p> </p>
          </form>

</div>
   </div>


 <?php include 'footer.php' ?>

<br /> <br />

</body>

</html>
