<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Feedback</title>
	</head>
	<body>
		
	<?php
	session_start();
	include("../Query.php");
	
	
	require 'Recaptcha.php';

		$recaptcha = $_POST['g-recaptcha-response'];

		$object = new Recaptcha();
		$response = $object->verifyResponse($recaptcha);

		if(isset($response['success']) and $response['success'] != true) {
			echo "An Error Occured and Error code is :";
			print_r($response['error-codes']);
			$_SESSION['feedback'] = "errorFeedback";
			header("Location: ../feedback.php");
			die();
		}else {
			if($_POST['contenuto'] !== ""){
				if(getUserFeedback($_SESSION['nickname']) != null){
					updateFeedback($_POST['contenuto'], $_SESSION['nickname']);
					$_SESSION['feedback'] = "feedbackupdate";
					header("Location: ../feedback.php");
					die();
				}else{
					insertFeedback($_SESSION['nickname'], $_POST['contenuto']);
					$_SESSION['feedback'] = "feedbackinviato";
					header("Location: ../feedback.php");
					die();
				}
			}else{
				$_SESSION['feedback'] = "campi vuoti";
				header("Location: ../feedback.php");
				die();
			}
		}
	?>
		
	</body>
</html>