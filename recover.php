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
<script src='https://www.google.com/recaptcha/api.js'></script>
<title>Propaganda</title>
</head>
<body style=" background-image: url('Propaganda1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  top:-40px">

	<?php
    session_start();
	if(!isset($_SESSION['recover'])){
		$_SESSION['recover'] = "";
	}
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
      <a class="navbar-brand" href="#" style="margin-top: 5px; font-size: 20px">Recupera password</a>
      <a href="index1.php" style="text-decoration: none; color:black; float:left; margin-top:20px; font-size:17px"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="border: 1px solid #a74a2e; border-top: none">
    
    
    </div><!-- /.navbar-collapse -->
<!-- /.container-fluid -->
</nav>

	<div style="width:100%">
	<center>
		<form action="Servlet/recoverServlet.php" method="POST">
            <input type="text" name="nickname"class="form-control" placeholder="Nickname" style="margin-top:10px; margin-bottom:10px; width:50%">
            <p>oppure</p>
        	<input type="email" name="email" class="form-control" placeholder="Email" style="margin-top:10px; width:50%">
        	<?php
        	if($_SESSION['recover'] == "Email non corrispondente a nessun account"){ ?>
        	<h5 style="color:red; font-family:'Raleway', sans-serif">Email non corrispondente a nessun account</h5>
        	<?php }else if($_SESSION['recover'] == "Nome utente non registrato"){ ?>
        	<h5 style="color:red; font-family:'Raleway', sans-serif"><?php echo $_SESSION['recover'] ?></h5>
        	<?php }else{ ?>
        	<h5 style="color:green; font-family:'Raleway', sans-serif"><?php echo $_SESSION['recover'] ?></h5>
        	<?php } ?>
			<div class="g-recaptcha"
				data-sitekey="<?php echo $config['client-key']; ?>"
				data-callback="onSubmit">
			</div>
        	<button type="submit" name="loginsubmit" class="btn btn-default" style="font-family: 'Raleway', sans-serif; margin:10px">Recupera</button>
        </form>
        <?php if(isset($_SESSION['captcha']) && $_SESSION['captcha'] == "errorRecover"){ ?>
			<h3 style="font-family:'Raleway', sans-serif; color:red">Captcha sbagliato</h3>
		<?php } ?>
    </center>
	</div>

</body>
</html>