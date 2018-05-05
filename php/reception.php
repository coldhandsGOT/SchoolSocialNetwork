<?php
require "connexion_BDD.php";
session_start();


$msg = $conn->prepare('SELECT * FROM messages WHERE id_destinataire = ?');
$msg->execute(array($_SESSION['id']));
$msg_nbr = $msg->rowCount();

?>


<html >
<?php include 'header.php' ?>
<?php include 'side_menu.php' ?>
  <head>
    <meta charset="utf-8">
    <title>Boite de réception</title>
  </head>
  <body>
    <br />
    <a href="envoyermessage.php">Envoyer un nouveau message</a><br /><br /><br />
    <h3>Votre boite de réception</h3>
    <?php
    if($msg_nbr == 0) { echo "Vous n'avez aucun message...";}
     while ($m = $msg->fetch())  {
        $p_exp = $conn->prepare('SELECT pseudo FROM users WHERE id = ? ');
        $p_exp->execute(array($m['id_expediteur']));
        $p_exp = $p_exp->fetch();
        $p_exp = $p_exp['pseudo'];
            ?>
            <b><?= $p_exp    ?></b>Vous a envoyé: <br/>
            <?= nl2br($m['message']) ?><br />
            ---------------------------<br />

        <?php  }  ?>




  </body>
  <?php include 'footer.php' ?>
</html>
