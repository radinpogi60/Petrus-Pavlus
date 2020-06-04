<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header("location:index.php");
	}

	include 'conn.php';

	$username = $password = "";

	if (isset($_POST['btnLogin'])) {
		if (empty($_POST['username'])) {
			echo "<script>alert('Username is required!')</script>";
		}else{
			$username = $_POST['username'];
		}

		if (empty($_POST['password'])) {
			echo "<script>alert('Password is required!')</script>";
		}else{
			$password = $_POST['password'];
		}

		if ($username && $password) {
			$loginSql = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");
			$count_rows = mysqli_num_rows($loginSql);
			if ($count_rows != 0) {
				$fetch_pass = mysqli_fetch_assoc($loginSql);
				$db_pass = $fetch_pass['password'];

				if ($db_pass == $password) {
					// session_start();
					$_SESSION['username'] = $username;
					header("location:index.php");
				}else{
					echo "<script>alert('Wrong password!')</script>";	
				}
			}else{
				echo "<script>alert('Username is wrong')</script>";
				echo $username;
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Petrus Pavlus</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container login-container">
		<form method="POST" autocomplete="off">
			<center>
				<h1>Login</h1>
				<table>
					<tr>
						<td>
							<input type="name" name="username" placeholder="Username" class="form-control" value="<?php echo $username ?>" <?php if (empty($username)) {
								echo "autofocus";
							} ?>>
						</td>
					</tr>
					<tr>
						<td>
							<hr>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" placeholder="Password" class="form-control" <?php if (!empty($username)) {
								echo "autofocus";
							} ?>>
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
								<input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
							</center>
						</td>
					</tr>
				</table>
			</center>
		</form>
	</div>
</body>
</html>