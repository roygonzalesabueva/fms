<?php
session_start();

if(ISSET($_POST['school_id']) && ISSET($_POST['emp_no'])){
    $_SESSION['school_id'] = $_POST['school_id'];
    $_SESSION['emp_no'] = $_POST['emp_no'];
}

require_once 'conn.php';

if(ISSET($_POST['save'])){
    $trackid = $_POST['trackid'];
    $date_created = $_POST['date_created'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $section = $_POST['section'];
    $address = $_POST['address'];

    // Perform your database operations here

    // Redirect back to chat_index.php
    header("location: chat_index.php");
}
?>
