<?php
  session_start();

  if(!isset($_SESSION['username'])){

    header("Location: http://202.137.126.58/");
    exit();

  }


  

  function verify($data){
    $data = trim($data);
    $data = htmlspecialchars($data );
    $data = stripslashes($data );
    return $data;
  }

  if(isset($_POST['login1'])){
    //getting the form data


    
    require_once('db_tis.php');
    // $username=strtolower($_SESSION['user_role']);
    $user_name = $_SESSION['username'];



    $sql = "SELECT emp_no FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $stmt->bind_result($emp_no);
        $stmt->fetch();
        $stmt->close();
        if ($emp_no) {
            echo "";
            $_SESSION['emp_no']=$emp_no;

        } else {
            echo "No result found for the provided email.";
        }
    } else {
        
        echo "Error preparing the statement.";
    }
     

    $sql2 = "SELECT school_id FROM employment_record WHERE emp_no = ?";
    $stmt2 = $conn->prepare($sql2);
    
    if ($stmt2) {
        $stmt2->bind_param("s", $emp_no);
        $stmt2->execute();
        $stmt2->bind_result($school_id);
        $stmt2->fetch();
        $stmt2->close();
        if ($school_id) {
            //  echo $school_id." ".$emp_no;
             $_SESSION['schoolid']=$school_id;
            // echo"<script>alert('.$school_id.')</script>";
        } else {
            echo "No employment record found for the provided emp_no.";
        }
    } else {
        echo "Error preparing the statement.";
    }
}
    ?>
<?php




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
		
		
	
		header("location: chat_index.php?school_id=" . $school_id . "&emp_no=" . $emp_no);
		
	}
?>



	
	




