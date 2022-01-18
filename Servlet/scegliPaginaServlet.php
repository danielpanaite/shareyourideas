<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Scegli Pagina</title>
	</head>
	<body>
		
		<?php
		include("Query.php");
		session_start();
		
		$_SESSION['page'] = $_POST['page'];
		header("Location: ../gruppo.php?param=". $_SESSION['gruppo']);
		die();
		?>
		
	</body>
</html>