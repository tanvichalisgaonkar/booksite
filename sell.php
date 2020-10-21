<?php
$host="localhost";
$user="root";
$pass="";
$db="signup";

$conn= new mysqli($host,$user,$pass,$db);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_error().')'.mysqli_connect_error());
}
else{
	$newname;
	if(isset($_POST['submit']))
	{
		$file=$_FILES['file'];

		$fileName=$_FILES['file']['name'];
		$fileTmpName=$_FILES['file']['tmp_name'];
		$fileSize=$_FILES['file']['size'];
		$fileError=$_FILES['file']['error'];
		$fileType=$_FILES['file']['type'];

		$fileExt= explode('.', $fileName);
		$fileActualExt=strtolower(end($fileExt));

		$allowed = array('jpg','jpeg','png' );

		if(in_array($fileActualExt, $allowed))
		{	if($fileError === 0)
			{
				if ($fileSize < 10000000) {
					$newname=uniqid(' ',true).".".$fileActualExt;
					$fileDest='uploads/'.$newname;
					move_uploaded_file($fileTmpName, $fileDest);
					echo"Image upload Succesful"; 

				} else{
					echo "file is too big";
				}
			}else{
				echo"error in uploading";
			}
		

		}else{
			echo "Incompatible type";
		}
	}
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$title=$_POST['title'];
	$author=$_POST['author'];
	$subject=$_POST['subject'];
	$discp=$_POST['discp'];
	$cost=$_POST['cost'];
	if(!empty($name)&&!empty($contact)&&!empty($title)&&!empty($author)&&!empty($subject)&&!empty($cost)&&!empty($address))
	{
		$sql="INSERT INTO bookdata (name,contact,address,title,author,subject,description,cost,img) values ('$name','$contact','$address',  '$title','$author','$subject','$discp','$cost','$newname')";
		if($conn->query($sql))
		{
			echo "Succesful";
		}
		else{
			echo "Error".$sql."<br>".$conn->error;
		}
		
	}
	else
	{
		echo "All fields are required";
		die();
	}

//To UPload An Images on to page
	
$conn->close();

}

?>