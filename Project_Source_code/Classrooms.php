<?php
include 'connect.php';
$sql2 = "delete from Wing";
$result2 = mysqli_query($conn,$sql2);
$Classes =  $_POST["classes"];
$classarr = explode(",",$Classes);
for ($i=0; $i<(count($classarr)-1) ;$i++)
{
	
	$sql1 = "insert into Wing values('".$classarr[$i][0]."','".$classarr[$i]."')";
	$result1 = mysqli_query($conn,$sql1);
}

echo "<body><center><br><br><h2 style='color:white';>Classrooms Selected Successfully</h2></center></body>";

?>
