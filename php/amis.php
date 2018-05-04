
<!DOCTYPE html>
<html>
<?php session_start(); ?>
<html>

<?php include 'header.php' ?>

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

 <div id="conv">

	<h2>Discussion instantanée</h2>

	<div id="wrapper">
  <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['pseudo_amis']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox"></div>

    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
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
