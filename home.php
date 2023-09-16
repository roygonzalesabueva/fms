





<?php include 'fileslogic.php';?>



<?php
	
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 include('./header.php'); 
 //include('./auth.php'); 
 ?>



<link rel="icon" href="modal\css1\images\logo.png" type="image" />











<?php






















if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `files` WHERE  CONCAT(`id`, `name`,`date_updated`)LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
    else {
        $query ="SELECT * FROM `files`ORDER BY id DESC";
        $search_result = filterTable($query);
        
    }
    
    function filterTable($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "fms_db");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
        
    
    

?>




<!DOCTYPE html>
<html>  
    <head>
       
    <title>Division of Davao del Sur|M.E.M.O</title>


</head>
<body>
    
            
        



<!--  Downlod-->


      

            



           
         <form action="index.php?page=home" method="post" enctype="multipart/form-data">
                
         
                
                <br>

                <input type="text" name="valueToSearch"> 
        
                <button type="submit" name="search" value="Search"><i class="fa fa-search"></i>Search</button>
       


    </form>





      












<table class="table table-bordered">



<thead class="alert-info">
        <th>REFERENCE NUMBER</th>
        <th>DESCRIPTION</th>
    
        <th>DATE UPLOADED</th>
        <th>ACTION</th>

    </thead>

    <tbody>


     


<?php while($row = mysqli_fetch_array($search_result)): ?>



        <tr> 

            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
           
            <td><?php echo $row['date_updated'];?></td>
            <td>
            <a  href="indexdown.php?file_id=<?php echo $row['id']?>"><i class="fa fa-download" style="font-size:14px"></i>DOWNLOAD</a>
            </td>

           


        </tr>
<?php endwhile;?>


       
    </tbody>



</table>











     
 </body>
</html>