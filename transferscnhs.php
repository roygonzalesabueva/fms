








<?php
            $schoolid = $_GET['school_id'];
            $emp_no = $_GET['emp_no'];

            //echo "School ID" .$schoolid;
            //echo "Employee Number" .$emp_no;
        ?>







<?php
	require_once'db_connect.php';
	
	if(ISSET($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		
		$query=mysqli_query($conn, "SELECT * FROM `files` WHERE `id`='$id'") or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		
		$id=$row['id'];
		$name=$row['name'];
		$date_updated=$row['date_updated'];


 
 
 
	 mysqli_query($conn, "INSERT INTO `filesscnhs` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		// mysqli_query($conn, "INSERT INTO `filesscces` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
			
		// mysqli_query($conn, "INSERT INTO `filespnhs` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		//mysqli_query($conn, "INSERT INTO `filesrecords` (id,name,date_updated)VALUES('$id','$name', '$date_updated')") or die(mysqli_error());
		
		//mysqli_query($conn, "DELETE FROM `files` WHERE `id`='$id'") or die(mysqli_error());
		
		echo"<script>alert('Memorandum successfully uploaded to schools')</script>";
		header("Location: home.php?school_id=" . $schoolid . "&emp_no=" . $emp_no);
	}



?>


