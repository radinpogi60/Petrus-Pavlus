<?php
	include 'conn.php';
	session_start();
	if (!isset($_SESSION['username'])) {
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Petrus Pavlus</title>
	<link rel="shortcut icon" href="img/imgpsh_fullsize_anim.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> -->

	<style type="text/css">
		.form-control {
			margin-bottom: 1px;
		}

		.login-container {
			margin-top: 130px;
			min-width: 250px;
			padding-bottom: 20px;
		}
	</style>
	<script type="text/javascript">
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
				return true;
		}

		function preventNumberInput(e){
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107 ){
				e.preventDefault();
			}
		}
	</script>
</head>
<body>
	<?php
		include 'navbar.php';
		$user_name = $full_name = $contact = $address = $ptc = $control_no = "";

		function encrypt_decrypt($action, $string){
			$output = false;
			$encrypt_method = "AES-256-CBC";
			$secret_key = 'radin pogi';
			$secret_iv = "marissa ng buhay ko";
			$key = hash('sha256', $secret_key);
			$iv = substr(hash('sha256', $secret_iv), 0, 16);

			if ($action == 'encrypt') {
				$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
				$output = base64_encode($output);
			}else if ($action == 'decrypt') {
				$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			}

			return $output;
		}

		if (isset($_POST['btnRegister'])) {
			if (empty($_POST['user_name'])) {
				echo "<script>alert('Username is empty!')</script>";
			}else{
				$user_name = $_POST['user_name'];
			}

			if (empty($_POST['full_name'])) {
				echo "<script>alert('Full name is empty!')</script>";
			}else{
				$full_name = $_POST['full_name'];
			}

			if (empty($_POST['contact'])) {
				echo "<script>alert('Contact number is empty!')</script>";
			}else{
				if (strlen($_POST['contact']) != 11) {
				echo "<script>alert('Contact number should be 11 digits!')</script>";
				}else{
					$contact = $_POST['contact'];
				}
			}

			if (empty($_POST['address'])) {
				echo "<script>alert('Address is empty!')</script>";
			}else{
				$address = $_POST['address'];
			}

			if (empty($_POST['per-to-emerg'])) {
				echo "<script>alert('Person to contact is empty!')</script>";
			}else{
				$ptc = $_POST['per-to-emerg'];
			}

			if (empty($_POST['control_no'])) {
				echo "<script>alert('Control number is empty!')</script>";
			}else{
				$attempt_num = $_POST['control_no'];
				 $sql_control_num = mysqli_query($conn, "SELECT * FROM users WHERE control_no='$attempt_num'");
				 if (mysqli_num_rows($sql_control_num) == 0) {
				 	$control_no = $_POST['control_no'];
				 }else{
				echo "<script>alert('Control number is already registered!')</script>";
				}
			}

			if ($user_name AND $full_name AND $contact AND $address AND $ptc AND $control_no) {
				date_default_timezone_set("Asia/Manila");
				$date_now = date("m/d/Y");
				$sql = mysqli_query($conn, "INSERT INTO users(user_name, full_name, contact, address, PTNICOE, control_no, date_reg) VALUES('$user_name', '$full_name', '$contact', '$address', '$ptc', '$control_no', '$date_now')");

				// $encrypt_id = encrypt_decrypt('encrypt', $control_no);
				$server_name = $_SERVER['SERVER_NAME'];
				header("location:phpqrcode/index.php?data=$server_name/attendance?data=$encrypt_id&user_name=$user_name&ctrl_num=$control_no");
				echo "<script>window.location.href='phpqrcode/index.php?data=$server_name/attendance?data=$control_no&user_name=$user_name&ctrl_num=$control_no'</script>";
			}
		}
	?>
	<center>
		<div class="login-container">
			<center>
				<h1 style="font-family: 'Roboto', sans-serif;">Register</h1>
				<form method="post" autocomplete="off">
					<table>
						<tr>
							<td>
								<input type="txt" name="user_name" placeholder="Username" class="form-control" autofocus value="<?php echo $user_name;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="txt" name="full_name" placeholder="Full name" class="form-control" onkeydown="return preventNumberInput(event)" value="<?php echo $full_name;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="txt" name="contact" placeholder="Contact Number" class="form-control" maxlength="11" onkeypress="return isNumberKey(event)" value="<?php echo $contact;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="txt" name="address" placeholder="Address" class="form-control" value="<?php echo $address;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="txt" name="per-to-emerg" placeholder="Incase of emergency, call.." class="form-control" maxlength="11" onkeypress="return isNumberKey(event)" value="<?php echo $ptc;?>">
							</td>
						</tr>
						<tr>
							<td>
								<input type="txt" name="control_no" placeholder="Control Number" class="form-control" onkeypress="return isNumberKey(event)" maxlength="4" value="<?php echo $control_no;?>">
							</td>
						</tr>
						<tr>
							<td>
								<hr>
							</td>
						</tr>
						<tr>
							<td>
								<center>
									<input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
								</center>
							</td>
						</tr>
					</table>
				</form>
			</center>
		</div>
	</center>
</body>
</html>