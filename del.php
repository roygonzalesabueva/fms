<?php
	require_once'db_connect.php';
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `files` WHERE `id`='$id'") or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		
		$id=$row['id'];
		$name=$row['name'];
		$date_updated=$row['date_updated'];
		
		
		
		//mysqli_query($conn, "INSERT INTO `membertracking` VALUES('','$trackid','$firstname', '$lastname', '', '$address')") or die(mysqli_error());
	//	mysqli_query($conn, "INSERT INTO `membersds` (mem_id,trackid,firstname,lastname,section,address) VALUES('','$trackid','$firstname', '$lastname', '$section','$address')") or die(mysqli_error());
		//mysqli_query($conn, "INSERT INTO `memberclient` (mem_id,trackid,firstname,lastname,section,address) VALUES('','$trackid','$firstname', '$lastname', '$section','$address')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `files` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Files successfully deleted')</script>";
		echo"<script>window.location='index.php?page=files2'</script>";
	}
?>