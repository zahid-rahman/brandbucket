

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
	
	$sql="select * from product where product_name like '%".$_REQUEST['product']."%'";
	
	$a=getDataFromDB($sql);
	
	?>
	<datalist id="abc"> 
	       
	<?php
	
	
	foreach($a as $v){
       
		 if(isset($_REQUEST['product'])){ 
		?>
			
	            $check++;
				<option value="<?php echo $v["product_name"]; ?>"></option>
				
			
		
	
		<?php
	}
		 }
		
		 ?>
		 </datalist>	 

<?php	
}




?>



