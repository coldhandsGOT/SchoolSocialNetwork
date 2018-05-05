<!DOCTYPE html>
<html>

<?php
// Start the session
session_start();
?>

<head>
  <meta charset = "utf-8" />
          <title> ECE Social Network </title>
      <link rel="stylesheet" type="text/css" href="../CSS/chronologie.css"/>
      <link rel="stylesheet" href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
      <link href='../plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet">
      <link href='../plugins/pace-master/themes/white/pace-theme-flash.css' rel="stylesheet">
      <link href='../plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet">
      <link href='../plugins/fancybox/dist/jquery.fancybox.min.css' rel="stylesheet">
      <link href='../plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css' rel="stylesheet">
      <link href='../plugins/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css' rel="stylesheet">
      <link href='../plugins/select2/dist/css/select2.min.css' rel="stylesheet">
      <link href='../plugins/bootstrap/css/bootstrap-theme.min.css' rel="stylesheet">
      <link href='../CSS/emploi_menu.css' rel="stylesheet">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<?php include 'header.php' ?>
</head>




<body>
<?php include 'side_menu.php' ?>


<div class="emplois">
	<?php include 'allemploi.php' ?>

</div>

<?php include 'emploi_menu.php' ?>

<script src='../plugins/jquery/jquery-2.1.4.min.js'></script>
<script src='../plugins/pace-master/pace.min.js'></script>
<script src='../plugins/bootstrap/js/bootstrap.min.js'></script>
<script src='../plugins/jquery.serializeJSON/jquery.serializejson.min.js'></script>
<script src='../plugins/fancybox/dist/jquery.fancybox.min.js'></script>
<script src='../plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'></script>
<script src='../plugins/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js'></script>
<script src='../plugins/select2/dist/js/select2.full.min.js'></script>
<script src='../js/around.js'></script>
<script src='../js/wall.js'></script>
<script src='../js/notifications.js'></script>


</body>




</html>