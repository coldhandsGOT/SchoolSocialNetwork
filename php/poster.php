<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Poster</title>
   <link rel="stylesheet" type="text/css" href="../CSS/poster.css"/>

</head>
<body>

 <div id="entete">

        <a href="../index.php"> <img src = "../images/logo1.png" width="150" height="120" /> </a>
		 <a id="retour" href="deconnexion.php"> Déconnexion </a>
        <a id="retour" href="user.php"> Retour </a>


      <br />


   <p id="barre0"> </p>

  <nav class="navigateur"  >

  <ul>
		<li><a href="chronologie.php"> Chronologie </a></li>
		<li><a href="amis.php"> Amis </a></li>
		<li><a href="photos.php"> Photos </a></li>
		<li><a href="user.php"> À propos </a></li>

		<li><a href="recherche.php"><img src = "../images/recherche.png" width="15" height="15" />   rechercher des amis</a></li>
		<li><a href="poster.php">Poster</a></li>

	</ul>
  </nav>

   </div>
  <p id="barre0"> </p>
<h1>Poster</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>
          Poster votre photo ou video :
        </legend><br />

	<div class = "corps">
    <!-- Sélectionner la photo -->
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
    <label>Choisissez une photo ou une vidéo</label><br />
    <input type="file" name="avatar" id="fileToUpload">
    <br /><br />
    <!-- Insérer la description de la publication-->
    <label id="description"> Description :</label><br />
    <textarea name="Description" ></textarea><br /><br />
    <label id="date_poste"> Date :</label><br />
    <input type="date" name="date_poste" value="<?php echo date('Y-m-d') ?>"><br /><br />
    <label id="confidentialite"> Confidentialite :</label><br />
    <select class="" name="confidentialite">
      <option value="0">Public</option>
      <option value="1">Seulement les amis</option>
      <option value="2">Moi-même</option>
    </select>
    <br><br>

	<div class ="bouton">
    <button class="button" name="submit" ><span>Poster</span></button>
	</div>
          </fieldset>

	</div>
    </form>

        <form action="upload.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>
              Poster votre évènement :
            </legend><br />

    	<div class = "corps">
        <!-- Sélectionner la photo -->
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
        <label>Choisissez la photo de votre évènement</label><br />
        <input type="file" name="avatar" id="fileToUpload">
        <br /><br />
        <!-- Insérer la description de la publication-->
        <label id="description"> Description de votre évènement :</label><br />
        <textarea name="Description" ></textarea value="évènement:"><br /><br />
        <label id="date_poste"> Date :</label><br />
        <input type="date" name="date_poste" value="<?php echo date('Y-m-d') ?>"><br /><br />
        <label id="confidentialite"> Confidentialite :</label><br />
        <select class="" name="confidentialite">
          <option value="0">Public</option>
          <option value="1">Seulement les amis</option>
          <option value="2">Moi-même</option>
        </select>
        <br><br>

    	<div class ="bouton">
        <button class="button" name="submit" ><span>Poster</span></button>
    	</div>
              </fieldset>

    	</div>
        </form>


<br /> <br />

</body>
</html>
