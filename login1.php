





<link rel="icon" href="modal\css1\images\favicon.ico" type="image" />






<?php
  session_start();

  if(!isset($_SESSION['username'])){

    header("Location: http://202.137.126.58/");
    exit();

  }


  

  function verify($data){
    $data = trim($data);
    $data = htmlspecialchars($data );
    $data = stripslashes($data );
    return $data;
  }

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
        header("location: home.php?school_id=" . $schoolid . "&emp_no=" . $emp_no);
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



  {

    //sql statement
    $sql = "SELECT * FROM userschat WHERE username='$username'";
 
    //Db Connection
    require_once('conn.php');

    //qry
    $qry = mysqli_query ($conn, $sql) or die ("Login problem");
    $count = mysqli_num_rows($qry);
    if($count==1)
    {
      $_SESSION['user']= $username;
      //header("location: dashboard.php");
      header("location: chat_client.php");
      
      
    }
   
  }

  {

    //sql statement
    $sql = "SELECT * FROM users WHERE username='$username'";
 
    //Db Connection
    require_once('conn.php');

    //qry
    $qry = mysqli_query ($conn, $sql) or die ("Login problem");
    $count = mysqli_num_rows($qry);
    if($count==1)
    {
      $_SESSION['user']= $username;
      //header("location: dashboard.php");
      header("location: files2.php");
      
      
    }
   
  }






  if(isset($_POST['login2'])){
    //getting the form data
      $username = verify($_POST['username']);
    //  $password = verify($_POST['password']);
   
    $username = $_SESSION['username'];

    require_once('conn.php');

    //sql statement
    $sql = "SELECT * FROM user_tbl2 WHERE username='$username'";
   
    //Db Connection
   

    //qry
    $qry = mysqli_query ($conn, $sql) or die ("Login problem");
    $count = mysqli_num_rows($qry);
    if($count==1)
    {
      $row=mysqli_fetch_assoc($qry);

      $_SESSION['id']= $row['id'];
      $_SESSION['username']= $row['username'];
      $_SESSION['email']= $row['email'];
      $_SESSION['password']= $row['password'];
      $_SESSION['status']= $row['status'];
      $_SESSION['role']= $row['role'];
      $_SESSION['department_id']= $row['department_id'];

      if ($_SESSION['department_id'] == 1) {
        header("location: home.php");
      }
      elseif ($_SESSION['department_id'] == 2) {
        header("location: filesscces.php");
      }



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
























    
  }



  

?>  

























<!DOCTYPE html>
<html lang="en">

<head>












<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>




<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="icon" href="modal\css1\images\favicon.ico" type="image" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<!--supply allert-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">












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
	











<!-- icons sa Pass and User -->
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}



.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 18px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 30px;
  outline: 5px;
}

.input-field:focus {
  border: 20px solid dodgerblue;
}

</style>











  <!-- Required meta tags -->
   <title>M.E.M.O. | Division Davao del Sur</title>
  <!-- plugins:css -->
 
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo.png" />

  <style>
body {
  background-color: white;
}
</style>


<style>
h1 {
  text-align: center;
}

h2 {
  text-align: left;
}

h3 {
  text-align: right;
}
</style>






<style> 
  
body {
  background-image: url("bg.png");
}
</style> 




</head>

<body>






<nav class="navbar navbar-inverse navbar-fixed-top">

<div class="container-fluid">
        <div class="navbar-header">

       
        </div>
  
        <ul class="nav navbar-nav navbar-right">

  
        <li><a href="#"><font color="WHITE " size="2"><B><?=$_SESSION['username']?></B></a></font>
<a href="http://202.137.126.58"><font color="White" size="2"><B>   |    Home</B></font></a> <li> 
      </ul>

     
      <!-- <li> <a href="login2.php"><font color="White" size="4"><B>Login</B></font></a></li> -->
   
</div>
  
