<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway: 300" rel="stylesheet">
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

<style type="text/css">
p{font-family: 'Raleway Light', sans-serif}
</style>
	
	<?php
	session_start();
	include 'Query.php';
	$_SESSION['messaggioInviato'] = "inviato";
	$settimana = $_SESSION['settimana'];
	$utente = getUtente($_SESSION['nickname']);
	$_SESSION['exp'] = $utente[4];
	
	$_SESSION['messaggio'] = "";
	$_SESSION['post'] = "";
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
      <?php
      if(!isset($_SESSION['page'])){
    	  $_SESSION['page'] = "1";
      }
	if($_GET['param'] == 1){ ?>
		<a class="navbar-brand" style="margin-top: 5px; font-size: 20px"><?php echo getGruppi()[0][0] ?></a>
		<?php $_SESSION['gruppo'] = "1" ; ?>
	<?php }else if($_GET['param'] == 2){ ?>
		<a class="navbar-brand" style="margin-top: 5px; font-size: 20px"><?php echo getGruppi()[1][0] ?></a>
		<?php $_SESSION['gruppo'] = "2" ; ?>
	<?php }else if($_GET['param'] == 3){ ?>
		<a class="navbar-brand" style="margin-top: 5px; font-size: 20px"><?php echo getGruppi()[2][0] ?></a>
		<?php $_SESSION['gruppo'] = "3" ; ?>
	<?php } ?>
	<a href="index1.php" style="text-decoration: none; color:black; float:left; margin-top:20px; font-size:17px"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
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

<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default" style="border: 0; background: none"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
  </div>
  <?php
  $size = (getNumeroPost($_SESSION['gruppo'], $_SESSION['settimana']))/10;
  for($i=1; $i<$size+1; $i++){ ?>
  	<div class="btn-group" role="group">
  	<form action="Servlet/scegliPaginaServlet.php" method="POST">
  		<input type="hidden" name="page" value=<?php echo $i ?>>
    	<button type="submit" class="btn btn-default"><?php echo $i ?></button>
    </form>
  	</div> 
  <?php } ?>
  
  <div class="btn-group" role="group">
    <button type="button" class="btn btn-default" style="border: 0; background: none"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
  </div>
</div>

	 
	<?php
	if(!isset($_SESSION['nickname'])){ ?>
		<a style="text-decoration: none; color: black"><h1>Devi prima scegliere un gruppo</h1></a>
	<?php }else if(getGruppoUtente($_SESSION['nickname']) == $_SESSION['gruppo']){
	
	if($_SESSION['nickname'] != null){ ?>
	<?php if($settimana == getNumeroDomanda()){ ?>
		<?php if(getCooldown($_SESSION['nickname']) < (round(microtime(true) * 1000))-3600000){ ?>
		
			<div style="text-align: right">
				<a href="post.php" style="text-decoration: none; color: black"><button type="button" class="btn btn-default" style="margin: 10px">Rispondi</button></a>
			</div>
			
		<?php }else if(getCooldown($_SESSION['nickname']) > (round(microtime(true) * 1000))-3600000){ ?>
			
			<div style="text-align: right">
				<a style="text-decoration: none; color: black"><button type="button" class="btn btn-default" style="margin: 10px" disabled>Rispondi</button></a>
				<h5 style="font-family: 'Raleway', sans-serif">Devi aspettare un'ora prima di pubblicare un'altro post</h5>
			</div>
			
		<?php } ?>
	<?php } ?>
	<?php }else{ ?>
		<div style="text-align: right">
			<p style="margin: 10px">Esegui il login per creare un post</p>
		</div>
	<?php } ?>
	<a style="color: #e46944; text-decoration: none"><h2><?php echo getDomanda($_SESSION['settimana'])[0] ?></h2></a>
	
	<?php if($settimana != getNumeroDomanda()){ ?>
		<h5 style="color:red; float:right; font-family:'Raleway', sans-serif">Siamo spiacenti, le votazioni sono chiuse</h5>
	<?php } ?>
	
	<?php
	for($i = 0; $i<sizeof(getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)); $i++){ ?>
	<div style="width: 100%; float:left; border: 1px solid white; margin-top: 5px; margin-bottom: 5px">
	<div style="width: 90%; float:left; border-right: 0">
	<?php $user = getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][1]; 
	$idPost = getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][0]; 
	$like = getLike($_SESSION['nickname'], $idPost);
	?>
	<form action="Servlet/scriviMessaggioServlet.php" method="POST">
		<input type="hidden" name="userMessaggio" value=<?php echo $user ?>>
		<?php
 	 		$a = 'ProfileImages/'.$user.'.png';
			if(file_exists($a)){ ?>
            	<img src="ProfileImages/<?php echo $user.'.png?'. filemtime($a) ?> " width="60px" height="60px">
 	 		<?php }else{ ?>
 	 		<span class="glyphicon glyphicon-picture" aria-hidden="true" style="width:40px; height:20px; padding-left:20px"></span>
			<?php } ?>
		<button type="submit" style="border:0; background:none; font-family: 'Raleway', sans-serif; font-size: 30px; padding-top:10px"><?php echo $user ?>  <span class="glyphicon glyphicon-share-alt" aria-hidden="true" style="font-size: 15px; color:#a4a4a4"></span></button>
	</form>
		<p style="margin-left: 10px; margin-right: 10px; margin-top:10px; font-size:18px; font-family:'Raleway', sans-serif"><?php echo getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][2] ?></p>
		<p style="text-align: right; margin-right: 10px"><?php echo getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][5] ?></p>
	</div>
	<div style="width: 10%; float:left; border-left: 0">
	<form action="Servlet/likeServlet.php" method="POST">
		<input type="hidden" name="id" value=<?php echo $idPost ?>>
		<input type="hidden" name="value" value="mipiace">
		<?php if($like == null || $like == "nonmipiace"){ ?>
			<button type="submit" class="btn btn-default" style="margin: 10px; border: 0"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <?php echo getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][3] ?></button>
		<?php }else if($like == "mipiace"){ ?>
			<button type="submit" class="btn btn-default" style="margin: 10px; border: 1px solid green"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <?php echo getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][3] ?></button>
		<?php } ?>
	</form>
	<?php if($settimana == getNumeroDomanda()){ ?>
	<form action="Servlet/likeServlet.php" method="POST">
	<?php } ?>
		<input type="hidden" name="id" value=<?php echo $idPost ?>>
		<input type="hidden" name="value" value="nonmipiace">
		<?php if($like == null || $like == "mipiace"){ ?>
			<button type="submit" class="btn btn-default" style="margin: 10px; border: 0"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <?php echo getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][4] ?></button>
		<?php }else if($like == "nonmipiace"){ ?>
			<button type="submit" class="btn btn-default" style="margin: 10px; border: 1px solid red"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <?php echo getPost($_SESSION['gruppo'], $_SESSION['page'], $settimana)[$i][4] ?></button>
		<?php } ?>
		
	</form>
	</div>
	</div>
	<?php }
	}else{ ?>
		<a style="text-decoration: none; color: black"><h1>Non appartieni a questo gruppo</h1></a>
	<?php } ?>
	
</body>
</html>