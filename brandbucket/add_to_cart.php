<?php 
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<style type="text/css">
		    .form-control{
                 
                 margin-left:138px;

		    }
		    .col-xs-11 ul li{

		    	list-style: none;
		    	display: inline-block;
		    	padding: 5px;
		    }
            div.gallery {
                margin: 5px;
                border: 1px solid #ccc;
                float: left;
                width: 180px;
            }

            div.gallery:hover {
                border: 1px solid #777;
            }

            div.gallery img {
                width: 100%;
                height: auto;
            }

            div.desc {
                padding: 15px;
                text-align: center;
            }
			
			div.total_calc {
				float: right;
			}

	</style>
</head>
<body>

 <!-- navbar -->
<div id="menubar">
	<div class="col-xs-12">
     
         <nav class="navbar navbar-inverse navbar-fixed-top" >
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="design.php"><?php echo "Brand Bucket"; ?></a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			     

			      <ul class="nav navbar-nav navbar-right">


			      	  <!-- <form class="navbar-form navbar-left">
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Search products" size="60">
				        </div>
			        	
			        	<a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></a>
			        </form> -->
			       
			        <ul class="nav navbar-nav navbar-left">
				        <li>
				        	<?php 
                            // $_SESSION['username'];
                             if(isset($_SESSION['username'])){
                             	 echo "<a href=''>".$_SESSION['username']."</a>";
                             	
                             }
                             else{

                             	 echo "<a href='login.php'>Your Account</a>";
                             }


				         ?></a></li>
				         <li><a href="#">need help</a></li>
				         <li>

				          <?php if(isset($_SESSION['username']) && isset($_SESSION['user_role']) &&$_SESSION['user_role']='customer' && isset($_SESSION['count'])){

                                echo "<a href='add_to_cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> add to cart <span style='color:white; background-color:red; border-radius:200%;font-size:13px;margin:5px 5px 5px 5px;padding:3px 7px 3px 6px;'>".$_SESSION['count']."</span></a>";   

                                              


                             }
                             else{
                               echo "<a href='add_to_cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> add to cart</a>";
                             }

                             ?>

                           
				         </li>
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-menu-hamburger"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> settings</a></li>

							
							 <?php 

	                           		 if(isset($_SESSION['user_role'])){
	                                 
	                               	  echo "<li><a href='profile.php'><span class='glyphicon glyphicon-user'></span> Profile</a></li>";
	                                
	                            	 }
	                             
	                                else if (isset($_SESSION['admin_role'])){

	                                    echo "<li><a href='admindashboard.php'><span class='glyphicon glyphicon-user'></span> dashboard</a></li>";
	                             }
	                              

                       		  ?>


				            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Sign out</a></li>
				            
				          </ul>
				        </li>
				      </ul>
<!-- 
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class=" glyphicon glyphicon-menu-hamburger"></span></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Sign in</a></li>
			            <li><a href="signup.php"><span class="glyphicon glyphicon-th-list"></span> Sign up</a></li>
			         
			          </ul>
			        </li>
 -->
			      </ul>
			    </div><!-- /.navbar-collapse ending -->
			  </div><!-- /.container-fluid enfing -->
		</nav>

</div>  
	


</div>     
	
	


</div>     

 <br>
 <br>

   <!-- header-content -->
    <div class="container-fluid">
    	
    	
    		<h2>Cart</h2>
    		<!-- <p>total product : ($) </p> -->
       

       
       	<table class="table">
       		<tr>
       			<th>Product name </th>
       			<th>Quantity </th>
       			<th>Unit Price ($)</th>
       			<th>Discount</th>
       			<th>Total </th>
       			<th></th>
       		</tr>
			
			<!-- while loop work  -->
			<?php 
                 
                 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
				if (!$conn) {
					die("Connection failed: ".mysqli_connect_error());
				}
                
              
				$product = "SELECT * from cart where cust_id=".$_SESSION['customer_id'];

				$result = mysqli_query($conn, $product)or die(mysqli_error($conn));
			
				$sum = 0;
				while($row = mysqli_fetch_assoc($result)) { 




			 ?>
				
       	
       			 <tr>
	                  <td><?php echo $row['product_name'] ?></td>
	                  <td><?php echo $row['quantity'] ?></td>
	                  <td><?php echo "BDT ".$row['price'] ?></td> 
	                  <td><?php echo $row['discount'] ?></td>
	                  <td><?php echo "BDT ".$row['total_price'] ?></td>
	                  <td><a class="btn btn-danger" href="delete_cart.php?cart_id=<?php echo $row['cart_id'] ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
	                
                 </tr> 


                <?php 

                  $sum = $sum + $row['total_price'];

                }
                 mysqli_close($conn);
                
                ?>
  
       	
       	</table>
       	
		<div class="container">
			<div class="total_calc">
       		<h3>Total : <?php 
                  echo $sum;
                 
       		 ?></h3>

       		<!-- <p>$</p> -->
       			<a href="shipping.php" class="btn btn-success">Proceed to checkout</a>	
       	</div>


		</div>
       	

    </div>
   
   


    <!-- image-gallary -->
    



    
    


<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 

   if(isset($_REQUEST['a'])){
   	   echo "<script>alert('".$_REQUEST["a"]."');</script>";
   }
   else if(isset($_REQUEST['suc'])){
   	   echo "<script>alert('".$_REQUEST["suc"]."');</script>";
   }

 ?>


