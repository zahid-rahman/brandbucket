<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql


 $update_category = "UPDATE category SET category_name ='".$_REQUEST['c_name']."' where category_id =".$_REQUEST['cat_id'].";";

 	$result = mysqli_query($conn, $update_category)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?cat_up= update category successfully!!");
  

?>