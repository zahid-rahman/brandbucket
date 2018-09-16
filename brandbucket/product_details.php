<?php 
session_start();
$_SESSION['pro_id'] = $_REQUEST['pid'];
$_SESSION['pro_name'] = $_REQUEST['pname'];
$_SESSION['pro_price'] = $_REQUEST['pri'];
$_SESSION['pro_img'] = $_REQUEST['p_img'];
$_SESSION['bra_name'] = $_REQUEST['brandname'];
$_SESSION['bra_id'] = $_REQUEST['bid'];
$_SESSION['pro_quantity'] = $_REQUEST['p_quan'];
$_SESSION['discount'] = $_REQUEST['p_dis'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	

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
			.nav .nav-tabs{
               border:1px solid black;
			}
            .dropdown select{
                padding: 0px 30px 0px 10px;
                border-radius:5px;   
            }

            #buttons{

                display:inline block;
                color: #fff;
                background-color: #d58512;
                border-color: #985f0d;
                padding:6px 12px;
                font-size: 14px;
                border:none;
                border-radius: 5px;

            }

            #buttons:hover{
                 background-color: rgb(244, 158, 29);
            }

             #form,#comment{
         
                      display: block;
                      width: 150%;
                      height: 34px;
                      padding: 6px 12px;
                      font-size: 14px;
                      line-height: 1.42857143;
                      color: #555;
                      background-color: #fff;
                      background-image: none;
                      border: 1px solid #ccc;
                      border-radius: 4px;


            }
            #comment{
                height: 60px;
            }

	</style>

    <script>
                            
                           function validate(){
                                var flag=true;
                                
                                var m = document.getElementById("msg1");
                                var n = document.getElementById("msg2");
                              
                                
                                if(document.fm.rating.value.length == 0){
                                    document.fm.rating.focus();
                                    m.style.color="red";
                                    
                                    m.innerHTML="* must enter rating number";
                                    flag=false;
                                }
                                else if(document.fm.rating.value.length > 0){
                                    m.innerHTML = "";   
                                }
                                if(document.fm.feedback.value.length == 0){
                                    document.fm.feedback.focus();
                                    n.style.color="red";
                                    
                                    n.innerHTML="* give product review or comments ";
                                    flag=false;
                                }

                                else if(document.fm.feedback.value.length > 0){
                                    n.innerHTML = "";   
                                }

                            
                                return flag;
                                }

                                


                        </script>
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

                             	 echo "<a style='margin-right:30px;' href='login.php'>Your Account</a>";
                               
                             }


				         ?></a></li>
				        
                          

				         <li>
                            
                             <?php if(isset($_SESSION['username']) && isset($_SESSION['user_role']) &&$_SESSION['user_role']='customer'){

                                 
                                 
                               echo "<a href='add_to_cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> add to cart </a>"; 




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
			    </div><!-- /.navbar-collapse ending -->
			  </div><!-- /.container-fluid enfing -->
		</nav>

</div>  
	


</div>     
	
	


</div>     

 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

     <?php 
       
          $conn = mysqli_connect("localhost", "root", "", "brandbucket");
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $secure= "SELECT *  from brand,product,discount where brand.brand_id = product.brand_id and product.product_id=discount.product_id";

         $check = mysqli_query($conn, $secure)or die(mysqli_error());
          
          $c = 0;
          while($row = mysqli_fetch_assoc($check)) {
              
              if($_REQUEST['p_img'] == $row['product_img'] && $_REQUEST['bid'] == $row['brand_id'] && 
                $_REQUEST['brandname'] == $row['brand_name']
                &&$_REQUEST['pri'] == $row['price'] &&
                $_REQUEST['p_quan'] == $row['product_quantity'] 
                &&$_REQUEST['p_dis'] == $row['discount_rate']
                &&$_REQUEST['pid'] == $row['product_id']
 
          ){
                $c++;

       

    ?>


     
     <div class="container">
     	 
     	  <div class="col-sm-6">
     	  	   
     	  <a href="<?php echo $_REQUEST['p_img'] ?>"> <img src="<?php echo $_REQUEST['p_img'] ?>" height="300" width="300"></a>	   

          </div>


     	  <div class="col-sm-6">
     	  	   
     	  	    <h2><?php 
                 if(isset($_REQUEST['pname']) ){
                        echo $_REQUEST['pname'];
                 }
                           
                 ?> </h2>
     	  	    <p>by <?php 

                   if(isset($_REQUEST['brandname']) ){
                      echo $_REQUEST['brandname'];
                   }
                 ?> </p>

     	  	    <hr/>

     	  	    <p><b>Details</b></p>
     	  	    <p>max limit 3 products</p>


                   <?php

                       $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                if (!$conn) {
                  die("Connection failed: ".mysqli_connect_error());
                }
//select avg(rating), product_id from review where brand_id =".$_REQUEST['bid']."group by product_id
                $avg_product_rating = "select avg(rating) as pro_avg from review where brand_id =".$_REQUEST['bid']." and product_id =".$_REQUEST['pid'];
              $result_rating = mysqli_query($conn, $avg_product_rating) or die(mysqli_error($conn));
                $review = 0;
                while($review = mysqli_fetch_assoc($result_rating)) {  



                    ?> 

                     product rating : (<?php 


                echo round($review['pro_avg']); ?>)

              <?php }
              //mysqli_close($conn);
                  ?>  



                <br>
     	  	    
                 <h4>Price : <?php 

                       if(isset($_REQUEST['pri']) ){
                            echo $_REQUEST['pri'];
                         }

                 ?></h4>
				 

                 <!-- simple drpdown for max product limit -->
				  <div  class="dropdown">

                    <form action="buy_product.php" method="post" name="fName">
                         <select name="max_quan">
                           
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>                            
                        </select>

                         <br>
                         <br>


                        <input type="submit" name="sbt" id="buttons" value="buy now">

                        <span id="msg3"></span>
                        
                     
         
                    </form>
                       
                   </div>
				  
				  <br>
                  <br>
            
                 <!-- tab content -->
                 <ul class="nav nav-tabs">
						  <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
						  <li><a href="#review" data-toggle="tab">comments</a></li>
						   <li><a href="#show-review" data-toggle="tab">show product reviews</a></li>
						 
						  
						</ul>
                        
                        <div class="tab-content">
                         <!--description-->
                        	<div class="tab-pane active" id="description">
                               
                                <br/>
                                <!-- <ul class="nav nav-tabs"> -->
                                <?php 
                                 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                                 if (!$conn) {
                                    die("Connection failed: ".mysqli_connect_error());
                                 }

                                  $product_info = "SELECT * from product where product_id =".$_REQUEST['pid'];

                                 $result = mysqli_query($conn,$product_info)or die(mysqli_error($conn));
                                 while($information = mysqli_fetch_assoc($result)) {

                                ?>
                                    
                                    <p>
                                      <?php echo $information['product_description'] ?>
                                    </p>
                         
                                <?php 
                                    }
                                    mysqli_close($conn);

                                 ?> 
                                 <!-- </ul> -->
                                
                        	</div>

                             <!--review-->
                        	<div class="tab-pane" id="review">
                               
                                <br/>
                               
                                <ul class="nav nav-tabs">
                                    <li>
                                    	
                                      <form action="submit_review.php" class="form-group" name="fm">
                                      	 
                                      	  <input type="text" name="rating" id="form" placeholder="your rating">
                                         
                                           <span id="msg1"></span>
                                      	  <br>
                                          <br>
                                      	  <textarea id="comment" name="feedback" placeholder="your review"></textarea>
                                      	 
                                           <span id="msg2"></span>
                                          <br>
                                           <br>
                                      	 <input type="submit" name="sbt" onclick="return validate();"  
                                         id="buttons">

                                      </form>

                                    </li><br>                                  
                         
                                </ul>
                           
                                
                        	</div>

                            <div class="tab-pane" id="show-review">
                               
                                <br/>
                               
                     <ul class="nav nav-tabs">
                        <li>
                                    
                          
                        <?php 

                          $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error($conn));
                                }

                                $load_review = "select * from review,dashboard where review.cust_id = dashboard.cust_id and review.product_id=".$_REQUEST['pid'];

                                $result = mysqli_query($conn, $load_review)or die(mysqli_error($conn));

                                while($customer_review =  mysqli_fetch_assoc($result)){

                                         echo "<div><b><h4>". $customer_review['username']."</h4></b>".$customer_review['feedback']."<hr></div>";
                                         //echo "<div>". $customer_review['username']."</div>";
               
                                }

                                 mysqli_close($conn);

                         ?>                  

                        </li>
               
                     </ul>
     
                        </div>
                 </div>
                 
  
       </div>

        <?php 

       }
   }

    if($c ==0){
            
            echo "<br><br><br><div><h1>not found</h1></div>";
       
     }
     ?>

    <!-- product details -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 

if(isset($_REQUEST["not_pos"])){
    echo "<script>alert('".$_REQUEST["not_pos"]."');</script>";
    //echo "<h2>".$_REQUEST["error"]."</h2>";
    
}
else if(isset($_REQUEST["error_submit"])){
    echo "<script>alert('".$_REQUEST["error_submit"]."');</script>";
    //echo "<h2>".$_REQUEST["error"]."</h2>";
    
}
else if(isset($_REQUEST["error_buy"])){
    echo "<script>alert('".$_REQUEST["error_buy"]."');</script>";
    //echo "<h2>".$_REQUEST["error"]."</h2>";
    
}
else if(isset($_REQUEST["submit"])){
    echo "<script>alert('".$_REQUEST["submit"]."');</script>";
    //echo "<h2>".$_REQUEST["error"]."</h2>";
    
}
?>