<?php 
  session_start();
   //$_SESSION['bid'] = 1;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Brand Bucket</title>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




 <!-- letter box form validation javascript -->
		<script>
	             			
                           function validate(){
							    var flag=true;
								
								var m = document.getElementById("msg1");
								var n = document.getElementById("msg2");
								var o = document.getElementById("msg3");
								
								if(document.fm.cname.value.length == 0){
									document.fm.cname.focus();
									m.style.color="red";
									
									m.innerHTML="* name must be enter";
									flag=false;
								}
								else if(document.fm.cname.value.length > 0){
    								m.innerHTML = "";	
								}
								if(document.fm.email.value.length == 0){
									document.fm.email.focus();
									n.style.color="red";
									
									n.innerHTML="* must enter email";
									flag=false;
								}

								else if(document.fm.email.value.length > 0){
    								n.innerHTML = "";	
								}

							   if(document.fm.comments.value.length == 0){
									document.fm.comments.focus();
									o.style.color="red";
									
									o.innerHTML="* please submit your comment";
									flag=false;
								}
								else if(document.fm.comments.value.length > 0){
    								o.innerHTML = "";	
								}
							
								return flag;
		                        }

	             		</script>

	<style type="text/css">
	    body{
           
           //height: auto;
           font-size: 13px;

        	
        }
		
		.middle-content{
			margin:89px 0px 0px 0px;
		}
		.image-slider{

			margin:116px 0px 0px 0px;
			padding:0px 0px 0px 0px;
		}
		.carousel.slide{

          padding:0px 0px 0px 0px;
		}

		#carousel-example-generic{
            padding:0px 0px 0px 0px;
		}
		.jumbotron{
			background:rgb(13, 16, 10);


		}
		.jumbotron label{
			 color:white;
		}
        
        input[id=jumbo]{
        	border-radius: 5px;
        	padding-top: 6px;
   		    padding-bottom: 3px;
        }

        .footer{
           
           background:rgb(40, 39, 35);
          padding:38px 0px 28px 89px;
           color:white;

        }
        #circle-social-link{
        	margin:1px 11px 14px 85px;
        }
        li{
			list-style: none;
			display:inline-block;	
        }
        #complain-box{
				
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


    #letter,#search_product,#email,#name{
         
      display: block;
      width: 100%;
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
     #letter{
        
        height: 100px;

     }

      .buttons{

            display:inline block;
            color: #fff;
            background-color: #d58512;
            border-color: #985f0d;
            padding:6px 12px;
            font-size: 14px;
            border:none;
            border-radius: 5px;

        }

        .buttons:hover{
             background-color: rgb(244, 158, 29);
        }
        
	</style>


	<script type="text/javascript">

	// search product	
	function product_list() {
      var  xmlhttp = new XMLHttpRequest();
      var str=document.getElementById('search_product').value;  
      //alert(str);
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
          var m=document.getElementById("load_product");
          m.innerHTML=xmlhttp.responseText;
        }
      };
      var url="search_product.php?product="+str; // this will only change
      //alert(url);
      xmlhttp.open("GET", url,true);
      xmlhttp.send();
    }


	</script>
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
			      <a class="navbar-brand" href="#"><?php echo "Brand Bucket"; ?></a>
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

				    
				        	
				     
			        	<input type="submit" name="sbt" value="search" class="buttons">
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

                             <?php if(isset($_SESSION['username']) && isset($_SESSION['user_role']) &&$_SESSION['user_role']='customer'){

                                echo "<a href='add_to_cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> add to cart </a>";   

                              //  $_SESSION['count'] = $_REQUEST['count'];              


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

<!-- tab -->
  <div class="tabs" >
      		 	<br/>
     <br/>
     <br/>
     <br/>
      		 	<!-- <div class="container-fluid"> -->

      		 		<!-- advertise -->
      		 		
      		 		
                    <div class="container">
                    	<div class="col-xs-3"></div>
                       <div class="col-xs-6"><center>
                    	  <h2>All brands</h2>
                    	   <?php 

						    $conn = mysqli_connect("localhost", "root", "", "brandbucket");
							if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
							}
							
							$brand = "SELECT * from brand";
							$result = mysqli_query($conn, $brand)or die(mysqli_error());
						
							
							while($brandrow = mysqli_fetch_assoc($result)) {

                           
					     ?>	
                            <a href="product_search.php?bid=<?php echo $brandrow['brand_id']?>&brandname=<?php echo $brandrow['brand_name'] ?>"><img src="<?php echo $brandrow['brand_img'] ?>" height="50px" width="100px" style="border:1px solid black; border-radius: 5px;"></a>
                            


                         <?php

                          }

                           mysqli_close($conn);
                         ?>  

                         </center> 
                     </div>
                     <div class="col-xs-3"></div>

                    </div>



					

        <!-- middle part of website	 -->

        <div class="middle-content">
		        <!-- text -->
		        <center><h1>About us</h1></center>
		    	<div class="container" id="about">



		            <div class="col-sm-4">
		            	
		            	<h3>100% Genuine Products</h3>
		            	<p>No fakes and no duplicates. We have made it to our mission to offer only 100% genuine products in the original packaging on BrandBucket. We work hard to provide you with the largest selection of authentic and brand new products at the highest quality.</p>

		            </div>
		             <div class="col-sm-4">


		            	
		            	<h3>Safe & Secure Payments</h3>
		            	<p>Whether you pay cash on delivery or conveniently with one of our pre-payment methods, credit / debit card / Easypay or JazzCash, your privacy is important to us and we keep your data secure. For further information please visit our Privacy Agreement Page.</p>

		            </div>

		            <div class="col-sm-4">
		            	
		            	<h3>Free & Easy Returns</h3>
		            	<p>Returns and replacements are easy and free of charge. For further information on the detailed terms, as well as on how to return your product please visit our Returns & Refunds Page.</p>

		            </div>
             
    	  </div>

    	</div>
    	<br/>
    	<br/>

        <!-- services -->
  <!--  -->
    	  
    	  <!-- final content -->
    	  <div class="final-contents">
    	  	    <div class="contact">
    	  	
           
                    
                   <div class="col-xs-4"> </div>
	             	
	             	<div class="col-xs-4" align="center">	
	                     
	                      <h1>Contact</h1>
             			  <p> Contact us and we'll get back to you within 24 hours.</p>  
	                      

	             	</div>
	             	 
	             	 <div class="col-xs-4"> </div>
             

              <div class="container">
              	  <div class="col-xs-4"> </div>
	             	<div class="col-xs-4" id="complain-box">	

	             	
	                       
	                       <form action="letterbox.php" method="post" name="fm">
	                       	 <br/>
    						  <br/> 
	                       	  <input id="name" type="text" name="cname" placeholder="Name" >
	                       	  <span id="msg1"></span>
	                       	  <br/>
	                       	  <input id="email" type="text" name="email" placeholder="Email" >
	                       	   <span id="msg2"></span>
	                       	  <br/>

	                       	  <textarea id="letter" name="comments" placeholder="Comments"></textarea>
	                       	   <span id="msg3"></span>
	                       	  <br/>

	                       	  <input type="submit" name="sbt" onclick="return validate();" class="buttons">


	                       </form>

	             	</div>
	             	 <div class="col-xs-4"> </div>
             
    	      </div>

            </div>
             	

    	  </div>
          
           <br/>
    	  <br/> 
          
          <!-- go to upper button -->

    	  </div>

		   <!--footer-->
    	  <div class="footer">
    	  	
    	  	<div class="container-fluid">

    	  		<div class="col-xs-4" >
    	  		</div>
    	  			

    	  	

    	  		<div class="col-xs-4">
    	  			<center><p>Copyright © BRAND BUCKET 2017</p></center>
    	  		</div>

    	  			<div class="col-xs-4" >
    	  		</div>


    	  		</div>	
    	  			
    	  		
    	  	</div>

    	  </div>	



        
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>

<?php 
if(isset($_REQUEST["congrats_b"])){
	echo "<script>alert('".$_REQUEST["congrats_b"]."');</script>";
	//echo "<h2>".$_REQUEST["error"]."</h2>";
	
}

else if(isset($_REQUEST["congrats_p"])){
	echo "<script>alert('".$_REQUEST["congrats_p"]."');</script>";
	//echo "<h2>".$_REQUEST["error"]."</h2>";
	
}

else if(isset($_REQUEST["add_cat"])){
	echo "<script>alert('".$_REQUEST["add_cat"]."');</script>";
	//echo "<h2>".$_REQUEST["error"]."</h2>";
	
}

else if(isset($_REQUEST["msg"])){
	echo "<script>alert('".$_REQUEST["msg"]."');</script>";
	//echo "<h2>".$_REQUEST["error"]."</h2>";
	
}
else if(isset($_REQUEST["failed"])){
	echo "<script>alert('".$_REQUEST["failed"]."');</script>";
	//echo "<h2>".$_REQUEST["error"]."</h2>";
	
}




?>