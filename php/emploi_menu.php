
  <link href='../CSS/emploi_menu.css' rel="stylesheet">
<div class="grid-block">



   <div class="flip-container">
      <div id="f1" class="flip-card shadow">
        <div class="front-face">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Cost Pie">
          <br><br>  <span>Finances</span>
        </div>
        <div class="back-face-center">
          <p>
           <br> Working with our clients, building financial models to establish value for money for business-as-usual and key investment decisions.
          </p>
        </div>
      </div>
  </div>



  <div class="flip-container">
    <div id="f2" class="flip-card shadow">
      <div class="front-face">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Code">

        <span>Systèmes d'informations</span>
      </div>
      <div class="back-face-center">
        <p>
        <br><br>  Using industry standard software packages to deliver unique and bespoke software solutions for an array of clients.
        </p>
      </div>
    </div>
  </div>


  
  <div class="flip-container">
    <div id="f3" class="flip-card shadow">
      <div class="front-face">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Inspect Data">
        <span>Data Analytics &amp; Big Data</span>
      </div>
      <div class="back-face-center">
        <p>
          Analyse <br> &amp; <br>interprétation d'énormes quantités de données, les rendant présentable, utilisables et smart business information.
        </p>
      </div>
    </div>
  </div>
  <div class="flip-container">
    <div id="f4" class="flip-card shadow">
      <div class="front-face">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Mind Cogs">
        <span>Business Process Improvement</span>
      </div>
      <div class="back-face-center">
        <p>
        <br>  Working with our clients to help optimise the processes they operate, allowing them to achieve higher levels of efficiency.
        </p>
      </div>
    </div>
  </div>
  <div class="flip-container">
    <div id="f5" class="flip-card shadow">
      <div class="front-face">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/9487/trans.png" alt="Stacked Squares">
        <span>Robotique <br> &amp;<br> Traitement de signal</span>
      </div>
      <div class="back-face-center">
        <p>
          Understanding, modelling and demonstrating leaner ways to manage and forecast inventory through a product life cycle.
        </p>
      </div>
    </div>
  </div>
</div>



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
