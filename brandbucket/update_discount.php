<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql

if (isset($_REQUEST['dis_rate']) && $_REQUEST['days'] && $_REQUEST['status']=='on') {
	 $update_customer = "UPDATE discount SET discount_rate = ".$_REQUEST['dis_rate'].", status ='".$_REQUEST['status']."', days =".$_REQUEST['days']." where product_id =".$_REQUEST['pid'].";";

 	$result = mysqli_query($conn, $update_customer)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?dis_up=discount update done successfully!!");
} else {
	$update_customer = "UPDATE discount SET discount_rate = 0, status ='".$_REQUEST['status']."', days = 0 where product_id =".$_REQUEST['pid'].";";

 	$result = mysqli_query($conn, $update_customer)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?dis_up=discount update done successfully!!");
}


  

?>