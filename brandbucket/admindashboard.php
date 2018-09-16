<?php
   session_start();
?>
<html>
    
    <head>
      <title>admin</title>
        
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   


   <style>
    
    #mytext,#search_dashboard,#search_product,#search_brand,#search_discount,#pro_desc{
         
      display: block;
      width: 50%;
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
     #pro_desc{
       height: 60px;
     }

  </style>
   <!--  ajax -->
   <script>

    // ajax for category

    function showHint() {
      var  xmlhttp = new XMLHttpRequest();
      var str=document.getElementById('mytext').value;  
      //alert(str);
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
          var m=document.getElementById("txtHint");
          m.innerHTML=xmlhttp.responseText;
        }
      };
      var url="db_category.php?category="+str; // this will only change
      //alert(url);
      xmlhttp.open("GET", url,true);
      xmlhttp.send();
    }
     
     //user dashboard
       function dashboard() {
      var  xmlhttp = new XMLHttpRequest();
      var str=document.getElementById('search_dashboard').value;  
      //alert(str);
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
          var m=document.getElementById("load_dashboard");
          m.innerHTML=xmlhttp.responseText;
        }
      };
      var url="db_dashboard.php?dash="+str; // this will only change
      //alert(url);
      xmlhttp.open("GET", url,true);
      xmlhttp.send();
    }
    //product ajax
    
    function product() {
      var  xmlhttp = new XMLHttpRequest();
      var str=document.getElementById('search_product').value;  
      //alert(str);
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
          var m=document.getElementById("load_product");
          m.innerHTML=xmlhttp.responseText;
        }
      };
      var url="db_product.php?product="+str; // this will only change
      //alert(url);
      xmlhttp.open("GET", url,true);
      xmlhttp.send();
    }

    // brand ajax

    function brand() {
      var  xmlhttp = new XMLHttpRequest();
      var str=document.getElementById('search_brand').value;  
      //alert(str);
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
          var m=document.getElementById("load_brand");
          m.innerHTML=xmlhttp.responseText;
        }
      };
      var url="db_brand.php?brand="+str; // this will only change
      //alert(url);
      xmlhttp.open("GET", url,true);
      xmlhttp.send();
    }

    //discount ajax

     function discountRate() {

      var  xmlhttp = new XMLHttpRequest();
      var str=document.getElementById('search_discount').value;  
      //alert(str);
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {     
          var m=document.getElementById("load_discount");
          m.innerHTML=xmlhttp.responseText;
        }
      };
      var url="db_discount.php?dis="+str; // this will only change
      //alert(url);
      xmlhttp.open("GET", url,true);
      xmlhttp.send();
    }

    //
    function allFunc(){
     
     discountRate();
     showHint(); 
     dashboard();
     product();
     brand();
    

    }
    

   
</script>

        
        
