<?php 
   session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// php validation

  
// sql


       

    $delete_cart = "DELETE from cart where cart_id =".$_REQUEST['cart_id'].";";

          $findresult = mysqli_query($conn, $delete_cart)or die(mysqli_error($conn));

 
          mysqli_close($conn);

		$pro_path = $_SERVER['HTTP_REFERER'];
        header("Location:$pro_path");

  

?>