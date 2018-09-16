

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

if(isset($_REQUEST["dash"])){
	
	//$sql="select * from brand where brand_name like '%".$_REQUEST['brandname']."%'";
	
	$sql="select * from dashboard where role='customer' and cust_name like '%".$_REQUEST['dash']."%' or cust_id='".$_REQUEST['dash']."'";
	
	$a=getDataFromDB($sql);
	
	?>
	<table style="width: 40%;border: 1px solid green; border-collapse: collapse;" class="table table-bordered">
	        <tr>
	        	<td>Customer id</td>
				<td>Customer Name</td>
				<td>Username</td>
				<td>password</td>
				<td>email</td>
				<td>address</td>
				<td>mobile</td>
				<td>gender</td>
				<td>Edit</td>
				<td>Delete</td>
				

			</tr>
	<?php
	$check=0;
	
	foreach($a as $v){
		 if($_REQUEST['dash'] == $v['cust_name'] || $_REQUEST['dash'] = $v['username'] || $_REQUEST['dash'] = $v['password']){
			 $check++;
		 
		?>
			<tr>
				<td><?php echo $v["cust_id"] ?></td>
				<td><?php echo $v["cust_name"] ?></td>
				<td><?php echo $v["username"] ?></td>
				<td><?php echo $v["password"] ?></td>
				<td><?php echo $v["email"] ?></td>
				<td><?php echo $v["address"] ?></td>

				<td><?php echo $v["phone"] ?></td>
				  <td><?php echo $v["gender"] ?></td>

				   <td><a href="edit_customer.php?cid=<?php echo $v['cust_id'];?>">Edit</a></td>  

                    <td><a href="delete_customer.php?cid=<?php echo $v['cust_id'];?>">Delete</a></td>
                  
				
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

