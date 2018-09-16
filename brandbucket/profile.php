<?php 
session_start();


?>

<html>
    
    <head>
        
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
    </head>



    
    <body>


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

                             //finding username from database
                            // $_SESSION['username'];
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
                    <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> settings</a></li>
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
         <div class="col-xs-2">
             <ul class="nav nav-pills nav-stacked">
						  <li class="active"><a href="#dashboard" data-toggle="tab">Profile</a></li>
						  <li><a href="#orders" data-toggle="tab">Orders</a></li>
					 
						  
						</ul>
                        
         
             
         </div>
        <div class="col-xs-8">
              
                   <div class="tab-content">
                         <!--dashboard-->
                          <div class="tab-pane active" id="dashboard">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">
                                    
                                    <table class="table table-hover">

                                      <?php 
 
                                             $conn = mysqli_connect("localhost", "root", "","brandbucket");
   
                                            if (!$conn) {
                                             die("Connection failed: " . mysqli_connect_error()); 
                                             }  

                                            $customer = "SELECT * from dashboard where cust_id = ".$_SESSION['customer_id'];
                                             $result = mysqli_query($conn, $customer)or die(mysqli_error()); 

                                             while($row = mysqli_fetch_assoc($result)) {  

                                       ?>
                                            <tr>
                                               
                                               <td>username</td>
                                               <td> <?php echo $row['username']?></td>


                                            </tr>
                                             <tr>
                                               
                                               <td>customer name</td>
                                               <td> <?php echo $row['cust_name']?></td>


                                            </tr>
                                             <tr>
                                               
                                               <td>mobile number</td>
                                               <td>  <?php echo $row['phone']?></td>


                                            </tr>
                                             <tr>
                                               
             
                                               <td>address</td>
                                               <td>  <?php echo $row['address']?></td>


                                            </tr>

                                             <tr>
                                               
                                               <td>DOB(date of birth)</td>
                                               <td><?php echo $row['dob']?></td>


                                            </tr>
                                            <tr>
                                               
                                               <td>email</td>
                                               <td><?php echo $row['email']?></td>


                                            </tr>
                                             <tr>
                                               
                                               <td>password</td>
                                               <td><?php echo $row['password']?></td>


                                            </tr>
                                        
                                       
                                          </table>

                                          <?php 
                                              }

                                               mysqli_close($conn);
                                           ?>
                         
                                </ul>
                                
                                
                          </div>

                             <!--orders-->
                          <div class="tab-pane" id="orders">
                               
                                <br/>
                               
                                <ul class="nav nav-stacked">
                                  <h3>Orders</h3>
<!--                                     <li>1. car on deleviry </li><br>
                                    <li>2. car on deleviry</li> <br>
                                    <li>3. car on deleviry</li> <br>
                                    <li>4. car on deleviry</li> <br> -->


                                
                     <?php 
                            $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                            if (!$conn) {
                              die("Connection failed: " . mysqli_connect_error());
                            }
                            
                            $product = "SELECT * from shipping where cust_id=".$_SESSION['customer_id'];
                           // $product = "SELECT * from shipping";
                            $result = mysqli_query($conn, $product)or die(mysqli_error());







                            ?>
                            
                             <!-- table start -->

                                


                             <table border="1px" class="table table-bordered">
                                            <tr>
                                              <th>Product id</th>
                                              <th>Customer id</th>
                                              <th>Delivery date</th>
                                              <th>Order date</th>
                                              <th>Payment</th>
                                              <th>Quantity</th>
                                              

                                            </tr>
                                        
                            <?php
                            $sum =0;
                            while($row = mysqli_fetch_assoc($result)) { ?>
                               

                                        
                                            <tr>
                                              <td><?php echo $row['product_id'] ?></td>
                                              <td><?php echo $row['cust_id'] ?></td>
                                              <td><?php echo $row['delivery_date'] ?></td>
                                              <td><?php echo $row['ordered_time'] ?></td>
                                              <td><?php echo "BDT ".$row['payment'] ?></td>
                                              <td><?php echo $row['quantity'] ?></td>
                                            </tr>




                                <?php 

                                 $sum = $sum + $row['payment'];
                                }?>
                  
                                
                              <?php mysqli_close($conn);
                              ?>
                                       
                                </table>
                   
                               </ul>

                               <p><h3>Total :</h3><?php echo "BDT ".$sum?></p>
                              
                         
                          </div>

                            

                     
                        </div>
             
             
         </div>
        
         <?php 
            if (isset($_REQUEST['settings_pass'])) {
              echo "<script>alert('".$_REQUEST["settings_pass"]."');</script>";
            }

            else if (isset($_REQUEST['settings_email'])) {
              echo "<script>alert('".$_REQUEST["settings_email"]."');</script>";
            }

            else if (isset($_REQUEST['settings_address'])) {
              echo "<script>alert('".$_REQUEST["settings_address"]."');</script>";
            }
            
              else if (isset($_REQUEST['error_pass_up'])) {
              echo "<script>alert('".$_REQUEST["error_pass_up"]."');</script>";
            }
          ?>
     
        
    </body>
</html>





