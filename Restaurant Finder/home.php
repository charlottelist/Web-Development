<!-- if not logged in, they can't see the page -->

<!-- home page that has a description of the websites purpose and the navigation menu -->


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
  <title>Good Eats: Home</title>
  <link rel="stylesheet" href="final.css"/>
</head>

<body>
  <div id="wrap">
    <div class="header">
      <div class="documentation">
        <br>
        <a href="doc.php" class="doc"> Documentation </a>
      </div>
      <h1 class = "title"> ~ Good Eats ~</h1>
      <p class = "subtitle"> A Guide to Eateries in Cape May, NJ </p>

    </div>

    <div class = "menu">
      <p class = "nav">
        <a href="reviews.php" class="nav"> Review a Restaurant </a>
        <a href="locations.php" class="nav"> Locations </a>
        <a href="rest.php" class="nav"> Recommendations </a>
        <a href="info.php" class="nav"> Learn More! </a>
        <a href="live.php" class="nav"> Live Feed </a>
        <a href="logout.php" class="nav"> Logout </a>
      </p>
    </div>
    <div class="about">

      <p class="textOverlay"> <br> <br>
        Welcome back to Good Eats! <br> <br> This site is for locals and tourists looking to
        share restaurant reccomendations and reviews. <br> We have created a wide variety
        of eaters so that there is a little something for everyone.
      </p>
      <!-- uses the image -->
      <img src="cm.jpg"> <br> <br>
    </div>


</div>
</body>
</html>
