<!DOCTYPE HTML>
<!--
	Stellar by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
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
							<p>Daily Schedule</p>
						</div>

					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<span class="image main"><img src="images/pic04.jpg" alt="" /></span>
								<h2>Schedule</h2>
								<p>Hello, here you will find today's schedule.</p>
								<form method="post">
									<legend>Select a day</legend>
									<select name="day" required>
										<option value = "1">Day 1</option>
										<option value = "2">Day 2</option>
									</select>
									<input type="submit" value="Change Day">
								</form>
								<br>

								<h2>Schedule</h2>
								<table>
									<tr><th>Time</th><th>Room</th><th>Session Name</th></tr>
									<?php
									if (isset($_POST['day'])){
										$day = $_POST['day'];

										$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

										$sql = "select * from session where day = ?";
										$stmt = $pdo->prepare($sql);   #create the query
										$stmt->execute([$day]);   #bind the parameters
										while ($row = $stmt->fetch()) {
											echo "<tr><td>".$row["time_start"]." -> ".$row["time_end"]."</td><td>".$row["room_num"]."</td><td>".$row["name"]."</td><td><a href='update_session.php?start=".$row["time_start"]."&room=".$row['room_num']."&day=".$row['day']."&end=".$row['time_end']."&name=".$row['name']."&id=".$row['sess_id']."' class='button special small'>Edit</a></td><td>";
										}
									}




									?>

								</table>
								
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