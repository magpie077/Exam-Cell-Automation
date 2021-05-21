<?php
	
	$host='localhost';
	$user='root';
	$password='';
	$dbname='exam_cell';
	
	$con=mysqli_connect($host,$user,$password,$dbname);

	$seat=0;
	
	foreach($_POST as $key=>$value)
	{
		if($key=="roll")
		{
			$seat=$value;
		}	
		
	}
	
	
	foreach($_POST as $key=>$value)
	{
		if($key>0)
		{
			$sql="select name from Subjects where code=$value";
			$rs=mysqli_query($con,$sql);

			$row = $rs->fetch_assoc();
			$sub_name=$row["name"];
			
			
			$sql="insert into allocation(Subject,SeatNo) values('$sub_name', '$seat')";
			$rs=mysqli_query($con,$sql);
		}	
		
	}	
	
	echo "Form Submitted Successfully!";
	echo "<br><br><body alink=black vlink=black><center><a href='signin.htm'>SIGN OUT</center></body>"
?>