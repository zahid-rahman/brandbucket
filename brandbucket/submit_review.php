<?php 

   session_start();

  
  $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


  $path = $_SERVER['HTTP_REFERER'];

   if(isset($_SESSION['customer_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role']=='customer'){
  
  $sql="INSERT INTO review VALUES (NULL,".$_SESSION['bra_id'].",".$_SESSION['pro_id'].",".$_REQUEST['rating'].",".$_SESSION['customer_id'].",'".$_REQUEST['feedback']."')";
 // echo $sql;
  if(mysqli_query($conn, $sql)){
    //echo "New records updated successfully";
   	//header("Location:design.php");
    
  

     
     header("Location:$path&submit=review submit successfully done");
   
  }
  
   }
    else{

      header("Location:$path&error_submit=Customer log in required");
        
  }
  
  mysqli_close($conn);



?>