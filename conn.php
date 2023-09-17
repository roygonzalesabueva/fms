<?php
	$conn=mysqli_connect("localhost", "root", "@DavaosurDB2023", "fms_db");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>

<?php
$uname = "root";
$dbpass = "@DavaosurDB2023";
$host = "localhost";
$db = "fms_db";


$conn = mysqli_connect("$host", "$uname","$dbpass","$db") or die ("DB Connection Error");


?>