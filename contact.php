<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<script src="js/bootstrap.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<title>Propaganda</title>
</head>
<body style=" background-image: url('Propaganda1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  top:-40px">
  <style>
#av_toolbar_regdiv, #av_toolbar_iframe, .av_site, .av-antipixel { display: none; }
</style>
  
  <?php
  session_start();
  $config = require('config.php');
  ?>

  
  <div class="jumbotron" style="text-align:center; border-top-left-radius: 0px; border-top-right-radius: 0px; background-color: #c95b3a; margin: 0px; padding-right: 30%; width: 100%; padding-top: 0.1%; padding-bottom:0.5%; box-shadow:0px 15px 30px rgba(61, 61, 61, 0.5)">
    <a href="index1.php" style="color: white; text-decoration: none"><h1 style="font-family: 'Lobster', cursive">Propaganda</h1></a>
  </div>
  <div class="container" style="background-color: #e8e8e8; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border: 2px solid #a74a2e; border-top: none; box-shadow: 0px 8px 36px rgba(36, 36, 36, 0.5);">
  <div class="container-fluid">
	<nav class="navbar navbar-default" style="horizontal-alignment: center; width:100%; border-top-left-radius: 0px; border-top-right-radius: 0px; padding: 15px">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" style="font-size: 20px">Homepage</a>
      <a href="index1.php" style="text-decoration: none; color:black; float:left; margin-top:15px; font-size:17px"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
      
    </div>
    </nav>
    
    <div style="border:dashed 3px #c95b3a; height:100%; margin-bottom:20px">

    	
    <center>
    <h1>Contattaci</h1>
    <div style="width:50%">
    	<form action="Servlet/contactServlet.php" method="POST">
    		<div style="text-align:left">
    		<input type="text" name="nome" class="form-control" placeholder="Nome*" style="margin-bottom:10px; width:40%" maxlength="20">
    		</div>
    		<input type="text" name="oggetto" class="form-control" placeholder="Oggetto*" maxlength="50">
    		<textarea class="form-control" name="contenuto" rows="5" id="feedback" style="resize: none; margin-top:10px; margin-bottom:10px" maxlength="250" placeholder="Commento*"></textarea>
    		<div style="text-align:left" class="g-recaptcha"
				data-sitekey="<?php echo $config['client-key']; ?>"
				data-callback="onSubmit">
			</div>
			<h5 style="text-align:left">Inserisci anche la tua email per avere una risposta</h5>
    		<h5 style="text-align:left">* Campi obbligatori</h5>
    		<button type="submit" name="submit" class="btn btn-default" style="margin-bottom: 20px" onClick="this.form.submit(); this.disabled=true;">Invia</button>
    		<?php if($_SESSION['contact'] == "inviato"){ ?>
    			<h3 style="font-family:'Raleway', sans-serif; color:green">Messaggio inviato!</h3>
    		<?php }else if($_SESSION['contact'] == "campi vuoti"){ ?>
    			<h3 style="font-family:'Raleway', sans-serif; color:red">Compila tutti i campi</h3>
    		<?php }else if($_SESSION['contact'] == "errorContact"){ ?>
    			<h3 style="font-family:'Raleway', sans-serif; color:red">Captcha sbagliato</h3>
    		<?php } ?>
    	</form>
    </div>
    </center>
    </div>
    </div>
    
</body>
</html>