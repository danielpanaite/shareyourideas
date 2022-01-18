<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Test</title>
	</head>
	<body>
	
	<?php
	session_start();
	include "../Query.php";
	scegliGruppo($_SESSION['nickname'], $_POST['gruppo']);
	header("Location: ../index1.php");
	die();
	?>
	
	</body>
</html>