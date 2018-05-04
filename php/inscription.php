<!DOCTYPE html>
<html>

<head>
          <meta charset = "utf-8" />
		  <link rel="stylesheet" type="text/css" href="../CSS/inscription.css"/>
          <title> Inscription </title>
</head>

<body>

                <div id="entete">
                    <a href="../index.php"> <img src = "../images/logo1.png" width="150" height="120" /> </a>
                    <a id="retour" href="../index.php"> Retour </a>
                </div>

                <p id="barre0"> </p>

          <p id="titre1"> Inscription de votre compte ECE'Raz </p>
          <p id="titre2"> Completer les champs suivants pour créer votre compte </p>

          <form id="formulaire" method="post" action="add_user.php">
                <div id="identifiants">
                  <fieldset>
                      <legend id="titre_identifiants"> Identité </legend>
                      <br>
                     <div class ="identite"> <label> Pseudo : </label>
                      <br />
                      <input id="pseudo" name="pseudo" type="text" class="reqd" onblur="validerPseudo()" required>
                      <p class="message" id="pseudo_message"></p> </div>
                      <div class ="identite"> <label> Mot de passe : </label>
                      <br>
                      <input id="mdp1" name="mdp" type="password" class="reqd" onblur="validPassword()" required>
                      <p class="message" id="mdp1_message"></p> </div>
                     <div class ="identite"> <label> Confirmer votre mot de passe : </label>
                      <br>
                      <input id="mdp2" type="password" class="reqd mdp1" onblur="crossCheck()" required>
                      <p class="message" id="mdp2_message"></p> </div>
                     <div class ="identite"> <label> Email : </label>
                      <br>
                      <input id="email" name="email" type="text" class="reqd email" onblur="validEmail()" required>
                      <p class="message" id="email_message"></p> </div>
                    </fieldset>
                </div>
                <br>
                <div id="infos">
                  <fieldset>

                    <legend id="titre_infos"> Informations personnelles </legend>
                    <br>
                    <div class ="identite"> <label> Civilité : </label>
                    <br>
                    <select name="civilite">
                      <option> M </option>
                      <option> F </option>
                    </select>
                    <br><br> </div>
                    <div class ="identite"> <label> Date de naissance (JJ/MM/AA) : </label>
                    <br>
                    <input id="naissance" name="naissance" type="date" class="reqd" min="1900-01-01" max="2004-12-31" onblur="validNaissance()" required>
                    <br><br /> </div>
                    <div class ="identite"> <label> Description (optionnel) :</label>
                    <br />
                    <input id="description" name="description" type="text" class="reqd" />
                    <br /><br /> </div>
                  </fieldset>
                </div>
              <br>
              <br>
              <div class ="bouton">
                  <button class="button" onclick="validForm()"><span>S'inscrire</span></button>
              </div>

              <br>
              <br>
              <br>
      </form>


<div class="footer">
  <footer>
    <p>
      Conditions Confidentialité ©2017-ECE'Raz
    </p>
  </footer>
</div>
</body>

</html>
