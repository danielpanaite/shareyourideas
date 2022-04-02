<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Test</title>
	</head>
	<body>
		
		<?php
		$GET_NUMERO_DOMANDE = 'SELECT domanda.Settimana FROM domanda';
		$GET_DOMANDA = 'SELECT domanda.Domanda, domanda.Topic, domanda.Data FROM domanda WHERE domanda.Settimana = ?';
		$ADD_EXP = 'UPDATE user SET exp=exp+? WHERE nickname=?';
		$GET_GRUPPI = "SELECT gruppo.Titolo FROM gruppo";
		$GET_GRUPPO_UTENTE = "SELECT user_gruppo.Gruppo FROM user_gruppo WHERE user_gruppo.User = ?";
		$GET_MESSAGGI = "SELECT messaggio.Mittente, messaggio.Titolo, messaggio.Messaggio, messaggio.Data FROM messaggio, user_messaggio"
			. " WHERE user_messaggio.User = ?"
			. " AND messaggio.ID = user_messaggio.Messaggio";
		$GET_POST = "SELECT post.ID, user_post.User, post.Testo, post.MiPiace, post.NonMiPiace, post.Data FROM post, user_post, post_gruppo, post_settimana"
    		. " WHERE post.ID = post_gruppo.Post"
    		. " AND post_gruppo.Gruppo = ?"
    		. " AND user_post.Post = post_gruppo.Post"
    		. " AND post_settimana.Settimana = ?"
    		. " AND post_settimana.Post = post.ID"
    		. " LIMIT ? , 10";
		$GET_NUMERO_POST = "SELECT post.ID FROM post, user_post, post_gruppo, post_settimana, domanda"
    		. " WHERE post.ID = post_gruppo.Post"
    		. " AND post_gruppo.Gruppo = ?"
    		. " AND user_post.Post = post_gruppo.Post"
    		. " AND post_settimana.Settimana = ?"
			. " AND post_settimana.Settimana = domanda.Settimana"
    		. " AND post_settimana.Post = post.ID";
		$GET_UTENTE = "SELECT user.Nickname, user.Email, user.Paese, user.DataNascita, user.Exp FROM user"
    		. " WHERE user.Nickname = ?";
		$LOGIN = "SELECT user.Nickname, user.Password "
		    . "FROM user "
		    . "WHERE user.Nickname = ?";
		$MODIFICA_PASSWORD = "UPDATE user SET Password=? WHERE Nickname=?";
		$MODIFICA_EMAIL = "UPDATE user SET Email=? WHERE Nickname=?";
		$GET_NUMERO_TOT_POST = "SELECT post.ID FROM post";
		$INSERT_POST = "INSERT INTO post (ID, Testo, MiPiace, NonMiPiace, Data) values (?, ?, 0, 0, ?)";
		$INSERT_POST_GRUPPO = "INSERT INTO post_gruppo (Post, Gruppo) values (?, ?)";
		$INSERT_USER_POST = "INSERT INTO user_post (User, Post) values (?, ?)";
		$INSERT_POST_SETTIMANA = "INSERT INTO post_settimana (Post, Settimana) values(?, ?)";
		$REGISTRA = "INSERT INTO user (Nickname, Password, Email, Paese, DataNascita, Exp, Confirm)" . " values (?, ?, ?, ?, ?, 0, ?)";
		$SCEGLI_GRUPPO = "INSERT INTO user_gruppo (User, Gruppo) values (?, ?)";
		$GET_NUMERO_TOT_MESSAGGI = "SELECT messaggio.ID FROM messaggio";
		$INSERT_MESSAGGIO = "INSERT INTO messaggio (ID, Messaggio, Data, Titolo, Mittente) values (?, ?, ?, ?, ?)";
		$INSERT_USER_MESSAGGIO = "INSERT INTO user_messaggio (ID, User, Messaggio, Letto) values (?, ?, ?, ?)";
		$GET_EMAIL_FROM_USER = "SELECT user.Email FROM user WHERE user.Nickname = ?";
		$GET_USER_FROM_EMAIL = "SELECT user.Nickname FROM user WHERE user.Email = ?";
		$RESET_PASSWORD_RECOVER = "UPDATE user SET Password=? WHERE Nickname=?";
		$GET_CONFIRM_CODE = "SELECT user.Confirm FROM user WHERE user.Nickname = ?";
		$CHECK_CONFIRM = "SELECT user.Confirm FROM user WHERE user.Nickname = ?";
		$CONFIRM_EMAIL = "UPDATE user SET Confirm='confirm' WHERE Nickname=?";
		$MI_PIACE = "UPDATE post Set MiPiace=MiPiace+1 WHERE ID=?";
		$NON_MI_PIACE = "UPDATE post Set NonMiPiace=NonMiPiace+1 WHERE ID=?";
		$INSERT_VOTO = "INSERT INTO user_like (User,Post,Valore) values (?, ?, ?)";
		$GET_LIKE = "SELECT user_like.Valore FROM user_like WHERE user_like.User = ? AND user_like.Post = ?";
		$UPDATE_MI_PIACE = "UPDATE user_like SET Valore='mipiace' WHERE user_like.User = ? AND user_like.Post = ?";
		$UPDATE_NON_MI_PIACE = "UPDATE user_like SET Valore='nonmipiace' WHERE user_like.User = ? AND user_like.Post = ?";
		$REMOVE_MI_PIACE = "UPDATE post Set MiPiace=MiPiace-1 WHERE ID=?";
		$REMOVE_NON_MI_PIACE = "UPDATE post Set NonMiPiace=NonMiPiace-1 WHERE ID=?";
		$GET_ALL_NICKNAMES = "SELECT user.Nickname FROM user";
		$GET_ALL_EMAILS = "SELECT user.Email FROM user";
		$UPDATE_COOLDOWN = "UPDATE user Set Cooldown = ? WHERE user.Nickname = ?";
		$GET_COOLDOWN = "SELECT user.Cooldown FROM user WHERE user.Nickname = ?";
		$GET_USER_POST = "SELECT user_post.User FROM user_post WHERE user_post.Post = ?";
		$INSERT_FEEDBACK = "INSERT INTO feedback (User, Testo) values (?, ?) ";
		$GET_USER_FEEDBACK = "SELECT feedback.Testo FROM feedback WHERE feedback.User = ?";
		$GET_FEEDBACK_N = "SELECT feedback.Testo FROM feedback";
		$GET_FEEDBACK = "SELECT feedback.User, feedback.Testo FROM feedback LIMIT ?, 2";
		$UPDATE_FEEDBACK = "UPDATE feedback SET Testo = ? WHERE User = ?";
		$GET_WINNER = "SELECT user_post.User, post.Testo, post.MiPiace FROM post, post_gruppo, user_post, domanda, post_settimana"
			. " WHERE post_gruppo.Gruppo = ?"
			. " AND post_gruppo.Post = post.ID"
			. " AND user_post.Post = post.ID"
			. " AND domanda.Settimana = ?"
			. " AND post_settimana.Settimana = domanda.Settimana"
			. " AND post_settimana.Post = post.ID"
			. " ORDER BY post.MiPiace DESC";
		$GET_NOTIFICATIONS = "SELECT user_messaggio.Letto FROM user_messaggio, user"
			. " WHERE user_messaggio.Letto = 'no'"
			. " AND user.Nickname = ?"
			. " AND user_messaggio.User = user.Nickname";
		$SET_MESSAGGIO_LETTO = "UPDATE user_messaggio SET Letto = 'si' WHERE user_messaggio.User = ?";
        $GET_PASSWORD = "SELECT user.Password FROM user WHERE user.Nickname = ?";
		
		
		function getNumeroDomanda (){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1', 'my_shareyourideas');
			global $GET_NUMERO_DOMANDE;
			
			$ris = mysqli_query($conn, $GET_NUMERO_DOMANDE);
			$risultato = mysqli_fetch_all($ris);			
		
			mysqli_close($conn);
			return sizeof($risultato);
		}
		
		function getDomanda ($settimana){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1', 'my_shareyourideas');
			global $GET_DOMANDA;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_DOMANDA);
			$stmt->bind_param("i", $settimana);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato[0]);
			}
			mysqli_close($conn);
		}
		
		function addExp($exp, $nickname){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $ADD_EXP;
			
			$stmt = $conn->prepare($ADD_EXP);
			$stmt->bind_param("is", $exp, $nickname);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getExpTitle($exp){
			$title = "";
			if($exp < 100){
				$title = "Nuovo Membro";
			}else if($exp >= 100 && $exp < 1000){
				$title = "Membro";
			}else if($exp >= 1000 && $exp < 2500){
				$title = "Esperto";
			}else if($exp >= 2500 && $exp < 5000){
				$title = "Maestro";
			}else if($exp >= 5000 && $exp<10000){
				$title = "Leggenda";
			}else if($exp >= 10000){
				$title = "Dio";
			}
			return $title;
		}
		
		function getGruppi(){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_GRUPPI;
			
			$ris = mysqli_query($conn, $GET_GRUPPI);
			$risultato = mysqli_fetch_all($ris);

			mysqli_close($conn);
			return $risultato;
		}
		
		function getGruppoUtente($utente){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_GRUPPO_UTENTE;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_GRUPPO_UTENTE);
			$stmt->bind_param("s", $utente);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function getMessaggi($utente){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_MESSAGGI;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_MESSAGGI);
			$stmt->bind_param("s", $utente);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato);
			}
			mysqli_close($conn);
		}
		
		function getPost($gruppo, $pagina, $settimana){
			$pag = ($pagina -1)*5;
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_POST;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_POST);
			$stmt->bind_param("sii", $gruppo, $settimana, $pag);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			return $risultato;
			mysqli_close($conn);
		}
		
		function getNumeroPost($gruppo, $settimana){
			$size = 0;
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_NUMERO_POST;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_NUMERO_POST);
			$stmt->bind_param("si", $gruppo, $settimana);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			return(sizeof($risultato));
			mysqli_close($conn);
		}
		
		function getUtente($utente){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_UTENTE;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_UTENTE);
			$stmt->bind_param("s", $utente);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			return($risultato[0]);
			mysqli_close($conn);
		}
		
		function Login($utente, $password){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $LOGIN;
			$risultato = array();
			
			$stmt = $conn->prepare($LOGIN);
			$stmt->bind_param("s", $utente);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			
			if(!$risultato){
				return FALSE;
			}else if($utente == $risultato[0][0] && $password == $risultato[0][1]){
				return TRUE;
			}else{
				return FALSE;
			}
			mysqli_close($conn);
		}
		
		function modificaPassword($password, $utente){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $MODIFICA_PASSWORD;
			
			$stmt = $conn->prepare($MODIFICA_PASSWORD);
			$stmt->bind_param("ss", $password ,$utente);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function modificaEmail($email, $utente){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $MODIFICA_EMAIL;
			
			$stmt = $conn->prepare($MODIFICA_EMAIL);
			$stmt->bind_param("ss", $email ,$utente);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function newPost($testo, $gruppo, $nickname){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_NUMERO_TOT_POST;
			global $INSERT_POST;
			global $INSERT_POST_GRUPPO;
			global $INSERT_USER_POST;
			global $INSERT_POST_SETTIMANA;
			
			$ris = mysqli_query($conn, $GET_NUMERO_TOT_POST);
			$risultato = mysqli_fetch_all($ris);
		
			
			$ID = 0;
			
			if(sizeof($risultato) == 0){
				$ID = 1;
			}else{
				$size = sizeof($risultato);
				$n = $size - 1;
				$ID = $risultato[$n][0]+1;
			}
			
			$d = getdate();
			$data = $d["mday"]."/".$d["mon"]."/".$d["year"]."  ".$d["hours"].":".$d["minutes"].":".$d["seconds"];
			
			$stmt = $conn->prepare($INSERT_POST);
			$stmt->bind_param("iss", $ID ,$testo, $data);
			$stmt->execute();
			
			$stmt = $conn->prepare($INSERT_POST_GRUPPO);
			$stmt->bind_param("ii", $ID ,$gruppo);
			$stmt->execute();
			
			$stmt = $conn->prepare($INSERT_USER_POST);
			$stmt->bind_param("si", $nickname ,$ID);
			$stmt->execute();
			
			$numeroDom = getNumeroDomanda();
			$stmt = $conn->prepare($INSERT_POST_SETTIMANA);
			$stmt->bind_param("ii", $ID ,$numeroDom);
			$stmt->execute();
			
			mysqli_close($conn);
		}
		
		function registra($user, $password, $email, $paese, $dataNascita, $codice){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $REGISTRA;
			
			$stmt = $conn->prepare($REGISTRA);
			$stmt->bind_param("ssssss", $user, $password, $email, $paese, $dataNascita, $codice);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function scegliGruppo($user, $gruppo){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $SCEGLI_GRUPPO;
			
			$stmt = $conn->prepare($SCEGLI_GRUPPO);
			$stmt->bind_param("si", $user, $gruppo);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function scriviMessaggio($recipiente, $messaggio, $titolo, $mittente){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_NUMERO_TOT_MESSAGGI;
			global $INSERT_MESSAGGIO;
			global $INSERT_USER_MESSAGGIO;
			
			$ris = mysqli_query($conn, $GET_NUMERO_TOT_MESSAGGI);
			$risultato = mysqli_fetch_all($ris);
		
			
		
			$ID = 0;
			
			if(sizeof($risultato) == null){
				$ID = 1;
			}else{
				$ID = sizeof($risultato)+1;
			}
			
			$d = getdate();
			$data = $d["mday"]."/".$d["mon"]."/".$d["year"]."  ".$d["hours"].":".$d["minutes"].":".$d["seconds"];
			
			$stmt = $conn->prepare($INSERT_MESSAGGIO);
			$stmt->bind_param("issss", $ID, $messaggio, $data, $titolo, $mittente);
			$stmt->execute();
			
			$letto = "no";
			$stmt = $conn->prepare($INSERT_USER_MESSAGGIO);
			$stmt->bind_param("isis", $ID, $recipiente, $ID, $letto);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getEmailFromUser($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_EMAIL_FROM_USER;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_EMAIL_FROM_USER);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function getUserFromEmail($email){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_USER_FROM_EMAIL;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_USER_FROM_EMAIL);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function resetPasswordRecover($password, $user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $RESET_PASSWORD_RECOVER;
			
			$stmt = $conn->prepare($RESET_PASSWORD_RECOVER);
			$stmt->bind_param("ss", $password, $user);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getConfirmCode($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_CONFIRM_CODE;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_CONFIRM_CODE);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function checkConfirm($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $CHECK_CONFIRM;
			$risultato = array();
			
			$stmt = $conn->prepare($CHECK_CONFIRM);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato[0][0] == "confirm"){
				return TRUE;
			}else{
				return FALSE;
			}
			mysqli_close($conn);
		}
		
		function confirmEmail($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $CONFIRM_EMAIL;
			
			$stmt = $conn->prepare($CONFIRM_EMAIL);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function miPiace($ID){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $MI_PIACE;
			
			$stmt = $conn->prepare($MI_PIACE);
			$stmt->bind_param("i", $ID);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function nonMiPiace($ID){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $NON_MI_PIACE;
			
			$stmt = $conn->prepare($NON_MI_PIACE);
			$stmt->bind_param("i", $ID);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function insertVoto($user, $ID, $value){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $INSERT_VOTO;
			
			$stmt = $conn->prepare($INSERT_VOTO);
			$stmt->bind_param("sis", $user, $ID, $value);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getLike($user, $ID){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_LIKE;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_LIKE);
			$stmt->bind_param("si", $user, $ID);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return null;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function updateMiPiace($user, $ID){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $UPDATE_MI_PIACE;
			
			$stmt = $conn->prepare($UPDATE_MI_PIACE);
			$stmt->bind_param("si", $user, $ID);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function updateNonMiPiace($user, $ID){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $UPDATE_NON_MI_PIACE;
			
			$stmt = $conn->prepare($UPDATE_NON_MI_PIACE);
			$stmt->bind_param("si", $user, $ID);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function removeMiPiace($ID){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $REMOVE_MI_PIACE;
			
			$stmt = $conn->prepare($REMOVE_MI_PIACE);
			$stmt->bind_param("i", $ID);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function removeNonMiPiace($ID){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $REMOVE_NON_MI_PIACE;
			
			$stmt = $conn->prepare($REMOVE_NON_MI_PIACE);
			$stmt->bind_param("i", $ID);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getAllNicknames(){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_ALL_NICKNAMES;
			
			$ris = mysqli_query($conn, $GET_ALL_NICKNAMES);
			$risultato = mysqli_fetch_all($ris);

			mysqli_close($conn);
			return $risultato;
		}
		
		function getAllEmails(){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_ALL_EMAILS;
			
			$ris = mysqli_query($conn, $GET_ALL_EMAILS);
			$risultato = mysqli_fetch_all($ris);

			mysqli_close($conn);
			return $risultato;
		}
		
		function setCooldown($millis, $user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $UPDATE_COOLDOWN;
			
			$stmt = $conn->prepare($UPDATE_COOLDOWN);
			$stmt->bind_param("is", $millis, $user);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getCooldown($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_COOLDOWN;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_COOLDOWN);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function getUserPost($post){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_USER_POST;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_USER_POST);
			$stmt->bind_param("i", $post);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return $risultato;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function insertFeedback($user, $testo){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $INSERT_FEEDBACK;
			
			$stmt = $conn->prepare($INSERT_FEEDBACK);
			$stmt->bind_param("ss", $user, $testo);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getUserFeedback($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_USER_FEEDBACK;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_USER_FEEDBACK);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			if($risultato == null){
				return null;
			}else{
				return($risultato[0][0]);
			}
			mysqli_close($conn);
		}
		
		function getFeedbackN(){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_FEEDBACK_N;
			
			$ris = mysqli_query($conn, $GET_FEEDBACK_N);
			$risultato = mysqli_fetch_all($ris);

			$size = sizeof($risultato);
			
			mysqli_close($conn);
			return $size;
		}
		
		function getFeedback(){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_FEEDBACK;
			$risultato = array();
			
			$n = getFeedbackN()-1;
			$stmt = $conn->prepare($GET_FEEDBACK);
			$stmt->bind_param("i", $n);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			return($risultato);
			mysqli_close($conn);
		}
		
		function updateFeedback($testo, $user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $UPDATE_FEEDBACK;
			
			$stmt = $conn->prepare($UPDATE_FEEDBACK);
			$stmt->bind_param("ss", $testo, $user);
			$stmt->execute();
			mysqli_close($conn);
		}
		
		function getWinner($gruppo, $settimana){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_WINNER;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_WINNER);
			$stmt->bind_param("ii", $gruppo, $settimana);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			return $risultato;
			mysqli_close($conn);
		}
		
		function getNotifications($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_NOTIFICATIONS;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_NOTIFICATIONS);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			return sizeof($risultato);
			mysqli_close($conn);
		}
		
		function setMessaggioLetto($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $SET_MESSAGGIO_LETTO;
			
			$stmt = $conn->prepare($SET_MESSAGGIO_LETTO);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			mysqli_close($conn);
		}
        
        function getPassword($user){
			$conn = mysqli_connect('localhost', 'root', 'g2nz2l1c1','my_shareyourideas');
			global $GET_PASSWORD;
			$risultato = array();
			
			$stmt = $conn->prepare($GET_PASSWORD);
			$stmt->bind_param("s", $user);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_array(MYSQLI_NUM)) {
				array_push($risultato, $row);
			}
			return $risultato[0][0];
			mysqli_close($conn);
		}
		
		?>
		
	</body>
</html>
