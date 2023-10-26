

<?php
if(isset($_POST['login1'])){
    //getting the form data


    
    require_once('db_tis.php');
    // $username=strtolower($_SESSION['user_role']);
    $user_name = $_SESSION['username'];



    $sql = "SELECT emp_no FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $stmt->bind_result($emp_no);
        $stmt->fetch();
        $stmt->close();
        if ($emp_no) {
            echo "";
            $_SESSION['emp_no']=$emp_no;

        } else {
            echo "No result found for the provided email.";
        }
    } else {
        
        echo "Error preparing the statement.";
    }
     

    $sql2 = "SELECT school_id FROM employment_record WHERE emp_no = ?";
    $stmt2 = $conn->prepare($sql2);
    
    if ($stmt2) {
        $stmt2->bind_param("s", $emp_no);
        $stmt2->execute();
        $stmt2->bind_result($school_id);
        $stmt2->fetch();
        $stmt2->close();
        if ($school_id) {
            //  echo $school_id." ".$emp_no;
             $_SESSION['schoolid']=$school_id;
            // echo"<script>alert('.$school_id.')</script>";
        } else {
            echo "No employment record found for the provided emp_no.";
        }
    } else {
        echo "Error preparing the statement.";
    }
    
    




      require_once('conn.php');
      // echo"<script>alert('.$school_id.')</script>";
    //sql statement
    $schoolid = $_SESSION['schoolid'];
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM user_tbl WHERE school_id='$schoolid'";
 
    //Db Connection
   

    //qry
    $qry = mysqli_query ($conn, $sql) or die ("Login problem");
    $count = mysqli_num_rows($qry);
    if($count==1)
    {
      $row=mysqli_fetch_assoc($qry);

      $_SESSION['id']= $row['id'];
      //$_SESSION['username']= $row['username'];
      $_SESSION['school_name']= $row['school_name'];
      $_SESSION['school_id']= $row['school_id'];
      $_SESSION['email']= $row['email'];
      $_SESSION['password']= $row['password'];
      $_SESSION['status']= $row['status'];
      $_SESSION['role']= $row['role'];
      $_SESSION['department_id']= $row['department_id'];

      if ($_SESSION['department_id'] == 259) {
        header("location: home.php");
      }

      elseif ($_SESSION['department_id']) {
        header("Location: memoschool.php?school_id=" . $schoolid . "&emp_no=" . $emp_no);
        }

      // elseif ($_SESSION['department_id'] == 194) {
      //   header("location: filesscces.php");
      // }

      // elseif ($_SESSION['department_id'] == 258) {
      //   header("location: filessnhs.php");
      // }

      // elseif ($_SESSION['department_id'] == 248) {
      //   header("location: filespnhs.php");
      // }

      // elseif ($_SESSION['department_id'] == 243) {
      //   header("location: filesmnhs.php");
      // }

      // elseif ($_SESSION['department_id'] == 249) {
      //   header("location: filesfnhs.php");
      // }
      // elseif ($_SESSION['department_id'] == 1) {
      //   header("location: 128810.php");
      // }

      //  elseif ($_SESSION['department_id'] == 259) {
      //  header("location: home.php");
      //  }

      // elseif ($_SESSION['department_id'] == 2) {
      //   header("location: 128811.php");
      // }

      // elseif ($_SESSION['department_id'] == 3) {
      //   header("location: 128812.php");
      // }

      // elseif ($_SESSION['department_id'] == 4) {
      //   header("location: 128813.php");
      // }

      // elseif ($_SESSION['department_id'] == 5) {
      //   header("location: 128814.php");
      // }

      // elseif ($_SESSION['department_id'] == 6) {
      //   header("location: 128815.php");
      // }

      // elseif ($_SESSION['department_id'] == 7) {
      //   header("location: 128816.php");
      // }

      // elseif ($_SESSION['department_id'] == 8) {
      //   header("location: 128817.php");
      // }

      // elseif ($_SESSION['department_id'] == 9) {
      //   header("location: 128818.php");
      // }

      // elseif ($_SESSION['department_id'] == 10) {
      //   header("location: 128819.php");
      // }

      // elseif ($_SESSION['department_id'] == 11) {
      //   header("location: 128820.php");
      // }

      // elseif ($_SESSION['department_id'] == 12) {
      //   header("location: 128821.php");
      // }

      // elseif ($_SESSION['department_id'] == 13) {
      //   header("location: 128822.php");
      // }

      // elseif ($_SESSION['department_id'] == 14) {
      //   header("location: 128823.php");
      // }

      // elseif ($_SESSION['department_id'] == 15) {
      //   header("location: 128824.php");
      // }

      // elseif ($_SESSION['department_id'] == 16) {
      //   header("location: 128825.php");
      // }

      // elseif ($_SESSION['department_id'] == 17) {
      //   header("location: 128826.php");
      // }


      // elseif ($_SESSION['department_id'] == 229) {
      //   header("location: 304275.php");
      // }


      //header("location: dashboard.php");
      // header("location: index.php");
      
    }




    if($count===1);
    {
      $_SESSION['user']= $username;
      //header("location: dashboard.php");
    //  header("location: index.php");
  echo"<script>alert('Error=Incorrect User Name or password.')</script>";
   


    }

}

  ?>













