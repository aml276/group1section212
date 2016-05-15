<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Album</title>
		<link rel="stylesheet" type = "text/css" href="../Style/formstyle.css">
	</head>
	<body>

<?php
if (isset($_SESSION['logged_user'])){
?>
	<div class="formblock">
		<p class="formtitle"> Add Album </p>
		<form class = "loginForm" method="post" action="add_album.php" name="add_album">
			<input type="text" name="album_title" placeholder="Title">
			<input type="text" name="album_descript" placeholder ="Album Description">
			<input type="submit" name="submit btn" value="Submit">
		</form>
		<p class = "info">Return <a href="../index.php" class="link">home</a></p>
	</div>

<?php
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

?>

<?php 

} else {
?>

	<p class="info">You are not logged in and cannot use this feature. <a href="../index.php" class="link">Return home</a></p>

<?php 
}
?>

	</body>
</html>