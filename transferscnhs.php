



<?php

require_once 'conn.php';

if (isset($_POST['save'])) {
$trackid = verify($_POST['trackid']);
$emp_no = verify($_POST['emp_no']);
$image = verify($_POST['image']);

$firstname = verify($_POST['firstname']);
$lastname = verify($_POST['lastname']);
$date_created = verify($_POST['date_created']);



// Ensure emp_no and schoolid are available in the session.
if (!empty($_SESSION['emp_no']) && !empty($_SESSION['schoolid']) && !empty($_SESSION['image'])) {
$emp_no = $_SESSION['emp_no'];
$school_id = $_SESSION['schoolid'];
$image = $_SESSION['image'];

mysqli_query($conn, "INSERT INTO `filesscnhs` VALUES ('','$emp_no','$image', '$firstname', '$lastname' , '$date_created')") or die(mysqli_error());

header("location: chat_davsur.php?school_id=" . $school_id . "&emp_no=" . $emp_no);
} else {
echo "Emp_no and/or schoolid is not set in the session.";
}
}




require_once('db_tis.php');

// Check if school_id is provided in the GET request
if (isset($_GET['school_id'], $_GET['emp_no'])) {
// Your code to handle both school_id and emp_no
$selectedSchoolId = $_GET['school_id'];
$selectedEmpNo = $_GET['emp_no'];
// $selectedimage = $_GET['image'];
$_SESSION['selSchoolId']=$selectedSchoolId;
$_SESSION['selEmNo']=$selectedEmpNo;
// $_SESSION['selimage']=$selectedimage;


$sql = "SELECT pi.firstname, pi.lastname, pi.middlename, pi.emp_no, pp.image
FROM personal_info AS pi
INNER JOIN profile_pic AS pp ON pi.emp_no = pp.emp_no
INNER JOIN employment_record AS e ON pp.emp_no = e.emp_no
WHERE e.school_id = ? AND pp.emp_no =?"; 

if ($stmt = $conn->prepare($sql)) {
$stmt->bind_param("ii", $selectedSchoolId, $selectedEmpNo);
if ($stmt->execute()) {
$result = $stmt->get_result();

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $image = $row['image'];
    $imageUrl = "../heroes/admin/$image";
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $mname = $row['middlename'];
    // Output or process $imageUrl as needed
}
} else {
echo "No teachers found for the selected school.";
}

$stmt->close();
} else {
echo "Error in executing the SQL statement.";
}
} else {
echo "Error in preparing the SQL statement.";
}
}
// Close the database connection here if needed
//  else {
// echo "No school_id provided in the GET request.";
// }





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
	
		header("Location: home.php?school_id=<?php echo $schoolid ?>&emp_no=<?php echo $emp_no ?>");
		
	}



?>


