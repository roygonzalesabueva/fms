<?php
	$conn=mysqli_connect("localhost", "root", "@DavaosurDB2023", "tis");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>



<?php 

$conn= new mysqli('localhost','root','@DavaosurDB2023','tis')or die("Could not connect to mysql".mysqli_error($conn));


?>
