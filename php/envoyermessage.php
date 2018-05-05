

<?php
require "connexion_BDD.php";
 session_start();



if (isset($_POST['envoi_message']))
{
  if (isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message']))
  {
    $destinataire = htmlspecialchars($_POST['destinataire']);
    $message = htmlspecialchars($_POST['message']);

    $id_destinataire = $conn -> prepare('SELECT id FROM Users WHERE pseudo = ? ');
    $id_destinataire->execute (array($destinataire));
    $id_destinataire = $id_destinataire->fetch();
    $id_destinataire = $id_destinataire['id'];

    $ins = $conn -> prepare('INSERT INTO messages(id_expediteur,id_destinataire,message) VALUES (?,?,?)   ');
    $ins->execute(array($_SESSION['id'],$id_destinataire,$message));

    $error = "Votre message a bien été envoyé !";
  }else {
    $error = "Veuillez completer tout les champs";
  }

}

$destinataires =$conn -> query("SELECT pseudo FROM Users ORDER BY pseudo ");

?>

<html>

<?php include 'header.php' ?>
<?php include 'side_menu.php' ?>

   </div>
  <p id="barre0"> </p>


 <div id="conv">

	<h2>Envoyer un nouveau message </h2>

  <form method ="POST">
    <label>Destinataire :</label>
      <select name = "destinataire">
        <?php while($d = $destinataires->fetch()) {?>
            <option> <?=$d['pseudo'] ?> </option>
        <?php } ?>

      </select>
      <br /><br />
      <textarea placeholder="Votre message" name ="message"></textarea>
      <br /><br />
      <input type="submit" value="Envoyer" name ="envoi_message" />
      <br /><br />

      <?php if (isset($error)) { echo '<span style ="color:red">'.$error.'</span>';} ?>

          <br /><br />
          <a href="reception.php">Accéder à votre boite de réception</a><br /><br /><br />

  </form>


</div>

<?php include 'footer.php' ?>

</body>
</html>
