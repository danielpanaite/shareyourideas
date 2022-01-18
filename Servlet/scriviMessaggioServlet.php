<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Scrivi Messaggio</title>
	</head>
	<body>
		
		<?php
		include("../Query.php");
		session_start();
		
		if(isset($_POST['inviaMessaggio'])){
			require 'Recaptcha.php';

			$recaptcha = $_POST['g-recaptcha-response'];

			$object = new Recaptcha();
			$response = $object->verifyResponse($recaptcha);

			if(isset($response['success']) and $response['success'] != true) {
				echo "An Error Occured and Error code is :";
				print_r($response['error-codes']);
				$_SESSION['messaggio'] = "errorMessaggio";
				header("Location: ../scriviMessaggio.php");
				die();
			}else {
				if($_POST['titolo'] !== "" && $_POST['messaggio'] !== ""){
					scriviMessaggio($_SESSION['userMessaggio'], $_POST['messaggio'], $_POST['titolo'], $_SESSION['nickname']);
					header("Location: ../gruppo.php?param=".$_SESSION['gruppo']);
					die();
				}else{
					$_SESSION['messaggio'] = "campi vuoti";
					header("Location: ../scriviMessaggio.php");
					die();
				}
			}
		}else{
			$_SESSION['userMessaggio'] = $_POST['userMessaggio'];
			header("Location: ../scriviMessaggio.php");
			die();
		}
		?>
		
	</body>
</html>