<?php
$conn = mysqli_connect("localhost","root","@DavaosurDB2023","fms_db");
$sql = "SELECT * FROM `chat` ORDER BY mem_id ASC";
$result = mysqli_query($conn,$sql);
?>





<?php
include_once("session.php")
?>


<?php
// Your PHP code and processing here

// Refresh the page after 3 seconds (adjust the value as needed)
$refreshDelay = 15;
header("refresh: $refreshDelay");

// The rest of your PHP code and HTML content
?>
















<?php



if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
	$query = "SELECT * FROM `chat` WHERE  CONCAT(`trackid`)LIKE '%".$valueToSearch."%'";
  //  $query = "SELECT * FROM `membertracking` WHERE  CONCAT(`mem_id`, `trackid`, `firstname`, `lastname`, `address`)LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
    else {
        $query ="SELECT * FROM `chat` ORDER BY mem_id DESC";
        $search_result = filterTable($query);
        
    }
    
    function filterTable($query)
    {
        $connect = mysqli_connect("localhost", "root", "@DavaosurDB2023", "fms_db");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
        
    
    

?>






















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



    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icons CSS -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--edit-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--send-->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




    <!--header-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



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
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 6px 8px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
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
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 6px 8px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
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
        width: 100%;
        padding: 0 300px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {
        margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 500px;
        }
    }

    /* Style the counter cards */
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        text-align: left;
        background-color: #f1f1f1;
    }
    </style>













</head>

