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
  <title>Good Eats: Post A Review</title>
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
        <a href="locations.php" class="nav"> Locations </a>
        <a href="rest.php" class="nav"> Recommendations </a>
				<a href="live.php" class="nav"> Live Feed </a>
				<a href="info.php" class="nav"> Learn More! </a>
        <a href="logout.php" class="nav"> Logout </a>
      </p>
    </div>
    <div class="reviewBox">
      <p> <br> <br>
        Please use the form below to make your thoughts available to other eaters. <br>
        Share your opinions of the restaurant's service, atmostphere and food.
      </p>
			<!-- form to get the users inputted values to the server to then add them
			to the review table in the database login_db -->
      <form action="reviews.php" method="post">
        <p> Enter the following information to review with Good Eats! </p>
        Restaurant: <input type="text" id="rest" name="rest" placeholder="Name" required /><br> <br>
        Date Visited: <input type="text" id="date" name="date" placeholder="MM/DD/YY" required /><br> <br>
        Party Size: <input type="text" id="size" name="size" placeholder="Number of people" /><br> <br>
        Meal: <input class = "meal" type="text" id="meal" name="meal" placeholder="Meal" /><br> <br>
        Additional Comments: <input class = "comments" type="text" id="comments" name="comments" placeholder="Comments here.." /><br>
        <br><button type="submit">Post Review</button>
      </form>

			<?php
				$message = "";
				if( !empty($_POST["rest"]) ){
				$db_conn = mysqli_connect("localhost", "root", "");
				mysqli_select_db($db_conn, "login_db");
				//creates the table reviews if it does not exist already
			  $cmd = "CREATE TABLE IF NOT EXISTS reviews (
				                                             id int(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
				                                             restaurant varchar(60) NOT NULL,
				                                             day_visited varchar(60) NOT NULL,
				                                             party_size varchar(60) NOT NULL,
				                                             meal varchar(60) NOT NULL,
				                                             additional_comments varchar(100)
				                                            );";

			  mysqli_query($db_conn, $cmd);
				//inserts the new review that was just created to the table
				$cmd = "INSERT INTO reviews (restaurant, day_visited, party_size, meal, additional_comments) VALUES ('"
								               . $_POST['rest'] . "','" . $_POST['date'] . "','"
															 . $_POST['size'] . "','" . $_POST['meal'] . "','" . $_POST['comments'] . "');";

								if( mysqli_query($db_conn, $cmd) )
									$message = "Your review is now public on Good Eats!";
								else
									$message = "There was an error, please try again. ". mysqli_error($db_conn) . "<br>";
				mysqli_close($db_conn);
				}

			?>
			<!-- confirms that the review was posted with message -->
			<?php echo "<br>" . $message ?>
      <br>
			<br>

    </div>


</div>
</body>
</html>
