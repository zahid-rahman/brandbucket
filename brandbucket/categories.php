<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		
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

            .dropdown-toggle{
           
           padding:15px;
           color:white;
           background: #101010;
           border:none;

        }
        .dropdown-toggle:hover{
        	background: black;
        }



	</style>
</head>
<body>


  <!-- navigation bar -->
     <!-- navigation bar -->
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
			      <ul class="nav navbar-nav">
			     
			       
			       
					<!--link 1 with dropdown-->
			        <li class="dropdown">
                 
                 <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    All categories
					    <span class="caret"></span>
					  </button>

					   <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			    <?php 
                $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                if(!$conn){
                		die("Connection failed: " . mysqli_connect_error());	
                }

                $categories = "SELECT * from category";
                	$res = mysqli_query($conn, $categories)or die(mysqli_error($conn));

	
                    
                	while($category =  mysqli_fetch_assoc($res)){
                		
					?>

                	
					<li><a href="categories.php?cat_id=<?php echo $category['category_id']?>"><?php  echo $category['category_name'] ?></a>
					</li>			    
					
                				
                		


			<?php			
                	}

                	mysqli_close($conn);

			    ?>
			          </ul>	  
			         
			        </li>

			      </ul>
		    

			      <ul class="nav navbar-nav navbar-right">


			      	  <form class="navbar-form navbar-left" action="product_list_search.php" method="post">
				        <div class="form-group">
				          <input type="text" list="abc" onkeyup="product_list()" id="search_product" placeholder="Search products" size="20" name="pro_name" required="required">
				        </div>

				    
				        	
				     
			        	<input type="submit" name="sbt" value="submit">
			        	<!-- <a href="product_list_search.php" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></a> -->
			        	<div id="load_product">
				        </div>
			        </form>

			       
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


				         ?></li>
				        
                        
				         <li>

				         	
                           <?php 
                            if(isset($_SESSION['username'])){
                             	 echo "<a href='add_to_cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> add to cart</a>";

                             	
                             }
                           

                            ?>
				         	

				         </li>

				         <!-- jflasfjlas -->

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

			      </ul>
			    </div><!-- /.navbar-collapse ending -->
			  </div><!-- /.container-fluid enfing -->
		</nav>

</div>  
	


</div>  
	
<br>
<br>
<br>

</div> 
  
    <?php 
       
          $conn = mysqli_connect("localhost", "root", "", "brandbucket");
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $secure= "SELECT *  from category";
         $check = mysqli_query($conn, $secure)or die(mysqli_error());
          
          $c = 0;
          while($row = mysqli_fetch_assoc($check)) {
              
              if($_REQUEST['cat_id'] == $row['category_id']){
                $c++;

       

    ?>


	<div class="container">
    	<?php 
				$conn = mysqli_connect("localhost", "root", "", "brandbucket");
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				if($_REQUEST['cat_id'] == $row['category_id']) {
						$cat ="select category_name from category where category_id=".$_REQUEST['cat_id'];
						$c_name = mysqli_query($conn, $cat)or die(mysqli_error($conn));
						$name = mysqli_fetch_assoc($c_name);
                        echo "<h3>".$name['category_name']."</h3>";
					}
				
			
				$product = "SELECT * from product, discount, category,brand where discount.product_id = product.product_id and product.category_id=category.category_id and product.brand_id = brand.brand_id and category.category_id=".$_REQUEST['cat_id'];

				$result = mysqli_query($conn, $product)or die(mysqli_error($conn));
			     

				
				while($row = mysqli_fetch_assoc($result)) { 

				

                       
                    ?>
                
                <table>
                	


					<div class="gallery">
                   <a href="product_details.php?p_img=<?php echo $row['product_img']; ?>&pname= <?php echo $row['product_name'];?>&brandname=<?php echo $row['brand_name'];?>& pri=<?php echo $row['price'];?>&pid=<?php echo $row['product_id']; ?>&bid=<?php echo $row['brand_id']; ?>&p_quan=<?php echo $row['product_quantity']; ?>&p_dis=<?php echo $row['discount_rate']; ?>">

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

				      //} //if
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

</body>
</html>
