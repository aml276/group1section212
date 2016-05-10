<?php
if (isset($_SESSION['logged_user'])){
	print '
		Add Album:<br>
		Title: <form method="post" action="PHP/login.php" name="album_title"><br>
		Description: <form method="post" action="PHP/login.php" name="album_descript"><br>
		<input type="text" name="album_title"><input type="submit" name="submit" value="submit">
		<br>
		</form>
	';
	if(!empty($_POST['submit'])){
		//include ('config.php');
		$current_date = date('Y-m-d');
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$new_title = $mysqli->real_escape_string(htmlentities(filter_input(INPUT_POST, 'album_title', FILTER_SANITIZE_STRING)));
		$new_descript = $mysqli->real_escape_string(htmlentities(filter_input(INPUT_POST, 'album_descript', FILTER_SANITIZE_STRING)));
		$result = $mysqli->query("INSERT INTO Albums VALUES (NULL, '$current_date', '$new_title', '$new_descript')");
		if($result == FALSE)
			echo $mysqli->error;
		$mysqli->close();
	}
}
?>