<?php
	session_start();

	function setSesh($i,$idnum,$fn,$ln,$pass){

	$_SESSION["user_id"] =$i;
	$_SESSION["id_no"] =$idnum;
	$_SESSION["fname"] =$fn;
	$_SESSION["lname"] =$ln;
	$_SESSION["password"] =$pass;

	}

	if(isset($_POST['btnLoginSubmit'])){
	attemptLogin();
	}

function attemptLogin(){
	$id=$_POST['loginId'];
	$password=$_POST['loginPassword'];
	$db = mysqli_connect('localhost', 'root', '', 'usc_obus');
	$query = "SELECT * FROM users WHERE user_id='$id' AND password='$password' LIMIT 1";
	$result = mysqli_query($db, $query);

	if (mysqli_num_rows($result) > 0) {
    
		while($row = mysqli_fetch_assoc($result)) {

		setSesh($row['user_id'],$row['id_no'],$row
			['password']);

		
		}
	} 
}