
<?php
    require("../../db/database.php");

	$stmt = $mysqli->prepare("SELECT * FROM userdata WHERE id = ?");
	$stmt->bind_param('s', $_SESSION['id']);
	$stmt->execute();
	$res = $stmt->get_result();
	$user = $res->fetch_assoc();
?>