<html>
<head>
	
	<title>forgot password</title>
    <style type="text/css">
	     body{
			font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			font-size: 20px;
	     }
    	 input[type=text]{
    	 	margin:5px;
    	 	border:1px solid black;
    	 	padding:5px;
    	 	border-radius:5px;

    	 }
    	h1{
    	 	margin-top: 40px;
    	 }
    	 .container{
    	 	margin:200px;

    	 }
    	 input[type=submit]{
    	 	margin:5px;
    	 	padding:12px 25px 14px 24px;
    	 	border-radius: 5px;
    	 	
    	 	background:rgb(73, 65, 244);
    	 	color: white;
    	 	border:none;
    	 	cursor: pointer;
    	 }
    	 input[type=submit]:hover{
    	 	background:rgb(65, 143, 244);

    	 }

    </style>

        <script>
                            
                           function validate(){
                                var flag=true;
                                
                                var n = document.getElementById("msg1");
                                var o = document.getElementById("msg2");
                                
                                
                             
                                if(document.fm.username.value.length == 0){
                                    document.fm.username.focus();
                                    n.style.color="red";
                                    
                                    n.innerHTML="* must enter username";
                                    flag=false;
                                }

                                else if(document.fm.username.value.length > 0){
                                    n.innerHTML = "";   
                                }

                               if(document.fm.send_email.value.length == 0){
                                    document.fm.send_email.focus();
                                    o.style.color="red";
                                    
                                    o.innerHTML="* must enter email id";
                                    flag=false;
                                }
                                else if(document.fm.send_email.value.length > 0){
                                    o.innerHTML = "";   
                                }
                            
                                return flag;
                                }

                        </script>    

</head>
<body>


<div class="container" align="center">
	<center><h1>forgot password</h1></center>
	<form action="design.php" method="post" name="fm">
    <table>
    	<tr>
    		<td></td>
    	</tr>
    	 <tr>
    	 	<td>Username</td>
    	 	<td><input type="text" name="username" placeholder="User-name" size="40"></td>
            
            <td><br>
            <span id="msg1"></span></td>
    	 </tr>
    	 <tr>
    	 	<td>Email</td>
    	 	<td><input type="text" name="send_email" placeholder="example@server.com" size="40"></td>
            
            <td><br>
            <span id="msg2"></span></td>
    	 </tr>
		<tr>
    	 	
    	 	<td><input type="submit" name="sub" value ="send" onclick="return validate();"></td>
    	 </tr>
    </table>

</form>


</div>

</body>
</html>