<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
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
  include "Query.php";
  session_start();
  $config = require('config.php');
  ?>
  
<div class="jumbotron" style="text-align:center; border-top-left-radius: 0px; border-top-right-radius: 0px; background-color: #c95b3a; margin: 0px; padding-right: 30%; width: 100%; padding-top: 0.1%; padding-bottom:0.5%; box-shadow:0px 15px 30px rgba(61, 61, 61, 0.5)">
    <a href="index1.php" style="color: white; text-decoration: none"><h1 style="font-family: 'Lobster', cursive">Propaganda</h1></a>
  </div>
 <div class="container" style="background-color: #e8e8e8; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border: 2px solid #a74a2e; border-top: none; box-shadow: 0px 8px 36px rgba(36, 36, 36, 0.5);">
  <div class="container-fluid">
	<nav class="navbar navbar-default" style="horizontal-alignment: center; width:100%; border-top-left-radius: 0px; border-top-right-radius: 0px; border: 1px solid #a74a2e; border-top: none">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="font-size: 20px">Invia Messaggio</a>
      <a href="index1.php" style="text-decoration: none; color:black; float:left; margin-top:16px; font-size:17px"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>
   </nav>
   
   <?php if(isset($_SESSION['nickname'])){ ?>
	<div style="width:100%; text-align:left; margin-bottom:20px">
		<h1 style="font-size:20px; font-family:'Raleway', sans-serif">a: <?php echo $_SESSION['userMessaggio'] ?></h1>
		<form action="Servlet/scriviMessaggioServlet.php" method="POST">
			<input type="hidden" name="inviaMessaggio" value="inviaServlet">
			<input type="text" name="titolo" class="form-control" placeholder="Titolo*" style="margin-bottom:10px; width:30%; font-family: 'Raleway', sans-serif">
			<textarea class="form-control" name="messaggio" rows="5" id="messaggio" style="resize: none; font-family: 'Raleway', sans-serif" maxlength="500" placeholder="Messaggio*"></textarea>
			<div class="g-recaptcha"
				data-sitekey="<?php echo $config['client-key']; ?>"
				data-callback="onSubmit">
			</div>
			<h5>* Campi obbligatori</h5>
			<button type="submit" class="btn btn-default" style="font-family: 'Raleway', sans-serif; margin-top: 10px; float:left; margin-right: 5px" onClick="this.form.submit(); this.disabled=true;">Invia</button>
			<?php if($_SESSION['messaggio'] == "errorMessaggio"){ ?>
				<h3 style="font-family:'Raleway', sans-serif; color:red">Captcha sbagliato</h3>
			<?php }else if($_SESSION['messaggio'] == "campi vuoti"){ ?>
				<h3 style="font-family:'Raleway', sans-serif; color:red">Compila tutti i campi</h3>
			<?php } ?>
		</form>
		<a href="gruppo.php?param=<?php echo $_SESSION['gruppo'] ?>"><button class="btn btn-default" style="font-family: 'Raleway', sans-serif; margin-top: 10px; margin-bottom:20px; float:left">Annulla</button></a>
	</div>
	<?php }else{ ?>
	<h2>Devi eseguire il login per inviare messaggi</h2>
	<?php } ?>
</body>
</html>