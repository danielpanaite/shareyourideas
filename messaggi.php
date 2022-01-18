<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<title>Propaganda</title>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#c95b3a"
    },
    "button": {
      "background": "transparent",
      "text": "#f5d948",
      "border": "#f5d948"
    }
  },
  "position": "top",
  "content": {
    "message": "Questo sito usa i cookie per assicurarsi la miglior esperienza sul nostro sito.",
    "dismiss": "Accetto",
    "link": "Scopri di più"
  }
})});
</script>
</head>
<body style=" background-image: url('Propaganda1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  top: -40px">
  <style>
#av_toolbar_regdiv, #av_toolbar_iframe, .av_site, .av-antipixel { display: none; }
</style>
  
  <div class="jumbotron" style="text-align:center; border-top-left-radius: 0px; border-top-right-radius: 0px; background-color: #c95b3a; margin: 0px; padding-right: 30%; width: 100%; padding-top: 0.1%; padding-bottom:0.5%; box-shadow:0px 15px 30px rgba(61, 61, 61, 0.5)">
    <a href="index1.php" style="color: white; text-decoration: none"><h1 style="font-family: 'Lobster', cursive">Propaganda</h1></a>
  </div>
  <div class="container" style="background-color: #e8e8e8; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border: 2px solid #a74a2e; border-top: none; box-shadow: 0px 8px 36px rgba(36, 36, 36, 0.5);">
  <div class="container-fluid">
	<nav class="navbar navbar-default" style="horizontal-alignment: center; width:100%; border-top-left-radius: 0px; border-top-right-radius: 0px; padding: 15px">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="font-size: 20px">Messaggi</a>
      <a href="index1.php" style="text-decoration: none; color:black; float:left; margin-top:15px; font-size:17px"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
	  
	</div>
    <?php
	session_start();
	include 'Query.php';
    $data = getMessaggi($_SESSION['nickname']);
    setMessaggioLetto($_SESSION['nickname']);
    ?>
    <hr style="width: 100%; float: left; margin:0px; border-color: #a74a2e">
	<?php for($i = 0; $i<sizeof($data); $i++){ ?>
    <div style="width: 100%; float:left; border:1px solid #adadad; margin-top:20px; box-shadow:inset 0px -3px 10px #c2c2c2; word-wrap: break-word">
    <?php if($i % 2 == 0){ ?>
    	<div style="width: 100%; float:left; background-color: #d9edf7; box-shadow:inset 0px 3px 10px #c2c2c2;">
    <?php }else{ ?>
    	<div style="width: 100%; float:left; background-color: #ffcaca; box-shadow:inset 0px 3px 10px #c2c2c2;">
    <?php } ?>
		<h1 style="font-size: 25px; margin-left: 10px; font-family: 'Raleway Medium', sans-serif"><?php echo $data[$i][1] ?></h1>	
		<h5 style="font-size:15px;font-family: 'Raleway', sans-serif; margin-left: 2%">by <?php echo $data[$i][0] ?> il <?php echo $data[$i][3] ?></h5>
	</div>
	<div style="width: 99%; margin-left: 1%">
		<p style="font-size: 20px; margin-top: 90px"><?php echo $data[$i][2] ?></p>
	</div>
	</div>
	<?php } ?>
	  
	</body>
</html>