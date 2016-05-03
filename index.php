<!DOCTYPE html>
<html>
	<head>
		<title>Dash - A fast paced flight action game coming soon to Android, iOS, and PC</title>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
		<link rel="stylesheet" type="text/css" href="Style/gallerystyle.css">
		<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,900,700,200' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script   src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"   integrity="sha256-55Jz3pBCF8z9jBO1qQ7cIf0L+neuPTD1u7Ytzrp2dqo="   crossorigin="anonymous"></script>
	</head>
	<body>
		<script type="text/javascript" src="JS/smoothscroll.js"></script>
		<script type="text/javascript" src="JS/fadeinonscroll.js"></script>
		<div class="nav container">
            <ul>
                <?php
                	include 'PHP/navigation.php';
                ?>
            </ul>
        </div> <!--end navbar div-->

		<div class="contain">
			<div id="home" class="page">
				<img src="Images/Logo.png" alt="LOGO">
				<!-- <p class = "logo">Learn More</p> -->
				<br>
			</div>
			<div id ="about" class="page">
				<h1>THE PATH OF THE WARRIOR</h1> 
				<p class="info">Dash is a fast-paced flight action game where you must maneuver around enemies to stay airborne. While traditional platformers use attacks as secondary actions, dashing is used to both navigate through the level and defeat opponents.</p>
				<br>
			</div>
			<div id="characters" class="page" >
				<h1>CHARACTERS</h1> 
				<div class="player">
						<img src="Images/player.jpg" class="roundedimage" alt="player">
						<p class="bio">Your task is simple yet challenging: complete the martial trials set by the gods themselves by dashing through your enemies. Master the art of flight as you explore distant lands on your journey to restore prestige to your fallen master's school.</p>
					
				</div>
				<h2>YOUR OPPONENTS</h2>
				<div class="opponents">
					<span>
						<img src="Images/wanderer.jpg" class="roundedimage" alt="Dash wanderer">
						<br>
						"ROAMS"
						<br>
						"the sky"
					</span>
					<span>
						<img src="Images/sentinel.jpg" class="roundedimage"  alt="Dash sentinel">
						<br>
						"HUNTS"
						<br>
						"with sharp sense of smell"
					</span>
					<span>
						<img src="Images/aegis.jpg" class="roundedimage"  alt="Dash aegis">
						<br>
						"DEFENDS"
						<br>
						"with impenetrable shield"
					</span>
					<span>
						<img src="Images/ballista.jpg" class="roundedimage"   alt="Dash ballista">
						<br>
						"SHOOTS"
						<br>
						"deadly fireballs"
					</span>
				</div>
				
			</div>
			<div id="instructions" class="page" >
				<h1>INSTRUCTIONS</h1>
			</div>
			<div id="gallery" class="page" >
				<h1>GALLERY</h1>
				<br>
				<div class="imagegallery">
					<div class="imagebox" style="background-image: url('Images/Concept1.jpg');">	</div>
					<div class="imagebox" style="background-image: url('Images/Concept2.jpg');">	</div>
					<div class="imagebox" style="background-image: url('Images/Concept3.jpg');">	</div>
					<div class="imagebox" style="background-image: url('Images/Concept4.jpg');">	</div>
					<div class="imagebox" style="background-image: url('Images/Concept5.jpg');">	</div>
				</div>
				<br>
			</div>
			<div id="team" class="page" >
				<h1>TEAM</h1>
			</div>
			<div id="contact" class="page" >
				<h1>CONTACT US</h1>     
				<br>
            	<form id="testForm" class = "pure-form pure-form-stacked" method="post" action="#" name = "submit">
                	<input name="name" class = "input-block" type="text" placeholder="Name">
                	<input name="email" type="text" placeholder="Email">
                	<input style="display:none;" type="text" name="email_" value="" />
                	<textarea name="message" placeholder="Message"></textarea>
                <input type="submit" class = "btn btn-block" value="Submit" name="submit">
            	</form>
				<br>
			</div>
		</div>
	</body>	
</html>