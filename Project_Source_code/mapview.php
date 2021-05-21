<?php
include "connect.php";
$sql1 = "SELECT Block FROM seatarrangement";
$result1= mysqli_query($conn,$sql1);


	while($row1 = mysqli_fetch_assoc($result1))
	{		
		$r= $row1['Block'];
		echo "<p style='color:white;'>BLOCK ".$r."</p><br>";
	}

?>
