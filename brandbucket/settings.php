<!DOCTYPE html>
<html>

<head>
	 
	 <title>settings</title>
     <style type="text/css">
     	
         input[type="text"]{
         	border:1px solid black;
         	border-radius: 5px;
         	margin:5px;
         	padding:7px 5px 8px 10px;
         } 
         input[type="submit"]{
         	margin:0px 0px 0px 0px;
         	padding: 8px 15px 10px 15px;
         	border:none;
         	border-radius: 5px;
         	background: rgb(73, 65, 244);
         	color:white;
         }
         input[type="submit"]:hover{
            background:  rgb(65,143, 244);
         }


     </style>
    <script>               function validate2(){

                                 var flag2=true;
                                
                                var o = document.getElementById("msg3");

                                 if(document.fm.new_email.value.length == 0){
                                    document.fm.new_email.focus();
                                    o.style.color="red";
                                    
                                    o.innerHTML="* please submit your email";
                                    flag2=false;
                                }


                                else if(document.fm.new_email.value.length > 0){
                                    o.innerHTML = "";   
                                }
                                
                                 return flag2;
                               

                             }

                              function validate3(){

                                var flag3=true;
                                
                                var p = document.getElementById("msg4");

                                 if(document.fm.new_address.value.length == 0){
                                    document.fm.new_address.focus();
                                    p.style.color="red";
                                    
                                    p.innerHTML="* please submit your address";
                                    flag3=false;
                                }
                                else if(document.fm.new_address.value.length > 0){
                                    p.innerHTML = "";   
                                }
                                
                                 return flag3;

                             }
                            
                           function validate1(){
                                var flag=true;
                                
                                var m = document.getElementById("msg1");
                                var n = document.getElementById("msg2");
                               

                                //------------------------------------------
                                
                                if(document.fm.old_pass.value.length == 0){
                                    document.fm.old_pass.focus();
                                    m.style.color="red";
                                    
                                    m.innerHTML="* enter your old password";
                                    flag=false;
                                }
                                else if(document.fm.new_pass.value.length > 0){
                                    m.innerHTML = "";   
                                }
                                if(document.fm.new_pass.value.length == 0){
                                    document.fm.new_pass.focus();
                                    n.style.color="red";
                                    
                                    n.innerHTML="*  enter your new password";
                                    flag=false;
                                }

                                else if(document.fm.new_pass.value.length > 0){
                                    n.innerHTML = "";   
                                }

                               //----------------------

                              
                                //------------------

                            
                                return flag;
                                }

                        </script>
</head>
<body>
<form action="update_settings.php" method ="post" name="fm">
	
<div class="reset_pass">
		<h3>Reset password</h3>
		<input type="checkbox" onclick="reset_pass()">
		<input type="text" name = "old_pass" id="old1" placeholder="old password" disabled="disabled" size="40">
        <span id="msg1"></span>
		<input type="text" name = "new_pass" id="new1" placeholder= "new password" disabled="disabled" size="40">
        <span id="msg2"></span>
		<input type="submit" name="sbt" value = "send request" onclick="return validate1();">

</div>


<div class="reset_email">
		<h3>change email</h3>
		<input type="checkbox" onclick="change_email()">
		<input type="text" name="new_email" id="old2" placeholder="new email" disabled="disabled" size="40">	
        <span id="msg3"></span>
		<input type="submit" name="sbt" value = "send request" onclick="return validate2();">

</div>

<div class="reset_address">
		<h3>change address</h3>
		<input type="checkbox" onclick="change_address()">
		<input type="text" name="new_address" id="old3" placeholder="reset address" disabled="disabled"size="40">
        <span id="msg4"></span>	
		<input type="submit" name="sbt" value = "send request" onclick="return validate3();">

</div>





</form>



<script>
function reset_pass() {
    document.getElementById("old1").disabled = false;
     document.getElementById("new1").disabled = false; 

}

function change_email() {
    document.getElementById("old2").disabled = false;
     document.getElementById("new2").disabled = false; 
}

function change_address() {
    document.getElementById("old3").disabled = false;
     document.getElementById("new3").disabled = false; 
}
</script>

</body>
</html>
