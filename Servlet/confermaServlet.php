<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Conferma</title>
	</head>
	<body>
		
	<?php
	include("../Query.php");
	session_start();
    $nickname = $_SESSION['nickname'];
    $code = $_SESSION['code'];
    if(isset($_GET['mode']) && $_GET['mode'] == "rinvia"){
    	$code = getConfirmCode($nickname);
    }
	
	$to = $_SESSION['email'];

	$subject = 'Conferma email Propaganda';

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
	$message .= '<h3 style="font-size:20px">Utente: '. $nickname .'</h3>';
	$message .= '<h2 style="background-color:#bea57d; color:white; text-align:center; padding-top:20px; padding-bottom:20px"><a style="color:white; text-decoration:underline" href="http://shareyourideas.altervista.org/conferma.php?code=' . $code . '&user=' . $nickname . '">Conferma email</a></h2>';
	$message .= '<p>Per confermare il proprio account fare click sul link';
	$message .= '</div>';
	$message .= '<div style="padding-top:10px; padding-bottom:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px; border-top:2px dashed #c95b3a;">';
	$message .= '<p style="margin:10px">Se non sei stato tu a creare laccount contattaci a propaganda.dc98@gmail.com';
	$message .= '</div>';
	$message .= '</center>';
	$message .= '</div>';
	$message .= '</body>';
	$message .= '</html>';
	
	$_SESSION['sent'] = "true";
	
	mail($to, $subject, $message, $headers);
	
	header("Location: ../index1.php");
	die();
	
	?>
		
	</body>
</html>