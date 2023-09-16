

<nav id="sidebar" class='mx-lt-5 bg-blue' >


		
		<div class="sidebar-list">

		<!--	<a href="index.php?page=files" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>-->
			
			
		<!--<a href="index.php?page=davsurmemo" class="nav-item nav-davsurmemo"><span class='icon-field'><i class="fa fa-file"></i></span>MEMO</a>-->
			
		<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-file"></i></span>Home</a>
				<?php if($_SESSION['login_type'] == 1): ?>
					
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="index.php?page=files2" class="nav-item nav-files2"><span class='icon-field'><i class="fa fa-file"></i></span> Settings</a>
				
				

				
			<?php endif; ?>
		</div>

		<center><img src="images/re2.gif" width="250" height="200"></a></center>
		<br>
		
		<center><font color="white" size="4"><B>Division of Davao del Sur</B></font><br>
		<font color="white" size="4"><B> Office of the Division Records</B></font></center><br><br>
	

</nav>



<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>