<?php 
    session_start(); 
    if(isset($_SESSION['logged_user'])){
        unset($_SESSION['logged_user']);
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type = "text/css" href="../Style/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	</head>
	<body>
        <div class = "info">
            <p> Thank you for logging out. Return to home <a href="../index.php">here.</a></a></p>
        </div>
	</body>
</html>