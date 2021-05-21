<!DOCTYPE HTML>
<HTML>
	<body>
	      <%
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
			    cookie = new Cookie("roll","123");
			    cookie.setMaxAge(0);
			    response.addCookie(cookie);
		    
	      %>
	      <script>
	      	window.location.href = "http://localhost:8080/demo/signin.htm";
	      </script>
	</body>
</HTML>
