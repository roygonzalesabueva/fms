<?php
	require_once'db_connect.php';


	

	
	
	if(ISSET($_POST['save'])){
		
		$id=$_POST['id'];
		$name=$_POST['name'];
		$date_updated=$_POST['date_updated'];
		
		
		

		mysqli_query($conn, "INSERT INTO `filesscnhs_history` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
			
	
		//mysqli_query($conn, "INSERT INTO `filesrecords` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		mysqli_query($conn, "DELETE FROM `filesscnhs` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Data successfully transfer')</script>";
		echo"<script>window.location='filesscnhs.php'</script>";
	}
?>


