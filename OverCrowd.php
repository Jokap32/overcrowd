<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="OverCrowdStyle.php">
<body id="myPage">

<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal">Close
    <i class="fa fa-remove"></i>
  </a>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
  <a href="#" class="w3-bar-item w3-button">Link 4</a>
  <a href="#" class="w3-bar-item w3-button">Link 5</a>
</nav>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
     <a href="#" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>OverCrowd</a>
  <a href="#team" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Team</a>
  <a href="#crowded" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Crowds</a>
  <a href="#pricing" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Price</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>

    </div>
  </div>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="#team" class="w3-bar-item w3-button">Team</a>
    <a href="#crowded" class="w3-bar-item w3-button">Crowds</a>
    <a href="#pricing" class="w3-bar-item w3-button">Price</a>
    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    <a href="#" class="w3-bar-item w3-button">Search</a>
  </div>
</div>

<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
    
<!-- Google Maps -->
    <!-- alexreb77@hotmail.com, Bne8t74k8-->

<div id="googleMap" style= "width: 100%; height: 420px;" ></div>
    
<script>

      var marker = new google.maps.Marker({
    position: myCenter,
  });
    
function myMap()
{
    <!-- Variable to store zipcode from api as location -->
    
  myCenter=new google.maps.LatLng(40.5, -87.6);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  marker.setMap(map);    
}
    
function moveToLocation(lat, lng){
    var myCenter = new google.maps.LatLng(lat, lng);
    // using global variable:
    map.panTo(myCenter);
}

function changeMarkerPosition(marker) {
    var latlng = new google.maps.LatLng(40.748774, -73.985763);
    marker.setPosition(Zipcode);
}
    
myMap();
</script>
    
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgWc5mUhyrIwyRYQNxPbgqtc1VhwoNjRs&callback=myMap"></script>

  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">Enter Your Zipcode</button>
  </div>
    
    </div>



<!-- Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Enter your zip-code</h4>
      <h5>So we can find locations nearest to you</h5>
    </header>
      
      
    <!-- Area for zipcode api searching -->
    <div class="w3-container">
        
        <!-- ZIPCODE API -->
        <!--
        <script src="https://www.zipcodeapi.com/rest/<DIzi2vqow6t7tlk51sYGPsOoSwvxy0aDXWksdULV92DX5qbQhSNNGyfhCSHe0T3x>/radius.<format>/<zip_code>/<radius>/<units>">
        
        </script>-->
        
        <script src="https:/ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
        function checzip(form)
            {
                var a = document.forms["Zipcode"]["myfield1"].value;
                
                Check = /^\d{5}$/;
                if(!a.match(Check)) {
                    alert("Error: Check Zip-code");
                    return false;
                }
            }
        
        </script>
<!-- Form to submit zipcode -->        
        <div class="wrap">
            <div class="search">
                
                <form id="Zipcode" onsubmit="return checzip(this);" method="post" action="">
                <input type="text" name="fld1" id="myfield1">
                    <i class="fa fa-search"></i>
                </form>
                
            </div>
        </div>  
      
    </div>
    <footer class="w3-container w3-teal">
      <p>Thank you! </p>
    </footer>
  </div>
</div>



<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="crowded">

<div class="w3-row-padding w3-center w3-padding-64" id="crowded">
<h2>How Crowded?</h2>
    <p>See how crowded each bar is before you leave.</p><br>

</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <div class="w3-container">
  <h3>Bar 1</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
    <button style="background-color:#313133; color:white" >Go To Website</button>

  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <div class="w3-container">
  <h3>Bar 2</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
    <button style="background-color:#313133; color:white" >Go To Website</button>

  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <div class="w3-container">
  <h3>Bar 3</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
    <button style="background-color:#313133; color:white" >Go To Website</button>

  </div>
  </div>
</div>
    
<div class="w3-quarter">
<div class="w3-card w3-white">
  <div class="w3-container">
  <h3>Bar 4</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
    <button style="background-color:#313133; color:white" >Go To Website</button>

  </div>
  </div>
</div>

</div>

<!-- Container -->
<div class="w3-container" style="position:relative">
  <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
  style="position:absolute;top:-28px;right:24px">+</a>
</div>

<!-- Pricing Row -->
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h2>DEALS</h2>
    <p>Look at the closest bars deals near you.</p><br>
    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">Bar 1</p>
        </li>
          <li class="w3-padding-16"><b>Monday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Tuesday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Wednesday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Thursday: </b> DEALS</li>
        <li class="w3-padding-16"><b>Friday: </b> DEALS </li>
        <li class="w3-padding-16"><b>Saturday: </b> DEALS </li>
        <li class="w3-padding-16"><b>Sunday: </b> DEALS</li>  
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa fa-usd"></i> 10</h2>
          <span class="w3-opacity">Deal of the week</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large"> Visit Website</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">Bar 2</p>
        </li>
        <li class="w3-padding-16"><b>Monday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Tuesday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Wednesday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Thursday: </b> DEALS</li>
        <li class="w3-padding-16"><b>Friday: </b> DEALS </li>
        <li class="w3-padding-16"><b>Saturday: </b> DEALS </li>
        <li class="w3-padding-16"><b>Sunday: </b> DEALS</li>  
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa fa-usd"></i> 25</h2>
          <span class="w3-opacity">Deal of the Week</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large">Visit Website</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">Bar 3</p>
        </li>
          <li class="w3-padding-16"><b>Monday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Tuesday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Wednesday: </b> DEALS</li>
          <li class="w3-padding-16"><b>Thursday: </b> DEALS</li>
        <li class="w3-padding-16"><b>Friday: </b> DEALS </li>
        <li class="w3-padding-16"><b>Saturday: </b> DEALS </li>
        <li class="w3-padding-16"><b>Sunday: </b> DEALS</li>  
        <li class="w3-padding-16">
          <h2 class="w3-wide"><i class="fa fa-usd"></i> 50</h2>
          <span class="w3-opacity">Deal of the Week</span>
        </li>
        <li class="w3-theme-l5 w3-padding-24">
          <button class="w3-button w3-teal w3-padding-large">Visit Website</button>
        </li>
      </ul>
    </div>
</div>

<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Swing by for a cup of coffee, or whatever.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Chicago, US</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="Name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="Email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="Message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="Like">
      <label>I Like it!</label>
      <button type="submit" class="w3-button w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>
</div>

<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
<!-- Team Container -->
<div class="w3-container w3-padding-64 w3-center" id="team">
<h2>OUR TEAM</h2>
<p>Meet the team - our office rats:</p>

<div class="w3-row"><br>

<div class="w3-quarter">
  <img src="images/boss-baby-point.png" alt="Boss" style="width:45%; margin-bottom: 11%;" class=" w3-hover-opacity">
  <h3>John Kapoian</h3>
  <p>Web Designer</p>
</div>

<div class="w3-quarter">
  <img src="images/Kristian.png" alt="Boss" style="width:45%; margin-bottom: 6%;" class=" w3-hover-opacity">
    <h3>Kristian Hill</h3>
  <p>Support</p>
</div>

<div class="w3-quarter">
  <img src="images/Boss-Image-400.png" alt="Boss" style="width:45%" class="w3-hover-opacity">
  <h3>Alex Rebmann</h3>
  <p>Pinkies In</p>
</div>

<div class="w3-quarter">
  <img src="images/MikeLu.png" alt="Boss" style="width:45%; margin-bottom: 18%;" class=" w3-hover-opacity">
  <h3>Mike Lu</h3>
  <p>Fixer</p>
</div>

</div>
</div>
    
<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>OverCrowd <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "300px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}

// Close side navigation
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
