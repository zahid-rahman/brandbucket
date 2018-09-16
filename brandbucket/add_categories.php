<?php
session_start();

 $conn = mysqli_connect("localhost", "root", "", "brandbucket");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
   

$check=0;
            

            // brand name 
          if(isset($_REQUEST['cat_id']) && strlen($_REQUEST['cat_id'])>0){
              
               $check++;  

          }
          else{
            //echo "enter your first name</br>";
           

          }  

          //brand id 
          if(isset($_REQUEST['cat_name']) && strlen($_REQUEST['cat_name'])>0){
              $check++;
                

          }     
          else{
            //echo "enter your first name</br>";
            

          }  

         
           
          
      

//--------------------


//$dob = $_REQUEST['date']."-".$_REQUEST['month']."-".$_REQUEST['year'];
//echo $dob;

//print_r($_REQUEST);



 if($check >= 1){

       
 
      
      $sql="INSERT INTO category VALUES (".$_REQUEST['cat_id'].",'".$_REQUEST['cat_name']."')";
     // echo $sql;
      if(mysqli_query($conn,$sql)){
        //echo "New records updated successfully";
       header("Location:design.php?add_cat=adding category successfully done");
      }


 } 
 else{
      header("Location:admindashboard.php?error_alert=invalid adding opetation");
 }
     





?>