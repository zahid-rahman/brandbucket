<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql
$p=$_FILES['pro_img_update']['name'];
$sz=$_FILES['pro_img_update']['size'];

 $update_customer = "UPDATE product SET product_id = ".$_REQUEST['pid'].", product_name ='".$_REQUEST['pname']."',product_quantity ='".$_REQUEST['pquantity']."', price ='".$_REQUEST['price']."', brand_id ='".$_REQUEST['brand_id']."', category_id ='".$_REQUEST['c_id']."', product_description ='".$_REQUEST['p_desc']."' where product_id =".$_REQUEST['pid'].";";

 	$result = mysqli_query($conn, $update_customer)or die(mysqli_error($conn));
		mysqli_close($conn);
		header("Location:admindashboard.php?pro_up=product update done successfully!!");
  

?>