</nav>










  <div class="container">
   
    
      
      
        <div class="row w-100 mx-auto">
       
        
          <div class="col-lg- 100 mx-auto">


          <br> 
          


          <br>    

<br>  

          <img src="davsur2.png" width="330" height="80">

          
            <br>    

            <br>  
       
             <form class="pt-3" method="post" name="login1" action="login1.php">



             
    
   
   
             <!-- <h1><label><font color="White" size="4"> <B>Go to M.E.M.O.</B> </font></label></h1> -->

             
<a href="memo.php" class="btn btn-primary btn-block btn-lg"> DIVISION MEMO</a>

        


<!-- <a href="login2.php" class="btn btn-primary btn-block btn-lg"> SCHOOL DASHBOARD</a> -->

                
<input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name ="login1"  value="SCHOOL DASHBOARD" /> 
<input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name ="login2"  value="ADMIN" /> 
 
<!-- <a href="home.php" class="btn btn-primary btn-block btn-lg"> ADMINISTRATOR</a>   
             -->
                
               <!-- <B> <label>PASSWORD</label></B>
               <div class="input-container">
    <i class="fa fa-key icon"></i>
               
                  <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password"
                   value="<?php if(isset($_COOKIE['upass'])) echo $_COOKIE['upass'];?>">
                </div> -->
                <!-- <div class="mt-3">
             <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name ="login1"  value="Continue" /> 
                </div><br> -->
                <!-- <button type="button" class="btn btn-link" data-target="#form_modal" data-toggle="modal"><span class="glyphicon glyphicon-save" ></span>Create Account</button> -->
           
                <!-- <button type="button" class="btn btn-link" data-target="#form_modal2" data-toggle="modal"><span class="glyphicon glyphicon-save" ></span>Forgot Your Password? </button> -->
           
               
                
              <!--    <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">


                   
                     <input type="checkbox" name ="remember" value="1" class="form-check-input">
                     Keep me signed in
                    </label>
                  </div>
                   <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i> <a href="https://www.facebook.com" class="text-primary">Connect using facebook
                  </button>
                </div>
               <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>-->
              </form>
               
            
        </div>
      </div>
      <!-- content-wrapper ends -->
   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
 
  <!-- endinject -->
      <!-- page-body-wrapper ends -->





  <!-- inject:js -->
 
  <!-- endinject -->





  <div class="modal fade" aria-hidden="true" id="form_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="save2.php">
				<div class="modal-header">


        







					<h3 class="modal-title">Register</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-16">
						
						
					<!--	<div class="form-group">
							
						<label>ID</label>	<input type="text" name="id" class="form-control" required="required"/>
						</div>-->


						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="required"/>
						</div>

            <div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required="required"/>
						</div>
						
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" required="required"/>
						</div>

            <div class="form-group">
							<label>School</label>
							<input type="text" name="school" class="form-control" required="required"/>
						</div>




            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					<button  class="btn btn-primary" name="save2"  ><span class="glyphicon glyphicon-save"></span> Save</button>
					


					</div>
				</div>
			
				




				
			</form>
		</div>
	</div>
</div>	










<div class="modal fade" aria-hidden="true" id="form_modal2">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="save3.php">
				<div class="modal-header">
					<h3 class="modal-title">Forgot Password</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-16">
						
						
					<!--	<div class="form-group">
							
						<label>ID</label>	<input type="text" name="id" class="form-control" required="required"/>
						</div>-->
            <div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" required="required"/>
						</div>

						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="required"/>
						</div>

            <div class="form-group">
							<label>Change Password</label>
							<input type="password" name="password" class="form-control" required="required"/>
						</div>
						
						




            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
					<button  class="btn btn-primary" name="save3"  ><span class="glyphicon glyphicon-save"></span>YES</button>
					


					</div>
				</div>
			
				




				
			</form>
		</div>
	</div>
</div>	



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>






</body>

</html>
