<?php
session_start();
if (isset($_SESSION['logged_user'])){
	print '
		<form method="post" action="add_album.php" name="add_album"><br>
		Add Album:<br>
		Title: <input type="text" name="album_title"><br>
		Description: <input type="text" name="album_descript"><br>
		<input type="submit" name="submit" value="Submit">
		<br>
		</form>
	';
	if(!empty($_POST['submit'])){
		include ('config.php');
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