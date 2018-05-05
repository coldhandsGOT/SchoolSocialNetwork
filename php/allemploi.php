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


      <div id ="carousel-metiers"  class="carousel slide" data-ride="carousel" data-interval="false">
      <!-- Indicators -->
        <ol class="carousel-indicators" style="margin-top:30px">
        <li data-target="#carousel-metiers" data-slide-to="0"  class="active"> </li>
        <li data-target="#carousel-metiers" data-slide-to="1"  class> </li>
        </ol>
      <!-- Wrappers for slide -->
      <div class="carousel-inner" role="listbox">
        <div class="row item active"> 
          <div class="col-md-4 ">
            <a href="#" class="portfolio-link" data-toggle="modal"> 
            <div class="service">
            <div class="icon-holder">
              <img src="img/icons/desk_trading.jpg" alt="" class="icon">
            </div>
            <h4 class="heading">Ddsadsadsada</h4>
            <p class="description"> dasdsadsa</p>
          </div>
          </a>  
         </div>
         <div class="col-md-4 ">
          <a href="#" class="portfolio-link" data-toggle="modal"> 
          <div class="service">
            <div class="icon-holder">
              <img src="img/icons/algo.jpeg" alt="" class="icon">
            </div>
            <h4 class="heading">dsadsadsaer</h4>
            <p class="description"> Edsadsadsad’applidasdsadsaisé.</p>
          </div>
          </a>
         </div>
         </div>
         </div>





<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


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

