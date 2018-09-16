<?php 
  
	if (isset($_REQUEST['submit'])) {
			$name = $_REQUEST['name'];
			$email = $_REQUEST['email'];
			$msg = $_REQUEST['feedback_messege']; 


			$to = $email;
			$from = "jahidrahmanragib@gmail.com";
			$subject='Form Submission';
			$message = "Name :".$name."\n"."Email :".$email."\n"."Wrote to following :"."\n\n".$msg;

			$headers = "From :".$from;

			if(mail($to,$subject,$message,$headers)){
				echo "Succesfully sent to ".$name;
			}
			else{
				echo "mail error";
			}

	}


?>