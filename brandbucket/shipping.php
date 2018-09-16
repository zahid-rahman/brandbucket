
<?php 

  session_start();
  

  $conn = mysqli_connect("localhost", "root", "", "brandbucket");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error($conn));
	}

        //$product_id=0;
        //$customer_id=0;
        //$payment=0;
        //$quantity=0;
				
    $pro_path = $_SERVER['HTTP_REFERER'];
    
    $cart = "SELECT * from cart,product where product.product_id = cart.product_id and cust_id= ".$_SESSION['customer_id'];

    $result = mysqli_query($conn, $cart)or die(mysqli_error($conn));
      
      
        $t=time();
        //echo($t . "<br>");
        //echo(date("Y-m-d",$t));

        $delivery_date = date('Y-m-d', strtotime("+7 days"));
        $order_date=date("Y-m-d",$t);

        while($row = mysqli_fetch_assoc($result)) { 
          
              $product_id = $row['product_id'];
              //$customer_id= $row['cust_id'];
              $payment = $row['total_price'];
              $quantity=$row['quantity']; 
              $pro_name = $row['product_name'];

         if($row['product_quantity'] > $quantity){

                $sql="INSERT INTO shipping VALUES (NULL,".$product_id.",".$_SESSION['customer_id'].",'".$delivery_date."','".$order_date."',".$payment.",".$quantity.")";

              if(mysqli_query($conn, $sql)){


                    

                       $final_quantity = $_SESSION['pro_quantity'] - $quantity;
   
        
                      $update_quantity = "UPDATE product SET product_quantity =".$final_quantity." where product_id =".$_SESSION['pro_id'].";";


                        $res = mysqli_query($conn, $update_quantity)or die(mysqli_error($conn));
                   }
                    
                    
                $delete_cart = "DELETE from cart where cust_id =".$_SESSION['customer_id'].";";

                $findresult = mysqli_query($conn, $delete_cart)or die(mysqli_error($conn));


                mysqli_close($conn);
                         
                 
                 $_SESSION['m_coount'] = 0;        
                 header("Location:$pro_path?suc=orderd successfully&counter=$count");


              
                
              }
               else{

                      //  echo "<script>alert('product not avaliable')</script>";
                header("Location:$pro_path?a=$pro_name is not avaliable");
               }

              

            }


        


         
        


 ?>
