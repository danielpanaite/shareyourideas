<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Test</title>
	</head>
	<body>
		
	<?php
	include("../Query.php");
	session_start();
	$valore = getLike($_SESSION['nickname'], $_POST['id']);
	$userPost = getUserPost($_POST['id']);
	if(!isset($valore)){
		if($_POST['value'] == "mipiace"){
			miPiace($_POST['id']);
			insertVoto($_SESSION['nickname'], $_POST['id'], $_POST['value']);
			addExp(1, $userPost);
			header("Location: ../gruppo.php?param=".$_SESSION['gruppo']);
			die();
		}else if($_POST['value'] == "nonmipiace"){					
			nonMiPiace(Integer.parseInt(request.getParameter("id").toString()));
			insertVoto($_SESSION['nickname'], $_POST['id'], $_POST['value']);
			addExp(-1, $userPost);
			header("Location: ../gruppo.php?param=".$_SESSION['gruppo']);
			die();
		}
	}else{
		if($_POST['value'] == "mipiace"){
			if($valore == "mipiace"){
				removeMiPiace($_POST['id']);
			}else if($valore == "nonmipiace"){
				removeNonMiPiace($_POST['id']);
				addExp(1, $userPost);
			}
				miPiace($_POST['id']);
				updateMiPiace($_SESSION['nickname'], $_POST['id']);
				header("Location: ../gruppo.php?param=".$_SESSION['gruppo']);
				die();
		}else if($_POST['value'] == "nonmipiace"){
			if($valore == "mipiace"){
				removeMiPiace($_POST['id']);
				addExp(-1, $userPost);
			}else if($valore == "nonmipiace"){
				removeNonMiPiace($_POST['id']);
			}
			nonMiPiace($_POST['id']);
			updateNonMiPiace($_SESSION['nickname'], $_POST['id']);
			header("Location: ../gruppo.php?param=".$_SESSION['gruppo']);
			die();
		}
	}
	?>
		
	</body>
</html>