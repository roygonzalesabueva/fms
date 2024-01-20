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

// if (isset($_GET['file_id'])) {
//     $id = $_GET['file_id'];
//     $sql = "SELECT * FROM files WHERE id=$id";
//     $result = mysqli_query($conn, $sql);
//     $file = mysqli_fetch_assoc($result);

//     $filepath = 'assets/uploads/' . $file['name'];

//     if (file_exists($filepath)) {
//         // Determine file type based on extension
//         $fileExtension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

//         // Set appropriate Content-Type for known file types
//         switch ($fileExtension) {
//             case 'jpg':
//             case 'jpeg':
//                 $contentType = 'image/jpeg';
//                 break;
//             case 'png':
//                 $contentType = 'image/png';
//                 break;
//             case 'pdf':
//                 $contentType = 'application/pdf';
//                 break;
//             case 'zip':
//                 $contentType = 'application/zip';
//                 break;
//             default:
//                 $contentType = 'application/octet-stream';
//                 break;
//         }

//         // Set headers for file download
//         header('Content-Type: ' . $contentType);
//         header('Content-Description: File Transfer');
//         header('Content-Disposition: inline; filename=' . basename($filepath));
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize($filepath));
//         readfile($filepath);

//         // Update download count
//         $newCount = $file['downloads'] + 1;
//         $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
//         mysqli_query($conn, $updateQuery);

//         exit;
//     }
// }

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    $filepath = 'assets\uploads/' . $file['name'];

    if (file_exists($filepath)) {
        // Determine file type based on extension
        $fileExtension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

        // Allow downloading for common image files (JPEG, PNG, GIF, etc.)
        $allowedImageExtensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
        if (in_array($fileExtension, $allowedImageExtensions)) {
            // Set headers for file download
            header('Content-Type: ' . mime_content_type($filepath));
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
            echo "Invalid file type. Only common image files (JPEG, PNG, GIF, BMP) are allowed for download.";
        }
    }
}

// End
?>