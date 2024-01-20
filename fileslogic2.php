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
        // Check if the file is an image (JPEG)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $filepath);
        finfo_close($finfo);

        if ($mime === 'image/jpeg') {
            // Set headers for image download
            header('Content-Type: ' . $mime);
            header('Content-Description: File Transfer');
            header('Content-Disposition: inline; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);

            // Update download count
            $newCount = $file['downloads'] + 1;
            $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
            mysqli_query($conn, $updateQuery);

            exit;
        } else {
            echo "File is not an image (JPEG).";
        }
    }
}
// End
// End
?>