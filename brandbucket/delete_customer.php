<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql


 $update_customer = "DELETE from dashboard where cust_id =".$_REQUEST['cid'].";";

 	$result = mysqli_query($conn, $update_customer)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?cust_delete=delete customer successfully!!");
  

?>