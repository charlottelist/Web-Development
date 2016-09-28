<!-- Documentation -->
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
  <title>Good Eats: Documentation</title>
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
        <a href="home.php" class="nav"> Click here to return to the home page. </a>
      </p>
    </div>
    <div class="about">

      <p class="subtitle"> <br> <br>
        Here is a documentation of the required technologies used in this website.
      </p>

      <p >
        Objective: This website serves to create a place for people who love food to share
        with other lovers of food their experiences at various restaurants in Cape May, NJ. <br> <br>
        Description of Website: The website is exclusive to those who have an account registered
        with Good Eats. The site has pages that allow the user to post a review, see other reviews,
        look at restaurants on a map, get recommendations from Good Eats data, and see exclusive
        videos from our favorite restaurants and hotels! <br><br>
        Target Audience: Good Eats is designed for Cape May locals who love to eat out and want
        to share their thoughts and stay in the loop with the hottest restaurants. Also, Good Eats
        is for tourists visiting Cape May who do not know the area and are in need of help from
        locals and Good Eats knowledge to find the best places to eat. <br><br>
        Design: In designing this site, Good Eats wanted to convey a more fun, modern, simplistic
        design theme. The colors of lightblue and navy kept it simple while engaging the user. Each
        page has a consistent appearance with the same layout and structure. <br><br>
        Client-Side user interactivity: The client is very involved on Good Eats. The user creates
        their persona as an eater when they register. They can post a review by entering information
        into input boxes in the form to post a review. Also, the user can enter price and food restrictions
        when searching for recommendations from the data file. The user can also move the map around
        to find restaurants in relation to where they are staying. <br><br>
        Information exchange with the server: The server has one database called login_db that has two tables
        to hold the users and the reviews. The user table gets the users username, password, favorite and
        hometown to be saved in Good Eats' records. The review table holds the restaurant name, date visited,
        party size, meal eaten and overall comments. <br><br>
        Operations performed on the server: On the server, when logging in users are being added
        to the table within the database. On each page, the PHP checks that a user is logged in before
        letting them view the site. When posting a review, the form is submitted and the post variables
        are then inserted into the table. On the live feed page, the server is accessed and items selected
        from the database are styled into a table for the client to see. <br><br>
      </p>

      <!-- Here is the documentation of the technologies used in the project
      as based upon the assignment page -->
      <table class="tableC">
        <tr>
          <td>  </td>
          <td> HTML5 </td>
          <td> XMLHttpRequest</td>
          <td> JavaScript</td>
          <td> PHP</td>
          <td> MySQL </td>
        </tr>
        <tr>
          <td> Main Page </td>
          <td> X - image </td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td>  </td>
        </tr>
        <tr>
          <td> Review Page </td>
          <td> X - form </td>
          <td> </td>
          <td> X</td>
          <td> X - review database</td>
          <td> X </td>
        </tr>
        <tr>
          <td> Locations Page </td>
          <td> </td>
          <td> </td>
          <td> X - geolocation </td>
          <td> X </td>
          <td>  </td>
        </tr>
        <tr>
          <td> Recommendations Page </td>
          <td> X - local storage </td>
          <td> X </td>
          <td> X </td>
          <td> X</td>
          <td>  </td>
        </tr>
        <tr>
          <td> Live Feed Page </td>
          <td>  </td>
          <td> </td>
          <td> X </td>
          <td> X </td>
          <td> X - create table </td>
        </tr>
        <tr>
          <td> Learn More Page </td>
          <td> X - video in canvas </td>
          <td> </td>
          <td> </td>
          <td> X </td>
          <td>  </td>
        </tr>
      </table>
      <br>
      <br>
    </div>


</div>
</body>
</html>
