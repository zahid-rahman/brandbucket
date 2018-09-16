<?php
//session_start();



  $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$check=0;
            

            // first name 
          if(isset($_REQUEST['pid'])!=null){
              
                $check++;

          }
          else{
            //echo "enter your first name</br>";
            

          }  

             // first name 
          if(isset($_REQUEST['pname'])!=null){
                
          $check++;

          }
          else{
            
            

          }  
           
          
          // date of birth
          if(isset($_REQUEST['pquantity'])){
              
               $check++;
             

          }
          else{
            //echo "select your date of birth</br>";
           

          }  

         

             // gender
          if(isset($_REQUEST['price']) != null){
              
                $check++;

          }
          else{
            //echo "must select gender</br>";
            

          }  
      // email
            if(isset($_REQUEST['bid'])!=null){
              
              $check++;

           }
           else{
             //echo "enter your email address</br>";
             

           } 



        // phone number   
          if(isset($_REQUEST['cid'])!=null){
              
               $check++; 

          }
          else{
            //echo "enter valid mobile number</br>";
            

          }  


              //  product image
          if(isset($_REQUEST['pimage'])!=null){
              
                $check++;

          }
          else{
            //echo "must enter address</br>";
            

          }  

               // address
          if(isset($_REQUEST['pro_info'])!=null){
              
               $check++; 

          }
          else{
            //echo "must enter address</br>";
            

          }  

          


//--------------------------------------------------------------------------
  //echo $check;
   if($check >1){       
  $p=$_FILES['fileImage']['name'];
  $sz=$_FILES['fileImage']['size'];
  
  $sql="INSERT INTO product VALUES (".$_REQUEST['pid'].",'".$_REQUEST['pname']."',".$_REQUEST['pquantity'].",".$_REQUEST['price'].",".$_REQUEST['bid'].",".$_REQUEST['cid'].",'img/product-pic/".$_REQUEST['brand_name']."/".$p."','".$_REQUEST['pro_info']."')";
 // echo $sql;

    if(mysqli_query($conn, $sql)){
    //echo "New records updated successfully";

      $dis = "INSERT INTO discount VALUES (".$_REQUEST['pid'].",".$_REQUEST['dis_rate'].",'".$_REQUEST['status']."',".$_REQUEST['days'].")";

       if(mysqli_query($conn, $dis)){
         header("Location:design.php?congrats_p=adding product successfully done");
       }
      
    }
    else{
      header("Location:admindashboard.php?error_alert2=invalid adding opetation");
    }
 
    

 }



?>