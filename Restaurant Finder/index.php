<!--This is the php to get the user to log in -->
<?php
  $db_conn = mysqli_connect("localhost", "root", "");
  if (!$db_conn)
    die("Unable to connect: " . mysqli_connect_error());
  //creates the database here if it isn't created already
  mysqli_query($db_conn, "CREATE DATABASE login_db;");
  //  echo "Database ready<br>";

  //  echo "Unable to create database: " . mysqli_error($db_conn) . "<br>";

  mysqli_select_db($db_conn, "login_db");
  //creates the user table to keep track of all registered users
  $cmd = "CREATE TABLE IF NOT EXISTS users (
                                             id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                                             username varchar(60) UNIQUE NOT NULL,
                                             password varchar(60) NOT NULL,
                                             profile_info1 varchar(60),
                                             profile_info2 varchar(60)
                                            );";

  mysqli_query($db_conn, $cmd);

  mysqli_close($db_conn);
?>

<?php
  //this checks that the username and password are already in the database - if not will
  //say that it is invalid and ask again
  $db_conn = mysqli_connect("localhost", "root", "");
  mysqli_select_db($db_conn, "login_db");
  session_start();
  $message = "";
  if( !empty($_POST["username"]) ){
    $user = mysqli_real_escape_string($db_conn, $_POST['username']);
    $pass = mysqli_real_escape_string($db_conn, $_POST['password']);

    $cmd = "SELECT id FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($db_conn, $cmd);
    $row = mysqli_fetch_array($result);
    if($row != null && mysqli_num_rows($result)==1)
    {
      $_SESSION['active'] = $user;
      header("location: home.php");
    }
    else
      $message = "Username or Password is invalid";
  }
?>

<!DOCTYPE>

<html>

<head>
  <title>Good Eats</title>
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
      </p>
    </div>
    <div class="login">
      <p class="ltext">Login to see all that Good Eats has to offer!</p>
      <br>
      <!-- form used to send the username and password variables to the server -->
      <form action="index.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username"/>
        <input type="password" id="password" name="password" placeholder="Password" />
        <button type="submit">Login</button>
      </form>
      <!-- puts message from the PHP code here -->
      <?php echo "<br>" . $message; ?>
      <br>
      <!-- link to send user to this page if they need to create an account -->
      <a href="adduser.php">Register if you do not already have an account</a>
    </div>


</div>
</body>
</html>
