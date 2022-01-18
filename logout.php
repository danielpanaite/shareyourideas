<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="css/bootstrap.css">
<title>Propaganda</title>
</head>
<body>

	<h1>Stai eseguendo il logout, per favore aspetta.</h1>
	
	<?php 
	session_start();
	$_SESSION = array();
	header("Location: index1.php");
	die();
	?>

</body>
</html>