


<?php
include_once("session.php")
?>




<?php include 'fileslogic.php';?>





<?php
// Your PHP code and processing here

// Refresh the page after 3 seconds (adjust the value as needed)
$refreshDelay = 15;
header("refresh: $refreshDelay");

// The rest of your PHP code and HTML content
?>



<?php include 'header.php';?>




<link rel="icon" href="modal\css1\images\logo.png" type="image" />











<?php






















if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `filespnhs` WHERE  CONCAT(`id`, `name`,`date_updated`)LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
    else {
        $query ="SELECT * FROM `filespnhs`ORDER BY id DESC";
        $search_result = filterTable($query);
        
    }
    
    function filterTable($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "fms_db");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
        
    
    

?>



<link rel="icon" href="modal\css1\images\favicon.ico" type="image" />
<style>
	.logo {
    margin: auto;
    font-size: 0px;
    background: white;
    padding: 0px 0px;
    border-radius: 0% 0%;
    color: #000000b3;
}
</style>



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























<!--time-->

<script>
setInterval(myTimer, 1000);
function myTimer() {
  const d = new Date();
  document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>








<!DOCTYPE html>
<html lang="en">

<head>

<!--button-->



<!--icons-->


<!--responsive-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">




<!--icons pass user-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




  <title>M.E.M.O | Division of Davao del Sur</title>

  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>

<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--edit-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--send-->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<!--icons-->














<!--responsive-->

<style>
* {
  box-sizing: border-box;
}
.menu {
  float: left;
  width: 20%;
}
.menuitem {
  padding: 8px;
  margin-top: 7px;
  border-bottom: 1px solid #f1f1f1;
}
.main {
  float: left;
  width: 60%;
  padding: 0 20px;
  overflow: hidden;
}
.right {
  background-color: lightblue;
  float: left;
  width: 20%;
  padding: 10px 15px;
  margin-top: 7px;
}

@media only screen and (max-width:800px) {
  /* For tablets: */
  .main {
    width: 80%;
    padding: 0;
  }
  .right {
    width: 100%;
  }
}
@media only screen and (max-width:500px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width: 100%;
  }
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














 
  <style>
img {
  float: right;
}
</style>



<style>

h4 {
  text-align: Center;
}

</style>















</head>
<body style="background-color:white;">
  



<nav class="navbar  " style="padding:0;">



  <div class="container-fluid mt-2 mb-2">
  	
  <!--<h4><font color="White"><B>M.E.M.O.| Division of Davao del Sur</B></font></h4>-->
  

  <img src="DAVAOSUR.png" width="140" height="70">















  <a href="filespnhs_history.php"> <i class="material-icons" style="font-size:36px;color:Blue">cloud_queue</i><font color="Black"><B>Drive</B></font></a> 
     
  

			 
        <div class="topnav-right">
    
        
        <font color="Black"><B><a <p id="demo"></p></a> | </B></font> 
      <!--  <a href="filesscnhs_history.php"> <font color="White"> History</a></font>||-->
      <a href="chat_pnhs.php"><font color="Black"><B>Chat Room</a> | </B></font>
  		<!--<a href="login.php">	<font color="White"><i class='far fa-user-circle' style='font-size:14px'></i>Login	</a></font>|||-->
      
       <a href="#"> <font color="Black"><B>  <i class="fa fa-fw fa-user"></i> <span class="nav-profile-name"> <?php echo $_SESSION['user'];?>  |  </B></span></a></font> 
      
      <a href="logout1.php"><font color="Black"><B>Logout</a></B></font>
      </div>



    </div>

  
</nav>



            
   






<p>

<h4> <B>Downloadable Memorandum</B></h4><p>

  

  
 













<div class="row">
  
  


           
         <form action="filespnhs.php" method="post" enctype="multipart/form-data">
                
         
                
            

                <input type="text" name="valueToSearch"> 
        
                <button type="submit" name="search" value="Search"><i class="fa fa-search"></i>Search</button>
       


    </form>





      












<table class="table table-bordered">



<thead class="alert-info">
        <th>REFERENCE NUMBER</th>
        <th>DESCRIPTION</th>
    
        <th>DATE UPLOADED</th>
        <th>NOTIFICATION</th>
        <th>DOWNLOAD</th>
        <th>ACTION</th>

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
<!--<a href="transferscnhs.php?id=<?php echo $row['id']?>">Upload</a>-->
<a  href="indexdown.php?file_id=<?php echo $row['id']?>">DOWNLOAD</a>
<!-- <a href="transferscnhs_history.php?id=<?php echo $row['id']?>">Save to Drive</a>-->

 <button type="button" class="btn btn-link" data-target="#modal_confirm" data-toggle="modal"><span class="glyphicon glyphicon-save" ></span>SAVE</button>






</div>
</div>

</td>		



            <td>
            <a  href="indexdown.php?file_id=<?php echo $row['id']?>"><i class="fa fa-download" style="font-size:14px"></i>DOWNLOAD</a>
            </td>
            <td>
           <!-- <a href="transferscnhs_history.php?id=<?php echo $row['id']?>">Save to Drive</a>-->


          <!--  <a href="transferscnhs_history.php?id=<?php echo $row['id']?>">Save to Drive</a>-->
        
            <button type="button" class="btn btn-link" data-target="#modal_confirm" data-toggle="modal"><span class="glyphicon glyphicon-save" ></span>SAVE</button>






            <div class="modal fade" id="modal_confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Save</h3>
                </div>
                <div class="modal-body">
                    <center><h4>Are you sure you want to save to drive?</h4></center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <!--  <a href="transferscnhs_history.php?id=<?php echo $row['id']?>">Save to Drive</a>-->
                    <a type="button" class="btn btn-success" href="transferpnhs_history.php?id=<?php echo $row['id']?>">Okay</a>
                </div>
            </div>
        </div>
    </div>





            </td>
        </tr>
<?php endwhile;?>


       
    </tbody>



</table>



   








     
 </body>
</html>

