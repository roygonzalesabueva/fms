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
    $date_created = verify($_POST['date_created']);
    $firstname = verify($_POST['firstname']);
    $lastname = verify($_POST['lastname']);
    $section = verify($_POST['section']);
    $address = verify($_POST['address']);

    // Ensure emp_no and schoolid are available in the session.
    if (!empty($_SESSION['emp_no']) && !empty($_SESSION['schoolid'])) {
        $emp_no = $_SESSION['emp_no'];
        $school_id = $_SESSION['schoolid'];
        
        mysqli_query($conn, "INSERT INTO `chat` VALUES ('', '$trackid', '$date_created', '$firstname', '$lastname', '$section','$address')") or die(mysqli_error());

        header("location: chat_index.php?school_id=" . $school_id . "&emp_no=" . $emp_no);
    } else {
        echo "Emp_no and/or schoolid is not set in the session.";
    }
}
?>
