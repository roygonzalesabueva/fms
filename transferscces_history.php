<?php
	require_once'db_connect.php';
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `filesscces` WHERE `id`='$id'") or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		
		$id=$row['id'];
		$name=$row['name'];
		$date_updated=$row['date_updated'];
		
		
	
	
		//mysqli_query($conn, "INSERT INTO `filesscnhs_history` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		mysqli_query($conn, "INSERT INTO `filesscces_history` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
			
	
		//mysqli_query($conn, "INSERT INTO `filesrecords` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		mysqli_query($conn, "DELETE FROM `filesscces` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='filesscces.php'</script>";
	}



?>