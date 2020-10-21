<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$username=$_POST["user"];
$password=$_POST["pswd"];
if(!empty($fname)&&!empty($lname)&&!empty($username)&&!empty($password))
{
	$host="localhost";
	$user="root";
	$pass="";
	$db="signup";
	$conn= new mysqli($host,$user,$pass,$db);

	if(mysqli_connect_error())
	{
		die('Connect Error ('.mysqli_connect_error().')'
			.mysqli_connect_error());
	} 
	else
	{
		$sql="INSERT INTO userdata (fname,lname,user,pswd) values('$fname','$lname','$username','$password')";
		if($conn->query($sql))
		{
			if(isset($_POST['SIGNUP']))
			{
				header('location:HOME.html');
			}
			echo "Succeccfully entered";
		}
		else{
			echo "Error".$sql."<br>".$conn->error;
		}
		$conn->close();
	}

}
else
{
	echo "All fields are required";
	die();
}

?>