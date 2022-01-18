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
  
  <?php
	session_start();
	include 'Query.php';
	$_SESSION['cambiapassword'] = "";
	$_SESSION['cambiaemail'] = "";
	$utente = getUtente($_SESSION['nickname']);
	$_SESSION['exp'] = $utente[4];
	$_SESSION['title'] = getExpTitle($_SESSION['exp']);
	$_SESSION['email'] = $utente[1];
	$_SESSION['paese'] = $utente[2];
	$_SESSION['dataNascita'] = $utente[3];
	?>	
	
	<div class="jumbotron" style="text-align:center; border-top-left-radius: 0px; border-top-right-radius: 0px; background-color: #c95b3a; margin: 0px; padding-right: 30%; width: 100%; padding-top: 0.1%; padding-bottom:0.5%; box-shadow:0px 15px 30px rgba(61, 61, 61, 0.5)">
    <a href="index1.php" style="color: white; text-decoration: none"><h1 style="font-family: 'Lobster', cursive">Propaganda</h1></a>
  </div>
  <div class="container" style="background-color: #e8e8e8; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border: 2px solid #a74a2e; border-top: none; box-shadow: 0px 8px 36px rgba(36, 36, 36, 0.5);">
  <div class="container-fluid">
	<nav class="navbar navbar-default" style="horizontal-alignment: center; width:100%; border-top-left-radius: 0px; border-top-right-radius: 0px">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="margin-top: 5px">Profilo</a>
      <a href="index1.php" style="text-decoration: none; color:black; float:left; margin-top:21px; font-size:17px"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>
	
	<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="border: 1px solid #a74a2e; border-top: none">
    
    <div class="navbar-right" style="margin-right: 10px">
        
		<ul class="nav navbar-nav">
		<?php if(isset($_SESSION['nickname'])){ ?>
		<h4 style="float:left; margin-top: 22px; font-family:'Raleway', sans-serif"><?php echo "Exp: " . $_SESSION['exp'] . " - " . $_SESSION['title'] ?></h4>
		<?php } ?>
		<a href="messaggi.php" style="color: black; text-decoration: none">
        <button type="button" class="btn btn-default navbar-btn" aria-label="Left Align" style="background: none; border: none; margin-top: 18px">
 	 		<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
			<?php
			$notifications = getNotifications($_SESSION['nickname']);
			if($notifications > 0){ ?> 	 		
 	 		<span style="color:white; padding:2px; background-color:red; border-radius:10px"><?php echo $notifications ?></span>
			<?php } ?>
		</button></a>
        <li class="dropdown">
        <?php if($_SESSION['nickname'] == null){ ?>
 	 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-default" aria-label="Left Align" style="margin: 0"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></button></a>
 	 		<ul class="dropdown-menu" style="margin: 0">
            <form action="loginServlet" method="POST">
            	<li style="margin-left: 5px; margin-right: 5px"><input type="text" name="nickname"class="form-control" placeholder="Nickname"></li>
            	<li style="margin-left: 5px; margin-right: 5px"><input type="password" name="password" class="form-control" placeholder="Password"></li>
            	<li style="margin-left: 5px; margin-right: 5px"><button type="submit" name="loginsubmit" class="btn btn-default" style="font-family: 'Raleway', sans-serif">Login</button> o <a href="registra1.php">Registrati</a></li>
            </form>
          </ul>
 	 		<?php }else{ $nick = $_SESSION['nickname']; ?>
 	 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-default navbar-btn" aria-label="Left Align" style="margin: 0">
 	 		
 	 		<?php
 	 		$a = 'ProfileImages/'.$_SESSION['nickname'].'.png';
			if(file_exists($a)){ ?>
 	 			<img src="ProfileImages/<?php echo $_SESSION['nickname'].'.png?'. filemtime($a) ?> " width="20px" height="20px">
 	 		<?php }else{ ?>
 	 			<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
 	 		<?php } ?>
 	 		
 	 		</button></a>
 	 		<ul class="dropdown-menu" style="margin: 0">
 	 			<li><a href="profilo.php">Profilo</a></li>
 	 			<li><a href="logout.php">Logout</a></li>
 	 		</ul>
 	 		<?php } ?>
        </li>
      </ul>	
	</div>
    </div><!-- /.navbar-collapse -->
<!-- /.container-fluid -->
</nav>

<div style="margin-left: 20%; margin-right: 20%; background-color: #f8f8f8; padding: 20px; border-top-right-radius: 10px; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px">
		<?php 
 	 		$a = 'ProfileImages/'.$_SESSION['nickname'].'.png';
 	 		if(file_exists($a)){ ?>
            	<p><img src="ProfileImages/<?php echo $_SESSION['nickname'].'.png?'. filemtime($a) ?> " width="50px" height="50px" style="float:left; margin-top:20px; margin-right:10px"></p>
 	 		<?php }else{ ?>
 	 			<p><span class="glyphicon glyphicon-picture" aria-hidden="true" style="float:left; margin-top:20px; margin-right:10px"></span></p>
 	 		<?php } ?>
 	 	
 	 	<form id="formImg" action='Servlet/imageServlet.php' method='POST' enctype='multipart/form-data' style="margin-bottom:10px">
    		<a><input type="file" id="file" name="immagine"class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Carica immagine"></a>
    		<h5 style=" font-family:'Raleway', sans-serif">*E consigliato usare immagini quadrate di dimensioni inferiori a 500kb</h5>
    		<script type="text/javascript">
    		$("#file").change(function(){
    			document.getElementById("formImg").submit();
    	 	});
    		</script>
		</form>
		<?php if($_SESSION['errorImg'] == "dimensioni"){ ?>
			<h5 style="color:red; font-family:'Raleway', sans-serif">Dimensioni file troppo grandi</h5>
		<?php }else if($_SESSION['errorImg'] == "ricarica"){ ?>
			<h5 style="color:green; font-family:'Raleway', sans-serif">Immagine caricata. Ricaricare la pagina per vedere le modifiche apportate</h5>
		<?php } ?>
		<p>Nickname: <span style="color: #337ab7"><?php echo $_SESSION['nickname'] ?></span></p>
		<p>Email: <span style="color: #337ab7"><?php echo $_SESSION['email'] ?></span></p>
		<p>Paese: <span style="color: #337ab7"><?php echo $_SESSION['paese'] ?></span></p>
		<p>Data di Nascita: <span style="color: #337ab7"><?php echo $_SESSION['dataNascita'] ?></span></p>
		<p>Exp: <span style="color: #337ab7"><?php echo $_SESSION['exp'] ?>  -  <?php echo $_SESSION['title'] ?></span></p>
		<p style="text-align: center"><a href="modifica.php" style="color: black; text-decoration: none"><button type="button" class="btn btn-default" aria-label="Left Align" style="padding: 5px">Modifica dati</button></a>
		<a href="logout.php"><button type="button" class="btn btn-default" style="padding:5px">Logout</button></a></p>
		
	</div>
	<br>
  
  </body>
</html>