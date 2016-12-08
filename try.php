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
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
    </style>
    <script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var map;
            var geocoder;
            function initialize()
            {
                var myLatlong   =   new google.maps.LatLng(9.9312328, 76.2673041);
                var myOptions   =   {
                                        zoom:8,
                                        center:myLatlong,
                                        mapTypeId:google.maps.MapTypeId.ROADMAP
                                    };
               map          =   new google.maps.Map(document.getElementById('map_canvas'),myOptions);
               geocoder      =   new google.maps.Geocoder();   
            }
            
          $(document).ready(function(){
              $("#autocomplete").autocomplete({
                  source:function(request,response){
                      geocoder.geocode({'address':request.term},function(results){
                          response($.map(results,function(item){
                              return {
                                 label:item.formatted_address,
                                 value:item.formatted_address,
                                 latitude:item.geometry.location.lat(),
                                 longitude:item.geometry.location.lng(),
                              }
                              
                          }))
                      })
                 },
                  select:function(event,ui) {
                    var location    =   new google.maps.LatLng(ui.item.latitude,ui.item.longitude);
                    marker          =   new google.maps.Marker({
                        map:map,
                        draggable:true
                    })
                   var stringvalue     =   'latitude:<input type="text" value="'+ui.item.latitude+'" >Longitude:<input type="text" value="'+ui.item.longitude+'"><br/>';
                    $("#value").append(stringvalue);
                    marker.setPosition(location);
                    map.setCenter(location);
                    
                    
                }
                  
              })
          
            });
   </script>
         
		<script src="scripts/jquery.js"></script>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="scripts/platformOverrides.js"></script>
        <script type="text/javascript" src="scripts/index.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript"src="js/materialize.min.js"></script>
		<!-- your scripts here -->
		
		<script src="scripts/jquery.mobile.js"></script>
        
		
        <title>CakieLink</title>
        
    </head>
  <body onload="initialize()">>
	<div>
		<nav>
			<div class="navbar-wrapper container">
				<ul class="left">
					<li><a href="index.php" class="brand-logo">CakieLink</a></li>
				</ul>
                        <ul class="right">
							<li><a href="signup.php">Sign Up</a> </li>
							<li>/<a href="login.php">Login</a> </li>
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
	<div>
	<table>
		<tr>
		<td><input id="autocomplete" class="controls" type="text" placeholder="Search Box"></td>
		<td><input id="origin-input" class="controls" type="text"placeholder="Enter an origin location"></td>
		<td><input id="destination-input" class="controls" type="text"placeholder="Enter a destination location"></td>
		</tr>
		<div id="mode-selector" class="controls">
      <input type="radio" name="type" id="changemode-walking" checked="checked">
      <label for="changemode-walking">Walking</label>

      <input type="radio" name="type" id="changemode-transit">
      <label for="changemode-transit">Transit</label>

      <input type="radio" name="type" id="changemode-driving">
      <label for="changemode-driving">Driving</label>
    </div>
	
	
	</table>
	</div>
    <div id="map"></div>
		<div class="row">
                <div class="col s12 ">
                    <div class="card-panel">
                        <center><div class="row">						
							<h5>WELCOME TO CAKIE LINK</h5>
							<p>
							The best platform to locate bakeries around you.
							Click on the marker to view Bakery details and services.
							</p>
							<button class="btn waves-effect waves-light" type="submit" name="action" ><a href= "login.php">Login</a></button>
							<button class="btn waves-effect waves-light" type="submit" name="action" ><a href= "signup.php">Sign Up</a></button>
							 </div></center>
                    
                        </div>
                    </div>
                </div>
            
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3uWsyi1YW89TEHDPUBpMbjX3Uj3lD0Vo&libraries=places&callback=initMap" async defer></script>
	
  </body>
</html>