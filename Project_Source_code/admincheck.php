<?php
	$host='localhost';
	$user='root';
	$password='';
	$dbname='exam_cell';
	
	$con=mysqli_connect($host,$user,$password,$dbname);
	
	$uname=$_POST["uname"];
	$pass=$_POST["pass"];
	
	$sql="select password from admin where username='".$uname."'";
	$rs=mysqli_query($con,$sql);
	
	$row = $rs->fetch_assoc();
	$rpass=$row["password"];
	
	if($rpass==$pass)
	{
		header("Location:http://localhost:8084/demo/a.php");
		die();
	}
	else
	{
		header("Location:http://localhost:8084/demo/adminsignin.htm");
		die();
	}	
	
?>