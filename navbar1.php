<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
 <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

<div class="header-container">
		<header class="header">
			<a href="index.php">
				<div class="navbar-logo">
					<img src="img/imgpsh_fullsize_anim (1).png">
				</div>
			</a>
			<div>
				<ul id="myLinks">
					<li>
						<a href="index" class="divider">
							Home
						</a>
					</li>
					<li>
						<a href="register" class="divider">
							Register
						</a>
					</li>
					<li>
						<a href="" class="divider">
							Attendance List
						</a>
					</li>
					<li>
						<a href="" class="divider">
							Manual
						</a>
					</li>
					<li>
						<a href="logout" style="color: #9a2929;">
							Logout
						</a>
					</li>
				</ul>
			</div>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars" style="font-size: 50px; padding: 20px; color: black;"></i>
			</a>
		</header>
	</div>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
function myFunction() {
	var x = document.getElementById('myLinks');
		if (x.style.display === 'block') {
			x.style.display = 'none';
		} else {
		x.style.display = 'block';
	}
}
</script>