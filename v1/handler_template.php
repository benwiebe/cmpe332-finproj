<?php

	$param = $_POST['param'];

	$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

	$sql = "INSERT INTO `attendee` (name_first, name_last, birthdate, phonenumber, email, type) VALUES (?, ?, ?, ?, ?, ?);";
	$stmt = $pdo->prepare($sql);   // create the query
	$stmt->execute([$param, $param, $param, $param, $param, $param]);   // bind the parameters

	header("Location originalpage.php"); //redirect back to form page

?>
