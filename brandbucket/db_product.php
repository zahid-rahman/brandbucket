

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

if(isset($_REQUEST["product"])){
	
	//$sql="select * from brand where brand_name like '%".$_REQUEST['brandname']."%'";
	
	$sql="select * from product where product_name like '%".$_REQUEST['product']."%' or product_id like '%".$_REQUEST['product']."%'";
	
	$a=getDataFromDB($sql);
	
	?>
	<table  class="table table-bordered">
	        <tr>
	        	<td>Product id</td>
				<td>Product Name</td>
				<td>product quantity</td>
				<td>price</td>
				<td>brand id</td>
				<td>category id</td>
				<td>product description</td>
			
				<td>Edit</td>
				<td>Delete</td>
				

			</tr>
	<?php
	$check=0;
	
	foreach($a as $v){
		 if($_REQUEST['product'] == $v['product_name'] || $_REQUEST['product'] = $v['product_id']){
			 $check++;
		 
		?>
			<tr>
				<td><?php echo $v["product_id"] ?></td>
				<td><?php echo $v["product_name"] ?></td>
				<td><?php echo $v["product_quantity"] ?></td>
				<td><?php echo $v["price"] ?></td>
				<td><?php echo $v["brand_id"] ?></td>
				<td><?php echo $v["category_id"] ?></td>

				<td><?php echo $v["product_description"] ?></td>

				 <td><a href="edit_product.php?pid=<?php  echo $v['product_id']; ?>&pro_name=<?php echo $v['product_name']; ?>">Edit</a>
				 </td>  

	              <td><a href="delete_product.php?pid=<?php  echo $v['product_id']; ?>">Delete</a></td> 

				
			</tr>
		
	
		<?php
		 }else{}
		 
}
if($check == 0){
		    echo "<tr><td align='center' colspan = '9px' style='border: 1px solid red;'>value not found </td></tr>";
}
?>
</table>

		<?php
}
?>

