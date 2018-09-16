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
          input[type=file]{


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

                     $sql = "SELECT * FROM discount where product_id =".$_REQUEST['pid'].";";

                         $res = mysqli_query($conn, $sql)or die(mysqli_error($conn));

                         while($row = mysqli_fetch_assoc($res)) {



              ?>
            
        <form action="update_discount.php?pid=<?php echo $row['product_id'];?>" method="post" class="form-horizontal" enctype="multipart/form-data" name="fm">

             
              <table>

                    <tr>
                    <td>
                    <input type="text" name="pid" placeholder="brand id" class="form-control" value="<?php echo $_REQUEST['pro_name']; ?>" disabled>   
                    <br>
                    </td>
                 </tr>
                
                 <tr>
                    <td>
                    <input type="text" name="pid" placeholder="brand id" class="form-control" value="<?php echo $row['product_id'] ?>" disabled>   
                    <br>

                    </td>
                 </tr>
                  <tr>
                    <td>
                      
                        <select name="status" onclick="enable()">

                             <option  value="off">off</option>
                            <option  value ="on">on</option>
                           
                        </select><br>


                        <script type="text/javascript">
                            
                            var x; 
                            function enable(){
                                if (document.fm.status.value == 'off') {
                                      document.fm.dis_rate.disabled = true;
                                    document.fm.days.disabled = true;

                                }
                                else if (document.fm.status.value == 'on'){
                                    document.fm.dis_rate.disabled = false;
                                    document.fm.days.disabled = false;
                                }

                                 document.fm.dis_rate.value = 0;
                                    document.fm.days.value = 0;
                            }


                        </script>
                        <br>    
        
                    </td>
                 </tr>

                 <tr>
                    <td>
                        <input type="text" name="dis_rate" placeholder="brand name" class="form-control" value="
                            
                            <?php echo $row['discount_rate'] ?>" 
                        disabled>
                        <br>    
        
                    </td>
                 </tr>

                  

                   <tr>
                    <td>
                        <input type="text" name="days" placeholder="brand name" class="form-control" value="<?php echo $row['days'] ?>" disabled>
                        <br>    
        
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