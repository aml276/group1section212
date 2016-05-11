<?php
session_start();
if (isset($_SESSION['logged_user'])){
	include('config.php');
	print '
	<form id="edit_image" action="#" method="POST">
	Select an image to delete:<br><br>';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$result = $mysqli->query("SELECT imageID, source_file, caption FROM Images");
		while($row = $result->fetch_assoc()){
			$imageID = $row['imageID'];
			$source = $row['source_file'];
			$caption = $row['caption'];
			print "<input type='checkbox' name='image_to_change[]' value=$imageID><br>filepath: $source<br> caption: $caption<br>";
			print "<img src='$source' alt='$imageID' height='150px' width='150px'><br>";
			print "edit caption: <input type='text' name='new_cap$imageID'><br><br>";
		}
	$mysqli->close();
	print '
		<input type="submit" name="submit_image_update" value="Update Images"> <br>
		<input type="submit" name="submit_image_delete" value="Delete Images"> <br>
	</form>';

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
}
?>