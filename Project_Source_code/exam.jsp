<%@page import="java.sql.*,java.io.*"%>
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
	<BODY>
		<div class="tab">
		  <button class="tablinks" onclick="#">Home</button>
		  <button class="tablinks" onclick="#">Profile</button>
		  <button class="tablinks" onclick="#">Time-Table</button>
		  <a href="http://localhost:8080/demo/logoutmng.jsp" style="float: right;">Sign-out</a>
		</div>
		<%!
			String fname,lname, seat, dept,pass,roll;
			int cur_sem, pattern,selected_sem,flag=0,subnum=0;
			String connectionURL = "jdbc:mysql://localhost:3306/ExamArrangement";
			Connection connection = null;
			Statement statement = null;
			ResultSet rs = null;
			String table;
			String display="true",msg,ssn;
		%>
		<% response.setHeader("Cache-Control","no-cache"); //HTTP 1.1 
		 response.setHeader("Pragma","no-cache"); //HTTP 1.0 
		 response.setDateHeader ("Expires", 0); //prevents caching at the proxy server  
		%>
		<%
			ssn=request.getParameter("session");
			Cookie cookie = null;
			Cookie[] cookies = null;
		 
			 // Get an array of Cookies associated with the this domain
			 cookies = request.getCookies();
			    for (int i = 0; i < cookies.length; i++) {
			       cookie = cookies[i];
			       
			       if((cookie.getName( )).compareTo("roll") == 0 ) {
				  break;
			       }
			    }
			try{
				if(ssn.compareTo("yes")!=0)
				{
					response.sendRedirect("http://localhost:8080/demo/signin.htm");
				}
				Class.forName("com.mysql.jdbc.Driver").newInstance();
				connection = DriverManager.getConnection(connectionURL, "shounak", "shounak");
				statement = connection.createStatement();
				String password=request.getParameter("pass");
				roll=request.getParameter("roll");
				String QueryString = "select fname,lname,roll,cur_sem,pattern,department,password from Students where roll='"+roll+"'";
				rs=statement.executeQuery(QueryString);
				if(rs.next() && (cookie.getValue()).compareTo("123") == 0)
				{
					if(password.equals(rs.getString(7)))
					{
						fname=rs.getString(1);
						lname=rs.getString(2);
						seat=rs.getString(3);
						cur_sem=rs.getInt(4);
						pattern=rs.getInt(5);
						dept=rs.getString(6);
						cookie = new Cookie("roll",seat);
						cookie.setMaxAge(60*60*24);
						response.addCookie(cookie);
					}
					else{
						response.sendRedirect("http://localhost:8080/demo/signin.htm");
					}
				}
				else{
					response.sendRedirect("http://localhost:8080/demo/signin.htm");
				}
			}catch(Exception e){
				out.print(e);
			}
		%>
		<H1 STYLE="text-align:center;">Exam Application</H1>
		<table id="app_form" ALIGN="CENTER" style="border: 1px solid black;">
			<tr>
				<td>Name</th>
				<td><%=fname+" "+lname%></th>
			</tr>
			<tr>
				<td>Seat number</td>
				<td><%=seat%></td>
				
			</tr>
			<tr>
				<td>Current Semester</td>
				<td><%=cur_sem%></td>
				
			</tr>
			<tr>
				<td>Pattern</td>
				<td><%=pattern%></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><%=dept%></td>
			</tr>
		</table>
		<BR><BR>
		
		<%
			String QueryString = "select status from Students where roll="+roll;
			rs=statement.executeQuery(QueryString);
			rs.next();
			if(rs.getInt(1)==1)
			{
				display="none";
				msg="Form already submitted!";
			}
			else{
				msg="Subject List";
				display="inline";
				QueryString = "select * from Subjects where semester="+cur_sem;
				rs=statement.executeQuery(QueryString);
				subnum=1;
				table="<tr><th>Sr.</th><th>Name</th><th>Code</th><th>Select</th></tr>";
				while(rs.next()){
			    	table += "<tr><td>" +subnum+"</td><td>"+rs.getString(2)+"</td><td>"+rs.getInt(1)+"</td><td><input type='checkbox' name='"+cur_sem+"' value='"+rs.getInt(1)+"'></td></tr>";
			    	subnum++;
			  	}
		  	}
		  	/*table+="<tr><td>.</td><td><select id='adsub'><option value='0'>-</option>";
		  	QueryString = "select * from Subjects where semester!="+cur_sem;
			rs=statement.executeQuery(QueryString);
			while(rs.next()){
		    	table +="<option value="+rs.getInt(1)+">"+rs.getString(2)+"</option>";
		  	}
		  	table+="</select></td><td><button type='button' onclick=#>Add</button></td></tr>";
		  	*/
		%>
		<H2 STYLE="text-align:center"><%=msg%></H2>
		<div style="display:<%=display%>">
		
		<form action="http://localhost:8080/demo/Form" method="POST">
		<table id="subjects" ALIGN="CENTER" style="border: 1px solid black;">
			<%=table%>
		</table>
		<br>
			<input type="hidden" name="roll" value='<%=roll%>'>
			<div style="text-align:center"><INPUT TYPE="submit" VALUE="Submit"></div>
			<div style="text-align:center"><input type="reset" value="Reset"></div>
		</form>
		</div>
		<br><br>
	</BODY>
</HTML>
