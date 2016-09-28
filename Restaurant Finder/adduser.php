<!DOCTYPE html>
<!-- Demonstrates how to add a user to an existing database -->
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" href="final.css"/>
	<style>
		div {margin: auto; width:50%; font: bold 16px verdana, sans-serif; }
	</style>
</head>

<body style="text-align:center; margin:75px;">
	<div>
		<?php
			$message = "";
			if( !empty($_POST["username"]) ){
				$db_conn = mysqli_connect("localhost", "root", "");
				if (!$db_conn)
					die("Unable to connect: " . mysqli_connect_error());  // die is similar to exit

				if( !mysqli_select_db($db_conn, "login_db") )
					die("Database doesn't exist: " . mysqli_error($db_conn));

				mysqli_select_db($db_conn, "login_db");

				$cmd = "INSERT INTO users (username, password, profile_info1, profile_info2) VALUES ('"
				               . $_POST['username'] . "','" . $_POST['password'] . "','"
											 . $_POST['profile1'] . "','" . $_POST['profile2'] . "');";

				if( mysqli_query($db_conn, $cmd) )
					$message = "You are now a registered user of Good Eats!";
				else
					$message = "Problem creating your account: ". mysqli_error($db_conn) . "<br>";

				mysqli_close($db_conn);
			}
		?>
	</div>

	<form action="adduser.php" method="post">
		<p> Enter the following information to register with Good Eats! </p>
		Username: <input type="text" id="username" name="username" placeholder="Username" required /><br> <br>
		Password: <input type="password" id="password" name="password" placeholder="Password" required /><br> <br>
		Favorite Food: <input type="text" id="profile1" name="profile1" placeholder="Favorite food" /><br> <br>
		Hometown: <input type="text" id="profile2" name="profile2" placeholder="Hometown" /><br>
		<br><button type="submit">Register</button>
	</form>
	<?php echo "<br>" . $message . "<br><a href='index.php'>Login</a>" ?>
</body>
</html>
