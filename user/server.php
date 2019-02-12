<?php
	$idnumber = "";
	$email = "";
	$errors = array();



	//connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'usc_obus');

	//  if the register button is clicked
	if (isset($_POST['registration'])){
		$idnumber = mysql_real_escape_string($_POST['idnumber']);
		$email = mysql_real_escape_string($_POST['email']);
		$password_1 = mysql_real_escape_string($_POST['password']);
		$password_2 = mysql_real_escape_string($_POST['confirmpass']);
	}

	// ensure that form fields are filled properly
	/*if(empty($idnumber)){
		array_push($errors, "Id Number is required");
	}
	if(empty($email)){
		array_push($errors, "Email is required");
	}
	if(empty($password_1)){
		array_push($errors, "Password is required");
	}
	if ($password_1 != $password_2){
		array_push($errors, "The two passwords do not match");
	}*/

	// if there are no errors, save user to database
	if (count($errors) == 0){
		//$password = md5($confirmpass); // encrypt password before storing in database (Security)
		$sql = "INSERT INTO registration (idnumber, email, password) 
					VALUES ('$idnumber', 'email' , 'password')"; 
		mysqli_query($db,$sql);
	}
?>