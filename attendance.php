	<?php
	session_start();
	include 'conn.php';
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

	if (isset($_SESSION['username'])) {
		 date_default_timezone_set("Asia/Manila");
		 $date_now = date('m/d/Y');
		 $time_now = date('h:i a');
		 $sql_id = mysqli_query($conn, "SELECT * FROM users WHERE status=0");
		 $total_sql = mysqli_query($conn, "SELECT * FROM users");
		 $count_id = mysqli_num_rows($sql_id);
		 $count_total = mysqli_num_rows($total_sql);

	}else{
		header("location:login");
	}

	if (isset($_GET['id'])) {
		$id_present = $_GET['id'];
		$present_sql = mysqli_query($conn, "UPDATE users SET status=1 WHERE user_id='$id_present'");
		header("location:attendance");
	}


	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Attendnace</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="shortcut icon" href="img/imgpsh_fullsize_anim.png">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"> -->

		<style type="text/css">
			body {
				margin: 0 auto;
				/*margin-top: 40px;*/

			}
			.form-container {
				width: 300px;
				margin: auto;
			}

			p {
				color: white;
				margin: 0;
			}

			.shet ul {
				list-style: none;
			}

			.shet ul li::before {
				content: "\2022";
				color: #ff0000;
			}

	/*		a {
				color: #d49f9f;
				font-family: 'Raleway', sans-serif;
				font-size: 18px;
			}*/

			.shet {
				/*max-width: 300px;
				padding-top: 10px;
				padding-bottom: 10px;
				background-color: #542727;
				margin: auto;
				border-radius: 20px;*/
				margin: auto;
				width: 50%;
				min-width: 300px;
				margin-top: 65px;
			}

			th {
				color: white;
				text-align: center;
			}

	/*		.shet a:hover {
				text-decoration: none;
				color: #ff5757;
			}*/

			.list-container {
				/*margin-top: 40px;*/
				/*background-color: red;*/
			}

			.header-attendance {
				position: fixed;
				width: 100%;
				/*background-color: red;*/
				background-color: #3e3e3e;
				top: 0;
			}

		</style>
	</head>
	<body>
		<div class="header-attendance">
			<p style="text-align: center;">
				<b><?php echo $count_id; ?></b> users out of <b><?php  echo $count_total;?></b>
			</p>
			<center>
				<ul class="list-inline">
					<li>
						<button class="btn btn-success" disabled><i class="fa fa-sign-in"></i> In</button>
					</li>
					<li>
						<a href="attendance_out" class="btn btn-danger"><i class="fa fa-sign-out"></i> Out</a>
					</li>
				</ul>
			</center>
		</div>
		<div class="shet">
			<table width="100%;">
				<tr>
					<th>
						Usernames
					</th>
					<th>
						Actions
					</th>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
					</td>
				</tr>
				<?php	
					 while ($fetch_user = mysqli_fetch_assoc($sql_id)	) {
					 	$db_user_id = $fetch_user['user_id'];
					 	$db_user_name = $fetch_user['user_name'];
						$db_full_name = $fetch_user['full_name'];
						$db_contact = $fetch_user['contact'];
						$db_address = $fetch_user['address'];
						$db_PTNICOE = $fetch_user['PTNICOE'];
						$db_control_no = $fetch_user['control_no'];
						$date_reg = $fetch_user['date_reg'];

						?>
						<!-- <span class="list-container">
							<ul>
								<li>
									<a href="" onclick="return prompt('Temperature?')">
										<?php
											echo $db_user_name;
										?>
									</a>
								</li>
							</ul>
						</span> -->
						<tr>
							<td>
								<p>
									<?php
										echo $db_user_name;
									?>
								</p>
							</td>
							<td>
								<center>
									<a href="attendance?id=<?php echo $db_user_id;?>" class="btn btn-success" onclick="return confirm('Sign in user <?php echo $db_user_name;?>?')"><i class="fa fa-fw fa-sign-in"></i></a>
									<a href="" class="btn btn-info"><i class="fa fa-info"></i> Info</a>
								</center>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<hr>
							</td>
						</tr>
						<?php
					}
				?>

			</table>
		</div>
	</body>
	</html>