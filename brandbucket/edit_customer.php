
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style type="text/css">

    #cust_id,#cust_name,#user_name,#password,#mobile_phone,#date_of_birth,#address,#email,#gender{
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
         

    </style>

</head>
<body>


   


	<div class="container" align="center">
			
       <h2>Edit Customer information </h2>

         <?php 
                
                 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
				if (!$conn) {
				  die("Connection failed: " . mysqli_connect_error());
				}

				 $sql = "SELECT * FROM dashboard where cust_id = ".$_REQUEST['cid'].";";

				 	$res = mysqli_query($conn, $sql)or die(mysqli_error($conn));

				 	while($row = mysqli_fetch_assoc($res)) {



              ?>
			
        <form action="update_customer.php?cid=<?php echo $row['cust_id'];?>" method="post" >

             
           

        	  <table>

                <tr>
                    <th>customer id </th>
                      
                    <td><input type="text" name="cid" id="cust_id" placeholder="Full name" value="<?php echo $row['cust_id'] ?>" disabled>

                    </td>
              
                </tr>
     	        
                <tr>
                    <th>customer name</th>
                      
                    <td><input type="text" name="cname" id="cust_name" placeholder="Full name" value="<?php echo $row['cust_name'] ?>">

                    </td>
              
                </tr>

                 <tr>
                    <th>username</th>
                      
                    <td><input type="text" name="user" id="user_name" placeholder="Full name" value="<?php echo $row['username']?>">

                    </td>
              
                </tr>

                 <tr>
                    <th>Password</th>
                      
                    <td><input type="text" name="password" id="password" placeholder="Full name" value="<?php echo $row['password'] ?>">

                    </td>
              
                </tr>

                 <tr>
                    <th>Email</th>
                      
                    <td><input type="text" name="email" id="email" placeholder="Full name" value="<?php echo $row['email'] ?>">

                    </td>
              
                </tr>

                  <tr>
                    <th>mobile no.</th>
                      
                    <td><input type="text" name="phone" id="mobile_phone" placeholder="Full name" value="<?php echo $row['phone'] ?>">

                    </td>
              
                </tr>

                 <tr>
                    <th>DOB</th>
                      
                    <td><input type="text" name="dob" id="date_of_birth" placeholder="Full name" value="<?php echo $row['dob'] ?>">

                    </td>
              
                </tr>

                 

                 <tr>
                    <th>address</th>
                      
                    <td><input type="text" name="dob" id="address" placeholder="Full name" value="<?php echo $row['address'];?>">

                    </td>
              
                </tr>

                 <tr>
                    <th>gender</th>
                      
                    <td><input type="text" name="gen" id="gender" placeholder="Full name" value="<?php echo $row['gender']?>">

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