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
	
	$sql = "delete from uploads where path = '$path' and nickname = '$nickname' ";
	 
	if ($conn->query($sql) === TRUE) {
		unlink(".".$path);
		$cuser->state = "已经删除 ".$path;
	} else {
		$cuser->state = "删除 ".$path." 失败";
	}
	
	echo json_encode($cuser,JSON_UNESCAPED_UNICODE);
	 
	$conn->close();
?>