</head>

 <body onload="allFunc()">


 <!-- navigation bar for admin -->
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
 
                <li>

                  <?php 
                            if(isset($_SESSION['username'])){
                               echo "<a href=''>".$_SESSION['username']."</a>";
                              
                             }
                             else{

                               echo "<a href='login.php'>Your Account</a>";
                             }
                 ?>
               </a>
             </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-menu-hamburger"></span></a>
                  <ul class="dropdown-menu">
                   
                    <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Sign out</a></li>
                    
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
<!-- -------------------------------------------  -->


      <!-- navigation-dashboard for admin -->
         <div class="col-xs-2" id="side-navigation">
             <ul class="nav nav-pills nav-stacked">
						  
              <li class="active"><a href="#customer" data-toggle="tab">Customers info</a></li>
						  <li><a href="#orders" data-toggle="tab">Orders</a></li>
              <li><a href="#discounts" data-toggle="tab">Discount</a></li>
              <li><a href="#prandbr" data-toggle="tab">Product & Brand</a></li>
						  <li><a href="#comments" data-toggle="tab">Comments</a></li>
              <li><a href="#product_category" data-toggle="tab">Product Categories</a></li>
              <li><a href="#letterbox" data-toggle="tab">Reports and Letter box</a></li>
 
						</ul>
         
             
         </div>
        <div class="col-xs-10">
              
                   <div class="tab-content">
                         
                          
                           <!-- customer information -->

                           <div class="tab-pane active" id="customer">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">
                                    
                                     <h2>Customers information</h2>
                                     
                                     <input type="text" name="dashboard" id="search_dashboard" onkeyup="allFunc()" placeholder="search customer">
                                     <br>
                                     <br>
                                      
                                     <!-- load userdashboard  -->
                                     <div id="load_dashboard"></div>


                                </table>
                         
                                </ul>                              
                                
                          </div>

                             <!--orders-->
                          <div class="tab-pane" id="orders">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">

                                      <h2>Orders</h2>
                                       

 
                                          <?php 
                            $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                            if (!$conn) {
                              die("Connection failed: " . mysqli_connect_error());
                            }
                            
                            $product = "SELECT * from shipping,dashboard,product where product.product_id= shipping.product_id and dashboard.cust_id = shipping.cust_id";

                            $result = mysqli_query($conn, $product)or die(mysqli_error());?>
                            
                             <!-- table start -->
                             <table border="1px" class="table table-bordered">
                                            <tr>
                                                <th>Shipping id</th> 
                                              <th>Customer name</th> 
                                              <th>Product name</th>
                                              <th>Delivery date</th>
                                              <th>Order date</th>
                                              <th>address</th>
                                              <th>Payment</th>
                                              <th>Quantity</th>      
                                              <th>deliverable orders</th>

                                            </tr>
                                        
                            <?php
                            while($row = mysqli_fetch_assoc($result)) { ?>
                                   
                                            <tr>
                                              <td><?php echo $row['shipping_id'] ?></td>
                                              <td><?php echo $row['cust_name'] ?></td>
                                              <td><?php echo $row['product_name'] ?></td>
                                              <td><?php echo $row['delivery_date'] ?></td>
                                              <td><?php echo $row['ordered_time'] ?></td>
                                              <td><?php echo $row['address'] ?></td>
                                              <td><?php echo $row['payment'] ?></td>
                                              <td><?php echo $row['quantity'] ?></td>
                                              
                                              <td><a href="delivered.php?sid=<?php echo $row['shipping_id'] ?>">Delivered</a></td> 
                                             </tr> 
                 
                                <?php 
                                }?>
                  
                                
                              <?php mysqli_close($conn);
                              ?>

                                </table>
                   
                               </ul>
                                
                                
                          </div>
                           
                           <!-- product discounts  -->
                          <div class="tab-pane" id="discounts">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">
                                    <h2>Discounts</h2>
        
                                    <!-- while loop work  -->
                                     <input type="text" name="discount" id="search_discount" onkeyup="allFunc()" placeholder="search discounts">
                                     <br>
                                     <br>
                                     
                                     <div id="load_discount"></div>        
          
                                </ul>
                                
                                
                          </div>
                           
                           <!-- products and brands informations  -->

                          <div class="tab-pane" id="prandbr">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">
                                     <h2>Products</h2>
       
                                         <input type="text" name="product" id="search_product" onkeyup="allFunc()" placeholder="search products">
                                         <br>
                                         <br>
                                         
                                         <div id="load_product"></div>
                     

                                   <h2>Brands</h2>
    
                            

                                                 <input type="text" name="brand" id="search_brand" onkeyup="allFunc()" placeholder="search brands">
                                         <br>
                                         <br>
                                         
                                         <div id="load_brand"></div>
                 
                                </ul>

                                <h2>Add Brand</h2>


                                  <form class="form-horizontal" action="add_brand.php" enctype="multipart/form-data" method="post">
                            

                                    <input type="text" id="search_product" name="bname" placeholder="Enter brand name" size="30">

                                      <br>

                                      <input type="file" id="inputPassword2" name="fileToUpload">
                                       <br>

                               
                                      <input type="submit" name="" class="btn btn-primary" value="add brand">
                                 </form>



                                  <h2>Add product</h2>


                                  <form class="form-horizontal" enctype="multipart/form-data" action="add_product.php" method="post">
                            

                                    <input type="text" name="pid" id="search_product" placeholder="Enter product id"  size="30">

                                      <br>

                                      <input type="text" id="search_product" placeholder="Enter product name" name="pname" size="20">
                                      <br>


                                      <input type="text" id="search_product" placeholder="Enter product quantity" name="pquantity" size="20">
                                      <br>

                                      <input type="text" id="search_product" placeholder="Enter product price" name="price" size="20">
                                      <br>

                                       <input type="text" id="search_product" placeholder="Enter brand id" name="bid" size="20">
                                      <br>

                                    <input type="text" id="search_product" placeholder="Enter category id" name="cid" size="20"> 

                                    
                                      
                                       <br>
                                      <br>

                                       <input type="text" id="search_product" placeholder="Enter brand name" name="brand_name" size="20">
                                      <br>

