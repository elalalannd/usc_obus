<?php

session_start();


function setSesh($id,$name,$password){

	$_SESSION["adminId"] =$id;
	$_SESSION["name"] =$name;
	$_SESSION["password"] =$password;
	

}
function unsetSesh(){

	session_unset();
	session_destroy(); 
}

?>