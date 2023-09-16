<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





<?php 
include 'fileslogic.php';

include 'db_connect.php';

if (isset($_GET['file_id'])) {
    $id = mysqli_real_escape_string($conn,$_GET['file_id']);

    // fetch file to download from database
    $conn = "SELECT * FROM  upload_files WHERE ID=$id";
    $query = mysqli_query($conn, $query);

    $file = mysqli_fetch_assoc($query);
    $filepath = '../uploads/' . $file['NAME'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['NAME']));
        readfile('../uploads/' . $file['NAME']);

        // Now update downloads count
        $newCount = $file['DOWNLOAD'] + 1;
        $updateQuery = "UPDATE upload_files SET DOWNLOAD=$newCount WHERE ID=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}


?>













<?php


include 'db_connect.php';


if(isset($_POST['search']))
{
	$valueToSearch = $_POST['valueToSearch'];
	$query = "SELECT * FROM `files` WHERE  CONCAT(`id`, `name`, `description`, `user_id`,`folder_id`,`file_type`,`file_path`,`is_public`)LIKE '%".$valueToSearch."%'";
	$search_result = filterTable($query);
	
}
	else {
		$query ="SELECT * FROM `files`";
		$search_result = filterTable($query);
		
	}
	
	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "fms_db");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
		
	
	

?>






<style>
		
		.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}






input[type = char]{
		width:38%;
		border:1px solid #aaa;
		border-radius:3px;
		margin:2px 0;
		outline:none;
		padding:3px;
		box-sizing:border-box;
		transition:.3s;
		
	}
		input[type = varchar]:focus{
			border-color:dodgerBlue;
			box-showdow:0 0 8px 0 dodgerBlue;
			
		}




input[type = varchar]{
		width:20%;
		border:1px solid #aaa;
		border-radius:3px;
		margin:2px 0;
		outline:none;
		padding:3px;
		box-sizing:border-box;
		transition:.3s;
		
	}
		input[type = varchar]:focus{
			border-color:dodgerBlue;
			box-showdow:0 0 8px 0 dodgerBlue;
			
		}



input[type = longtext]{
		width:67%;
		border:1px solid #aaa;
		border-radius:3px;
		margin:2px 0;
		outline:none;
		padding:3px;
		box-sizing:border-box;
		transition:.3s;
		
	}
		input[type = longtext]:focus{
			border-color:dodgerBlue;
			box-showdow:0 0 8px 0 dodgerBlue;
			
		}



	input[type = text]{
		width:20%;
		
		 border: 3px solid #ccc;
  border-radius: 3px;
		
		
		
		margin:2px 0;
		outline:none;
		padding:10px;
		box-sizing:border-box;
		transition:.3s;
		
		
		
		
	}
		input[type = text]:focus{
			border-color:dodgerBlue;
			box-showdow:0 0 8px 0 dodgerBlue;
			
		}
			
	
		input[type = number]{
		width:12%;
		border:1px solid #aaa;
		border-radius:3px;
		margin:2px 0;
		outline:none;
		padding:3px;
		box-sizing:border-box;
		transition:.3s;
	}
		input[type = number]:focus{
			border-color:dodgerBlue;
			box-showdow:0 0 8px 0 dodgerBlue;
			
		}
		
		
		input[type = submit],[type = button]{
		width:10%;
		border:5px solid #aaa;
		border-radius:3px;
		margin:8px 0;
		outline:none;
		padding:8px;
		box-sizing:border-box;
		transition:.3s;
		
	}
		input[type = submit]:focus{
			border-color:dodgerBlue;
			box-showdow:0 0 8px 0 dodgerBlue;
			
		}



		
		
		
		
			table{

	width:60%;
	border-collapse: collapse;
	margin: 100px auto;
}

th,td{

	height: 50px;
	vertical-align: center;
	border: 1px solid black;
}
		</style>


















<form action="22search.php" method="post">
			
			<input type="text" name="valueToSearch"> 
			
			<input type="submit" name="search" value="Search"> <i class="fa fa-search"></i>
			<input type="button" 
	  onClick="window.print()"
	  value="Print"/><br>
			<table>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>description</th>
					<th>user_id</th>
					<th>folder_id</th>
					<th>file_type</th>
					<th>file_path</th>
					<th>is_public</th>
					<th>Donwload</th>
					
					


				</tr>


		

<?php while($row = mysqli_fetch_array($search_result)): ?>
				
				<tr>
				
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['description'];?></td>
					<td><?php echo $row['user_id'];?></td>
					<td><?php echo $row['folder_id'];?></td>
					<td><?php echo $row['file_type'];?></td>
					<td><?php echo $row['file_path'];?></td>
					<td><?php echo $row['is_public'];?></td>
					  <td><a download="<?php echo $files[$id] ?>" href="uploads/<?php echo $files[$id] ?>"> <?php echo $files[$id] ?> </a> 
					  </td>
				
				</tr>

				
				<?php endwhile;?>
			</table>


		</form>











		