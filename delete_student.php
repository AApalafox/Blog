<?php
include 'config/db_connect_pdo.php';

try {
	$id = intval($_GET['q']);
	// sql to delete a record
	$sql = "DELETE FROM students_tbl WHERE id='$id'";

	// use exec() because no results are returned
	$conn->exec($sql);
	} catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>