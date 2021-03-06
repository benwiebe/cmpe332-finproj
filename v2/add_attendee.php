<!DOCTYPE HTML>
<!--
	Stellar by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<?php
	$error = false;
	$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

	if(isset($_POST['first']))
		$fname = $_POST['first'];

	if(isset($_POST['last']))
		$lname = $_POST['last'];

	if(isset($_POST['birth']))
		$bdate = $_POST['birth'];

	if(isset($_POST['phone']))
		$phone = $_POST['phone'];

	if(isset($_POST['email']))
		$email = $_POST['email'];

	if(isset($_POST['type']))
		$type = $_POST['type'];

	if(isset($_POST['company']))
		$company = $_POST['company'];

	if(isset($_POST['school']))
		$school = $_POST['school'];

	if(isset($fname) && isset($lname) && isset($bdate) && isset($phone) && isset($email) && isset($type)) {

		if(($type == 0 && !isset($school)) || ($type == 1 && !isset($company)))
			$error = true;
		else{
			$sql = "INSERT INTO attendee (name_first, name_last, birthdate, phonenumber, email, type) VALUES (?, ?, ?, ?, ?, ?);";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$fname, $lname, $bdate, $phone, $email, $type]);   #bind the parameters

			$error = ($stmt != true);

			// Get last ID (ie. the one we just added)
			$sql = "select max(att_id) as id from attendee";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$type]);   #bind the parameters
			$id = ($stmt->fetch())['id'];


			if($type == 0 && !$error) { //student
				// pick a room to assign
				$sql = "SELECT room_num FROM `hotel_room` 
						LEFT JOIN (
    						SELECT room_id, count(att_id) as cur from student group by room_id
    					) as X
						ON X.room_id = hotel_room.room_num and X.cur < 2*hotel_room.num_beds;";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute([$type]);   #bind the parameters
				$room = ($stmt->fetch())['room_num']; //just pick the first available room

				$sql = "INSERT INTO student (att_id, room_id, school) VALUES (?, ?, ?);";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute([$id, $room, $school]);   #bind the parameters

				$error = ($stmt != true);

			} else if($type == 1 && !$error) { //sponsor
				$sql = "INSERT INTO sponsor (att_id, company) VALUES (?, ?);";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute([$id, $company]);   #bind the parameters
				$error = ($stmt != true);
			}
		}

		$error = ($stmt != true);
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
							<p>Add Attendee</p>
						</div>

					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<?php
									if($error){
										echo "<p>Error adding new user! Please check your input.</p>";
									}
								?>
								<form method="post">
									First Name: <input type="text" name="first" pattern="[A-Za-z]*" required>
									Last Name: <input type="text" name="last" pattern="[A-Za-z]*" required>
									Birthdate: <input type="date" name="birth" required>
									Phone Number: <input type="tel" name="phone" required>
									Email: <input type="email" name="email" required>
									Attendee Type:
									<select id="typeselect" name="type" requried>
										<option value="0">Student</option>
										<option value="1">Sponsor</option>
										<option value="2">Professional</option>
									</select>

									<div id="student_form">
										School Name: <input type="text" name="school">
									</div>
									<div id="sponsor_form">
										Company Name:
										<select name="company">
											<?php
												$sql = "select name from company";
												$stmt = $pdo->prepare($sql);   #create the query
												$stmt->execute([]);   #bind the parameters

												#stmt contains the result of the program execution
												#use fetch to get results row by row.
												while ($row = $stmt->fetch()) {
													echo "<option value='".$row['name']."'>".$row['name']."</option>";
												}

											?>
										</select>
									</div>


									<input type="submit" value="Add Attendee">
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

			<script>
				function update_section() {
					if($('#typeselect').val() == 0) {
						$('#student_form').show();
						$('#sponsor_form').hide();
					}else if($('#typeselect').val() == 1) {
						$('#student_form').hide();
						$('#sponsor_form').show();
					}else{
						$('#student_form').hide();
						$('#sponsor_form').hide();
					}
				}

				$('#typeselect').on('change', function() {
				  update_section()
				});

				$(document).on('ready', function() {
					update_section();
				})
			</script>

	</body>
</html>