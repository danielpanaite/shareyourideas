<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Login</title>
	</head>
	<body>
	
	<?php
	
	session_start();
	include '../Query.php';

	$nickname = $_POST['nickname'];
	$pass = $_POST['password'];
	if(Login($nickname, $pass) == "1"){
		$_SESSION['nickname'] = $nickname;
		$_SESSION['error'] = "login";
		
		$utente = getUtente($nickname);
		$_SESSION['email'] = $utente[1];
		$_SESSION['paese'] = $utente[2];
		$_SESSION['dataNascita'] = $utente[3];
		$_SESSION['exp'] = $utente[4];
		$_SESSION['title'] = getExpTitle($_SESSION['exp']);
		header("Location: ../index1.php");
		die();
	}else if(Login($nickname, $pass) == 0){
		$_SESSION['error'] = "pass sbagliata";
		header("Location: ../index1.php");
		die();
	}
	
	?>
	
	</body>
</html>