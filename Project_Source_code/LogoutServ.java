import java.io.IOException;  
import java.io.PrintWriter;  
import javax.servlet.ServletException;  
import javax.servlet.http.Cookie;  
import javax.servlet.http.HttpServlet;  
import javax.servlet.http.HttpServletRequest;  
import javax.servlet.http.HttpServletResponse;  
public class LogoutServ extends HttpServlet {  
    protected void doGet(HttpServletRequest request, HttpServletResponse response)  
                        throws ServletException, IOException {
        int i,flag=0; 
        response.setContentType("text/html");  
        PrintWriter out=response.getWriter();  
        Cookie cks[]=request.getCookies();
        for(i=0;i<cks.length;i++){  
		if(cks[i].getName().equals("roll")){
			flag=1;
			break;
		}
	} 
        if(flag==1){
		  
		Cookie ck=new Cookie("roll","");  
		ck.setMaxAge(0);
		response.addCookie(ck);
		response.sendRedirect("http://localhost:8080/demo/check.htm");
        }
        else{
        	response.sendRedirect("http://localhost:8080/demo/check.htm"); 
        }
    }  
}  
