<!DOCTYPE HTML>
<!--
	Stellar by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->

<?php
	$error = false;

	if(isset($_POST['comp_name']))
		$comp_name = $_POST['comp_name'];

	if(isset($_POST['type']))
		$type = $_POST['type'];

	if(isset($comp_name) && isset($type)) {
		if($type==0){
			$max_emails = 0;
		}
		if($type==1) {
			$max_emails = 3;
		}
		if($type==2) {
			$max_emails = 4;
		}
		if($type==3) {
			$max_emails = 5;
		}
		$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

		$sql = "INSERT INTO company (name, level, emails_sent, max_emails) VALUES (?, ?, ?, ?);";
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute([$comp_name, $type, 0, $max_emails]);   #bind the parameters

		$error = ($stmt != true);
	}else{
		$error = true;
	}
	
	
?>

<html>
	<head>
		<title>CMPE 332 Project</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1>CMPE 332 Final Project</h1>
						<div>
							<a class="icon alt fa-home" href="index.html"></a>
							<p>Add Sponsor</p>
						</div>

					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
							<?php
									if($error){
										echo "<p>Error adding new sponsor! Please check your input.</p>";
									}
								?>
								<form method ="post">
									Company Name: <input type="text" name="comp_name" required>
									Sponsorship Level:
									<select name="type" requried>
										<option value="0">Bronze</option>
										<option value="1">Silver</option>
										<option value="2">Gold</option>
										<option value="3">Platinum</option>
									</select>
									<input type="submit" value="Add Sponsor">
								</form>
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
					<section>
							<h2>Want to go to another page?</h2>
							<p>Howdy! If you like 404 errors and want to see one, feel free to click the button below.</p>
							<ul class="actions">
								<li><a href="generic.html" class="button">CLICK ME!</a></li>
							</ul>
						</section>
						<section>
							<h2>Contact Information</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>45 Union Street &bull; Kingston, ON K7L 3N6 &bull; Canada</dd>
								<dt>Email</dt>
								<dd><a href="#">bestgroup@cmpe332.biz</a></dd>
							</dl>
							<ul class="icons">
								<!--<li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>-->
								<li><a href="https://github.com/benwiebe/cmpe332-finproj" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
								<!--<li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>-->
							</ul>
						</section>
						<p class="copyright">&copy; CMPE332 Group 24</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>