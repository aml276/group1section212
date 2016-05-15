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
		<p class="formtitle"> Add Image </p>
		<form class = "loginForm" id="add_image" action="#" method="POST" enctype="multipart/form-data">
			<input type="file" name="new_image">
			<input type="text" name="image_caption" placeholder="Image Caption">;

	<?php
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$result = $mysqli->query("SELECT albumID, title FROM Albums");
		while($row = $result->fetch_assoc()){
			$albumID = $row['albumID'];
			$title = $row['title'];
			print "<input type='checkbox' name='add_to_album[]' value=$albumID>$title<br>";
		}
	$mysqli->close();
	?>

			<input type="submit" name="submit_image" value="Submit">
		</form>
		<p class = "info">Return <a href="../index.php" class="link">home</a></p>
	</div>

	<?php
	if(isset($_POST['submit_image']) and !empty($_FILES)){
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$image_caption = $mysqli->real_escape_string(htmlentities(filter_input(INPUT_POST, 'image_caption', FILTER_SANITIZE_STRING)));
		$new = $_FILES['new_image'];
		$originalname = $new['name'];
		$tempname = $new['tmp_name'];
		move_uploaded_file($tempname, "../Gallery/$originalname");
		$current_date = date('Y-m-d');
		$mysqli->query("INSERT INTO Images VALUES (NULL, '$current_date', '../Gallery/$originalname', '$image_caption')");
		echo $mysqli->error;
		$id = (int) $mysqli->insert_id;
		if(!empty($_POST['add_to_album'])){
			$albumstoadd = $_POST['add_to_album'];
			foreach($albumstoadd as $idtoadd){	
				$idadd = (int) $idtoadd;
				$mysqli->query("INSERT INTO ImagesInAlbums VALUES ($id, $idadd)");
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