<!DOCTYPE HTML>
<!--
	Stellar by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->

<?php
	$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

	if(isset($_GET['name']))
		$name = $_GET['name'];

	if(isset($_GET['start']))
		$start = $_GET['start'];

	if(isset($_GET['end']))
		$end = $_GET['end'];

	if(isset($_GET['room']))
		$room = $_GET['room'];

	if(isset($_GET['day']))
		$day = $_GET['day'];

	if(isset($_GET['id']))
		$id = $_GET['id'];

	if(!(isset($name) && isset($start) && isset($day) && isset($end) && isset($room)))
		die("it's bad");
	
	
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
							<p>Update Session</p>
						</div>

					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<form method ="post" action="update_session_handler.php">
									<input name="id" type="hidden" value=<?php echo "'".$id."'" ?>>
									Session Name: <input type="text" name="name" required value=<?php echo "'".$name."'" ?>>
									Start Time:   <input type="text" name="start_time" pattern="([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])" required value=<?php echo "'".$start."'" ?>>
									End Time:     <input type="text" name="end_time" pattern="([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])" required value=<?php echo "'".$end."'" ?>>
									Room Number:  <input name="room" type="text" required value=<?php echo "'".$room."'" ?>>
									Day:          <select name="day" selected=<?php echo "'".$day."'" ?>>
										<option value="1" <?php if($day == 1) echo "selected";?>>1</option>
										<option value="2" <?php if($day == 2) echo "selected";?>>2</option>
									</select>
									<input type="submit" value="Update Session">
								</form>


							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<h2>Aliquam sed mauris</h2>
							<p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.</p>
							<ul class="actions">
								<li><a href="#" class="button">Learn More</a></li>
							</ul>
						</section>
						<section>
							<h2>Etiam feugiat</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
								<dt>Phone</dt>
								<dd>(000) 000-0000 x 0000</dd>
								<dt>Email</dt>
								<dd><a href="#">information@untitled.tld</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>
							</ul>
						</section>
						<p class="copyright">&copy; Untitled.</p>
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