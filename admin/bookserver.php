<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'usc_obus');

	// initialize variables
	$booktitle = "";
	$quantity = "";
	$bookprice = "";
	$ID = 0;
	$update = false;


	if (isset($_POST['save'])) {
		$booktitle = $_POST['booktitle'];
		$quantity = $_POST['quantity'];
		$bookprice = $_POST['bookprice'];

		mysqli_query($db, "INSERT INTO books (booktitle, quantity, bookprice) VALUES ('$booktitle', '$quantity', '$bookprice')"); 
		$_SESSION['message'] = "Successfully Added"; 
		header('location: bookstatus.php');
	}
	
	if (isset($_POST['update'])) {
	$ID = $_POST['ID'];
	$booktitle = $_POST['booktitle'];
	$quantity = $_POST['quantity'];
	$bookprice = $_POST['bookprice'];

	mysqli_query($db, "UPDATE books SET booktitle='$booktitle', quantity='$quantity', bookprice='$bookprice' WHERE ID=$ID");
	$_SESSION['message'] = "Successfully Updated!"; 
	header('location: bookstatus.php');
	}

	if (isset($_GET['del'])) {
		$ID = $_GET['del'];
		mysqli_query($db, "DELETE FROM books WHERE ID=$ID");
		$_SESSION['message'] = "Successfully Deleted!"; 
		header('location: bookstatus.php');
	}