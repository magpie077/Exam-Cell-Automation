<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div id="myModal" class="modal">
<link type="text/css" rel="stylesheet" href="map.css"/>
  <div class="modal-content">
    <span class="close">&times;</span>
    	<p id="bno">BLOCK</p><br>
    <table>
	<tr>
	<td><button class="seat" id="x11">xx</button></td>
	<td><button class="seat"id="x12">xx</button></td>
	<td><button class="seat"id="x13">xx</button></td>
	<td><button class="seat"id="x14">xx</button></td>
	<td><button class="seat"id="x15">xx</button></td>
	</tr>
	<tr>
	<td><button class="seat"id="x21">xx</button></td>
	<td><button class="seat"id="x22">xx</button></td>
	<td><button class="seat"id="x23">xx</button></td>
	<td><button class="seat"id="x24">xx</button></td>
	<td><button class="seat"id="x25">xx</button></td>
	</tr>
	<tr>
	<td><button class="seat"id="x31">xx</button></td>
	<td><button class="seat"id="x32">xx</button></td>
	<td><button class="seat"id="x33">xx</button></td>
	<td><button class="seat"id="x34">xx</button></td>
	<td><button class="seat"id="x35">xx</button></td>
	</tr>
	<tr>
	<td><button class="seat"id="x41">xx</button></td>
	<td><button class="seat"id="x42">xx</button></td>
	<td><button class="seat"id="x43">xx</button></td>
	<td><button class="seat"id="x44">xx</button></td>
	<td><button class="seat"id="x45">xx</button></td>
	</tr>
	<tr>
	<td><button class="seat"id="x51">xx</button></td>
	<td><button class="seat"id="x52">xx</button></td>
	<td><button class="seat"id="x53">xx</button></td>
	<td><button class="seat"id="x54">xx</button></td>
	<td><button class="seat"id="x55">xx</button></td>
	</tr>
	<tr>
	<td><button class="seat"id="x61">xx</button></td>
	<td><button class="seat"id="x62">xx</button></td>
	<td><button class="seat"id="x63">xx</button></td>
	<td><button class="seat"id="x64">xx</button></td>
	<td><button class="seat"id="x65">xx</button></td>
	</tr>
	</table>
  </div>

</div>
<div id="myModal2" class="modal2">
<div class="modal-content2">
    <span class="close2">&times;</span>
	<p id="st">Seat</p>
</div>
</div>
<?php include "mapview.php"?>
<script>
var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];

function showMap(count,l1,blk) {
   
    var i;
    document.getElementById("bno").innerHTML=blk;
    var seats = ["x11","x21","x31","x41","x51","x61","x12","x22","x32","x42","x52","x62",
"x13","x23","x33","x43","x53","x63","x14","x24","x34","x44","x54","x64","x15","x25","x35","x45","x55","x65"];
   for(i=0;i<30;i++)
    {
	document.getElementById(seats[i]).style.backgroundColor='black';
	document.getElementById(seats[i]).innerHTML="------";
    }
   var ll =l1.split(",");
    for(i=0;i<count;i++)
    {
	stud=document.getElementById(seats[i]);
	stud.style.backgroundColor='#66FCF1';
        
	stud.l
	stud.innerHTML=ll[i];

    }
    modal.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }


}
</script>

</body>
</html>

