<!-- if not logged in, they can't see the page -->

<!-- locations page uses geolocation and the places library of google api to show
markers at every place that google considers a restaurant -->


<?php
	$db_conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($db_conn, "login_db");
	session_start();
	if(!isset($_SESSION['active'])){
		header("Location: index.php");  //  back to login page
	}
?>

<!DOCTYPE>

<html>

<head>
  <title>Good Eats: Locations</title>
  <link rel="stylesheet" href="final.css"/>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places"></script>
	<script type="text/javascript">
	var canvas;
	var map;
	var infowindow;

//USED CODE FROM GOOGLE API PLACES LIBRARY NEARBY search
//changed the code so that it uses the lat and long of cape may and
//altered the zoom to fit the city
//also changed the type to restaurants so that is what the markers appear as
function initMap() {
  var pyrmont = {lat: 38.9487, lng: -74.9218};

  map = new google.maps.Map(document.getElementById('mapholder'), {
    center: pyrmont,
    zoom: 13
  });

  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: pyrmont,
    radius: 800,
    type: ['restaurants']
  }, callback);
}

function callback(results, status) {
	console.log(results);
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}

	</script>
</head>

<body onload="initMap()">
  <div id="wrap">
    <div class="header">
      <h1 class = "title"> ~ Good Eats ~</h1>
      <p class = "subtitle"> A Guide to Eateries in Cape May, NJ </p>
    </div>
    <div class = "menu">
      <p class = "nav">
				<a href="home.php" class="nav"> Home </a>
        <a href="reviews.php" class="nav"> Review a Restaurant </a>
        <a href="rest.php" class="nav"> Recommendations </a>
				<a href="live.php" class="nav"> Live Feed </a>
				<a href="info.php" class="nav"> Learn More! </a>
        <a href="logout.php" class="nav"> Logout </a>
      </p>
    </div>
		<div class="about">
				<br> <p > Use the map to find restaurant locations near you! </p>
    <div class="mapBox"id="mapholder">
			<canvas id="map_canvas" width="640" height="380">
				Your browser does not support the canvas element.
			</canvas>
    </div>
		<br>
	</div>

</div>
</body>
</html>
