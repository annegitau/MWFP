<!DOCTYPE html>
<html>
  <head>
    <title>CakieLink</title>
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
  height: 100%;
}
/* Optional: Makes the sample page fill the window. */
html, body {
  height: 100%;
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

#origin-input,
#destination-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 200px;
}

#origin-input:focus,
#destination-input:focus {
  border-color: #4d90fe;
}

#mode-selector {
  color: #fff;
  background-color: #4d90fe;
  margin-left: 12px;
  padding: 5px 11px 0px 11px;
}

#mode-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
    </style>
    <script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

function initMap() {
  var origin_place_id = null;
  var destination_place_id = null;
  var travel_mode = 'WALKING';
  var map = new google.maps.Map(document.getElementById('map'), {
   // mapTypeControl: false,
    center: {lat: 5.7629405, lng: -0.2193002},
    zoom: 13
  });
    
    setMarkers(map);
}

// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.
var bakeries = [
  ['Akorno', 5.7629405, -0.273002, 10],
  ['Cake Boutique', 5.71, -0.12, 9],
  ['Sister Bakery', 5.72, -0.28, 8],
  ['Cakeoo Bakery', 5.7, -0.24, 7],
  ['Sweet Cakes', 5.74, -0.18, 6],
 ['cake House', 5.75, -0.2193002, 5],
  ['Creamy Inn', 5.76, -0.29, 4],
  ['Heavenly Taste Bakery', 5.776, -0.18, 3],
  ['Best Cakes', 5.78, -0.26, 2],
  ['Big Ben', 5.79, -0.20, 1]
];

function setMarkers(map) {
  // Adds markers to the map.

  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.

  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
  var image = {
    url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(20, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };
  for (var i = 0; i < bakeries.length; i++) {
    var bakery = bakeries[i];
    var marker = new google.maps.Marker({
      position: {lat: bakery[1], lng: bakery[2]},
      map: map,
      icon: image,
      shape: shape,
      title: bakery[0],
      zIndex: bakery[3]
    });
       marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
  }
    
    
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  directionsDisplay.setMap(map);

  var origin_input = document.getElementById('origin-input');
  var destination_input = document.getElementById('destination-input');
  var modes = document.getElementById('mode-selector');

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(origin_input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(destination_input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(modes);

  var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
  origin_autocomplete.bindTo('bounds', map);
  var destination_autocomplete =
      new google.maps.places.Autocomplete(destination_input);
  destination_autocomplete.bindTo('bounds', map);
  
  

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, mode) {
    var radioButton = document.getElementById(id);
    radioButton.addEventListener('click', function() {
      travel_mode = mode;
    });
  }
  setupClickListener('changemode-walking', 'WALKING');
  setupClickListener('changemode-transit', 'TRANSIT');
  setupClickListener('changemode-driving', 'DRIVING');

  function expandViewportToFitPlace(map, place) {
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }
  }

  origin_autocomplete.addListener('place_changed', function() {
    var place = origin_autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
    expandViewportToFitPlace(map, place);

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    origin_place_id = place.place_id;
    route(origin_place_id, destination_place_id, travel_mode,
          directionsService, directionsDisplay);
  });

  destination_autocomplete.addListener('place_changed', function() {
    var place = destination_autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
    expandViewportToFitPlace(map, place);

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    destination_place_id = place.place_id;
    route(origin_place_id, destination_place_id, travel_mode,
          directionsService, directionsDisplay);
  });

  function route(origin_place_id, destination_place_id, travel_mode,
                 directionsService, directionsDisplay) {
    if (!origin_place_id || !destination_place_id) {
      return;
    }
    directionsService.route({
      origin: {'placeId': origin_place_id},
      destination: {'placeId': destination_place_id},
      travelMode: travel_mode
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
}</script>
         
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
  <body>
	<div>
		<nav>
			<div class="navbar-wrapper container">
				<ul class="left">
					<li><a href="index.php" class="brand-logo">CakieLink</a></li>
				</ul>
                        <ul class="right">
							<li><a href="logout.php">Logout</a> </li>
                        </ul>
                    </div>
                </nav>
	<?php 
			if (isset($_SESSION['message'])){
				echo "<div id='error_msg'>".$_SESSION['message']."</div>";
				unset($_SESSION['message']);
			}
		?>
    </div><!--header-->
	<input id="origin-input" class="controls" type="text"
    placeholder="Enter an origin location">

<input id="destination-input" class="controls" type="text"
    placeholder="Enter a destination location">

<div id="mode-selector" class="controls">
  <input type="radio" name="type" id="changemode-walking" checked="checked">
  <label for="changemode-walking">Walking</label>

  <input type="radio" name="type" id="changemode-transit">
  <label for="changemode-transit">Transit</label>

  <input type="radio" name="type" id="changemode-driving">
  <label for="changemode-driving">Driving</label>
  <input id="pac-input" class="controls" type="text" placeholder="Search Box">
</div>
<div id="map"></div>

		<div class="row">
                <div class="col s12 ">
                    <div class="card-panel">
                        <center><div class="row">						
							<h5>LOOKING FOR THE BEST BAKERY AROUND YOU?</h5>
							<p>
							Click on the markers on the map 
							</p>
							 </div></center>
                    
                        </div>
                    </div>
                </div>
            
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3uWsyi1YW89TEHDPUBpMbjX3Uj3lD0Vo&libraries=places&callback=initAutocomplete" async defer></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3uWsyi1YW89TEHDPUBpMbjX3Uj3lD0Vo&libraries=places&callback=initMap" async defer></script>
	
  </body>
</html>