<!--                                         <input type="text" id="search_product" placeholder="Enter product status (for discount)" name="status" size="20"> -->
                                       <select name="status">

                                           <option  value="off">off</option>
                                           <option  value ="on">on</option>
                           
                                         </select>

                                      <br> <br>

                                       <input type="text" id="search_product" placeholder="Enter discount rate" name="dis_rate" size="20">
                                      <br>

                                       <input type="text" id="search_product" placeholder="Enter discount offering days" name="days" size="20">
                                       <br>

                                       <textarea id="pro_desc" name="pro_info" placeholder="Enter product description"></textarea>
                                      <br>


                                      <input type="file" name="fileImage">
                                       <br>

                               
                                      <input type="submit" name="" class="btn btn-primary" value="add product">
                                 </form>
                                
                                
                          </div>


                           <!-- Customer review and comments section -->

                          <div class="tab-pane" id="comments">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">
                      


                                         <h2>Reviews and comments</h2>



                                       
                                        <table border="1px" class="table table-bordered">
                                          <tr>

                                            <th>Review id</th>
                                            <th>Customer id</th>
                                            <th>Customer name</th>
                                            <th>Product id</th>
                                            <th>Product name</th>
                                            <th>Brand id</th>
                                            <th>Rating</th>
                                            <th>Comments</th>
                                          

                                          </tr>
                                      
                                <!-- while loop work  -->
                                <tr>
                               <?php


                                $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                                if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                                }

                                    $review = "SELECT *,product.product_name,dashboard.cust_name from review,product,dashboard where review.product_id=product.product_id and dashboard.cust_id = review.cust_id";
                                $all_review = mysqli_query($conn, $review)or die(mysqli_error());
                                            while($row = mysqli_fetch_assoc($all_review)) { ?>
                                           

                                                    
                                                      <tr>
                                                          <td><?php echo $row['review_id'] ?></td>
                                                          <td><?php echo $row['cust_id'] ?></td>
                                                          <td><?php echo $row['cust_name'] ?></td>
                                                          <td><?php echo $row['product_id'] ?></td>
                                                          <td><?php echo $row['product_name'] ?></td>
                                                          <td><?php echo $row['brand_id'] ?></td>
                                                          <td><?php echo $row['rating'] ?></td>
                                                          <td><?php echo $row['feedback'] ?></td>
                                                        
                                                     </tr>
                                            <?php 
                                          }?>
            
                                          
                                        <?php mysqli_close($conn);
                                        ?>
                                                        
                                      
                                    </tr>
                                  </table>




                                </ul>
                                
                                
                          </div>
                            
                            <!-- Product categories -->

                           <div class="tab-pane" id="product_category">
                               
                                <br/>
                                  <h2>Product Categories</h2>
                               
                                <ul class="nav nav-stacked">
                                   
                                    <!-- search category -->
                                          <input type="text" onkeyup="allFunc()" id="mytext"  placeholder="category search">
                                          <br>
                                          <br>
                                     

                                    <!-- load category   -->
                                   <div id="txtHint"></div>


                                <h2>Add Category</h2>

                                   <form action="add_categories.php" method="post" class="form-horizontal">
                                    
                                        <input type="text" name="cat_id" class="form-control" placeholder="category id">
                                        <br>            

                                        <input type="text" name="cat_name" class="form-control" placeholder="category name">
                                        <br>

                                        <input type="submit" name="sbt" class="btn btn-primary" value="add category">

                                    </form>
                         
                         
                                </ul>
                                
                                
                          </div>

                           <!-- Customer reports and newsletter section -->
                           <div class="tab-pane" id="letterbox">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">
                      


                                                     <h2>reports and newsletter</h2>

       

                                                   
                                                    <table border="1px" class="table table-bordered">
                                                      <tr>

                                                       
                                                        <th>Letter id</th>
                                                        <th>Customer name</th>
                                                        <th>Email</th>
                                                        <th>Comments or reports</th>
                                                        <th>send email</th>
                                                   
                                                      </tr>
                                                  
                                                  <!-- while loop work  -->
                                                      <tr>

                                 <?php


                                $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                                if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                                }

                                    $letter = "SELECT * from letterbox";
                                $letterbox = mysqli_query($conn, $letter)or die(mysqli_error());
                                            while($row = mysqli_fetch_assoc($letterbox)) { ?>
                                           

                                                    
                                                  <tr>
                                                   
                                                    <td><?php echo $row['letter_id'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>
                                                    <td><?php echo $row['comments'] ?></td>
                                                      <td><a href="feedback_to_user.php">click here</a></td>

                                                   </tr>
                                         
                                                   <?php 
                                                    }?>
                        
                                                      
                                                    <?php mysqli_close($conn);
                                                    ?>


                                      </table>
                         
                                </ul>
                                
                                
                          </div>

         </div>
         <div class="col-xs-2"></div>
        
        
    </body>
</html>

<?php 
   
  if(isset($_REQUEST["error_alert"])){
  echo "<script>alert('".$_REQUEST["error_alert"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }

  else if(isset($_REQUEST["error_alert2"])){
  echo "<script>alert('".$_REQUEST["error_alert2"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }

   else if(isset($_REQUEST["cust_up"])){
  echo "<script>alert('".$_REQUEST["cust_up"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }

     else if(isset($_REQUEST["cust_delete"])){
  echo "<script>alert('".$_REQUEST["cust_delete"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }

   else if(isset($_REQUEST["pro_up"])){
  echo "<script>alert('".$_REQUEST["pro_up"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }
     else if(isset($_REQUEST["pro_delete"])){
  echo "<script>alert('".$_REQUEST["pro_delete"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }

      else if(isset($_REQUEST["brand_delete"])){
  echo "<script>alert('".$_REQUEST["brand_delete"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }
   else if(isset($_REQUEST["brand_up"])){
  echo "<script>alert('".$_REQUEST["brand_up"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }
   else if(isset($_REQUEST["dis_up"])){
  echo "<script>alert('".$_REQUEST["dis_up"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }
   else if(isset($_REQUEST["dis_delete"])){
  echo "<script>alert('".$_REQUEST["dis_delete"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }

   else if(isset($_REQUEST["cat_up"])){
  echo "<script>alert('".$_REQUEST["cat_up"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }
   else if(isset($_REQUEST["cat_delete"])){
  echo "<script>alert('".$_REQUEST["cat_delete"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  }

 else if(isset($_REQUEST["delivery"])){
  echo "<script>alert('".$_REQUEST["delivery"]."');</script>";
  //echo "<h2>".$_REQUEST["error"]."</h2>";
  
  }
 ?>


