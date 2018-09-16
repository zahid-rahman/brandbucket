<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql


 $delete_brand = "DELETE from brand where brand_id =".$_REQUEST['bid'].";";

 	$result = mysqli_query($conn, $delete_brand)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?brand_delete=delete brand successfully!!");
  

?>