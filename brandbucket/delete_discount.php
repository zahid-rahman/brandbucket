
<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql


 $delete_brand = "DELETE from discount where product_id =".$_REQUEST['pid'].";";

 	$result = mysqli_query($conn, $delete_brand)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?dis_delete=delete discount successfully!!");
  

?>