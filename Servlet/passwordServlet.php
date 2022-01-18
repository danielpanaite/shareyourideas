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
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];
		if($password !== "" && $confirm !== ""){
				if($password == $confirm){
					modificaPassword($password, $_SESSION['nickname']);
					$_SESSION['cambiapassword'] = "password successo";
					header("Location: ../modifica.php");
					die();
				}else{
					$_SESSION['cambiapassword'] = "conferma sbagliata";
					header("Location: ../modifica.php");
					die();
				}
				
			}else{
				$_SESSION['cambiapassword'] = "campi vuoti";
				header("Location: ../modifica.php");
				die();
			}
		?>
		
	</body>
</html>