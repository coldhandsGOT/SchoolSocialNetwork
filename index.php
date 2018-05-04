<!--
<!DOCTYPE html>
<html>

<head>
  <meta charset = "utf-8" />
   <link rel="stylesheet" type="text/css" href="CSS/index.css"/>
  <title>ECE'Raz</title>
</head>
<body>

<div>

 <div class = "titre1"> <h1>Bienvenue dans ECE'Raz</h1> </div>
 <div class = "logo"> <img src = "images/logo1.png" width="250" height="200" /> </div>
 <div class = "titre2"> <h2>Laissez vous submerger</h2> </div>

  
 

</div>



</body>


<!-- Pied de page --><!--
<div class="footer">
	<footer > <p> Conditions Confidentiality ©2017-ECE'Raz </p>  </footer>
</div>

</html>
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title> ECE Social Network</title>

    <!-- Styles -->
   
    <link href='plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet">
    <link href='plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet">
    <link href= 'plugins/bootstrap/css/bootstrap-theme.min.css' rel="stylesheet">
    <link href='css/guest.css' rel="stylesheet">
</head>
<body>

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Bienvenue au réseau sociale de L'ECE de Paris!
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            
                <img src='images/guest_logo.png' alt="" />
            </a>
        </div>

        <div class="col-md-6">


            <div class="tab_container">
                <input id="tab1" type="radio" name="tabs" {{ old('tab') != 'register' ? 'checked' : '' }} class="radio_hidden">
                <label for="tab1" class="head"><i class="fa fa-user"></i><span>LOGIN</span></label>


                <input id="tab2" type="radio" name="tabs" {{ old('tab') == 'register' ? 'checked' : '' }} class="radio_hidden">
                <label for="tab2" class="head"><i class="fa fa-user-plus"></i><span>SIGN UP</span></label>

                <div class="contents">
                    <section id="content1" class="tab-content">

                        <form  id="login" method="post" action="php/verif_connexion.php">
                            <div class ="loginclasse"> Adresse E-mail:<br />
                              <input type="text" name="email" /><br /> </div>
                               <div class ="loginclasse"> mot de passe:<br />
                                 <input type="password" name="mdp" /><br /> </div>
                           <div class ="loginclasse"> <input type="submit" value="connexion"> </div>
                        </form>

                    </section>

                    <section id="content2" class="tab-content">
                       
                           <div class="classe1">  pas encore inscrit?  </div>
                          <div class = "inscription"> <a id="inscription" href="php/inscription.php"> Inscrivez-vous! </a> </div>

                    </section>
                </div>
            </div>



        </div>

    </div>


</div>


<!-- Scripts -->
<script src='plugins/jquery/jquery-3.2.1.min.js'></script>
<script src='plugins/bootstrap/js/bootstrap.min.js'></script>
</body>
</html>