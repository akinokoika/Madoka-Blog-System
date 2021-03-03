<?php
	header("content-type:text/html;charset=utf-8");
	
	// 数据库连接
	include "../config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
    // 注册
    $username = $_POST['username'];
	$password = $_POST['password'];
	$nickname = $_POST['nickname'];
	
	// 判断用户是否存在
	$search = "select username from user where username='$username' or nickname='$nickname'";  	
	$result = $conn->query($search);
	if ($result->num_rows > 0) {
		echo "<script>alert('用户已经存在');location.href='register.html';</script>";
	}
	else{
		// 判断是否创建管理员
		$search2 = "select * from user";  	
		$result2 = $conn->query($search2);
		if(mysqli_num_rows($result2) == 0)
		{
			$sql4 = "INSERT INTO admin(username, nickname) VALUES ('$username','$nickname')";
			if ($conn->query($sql4) === TRUE) {
				$stradmin = "，欢迎，管理员！";
			}
		}

		// 密码加密散列
		$encryption_pass = password_hash($password,PASSWORD_BCRYPT);

		$sql = "INSERT INTO user(username, password, nickname) VALUES ('$username','$encryption_pass','$nickname')";
	
		if ($conn->query($sql) === TRUE) {
			$sql2 = "INSERT INTO points(nickname,points,experience,lv) VALUES ('$nickname',0,0,1)";
			
			if ($conn->query($sql2) === TRUE) {
				$sql3 = "INSERT INTO theme(nickname,theme,touhou,touhoubg) VALUES ('$nickname','默认',0,0)";

				if ($conn->query($sql3) === TRUE) {
					echo "<script>alert('".$nickname."，注册成功".$stradmin."');location.href='login.html';</script>";

				} else {
					echo "<script>alert('注册失败');location.href='register.html';</script>";
				}
			} else {
				echo "<script>alert('注册失败');location.href='register.html';</script>";
			}
		} else {
			echo "<script>alert('注册失败');location.href='register.html';</script>";
		}
	}
?>