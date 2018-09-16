<?php
session_start();


$check=0;

//validation
function check_username_ambigity()
{


}

$check=0;
            

            // first name 
          if(isset($_REQUEST['cname']) && strlen($_REQUEST['cname'])>0){
              
                

          }
          else{
            //echo "enter your first name</br>";
            $check++;

          }  

             // first name 
          if(isset($_REQUEST['uname']) && strlen($_REQUEST['uname'])>0){
                         $conn = mysqli_connect("localhost", "root", "","brandbucket");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM dashboard";
                $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));

                while($rowuser = mysqli_fetch_assoc($result)) {

                    //$error = "user already exist";
                    
                    if($_REQUEST['uname'] == $rowuser['username']){
                          header("Location:signup.php?signuperror=username already exist");
                          //echo "<script>alert('".$_REQUEST['signuperror']."');</script>";
                         
                          $check++;

                    }
                   
                }
                
                   
               
       

          }
          else{
            //echo "enter your first name</br>";
            $check++;

          }  
           
          
          // date of birth
          if(isset($_REQUEST['date']) && isset($_REQUEST['month']) && isset($_REQUEST['year'])){
              
              $dob = $_REQUEST['date']."-".$_REQUEST['month']."-".$_REQUEST['year'];

          }
          else{
            //echo "select your date of birth</br>";
            $check++;

          }  

         

             // gender
          if(isset($_REQUEST['gender']) != null){
              
                

          }
          else{
            //echo "must select gender</br>";
            $check++;

          }  
      // email
            if(isset($_REQUEST['email']) && strlen($_REQUEST['email'])>0){
              
              if(strripos( $_REQUEST['email'],'@') != null){


              }
              else{
                //echo "enter a valid email address </br>";
              } 

           }
           else{
             //echo "enter your email address</br>";
             $check++;

           } 



        // phone number   
          if(isset($_REQUEST['phone']) && strlen($_REQUEST['phone'])>9){
              
                

          }
          else{
            //echo "enter valid mobile number</br>";
            $check++;

          }  


              // address
          if(isset($_REQUEST['address']) && strlen($_REQUEST['address'])>0){
              
                

          }
          else{
            //echo "must enter address</br>";
            $check++;

          }  

          


          //password

          if(isset($_REQUEST['password'])){
              
              // if((strpos($_REQUEST['password'],'!')!=null) || (strpos($_REQUEST['password'],'_')!=null) || 
              //  (strpos($_REQUEST['password'],'@')!=null)  ) {


              // }  
              // else{
              //   //echo "enter atleast one special character </br>";
              //   $check++;
              // }  

          }
          else{
            //echo "must use 8 characters for password</br>";
            $check++;

          }  

           //confirm password

          if(isset($_REQUEST['conf_pass'])){
              
              if($_REQUEST['password'] == $_REQUEST['conf_pass']){

              }
        else{
          //echo "password not matched";
          $check++;
        }
            

          }
          else{
            //echo "password not matched</br>";
            $check++;

          } 

//--------------------


//$dob = $_REQUEST['date']."-".$_REQUEST['month']."-".$_REQUEST['year'];
//echo $dob;

//print_r($_REQUEST);

if($check == 0){
  
  $conn = mysqli_connect("localhost", "root", "", "brandbucket");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  
  
  $sql="INSERT INTO dashboard VALUES (NULL,'".$_REQUEST['cname']."','".$_REQUEST['uname']."','".$_REQUEST['password']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$dob."','".$_REQUEST['address']."','".$_REQUEST['gender']."','customer')";
 // echo $sql;
  if(mysqli_query($conn, $sql)){
    //echo "New records updated successfully";
    header("Location:login.php");
  }

else{
  echo "Invalid parameter !";
}
  
}




?>