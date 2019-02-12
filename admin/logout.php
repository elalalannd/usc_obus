<?php
	require('MysqlConnect.php'); 

	session_start();
	

	$conn = myConnect();
	$sql = "DELETE FROM cart WHERE UserID = {$_SESSION['profile']['CustomerID']} ";
	$result = mysqli_query($conn, $sql);
	

	session_unset();
	session_destroy();

	
	header('Location:../login.php')

?>