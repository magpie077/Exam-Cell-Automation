<?php
include "connect.php";
$sql1 = "SELECT * FROM seatarrangement";
$result1= mysqli_query($conn,$sql1);
echo "<table id='tab1'border='1' style='color:black;'>
<tr>
<th>Block</th>
<th>Start</th>
<th>End</th>
<th>Staff</th>
</tr>";
if(mysqli_num_rows($result1)>0)
{
while($row1 = mysqli_fetch_assoc($result1))
{
	echo "<tr>";
	echo "<td>" . $row1['Block'] . "</td>";
	echo "<td>" . $row1['StartSeat'] . "</td>";
	echo "<td>" . $row1['EndSeat'] . "</td>";
	echo "<td>" . $row1['Staff'] . "</td>";
	echo "</tr>";
}
}
echo "</table>";
?>
