<?php
include "connect.php";
$sql1 = "SELECT * FROM Student where SeatNo = 'T150054301'";
$result1= mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);
echo "<p id='st'>".$row1['name']."</p>";
echo $row1['photo'];
echo "<img width=60px height=60px src='".$row1['photo']."'>";
echo $_GET['name'];
?>
