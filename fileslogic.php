
<?php

$conn = mysqli_connect('localhost', 'root', '@DavaosurDB2023', 'fms_db');

// Download

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// End download

if (isset($_POST['save'])) {
    $filename = $_FILES['myfile']['name'];
    $destination = 'assets/uploads/' . $filename;

    $file = $_FILES['myfile']['tmp_name'];

    if (move_uploaded_file($file, $destination)) {
        $sql = "INSERT INTO files (name) VALUES ('$filename')";

        if (mysqli_query($conn, $sql)) {
            // File uploaded successfully
        } else {
            echo "Failed to upload file";
        }
    }
}

// Download code - last part entry get data

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = 'assets/uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Type: ' . mime_content_type($filepath));
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);

        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);

        exit;
    }
}

// End
?>