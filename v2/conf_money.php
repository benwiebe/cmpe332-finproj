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

$sql = "select count(att_id) as num from attendee group by type;";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([]);   #bind the parameters

while ($row = $stmt->fetch()) {
	if($row['type'] == 0){
		$student = $student*$row['num'];
	}else if($row['type'] == 2){
		$professional = $professional*$row['num'];
	}
}

$sql = "select count(name) as num from company group by level;";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([]);   #bind the parameters

while ($row = $stmt->fetch()) {
	if($row['type'] == 0){
		$bronze = $bronze*$row['num'];
	}else if($row['type'] == 1){
		$silver = $silver*$row['num'];
	}else if($row['type'] == 2){
		$gold = $gold*$row['num'];
	}else if($row['type'] == 3){
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
							<p>Attendee List</p>
						</div>

					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<span class="image main"><img src="images/pic04.jpg" alt="" /></span>
								<h2>Conference Spreadsheet</h2>
								<p>Here, you can see which sponsor donated how much money.</p>
								
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