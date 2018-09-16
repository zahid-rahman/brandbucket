<!DOCTYPE html>
<html>
<head>
	<title>log in form</title>
	<style type="text/css">
		
		.container{

			/*text-align: center;
			font-family: inherit;
			margin: 191px 4px 3px 22px;
			border:1px solid black;*/
			font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			border:1px solid black;
			width: 30%;
			height:300px;
			margin: auto;
			margin-top: 170px;
			text-align: center;
			padding: 20px;
			border-radius: 10px;
		}
		span{
			font-size: 12px;
		}
		
		input[type="text"] {
			padding: 8px;
			border-radius: 5px;
			border-style: solid;
			border-width: 1px;
			font-size: 15px;
		}

		input[type="password"] {
			padding: 8px;
			border-radius: 5px;
			border-style: solid;
			border-width: 1px;
			font-size: 15px;	
		}

		input[type="submit"] {
			border: 1px solid rgb(66, 143, 244);
			background: rgb(66, 143, 244);
			color:white;
			border-radius: 6px;
			font-size: 15px;
			padding: 8px 18px 8px 18px;
			text-decoration-line: none;
		}

		input[type="submit"]:hover {
			background-color: rgb(65, 98, 244);
			color: white;
			cursor: pointer;
		}
		

		/*.sign_up {
			border: 1px solid rgb(66, 143, 244);
			background: rgb(66, 143, 244);
			color:white;
			border-radius: 6px;
			font-size: 15px;
			padding: 8px 18px 8px 18px;
			text-decoration: none;
		} 
		
		.sign_up:hover {
			text-decoration: none;
			background-color: rgb(65, 98, 244);
			color: white;
			cursor: pointer;
		}*/

		a {
			text-decoration-line: none;
		}

		a:hover {
			text-decoration-line: underline;
		}
	</style>
	<script>
	             			
                           function validate(){
							    var flag=true;
								
								var m = document.getElementById("msg1");
								var n = document.getElementById("msg2");
								
								
								if(document.fm.username.value.length == 0){
									document.fm.username.focus();
									m.style.color="red";
									
									m.innerHTML="* enter username";
									flag=false;
								}
								else if(document.fm.username.value.length > 0){
    								m.innerHTML = "";	
								}
								if(document.fm.pass.value.length == 0){
									document.fm.pass.focus();
									n.style.color="red";
									
									n.innerHTML="* enter password";
									flag=false;
								}

								else if(document.fm.pass.value.length > 0){
    								n.innerHTML = "";	
								}

							
								return flag;
		                        }

	             		</script>
</head>
<body>

     <div class="container">
     	  <form action="loginserver.php" method="post" name="fm">
	 	
			 	<h1>login</h1>
		
			 	<input type="text" name="username" placeholder="username" size="30">
			 	 <br/>
			 		<span id="msg1"></span>
			 	<br/>
	
			 
			 
			 	<input type="password" name="pass" placeholder="password" size="30">
			 	 <br/>
			 	 <span id="msg2"></span> 	
			 	<br/>
			
			
			 	<input type="submit" value="Log in" onclick="return validate();" name="sub">
			 	<br>
			 	<br>
				<a href="signup.php" class="sign_up">Sign Up</a>
			 
			 	<br>

			 	<br>
				<a href="forgot_pass.php">Forgot password</a>

	      </form>
     </div>
</body>
</html>
<?php 

if(isset($_REQUEST["error"])){
	echo "<script>alert('".$_REQUEST["error"]."');</script>";
	//echo "<h2>".$_REQUEST["error"]."</h2>";
	
}

?>