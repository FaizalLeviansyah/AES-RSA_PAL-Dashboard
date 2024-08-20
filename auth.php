<?php
session_start();
include 'config.php';

$error='';
if (isset($_POST['login'])){
if	(empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password Tidak Valid!";

}else{

$user = mysqli_real_escape_string($connect,$_POST['username']);
$pass = mysqli_real_escape_string($connect,$_POST['password']);

$query = "SELECT username,password FROM users WHERE username='$user' AND password=md5('$pass')";
$sql = mysqli_query($connect,$query);
$rows = mysqli_fetch_array($sql);
	if ($rows) {
		$_SESSION['username']=$user;
		header("location: dashboard/index.php");
} else {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Username atau Password Salah!');\n";
		echo "window.location='index.php'";
		echo "</script>";
		}
	}
}

?>
