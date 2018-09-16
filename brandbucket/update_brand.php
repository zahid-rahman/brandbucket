<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  

 $update_customer = "UPDATE brand SET brand_id = ".$_REQUEST['bid'].", brand_name ='".$_REQUEST['bname']."'where brand_id =".$_REQUEST['bid'].";";

 	$result = mysqli_query($conn, $update_customer)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?brand_up=brand update done successfully!!");
  

?>