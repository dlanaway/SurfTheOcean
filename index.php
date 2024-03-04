<?php

require_once("./pexelsAPI.class.php");
$pexels = new pexelAPI();
$newImage = $pexels->getRandomImage();


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Surf the Ocean</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>
			<h1>Surf the Ocean</h1>
		</header>
		<main>
			<div class="surfImage">
				<img id="oceanPic" src="<?php echo $newImage['src'] ?>" alt="<?php echo $newImage['alt'] ?>"><br>
				<button id="newImageButton">New Image</button><br>
				<a href="https://pexels.com" target="_blank">powered by Pexels</a>
			</div>
			<div class="sendImage">
				<form id="sendForm">
					<label for="email">Send me to a friend!</label><br>
					<input id="email" type="email" size="30" placeholder="user@domain.com" required /><br>
					<button id="sendButton">Send</button><br>
					<span id="result"></span>
				</form>
			</div>  
		</main>
		<script
			  src="https://code.jquery.com/jquery-3.7.1.min.js"
			  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
			  crossorigin="anonymous"></script>
		<script src="./js/index.js"></script>
	</body>
</html>

