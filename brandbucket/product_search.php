<?php 
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>product</title>

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
            body{
            	font-size: 13px;
            }
             li{
            	list-style: none;
            	display: inline-block;
            }
            #product-header{
                font-size: 20px;
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
                 
                          

                 <li>
                            
                          <?php if(isset($_SESSION['username']) && isset($_SESSION['user_role']) &&$_SESSION['user_role']='customer'){

                                echo "<a href='add_to_cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> add to cart </a>";

                              //  $_SESSION['count'] = $_REQUEST['count'];              


                             }
                            

                             ?>



                        </li>
                        

                        
                         <?php 

                            if(isset($_SESSION['username'])){

                          ?>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-menu-hamburger"></span></a>
                  <ul class="dropdown-menu">
                   

                                 <li>
                                
                                <?php 
                                    
                                    if(isset($_SESSION['username'])){
                                        echo "<a href='settings.php'><span class='glyphicon glyphicon-cog'></span> settings</a>";
                                    }

                                 ?>
                            </li>
                           
                    <?php 

                             if(isset($_SESSION['user_role'])){
                                 
                                 echo "<li><a href='profile.php'><span class='glyphicon glyphicon-user'></span> Profile</a></li>";
                                
                             }
                             else if (isset($_SESSION['admin_role'])){

                                    echo "<li><a href='admindashboard.php'><span class='glyphicon glyphicon-user'></span> dashboard</a></li>";
                             }
                              

                         ?>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Sign out</a></li>

                         <!-- jfkasdjf -->

                           <?php 

                           }

                          ?>
                    
                  </ul>
                </li>

            </ul>
				        </li>

			      </ul>
			    </div><!-- /.navbar-collapse ending -->
			  </div><!-- /.container-fluid enfing -->
		</nav>

</div>  
	


</div>     
	

 <br>
 <br>

   <!-- header-content -->


   <?php 
       
          $conn = mysqli_connect("localhost", "root", "", "brandbucket");
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $secure= "SELECT *  from brand";
         $check = mysqli_query($conn, $secure)or die(mysqli_error());
          
          $c = 0;
          while($row = mysqli_fetch_assoc($check)) {
              
              if($_REQUEST['brandname'] == $row['brand_name'] && $_REQUEST['bid'] == $row['brand_id']){
                $c++;

       

    ?>
    <div class="container-fluid">
    	
    	<div class="col-xs-6">

    		<!-- brandname -->
    		<h2> <?php 
              if(isset($_REQUEST['brandname']) ){
              	echo $_REQUEST['brandname'];
              }

                 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
				if (!$conn) {
					die("Connection failed: ".mysqli_connect_error());
				}

                $brand_review = "SELECT AVG(rating) as avg from review where brand_id=".$_REQUEST['bid'];
                $result = mysqli_query($conn, $brand_review)or die(mysqli_error());
                $review = 0;
                while($review = mysqli_fetch_assoc($result)) {	
             
    		?> 
              (<?php 


              	echo round($review['avg']); ?> / 5)

              <?php }
              mysqli_close($conn);

               ?>


    	    </h2>
            

            <!-- total product under a brand -->
    		<?php 
    		  $conn = mysqli_connect("localhost", "root", "", "brandbucket");
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

    				$total_product = "SELECT count(*) as total from product where brand_id=".$_REQUEST['bid'];
				$result = mysqli_query($conn, $total_product)or die(mysqli_error());?>
			
				<?php
				while($total = mysqli_fetch_assoc($result)) {	


    		 ?>
    		<p>total product : <?php echo $total['total'] ?> </p>

									
			<?php 
		     }

			mysqli_close($conn);
			?>

    	</div>
       

    </div>
   
   <!-- categories -->
    <div class="container-fluid">
    	
       <div class="col-xs-1">
       
    		<b>Categories</b>
         
    	  
    	</div>

         <div class="categories">
         	
         	<?php 
         	$conn = mysqli_connect("localhost", "root", "", "brandbucket");
                if(!$conn){
                		die("Connection failed: " . mysqli_connect_error());	
          }


                
                $categories = "SELECT * from category";
                	$result = mysqli_query($conn, $categories)or die(mysqli_error($conn));

	
                    
                	while($category_names =  mysqli_fetch_assoc($result)){
                		$_SESSION['c_name']=$category_names['category_name'];
                		// $cat_name=$_SESSION['category_name'];
                      

                       //total product count
                   $count_product = "SELECT count(*) as pro from product,category WHERE product.category_id=category.category_id AND category.category_name='".$_SESSION['c_name']."'AND product.brand_id=".$_REQUEST['bid'];
                
	                    $count_result = mysqli_query($conn, $count_product)or die(mysqli_error($conn));
	                	while($count = mysqli_fetch_assoc($count_result)){
	                          
	                          //echo $count['total'];
	                		$_SESSION['total_cat_pro'] = $count['pro'];
	                		 echo " ";
	                	}         	
			
         	 ?>

         	  <a href=""><?php echo $category_names['category_name']." (".$_SESSION['total_cat_pro'].")";  ?></a>
         	  <?php 
              
         	   } 
         	   mysqli_close($conn);
         	   ?>

         </div>

   
    	<br>
    	<br>
   
   <!-- product desc -->
    </div>
    <div class="container">
    	<?php 
				$conn = mysqli_connect("localhost", "root", "", "brandbucket");
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				
			
				$product = "SELECT * from product, discount where discount.product_id = product.product_id and product.brand_id=".$_REQUEST['bid'];
				$result = mysqli_query($conn, $product)or die(mysqli_error($conn));
			
				
				while($row = mysqli_fetch_assoc($result)) { 
                     
                    ?>

					<div class="gallery">
                   <a href="product_details.php?p_img=<?php echo $row['product_img']; ?>&pname= <?php echo $row['product_name'];?>&brandname=<?php echo $_REQUEST['brandname'];?>&pri=<?php echo $row['price'];?>&pid=<?php echo $row['product_id']; ?>&bid=<?php echo $_REQUEST['bid']; ?>&p_quan=<?php echo $row['product_quantity']; ?>&p_dis=<?php echo $row['discount_rate']; ?>">

					<!--product image-->
					
                   	<img src="<?php echo $row['product_img']; ?>" height="200px" width="200px"></a>
                   <div class="desc"> 
				   
				   <!--product name-->
                   <p id="product-header"><?php echo $row['product_name']?></p>
                    
						<!--product price-->				
                    <p>Price : <?php echo $row['price']." BDT"?> </p>
					
                   <!--product discount-->
                   <p>	Discount: <?php echo $row['discount_rate']." %"
                        //$_SESSION['discount'] = $row['discount_rate'];
                   ?> </p>
              </div>
		             </div>   
					
						
					<?php 
					}
				
					 mysqli_close($conn);
					 ?>
				

    </div>

    <?php 

       }
   }

    if($c ==0){
            
            echo "<br><br><br><div><h1>not found</h1></div>";
       
     }
     ?>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

