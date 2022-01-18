<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		
		<?php	
			//---------Recaptcha------------
			
			session_start();
			include '../Query.php';
			
			$milliseconds = round(microtime(true) * 1000);
			
			require 'Recaptcha.php';

			$recaptcha = $_POST['g-recaptcha-response'];

			$object = new Recaptcha();
			$response = $object->verifyResponse($recaptcha);

			if(isset($response['success']) and $response['success'] != true) {
				echo "An Error Occured and Error code is :";
				print_r($response['error-codes']);
				$_SESSION['post'] = "errorPost";
				header("Location: ../post.php");
				die();
			}else {
				if($_POST['comment'] !== ""){
					newPost($_POST['comment'], $_SESSION['gruppo'], $_SESSION['nickname']);
					addExp($_POST['exp'], $_SESSION['nickname']);
                    
					setCooldown($milliseconds, $_SESSION['nickname']);
					header("Location: ../gruppo.php?param=". $_SESSION['gruppo']);
					die();
				}else{
					$_SESSION['post'] = "campi vuoti";
					header("Location: ../gruppo.php?param=". $_SESSION['gruppo']);
					die();
				}
			}
		?>
	
	</body>
</html>