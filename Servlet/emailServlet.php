<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Test</title>
	</head>
	<body>
		
		<?php
		session_start();
		include("../Query.php");
		$mailExist = FALSE;
		$mails = getAllEmails();
		$email = $_POST['email'];
		for($i = 0; $i<sizeof($mails); $i++){
			if($email == $mails[$i][0]){
				$mailExist = TRUE;
			}
		}
		if($email !== "" && $mailExist == FALSE){
			modificaEmail($email, $_SESSION['nickname']);
			$_SESSION['cambiaemail'] = "email successo";
			header("Location: ../modifica.php");
			die();
		}else if($email == ""){
			$_SESSION['cambiaemail'] = "campi vuoti";
			header("Location: ../modifica.php");
			die();
		}else if($mailExist == TRUE){
			$_SESSION['cambiaemail'] = "mail esistente";
			header("Location: ../modifica.php");
			die();
		}
		?>
		
	</body>
</html>