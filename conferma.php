<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.min.js"></script>
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
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
      <a class="navbar-brand" style="font-size: 20px">Conferma email</a>
      <a href="index1.php" style="text-decoration: none; color:black; float:left; margin-top:16px; font-size:17px"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>
   </nav>
   
   <?php
   require "Query.php";
   session_start();
   if(getConfirmCode($_GET['user']) == ($_GET['code'])){
	   confirmEmail($_GET['user']); ?>
	   	<center>
   		<h2 style="color:green">Email confermata con successo</h2>
   		<h2>Fare click <a href="index1.php">qui</a> per tornare alla pagina iniziale.</h2>
   		</center>
	   <?php }else{ ?>
   	<center>
	<h3 style="color:red">Errore, link non valido</h3>
	<h2>Fare click <a href="index1.php">qui</a> per tornare alla pagina iniziale.</h2>
	</center>
   
   <?php } ?>
</body>
</html>