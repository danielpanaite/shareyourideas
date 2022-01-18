<html>
	<head>
		<title>Upload</title>
	</head>
	<body>
	
		<?php
			session_start();
			$path = "../ProfileImages/";

			$img = $_FILES['immagine']['tmp_name'];
			//$_FILES['immagine']['name']
			$dst = $path . $_SESSION['nickname'];

			if (($img_info = getimagesize($img)) === FALSE)
			  die("Image not found or not an image");

			$width = $img_info[0];
			$height = $img_info[1];

			switch ($img_info[2]) {
				case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
			  	case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
			  	case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
			  	default : die("Unknown filetype");
              	header("Location: ../profilo.php");
			  	die();
			}

			$tmp = imagecreatetruecolor($width, $height);
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
			imagepng($tmp, $dst.".png");
            header("Location: ../profilo.php");
			die();
			

		?>
		
	</body>
</html>