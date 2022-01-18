<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Contact</title>
	</head>
	<body>
		
	<?php
	include("../Query.php");
	session_start();
	require 'Recaptcha.php';

	$recaptcha = $_POST['g-recaptcha-response'];

	$object = new Recaptcha();
	$response = $object->verifyResponse($recaptcha);		

	if(isset($response['success']) and $response['success'] != true) {
		echo "An Error Occured and Error code is :";
		print_r($response['error-codes']);
		$_SESSION['contact'] = "errorContact";
		header("Location: ../contact.php");
		die();
	}else{
		if($_POST['nome'] !== "" && $_POST['oggetto'] !== "" && $_POST['contenuto'] !== ""){
			$to = "propaganda.dc98@gmail.com";
			$subject = $_POST['oggetto'];
			$headers = "From: ".$_POST['nome'];
			$headers .= "\n Reply-To: propaganda.dc98@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			$message = $_POST['contenuto'];
			mail($to, $subject, $message, $headers);
			$_SESSION['contact'] = "inviato";
			header("Location: ../contact.php");
			die();
		}else{
			$_SESSION['contact'] = "campi vuoti";
			header("Location: ../contact.php");
			die();
		}
	}
	?>
		
	</body>
</html>