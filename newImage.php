<?php

require_once("./pexelsAPI.class.php");
$pexels = new pexelAPI();
$newImage = $pexels->getRandomImage();

echo json_encode($newImage);


?>