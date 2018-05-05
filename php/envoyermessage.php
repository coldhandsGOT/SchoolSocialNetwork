

<?php session_start();
require "connexion_BDD.php";


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

  </form>






</div>
<!--
<div id="chatbox"><?php /*
if(file_exists("log.html") && filesize("log.html") > 0){
    $handle = fopen("log.html", "r");
    $contents = fread($handle, filesize("log.html"));
    fclose($handle);

    echo $contents;
	function loadLog(){

		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div
		  	},
		});
}
function loadLog(){
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div

				//Auto-scroll
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}
		  	},
		});
	}*/
?></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){

});
</script>

<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'index.php?logout=true';}
	});
});

if(isset($_GET['logout'])){

    //Simple exit message
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);

    session_destroy();
    header("Location: index.php"); //Redirect the user
}
//If user submits the form
	$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});
		$("#usermsg").attr("value", "");
		return false;
	});
</script>
-->
<?php include 'footer.php' ?>

</body>
</html>
