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
	
	<?php
	session_start();
	include 'Query.php';
	$config = require('config.php');
	?>
	
    <center>
    <h1>Propaganda</h1>
    <div style="width:50%">
    	<form action="Servlet/feedbackServlet.php" method="POST">
    		<?php if(isset($_SESSION['nickname'])){
    			if(null !== getUserFeedback($_SESSION['nickname'])){ ?>
    				<textarea class="form-control" name="contenuto" rows="5" id="feedback" style="resize: none; margin-top:10px; margin-bottom:10px" maxlength="250" placeholder="Feedback*"><?php echo getUserFeedback($_SESSION['nickname']) ?></textarea>
    			<?php }else if(null == getUserFeedback($_SESSION['nickname'])){
    				if(!isset($_SESSION['contenuto'])){ ?>
    					<textarea class="form-control" name="contenuto" rows="5" id="feedback" style="resize: none; margin-top:10px; margin-bottom:10px" maxlength="250" placeholder="Feedback*"></textarea>
    				<?php }else if(isset($_SESSION['contenuto'])){ ?>
    					<textarea class="form-control" name="contenuto" rows="5" id="feedback" style="resize: none; margin-top:10px; margin-bottom:10px" maxlength="250" placeholder="Feedback*"><?php echo $_SESSION['contenuto'] ?></textarea>
    				<?php } ?>
    			<?php }
    		}else if(!isset($_SESSION['contenuto'])){ ?>
    		<textarea class="form-control" name="contenuto" rows="5" id="feedback" style="resize: none; margin-top:10px; margin-bottom:10px" maxlength="250" placeholder="Feedback*"></textarea>
    		<?php }else if(isset($_SESSION['contenuto'])){ ?>
    		<textarea class="form-control" name="contenuto" rows="5" id="feedback" style="resize: none; margin-top:10px; margin-bottom:10px" maxlength="250" placeholder="Feedback*"><?php echo $_SESSION['contenuto'] ?></textarea>
    		<?php } ?>
    		<div class="g-recaptcha"
				data-sitekey="<?php echo $config['client-key']; ?>"
				data-callback="onSubmit">
			</div>
    		<h5 style="text-align:left">* Campi obbligatori</h5>
    		<?php if(!isset($_SESSION['nickname'])){ ?>
    			<button type="submit" name="submit" class="btn btn-default" style="margin-bottom: 0px" onClick="this.form.submit(); this.disabled=true;" disabled>Invia</button>
    			<h4 style="margin-bottom:20px; color:red">Devi eseguire il <a href="index1.php" style="color:blue; text-decoration:underline">login</a> per pubblicare un feedback</h4>
    		<?php }else if($_SESSION['nickname'] != null){
    			if(getUserFeedback($_SESSION['nickname']) != null){ ?>
				<button type="submit" name="submit" class="btn btn-default" style="margin-bottom: 20px" onClick="this.form.submit(); this.disabled=true;">Modifica feedback</button>
				<?php }else if(null == getUserFeedback($_SESSION['nickname'])){ ?>
					<button type="submit" name="submit" class="btn btn-default" style="margin-bottom: 20px" onClick="this.form.submit(); this.disabled=true;">Invia</button>
				<?php }
			}else{ ?>
    			<button type="submit" name="submit" class="btn btn-default" style="margin-bottom: 20px" onClick="this.form.submit(); this.disabled=true;">Invia</button>
    		<?php } ?>
    		
    		<?php if(isset($_SESSION['feedback']) && $_SESSION['feedback'] == "feedbackinviato"){ ?>
    			<h3 style="font-family:'Raleway', sans-serif; color:green">Feedback inviato!</h3>
    		<?php }else if(isset($_SESSION['feedback']) && $_SESSION['feedback'] == "campi vuoti"){ ?>
    			<h3 style="font-family:'Raleway', sans-serif; color:red">Compila tutti i campi</h3>
    		<?php }else if(isset($_SESSION['feedback']) && $_SESSION['feedback'] == "errorFeedback"){ ?>
    			<h3 style="font-family:'Raleway', sans-serif; color:red">Captcha sbagliato</h3>
    		<?php }else if(isset($_SESSION['feedback']) && $_SESSION['feedback'] == "feedbackupdate") ?>
    	</form>
    </div>
  	
    <h2>Alcuni feedback recenti</h2>
    <br>
	<br>
	<?php for($i = sizeof(getFeedback())-1; $i>-1; $i--){ ?>
	<div style="background-color:#f9f9f9; padding:10px; box-shadow: 0px 0px 30px #6e6e6e; width:90%">
	<p style="font-size:20px; text-align:center">"<?php echo getFeedback()[$i][1] ?>"</p>
	<p style="font-size:20px; text-align:right">- <?php echo getFeedback()[$i][0] ?></p>
	</div>
	<br><br><br>
	<?php } ?>
	
	<br> <br>
    </center>
    
    </div>
    
    
    </div>
    
</body>
</html>