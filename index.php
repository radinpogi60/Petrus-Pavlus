<?php
session_start();

if (!isset($_SESSION['username'])) {
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/imgpsh_fullsize_anim.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> -->
	  <!-- <link href="http://allfont.net/allfont.css?fonts=agency-fb" rel="stylesheet" type="text/css" /> -->
	  <style type="text/css">
	  	ul {
	  		padding: 0;
	  	}

	  	body {
			margin: 0 auto;
			background-color: #3e3e3e;
		}

		.login-container {	
			border: 2px solid gray;
			max-width: 15%;
			padding-bottom: 30px;
			border-radius: 20px;
			margin-top: 20px;
			min-width: 250px;
			background-color: #d3d3d385;
		}

		h1 {
			color: white;
		}
	  </style>

	<title>Petrus Pavlus</title>
</head>
<body style="transition: .5s">
	<?php
		include 'navbar.php';
	?>
</body>
</html>