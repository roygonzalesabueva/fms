

<?php

session_start();
include "db_conn.php";

if (isset($_SESSION['username']) && isset($_SESSION['id']))

	{ ?>




<!DOCTPYE html>
	<html>
	<head>
		<title>multiple_login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 	</head>
 	<body>
 		<div class="container d-flex justify-content-center align-items-center"
 		style="min-height: 100vh">
 			
 		<?php if ($_SESSION['role'] == 'admin') {?>

				<div class="card" style="width: 18rem;">
				  <img src="img/admin.png" 
				  class="card-img-top" alt="admin image">
				  <div class="card-body text-center">
				    <h5 class="card-title">
				    	<?=$_SESSION['name']?></h5>
				   
				    <a href="logout.php" class="btn btn-dark">Logout</a>
				  </div>
				</div>
				<div class="p-3">

					<?php include 'php/members.php';

					if (mysqli_num_rows($res) > 0){?>


					<?php }?>

					 


					

					<h1 class="display-4 fs-1">Members</h1>

						<table class="table" style="width: 32rem;">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							      <th scope="col">User name</th>
							      <th scope="col">Role</th>
							    </tr>
							  </thead>
							  <tbody>

							  	<?php

							  	$i =1;

							  		while ($rows = mysqli_fetch_assoc($res)) {?>
							  			
							  		

							  	   <tr>
							      <th scope="row"><?=$i?></th>
							      <td><?=$rows['name']?></td>
							      <td><?=$rows['username']?</td>
							      <td><?=$rows['role']?</td>
							    </tr>
							   <?php  $i++; }?>
							  </tbody>
							</table>
						<?php ?>
						</div>

					<?php } else {?>

					<div class="card" style="width: 18rem;">
				  <img src="img/user.png" 
				  class="card-img-top" alt="admin image">
				  <div class="card-body text-center">
				    <h5 class="card-title">
				    	<?=$_SESSION['name']?></h5>
				   
				    <a href="logout.php" class="btn btn-dark">Logout</a>
				  </div>
				</div>


 		<?php  } ?>

 		</div>
 	</body>
 	</html>
 <?php } else {
 			header("Location: index.php");

 } ?>