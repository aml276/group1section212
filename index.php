<?php session_start(); ?>
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
		
		<link href="Style/lightbox.css" rel="stylesheet">
	</head>
	<body>
		<script type="text/javascript" src="JS/smoothscroll.js"></script>
		<script type="text/javascript" src="JS/fadeinonscroll.js"></script>
		
		<div class="nav container">
                <ul class = "navbuttons"><?php include 'PHP/navigation.php'; ?> </ul>
				
				<?php 
					if(isset($_SESSION['logged_user'])) {
						echo ' <div class="login"> <a href="PHP/logout.php">Logout</a></div> <span style="float:right;margin: 18px 50px 0 0;">You are currently an admin!</span> ';
					} else { ?>
						<div class="login"><a href="javascript:;">Login</a></div>
					
						<script>
						$( document ).ready(function() {
									$('.login').click(function() {
										var wrap = $(".loginform");
										
										if(wrap.css("display") == "none"){
											wrap.slideToggle(1000,"easeOutElastic");
										}else{
											wrap.slideToggle(100);
										}
									});
									$('.page').click(function(){
										var wrap = $(".loginform");
										if(wrap.css("display") != "none"){
											wrap.slideToggle(100);
										}
									});
						});
						</script>			
						
					<?php ; }
				?>
			
			<div class="loginform">
				 <script type="text/javascript" src="JS/form.js"></script>
				<div class = "form">
					<p class = "formtitle"> Login </p>         
					<form id="loginForm" class = "pure-form pure-form-stacked" method="post" action="PHP/logcheck.php" name = "submit" enctype="multipart/form-data">
						<input name="user" class = "js-user input-block" type="text" placeholder="Username">
						<input name="pass" class = "js-pass input-block" type="text" placeholder="Password">
						<input type="submit" class = "js-submit btn btn-block" value="Submit" name="submit">
					</form>
				</div>
			</div>
			
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
				<div class="layout">
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
				<p class="info">Your task is simple yet challenging: complete the martial trials set by the gods themselves by dashing through your enemies.</p>
				<p class="info">Master the art of flight as you explore distant lands on your journey to restore prestige to your fallen master's school.</p>
				<p class="info">While traditional platformers use attacks as secondary actions, dashing is used to both navigate through the level and defeat your opponents. Sharpen your reflexes and get ready for our selective Beta release, coming soon.</p>
				<br>
			</div>
			<div id="gallery" class="page" >
				<h1>GALLERY</h1>
				<?php
				if (isset($_SESSION['logged_user'])){
				echo "
					<div style='margin:auto;text-align:center;'>
						<a href='PHP/add_image.php' class='title'>Add Image</a>  &nbsp;&nbsp;&nbsp;
						<a href='PHP/add_album.php' class='title'>Add Album</a> &nbsp;&nbsp;&nbsp;
						<a href='PHP/edit_image.php' class='title'>Edit Image</a> &nbsp;&nbsp;&nbsp;
						<a href='PHP/delete_album.php' class='title'>Delete Album</a> &nbsp;&nbsp;&nbsp;
					</div>";
				}
				?>
				<?php
				
				include('PHP/config.php');
					$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					$result = $mysqli->query("SELECT * FROM Albums");
					$firstrow = true;
					while($row = $result->fetch_assoc()){
						if($firstrow){
							$stylestr = "style='display : block;'";
							$firstrow = false;
						} else{
							$stylestr = "";
						}
						
							echo "<div class= 'imagegallery'>
										<h2> <a href='#!' style='margin-left: 7%;'>$row[title]</a></h2>
										<div class='albumwrapper' $stylestr>
										<br>
											<div class='description'> $row[description]
											<br> Last modified on $row[date_modified]
											</div>
											<div class='album'>";
											
											
							$result2 = $mysqli->query("SELECT * FROM Images INNER JOIN ImagesInAlbums ON Images.imageID = ImagesInAlbums.imageID WHERE albumID = $row[albumID]");
						
							while($row2 = $result2->fetch_assoc()){
								$path = substr($row2['source_file'],3); 
								
								echo "<a href='$path' data-lightbox='$row[albumID]' data-title='$row2[caption]<br>Last modified on $row2[date_modified]'>";
								echo '<div class="imagebox" style="background-image: url(\'';
								echo $path;
								echo'\');"> </div>';
								
								echo "</a>";
							}
							echo "</div></div></div>";
					}
	
				?>
				<script>
					
				$('.imagegallery h2').click(function() {
					var wrap = $(this).next();
					
					if(wrap.css("display") == "none"){
						wrap.slideToggle(1000,"easeOutElastic");
					}else{
						wrap.slideToggle(250,"easeOutExpo");
					}
				})
					
				</script>
					
					
				<br>
		</div>
			<div id="team" class="page" >
				<h1>TEAM</h1>
				<div class="layout">
					<span>
						<img src="Images/portrait.png" class="staffpic" alt="Dash wanderer">
						<br>
						Jackson
						<br>
						Developer
					</span>
					<span>
						<img src="Images/portrait2.png" class="staffpic"  alt="Dash sentinel">
						<br>
						Aimee
						<br>
						Lead Design
					</span>
					<span>
						<img src="Images/portrait3.png" class="staffpic"  alt="Dash aegis">
						<br>
						Michael
						<br>
						Marketing
					</span>
					<span>
						<img src="Images/portrait4.png" class="staffpic"   alt="Dash ballista">
						<br>
						Emily
						<br>
						Developer
					</span>
				</div>
			</div>
			<div id="contact" class="page" >
				<h1>CONTACT US</h1>     
				<br>
            	<form id="testForm" class = "pure-form pure-form-stacked" method="post" action="PHP/contact.php" name = "submit">
                	<input name="name" class = "input-block" type="text" placeholder="Name">
                	<input name="email" type="text" placeholder="Email">
                  	<textarea name="message" placeholder="Message"></textarea>
                <input type="submit" class = "btn btn-block" value="Submit" name="submit">
            	</form>
				<br>
			</div>
		</div>
		
		<script src="JS/lightbox.js"></script>
	</body>	
</html>