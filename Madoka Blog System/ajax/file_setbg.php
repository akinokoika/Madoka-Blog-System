<?php
	include "../config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	class cuser {
		public $state = "";
	}
	$cuser = new cuser();
	
	$nickname = $_GET["nickname"];
	$path = $_GET["path"];
	
	$sql = "select * from userinfo where nickname = '$nickname'";
	$result = $conn->query($sql);
	 
	if ($result->num_rows > 0) {
		
		$sql2 = "update userinfo set pic='$path' where nickname = '$nickname'";
	 
		if ($conn->query($sql2) === TRUE) {
			$cuser->state = "成功设置为新的头像，刷新页面后可见";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	} else {
		$cuser->state = "还没有设置过个人信息";
	}
	
	echo json_encode($cuser,JSON_UNESCAPED_UNICODE);
	 
	$conn->close();
?>