<?php
	require_once'db_connect.php';
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `files` WHERE `id`='$id'") or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		
		$id=$row['id'];
		$name=$row['name'];
		$date_updated=$row['date_updated'];

		// mysqli_query($conn, "INSERT INTO `304275` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128826` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128825` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128824` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128823` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128822` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128821` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128820` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128820` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128820` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128819` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128818` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128817` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128816` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());

		// mysqli_query($conn, "INSERT INTO `128815` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
	
		// mysqli_query($conn, "INSERT INTO `128814` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
	
		// mysqli_query($conn, "INSERT INTO `128813` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
	
		// mysqli_query($conn, "INSERT INTO `128812` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
	
		// mysqli_query($conn, "INSERT INTO `128811` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
	
		// mysqli_query($conn, "INSERT INTO `128810` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
	
		// mysqli_query($conn, "INSERT INTO `filesfnhs` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		// mysqli_query($conn, "INSERT INTO `filesmnhs` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		// mysqli_query($conn, "INSERT INTO `filessnhs` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
	
		mysqli_query($conn, "INSERT INTO `filesscnhs` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		// mysqli_query($conn, "INSERT INTO `filesscces` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
			
		// mysqli_query($conn, "INSERT INTO `filespnhs` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		//mysqli_query($conn, "INSERT INTO `filesrecords` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		//mysqli_query($conn, "DELETE FROM `files` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Memorandum successfully uploaded to schools')</script>";
		echo"<script>window.location= 'home.php?school_id=" . $schoolid . "&emp_no=" . $emp_no' </script>";
	}



?>