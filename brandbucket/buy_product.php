
<?php 

  session_start();


  $conn = mysqli_connect("localhost", "root", "", "brandbucket");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error($conn));
	}
				
  $price = $_SESSION['pro_price'];
  $discount= $_SESSION['discount'];
  $quantity = $_REQUEST['max_quan'];

  


  $total_price= ($price * $quantity)-($price * $discount/100);  

if(isset($_SESSION['customer_id']) && isset($_SESSION['user_role'])){



    $cart_load = "select * from cart";
    $result = mysqli_query($conn, $cart_load)or die(mysqli_error($conn));
     $check =0; 
     $counter = -1;
    while($row = mysqli_fetch_assoc($result)) {
           $counter++;
          if($_SESSION['pro_id'] == $row['product_id']){
            $check++;

       

              $quantity_pro=$row['quantity'];

              
             $final_quantity =  $quantity_pro+$quantity;
   
                if($final_quantity > $_SESSION['pro_quantity']){



                  $update_quantity = "UPDATE cart SET quantity =".$final_quantity." where product_id =".$_SESSION['pro_id'].";";

                   $res = mysqli_query($conn, $update_quantity)or die(mysqli_error($conn));

                     $pro_path = $_SERVER['HTTP_REFERER'];

                     header("Location:$pro_path");

                }

       
          }
           
    }

   if($check == 0){
         
         $sql="INSERT INTO cart VALUES (NULL,".$_SESSION['customer_id'].",".$_SESSION['pro_id'].",'".$_SESSION['pro_name']."',".$_REQUEST['max_quan'].",".$_SESSION['pro_price'].",".$_SESSION['discount'].",".$total_price.")";

          if(mysqli_query($conn, $sql)){

            $pro_path = $_SERVER['HTTP_REFERER'];
           
              header("Location:$pro_path&count=$counter");
          }
  

   }



}
else{

  $pro_path = $_SERVER['HTTP_REFERER'];
      header("Location:$pro_path&error_buy=customer log in required");
}
  

 ?>
