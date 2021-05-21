<?php
session_start();
include 'connect.php';
$date = $_POST["date"];
$branch = $_POST["branch"];
$wing = $_POST["wing"];
$str ="";
$list1 = $_SESSION["list1"];

$capacity = 4 ;
//getBlocks
$sql = "SELECT Classroom FROM Wing where wing like '$wing'";
$result = mysqli_query($conn,$sql);
$row0=mysqli_fetch_assoc($result);

//GetSubjects	
$sql3 = "SELECT Subject FROM date where Branch like '$branch' and DateOfExam like '$date'";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);
$sub = $row3["Subject"];

$sql8 = "SELECT count(SeatNo) FROM allocation where Subject='".$sub."'";
$result8 = mysqli_query($conn,$sql8);
$row8 = mysqli_fetch_assoc($result8);
$c = $row8['count(SeatNo)'];
echo "$c";

//GetStaff
$sql7 = "SELECT Name FROM staff where Wing like '$wing'";
$result7 = mysqli_query($conn,$sql7);
$row = mysqli_fetch_assoc($result7);
if(mysqli_num_rows($result7)>0)
{
	$max=0;
	$min=999999;
	$sql4 = "SELECT SeatNo FROM allocation where Subject='".$sub."'";	//can be WRONG

	$rs=mysqli_query($conn,$sql4);
			
			if($rs->num_rows > 0)
				{
					while($row = $rs->fetch_assoc())
					{	
						//getStartSeatNo
						if($row["SeatNo"]<$min)
							$min=$row["SeatNo"];
						if($row["SeatNo"]>$max)
							$max=$row["SeatNo"];
						$cnt = 0;
						$str = "";
					}
				}


	//Assign Block to each student
	$sql2="update allocation where Subject='".$sub."' set Block='".$row0["Classroom"]."'";
	$res=mysqli_query($conn,$sql2);
	//echo mysqli_num_rows($res);
	array_push($list1,$str);
	//Allocate Staff
	$row7 = mysqli_fetch_assoc($result7);
	$teacher = $row7["Name"];
	//InsertStartSeatNo
	$sql6 = "insert into seatarrangement values('".$row0["Classroom"]."','".$min."','".$max."','".$teacher."',".$c.")";
	$result6 = mysqli_query($conn,$sql6);

	$_SESSION["list1"] = $list1 ;
	echo "<body><center><br><br><h2 style='color:white';>Seats Allocated Successfully</h2></center></body>";
}
else
{
echo "0 results";
}


mysqli_close($conn);
?>
