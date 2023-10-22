
















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
  	
  <img src="davsur2.png" width="220" height="60">
			  <h5><font color="WHITE"><B>Memorandum in Electronic Media Online (M.E.M.O)</B></font></h5>



        

  			
        <font color="White" size="2"><B><a <p id="demo"></p></a> | </B></font> 
        <a href="chat_index.php"><font color="White"><B>Chat Room</a> | </B></font>
  	

        <a href="#"><font color="WHITE " size="2"><B><?=$_SESSION['username']?></B></a> | </font>
        <a href="http://202.137.126.58/"><font color="WHITE " size="2"><B>Home</B></a></font>
       
    <!-- <a href="chat_admin.php"> <font color="White" size="4"><B>Chat Room</a></B></font>
	  		<a href="ajax.php?action=logout"><font color="White" size="4"><B><?php echo $_SESSION['username'] ?></B></font> <i class="fa fa-power-off"></i></a>
	    </div> -->
    </div>
  </div>
  
</nav>


