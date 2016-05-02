<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="Style/style.css">
		<link rel="stylesheet" type = "text/css" href="Style/stylesheet.css">
	</head>
	<body>

		<div class="nav container">
            <ul>
                <?php
                	include 'PHP/navigation.php';
                ?>
            </ul>
        </div> <!--end navbar div-->

		<div class="contain">
			<div id="home" class="page1" class="page">
				<img src="Images/Logo.png" alt="LOGO">
				<p class = "logo">Learn More</p>
			</div>
			<div id ="about" class="page2" class="page">
				<p class="title">About</p>
				<p class="info">Dash is a fast-paced flight action game where you must maneuver around enemies to stay airborne. While traditional platformers use attacks as secondary actions, dashing is used to both navigate through the level and defeat opponents.</p>
			</div>
			<div id="characters" class="page3" class="page">
				<p class="title">Characters</p>
				<div class="player">
					<span>
						<img src="Images/player.jpg" alt="player">
					</span>
					<span>
						<p class="bio">Your task is simple yet challenging: complete the martial trials set by the gods themselves by dashing through your enemies. Master the art of flight as you explore distant lands on your journey to restore prestige to your fallen master's school.</p>
					</span>
				</div>
				<p class="subtitle">Your Opponents</p>
				<div class="opponents">
					<span>
						<img src="Images/wanderer.jpg" alt="Dash wanderer">
						<br>
						"ROAMS"
						<br>
						"the sky"
					</span>
					<span>
						<img src="Images/sentinel.jpg" alt="Dash sentinel">
						<br>
						"HUNTS"
						<br>
						"with sharp sense of smell"
					</span>
					<span>
						<img src="Images/aegis.jpg" alt="Dash aegis">
						<br>
						"DEFENDS"
						<br>
						"with impenetrable shield"
					</span>
					<span>
						<img src="Images/ballista.jpg" alt="Dash ballista">
						<br>
						"SHOOTS"
						<br>
						"deadly fireballs"
					</span>
				</div>
			</div>
			<div id="instructions" class="page4" class="page">
				<p class="title">Instructions</p>
			</div>
			<div id="gallery" class="page5" class="page">
				<p class="title">Gallery</p>
			</div>
			<div id="team" class="page6" class="page">
				<p class="title">Team</p>
			</div>
			<div id="contact" class="page7" class="page">
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
</html