<body>










    <div class="row">
        <div class="column">



            <div class="card">



            <img src="DAVAOSUR.png" width="140" height="70">

                <ul class="nav navbar-nav navbar-right">

                    <li>
                    <a href="#"><font color="Black"><B>
                                <p id="demo"></p>
                            </B></font>
                            </a></li>

                          



                    <li><a href="#"><i class="fa fa-fw fa-user"></i> <span
                                class="nav-profile-name"><?php echo $_SESSION['user'];?> </span></a></li>
                    <!--  <li><button type="button" class="btn cancel" onclick="closeForm()">Close</button></li>-->

                    <li> <a href="memoschool.php">Close</a></li>
                      <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name ="login1"  value="Close" />  
                
                   
                </ul>
              










                <!--<button class="btn btn-primary" onclick="generateTrackingID()" type="button" data-toggle="modal" data-target="#form_modal"> <font size="3"> <B>New Message</B></font></button>-->






                <form method="POST" action="chat_index_save.php">





                

  <div class="form-group " style="display: none;">
                        <label>Date/Time</label>
                        <select type="text" name="date_created" placeholder="" class="form-control" required="required"
                            readonly />


                        <option value="<?php echo " " . date("Y/m/d") . "";?>"><?php echo " " . date("Y/m/d") . "";?>
                        </option>
                        </select>





                        <label>Sender</label>
                        <select type="text" name="firstname" placeholder="" class="form-control" required="required"
                            readonly />

                        <option value="<?php echo $_SESSION['user'];?>"><?php echo $_SESSION['user'];?></option>

                        </select>

                    </div>


                    <div class="row">
                        <div class="col-lg-12  float-right mt-5">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2 justify-end ">
                              <button type="submit" class="btn btn-primary mt-5 float-right"
                                    name="save"><span class="glyphicon glyphicon-save"></span> Send</button>
                                  </div>


                        </div>

                    </div>

                    <div class="form-group form-group form-group-lg ">

                        <label>
                                <font color="Black"> Message</font></label>
                           

                        <input type="text" name="lastname" placeholder="Message.." class="form-control form-control-lg " style="width: 643px;" 
                            id="comment"> 
                    </div>
                </form>














                <table class="table table-bordered">











                    <thead class="alert-info">
                        <tr>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Date/Time</th>
                            <!--<th>Transaction_ID</th>
					
						<th>Sender</th>
						<th>Message</th>
						<th>Receiver</th>
						<th>Remarks</th>
						<th>Date/Time</th>
						<th>Notification</th>
						<th>Action</th>
						<th>Update</th>-->





                        </tr>
                    </thead>
                    <tbody>



                        <?php while($fetch = mysqli_fetch_array($search_result)): ?>
                        <tr>
                            <!--	<td><?php echo $fetch['trackid']?></td>-->

                            <td><?php echo $fetch['firstname']?></td>
                            <td><?php echo $fetch['lastname']?></td>


                            <!--	<td><?php echo $fetch['section']?></td>


						
						<td><?php echo $fetch['address']?></td>-->
                            <td><?php echo $fetch['date_created']?></td>

                            <!--	<td>

								<div class="dropdown">
								<a href="#" class="notification"><i class="fa fa-bell-o" style="font-size:20px"></i><span class="badge">1</span></a>
						
							<div class="dropdown-content">
  <a href="transferall.php?mem_id=<?php echo $fetch['mem_id']?>">ALL SECTION</a>
  <a href="transferrecord.php?mem_id=<?php echo $fetch['mem_id']?>">Records</a>
  <a href="transferhrmo.php?mem_id=<?php echo $fetch['mem_id']?>">HRMO</a>
    <a href="transfersds.php?mem_id=<?php echo $fetch['mem_id']?>">SDS</a>
    <a href="transferasds.php?mem_id=<?php echo $fetch['mem_id']?>">ASDS</a>
    <a href="transfersgod.php?mem_id=<?php echo $fetch['mem_id']?>">SGOD</a>
	<a href="transferscid.php?mem_id=<?php echo $fetch['mem_id']?>">CID</a>
	<a href="transferdpsu.php?mem_id=<?php echo $fetch['mem_id']?>">DPSU</a>
	<a href="transfersupply.php?mem_id=<?php echo $fetch['mem_id']?>">Supply</a>
	<a href="transfercashier.php?mem_id=<?php echo $fetch['mem_id']?>">Cashier</a>
	<a href="transferbudget.php?mem_id=<?php echo $fetch['mem_id']?>">Budget</a>
	<a href="transferacct.php?mem_id=<?php echo $fetch['mem_id']?>">Accounting</a>
    <a href="transferlegal.php?mem_id=<?php echo $fetch['mem_id']?>">Legal</a>
  </div>
</div>

</td>	-->
                            <!--<td>

<center><a href="del.php?mem_id=<?php echo $fetch['mem_id']?>"><i class="fa fa-trash" style='font-size:12px;'></i>Del</a></center>


</td>	-->

                            <!--<td>
<a href="edit_index.php?mem_id=<?php echo $fetch['mem_id']?>"><i class="fa fa-edit" style="font-size:12px;color:red"></i>Edit</a></center>
							
								
				 	</td>-->









                        </tr>
                        <?php endwhile;?>
                    </tbody>

                </table>








            </div>

        </div>


        </center>







        <center>






            <!--    <button class="btn btn-primary" onclick="generateTrackingID()" type="button" data-toggle="modal" data-target="#form_modal2"><font size="5"> <B>Claim</font></B> </button>-->


        </center>




























        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>

        <!--chat-->











</body>

</html>



<script type="text/javascript">
function generateTrackingID() {
    const d = new Date();
    var month = d.getMonth();
    var year = d.getFullYear();
    var day = d.getDate();
    var inputF = document.getElementById("trackid");
    var inputD = document.getElementById("datetoday");
    //var inputT = document.getElementById("datetoday");

    inputF.setAttribute('value', year + "-" + (month + 1) + "" + (day) + "-" + (Math.floor(Math.random() * 100000) +
    1));

    inputD.setAttribute('value', year + "-" + (month + 1) + "-" + (day) + "-" + d.getHours() + ":" + d.getMinutes());
    //inputT.setAttribute('value', year+"-"+(month+1)+"-"+(day)+"-"+d.getHours()+":"+d.getMinutes());

    //inputF.setAttribute('value', 'Marlon');
}
</script>