<!DOCTYPE HTML>
<!--
	Stellar by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<?php
	$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");
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
							<p>Sponsors</p>
						</div>

					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<h2>Platinum Level Sponsors &#x1F4BF</h2>
								<table>
									<tr><th>Company Name</th></tr>
									<?php
										$sql = "select * from company where level = 3";
										$stmt = $pdo->prepare($sql);   #create the query
										$stmt->execute([]);   #bind the parameters

										#stmt contains the result of the program execution
										#use fetch to get results row by row.
										while ($row = $stmt->fetch()) {
											echo "<tr><td>".$row["name"]."</td><td><a href='del_sponsor.php?name=".$row["name"]."' class='button special small'>Delete</a></td></tr>";
										}
									?>
								</table>

								<h2>Gold Level Sponsors &#x1F947</h2>
								<table>
									<tr><th>Company Name</th></tr>
									<?php
										$sql = "select * from company where level = 2";
										$stmt = $pdo->prepare($sql);   #create the query
										$stmt->execute([]);   #bind the parameters

										#stmt contains the result of the program execution
										#use fetch to get results row by row.
										while ($row = $stmt->fetch()) {
											echo "<tr><td>".$row["name"]."</td><td><a href='del_sponsor.php?name=".$row["name"]."' class='button special small'>Delete</a></td></tr>";
										}
									?>
								</table>
								<h2>Silver Level Sponsors &#x1F948</h2>
								<table>
									<tr><th>Company Name</th></tr>
									<?php
										$sql = "select * from company where level = 1";
										$stmt = $pdo->prepare($sql);   #create the query
										$stmt->execute([]);   #bind the parameters

										#stmt contains the result of the program execution
										#use fetch to get results row by row.
										while ($row = $stmt->fetch()) {
											echo "<tr><td>".$row["name"]."</td><td><a href='del_sponsor.php?name=".$row["name"]."' class='button special small'>Delete</a></td></tr>";
										}
									?>
								</table>
								<h2>Bronze Level Sponsors &#x1F949</h2>
								<table>
									<tr><th>Company Name</th></tr>
									<?php
										$sql = "select * from company where level = 0";
										$stmt = $pdo->prepare($sql);   #create the query
										$stmt->execute([]);   #bind the parameters

										#stmt contains the result of the program execution
										#use fetch to get results row by row.
										while ($row = $stmt->fetch()) {
											echo "<tr><td>".$row["name"]."</td><td><a href='del_sponsor.php?name=".$row["name"]."' class='button special small'>Delete</a></td></tr>";
										}
									?>
								</table>
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
							<!--<ul class="icons">
								<li><a href="#" class="icon fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon fa-github alt"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon fa-dribbble alt"><span class="label">Dribbble</span></a></li>
							</ul>-->
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