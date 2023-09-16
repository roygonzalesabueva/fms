

<?php


$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn, 'fms_db');



$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$school = $_POST['school'];

$s = "select * from userschat where password ='$password' or email ='$email'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num == 1){

    echo '<br><br><br><br><center><font size="5"><p style="color: blue;"> Password or email already taken</p> </font> </center>';
    echo  '<center><a href="http://localhost/fms/login1.php"> <button type="submit" class="btn btn-warning my-3" name="add"> Click here sign up again</i></button></center>';
}else{
	
	$reg= "insert into userschat(username , password, email, school ) values ('$username' , '$password', '$email', '$school')";
	mysqli_query($conn, $reg);
    echo '<br><br><br><br><center><font size="5"><p style="color: blue;">Registration Successful</p> </font> </center>';
    echo  '<center><a href="http://localhost/fms/login1.php"> <button type="submit" class="btn btn-warning my-3" name="add"> Login</i></button></center>';
}


?>

