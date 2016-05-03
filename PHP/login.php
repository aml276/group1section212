<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
        <link rel="stylesheet" type = "text/css" href="../Style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="../js/form.js"></script>
	</head>
	<body>

		<div class = "form">
      		<p class = "formtitle"> Login </p>         

            <form id="loginForm" class = "pure-form pure-form-stacked" method="post" action="logcheck.php" name = "submit" enctype="multipart/form-data">
                <input name="user" class = "js-user input-block" type="text" placeholder="Username">
                <input name="pass" class = "js-pass input-block" type="text" placeholder="Password">
                <input type="submit" class = "js-submit btn btn-block" value="Submit" name="submit">
            </form>

		</div>

        <div class = "info">
            <p>Return to home <a href="../index.php">here.</a></p>
        </div>
	</body>
</html>