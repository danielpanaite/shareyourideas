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
<script src="https://www.google.com/recaptcha/api.js"></script>
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
include "Query.php";
$config = require('config.php');
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
 	 			<img src="ProfileImages/<?php echo $_SESSION['nickname'].'.png' ?> " width="20px" height="20px">
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
	
	<?php if(!isset($_SESSION['nickname'])){
	?> <a style="text-decoration: none; color: black"><h1>Eseguire il login per pubblicare</h1></a> <?php	
	}else{ ?>
		<form action="Servlet/postServlet.php" method="POST" style="text-align: center; margin-left: 20%; margin-right: 20%; background-color: #f8f8f8; padding: 20px; border-top-right-radius: 10px; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px">
			<h2 style="font-family:'Raleway', sans-serif"><?php echo getDomanda($_SESSION['settimana'])[0] ?></h2>
			<input type="hidden" name="exp" value="5">
			<a style="text-decoration: none; color: black"><h3></h3></a>
			<textarea class="form-control" name="comment" rows="5" id="comment" style="resize: none" maxlength="500"></textarea>
			<div class="g-recaptcha"
		data-sitekey="<?php echo $config['client-key']; ?>"
		data-callback="onSubmit">
		</div>
			<button type="submit" name="postsubmit" class="btn btn-default" style="margin-top: 20px" onClick="this.form.submit(); this.disabled=true;">Invia</button>
			<?php if($_SESSION['post'] == "errorPost"){ ?>
				<h2 style="font-family:'Raleway', sans-serif; color:red">Captcha sbagliato</h2>
			<?php }else if($_SESSION['post'] == "campi vuoti"){ ?>
				<h2 style="font-family:'Raleway', sans-serif; color:red">Compila tutti i campi</h2>
			<?php } ?>
		</form>
		<br>
	<?php }
		?>

</body>
</html>