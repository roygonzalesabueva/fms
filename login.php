<link rel="icon" href="modal\css1\images\logo.png" type="image" />
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

<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	
  		
			  <h4><font color="ORANGE">Memorandum in Electronic Media Online (M.E.M.O)</font></h4>
  			<a href="logout1.php"><i class="glyphicon glyphicon-remove">Logout</i>	</a>
	 
	    </div>
    </div>
  </div>
  
</nav>











<?php
include_once("session.php")
?>








<!DOCTYPE html>
<html lang="en">

<head>
	<!--logout-->



	<!--icons pass user-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




  <title>M.E.M.O | Division of Davao del Sur</title>
 
<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>






















</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:darkgray;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#00000061;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}
	.logo {
    margin: auto;
    font-size: 1rem;
    background: white;
    padding: .0em 0.0em;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<body>




  <main id="main" class=" alert-info">
  		<div id="login-left">
  			<div class="logo">
			<center><img src="images/roy1.gif" width="940" height="760"></a></center>
  			</div>
			 
			

			  
			
  		</div>

		
  		<div id="login-right">

		  
  			<div class="card col-md-8">

			  
  				<div class="card-body">

				  
  					<form id="login-form" >

					 
  						<div class="form-group">

  							<center><label ><h4><font color="Orange"><B>Login</B></font></h4></label> <br></center>
  							<B><label> Username</label></B>
							  
							
  							<input type="text" id="username" name="username" class="form-control">

							  
  						</div>
  						<div class="form-group">
  							<B><label for="password" class="control-label">Password</label></B>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>

						
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary"><i class='fas fa-user-tie' style='font-size:12px'></i>Login</button></center><br><br>
						
						<!--	<center><a href="http://localhost/fms/manage_user.php"><h6>Sign-up</h6>
  							

  							<a href="#"><h6>Forgot Password?</h6></center>-->
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.reload('index.php?page=home');
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>