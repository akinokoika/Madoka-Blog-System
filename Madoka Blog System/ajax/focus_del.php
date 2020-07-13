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
	
	$name = $_GET["name"];
	$nickname = $_GET["nickname"];
	
	$sql = "delete from follow where name = '$name' and nickname = '$nickname' ";
	 
	if ($conn->query($sql) === TRUE) {
		$cuser->state = "已经取消关注 ".$name;
	} else {
		$cuser->state = "取消关注 ".$name." 失败";
	}
	
	echo json_encode($cuser,JSON_UNESCAPED_UNICODE);
	 
	$conn->close();
?>