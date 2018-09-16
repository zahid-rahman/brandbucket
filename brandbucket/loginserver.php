<?php
session_start();
$conn = mysqli_connect("localhost", "root", "","brandbucket");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





$username = $_REQUEST['username'];
$password = $_REQUEST['pass'];

//$ar=array();
	//$sql = "SELECT * FROM dashboard";
	if(isset($_REQUEST["username"]) && isset($_REQUEST["pass"]))
		$sql = "SELECT * FROM dashboard where username = '".$username ."' AND password = '".$password."'";
	//echo $sql."<br/>";
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$check = 0;
	//print_r($result);
	while($row = mysqli_fetch_assoc($result)) {
		//echo $row["name"]." is from ".$row["dept"]." with cgpa : ".$row["cgpa"];
		//echo "<br>";
		//$ar[]=$row;
        
        
        //$_SESSION['role'] = $row['role'];

        if($username == $row['username'] && $password == $row['password'] && $row['role'] =="admin" ){
            $_SESSION['username'] = $username;
            $_SESSION['admin_role'] = $row['role'];
            header("Location:admindashboard.php");
            $check = 1;
		}

		else if($username == $row['username'] && $password == $row['password'] && $row['role'] =="customer"){
            $_SESSION['username'] = $username;
            $_SESSION['customer_id'] = $row['cust_id'];
            $_SESSION['customer_name'] = $row['cust_name'];
            $_SESSION['mobile_number'] = $row['phone'];
            $_SESSION['customer_address'] = $row['address'];
            $_SESSION['customer_email'] = $row['email'];
            $_SESSION['date_of_birth'] = $row['dob'];
            $_SESSION['cust_password'] = $row['password'];
            $_SESSION['user_role'] = $row['role'];
            header("Location:design.php");
            $check = 1;
		}

		
	}

	 if ($check == 0) {

	 	//header("Location:login.php");
		
	header("Location:login.php?error=wrong user name or password");
	 }
	// 	echo "<script>
	// 		alert('Wrong username or password');
	// 	</script>";
	// }
	// header("Location:login.php");

	//echo "<pre>";print_r($ar);echo "</pre>";
	//echo $ar[0]["name"];
	mysqli_close($conn);
?>