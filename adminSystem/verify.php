<?php
session_start();
include ("connect.php");
$u = $_POST['username'];
$p = $_POST['password'];
$sql = "select * from admin where username = '$u' and password = '$p'";
$result = $conn->query($sql);

if($stmt = $conn->prepare("select username,password from admin where username=? and password=?")){
		/*bind parameters for markers*/
		$stmt->bind_param("ss",$u,$p);
		$stmt->execute();
		$stmt->bind_result($username,$password);
		if($stmt->fetch()){
			$_SESSION['username'] = $u; //assign the username to session value
			echo $_SESSION['username']."Login Successful";
			echo "<script>window.location.assign('adminmain.php');</script>";
		}else{
			echo "Login Failed";
			echo "<script>window.location.assign('Login.html');</script>";
		}
		$stmt->close();
	}
?>