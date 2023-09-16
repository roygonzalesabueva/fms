<?php
	//session_start();
	include_once('db_connect.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM members WHERE id = '".$_GET['id']."'";
		{
		//use for MySQLi OOP
		//if($conn->query($sql))
			echo 'Member deleted successfully';
			header('location: file2.php');
		}
		////////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
	//	else{
		//	$_SESSION['error'] = 'Something went wrong in deleting member';
		//}
	//}
//	else{
		//$_SESSION['error'] = 'Select member to delete first';
	//}

	
?>