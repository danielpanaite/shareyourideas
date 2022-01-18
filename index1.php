<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<style>
.groupbox{
word-wrap: break-word;
}
#bot{
margin-right:20px;
}

@media(max-width:900px){
#bot{
display:block;
margin-right:0;
margin-top:5px;
}
#botdiv{
text-align:left;
}
#settimana{
width:100% !important;
}
}
#av_toolbar_regdiv, #av_toolbar_iframe, .av_site, .av-antipixel { display: none; }
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script src="jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<script src="js/bootstrap.min.js"></script>
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
  top: 0px">

  
  
	<?php
	
		session_start();
		include 'Query.php';
		if(!isset($_SESSION['settimana'])){
			$_SESSION['settimana'] = getNumeroDomanda();
		}
		$domanda = getDomanda($_SESSION['settimana']);
		if(isset($_SESSION['nickname'])){
			$utente = getUtente($_SESSION['nickname']);
			$_SESSION['exp'] = $utente[4];
			$_SESSION['title'] = getExpTitle($_SESSION['exp']);
			$_SESSION['errorImg'] = "";
			$_SESSION['feedback'] = "";
			$_SESSION['contact'] = "";
			$_SESSION['messaggio'] = "";
		}
		$settimana = $_SESSION['settimana'];
		date_default_timezone_set('UTC');
		$giorno = date("l");
		$giornorisp = "Sunday";
		$vedi1 = FALSE;
		$vedi2 = FALSE;
		$vedi3 = FALSE;
		if($giorno == $giornorisp && $settimana == getNumeroDomanda() || $settimana != getNumeroDomanda() && sizeof(getWinner(1, $settimana)) > 0){
			$vedi1 = TRUE;
		}
		if($giorno == $giornorisp && $settimana == getNumeroDomanda() || $settimana != getNumeroDomanda() && sizeof(getWinner(2, $settimana)) > 0){
			$vedi2 = TRUE;
		}
		if($giorno == $giornorisp && $settimana == getNumeroDomanda() || $settimana != getNumeroDomanda() && sizeof(getWinner(3, $settimana)) > 0){
			$vedi3 = TRUE;
		}
		?>
		<div class="jumbotron" style="text-align:center; border-top-left-radius: 0px; border-top-right-radius: 0px; background-color: #c95b3a; margin: 0px; padding-right: 30%; width: 100%; padding-top: 0.1%; padding-bottom:0.5%; box-shadow:0px 15px 30px rgba(61, 61, 61, 0.5)">
    <h1 style="font-family: 'Lobster', cursive; color: white">Propaganda</h1>
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
      <a class="navbar-brand" href="#" style="margin-top: 7px; font-size: 20px"><?php echo $domanda[1] ?></a>
    </div>

	<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="border: 1px solid #a74a2e; border-top: none">
    
    <div class="navbar-right" style="margin-right: 10px">
		<ul class="nav navbar-nav">
		<?php if(isset($_SESSION['nickname'])){ ?>
		<h4 style="float:left; margin-top: 22px"><?php echo 'Exp: '.$_SESSION['exp'].' - '.$_SESSION['title'] ?></h4>
		<a href="messaggi.php" style="color: black; text-decoration: none">
        <button type="button" class="btn btn-default navbar-btn" aria-label="Left Align" style="background: none; border: none; margin-top: 18px">
 	 		<span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
			<?php
			$notifications = getNotifications($_SESSION['nickname']);
			if($notifications > 0){ ?> 	 		
 	 		<span style="color:white; padding:2px; background-color:red; border-radius:10px"><?php echo $notifications ?></span>
			<?php } ?>
		</button></a>
		<?php } ?>
        <li class="dropdown">
        <?php if(!isset($_SESSION['nickname'])){ ?>
        	<?php if(!isset($_SESSION['error'])){ ?>
 	 		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button type="button" class="btn btn-default" aria-label="Left Align" style="margin: 0"><span style="float:left">Login &nbsp;</span> <span class="glyphicon glyphicon-user" aria-hidden="true" style="margin-top: 2px"></span></button></a>
 	 		<ul class="dropdown-menu" style="margin: 0">
            <form action="Servlet/loginServlet.php" method="POST">
            	<li style="margin-left: 5px; margin-right: 5px"><input type="text" name="nickname"class="form-control" placeholder="Nickname"></li>
            	<li style="margin-left: 5px; margin-right: 5px"><input type="password" name="password" class="form-control" placeholder="Password"></li>
            	<li style="margin-left: 5px; margin-right: 5px"><button type="submit" name="loginsubmit" class="btn btn-default" style="font-family: 'Raleway', sans-serif">Login</button> o <a href="registra.php">Registrati</a></li>
           		<li style="margin-left: 5px; margin-right: 5px"><a href="recover.php" style="float:left; margin-top:2px">Nickname o Password dimenticata?</a></li>
            </form>
          </ul>
          <?php }else if($_SESSION['error'] == "pass sbagliata"){?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><button type="button" style="border-color: red" class="btn btn-default" aria-label="Left Align" style="margin: 0"><span style="float:left">Login &nbsp;</span> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button></a>
 	 		<ul class="dropdown-menu" style="margin: 0">
            <form action="Servlet/loginServlet.php" method="POST">
            	<li style="margin-left: 5px; margin-right: 5px"><input type="text" name="nickname"class="form-control" placeholder="Nickname"></li>
            	<li style="margin-left: 5px; margin-right: 5px"><input type="password" name="password" class="form-control" placeholder="Password"></li>
            	<li style="margin-left: 5px; margin-right: 5px"><button type="submit" name="loginsubmit" class="btn btn-default" style="font-family: 'Raleway', sans-serif">Login</button> o <a href="registra.php">Registrati</a></li>
            	<li style="margin-left: 5px; margin-right: 5px"><a href="recover.php" style="float:left; margin-top:2px">Nickname o Password dimenticata?</a></li>
            </form>
          </ul>
          <?php } ?>
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
    </div>
	</nav>

	<?php if(isset($_SESSION['error']) && $_SESSION['error'] == "pass sbagliata"){ ?>
	<center>
		<h4 style="color:red">Nickname o password sbagliati</h4>
	</center>
	<?php }
	$_SESSION['error'] = null;
	?>

	<?php if(isset($_SESSION['sent']) && $_SESSION['sent'] == "true"){ ?>
		<center>
		<h4 style="color:green">Email di conferma inviata!</h4>
	</center>
	<?php }
	$_SESSION['sent'] = null;
	?>

	<center>
		<div id="botdiv">
			<a id="bot" href="cose.php" style="color:black; text-decoration:none"><button type="button" class="btn btn-default" style="font-family: 'Raleway', sans-serif; border: 1px solid #a74a2e">Cos'e' Propaganda?</button></a>
			<a id="bot" href="chisiamo.php" style="color:black; text-decoration:none"><button type="button" class="btn btn-default" style="font-family: 'Raleway', sans-serif; border: 1px solid #a74a2e">Chi siamo?</button></a>
			<a id="bot" href="contact.php" style="color:black; text-decoration:none"><button type="button" class="btn btn-default" style="font-family: 'Raleway', sans-serif; border: 1px solid #a74a2e">Contattaci</button></a>
			<a id="bot" href="feedback.php" style="color:black; text-decoration:none"><button type="button" class="btn btn-default" style="font-family: 'Raleway', sans-serif; border: 1px solid #a74a2e">Feedback</button></a>
		</div>
	</center>

	<div>
		<form action="Servlet/settimanaServlet.php" method="POST">
		<select id="settimana" name="settimana" class="form-control" style="margin-top: 10px; width:30%; font-family:'Raleway', sans-serif" onchange="this.form.submit()">
		<option selected disabled>Scegli la settimana da visualizzare</option>
		<?php for($i = 0; $i<getNumeroDomanda(); $i++){ 
			$data = getDomanda($i+1);
		?>
			<option value=<?php echo $i+1 ?>>Settimana <?php echo $i+1 ?> - <?php echo $data[2] ?></option>
		<?php } ?>
		</select>
		</form>
	</div>
	
	<div class="panel panel-default" style="margin-top: 30px; border-radius: 0px; box-shadow: 10px 10px 5px #888888;">
	<div class="hover1"><a style="text-decoration:none; color: black"><div class="panel-heading" id="hover1"  style="background-color: #d9edf7; border-radius: 0px">Domanda della settimana</div></a></div>
	<div class="index1">
	<div class="panel-body">
		<p style="font-size: 20px"><?php echo $domanda[0] ?></p>
	</div>
	</div>
	</div>
	
	<?php
  	
  	if(!isset($_SESSION['nickname'])){ ?>
  	<div style="width: 100%; height: 200px; text-align: center; word-wrap: break-word">
        			<h1 style="font-family: 'Raleway', sans-serif">Gruppi</h1>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi1 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #d9edf7; width: 30%; float: left; margin-left: 3%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[0][0] ?>
        				</h1>
        				<?php if($vedi1 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(1, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(1, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi2 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #dff0d8; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[1][0] ?>
        				</h1>
        				<?php if($vedi2 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(2, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(2, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi3 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #ffcaca; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[2][0] ?>
        				</h1>
        				<?php if($vedi3 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(3, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(3, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        		</div>
        		<a style="color: black; text-decoration: none; font-size: 16px; float:left"><p>Esegui il login per scegliere e accedere a un gruppo</p></a>
  	<?php }else if(isset($_SESSION['nickname']) && getGruppoUtente($_SESSION['nickname']) != null){ ?>	
        		<div style="width: 100%; height: 200px; text-align: center">
        			<h1 style="font-family: 'Raleway', sans-serif">Gruppi</h1>
        			
        			<?php if(getGruppoUtente($_SESSION['nickname'])== "1"){?>
        			<a href="gruppo.php?param=1" style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi1 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #d9edf7; width: 30%; float: left; margin-left: 3%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[0][0] ?>
        				</h1>
        				<?php if($vedi1 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(1, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(1, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<?php }else{ ?>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi1 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #c6c6c6; width: 30%; float: left; margin-left: 3%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[0][0] ?>
        				</h1>
        				<?php if($vedi1 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(1, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(1, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<?php } ?>
        			
        			
        			<?php if(getGruppoUtente($_SESSION['nickname']) == "2"){?>
        			<a href="gruppo.php?param=2" style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi2 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #dff0d8; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[1][0] ?>
        				</h1>
        				<?php if($vedi2 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(2, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(2, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<?php }else{ ?>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi2 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #c6c6c6; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[1][0] ?>
        				</h1>
        				<?php if($vedi2 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(2, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(2, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<?php } ?>
        			
        			
        			<?php if(getGruppoUtente($_SESSION['nickname']) == "3"){ ?>
        			<a href="gruppo.php?param=3" style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi3 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #ffcaca; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[2][0] ?>
        				</h1>
        				<?php if($vedi3 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(3, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(3, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<?php }else{ ?>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi3 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #c6c6c6; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[2][0] ?>
        				</h1>
        				<?php if($vedi3 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(3, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(3, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<?php } ?>

        			
        		</div>
        	<?php }else if(null !== $_SESSION['nickname'] && getGruppoUtente($_SESSION['nickname']) == null && checkConfirm($_SESSION['nickname']) == true ){?>
        	<div style="width: 100%; height: 200px; text-align: center">
        	
        				
        			<h1 style="font-family: 'Raleway', sans-serif">Gruppi</h1>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi1 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #c6c6c6; width: 30%; float: left; margin-left: 3%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[0][0] ?>
        				</h1>
        				<?php if($vedi1 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(1, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(1, $settimana)[0][0] ?></h4>
        				<?php } ?>
        				<form action="Servlet/scegliGruppoServlet.php" method="POST">
        				<input type="hidden" name="gruppo" value="1"/>
        				<button type="submit" class="btn btn-default" style="margin: 10px">Scegli Gruppo</button>
        				</form>
        			</div></a>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi2 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #c6c6c6; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[1][0] ?>
        				</h1>
        				<?php if($vedi2 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(2, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(2, $settimana)[0][0] ?></h4>
        				<?php } ?>
        				<form action="Servlet/scegliGruppoServlet.php" method="POST">
        				<input type="hidden" name="gruppo" value="2"/>
        				<button type="submit" class="btn btn-default" style="margin: 10px">Scegli Gruppo</button>
        				</form>
        			</div></a>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi3 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #c6c6c6; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[2][0] ?>
        				</h1>
        				<?php if($vedi3 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(3, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(3, $settimana)[0][0] ?></h4>
        				<?php } ?>
        				<form action="Servlet/scegliGruppoServlet.php" method="POST">
        				<input type="hidden" name="gruppo" value="3"/>
        				<button type="submit" class="btn btn-default" style="margin: 10px">Scegli Gruppo</button>
        				</form>
        			</div></a>
        		</div>
	<?php }else if(checkConfirm($_SESSION['nickname']) == false){ ?>
		<h4 style="color:red">Conferma la tua email prima di scegliere un gruppo. Per reinviare l'email di conferma fai click <a href="Servlet/confermaServlet.php?mode=rinvia">qui</a></h4>
		<div style="width: 100%; height: 200px; text-align: center; word-wrap: break-word">
        			<h1 style="font-family: 'Raleway', sans-serif">Gruppi</h1>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi1 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #d9edf7; width: 30%; float: left; margin-left: 3%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[0][0]?>
        				</h1>
        				<?php if($vedi1 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(1, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(1, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi2 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #dff0d8; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[1][0]?>
        				</h1>
        				<?php if($vedi2 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(3, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(2, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        			<a style="text-decoration: none; color: black"><div class="groupbox" style="
        				<?php if($vedi3 == true){ ?>
        				height: auto; 
        				<?php }else{ ?>
        				height: 100px;
        				<?php } ?>
        				background-color: #ffcaca; width: 30%; float: left; margin-left: 1%; margin-right:1%; text-align: center; border:1px solid gray">
        				<h1>
						<?php echo getGruppi()[2][0]?>
        				</h1>
        				<?php if($vedi3 == true){ ?>
        				<h3>Risposta della settimana:</h3>
        				<h4 style="margin:3px">"<?php echo getWinner(3, $settimana)[0][1] ?>"</h4>
        				<h4 style="float:right; margin-right:5px">- <?php echo getWinner(3, $settimana)[0][0] ?></h4>
        				<?php } ?>
        			</div></a>
        		</div>
	<?php } ?>
	
    <?php if($giornorisp == $giorno){ ?>
	<center style="clear:both">
    <?php }else{ ?>
    <center>
    <?php } ?>
	<p>Ci trovi anche su: <img src="Social/facebook.png" width="30px" height="30px" style="margin-left:10px; margin-right:10px">
	<img src="Social/twitter.png" width="30px" height="30px" style="margin-left:10px; margin-right:10px">
	<img src="Social/instagram.png" width="30px" height="30px" style="margin-left:10px; margin-right:10px">
	</center>
	
    
	</body>
</html>