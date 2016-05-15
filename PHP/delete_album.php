<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Delete Album</title>
		<link rel="stylesheet" type = "text/css" href="../Style/formstyle.css">
	</head>
	<body>

<?php
if (isset($_SESSION['logged_user'])){
	include('config.php');
?>
	<div class="formblock">
		<p class="formtitle"> Delete Albums </p>
	<form class="loginForm" id="delete_album" action="#" method="POST">
	<p class="info">Select item to delete</p>

<?php
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$result = $mysqli->query("SELECT albumID, title FROM Albums");
		while($row = $result->fetch_assoc()){
			$albumID = $row['albumID'];
			$title = $row['title'];
			print "<input type='checkbox' name='album_to_delete[]' value=$albumID>$title<br>";
		}
	$mysqli->close();

?>
		<input type="submit" name="submit_delete_album" value="Submit"> 
	</form>
	</div>

<?php
	if(isset($_POST['submit_delete_album'])){
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if(!empty($_POST['album_to_delete'])){
			$albumstodelete = $_POST['album_to_delete'];
			foreach($albumstodelete as $idtodelete){	
				$iddel = (int) $idtodelete;
				$mysqli->query("DELETE FROM ImagesInAlbums WHERE albumID = $iddel");
				$mysqli->query("DELETE FROM Albums WHERE albumID = $iddel");
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

?>

	</body>
</html>