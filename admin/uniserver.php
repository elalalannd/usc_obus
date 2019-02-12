<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'usc_obus');

	// initialize variables
	$type = "";
	$size = "";
	$stocks = "";
	$price = "";
	$ID = 0;
	$update = false;

	//if add button is clicked
	if (isset($_POST['save'])) {
		$type = $_POST['type'];
		$size = $_POST['size'];
		$stocks = $_POST['stocks'];
		$price = $_POST['price'];

		mysqli_query($db, "INSERT INTO uniforms (type, size, stocks, price) VALUES ('$type', '$size', '$stocks','$price')"); 
		$_SESSION['message'] = "Successfully Added"; 
		header('location: unistatus.php');
	}
	if (isset($_POST['update'])) {
	$ID = $_POST['ID'];
	$type = $_POST['type'];
	$size = $_POST['size'];
	$stocks = $_POST['stocks'];
	$price = $_POST['price'];

	mysqli_query($db, "UPDATE uniforms SET type='$type', size='$size', stocks='$stocks', price='$price' WHERE ID=$ID");
	$_SESSION['message'] = "Successfully Updated!"; 
	header('location: unistatus.php');
	}
	if (isset($_GET['del'])) {
		$ID = $_GET['del'];
		mysqli_query($db, "DELETE FROM uniforms WHERE ID=$ID");
		$_SESSION['message'] = "Successfully Deleted!"; 
		header('location: unistatus.php');
	}
	