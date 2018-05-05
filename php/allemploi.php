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


<div class="container">
    <div class="row">    
        <div class="col-xs-8 col-xs-offset-2">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Contains</a></li>
                      <li><a href="#its_equal">It's equal</a></li>
                      <li><a href="#greather_than">Greather than ></a></li>
                      <li><a href="#less_than">Less than  </a></li>
                      <li class="divider"></li>
                      <li><a href="#all">Anything</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
	</div>
</div>


  <center><h4>
    
<button class= "btn btn-info" data-toggle="modal" data-target="#open-application">
                &#43; &nbsp; Déposez une candidature 
            </button>

</h4></center>


<div class="modal fade"  id="open-application"role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center><h4 class="modal-title">Déposer une candidature </h4></center>
            </div>
            <div class="modal-body modal-body-spontaneous">
                <form action="emploi_candidature.php" method="post" class="form-horizontal" role="form" >
                    <div class="form-group">
                        <label  for="name" class="col-sm-3 control-label">Prénom Nom* : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Veuillez entrer vos prénom et nom."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for ="mail" class="col-sm-3 control-label">Email* : </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="mail" name="mail" required data-validation-required-message="Veuillez entrer votre adresse email."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for ="tel" class="col-sm-3 control-label" data-validation-number-message="Veuillez entrer un numéro de téléphone valide.">Téléphone : </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="tel" name="tel"/>
                        </div>
                    </div>

                      <div class="form-group">
                        <label  for="poste" class="col-sm-3 control-label">Poste* : </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="poste" name="poste" rows="1" required data-validation-required-message="Veuillez entrer le poste souhaite."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for"cv" class="col-sm-3 control-label">CV* : </label>
                        <div class="col-sm-9">
                            <input type="file" id="cv" name="cv" required data-validation-required-message="Veuillez ajouter votre CV."/>
                            <p class="help-block text-danger"></p>
                            <p class="help-extension text-danger"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for ="message" class="col-sm-3 control-label">Message* : </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="message" name="message" rows="6" required data-validation-required-message="Veuillez entrer un message."></textarea>
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




<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>


<script >

    // Popup Form Init
    var i = 0;
    var interval = 0.15;
    $('.popup-form .dropdown-menu li').each(function() {
      $(this).css('animation-delay', i + "s");
      i += interval;
    });
    $('.popup-form .dropdown-menu li a').click(function(event) {
      event.preventDefault();
      $(this).parent().parent().prev('button').html($(this).html());
    });


</script>

<script >
$(".widget").click(function () {
  var $flipper = $(this).find(".flipper");
  $flipper.toggleClass("flipper-click");
});



</script>