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
           #category_id,#category_name{
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
            
       <h2>Edit Product information </h2>
       <br>
       <br>

          <?php 
                
                 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }

                     $sql = "SELECT * FROM category where category_id =".$_REQUEST['cat_id'].";";

                         $res = mysqli_query($conn, $sql)or die(mysqli_error($conn));

                         while($row = mysqli_fetch_assoc($res)) {



              ?>
            
        <form action="update_category.php?cat_id=<?php echo $row['category_id'];?>" method="post">

             
              <table wifth="40%">

                   <tr>
                    <td>Category id</td>
                      
                    <td><input type="text" name="cid" id="category_id" placeholder="Full name" value="<?php echo $row['category_id']; ?>">

                    </td>
              
                  </tr>

                  <tr>
                    <td>Category name</td>
                      
                    <td><input type="text" name="cid" id="category_name" placeholder="Full name" value="<?php echo $row['category_name']; ?>">


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