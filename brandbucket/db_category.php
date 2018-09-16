

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

if(isset($_REQUEST["category"])){
  
  //$sql="select * from brand where brand_name like '%".$_REQUEST['brandname']."%'";
  
  $sql="select * from category where category_name like '%".$_REQUEST['category']."%' or category_id = '".$_REQUEST['category']."' ";
  
  $a=getDataFromDB($sql);
  
  ?>
  <table class="table table-bordered">
          <tr>
        <td>Category id</td>
        <td>Category name</td>
        <td>Edit</td>
        <td>Delete</td>
       
      </tr>
  <?php
  $check=0;
  
  foreach($a as $v){
     if($_REQUEST['category'] == $v['category_name'] || $_REQUEST['category'] = $v['category_id'] ){
       $check++;
     
    ?>
      <tr>
        <td><?php echo $v["category_id"] ?></td>
        <td><?php echo $v["category_name"] ?></td>

         <td><a href="edit_category.php?cat_id=<?php echo $v['category_id'];?>">Edit</a></td>  
        <td><a href="delete_category.php?cat_id=<?php echo $v['category_id'];?>">Delete</a></td>
       
        
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

