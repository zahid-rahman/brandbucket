<?php
session_start();


 

 function password(){
 	 $conn = mysqli_connect("localhost", "root", "","brandbucket");
   
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

     $dashboard = "select * from dashboard where cust_id=".$_SESSION['customer_id'];
     
    $check = mysqli_query($conn, $dashboard)or die(mysqli_error());

     $c=0;
     while($row =  mysqli_fetch_assoc($check)){
          if($_REQUEST['old_pass'] == $row['password'] ){
          	$c++;
	    	$pass= "UPDATE dashboard SET password = '".$_REQUEST['new_pass']."' where cust_id =".$_SESSION['customer_id'];

			$res = mysqli_query($conn, $pass)or die(mysqli_error($conn));
			mysqli_close($conn);

			//header("Location:profile.php?id=settings&settings_pass=password changed");
           }


     }
     if($c == 0){
          // header("Location:profile.php?id=settings&error_pass_up=password not changed");
     }

   
     
 } 

 function email(){
 	 $conn = mysqli_connect("localhost", "root", "","brandbucket");
   
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 		$email = "UPDATE dashboard SET email = '".$_REQUEST['new_email']."' where cust_id =".$_SESSION['customer_id'];
		$result = mysqli_query($conn, $email)or die(mysqli_error($conn));
		mysqli_close($conn);
 }
	

function address(){
	 $conn = mysqli_connect("localhost", "root", "","brandbucket");
   
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
  
		$address = "UPDATE dashboard SET address = '".$_REQUEST['new_address']."' where cust_id =".$_SESSION['customer_id'];
		$result = mysqli_query($conn, $address)or die(mysqli_error($conn));
		mysqli_close($conn);

}
	


	
if(isset($_REQUEST['new_pass']) && strlen($_REQUEST['new_pass'])>0  ){
   
   password();
   
   	   header("Location:profile.php?id=settingssettings_pass=password changed");
  
}
else if(isset($_REQUEST['new_email']) && strlen($_REQUEST['new_email'])>0){
   
   email();
    header("Location:profile.php?id=settings&settings_email=email changed");

}
else if(isset($_REQUEST['new_address']) && strlen($_REQUEST['new_address'])>0){
   address();
    header("Location:profile.php?id=settings&settings_address=address changed");
}



?>