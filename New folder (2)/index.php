<!DOCTYPE html>
<html>
  <head>
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
		<meta name="msapplication-tap-highlight" content="no">
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

		<!-- Path to your custom app styles-->
		<link rel="stylesheet"  href="css/jquery.mobile.structure.css" />
		<link rel="stylesheet" href="css/jquery.mobile.theme.css" />
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
     <style>
     /* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
#map {
  height: 90%;
}
/* Optional: Makes the sample page fill the window. */
html, body {
  height: 90%;
  margin: 0;
  padding: 0;
}
    </style>
    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 12
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('HELLO THERE! WE FOUND YOU');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}
   </script>
         
		<script src="scripts/jquery.js"></script>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="scripts/platformOverrides.js"></script>
        <script type="text/javascript" src="scripts/index.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript"src="js/materialize.min.js"></script>
		<!-- your scripts here -->
		
		<script src="scripts/jquery.mobile.js"></script>
        
		
        <title>ChurchLink</title>
      
        
    </head>
  <body onload="initialize()">
	<div>
		<nav>
            <div class="navbar-wrapper container">
				<ul class="left">
					
					<li><a href="index.php" class="brand-logo">Church Link</a></li>
				</ul>
                
                    </div>
                </nav>
            <!--div class ="header">
		<center><img src="logo.png"></center>
	</div-->
	<?php 
			if (isset($_SESSION['message'])){
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>
    </div><!--header-->
	
    <div id="map"></div>
		<div class="row">
                <div class="col s12 ">
                    <div class="card-panel">
                        <center><div class="row">						
							<h5>WELCOME TO CHURCH LINK</h5>
							<h6>
							The best platform to locate Churches around you.
							LOGON or SIGN UP to Continue.
							</h6>
							<button class="btn waves-effect waves-light" type="submit" name="action" ><a href= "login.php">Login</a></button>
							<button class="btn waves-effect waves-light" type="submit" name="action" ><a href= "signup.php">Sign Up</a></button>
							 </div></center>
                    
                        </div>
                    </div>
                </div>
            
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3uWsyi1YW89TEHDPUBpMbjX3Uj3lD0Vo&libraries=places&callback=initMap" async defer></script>
	<script>
			var userAgent = navigator.userAgent + '';
			if (userAgent.indexOf('iPhone') > -1) {
				document.write('<script src="js/lib/cordova-iphone.js"></sc' + 'ript>');
				var mobile_system = 'iphone';
			} else if (userAgent.indexOf('Android') > -1) {
				document.write('<script src="js/lib/cordova-android.js"></sc' + 'ript>');
				var mobile_system = 'android';
			} else {
				var mobile_system = '';
			}
		</script>

  </body>
</html>