<!DOCTYPE HTML>
<!--
	Stellar by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->

<?php
$student = 50;
$professional = 100;
$bronze = 1000;
$silver = 3000;
$gold = 5000;
$platinum = 10000;

$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

$sql = "select type, count(att_id) as num from attendee group by type;";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([]);   #bind the parameters

while ($row = $stmt->fetch()) {
	if($row['type'] == 0){
		$student = $student*$row['num'];
	}else if($row['type'] == 2){
		$professional = $professional*$row['num'];
	}
}

$sql = "select level, count(name) as num from company group by level;";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([]);   #bind the parameters

while ($row = $stmt->fetch()) {
	if($row['level'] == 0){
		$bronze = $bronze*$row['num'];
	}else if($row['level'] == 1){
		$silver = $silver*$row['num'];
	}else if($row['level'] == 2){
		$gold = $gold*$row['num'];
	}else if($row['level'] == 3){
		$platinum = $platinum*$row['num'];
	}
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
							<p>Financial Info</p>
						</div>

					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<h2>Conference Spreadsheet</h2>
								
								
								<h2>Attendee Fees</h2>
								<div style="margin-left: 25px;">
									<p>Student: $<?php echo $student;?></p>
									<p>Professional: $<?php echo $professional;?></p>
								</div>
								<div style="margin-left: 50px;">
								<p>Sub-Total: $<?php echo ($student + $professional);?></p>
								</div>
								<br>
								<h2>Sponsors</h2>
								<div style="margin-left: 25px;">
									<p>Bronze: $<?php echo $bronze;?></p>
									<p>Silver: $<?php echo $silver;?></p>
									<p>Gold: $<?php echo $gold;?></p>
									<p>Platinum: $<?php echo $platinum;?></p>
								</div>
								<div style="margin-left: 50px;">
									<p>Sub-Total: $<?php echo ($bronze + $silver + $gold + $platinum);?></p>
								</div>
									
								<h2>Totals</h2>
								<div style="margin-left: 25px;">
									<p>Overall: $<?php echo ($student + $professional + $bronze + $silver + $gold + $platinum);?></p>
								</div>	
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