

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

if(isset($_REQUEST["brand"])){
  
  //$sql="select * from brand where brand_name like '%".$_REQUEST['brandname']."%'";
  
  $sql="select * from brand where brand_name like '%".$_REQUEST['brand']."%' or brand_id = '".$_REQUEST['brand']."' ";
  
  $a=getDataFromDB($sql);
  
  ?>
  <table class="table table-bordered">
      <tr>
        <th>Brand id</th>
        <th>Brand name</th>
        <th>Edit brands</th>
        <th>Delete brands</th>
      </tr>

    


  <?php
  $check=0;
  
  foreach($a as $v){
     if($_REQUEST['brand'] == $v['brand_name'] || $_REQUEST['brand'] = $v['brand_id'] ){
       $check++;
     
    ?>
      <tr>
        <td><?php echo $v["brand_id"] ?></td>
        <td><?php echo $v["brand_name"] ?></td>

         <td><a href="edit_brand.php?bid=<?php echo $v['brand_id'];?>">Edit</a></td>  
         <td><a href="delete_brand.php?bid=<?php echo $v['brand_id'];?>">Delete</a></td> 
       
        
      </tr>
    
  
    <?php
     }else{}
     
}
if($check == 0){
        echo "<tr><td align='center' colspan = '4px' style='border: 1px solid red;'>value not found </td></tr>";
}
?>
</table>

    <?php
}
?>

