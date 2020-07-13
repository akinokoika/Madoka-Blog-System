<?php
	header("content-type:text/html;charset=utf-8");
	session_start();
	
	// 数据库连接
	include "../config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
    // 登录
    $username = $_POST['username'];
	$password = $_POST['password'];
    
	// 判断用户是否存在
	$search = "select * from user where username='$username'";  	
	$result = $conn->query($search);
	if ($result->num_rows > 0) {
		$user = $result->fetch_array();
		// 判断密码是否正确
		// 验证密码是否和散列值匹配
		if (password_verify($password,$user['password'])){
			$_SESSION['nickname'] = $user['nickname'];
			header("location:../index.php");
		}else{
			echo "<script>alert('密码错误');location.href='login.html';</script>";
		}
	}else
	{
		echo "<script>alert('用户不存在');location.href='login.html';</script>";
	}
?>