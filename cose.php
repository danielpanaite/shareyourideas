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
  
	<?php session_start(); ?>
  
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
    
    
    
		
		
<div style="width:100%; border:1px solid #a74a2e; border-radius:10px; background-color:#f9f9f9; margin-bottom:30px">

<div class="media" style="margin:20px; margin-left:10px; margin-right:10px">
  <div class="media-left">
      <img class="media-object" width="100px" heigth="100px" src="comefunzionaImages/checose.png" alt="Gruppo">
  </div>
  <div class="media-body">
    <h3 class="media-heading">Che cos'è</h3>
    <h4 style="line-height:23px">Propaganda e' un forum nato come progetto scolastico, successivamente evolutosi per diventare cio' che oggi e': una piattaforma dove condividere
    le proprie idee e dove interagire con diverse persone che la pensano come o diversamente da te, discutendo su un unico tema ogni settimana. Inoltre, 
    per ogni gruppo verra' scelto un portavoce dai membri stessi, e che ogni settimana potra' far sapere agli altri gruppi la sua idea</h4>
    <h4 style="color:#c95b3a">Una volta creato un account, scegli il tuo gruppo sulla pagina iniziale</h4>
  </div>
</div>

<hr>

<div class="media" style="margin:20px">
  <div class="media-body">
    <h3 class="media-heading">Creati un'identita</h3>
    <h4 style="line-height:23px">Con Propaganda entrano in gioco le tue idee. Quindi perche non far sapere agli altri chi sei? Chissa, magari un giorno diventerai famoso</h4>
    <h4 style="color:#c95b3a">Basta 
	<?php
    if(!isset($_SESSION['nickname'])){ ?>
    <a style="color:#a74a2e; text-decoration:underline" href="registra.php">creare un account</a> 
    <?php }else{ ?>
    creare un account
    <?php } ?>
    per iniziare, facile e veloce</h4>
  </div>
  <div class="media-right">
      <img class="media-object" width="100px" heigth="100px" src="comefunzionaImages/contact.png" alt="Identita">
  </div>
</div>

<hr>

<div class="media" style="margin:20px; margin-left:10px; margin-right:10px">
  <div class="media-left">
      <img class="media-object" width="100px" heigth="100px" src="comefunzionaImages/group.png" alt="Gruppo">
  </div>
  <div class="media-body">
    <h3 class="media-heading">Scegli il tuo gruppo</h3>
    <h4 style="line-height:23px">Sei una persona unica e meravigliosa, lo sappiamo. Ma a quanto pare esistono altre persone la fuori che la pensano come te, quindi perche non unirti a loro?</h4>
    <h4 style="color:#c95b3a">Una volta creato un account, scegli il tuo gruppo sulla pagina iniziale</h4>
  </div>
 </div>

<hr>

<div class="media" style="margin:20px">
  <div class="media-body">
    <h3 class="media-heading">Mettiti in gioco</h3>
    <h4 style="line-height:23px">La tua partecipazione per noi e altrettanto importante, quindi perche non sentirti un eroe?</h4>
    <h4 style="color:#c95b3a">Rispondi alla domanda della settimana nel tuo gruppo e vota le risposte degli altri</h4>
  </div>
  <div class="media-right">
      <img class="media-object" width="100px" heigth="100px" src="comefunzionaImages/participate.png" alt="Identita">
  </div>
</div>
    
    
</div>
    
</body>
</html>