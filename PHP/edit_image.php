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
	include('config.php');
?>

	<div class="formblock">
		<p class="formtitle"> Delete/Edit Images </p>
		<form class= "loginForm" id="edit_image" action="#" method="POST">

<?php
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$result = $mysqli->query("SELECT imageID, source_file, caption FROM Images");
		while($row = $result->fetch_assoc()){
			$imageID = $row['imageID'];
			$source = $row['source_file'];
			$caption = $row['caption'];
			print "<input type='checkbox' name='image_to_change[]' value=$imageID><br>filepath: $source<br> caption: $caption<br>";
			print "<img src='$source' alt='$imageID' height='150px' width='150px'><br>";
			print "<input type='text' name='new_cap$imageID' placeholder='Caption'>";
		}
	$mysqli->close();

?>
		<input type="submit" name="submit_image_update" value="Update Images"> 
		<input type="submit" name="submit_image_delete" value="Delete Images"> 
	</form>
	<p class = "info">Return <a href="../index.php" class="link">home</a></p>
	</div>

<?php

	if (isset($_POST['submit_image_update'])){
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if(!empty($_POST['image_to_change'])){
			$imagestoupdate = $_POST['image_to_change'];
			foreach($imagestoupdate as $idtoupdate){	
				$idupdate = (int) $idtoupdate;
				$new_caption = htmlentities(filter_input(INPUT_POST, "new_cap$idupdate", FILTER_SANITIZE_STRING));
				$current_date = date('Y-m-d');
				$mysqli->query("UPDATE Images SET caption = '$new_caption' WHERE imageID = $idupdate");
				$mysqli->query("UPDATE Images SET date_modified = '$current_date' WHERE imageID = $idupdate");
				echo $mysqli->error;
			}
		}
		$mysqli->close();
	}

	if (isset($_POST['submit_image_delete'])){
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if(!empty($_POST['image_to_change'])){
			$imagestodelete = $_POST['image_to_change'];
			foreach($imagestodelete as $idtodelete){	
				$iddelete = (int) $idtodelete;
				$mysqli->query("DELETE FROM ImagesInAlbums WHERE imageID = $iddelete");
				$mysqli->query("DELETE FROM Images WHERE imageID = $iddelete");
				echo $mysqli->error;
			}
		}
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