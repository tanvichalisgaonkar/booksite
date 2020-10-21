<?php
$host="localhost";
$user="root";
$pass="";
$db="signup";

$conn=mysqli_connect($host,$user,$pass);
mysqli_select_db($conn,$db);

if(isset($_POST['user']))
{
	$uname=$_POST['user'];
	$password=$_POST['pswd'];

	$sql="SELECT * FROM userdata where user='".$uname."'AND pswd='".$password."'";

	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==1)
	{
		if(isset($_POST['LOGIN']))
		{
			header('location:HOMEPAGE.html');
		}
		echo "Successfully Logged in.";
		exit();
	}
	else{
		echo "Invalid username or password";
		exit();
	}
}




?>