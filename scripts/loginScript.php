<?php session_start();?>
<?php include("../includes/connect.php"); ?>
<?php
	$email=$_POST['user'];
	$pass=$_POST['pass'];

	$sql="select * from users where email=\"$email\" and password=\"$pass\" limit 1";
	$result=$smeConn->query($sql);
	//echo $sql;
	//found user
	if($result->num_rows>0){
		$row=$result->fetch_assoc();
		
		//set session variables
		$_SESSION['email']=$row['email'];
		$_SESSION['first']=$row['first'];
		$_SESSION['id']=$row['id'];
		$_SESSION['userType']=$row['usertype'];

		echo $row['usertype'];
	}
	//user not found
	else{
		echo 0;
	}
?>
