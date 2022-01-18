<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Recover</title>
	</head>
	<body>
		
	<?php
		session_start();
		include '../Query.php';
		//---------------------------
		
		function mailRecover($email, $pass, $user){
			$to = $email;

			$subject = 'Recupero password Propaganda';

			$headers = "From: propaganda\r\n";
			$headers .= "Reply-To: propaganda.dc98@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$message = '<html>';
			$message .= '<head>';
			$message .= '<link href="https://fonts.googleapis.com/css?family=Raleway:400" rel="stylesheet">';
			$message .= '<style>';
			$message .= 'h1{font-family:"Raleway", sans-serif}';
			$message .= 'p{font-family:"Raleway", sans-serif}';
			$message .= 'h3{font-family:"Raleway", sans-serif}';
			$message .= 'h2{font-family:"Raleway", sans-serif}';
			$message .= '</style>';
			$message .= '</head>';
			$message .= '<body>';
			$message .= '<div style="width:80%; position:relative; margin:0 auto; border:2px solid #c95b3a; border-radius:10px">';
			$message .= '<center>';
			$message .= '<div style="padding-top:20px; padding-bottom:10px">';
			$message .= '<h1 style="color:#c95b3a; font-size:50px; font-style:bold">Propaganda</h1>';
			$message .= '<h3 style="font-size:20px">Utente: '.$user.'</h3>';
			$message .= '<h2 style="background-color:#bea57d; color:white; text-align:center; padding-top:20px; padding-bottom:20px">Password: '.$pass.'</h2>';
			$message .= '</div>';
			$message .= '<div style="padding-top:10px; padding-bottom:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px; border-top:2px dashed #c95b3a;">';
			$message .= '<p style="margin:10px">Se non sei stato tu a richiedere il recupero password cambia nome utente e/o email per maggior sicurezza del tuo account e dei tuoi dati personali.';
			$message .= '</div>';
			$message .= '</center>';
			$message .= '</div>';
			$message .= '</body>';
			$message .= '</html>';
		
			mail($to, $subject, $message, $headers);
		}
		
		
		//----------------------------
		
		$mail = "";
		$nick = "";
		require 'Recaptcha.php';

		$recaptcha = $_POST['g-recaptcha-response'];

		$object = new Recaptcha();
		$response = $object->verifyResponse($recaptcha);
		
		if(isset($response['success']) and $response['success'] != true) {
			echo "An Error Occured and Error code is :";
			print_r($response['error-codes']);
			$_SESSION['captcha'] = "errorRecover";
			header("Location: ../recover.php");
			die();
		}else{
			if($_POST['nickname'] == "" && $_POST['email'] == ""){
				header("Location: ../recover.php");
				die();
			}else if($_POST['nickname'] !== ""){
				$nick = $_POST['nickname'];
				$mail = getEmailFromUser($_POST['nickname']);
				if($mail == null){
					$_SESSION['recover'] = "Nome utente non registrato";
					header("Location: ../recover.php");
					die();
				}else if($mail !== ""){
					$_SESSION['recover'] = "Email di recupero inviata a ".$mail;
					mailRecover($mail, getPassword($nick), $nick);
					header("Location: ../recover.php");
					die();
				}
			}else if($_POST['email'] !== ""){
				$nick = getUserFromEmail($_POST['email']);
				if($nick == null){
					$_SESSION['recover'] = "Email non corrispondente a nessun account";
					header("Location: ../recover.php");
					die();
				}else{
					$mail = $_POST['email'];
					$_SESSION['recover'] = "Email di recupero inviata a ".$mail;
					mailRecover($mail, getPassword($nick), $nick);
					header("Location: ../recover.php");
					die();
				}
			}
		}
	?>
		
	</body>
</html>
