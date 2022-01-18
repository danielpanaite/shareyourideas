<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		
		<?php	
			//---------Recaptcha------------
			
			session_start();
			include '../Query.php';
			$nickname = $_POST['nickname'];
			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			$email = $_POST['email'];
			$giorno = $_POST['giorno'];
			$mese = $_POST['mese'];
			$anno = $_POST['anno'];
			$paese = $_POST['paese'];
			
			$_SESSION['nickname'] = $nickname;
			$_SESSION['password'] = $password;
			$_SESSION['email'] = $email;
			$_SESSION['paese'] = $paese;
			$_SESSION['giorno'] = $giorno;
			$_SESSION['mese'] = $mese;
			$_SESSION['anno'] = $anno;
			
			$nicks = getAllNicknames();
			$mails = getAllEmails();
			$nickExist = FALSE;
			$mailExist = FALSE;
			for($i = 0; $i<sizeof($nicks); $i++){
				if($nickname == $nicks[$i][0]){
					$nickExist = TRUE;
				}
			}
			for($i = 0; $i<sizeof($mails); $i++){
				if($email == $mails[$i][0]){
					$mailExist = TRUE;
				}
			}
			
			require 'Recaptcha.php';

			$recaptcha = $_POST['g-recaptcha-response'];

			$object = new Recaptcha();
			$response = $object->verifyResponse($recaptcha);

			if(isset($response['success']) and $response['success'] != true) {
				echo "An Error Occured and Error code is :";
				print_r($response['error-codes']);
				$_SESSION['captcha'] = "errorRegistra";
				header("Location: ../registra.php");
				die();
			}else {
				echo "Correct Recaptcha";
				if( $nickname !== "" && $password !== "" && $confirm !== "" && $email !== "" && $giorno !== "" && $mese !== "" && $anno !== "" ){
					if($password == $confirm ){
						if($nickExist == TRUE && $mailExist == TRUE){
							$_SESSION['exist'] = "nick&mail";
							header("Location: ../registra.php");
							die();
						}else if($nickExist == TRUE){
							$_SESSION['exist'] = "nick";
							header("Location: ../registra.php");
							die();
						}else if($mailExist == TRUE){
							$_SESSION['exist'] = "mail";
							header("Location: ../registra.php");
							die();
						}else if($nickExist == FALSE && $mailExist == FALSE){
							$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
							$code = '';
							for ($p = 0; $p < 32; $p++) {
								$code .= $characters[mt_rand(0, strlen($characters))];
							}
							$data = $giorno . "/" . $mese . "/" . $anno;
                            registra($nickname, $password, $email, $paese, $data, $code);
							$messaggio = "L'Admin di Propaganda ti da il benvenuto. Rispetta gli altri utenti e divertiti. <br> -Team Propaganda";
							scriviMessaggio($nickname, $messaggio, "Benvenuto", "Admin");
							$_SESSION['code'] = $code;
							
							header("Location: confermaServlet.php");
							die();
							
							//ServletContext context= getServletContext();
							//RequestDispatcher rd= context.getRequestDispatcher("/confirmServlet");
							//rd.forward(request, response);
						}
						
					}else{
						$_SESSION['captcha'] = "password";
						header("Location: ../registra.php");
						die();
					}
				}else{
					$_SESSION['captcha'] = "campi vuoti";
					header("Location: ../registra.php");
					die();
				}
			}
			
			/*//--------------------------
			
			
			//--------------Captcha-------------
			
			
			boolean verify = VerifyRecaptcha.verify(gRecaptchaResponse);
			//--------success----
			if(verify){
			//-------------------
				if( !request.getParameter("nickname").toString().equals("") && !request.getParameter("password").toString().equals("") && !request.getParameter("confirm").toString().equals("") && !request.getParameter("email").toString().equals("") && !request.getParameter("giorno").toString().equals("") && !request.getParameter("mese").toString().equals("") && !request.getParameter("anno").toString().equals("") ){
					if(request.getParameter("password").toString().equals(request.getParameter("confirm").toString())){
						if(nickExist == true && mailExist == true){
							session.setAttribute("exist", "nick&mail");
							response.sendRedirect("registra1.jsp");
						}else if(nickExist == true){
							session.setAttribute("exist", "nick");
							response.sendRedirect("registra1.jsp");
						}else if(mailExist == true){
							session.setAttribute("exist", "mail");
							response.sendRedirect("registra1.jsp");
						}else if(nickExist == false && mailExist == false){
							SecureRandom random = new SecureRandom();
							String codice = new BigInteger(130, random).toString(32);
							String data = request.getParameter("giorno") + "/" + request.getParameter("mese") + "/" + request.getParameter("anno");
							q.registra(request.getParameter("nickname"), request.getParameter("password"), request.getParameter("email"), request.getParameter("paese"), data, codice);
							session.setAttribute("nickname", request.getParameter("nickname"));
							String messaggio = "L'Admin di Propaganda ti da il benvenuto. Rispetta gli altri utenti e divertiti. -Team Propaganda";
							q.scriviMessaggio(request.getParameter("nickname"), messaggio, "Benvenuto", "Admin");
							session.setAttribute("code", codice);
							ServletContext context= getServletContext();
							RequestDispatcher rd= context.getRequestDispatcher("/confirmServlet");
							rd.forward(request, response);
						}
						
					}else{
						session.setAttribute("captcha", "password");
						response.sendRedirect("registra1.jsp");
					}
				}else{
					session.setAttribute("captcha", "campi vuoti");
					response.sendRedirect("registra1.jsp");
				}
			//-----fail----------
			}else{
				session.setAttribute("captcha", "errorRegistra");
				response.sendRedirect("registra1.jsp");
			}
			//----------------
			q.closeDb();
		} catch (Exception e) {
			e.printStackTrace();
		}
		
		}
	
	}*/
	?>
	
	</body>
</html>