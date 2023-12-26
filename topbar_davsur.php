
















<?php
  session_start();

  if(!isset($_SESSION['username'])){

    header("Location: http://202.137.126.58/");
    exit();

  }

?>






<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-1 mb-1">
  	
  <img src="davsur2.png" width="200" height="50">
			  <h6><font color="WHITE"><B>Memorandum in Electronic Media Online (M.E.M.O)</B></font></h6>

 
       

        <div class="topnav-right">
         <?php
           // $schoolid = $_GET['school_id'];
           // $emp_no = $_GET['emp_no'];

            //echo "School ID" .$schoolid;
            //echo "Employee Number" .$emp_no;
        ?> 
        <font color="White" size="3"><B><a <p id="demo"></p></a> | </B></font> 
        <!-- <a href="chat_davsur.php?school_id=<?php echo $schoolid ?>&emp_no=<?php echo $emp_no ?>"><font color="White" size="3"><B>Chat Room</a> | </B></font> -->
        <!-- <a href="chat_davsur.php?school_id=<?php echo $schoolid ?>&emp_no=<?php echo $emp_no ?>"><font color="White" size="3"><B>Chat Room</a> | </B></font> -->
        <!-- <a href="chat_davsur.php?school_id=<?php echo $schoolid ?>&emp_no=<?php echo $emp_no ?>"><font color="White" size="3"><B>Chat Room</a> | </B></font> -->
        <a href="chat_davsur.php?school_id=<?php echo $schoolid ?>&emp_no=<?php echo $emp_no ?>"><font color="White" size="3"><B>Chat Room</a> | </B></font>
  	

        <a href="#"><font color="WHITE " size="3"><i class="fa fa-fw fa-user"></i><B><?=$_SESSION['username']?></a> | </B></font>
        <a href="stored.php"><font color="WHITE " size="3"><B>History</a>|</B></font>
        <a href="http://202.137.126.58/"><font color="WHITE " size="3"><B>Home</B></a></font>
        </div>
    <!-- <a href="chat_admin.php"> <font color="White" size="4"><B>Chat Room</a></B></font>
	  		<a href="ajax.php?action=logout"><font color="White" size="4"><B><?php echo $_SESSION['username'] ?></B></font> <i class="fa fa-power-off"></i></a>
	    </div> -->
    </div>
  </div>
  
</nav>


