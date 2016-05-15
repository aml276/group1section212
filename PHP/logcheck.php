<!DOCTYPE html>
<?php session_start(); ?>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type = "text/css" href="../Style/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
         <script type="text/javascript" src="../JS/form.js"></script>
	</head>
	<body>
		<?php
			$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
			$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
			$salt = "saltysalt";

//			require_once 'connect.php';

			require_once 'config.php';
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if ($user != '' && $pass != ''){
				$query = "SELECT * FROM Login WHERE username = '$user'";
				$result = $mysqli->query($query);
				if ($result && $result->num_rows == 1){
					$row = $result->fetch_assoc();
					$db_pass = $row['passwordHash'];
					
					if(password_verify($pass.$salt, $db_pass)){
						$_SESSION['logged_user'] = $user;
						print("<p class='info'>Success! Thank you for logging in $user.</p>");
						?>
							<script>	window.location = "../index.php";</script>
						<?php   ;
					}
				} else {
					print("<p class='info'>Error occurred, try again.</p>");
				}
			} else {
				print("<p class='info'>Please fill in all inputs!</p>");
			}

		?>

		<?php 
            if(isset($_SESSION['logged_user'])) {
        ?>

        <div class = "">
            <p class="info"> Return to home <a href="../index.php">here.</a></p>
        </div>
		
			<script>	window.location = "../index.php";</script>
        <?php
            } else { 
        ?>

		<div class = "form">
      		<p class = "formtitle">Login</p>         

            <form id="loginForm" class = "pure-form pure-form-stacked" method="post" action="logcheck.php" name = "submit" enctype="multipart/form-data">
                <input name="user" class = "js-user input-block" type="text" placeholder="Username">
                <input name="pass" class = "js-pass input-block" type="text" placeholder="Password">
                <input type="submit" class = "js-submit btn btn-block" value="Submit" name="submit">
            </form>

		</div>

		<p class= "info">Return to home <a href="../index.php">here.</a></p>

		<?php
        }
        ?>

	</body>
</html>