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
                                                            <select name="gender" id="gender" class="form-control"> 
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