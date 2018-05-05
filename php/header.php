<head>
          <meta charset = "utf-8" />
          <title> Chronologie </title>
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




<div id="app">
  

              <nav class="navbar navbar-inverse">
                  <div class="container-fluid">

                      <div class="navbar-header">
   
                          <!-- Collapsed Hamburger -->
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                              <span class="sr-only">Toggle Navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>

                          <!-- Branding Image -->
                          <a class="navbar-brand" href="chronologie.php">
                              <img style ="margin-left:-120px" src="../images/logo.png" alt="" />
                          </a>
                      </div>


                      <div class="collapse navbar-collapse" id="app-navbar-collapse">
                           

                            <!-- Left Side Of Navbar -->
                            <div class="navbar-form navbar-left">
                                <form id="custom-search-input" method="post" action="recherche.php">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control input-lg" name="recherche_pseudo" placeholder="search..." />
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="button" onclick="validForm()">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                           </div>


                          <!-- Right Side Of Navbar -->
                          <ul class="nav navbar-nav navbar-right">
                                 <ul class="nav navbar-nav">
                                <li><a href="chronologie.php">Home</a></li>
                                <li><a href="poster.php">Messages</a></li>
                                <li><a href="photos.php">Photos</a></li>
                                
                              </ul>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle parent" data-toggle="dropdown" role="button" aria-expanded="false">

                                      <img src="#" alt="" />
                                     <?php echo $_SESSION["pseudo"] ?> <span class="caret"></span>
                                  </a>

                                  <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="user.php">
                                              <i class="fa fa-user"></i> Mon profil
                                          </a>
                                      </li>

 
                                       <li>
                                          <a href="modif_user.php">
                                              <i class="fa fa-cog"></i> Reglages
                                          </a>
                                       </li>


                                       <li>
                                          <a id="retour" href="deconnexion.php" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                               <i class="fa fa-sign-out"></i> Déconnexion
                                          </a>
                                          <form id="logout-form" action="deconnexion.php" method="POST" style="display: none;">
                                          </form>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>


              
          </div>
</head>
