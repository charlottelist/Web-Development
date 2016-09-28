<!-- purpose of this page is to display all the reviews that Good Eats has in the
database from all the users as a live feed of information-->


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
  <title>Good Eats: Live Feed</title>
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
				<a href="info.php" class="nav"> Learn More! </a>
        <a href="logout.php" class="nav"> Logout </a>
      </p>
    </div>
    <div class="about">

      <p class="subtitle"> <br> <br>
        Live Feed: See what other eaters are talking about!
      </p>

			<?php
				$db_conn = mysqli_connect("localhost", "root", "");
				mysqli_select_db($db_conn, "login_db");
				//creates a table in html code by echo
				echo( "\t\t<table align= 'center' class='tableC'> <tr> <td>Post</td> <td>Restaurant</td> <td>Date</td> <td>Party Size</td>
				 <td>Meal</td> <td>Comments</td> </tr>" . PHP_EOL  );
				 //selects all of the reviews from the table in the database
				$cmd = "SELECT * FROM reviews";

				$reviews = mysqli_query($db_conn, $cmd);
				//for each review creates a row in the table sorted by id number
				while($row = mysqli_fetch_array($reviews)) {
					echo( "<tr> <td>" . $row['id'] . " </td> <td> " . $row['restaurant'] . " </td> <td> "
								.  $row['day_visited'] . " </td> <td> " . $row['party_size'] . " </td> <td> "
								.  $row['meal'] . " </td> <td> " . $row['additional_comments'] . "</td> </tr> " . PHP_EOL );
				}

				echo("</table>");

			 ?>
 			<br> <br>
    </div>


</div>
</body>
</html>
