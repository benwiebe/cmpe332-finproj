<meta http-equiv="refresh" content="0;url=sponsors.php"> <!--redirect back to form page-->
<?php

	$name = $_GET['name'];
	$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

	$sql = "DELETE FROM company WHERE name=?;";
	$stmt = $pdo->prepare($sql);   // create the query
	$stmt->execute([$name]);   // bind the parameters

?>
