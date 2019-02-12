<?php
		
		session_start();
		include('connector.php');
		//initialize variables
		$booktitle = "";
		$quantity = "";
		$bookprice = "";
		$ID = 0;
		$edit_state = false; 
	
	//connect to database
	

	//if add button is clicked
	if (isset($_POST['add'])){
		$booktitle = $_POST['booktitle'];
		$quantity = $_POST['quantity'];
		$bookprice = $_POST['bookprice'];


		$query = "INSERT INTO books (booktitle,quantity,bookprice) VALUES ('$booktitle', '$quantity', '$bookprice')";
		mysqli_query($db, $query);
		$_SESSION['msg'] = "Succesfully Added";
		header('location: bookstatus.php'); //redirect to index page after inserting
	}
		//update record
	if (isset($_POST['update'])){
			$booktitle = mysqli_real_escape_string($_POST['booktitle']);
			$quantity = mysqli_real_escape_string($_POST['quantity']);
			$bookprice = mysqli_real_escape_string($_POST['bookprice']);
			$ID = mysqli_real_escape_string($_POST['ID']);
		
			mysqli_query($db, "UPDATE books SET booktitle='$booktitle', quantity='$quantity', 
				bookprice='$bookprice' WHERE ID=$ID");
			$_SESSION['msg'] = "Succesfully Added";
			header('location: bookstatus.php');
	}
	
		//delete records
	if (isset($_GET['del'])) {
			$ID = $_GET['del'];
			mysqli_query($db, "DELETE FROM books WHERE ID=$ID");
			$_SESSION['msg'] = "Succesfully Deleted";
			header('location: bookstatus.php');
	}
		// retrieve records
		$results = mysqli_query($db, "SELECT * FROM books");

?>
