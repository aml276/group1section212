<!--
if !empty($_SESSION){
	display option to log out
}
else {
	username = $_POST['username']
	password = hash($_POST['password'])
	query database for username and password has
	if success{
		$_SESSION[] = username
	}
	else{
		display failed login
	}
}

-->