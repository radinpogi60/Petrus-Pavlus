<?php
session_start();

include 'conn.php';

if (!isset($_SESSION['username'])) {
	header("location:login");
}

if (isset($_GET['img']) && isset($_GET['id_no'])) {
	$qr_img = $_GET['img'];
	$id_no = $_GET['id_no'];
	$sql = mysqli_query($conn, "SELECT * FROM users WHERE control_no='$id_no'");
	$fetch_user = mysqli_fetch_assoc($sql);
	$db_user_name = $fetch_user['user_name'];
	$db_full_name = $fetch_user['full_name'];
	$db_contact = $fetch_user['contact'];
	$db_address = $fetch_user['address'];
	$db_PTNICOE = $fetch_user['PTNICOE'];
	$db_control_no = $fetch_user['control_no'];
	$date_reg = $fetch_user['date_reg'];

}else{
	header("location:register");
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
	  		/*padding: 0;*/
	  	}

	  	@font-face {
		  font-family: 'Raleway';
		  font-style: normal;
		  font-weight: 400;
		  src: url('../fonts/raleway-v12-latin-regular.eot'); /* IE9 Compat Modes */
		  src: local('Raleway'), local('Raleway-Regular'),
		       url('../fonts/raleway-v12-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
		       url('../fonts/raleway-v12-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
		       url('../fonts/raleway-v12-latin-regular.woff') format('woff'), /* Modern Browsers */
		       url('../fonts/raleway-v12-latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
		       url('../fonts/raleway-v12-latin-regular.svg#Raleway') format('svg'); /* Legacy iOS */
		}

	  	body {
			margin: 0 auto;
			background-color: #3e3e3e;
			font-family: 'Raleway';
		}

		.content-container {
			margin-top: 130px;
			/*min-width: 300px;*/
			/*padding-bottom: 30px;*/
			margin-left: auto;
			margin-right: auto;
			/*width: 50%;*/
		}

		h1 {
			color: white;
		}

		#download_btn:hover {
			text-decoration: none;
			color: white;
		}

		.profile-content p {
			color: #c5c5c5; 
			font-family: arial;
			margin: 0;
			font-size: 15px;
		}

		.profile-content label {
			margin: 0;
		}

	  </style>

	<title>Petrus Pavlus</title>
</head>
<body style="transition: .5s">
	<!-- <div class="navbar"> -->
		<?php
			include 'navbar.php';
		?>
	<!-- </div> -->
	<div class="content-container">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<img src="<?php echo "phpqrcode/" . $qr_img; ?>">
				</div>
				<div class="col-md-8 profile-content">
					<h1 style="margin: 0;"><?php echo ucwords($db_full_name) . " (" . $db_user_name . ") "; ?></h1>		
					<table>
						<tr>
							<td style="width: 150px;">
								<p>
									<label>
										Address:&nbsp;
									</label>
								</p>
							</td>
							<td>
								<p>
									<?php
										echo $db_address;
									?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>
									<label>
										Contact:&nbsp;
									</label>
								</p>
							</td>
							<td>
								<p>
									<?php
										echo $db_contact;
									?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>
									<label style="white-space: pre;">Person to notify:&nbsp;</label>
								</p>
							</td>
							<td>
								<p style="line-height: 0; padding: 0;">
									<?php
										echo $db_PTNICOE;
									?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>
									<label>
										Control Number:
									</label>
								</p>
							</td>
							<td>
								<p>
									<?php
										echo $db_control_no;
									?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<p>
									<label>
										Date Registered
									</label>:
								</p>
							</td>
							<td>
								<p>
									<?php
										echo $date_reg;

									?>
								</p>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<hr>
					<a href="<?php echo "phpqrcode/" . $qr_img; ?>" download="<?php echo $qr_img; ?>" id="download_btn" class="btn btn-success">Download</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>