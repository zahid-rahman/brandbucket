<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql


 $update_customer = "UPDATE dashboard SET cust_id = ".$_REQUEST['cid'].", cust_name ='".$_REQUEST['cname']."',username ='".$_REQUEST['user']."', password ='".$_REQUEST['password']."', email ='".$_REQUEST['email']."', phone ='".$_REQUEST['phone']."', dob ='".$_REQUEST['dob']."', address ='".$_REQUEST['address']."', gender ='".$_REQUEST['gen']."' where cust_id =".$_REQUEST['cid'].";";

 	$result = mysqli_query($conn, $update_customer)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?cust_up=update done successfully!!");
  

?>