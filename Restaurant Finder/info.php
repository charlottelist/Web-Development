<!-- if not logged in, they can't see the page -->
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
  <title>Good Eats: Learn More</title>
  <link rel="stylesheet" href="final.css"/>
</head>

<body>
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
        <a href="rest.php" class="nav"> Recommendations </a>
        <a href="live.php" class="nav"> Live Feed </a>
        <a href="logout.php" class="nav"> Logout </a>
      </p>
    </div>
    <div class="about">

      <p class="textOverlay"> <br> <br>
        Good Eaters love to learn more about the hottest spots to eat, stay and visit while in Cape May!
				Please enjoy a message from this month's featured friend: Cape Resorts! Check out what they have to offer.
      </p>

			<p class="subtitle"> A Message From Cape Resorts: </p>
			<!-- uses HTML5 video capabilities to feature one of good eats favorite places -->
			<video id="media" width="600" height="400" controls>
					<source src="cape_may_vid.mp4">
			</video> <br> <br>
    </div>


</div>
</body>
</html>
