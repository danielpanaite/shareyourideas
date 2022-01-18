<?php

$to = 'dani.panaite@yahoo.com';

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
$message .= '<h3 style="font-size:20px">Utente: </h3>';
$message .= '<h2 style="background-color:#bea57d; color:white; text-align:center; padding-top:20px; padding-bottom:20px">Nuova password: </h2>';
$message .= '<p>Segui questi passaggi per completare il recupero:';
$message .= '<p>1. Eseguire il <a style="color:#c95b3a; text-decoration:underline" href="brainwash.altervista.org/index1.php">login</a> con la password sopra elencata e il nome utente proprio';
$message .= '<p>2. Vai su Profilo > Modifica per cambiare la password';
$message .= '<p>3. Salva';
$message .= '</div>';
$message .= '<div style="padding-top:10px; padding-bottom:10px; border-bottom-left-radius:10px; border-bottom-right-radius:10px; border-top:2px dashed #c95b3a;">';
$message .= '<p style="margin:10px">Se non sei stato tu a richiedere il recupero password cambia nome utente e/o email per maggior sicurezza del tuo account e dei tuoi dati personali.';
$message .= '</div>';
$message .= '</center>';
$message .= '</div>';
$message .= '</body>';
$message .= '</html>';

mail($to, $subject, $message, $headers);

?>