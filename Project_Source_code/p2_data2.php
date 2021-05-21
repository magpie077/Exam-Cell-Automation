<?php
session_start();
$list1 = array(); 
$_SESSION['list1'] = $list1 ;

include 'connect.php';
$sql1 = "delete from Wing";
$result1 = mysqli_query($conn,$sql1);
$sql2 = "UPDATE allocation SET Block=''";
$result2 = mysqli_query($conn,$sql2);
$sql4 = "DELETE FROM seatarrangement";
$result4 = mysqli_query($conn,$sql4);

?>
