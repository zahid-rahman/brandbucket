<?php 
session_start();



   $conn = mysqli_connect("localhost", "root", "","brandbucket");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


/*
$product_id=$_REQUEST['pname'];
$product_name=0;
$price=0;
$brand_id=0;
$discount=0;
*/

$ar=array();
  //$sql = "SELECT * FROM product";
  // if(isset($_REQUEST['pname']))
    $sql = "SELECT * FROM brand";
  //echo $sql."<br/>";
  $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  //print_r($result);
 $i=0;  
  while($row = mysqli_fetch_assoc($result)) {
    //echo $row["name"]." is from ".$row["dept"]." with cgpa : ".$row["cgpa"];
    //echo "<br>";
    $i++;
    
         $_SESSION['bid'] = $row['brand_id'];
         $_SESSION['bname']= $row['brand_name'];
    
    $ar[$i]=$row;
  



  }

   print_r($_SESSION);

  mysqli_close($conn);

 ?>
