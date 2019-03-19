<meta http-equiv="refresh" content="0;url=daily_sched.php"> <!--redirect back to form page-->
<?php
	$pdo = new PDO('mysql:host=localhost;dbname=project', "root", "");

	$sql = "UPDATE session SET time_start=?, time_end=?, name=?, room_num=?, day=? WHERE sess_id=?;";
	$stmt = $pdo->prepare($sql);   // create the query
	$stmt->execute([$_POST['start_time'], $_POST['end_time'], $_POST['name'], $_POST['room'], $_POST['day'], $_POST['id']]);   // bind the parameters

?>
