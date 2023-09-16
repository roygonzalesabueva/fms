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
					  <td><a href="index.php?file_id=<?php echo $file['id']?>">DOWNLOAD </a> 
					  </td>
				
				</tr>

				
				<?php endwhile;?>
			</table>


		</form>











		