<?php 

   session_start();

//php validation

$check = 0;

if(isset($_REQUEST['cname'])!=null){
   $check++;
}else{

}
if(isset($_REQUEST['email'])!=null &&  strripos( $_REQUEST['email'],'@') != null){
       $check++;
          
}else{

}

if(isset($_REQUEST['comments'])!=null){
   $check++;
}else{
  
}

// insert value to letterbox

if($check == 3){
      $conn = mysqli_connect("localhost", "root", "", "brandbucket");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql="INSERT INTO letterbox VALUES (NULL,'".$_REQUEST['cname']."','".$_REQUEST['email']."','".$_REQUEST['comments']."')";
   // echo $sql;
    if(mysqli_query($conn, $sql)){
      //echo "New records updated successfully";
      header("Location:design.php");
      header("Location:design.php?msg=comment submit successfully :)");

  
    }
    
  
  mysqli_close($conn);


}

else{
         header("Location:design.php?failed=comment submittion faild :(");

 // header("Location:design.php");
}


?>