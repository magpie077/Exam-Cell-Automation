<!DOCTYPE HTML>
<HTML>
	<head>
		<title>Exam Application</title>
	<STYLE>
		/* Style the tab */
		.tab {
		    overflow: hidden;
		    border: 1px solid #ccc;
		    background-color: #f1f1f1;
		}

		/* Style the buttons inside the tab */
		.tab button {
		    background-color: inherit;
		    float: left;
		    border: none;
		    outline: none;
		    cursor: pointer;
		    padding: 14px 16px;
		    transition: 0.3s;
		    font-size: 17px;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		    background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
		    background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
		    display: none;
		    padding: 6px 12px;
		    border: 1px solid #ccc;
		    border-top: none;
		}
		#app_form{
			border-collapse:collapse;
			width:50%;
		}
		#app_form tr, #pcode td{
			border: 1px solid black;
			padding: 8px;
			background-color:#d6dbdf ;
		}
		#app_form th{
			background-color:#abb2b9 ;
			text-align:left;
			font-weight:bold;		
		}

		#subjects{
			border-collapse:collapse;
			width:50%;
		}
		#subjects tr, #pcode td{
			border: 1px solid black;
			padding: 8px;
			background-color:#d6eaf8 ;
		}
		#subjects th{
			background-color: #aed6f1  ;
			text-align:left;
			font-weight:bold;		
		}
	</STYLE>
	</head>
	<BODY bgcolor="lightgrey">
		<div class="tab">
		  <button class="tablinks" onclick="#">Home</button>
		  <button class="tablinks" onclick="#">Profile</button>
		  <button class="tablinks" onclick="#">Time-Table</button>
		  <a href="http://localhost:8080/demo/logoutmng.jsp" style="float: right;">Sign-out</a>
		</div>
		
		
		<?php
		
			$host='localhost';
			$user='root';
			$password='';
			$dbname='exam_cell';
			
			$con=mysqli_connect($host,$user,$password,$dbname);
			
			$password=$_POST["pass"];
			$roll=$_POST["roll"];
			
			$QueryString = "select fname,lname,roll,cur_sem,pattern,department,password from Students where roll="."$roll";
			$rs=mysqli_query($con,$QueryString);
			
			if($rs->num_rows > 0)
				{
					while($row = $rs->fetch_assoc())
					{
					if($password == $row["password"])
						{
							
							$fname=$row["fname"];
							$lname=$row["lname"];
							$seat=$row["roll"];
							$cur_sem=$row["cur_sem"];
							$pattern=$row["pattern"];
							$dept=$row["department"];
						}
						
					
					else
					{
						header("Location:http://localhost:8084/demo/signin.htm");
						die();
					}
					}
				}
				else
				{
					header("Location:http://localhost:8084/demo/signin.htm");
					die();
				}
			?>
		<H1 STYLE="text-align:center;">Exam Application</H1>
		<table id="app_form" ALIGN="CENTER" style={border: 1px solid black; cellpadding=8px}>
			<tr>
				<td>Name</th>
				<td><?php echo "$fname"." ".$lname ?></th>
			</tr>
			<tr>
				<td>Seat number</td>
				<td><?php echo "$seat" ?></td>
				
			</tr>
			<tr>
				<td>Current Semester</td>
				<td><?php echo "$cur_sem" ?></td>
				
			</tr>
			<tr>
				<td>Pattern</td>
				<td><?php echo "$pattern" ?></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><?php echo "$dept" ?></td>
			</tr>
		</table>
		<BR><BR>
		<?php
			$QueryString1 = "select status from Students where roll="."$roll";
			$rs=mysqli_query($con,$QueryString1);
			
			
			if($rs->num_rows > 0)
			{
				while($row = $rs->fetch_assoc())
				{
					if(1 == $row["status"])
					{
						$display="none";
						$msg="Form already submitted!";
					}

					else
					{
						$msg="Subject List";
						$display="inline";
					}
				}
			}
		?>
						
		<H2 STYLE="text-align:center"><?php echo "$msg" ?></H2>
		<div style="display:<?php echo "$display" ?>">
		
		<form action="http://localhost:8084/demo/form.php" method="POST">
		<table id="subjects" ALIGN="CENTER" style="border: 1px solid black;">
		<?php
			$QueryString1 = "select status from Students where roll="."$roll";
			$rs=mysqli_query($con,$QueryString1);
			
			
			if($rs->num_rows > 0)
			{
				while($row = $rs->fetch_assoc())
				{
					if(1 == $row["status"])
					{
						$display="none";
						$msg="Form already submitted!";
					}

					else
					{
						$msg="Subject List";
						$display="inline";
						$QueryString2 = "select name,code from Subjects where semester="."$cur_sem";
						$rs2=mysqli_query($con,$QueryString2);

						$subnum=1;
						echo "<tr><th>Sr.</th><th>Name</th><th>Code</th><th>Select</th></tr>";
						if($rs2->num_rows > 0)
						{
							while($row = $rs2->fetch_assoc())
							{
								echo "<tr><td>"."$subnum"."</td>";
								echo "<td>".$row["name"]."</td>";
								echo "<td>".$row["code"]."</td>";
								echo "<td><input type='checkbox' name='"."$subnum"."' value='".$row["code"]."'</td></tr>";
								$subnum++;
							}
						}
					}
				}				
			}
		  	
		?>
		</table>
		<br>
			<input type="hidden" name="roll" value='<?php echo "$roll" ?>'>
			<div style="text-align:center"><INPUT TYPE="submit" VALUE="Submit"></div>
			<div style="text-align:center"><input type="reset" value="Reset"></div>
		</form>
		</div>
		<br><br>

		

	</BODY>
</HTML>