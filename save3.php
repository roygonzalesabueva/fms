

<?php


$conn = mysqli_connect('localhost','root','@DavaosurDB2023');
mysqli_select_db($conn, 'fms_db');



$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$s = "select * from userschat where password ='$password' or username ='$username'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num == 1){

    echo '<br><br><br><br><center><font size="5"><p style="color: blue;"> Username and password already taken</p> </font> </center>';
    echo  '<center><a href="http://202.137.126.59/fms/login1.php"> <button type="submit" class="btn btn-warning my-3" name="add"> Click here sign up again</i></button></center>';
}else{
	
	$reg= "insert into userschat(username , password, email ) values ('$username' , '$password', '$email')";
	mysqli_query($conn, $reg);
    echo '<br><br><br><br><center><font size="5"><p style="color: blue;">Username and password changed successfully</p> </font> </center>';
    echo  '<center><a href="http://202.137.126.59/fms/login1.php"> <button type="submit" class="btn btn-warning my-3" name="add"> Login</i></button></center>';
}


?>

