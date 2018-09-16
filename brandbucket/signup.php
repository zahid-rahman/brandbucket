<html>
   
   <head>
		<title>user registration form</title>

 
        
		
		<style >
		.page-wrap{
   				height: 1000px;
   				width:1350px;

		}

		    body{

		    	//background: rgb(191, 191, 191);
		    	//background: url("d.jpg");
		    	//color: white;
				background-repeat:no-repeat;
				background-size: 1500px 1000px;
		    }                
			
     		.header{

     			text-align: center;
     			font-family: century gothic;
     		}
     		.form{
					
				font-family: century gothic;
				margin: 62px 374px 27px 354px;
				padding: 75px 2px 62px 23px;
				//background: rgb(115, 115, 115);
				background-opacity : 0;
				border-style:solid;
				//border-color:white;
				border-size:4px;
				
				border-radius:15px;
				background-attachment:fixed;

				


     		}
			
			
			
			input[type=text]{
			    border-radius:5px;  
			}
			input[type=password]{
			    border-radius:5px;  
			}
			textarea{
			   border-radius:5px; 
			}
			select{
			
			  border-radius:5px; 
			}
			.passcheck{
				cursor: pointer;
			}
			 .buttons{

            display:inline block;
            color: #fff;
            background-color:rgb(49, 126, 249);
            border-color: #985f0d;
            padding:6px 12px;
            font-size: 14px;
            border:none;
            border-radius: 5px;
            cursor:pointer;

        }

        .buttons:hover{
             background-color: rgb(34, 94, 191);
        }
		</style>

   </head>

   <body>
   
    <script type="text/javascript">
	   
	        function validateRegistration(){
				flag=true;
				if(document.forms[0].elements[0].value.length==0){
					alert("you must type your full name");
					flag=false;
				}
				else if(document.forms[0].elements[1].value.length==0){
					alert("you must type username");
					flag=false;
				}
				else if(document.forms[0].elements[2].value.length==0){
					alert("you must select date ");
					flag=false;
				}
				else if(document.forms[0].elements[3].value.length==0){
					alert("you must select month");
					flag=false;
				}
				else if(document.forms[0].elements[4].value.length==0){
					alert("you must select year ");
					flag=false;
				}
				else if(document.forms[0].elements[5].checked==false && document.forms[0].elements[6].checked==false){
					alert("you must select gender ");
					flag=false;
				}
				
				else if(document.forms[0].elements[7].value.length==0){
					alert("you must confirm your email ");
					flag=false;
				}
				else if(document.forms[0].elements[8].value.length==0){
					alert("you must confirm your mobile number ");
					flag=false;
				}
				else if(document.forms[0].elements[9].value.length==0){
					alert("you must confirm your address ");
					flag=false;
				}
				else if(document.forms[0].elements[10].value.length==0){
					alert("you must enter password ");
					flag=false;
				}
				else if(document.forms[0].elements[10].value.length==0){
					alert("confirm your password ");
					flag=false;
				}
				
	
				return flag;
            }
	   
	   
	   
	   </script>
	     

       <div class="page-wrap"> 
       	    <div class="header">
            <h1>User Registration Form</h1>
	    </div>

	   

	    <div class = "form" align="center">
	    	


		<form action="reg_server.php" method="post">

					  <table cellpadding="10px">

						<!--first name -->
						
						<tr>
							<td>Customer name<br>
								
							<td><input type="text" name="cname" placeholder="Full name"></td>
							
						</tr>

						


						<!--last name -->
						<tr>
							<td>Username</td>
							<td><input type="text" name="uname" placeholder="User-name"></td>
							
						</tr>
		                
		                <!--date o birth-->

						<tr>
							<td>DOB(data of birth)</td>
							<td>
								<!--date-->
								<select name="date">
									
									<option name="00"></option>
									<option name="01">1</option>
									<option name="02">2</option>
									<option name="03">3</option>
									<option name="04">4</option>
									<option name="05">5</option>
									<option name="06">6</option>
									<option name="07">7</option>



								</select>
								<!--month-->
								<select name="month">
									
									<option name="00"></option>
									<option name="jan">jan</option>
									<option name="feb">feb</option>
									<option name="mar">mar</option>
									<option name="apr">apr</option>
									<option name="may">may</option>
									<option name="jun">jun</option>
									<option name="jul">jul</option>
									<option name="aug">aug</option>
									<option name="sep">sep</option>
									<option name="oct">oct</option>
									<option name="nov">nov</option>
									<option name="dec">dec</option>




								</select>
								<!--year-->
								<select name="year">
									
									<option name="00"></option>
									<option name="2010">2010</option>
									<option name="2011">2011</option>
									<option name="2012">2012</option>
									<option name="2013">2013</option>
									<option name="2014">2014</option>
									<option name="2015">2015</option>
									<option name="2016">2016</option>



								</select>
							</td>
						

						</tr>
						
						<!--gender-->
						<tr>
							<td>Gender</td>
							<td>
							    <input type="radio"  value="male" name="gender"> Male
								<input type="radio" value="female" name ="gender"> Female	
							</td>
				
						</tr>

						<!--email -->

						<tr>
							<td>Email</td>
							<td><input type="text" name="email" placeholder="example@gmail.com"></td>
							
						</tr>


						<!--phone number  -->

						<tr>
							<td>mobile number</td>
							<td><input type="text" name="phone" placeholder="01**-*******"></td>
							
						</tr>

						<!--address -->

						<tr>
							<td>address</td>
							<td><textarea name="address" placeholder="present address"></textarea></td>
							
						</tr>

						
						<!--password -->

						<tr>
							<td>password</td>
							<td><input type="password" name="password" placeholder="enter password" id="myInput"></td>
							<td><img class="passcheck" src="img/eye.PNG" onclick="myFunction()"></td>
							
						</tr>

						<!--confirm password -->

						<tr>
							<td>confirm password</td>
							<td><input type="password" name="conf_pass" placeholder="confirm password" id="pass"></td>
							
						</tr>
						<!--submit -->

						<tr>
							
							<td><input type="submit" onclick="return validateRegistration();" value="submit" class="buttons" name="submit"></td>
							
						</tr>

					</table>


		</form>
        
        <!--visible password-->
        <script>
			function myFunction() {
			    var x = document.getElementById("myInput");
			    if (x.type == "password") {
			        x.type = "text";
			    } else {
			        x.type = "password";
			    }
			}
		</script>

			
	    </div>


       </div>
       <?php 
			if(isset($_REQUEST["signuperror"])){
				echo "<script>alert('".$_REQUEST["signuperror"]."');</script>";
		
			}
	    ?>



	   

   </body>

</html>