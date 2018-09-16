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

if(isset($_REQUEST["cat_name"])){
	$sql="select * from category where category_name like '%".$_REQUEST["cat_name"]."%'";
	$a=getDataFromDB($sql);
	
	?>
	<table style="width: 40%;border: 1px solid black; border-collapse: collapse;">
	<?php
	foreach($a as $v){
		?>
		
			<tr>
				<td style="border: 1px solid black; border-collapse: collapse;"><?php echo $v["category_id"] ?></td>
				<td style="border: 1px solid black; border-collapse: collapse;"><?php echo $v["category_name"] ?></td>
				 <td><a href="edit_category.php?cat_id=<?php echo $row['category_id'];?>">Edit</a></td>  
                 <td><a href="delete_category.php?cat_id=<?php echo $row['category_id'];?>">Delete</a></td>
			</tr>
		
	<?php
	}
	?>
	</table>
	<?php
}
?>