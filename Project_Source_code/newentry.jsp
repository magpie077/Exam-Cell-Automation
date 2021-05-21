<%@page import="java.sql.*,java.io.*"%>
<!DOCTYPE HTML>
<html>
	<%!
		String fname,lname, prn, dept,pass;
		int cur_sem, pattern, roll, flag=0;
		String connectionURL = "jdbc:mysql://localhost:3306/ExamArrangement";
		Connection connection = null;
		Statement statement = null;
		ResultSet rs = null;
		String QueryString;
	%>
	<%
		try{
			Class.forName("com.mysql.jdbc.Driver").newInstance();
			connection = DriverManager.getConnection(connectionURL, "shounak", "shounak");
			statement = connection.createStatement();
			
			fname=request.getParameter("xfname");
			lname=request.getParameter("xlname");
			prn=request.getParameter("xprn");
			dept=request.getParameter("xdept");
			pass=request.getParameter("xpassword");
			cur_sem=Integer.parseInt(request.getParameter("xsemester"));
			pattern=Integer.parseInt(request.getParameter("xpattern"));
			QueryString="select * from Students where prn='"+prn+"'";
			rs=statement.executeQuery(QueryString);
			if(rs.next())
			{
				out.println("<h2>PRN already registered!</h2>");
				out.println("<a href='http://localhost:8080/demo/form1.htm'>Try again!</a>");
			}
			else{
				QueryString= "select roll from Students where cur_sem='"+cur_sem+"'";
				rs=statement.executeQuery(QueryString);
				while(rs.next())
					roll=Integer.parseInt(rs.getString(1));
				roll=roll+1;
				QueryString="insert into Students(prn,fname,lname,cur_sem,pattern,department,password,roll) values('"+prn+"','"+fname+"','"+lname+"',"+cur_sem+","+pattern+",'"+dept+"','"+pass+"',"+roll+")";
				statement.executeUpdate(QueryString);
				out.println("<h2>Registered successfully!</h2>");
				out.println("<h3>Your Roll number is: "+roll+"</h3>");
				out.println("<h3>Your Password is: "+pass+"</h3>");
				out.println("<a href='http://localhost:8080/demo/signin.htm'>Go to Sign-in!</a>");
			}
		}catch(Exception e){
			out.print(e);
		}
	%>
</html>
