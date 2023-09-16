


<?php 

$conn=mysqli_connect('localhost','root','','fms_db');

//or die("Could not connect to mysql".mysqli_error($con));


//download

$sql = "SELECT * FROM files";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);


//end download



if(isset($_POST['save']))
{
	$filename = $_FILES['myfile']['name'];
	$destination ='assets\uploads/'. $filename;

	$extension = pathinfo($filename,PATHINFO_EXTENSION);

	$file = $_FILES['myfile']['tmp_name'];

	

	/*if(!in_array($extension,['zip','pdf','png']))
	{

		echo "Your file extension must be .zip .pdf .png .jpeg";
	}

	
	else{*/

		if(move_uploaded_file($file,$destination))
		{
			$sql="INSERT INTO files (name)
			VALUES('$filename')";

			if(mysqli_query($conn,$sql))
			{
				
				
		

				
			}
			else{
				echo "failed to upload file";
			}
		}
/*	}*/

}


//download code last part entry get data

if(isset($_GET['file_id']))
{

	$id = $_GET['file_id'];
	$sql="SELECT * FROM files WHERE id=$id";

	$result = mysqli_query($conn,$sql);

	$file = mysqli_fetch_assoc($result);

	$filepath ='assets\uploads/' . $file['name'];


	if(file_exists($filepath))
	{
		header('Content-Type: application/octet-stream');

		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename=' . basename($filepath));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma:public');
		header('Content-Length:' . filesize('assets\uploads/'.$file['name']));
		readfile('assets\uploads/' . $file['name']);

		$newCount = $file['downloads'] + 1;

		$updatQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";

		mysqli_query($conn,$updatQuery);
		exit;


	}


}



//end





?>
