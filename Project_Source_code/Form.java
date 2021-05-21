// Import required java libraries
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;
import java.util.*;
// Extend HttpServlet class
public class Form extends HttpServlet {
 
	String connectionURL = "jdbc:mysql://localhost:3306/ExamArrangement";
	Connection connection = null;
	Statement statement = null;
	ResultSet rs = null;

   public void init() throws ServletException {
      // Do required initialization
	try{
		Class.forName("com.mysql.jdbc.Driver").newInstance();
		connection = DriverManager.getConnection(connectionURL, "shounak", "shounak");
		statement = connection.createStatement();
		}catch(Exception e){
		
		}    
   }
	public void service(HttpServletRequest req, HttpServletResponse res) throws IOException,ServletException
	{
		doPost(req,res);
	}
	public void doPost(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {
      
		try{			
			response.setContentType("text/html");

			PrintWriter out = response.getWriter();
			out.println("<h1>Selected Subjects</h1><div>");
			int roll = request.getParameter("roll");
			Map<String, String[]> parameterMap = request.getParameterMap();
			for (String key: parameterMap.keySet()) {
			    if (key.equals("6")) {
			    	String subs[]=parameterMap.get(key);
			    	for(int i=0;i<subs.length;i++){
			    		String QueryString;
			    		QueryString = "update Students set status=1 where roll="+roll;
			    		QueryString = "select name from Subjects where code='"+subs[i]+"'";
					rs=statement.executeQuery(QueryString);
					rs.next();
			    		out.println("<li>" +rs.getString(1)+ "</li>");
			    	}
 			    }
			}
			out.println("</div>");	
		}catch(Exception e){
		
		}
   }

   public void destroy() {
      // do nothing.
   }
}
