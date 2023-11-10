

<!--time-->

<script>
setInterval(myTimer, 1000);
function myTimer() {
  const d = new Date();
  document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>

<?php
include_once("session.php")
?>



<?php include 'fileslogic.php';?>



<?php
	
  //if(!isset($_SESSION['login_id']))
    //header('location:login.php');
 include('./header.php'); 
 include('./topbar_davsur.php'); 
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
        $connect = mysqli_connect("localhost", "root", "@DavaosurDB2023", "fms_db");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
        
    
    

?>




<!DOCTYPE html>
<html>  
    <head>
       
    <title>Project DavaoSur - M.E.M.O</title>




    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>

<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--edit-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--send-->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



<!--supply allert-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">






  <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 10%;
  padding: 0 200px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: -20 15px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 900px) {
  .column {
    width: 200%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: right;
  background-color: #f1f1f1;
}
</style>










  <style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 80px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 6px 8px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>











<!--notificion-->

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 4px 6px;
  position: relative;
  display: inline-block;
  border-radius: 6px;
}

.notification:hover {
  background: Yellow;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>















</head>
<body style="background-color:white;">
  



<nav class="navbar " style="padding:0;">


  <div class="container-fluid mt-2 mb-2">
    
<!--     
  <img src="DAVAOSUR.png" width="140" height="70">
    
             -->
         
<div class="topnav-right">
    
  
   </div>

     
      






</div>


</nav>


<!--  Downlod-->


<br> <br> <br>



<center>

<p>

<h4> <B><?php echo $_SESSION['school_id'];?> <?php echo $_SESSION['school_name'];?>  </B></h4><p>

</center>









      <div class="row">
           
<form action="home.php" method="post" enctype="multipart/form-data">
<!-- <form action="home.php?school_id=<?=$_SESSION['selSchoolId']?>&emp_no=<?=$_SESSION['selEmNo']?>" method="post" enctype="multipart/form-data"> -->
 
                
                <input type="file" name="myfile" >  
                
                 <button type="submit" name="save"><i class="fa fa-upload" style="font-size:14px;color:blue"></i>Upload</button>
                     
       
                     <br>
                     
                     <br>
       
       
                       <input type="text" name="valueToSearch"> 
               
                       <button type="submit" name="search" value="Search"><i class="fa fa-search"></i>Search</button>
                       
       
           </form>
       

            








      












<table class="table table-bordered">



<thead class="alert-info">
        <th>REFERENCE NUMBER</th>
        <th>DESCRIPTION</th>
        <th>DATE UPLOADED</th>
        <th>UPLOAD</th>
        <th>DOWNLOAD</th>
        <th>DELETE</th>

    </thead>

    <tbody>


     


<?php while($row = mysqli_fetch_array($search_result)): ?>



        <tr> 

            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
           
            <td><?php echo $row['date_updated'];?></td>
            
	<td>

<div class="dropdown">
                    <a href="#" class="notification"><i class='far fa-bell' style='font-size:20px'></i><span class="badge">1</span></a>
            
                
<div class="dropdown-content">
<!--<a href="transferscnhs.php?id=<?php echo $row['id']?>">Upload to Schools</a>-->

<!-- <button type="button" class="btn btn-link" data-target="#modal_confirmupload" data-toggle="modal">Upload to Schools</button> -->

<a onclick="upload('<?php echo $row['id']; ?>')" class=" btn btn-sm btn-link"> <i class="fa fa-upload" style="font-size:14px;color:blue"></i>Upload to Schools</a>





</div>
</div>

</td>		




<td>
<a href="indexdown.php?file_id=<?php echo $row['id']?>" class=" btn btn-sm btn-success"><i class="fa fa-download" style="font-size:12px"></i>DOWNLOAD </a>
</td>

<td>

<!-- <button type="button" class="btn btn-link" data-target="#modal_confirmdel" data-toggle="modal"><i class='far fa-trash-alt' style='font-size:12px;color:red'></i>DELETE</button> -->
<a onclick="delete_data('<?php echo $row['id']; ?>')" class=" btn btn-sm btn-danger"> <i class="fas fa-solid fa-trash"></i><font color="white">DELETE</font></a>

<!--delete-->

<!-- <div class="modal fade" id="modal_confirmdel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h3 class="modal-title">Delete </h3>
</div>
<div class="modal-body">
<center><h4>Are you sure you want to Delete?</h4></center>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

<a type="button" class="btn btn-success" href="del.php?id=<?php //echo $row['id']?>">Yes</a>
</div>
</div>
</div>
</div> -->

















</td>


           


        </tr>
<?php endwhile;?>


       
    </tbody>



</table>



<!-- SUpply alert -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>





<!-- Supply alert -->
<script>

function delete_data(data_id) {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = ("del.php?id=" + data_id);        
        }
    })
}
</script>





<!-- Supply alert -->
<script>

function upload(data_id) {
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, upload it!',
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = ("transferscnhs.php?id=" + data_id);        
        }
    })
}
</script>












     
 </body>
</html>