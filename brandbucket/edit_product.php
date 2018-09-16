<?php 
  session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <style>
          #pro_id,#pro_name,#pro_quan,#price,#brand_id,#cat_id,#pro_desc{
            display: block;
            width: 70%;
            height: 20px;
            padding: 15px 12px;
            margin:8px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;

          }
          #pro_desc{
             
             height:30px;
             width:100%; 

          }
     </style>

</head>
<body>


   


	<div class="container" align="center">
			
       <h2>Edit Product information </h2>

          <?php 
                
                 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }

                     $sql = "SELECT * FROM product,brand where product.brand_id = brand.brand_id and product_id = ".$_REQUEST['pid'].";";

                         $res = mysqli_query($conn, $sql)or die(mysqli_error($conn));

                         while($row = mysqli_fetch_assoc($res)) {



              ?>
			
        <form action="update_product.php?pid=<?php echo $row['product_id'];?>&brand_name=<?php echo $row['brand_name'];?>" method="post">

             
        	  <table>

                  <tr>
                    <th>product id </th>
                      
                    <td><input type="text" name="pid" id="pro_id" placeholder="Full name" value="<?php echo $row['product_id'] ?>" disabled>

                    </td>
              
                </tr>


                <tr>
                    <th>product name </th>
                      
                    <td><input type="text" name="pname" id="pro_name" placeholder="Full name" value="<?php echo $row['product_name'] ?>">

                    </td>
              
                </tr>



                <tr>
                    <th>product quantity </th>
                      
                    <td><input type="text" name="pquantity" id="pro_quan" placeholder="Full name" value="<?php echo $row['product_quantity'] ?>">

                    </td>
              
                </tr>
                
                 <tr>
                    <th>price </th>
                      
                    <td><input type="text" name="price" id="price" placeholder="Full name" value="<?php echo $row['price'] ?>">

                    </td>
              
                </tr>

                 <tr>
                    <th>Brand id </th>
                      
                    <td><input type="text" name="brand_id" id="brand_id" placeholder="Full name" value="<?php echo $row['brand_id'] ?>">

                    </td>
              
                </tr>


                 <tr>
                    <th>category id </th>
                      
                    <td><input type="text" name="brand_id" id="cat_id" placeholder="Full name" value="<?php echo $row['category_id'] ?>">

                    </td>
              
                </tr>

                  <tr>
                    <th>Product description </th>
                      
                    <td><input type="text" name="p_desc" id="pro_desc" placeholder="Full name" value="<?php echo $row['product_description'];?>">

                    </td>
       
                </tr>

     	         <tr>
     	         	<td><input type="submit" name="sbt" class="btn btn-primary"></td>
     	         </tr>

     		 </table>
       
        </form>

          <?php }
                    mysqli_close($conn);

                 ?>

	</div>

</body>
</html>