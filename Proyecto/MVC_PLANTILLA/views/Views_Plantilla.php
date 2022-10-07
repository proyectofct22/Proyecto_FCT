<?php
	if(!isset($_SESSION['email']) && !isset($_SESSION['nombre']) && !isset($_SESSION['id'])){
		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['nombre']);
		session_destroy();
		setcookie ("PHPSESSID", "", time() - 3600);
		header("Location:../index.php");
	}
?>
<html>
	<head>
			<title>VIEW_PLANTILLA</title>
			<meta charset="UTF-8">
			<meta name="author" content="Aaron y Pablo" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<link rel="stylesheet" href="../views/css/bootstrap.min.css">
	</head>
	
	<body>


	
	</body>  
</html>
