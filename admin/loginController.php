
<?php
	session_start();

	function setSesh($i,$fn,$p){

	$_SESSION["adminId"] =$i;
	$_SESSION["name"] =$fn;
	$_SESSION["password"] =$p;
	

	}

	if(isset($_POST['btnLoginSubmit'])){
	attemptLogin();
	}

function attemptLogin(){
	$id=$_POST['loginId'];
	$password=$_POST['loginPassword'];
	$db = mysqli_connect('localhost', 'root', '', 'usc_obus');
	$query = "SELECT * FROM admins WHERE adminId='$id' AND password='$password' LIMIT 1";
	$result = mysqli_query($db, $query);

	if (mysqli_num_rows($result) > 0) {
    
		while($row = mysqli_fetch_assoc($result)) {

		setSesh($row['adminId'],$row['name'],$row
			['password']);

		
		}
	} 
}
?>