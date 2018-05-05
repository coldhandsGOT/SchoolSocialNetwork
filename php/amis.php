

<?php session_start();


?>

<html>

<?php include 'header.php' ?>
<?php include 'side_menu.php' ?>

   </div>
  <p id="barre0"> </p>

  <div id = "friends">
	<h2> Liste d'amis</h2><br /><?php
      require_once('connexion_BDD.php');
  		$reqamis = $conn ->prepare("SELECT `pseudo_amis`, `email_amis` FROM `Amis` WHERE `email_user`='".$_SESSION['email']."'");
  		$reqamis -> EXECUTE(); ?>
	<table>
	<tr><?php
  while ($rowamis=$reqamis ->fetch()) { ?>
    <?php echo $rowamis['pseudo_amis'];echo " : "; echo $rowamis['email_amis']; ?><br /><br />
  <?php } ?>
	</tr>
	</table>
  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  </div>

<?php include 'footer.php' ?>

</body>
</html>
