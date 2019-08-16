<!DOCTYPE html>
<?php 
	include("includes/config.php");
	// session_destroy();
	if(isset($_SESSION['userLoggedIn'])){
		$userLoggedIn = $_SESSION['userLoggedIn'];
	}
	else{
		header("Location: register.php");
	}
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<title>MUSIC ON</title>
</head>
<body>
	<div id="nowplayingbarcontainer">
		<div id="nowplayingbar">
			<div id="nowplayingleft">
				
			</div>
			<div id="nowplayingcenter">
				<div class="content playercontrols">
					<div class="buttons">
						<button class="controlbutton shuffle" title="Shuffle Button">
							<img src="assets/images/icons/shuffle.png" alt="Shuffle">
						</button>
						<button class="controlbutton previous" title="Previous Button">
							<img src="assets/images/icons/previous.png" alt="Previous">
						</button>
						<button class="controlbutton play" title="play Button">
							<img src="assets/images/icons/play.png" alt="Play">
						</button>
						<button class="controlbutton pause" title="Pause Button" style="display: none;">
							<img src="assets/images/icons/pause.png" alt="Button">
						</button>
						<button class="controlbutton next" title="Next Button">
							<img src="assets/images/icons/next.png" alt="next">
						</button>
						<button class="controlbutton repeat" title="Repeat Button">
							<img src="assets/images/icons/repeat.png" alt="repeat">
						</button>
					</div>
					<div class="playbackbar">
						<span class="progresstime current">0.00</span>
						<div class="progressbar">
							<div class="progressbarbg">
								<div class="progress"></div>
							</div>
						</div>
						<span class="progresstime remaining">0.00</span>
					</div>
				</div>
			</div>
			<div id="nowplayingright">
				
			</div>
		</div>
	</div>
</body>
</html> 