<?php
session_start();
if (isset($_SESSION['logged_user'])){
	include('config.php');
	print '
	<form id="add_image" action="#" method="POST" enctype="multipart/form-data">
		Add an image here:<br>
		<input type="file" name="new_image"> <br>
		Caption:<br>
		<input type="text" name="image_caption"><br>';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$result = $mysqli->query("SELECT albumID, title FROM Albums");
		while($row = $result->fetch_assoc()){
			$albumID = $row['albumID'];
			$title = $row['title'];
			print "<input type='checkbox' name='add_to_album[]' value=$albumID>$title<br>";
		}
	$mysqli->close();
	print '
		<input type="submit" name="submit_image" value="Submit"> <br>
	</form>';
	if(isset($_POST['submit_image']) and !empty($_FILES)){
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$image_caption = $mysqli->real_escape_string(htmlentities(filter_input(INPUT_POST, 'image_caption', FILTER_SANITIZE_STRING)));
		$new = $_FILES['new_image'];
		$originalname = $new['name'];
		$tempname = $new['tmp_name'];
		move_uploaded_file($tempname, "../Images/$originalname");
		$current_date = date('Y-m-d');
		$mysqli->query("INSERT INTO Images VALUES (NULL, '$current_date', '../Images/$originalname', '$image_caption')");
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
}
?>