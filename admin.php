<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */

h2{
 text-align: center;
 margin: 0px auto;  
 margin-top: 2%;
 margin-bottom: 2%; 
}

body{
    text-align: center;
}
/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin: 0px auto;
    display: block;
    text-align: center;
}

button:hover {
    opacity: 0.8;
}


/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */

img.avatar {
    width: 40%;
    border-radius: 50%;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    text-align: center;
    margin: 0px auto;
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>
    
<!-- <script>
function resetForm(){
	document.getElementById("contact_done").reset();
}
</script> -->
<?php
function checkName($uname){
	
	$uname = trim($uname);
	$uname = stripcslashes($uname);
	$uname = htmlspecialchars($uname);
	
	if (empty($uname)) {
		return false;
	}
	return true;
}


$validName = $validInput = false;
$uname = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$uname = $_POST['username'];
	$ip=$_POST[$_SERVER['HTTP_CLIENT_IP']];
	
	$validName = checkName($uname);
	
	$validInput = $validName;
}

if ($validInput) {
	
	$servername = "localhost";
	$uname = "root";
	$psw = "mysql";
	$databaseName = "OvercrowdDB";
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	
	$connection = new mysqli($servername, $uname, $psw, $databaseName);
	
		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
		
	$insertSQL = "INSERT INTO AdminLogin (username, password) VALUES ('$uname', '$psw')";

	if ($connection->query($insertSQL) === TRUE) {
		echo "Success: We will submit the following information <br>";
		echo $uname . "<br>";
		echo $psw . "<br>";
		
	}
	else {
		echo "Error: " . $insertSQL . "<br>" . $connection->error; 
	}

	$connection->close();
	
}
else {
	?>


<div id="id01" class="modal">

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
      function onSignIn(googleUser){
      var profile=googleUser.getBasicProfile();
      $(".g-signin2").css("display", "none");
      $(".data").css("display", "block");
      $("#pic").attr('src', profile.getImageUrl());
      $("#email").text(profile.getEmail());
    }
    </script>


    <script>
        function signOut(){
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function()){
                alert("You have been successfully signed out!");

                $(".g-signin2").css("display","block");
                $(".data").css("display","none");
            }
        }
    </script>

    <meta name="google-signin-client_id" content="663095738920-fim1c65ta26o7tt39dbr4j048vn4c46h.apps.googleusercontent.com">

    <script type="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="script.js"></script>
    <style>
      .g-signin2{
        margin: 0px auto;
        display: block;
        text-align: center;
        max-width: 6%;
      }
    </style>

<div class="g-signin2" data-onsuccess="onSignIn"></div>
<div class="data">
  <p id="email" class="alert-danger"></p>
  <button onclick="signOut()" class="btn btn-danger" style="width: auto; text-align:center";>Sign Out</button>
</div>


<?php
}?>

</div>

<h2>ADMIN LOGIN</h2>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>