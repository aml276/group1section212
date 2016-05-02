<!DOCTYPE html>
<html>
	<head>
		<title>Dash - A fast paced flight action game coming soon to Android, iOS, and PC</title>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
		<script type="text/javascript" src="JS/smoothscroll.js"></script>
		<div class="nav container">
            <ul>
                <?php
                	include 'PHP/navigation.php';
                ?>
            </ul>
        </div> <!--end navbar div-->

		<div class="contain">
			<div id="home" class="page page1">
				<img src="Images/Logo.png" alt="LOGO">
				<p class = "logo">Learn More</p>
			</div>
			<div id ="about" class="page page2">
				<p class="title">About</p>
				<p class="info">Dash is a fast-paced flight action game where you must maneuver around enemies to stay airborne. While traditional platformers use attacks as secondary actions, dashing is used to both navigate through the level and defeat opponents.</p>
			</div>
			<div id="characters" class="page page3" >
				<p class="title">Characters</p>
				<div class="player">
						<img src="Images/player.jpg" alt="player">
						<p class="bio">Your task is simple yet challenging: complete the martial trials set by the gods themselves by dashing through your enemies. Master the art of flight as you explore distant lands on your journey to restore prestige to your fallen master's school.</p>
					
				</div>
				<br>
				<p class="subtitle">Your Opponents</p>
				<div class="opponents">
					<span>
						<img src="Images/wanderer.jpg" alt="Dash wanderer">
						"ROAMS"
						<br>
						"the sky"
					</span>
					<span>
						<img src="Images/sentinel.jpg" alt="Dash sentinel">
						"HUNTS"
						<br>
						"with sharp sense of smell"
					</span>
					<span>
						<img src="Images/aegis.jpg" alt="Dash aegis">
						"DEFENDS"
						<br>
						"with impenetrable shield"
					</span>
					<span>
						<img src="Images/ballista.jpg" alt="Dash ballista">
						"SHOOTS"
						<br>
						"deadly fireballs"
					</span>
				</div>
				
			</div>
			<div id="instructions" class="page page4" >
				<p class="title">Instructions</p>
			</div>
			<div id="gallery" class="page page5" >
				<p class="title">Gallery</p>
			</div>
			<div id="team" class="page page6" >
				<p class="title">Team</p>
			</div>
			<div id="contact" class="page page7" >
				<p class = "formtitle">Contact Us</p>         

            	<form id="testForm" class = "pure-form pure-form-stacked" method="post" action="#" name = "submit">
                	<input name="name" class = "input-block" type="text" placeholder="Name">
                	<input name="email" type="text" placeholder="Email">
                	<input style="display:none;" type="text" name="email_" value="" />
                	<textarea name="message" placeholder="Message"></textarea>
                <input type="submit" class = "btn btn-block" value="Submit" name="submit">
            	</form>
			</div>
		</div>
	</body>	
</html>