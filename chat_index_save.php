<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: http://202.137.126.58/");
    exit();
}

function verify($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_POST['login1'])) {
    // Getting the form data
    // ... your existing login code ...

    // Ensure that $_SESSION['emp_no'] and $_SESSION['schoolid'] are properly set.

    if (!empty($_SESSION['emp_no']) && !empty($_SESSION['schoolid'])) {
        // Your login code successfully set emp_no and schoolid in the session.
    } else {
        // Handle the case where emp_no or schoolid is not set.
        echo "Emp_no and/or schoolid is not set in the session.";
    }
}

require_once 'conn.php';

if (isset($_POST['save'])) {
    $trackid = verify($_POST['trackid']);
    $emp_no = verify($_POST['emp_no']);
    $image = verify($_POST['image']);
    $date_created = verify($_POST['date_created']);
    $firstname = verify($_POST['firstname']);
    $lastname = verify($_POST['lastname']);
    $section = verify($_POST['section']);
    $address = verify($_POST['address']);




    // Ensure emp_no and schoolid are available in the session.
    if (!empty($_SESSION['emp_no']) && !empty($_SESSION['schoolid'])) {
        $emp_no = $_SESSION['emp_no'];
        $school_id = $_SESSION['schoolid'];
        
        mysqli_query($conn, "INSERT INTO `chat` VALUES ('', '$trackid','$image', '$date_created', '$firstname', '$lastname', '$section','$address')") or die(mysqli_error());

        header("location: chat_index.php?school_id=" . $school_id . "&emp_no=" . $emp_no);
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
 $_SESSION['selSchoolId']=$selectedSchoolId;
 $_SESSION['selEmNo']=$selectedEmpNo;


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

    // Close the database connection here if needed
} else {
    echo "No school_id provided in the GET request.";
}





?>
