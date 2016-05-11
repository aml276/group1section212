<?php
if isset($_POST['submit']){
	include('config.php');
	$name = htmlentities(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
	$email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
	$message = htmlentities(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
	mail(CONTACT_EMAIL, "$name: $email", "$message");
}
?>