<!-- if not logged in, they can't see the page -->
<!-- this page let's users enter two selections: price level and type of food and then
based on that information it reads in from an xml file all the restaurants in cape may and
creates a list of the restaurants that meet the given stipulations-->


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
  <title>Good Eats: Recommendations</title>
  <link rel="stylesheet" href="final.css"/>
</head>

<script type="text/javascript">
	function readTextFile(){
				var csvhttp = new XMLHttpRequest( );
	      //on ready state change is the call back
				csvhttp.onreadystatechange=function( ){
	        //read the csv file and display the content
					if (csvhttp.readyState==4 && csvhttp.status==200){
						var readText = csvhttp.responseText;
						var array = readText.split("-");
						for (var i=0; i < array.length; i++) {
							var newText = array[i].split(",");
							if (newText[1]==localStorage.foodType && newText[2]==localStorage.price) {
								document.getElementById("out").innerHTML += newText[0];
								//reads in the text and then adds to the inner html the name of the restaurants
								//and adds a line break to make them appear in a list
								document.getElementById("out").innerHTML += "<br>";
							}
						}
					}
				}
				csvhttp.open("GET", "restaurants.csv", true);  // true means asynchronous ****
				csvhttp.send();
	    }

		function getValues() {
			//gets the values and puts them in local storage
			localStorage.foodType = document.getElementById("drop_menu").value;
			localStorage.price = document.getElementById("price_menu").value;
		}

		function setValues() {
			//sets the values on loading the page if they have been to this page before
			//to their previous search conditions - else sets them to the default
			if (localStorage.foodType && localStorage.price) {
				document.getElementById("drop_menu").value = localStorage.foodType;
				document.getElementById("price_menu").value = localStorage.price;
			}
		}

		function displayRec() {
			//this function gets calls the xml request and adds to the innerhtml
			document.getElementById("out").innerHTML = "";
			document.getElementById("out").innerHTML += "The following restaurants match your selections: ";
			readTextFile();
			document.getElementById("out").innerHTML += "<br>";
			document.getElementById("out").innerHTML += "<br>";
		}
</script>
<!-- on load the page should use local storage to maintain user's search conditions -->
<body onload="setValues();displayRec()">
  <div id="wrap">
    <div class="header">
      <h1 class = "title"> ~ Good Eats ~</h1>
      <p class = "subtitle"> A Guide to Eateries in Cape May, NJ </p>
    </div>
    <div class = "menu">
      <p class = "nav">
				<a href="home.php" class="nav"> Home </a>
        <a href="reviews.php" class="nav"> Review a Restaurant </a>
        <a href="locations.php" class="nav"> Locations </a>
				<a href="live.php" class="nav"> Live Feed </a>
				<a href="info.php" class="nav"> Learn More! </a>
        <a href="logout.php" class="nav"> Logout </a>
      </p>
    </div>
    <div class="about">
			<br>
			<p> Please select the type of food you are looking for:
				<!-- menu for food selections and price selections-->

			<select id="drop_menu" name="foodType" onchange="getValues()" required>
				<option value="American">American</option>
				<option value="Mexican">Mexican</option>
				<option value="Seafood">Seafood</option>
				<option value="Italian">Italian</option>
				<option value="Vegetarian">Vegetarian</option>
			</select> </p>

			<p> Please select your price range:
				<select id="price_menu" name="price" onchange="getValues()" required>
					<option value="$">$</option>
					<option value="$$">$$</option>
					<option value="$$$">$$$</option>
				</select> </p>

				<button type="button" name="enterSel" onclick="displayRec()"> Get Recommendations! </button>
      <p id="out"> <br> <br>

      </p>
			<br>
    </div>

</div>
</body>
</html>
