<?php

$email = $_POST['email'];
$src = $_POST['src'];
$alt = $_POST['alt'];

$dataError = false;
$emailError = false;

// validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$dataError = true;
}

// error if the default image is being shown
if ($src == "ocean.jpg") {
	$dataError = true;
}


if ($dataError == false) {

	$from = "Department of Surf"; 
	$fromName = "surf@department.com"; 
 
	$subject = "Your Surf the Ocean Image"; 
 
	$htmlContent = "
	<html>
		<head>
		<title>Surf the Coast</title>
		</head>
		<body>
			<table border=0  style=\"margin-left:auto; margin-right:auto;\">
				<tr>
					<td><img src=\"" . $src . "\" alt=\"" . $alt . "\' ></td>
				</tr>
			</table>
		</body>
	</html>
	"; 
 
	$headers = "MIME-Version: 1.0" . "\r\n"; 
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
	$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 

	error_reporting(0);
	
	if(mail($to, $subject, $htmlContent, $headers)){ 
		$emailError = false;
	}else{ 
		$emailError = true;
	}
	
	error_reporting(E_ALL);
	
}

if ($dataError == true || $emailError == true) {
	echo "There was an error sending your email. Please try again";
} else {
	echo "Email successfully sent";
}





?>