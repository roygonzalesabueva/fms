
<?php
session_start();

$_SESSION['school_id'] = $schoolid;
$_SESSION['emp_no'] = $emp_no;

echo "school id" . $schoolid;
echo "emp ".$emp_no;

	require_once'conn.php';
	
	if(ISSET($_POST['save'])){
		
		$trackid=$_POST['trackid'];
		$date_created=$_POST['date_created'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$section=$_POST['section'];
		$address=$_POST['address'];
		
		
		
		//mysqli_query($conn, "INSERT INTO `membertracking` VALUES ('', '$trackid', '$firstname', '$lastname', '', '$address')") or die(mysqli_error());
		mysqli_query($conn, "INSERT INTO `chat` VALUES ('', '$trackid', '$date_created', '$firstname', '$lastname', '$section','$address')") or die(mysqli_error());
		//mysqli_query($conn, "INSERT INTO `memberclient` (mem_id,trackid,firstname,lastname,section,address) VALUES('','$trackid','$firstname', '$lastname', '$section','$address')") or die(mysqli_error());
		
		
	
		header("location: chat_index.php?school_id=" . $schoolid . "&emp_no=" . $emp_no);
		
	}
?>



	
	




