
<div class="emplois">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>


<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="../img/emploi.png" style="width:100%">
  <img class="mySlides" src="../img/emploi2.png" style="width:100%">
  <img class="mySlides" src="../img/emploi3.png" style="width:100%">
</div>





<form action="emploi_offres.php" method="post">
<div class="container">
    <div class="row">    
        <div class="col-xs-8 col-xs-offset-2">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#SI">Systemes d'informations</a></li>
                      <li><a href="#FI">Finances</a></li>
                      <li><a href="#R">Robotique</a></li>
                      <li><a href="#BD">Big Data</a></li>
                      <li><a href="#SE">Systèmes Embarqués</a></li>

                      <li class="divider"></li>
                      <li><a href="#all">Anything</a></li>
                    </ul>
                </div>
                
            
              

        
                <input type="text" class="form-control" name="search" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
	</div>
</div>
  </form>


  <?php include 'emploi_menu.php' ?>





<?php if($_SESSION["status"]==0)  { ?>

         <center>
             <h4>
                <button class= "btn btn-info" data-toggle="modal" data-target="#open-application">
                     &#43; &nbsp; Déposez une candidature 
                </button>
            </h4>
         </center>
        <?php } else { ?>

                            <center>
                                 <h4>
                                    <button class= "btn btn-info" data-toggle="modal" data-target="#open-offre">
                                         &#43; &nbsp; Déposer un emploi
                                    </button>
                                </h4>
                             </center>

         <?php } ?>




<div class="modal fade"  id="open-application"role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><h4 class="modal-title">Déposer une candidature </h4></center>
            </div>

            <div class="modal-body modal-body-spontaneous">
                <form action="emploi_candidature.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label  for="name_candid" class="col-sm-3 control-label">Prenom* : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_candid" name="name_candid"  required data-validation-required-message="Veuillez entrer vos prénom et nom."/> 
                            <p class="help-block text-danger"></p> 
                        </div>
                    </div>

                   <div class="form-group">
                        <label  for="lastname_candid" class="col-sm-3 control-label">Nom* : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname_candid" name="lastname_candid" required data-validation-required-message="Veuillez entrer vos prénom et nom."/> 
                          <p class="help-block text-danger"></p> 
                        </div>
                    </div>


         
                           
                    <div class="form-group">
                        <label for ="mail_candid" class="col-sm-3 control-label">Email* : </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="mail_candid" name="mail_candid" required data-validation-required-message="Veuillez entrer votre email."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

  
                    <div class="form-group">
                        <label for ="tel_candid" class="col-sm-3 control-label" data-validation-number-message="Veuillez entrer un numéro de téléphone valide.">Téléphone : </label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="tel_candid" name="tel_candid" />
                        </div>
                    </div>

                      <div class="form-group">
                        <label  for="poste_candid" class="col-sm-3 control-label">Poste : </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="poste_candid" name="poste_candid" rows="1" ></textarea>  
                            <p class="help-block text-danger"></p> 
                        </div>
                    </div>

                      
                    <div class="form-group">
                        <label for"cv_candid" class="col-sm-3 control-label">CV* : </label>
                        <div class="col-sm-9">
                            <input type="file" id="cv_candid" name="cv_candid" value="<?php echo  $_SESSION['cv_candid'] ?>" required data-validation-required-message="Veuillez ajouter votre CV." /> 
                            <p class="help-block text-danger"></p>
                            <p class="help-extension text-danger"></p> 
                        </div>
                    </div>
                              
                   

                    <div class="form-group">
                        <label  for ="message_candid" class="col-sm-3 control-label">Message : </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="message_candid" name="message_candid" rows="6" ></textarea> 
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
      

                    <center>
                        <button type="button" id="fermer" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type "submit" id="submit" name="submit" type="submit" class="btn btn-primary" >Soumettre</button>
                    </center>
                
                </form>
            </div>
        </div>
    </div>
</div>




<!--  DEPOT D'OFFRES D'EMPLOIS  -->


<div class="modal fade"  id="open-offre"role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><h4 class="modal-title"> Ajouter une offre d'emploi </h4></center>
            </div>

            <div class="modal-body modal-body-spontaneous">
                <form action="emplois_add.php" method="post">

                       
                        <div class="form-group">
                             <label for="speciality" class="control-label">Speciality</label>
                              <div class="col-md-12">
                            <select name="speciality" id="speciality" class="form-control"> 
                                    <option value="SI">Systemes d'informations</option>
                                    <option value="F">Finances</option>
                                    <option value="R">Robotique</option>
                                    <option value="BD">Big Data</option>
                                    <option value="SE">Systèmes Embarqués</option>
                            </select>
                            </div>
                         </div>


                         <div class="form-group">
                             <label for="contrat" class="control-label">Type de contrat</label>
                              <div class="col-md-12">
                            <select name="contrat" id="contrat" class="form-control"> 
                                    <option value="0">CDD</option>
                                    <option value="1">CDI</option>
                                    <option value="2">Stage</option>
                            </select>
                            </div>
                         </div>


                         <div class="form-group">
                            <label for="poste"> Poste </label>
                            <input type="text" name ="poste" class="form-control">
                        </div>


                         <div class="form-group">
                            <label for="entreprise"> Entreprise </label>
                            <input type="text" name ="entreprise" class="form-control">
                        </div>

                         <div class="form-group">
                            <label for="address"> Adresse </label>
                            <input type="phone" name ="address" class="form-control" >
                        </div>

                         <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="text" name ="email" value="" class="form-control" >
                        </div>

                         <div class="form-group">
                            <label for="contenu"> Description </label>
                            <input type="text" name ="contenu"  class="form-control" >
                        </div>

                        
                       <div class="form-group">
                         <p class="text-center">
                        <button type="button" id="fermer" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button class ="btn btn-primary btn-lg" type="submit"> Submit </button>
                        </p>
                     </div>


                    </form>
            </div>
        </div>
    </div>
</div>



<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

</div>