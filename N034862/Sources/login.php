<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "datxedulich";
	$con = mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con,'UTF8');

	$username = $_POST["username"];
	$password = $_POST["password"];
	$password = md5($password);

	//thực hiện câu truy vấn
	$data = mysqli_query($con,"select * from users where username = '$username' and password = '$password'");
	if(mysqli_num_rows($data) == 1)
	{
		$_SESSION["user"] = $_POST["username"];
		header("location: DatXeDuLich.php?user=".$username);
	}
	else
		{
			header("location: DatXeDuLich.php?page=dangnhap&err=false");
		}
		
 ?>

