<html>
<head>
	<title>BUYER'S</title>
</head>
<style>
	#head{
		width:360px;
		height: 300px;
		background-image: url("HomepageBackground.jpg");
	}
	#img1{
			height: 240px;
			width:100px;
			position: absolute;
			left: 10px;
			top:50px;
		}
		#img2{
			height: 120px;
			width:100px;
			position: absolute;
			left: 210px;
			top:50px;
		}
		#title{
			font-size: 50px;
			font-family: cambria;
			font-weight: 70px;
			text-align: center;
			vertical-align: center;
			color:	#f4a742;
		}
		#div1{
			height: 360px;
			width: 300px;
			position: absolute;
			left:10px;
			top:330px;
			border:5px solid gray;
			padding:20px;
			border-radius: 10px;
		}
		a:link{
			height: 50px;
			width: 260px;
			border-bottom: 5px solid gray;
			text-decoration: none;
			font-size: 20px;
			font-weight: bold;
			background-color:	#f4a742;
			padding:20px 85px;
		}

		#div2{
			position: absolute;
			width:1100px;
			height: 720px;
			border:5px solid gray;
			border-radius: 10px;
			left:400px;
			top:8px;
		}
		.flow{
			position: relative;
			padding:10px;
			height: 320px;
			width: 300px;
			border:2px solid gray;
			float: left;
			margin:10px;
		}
	
</style>
<body>
<div id="head">
	<img src="BOOK (2).png" id="img1">
	<h1 id ="title">BOOKS</h1>
	<img src="BOOK (2).png" id="img2">
</div>
<div id="div1">
	<center>
		<br><br><br><br>
	<a href="HOMEPAGE.html">HOME</a><br><br><br><br><br><br>	
	<a href="SELL.html">SELL BOOKS</a><br><br><br><br><br><br>
	<a href="BUY.php">BUY BOOKS</a>
	</center>
</div>
<div id="div2">
	<?php
		$host="localhost";
		$user="root";
		$pass="";
		$db="signup";

		$conn=mysqli_connect($host,$user,$pass);
		mysqli_select_db($conn,$db);
		$sql="SELECT * FROM bookdata";
		$data=mysqli_query($conn,$sql);
		while($result=mysqli_fetch_assoc($data))
		{

			echo "<div class='flow'><img src='uploads/".$result['img']."' height='190px' width='280px' >"; 
			echo "<br>NAME= ".$result['name']."<br>" ;
			echo "CONTACT= ".$result['contact']."<br>";
			echo "ADDRESS= ".$result['address']."<br>";
			echo "BOOK TITLE= ".$result['title']."<br>";
			echo "AUTHOR= ".$result['author']."<br>";
			echo "SUBJECT= ".$result['subject']."<br>";
			echo "COST= ".$result['cost']."<br>";
			echo "</div>";
		}
	?>


</div>
</body>
</html>