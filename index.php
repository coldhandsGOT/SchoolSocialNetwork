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
                <input id="tab1" type="radio" name="tabs" class="radio_hidden">
                <label for="tab1" class="head"><i class="fa fa-user"></i><span>LOGIN</span></label>


                <input id="tab2" type="radio" name="tabs" class="radio_hidden">
                <label for="tab2" class="head"><i class="fa fa-user-plus"></i><span>SIGN UP</span></label>

                <div class="contents">
                    <section id="content1" class="tab-content">

                                           <form id="login" role="form" method="POST" action="php/verif_connexion.php">
                                                <input type="hidden" value="login" name="tab" />
                                                    <h2>Connecter vous à L'ECE Social Network</h2>
                                                <div class="row">
                                                  
                                                   <div class="col-md-12">
                                                        <label for="email" >Adresse E-Mail </label>
                                                        <div class="input-group ">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
                                                            <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email">
                                                        </div>
                                                    <div class="col-md-12">
                                                        <label for="password" class="control-label">Password</label>
                                                        <div  class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>
                                                            <input id="password" type="password" placeholder="*********" class="form-control" name="mdp" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox2" type="checkbox" name="remember">
                                                            <label for="checkbox2">
                                                                Remember Me
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-2">
                                                            <button type="submit" class="btn btn-primary btn-login" value:"connexion">
                                                                Log In
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8 col-md-offset-2">
                                                            <button type="submit" class="btn btn-primary btn-facebook">
                                                                <i class="fa fa-facebook-square"></i> Connect with Facebook
                                                            </button>
                                                        </div>
                                                    </div><br> <br> <br> <br> <br> <br> 
                                                     <a class="btn btn-link" href='/php/reinit_passwd.php'> <br> Forgot Your Password? </a>
                                                </div>
                                                </div>
                                             </form>
                    </section>

                <!-- register -->
                    <section id="content2" class="tab-content">
                       
                                                           
                                    <form class="register" role="form" method="POST" action="{{ route('register') }}">
                                        <input type="hidden" value="register" name="tab" />
                                       
                                        <h2>Rejoigner le réseau social de L'ECE</h2>

                                        <div class="row">
                                            
                                            <div class=" col-md-4 ">
                                                     <label for="name" class="control-label">Sexe</label>
                                                     
                                                        <div class="col-md-12">
                                                            <select name="civilite" id="civilite" class="form-control"> 
                                                                        <option value="1">Male</option>
                                                                        <option value="0">Female</option>
                                                            </select>
                                                        </div>
                                                
                                            </div>

                                            <div class="col-md-12">
                                                <label for="name" class="control-label">Nickname</label>
                                                    <div class="form-group">
                                                         <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>
                                                                    <input id="pseudo" type="text" class="form-control" placeholder="Hellblade"  name="pseudo" onblur="validerPseudo()" required>
                                                         </div>
                                                    </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="name" class="control-label">Name</label>
                                                    <div class="form-group">
                                                         <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>
                                                                    <input id="name" type="text" class="form-control" placeholder="Chris"  name="name" value="{{ old('name') }}" required>
                                                         </div>
                                                    </div>
                                            </div>



                                            <div class="col-md-12">
                                                <label for="lastname" class="control-label">Lastname</label>
                                                    <div class="form-group">
                                                         <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>
                                                                    <input id="lastname" type="text" class="form-control" placeholder="Chris"  name="lastname" value="{{ old('lastname') }}" required>
                                                         </div>
                                                    </div>
                                            </div>



                                            <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="control-label">E-Mail Address</label>
                                                    <div class="form-group">
                                                         <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
                                                                    <input id="email" type="text" class="form-control" placeholder="Chris.Roberts@email.com"  name="email" value="{{ old('email') }}" required>
                                                         </div>
                                                    </div>
                                            </div>


                                           
                                            <div class="col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="control-label">Password</label>
                                                    <div class="form-group">
                                                         <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>
                                                                    <input id="password" type="password" class="form-control" placeholder="****************"  name="password" value="{{ old('password') }}" required>
                                                         </div>
                                                    </div>
                                            </div>

                                           

                                            <div class="col-md-12">
                                                <label for="password-confirm" class="control-label">Confirm password</label>
                                                    <div class="form-group">
                                                         <div class="input-group">
                                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>
                                                                    <input id="password-confirm" type="password" class="form-control"   name="password_confirmation" required>
                                                         </div>
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <button type="submit" class="btn btn-primary btn-register">
                                                        Register
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                
  <!-- 
               <form id="formulaire" method="post" action="php/add_user.php">
                <div id="identifiants">
                  <fieldset>
                      <legend id="titre_identifiants"> Identité </legend>
                      <br>
                     <div class ="identite"> <label> Pseudo : </label>
                      <br />
                      <input id="pseudo" name="pseudo" type="text" class="reqd" onblur="validerPseudo()" required>
                      <p class="message" id="pseudo_message"></p> 
                  </div>
                    
                  <div class ="identite"> <label> name : </label>
                      <br />
                      <input id="name" name="name" type="text" class="reqd" onblur="validerName()" required>
                      <p class="message" id="name_message"></p> 
                  </div>

                   <div class ="identite"> <label> lastname : </label>
                      <br />
                      <input id="lastname" name="lastname" type="text" class="reqd" onblur="validerlastname()" required>
                      <p class="message" id="lastname_message"></p> 
                  </div>





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
-->
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