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


     <section id="services" class="section section-padded">
    <div class="container">
      <div class="row text-center title">
        <h2>Services</h2>
        <h4 class="light muted">Achieve the best results with our wide variety of training options!</h4>
      </div>
      <div class="row services">
        <div class="col-md-4">
          <div class="service">
            <div class="icon-holder">
              <img src="img/icons/heart-blue.png" alt="" class="icon">
            </div>
            <h4 class="heading">Cardio Training</h4>
            <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <div class="icon-holder">
              <img src="img/icons/guru-blue.png" alt="" class="icon">
            </div>
            <h4 class="heading">Yoga Pilates</h4>
            <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service">
            <div class="icon-holder">
              <img src="img/icons/weight-blue.png" alt="" class="icon">
            </div>
            <h4 class="heading">Power Training</h4>
            <p class="description">A elementum ligula lacus ac quam ultrices a scelerisque praesent vel suspendisse scelerisque a aenean hac montes.</p>
          </div>
        </div>
      </div>
    </div>
  </section>





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

