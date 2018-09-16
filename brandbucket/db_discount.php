

<?php

function getDataFromDB($sql){
  $conn = mysqli_connect("localhost", "root", "","brandbucket");
  
  $result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
  $arr=array();
  
  while($row = mysqli_fetch_assoc($result)) {
    $arr[]=$row;
  }
  return $arr;
}

if(isset($_REQUEST["dis"])){
  
  //$sql="select * from brand where brand_name like '%".$_REQUEST['brandname']."%'";
  
  $sql="select *,product.product_name from discount,product where discount.product_id = product.product_id and discount.product_id like '%".$_REQUEST['dis']."%' ";
  
  $a=getDataFromDB($sql);
  
  ?>

  <table class="table table-bordered">
      <tr>
         <th>Product name</th>
        <th>Product id</th>
        <th>discount rate</th>
        <th>status </th>
        <th>days</th>
        <th>Edit categories</th>
        <th>delete categories</th>
      </tr>

  
  <?php
  $check=0;
  
  foreach($a as $v){
   
     
    ?>
      <tr>
         <td><?php echo $v["product_name"] ?></td>
        <td><?php echo $v["product_id"] ?></td>
        <td><?php echo $v["discount_rate"] ?></td>
        <td><?php echo $v["status"] ?></td>
        <td><?php echo $v["days"] ?></td>
         <td><a href="edit_discount.php?pid=<?php echo $v['product_id'];?>&pro_name=<?php echo $v['product_name'] ?>">Edit</a></td>  
         <td><a href="delete_discount.php?pid=<?php echo $v['product_id'];?>">Delete</a></td> 
  
      </tr>
    
  
    <?php

    
   
    }


?>
</table>

    <?php
}
?>

