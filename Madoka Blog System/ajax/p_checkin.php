<?php
	date_default_timezone_set("Asia/Shanghai");
	include "../config.php";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	mysqli_set_charset($conn,"utf8");
	
	// 当前用户
	$nickname = $_GET["name"];
	
	// 签到数组
	$arr=array();
	 
	// 查询所有的签到
	$sql = "select * from checkin where nickname = '$nickname'";
	$result = $conn->query($sql);
	
	// 如果已经签到
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($arr,$row["ctime"]);
		}
	}
	// 如果没有签到
	else {
		$arr[0] = "没有签到";
	}
	
	echo json_encode($arr,JSON_UNESCAPED_UNICODE) ;
	
	$conn->close();
?>