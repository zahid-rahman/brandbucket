<?php
session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

$check=0;
   
            // brand name 
          if(isset($_REQUEST['bname']) && strlen($_REQUEST['bname'])>0){
              
               $check++;  

          }
          else{
    
          }  

          //brand id 
          if(isset($_REQUEST['brand_id']) && strlen($_REQUEST['brand_id'])>0){
              $check++;
                

          }     
          else{
    
          }  

           //brand id 
          if(isset($_REQUEST['brand_img']) && strlen($_REQUEST['brand_img'])>0){
              
                 $check++;

          }     
          else{
  
          }  

 if($check == 1){

       
    $n=$_FILES['fileToUpload']['name'];
    $sz=$_FILES['fileToUpload']['size'];

      
      $sql="INSERT INTO brand VALUES (NULL,'".$_REQUEST['bname']."','img/user-tab/".$n."')";
     // echo $sql;
      if(mysqli_query($conn,$sql)){
        //echo "New records updated successfully";
      header("Location:design.php?congrats_b=adding brand successfully done");
      }


 } 
 else{
      header("Location:admindashboard.php?error_alert=invalid adding opetation");
 }
     





?>